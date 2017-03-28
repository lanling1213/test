<?php
/**
 * ask 权限检查，检查如下：
 * 1.检测分类是否存在;
 * 2.检测分类是否关闭;
 * 3.回复问题时检测是否可以回复;
 * 4.咨询问题时检测是否可以咨询;
 * 5.检测会员登录状态;
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */

/**
 * ask 权限检查，检查如下：
 * 1.检测分类是否存在;
 * 2.检测分类是否关闭;
 * 3.回复问题时检测是否可以回复;
 * 4.咨询问题时检测是否可以咨询;
 * 5.检测会员登录状态;
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */
class foreground
{
    public $memberinfo, $GLOABLE, $TYPES, $typeid;  //会员信息、全局配置数组、全部分类数组、分类ID
    private $memb_db;        //会员模型

    /**
     * 构造函数
     *
     * @return null
     */
    public function __construct() 
    {
        define('SITEID', get_siteid());
        $this->GLOABLE = getcache('ask_config_' . SITEID, 'commons');
        $this->TYPES = getcache('ask_type_' . SITEID, 'commons');
        $this->typeid  = isset($_GET['typeid']) && intval($_GET['typeid']) > 0 ? intval($_GET['typeid']) : 0;
        $is_ajax = isset($_GET['is_ajax']) && intval($_GET['is_ajax']) == 1 ? true : false;
        if (in_array(ROUTE_A, array('show', 'lists'))) {   //分类是否存在或已关闭
            self::check_isexists($this->typeid, $is_ajax);
            self::check_isclose($this->TYPES[$this->typeid], $is_ajax);
        }
        $this->memb_db = wy_base::load_model('member_model');
    }
    
    /**
     * 判断分类是否存在
     *
     * @param int     $typeid  类型ID
     * @param boolean $is_ajax 是否AJAX请求
     *
     * @return null|string
     */
    final public function check_isexists($typeid, $is_ajax = false)
    {
        if(!$typeid || empty($this->TYPES[$typeid])) {
            if ($is_ajax) {
                $result = array('status' => 'TYPE_NOT_EXISTS', 'message' => L('ask_type_not_exists'));
                exit(json_encode($result));
            } else {
                showmessage(L('ask_type_not_exists'));
            }
        }
    }

    /**
     * 判断分类是否已经关闭
     *
     * @param array   $TYPE    类型数组
     * @param boolean $is_ajax 是否AJAX请求
     *
     * @return null|string
     */
    final public function check_isclose($TYPE, $is_ajax = false)
    {
        $setting = string2array($TYPE['setting']);
        if ($setting['isclose']) {
            if ($is_ajax) {
                $result = array('status' => 'TYPE_CLOSED', 'message' => L('type_is_close'));
                exit(json_encode($result));
            } else {
                showmessage(L('type_is_close'));
            }
        }
    }

    /**
     * 判断分类是否允许回复
     *
     * @param array   $TYPE    类型数组
     * @param array   $GLOABLE 全局配置
     * @param boolean $is_ajax 是否AJAX请求
     *
     * @return null|string
     */
    final public function check_isreply($TYPE, $GLOABLE, $is_ajax = false)
    {
        $setting = string2array($TYPE['setting']);
        //检测回复是否关闭
        if ($GLOABLE['close']) {          //检测全局是否关闭回复
            if ($is_ajax) {
                $result = array('status' => 'REPLY_CLOSED', 'message' => L('reply_is_all_close'));
                exit(json_encode($result));
            } else {
                showmessage(L('reply_is_all_close'));
            }
        } else {
            if (!$setting['isreply']) {   //检测分类是否关闭回复
                if ($is_ajax) {
                    $result = array('status' => 'REPLY_CLOSED', 'message' => L('type_is_reply'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('type_is_reply'));
                }
            }
        }
        //检测游客是否可以回复
        if (!$GLOABLE['allow_visitors_reply'] || ($GLOABLE['allow_visitors_reply'] && !$setting['isvisitor_reply'])) {    //游客不允许回复状态下，检测会员登陆状态
            $this->memberinfo = $this->check_member($is_ajax);
            if ($this->memberinfo == false) {
                if ($is_ajax) {
                    $result = array('status' => 'NEED_LOGIN', 'message' => L('type_visitors_is_reply'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('type_visitors_is_reply'), APP_PATH . 'index.php?m=member&c=index&a=login');
                }
            }
        }
    }

    /**
     * 判断分类是否允许咨询
     *
     * @param array   $TYPE    分类数组
     * @param array   $GLOABLE 全局配置
     * @param boolean $is_ajax 是否AJAX请求
     *
     * @return null|string
     */
    final public function check_isask($TYPE, $GLOABLE, $is_ajax = false)
    {
        $setting = string2array($TYPE['setting']);
        if (!$GLOABLE['allow_visitors_ask'] || ($GLOABLE['allow_visitors_ask'] && !$setting['isvisitor_ask'])) {    //游客不允许咨询状态下，检测会员登陆状态
            $this->memberinfo = $this->check_member($is_ajax);
            if ($this->memberinfo == false) {
                if ($is_ajax) {
                    $result = array('status' => 'NEED_LOGIN', 'message' => L('type_visitors_is_ask'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('type_visitors_is_ask'), APP_PATH . 'index.php?m=member&c=index&a=login');
                }
            }
        }
    }

    /**
     * 判断提问是否已经过期  过期返回  true
     *
     * @param array $TYPE      类型数组
     * @param array $GLOABLE   全局配置
     * @param int   $inputtime 问题发布时间
     *
     * @return boolean

     */
    final public function check_isinterval($TYPE, $GLOABLE, $inputtime)
    {
        $setting = string2array($TYPE['setting']);
        $interval_time = 0;             //过期时间
        if ($GLOABLE['interval']) {     //全局已定义天数
            if ($setting['interval_time']) {   //分类已定义天数
                $min = ($setting['interval_time'] < $GLOABLE['interval']) ? $setting['interval_time'] : $GLOABLE['interval'];
                $interval_time = $inputtime + $min * 24 * 3600;
            } else {
                $interval_time = $inputtime + $GLOABLE['interval'] * 24 * 3600;
            }
        } else {          //全局不限制过期时间
            if ($setting['interval_time']) {   //分类已定义天数
                $interval_time = $inputtime + $setting['interval_time'] * 24 * 3600;
            }
        }
        if ($interval_time == 0 || time() <= $interval_time) {  //未过期
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * 判断用户是否已经登陆
     *
     * @param boolean $is_ajax 是否AJAX请求
     *
     * @return boolean/array
     */
    final private function check_member($is_ajax = false) 
    {
        //主要是为了同时登录避免siteid有冲突
        if ($_SESSION['userid'] != 0 || $_SESSION['roleid'] != 0) {
            if ($is_ajax) {
                $result = array('status' => 'NEED_LOGOUT', 'message' => 'sorry,请退出后台再登录会员，cms暂不兼容同时登录后台以及会员，或者你可以分别用两个浏览器登录处理数据。');
                exit(json_encode($result));
            } else {
                showmessage('sorry,请退出后台再登录会员，cms暂不兼容同时登录后台以及会员，或者你可以分别用两个浏览器登录处理数据。');
            }
        }
        $phpcms_auth = param::get_cookie('auth');
        //判断是否存在auth cookie
        if ($phpcms_auth) {
            $auth_key = $auth_key = md5(wy_base::load_config('system', 'auth_key') . $_SERVER['HTTP_USER_AGENT']);
            list($userid, $password) = explode("\t", sys_auth($phpcms_auth, 'DECODE', $auth_key));
            //验证用户，获取用户信息
            $memberinfo = $this->memb_db->get_one(array('userid'=>$userid));
            //获取用户模型信息
            $this->memb_db->set_model($memberinfo['modelid']);

            $_member_modelinfo = $this->memb_db->get_one(array('userid'=>$userid));
            $_member_modelinfo = $_member_modelinfo ? $_member_modelinfo : array();
            $this->memb_db->set_model();
            if (is_array($memberinfo)) {
                $memberinfo = array_merge($memberinfo, $_member_modelinfo);
            }
                
            if ($memberinfo && $memberinfo['password'] === $password) {
                if ($memberinfo['groupid'] == 1) {
                    param::set_cookie('auth', '');
                    param::set_cookie('_userid', '');
                    param::set_cookie('_username', '');
                    param::set_cookie('_groupid', '');
                    if ($is_ajax) {
                        $result = array('status' => 'NEED_BANNED', 'message' => L('userid_banned_by_administrator'));
                        exit(json_encode($result));
                    } else {
                        showmessage(L('userid_banned_by_administrator'), APP_PATH . 'index.php?m=member&c=index&a=login');
                    }
                } elseif ($memberinfo['groupid'] == 7) {
                    param::set_cookie('auth', '');
                    param::set_cookie('_userid', '');
                    param::set_cookie('_groupid', '');
                    param::set_cookie('email', $memberinfo['email']);
                    if ($is_ajax) {
                        $result = array('status' => 'NEED_EMAIL', 'message' => L('need_emial_authentication'));
                        exit(json_encode($result));
                    } else {
                        showmessage(L('need_emial_authentication'), APP_PATH . 'index.php?m=member&c=index&a=register&t=2');
                    }
                }
            } else {
                param::set_cookie('auth', '');
                param::set_cookie('_userid', '');
                param::set_cookie('_username', '');
                param::set_cookie('_groupid', '');
                if ($is_ajax) {
                    $result = array('status' => 'NEED_LOGIN', 'message' => L('need_login'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('need_login'), APP_PATH . 'index.php?m=member&c=index&a=login');
                }
            }
            unset($userid, $password, $phpcms_auth, $auth_key);
            return $memberinfo;
        } else {
            return false;
        }
    }
}
