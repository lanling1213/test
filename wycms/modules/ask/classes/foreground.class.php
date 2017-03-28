<?php
/**
 * ask Ȩ�޼�飬������£�
 * 1.�������Ƿ����;
 * 2.�������Ƿ�ر�;
 * 3.�ظ�����ʱ����Ƿ���Իظ�;
 * 4.��ѯ����ʱ����Ƿ������ѯ;
 * 5.����Ա��¼״̬;
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */

/**
 * ask Ȩ�޼�飬������£�
 * 1.�������Ƿ����;
 * 2.�������Ƿ�ر�;
 * 3.�ظ�����ʱ����Ƿ���Իظ�;
 * 4.��ѯ����ʱ����Ƿ������ѯ;
 * 5.����Ա��¼״̬;
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */
class foreground
{
    public $memberinfo, $GLOABLE, $TYPES, $typeid;  //��Ա��Ϣ��ȫ���������顢ȫ���������顢����ID
    private $memb_db;        //��Աģ��

    /**
     * ���캯��
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
        if (in_array(ROUTE_A, array('show', 'lists'))) {   //�����Ƿ���ڻ��ѹر�
            self::check_isexists($this->typeid, $is_ajax);
            self::check_isclose($this->TYPES[$this->typeid], $is_ajax);
        }
        $this->memb_db = wy_base::load_model('member_model');
    }
    
    /**
     * �жϷ����Ƿ����
     *
     * @param int     $typeid  ����ID
     * @param boolean $is_ajax �Ƿ�AJAX����
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
     * �жϷ����Ƿ��Ѿ��ر�
     *
     * @param array   $TYPE    ��������
     * @param boolean $is_ajax �Ƿ�AJAX����
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
     * �жϷ����Ƿ�����ظ�
     *
     * @param array   $TYPE    ��������
     * @param array   $GLOABLE ȫ������
     * @param boolean $is_ajax �Ƿ�AJAX����
     *
     * @return null|string
     */
    final public function check_isreply($TYPE, $GLOABLE, $is_ajax = false)
    {
        $setting = string2array($TYPE['setting']);
        //���ظ��Ƿ�ر�
        if ($GLOABLE['close']) {          //���ȫ���Ƿ�رջظ�
            if ($is_ajax) {
                $result = array('status' => 'REPLY_CLOSED', 'message' => L('reply_is_all_close'));
                exit(json_encode($result));
            } else {
                showmessage(L('reply_is_all_close'));
            }
        } else {
            if (!$setting['isreply']) {   //�������Ƿ�رջظ�
                if ($is_ajax) {
                    $result = array('status' => 'REPLY_CLOSED', 'message' => L('type_is_reply'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('type_is_reply'));
                }
            }
        }
        //����ο��Ƿ���Իظ�
        if (!$GLOABLE['allow_visitors_reply'] || ($GLOABLE['allow_visitors_reply'] && !$setting['isvisitor_reply'])) {    //�οͲ�����ظ�״̬�£�����Ա��½״̬
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
     * �жϷ����Ƿ�������ѯ
     *
     * @param array   $TYPE    ��������
     * @param array   $GLOABLE ȫ������
     * @param boolean $is_ajax �Ƿ�AJAX����
     *
     * @return null|string
     */
    final public function check_isask($TYPE, $GLOABLE, $is_ajax = false)
    {
        $setting = string2array($TYPE['setting']);
        if (!$GLOABLE['allow_visitors_ask'] || ($GLOABLE['allow_visitors_ask'] && !$setting['isvisitor_ask'])) {    //�οͲ�������ѯ״̬�£�����Ա��½״̬
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
     * �ж������Ƿ��Ѿ�����  ���ڷ���  true
     *
     * @param array $TYPE      ��������
     * @param array $GLOABLE   ȫ������
     * @param int   $inputtime ���ⷢ��ʱ��
     *
     * @return boolean

     */
    final public function check_isinterval($TYPE, $GLOABLE, $inputtime)
    {
        $setting = string2array($TYPE['setting']);
        $interval_time = 0;             //����ʱ��
        if ($GLOABLE['interval']) {     //ȫ���Ѷ�������
            if ($setting['interval_time']) {   //�����Ѷ�������
                $min = ($setting['interval_time'] < $GLOABLE['interval']) ? $setting['interval_time'] : $GLOABLE['interval'];
                $interval_time = $inputtime + $min * 24 * 3600;
            } else {
                $interval_time = $inputtime + $GLOABLE['interval'] * 24 * 3600;
            }
        } else {          //ȫ�ֲ����ƹ���ʱ��
            if ($setting['interval_time']) {   //�����Ѷ�������
                $interval_time = $inputtime + $setting['interval_time'] * 24 * 3600;
            }
        }
        if ($interval_time == 0 || time() <= $interval_time) {  //δ����
            return false;
        } else {
            return true;
        }
    }
    
    /**
     * �ж��û��Ƿ��Ѿ���½
     *
     * @param boolean $is_ajax �Ƿ�AJAX����
     *
     * @return boolean/array
     */
    final private function check_member($is_ajax = false) 
    {
        //��Ҫ��Ϊ��ͬʱ��¼����siteid�г�ͻ
        if ($_SESSION['userid'] != 0 || $_SESSION['roleid'] != 0) {
            if ($is_ajax) {
                $result = array('status' => 'NEED_LOGOUT', 'message' => 'sorry,���˳���̨�ٵ�¼��Ա��cms�ݲ�����ͬʱ��¼��̨�Լ���Ա����������Էֱ��������������¼�������ݡ�');
                exit(json_encode($result));
            } else {
                showmessage('sorry,���˳���̨�ٵ�¼��Ա��cms�ݲ�����ͬʱ��¼��̨�Լ���Ա����������Էֱ��������������¼�������ݡ�');
            }
        }
        $phpcms_auth = param::get_cookie('auth');
        //�ж��Ƿ����auth cookie
        if ($phpcms_auth) {
            $auth_key = $auth_key = md5(wy_base::load_config('system', 'auth_key') . $_SERVER['HTTP_USER_AGENT']);
            list($userid, $password) = explode("\t", sys_auth($phpcms_auth, 'DECODE', $auth_key));
            //��֤�û�����ȡ�û���Ϣ
            $memberinfo = $this->memb_db->get_one(array('userid'=>$userid));
            //��ȡ�û�ģ����Ϣ
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
