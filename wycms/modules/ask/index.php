<?php

/**
 * ask前台页面
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */
defined('IN_WYCMS') or exit('No permission resources.');
wy_base::load_app_class('foreground');
wy_base::load_app_func('global');
wy_base::load_sys_class('form', '', 0);

/**
 * ask前台页面
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */
class index extends foreground {

    private $db;           //问题模型
    private $reply_db;     //咨询回复模型
    private $hits_db;      //点击量/回复量模型

    /**
     * 构造函数
     *
     * return null
     */

    public function __construct() {
        $this->db = wy_base::load_model('ask_question_model');
        $this->reply_db = wy_base::load_model('ask_reply_model');
        $this->hits_db = wy_base::load_model('ask_question_hits_model');
        parent::__construct();
    }

    /**
     * 咨询首页
     *
     * return null
     */
    public function init() {
        $_userid = param::get_cookie('_userid');
        $_username = param::get_cookie('_username');
        $_nickname = param::get_cookie('_nickname');

        //模板风格使用站点全局设置风格
        $sitelist = getcache('sitelist', 'commons');
        $default_style = $sitelist[SITEID]['default_style'];
        if (!$default_style) {
            $default_style = 'default';
        }
        $TYPES = $this->TYPES;
        $CATEGORYS = getcache('category_content_' . SITEID, 'commons');

        //SEO
        $SEO = ask_seo(SITEID, '', $this->GLOABLE['title'], $this->GLOABLE['description'], $this->GLOABLE['keywords']);

        include template('ask', 'index', $default_style);
    }

    /**
     * 咨询详情页
     *
     * return null
     */
    public function show() {
        $typeid = $this->typeid;
        $qid = isset($_GET['qid']) ? intval($_GET['qid']) : '';
        $_userid = param::get_cookie('_userid');
        $_username = param::get_cookie('_username');
        $_nickname = param::get_cookie('_nickname');

        if (!$qid) {
            showmessage(L('ask_type_information_does_not_exist'), 'blank');
        }

        $TYPES = $this->TYPES;
        $CATEGORYS = getcache('category_content_' . SITEID, 'commons');
        $TYPE = $TYPES[$typeid];
        $setting = string2array($TYPE['setting']);
        $r = $this->db->get_one(array('questionid' => $qid));
        if (!$r || $r['status'] <= 0) {
            showmessage(L('ask_type_information_does_not_exist'), 'blank');
        }

        //点击数、回复数
        $hits = $this->hits_db->get_one(array('questionid' => $qid));
        $r = array_merge($hits, $r);
        //问题是否过期
        $r['interval'] = $this->check_isinterval($TYPES[$typeid], $this->GLOABLE, $r['inputtime']);
        extract($r);

        //回复列表
        $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
        $pagesize = isset($_GET['pagesize']) && intval($_GET['pagesize']) > 0 ? intval($_GET['pagesize']) : 20;
        $page = max($page, 1);
        $where = "questionid={$qid} AND status>0";
        $replys = $this->reply_db->listinfo($where, 'replyid desc', $page, $pagesize);
        $pages = $this->reply_db->pages;

        //最顶级类型ID
        $arrparentid = explode(',', $TYPE['arrparentid']);
        $top_parentid = $arrparentid[1] ? $arrparentid[1] : $typeid;

        //SEO
        $SEO = ask_seo(SITEID, $typeid);

        //模板风格
        $template = $setting['show_template'] ? $setting['show_template'] : 'show';
        $default_style = $setting['template_list'] ? $setting['template_list'] : 'default';

        include template('ask', $template, $default_style);
    }

    /**
     * ajax在线咨询列表
     *
     * @return void
     */
    function ajaxAskList() {
       $WAP               = $this->wap;
        $TYPE              = $this->types;
        $WAP_SETTING       = string2array($WAP['setting']);
        $GLOBALS['siteid'] = max($this->siteid, 1);
        if ($_GET['ajax']==1) {
            
            $this->db = wy_base::load_model('ask_question_model');
            
            $page = isset($_GET['page']) && intval($_GET['page']) ? intval($_GET['page']) : 1;
            $list = $this->db->listinfo('',$order = 'inputtime DESC,questionid DESC',$page, 2);
            //$list=  $this->db->select("as a left join wy_ask_reply as b on a.questionid=b.questionid order by a.inputtime DESC");
            $this->db1 = wy_base::load_model('ask_reply_model');
            $ids = array();
            foreach ($list as $vo) {
                $ids[] = $vo['questionid'];  
            }
            $reply = $this->db1->select('questionid in ('. implode(',', $ids) .')');
            $replyArr = array();
            foreach ($reply as $vo) {
                $replyArr[$vo['questionid']] = $vo;  
            }
            foreach ($list as $k => $vo) {
                $reply = $replyArr[$vo['questionid']];
                $list[$k]['reply_content'] = $reply['content'];
            }
            $status = count($list) == 2 ? 1 : 0;
            exit(json_encode(array('status' => $status, 'data' => $list)));
        } else {
            exit(json_encode(''));
        }
    }

    /**
     * 问题列表页
     *
     * return null
     */
    public function lists() {
        $typeid = $this->typeid;
        $_userid = param::get_cookie('_userid');
        $_username = param::get_cookie('_username');
        $_nickname = param::get_cookie('_nickname');

        $TYPES = $this->TYPES;
        $CATEGORYS = getcache('category_content_' . SITEID, 'commons');
        $TYPE = $TYPES[$typeid];
        $siteid = $TYPE['siteid'];
        $setting = string2array($TYPE['setting']);

        //SEO
        $SEO = ask_seo(SITEID, $typeid);
        $page = isset($_GET['page']) ? intval($_GET['page']) : 0;
        $page = max($page, 1);

        //最顶级类型ID
        $arrparentid = explode(',', $TYPE['arrparentid']);
        $top_parentid = $arrparentid[1] ? $arrparentid[1] : $typeid;

        //模板风格
        $template = $setting['type_template'] ? $setting['type_template'] : 'type';
        $template_list = $setting['list_template'] ? $setting['list_template'] : 'list';
        $template = $TYPE['child'] ? $template : $template_list;
        $default_style = $setting['template_list'] ? $setting['template_list'] : 'default';

        include template('ask', $template, $default_style);
    }

    /**
     * 前台咨询，咨询form表单参数列表[typeid|name|title|content|comment|url]，comment参数可为万能填充字段
     *
     * return null
     */
    public function ask() {
        $TYPES = $this->TYPES;
        $_userid = param::get_cookie('_userid');
        $_username = param::get_cookie('_username');
        $_nickname = param::get_cookie('_nickname');

        //提交咨询，is_ajax=1表示AJAX请求，可设置url参数进行发布成功页面跳转
        if (isset($_POST['typeid']) && intval($_POST['typeid']) > 0) {
            $typeid = intval($_POST['typeid']);
            $jump_url = isset($_POST['url']) && trim($_POST['url']) != "" ? $_POST['url'] : HTTP_REFERER;
            $is_ajax = isset($_POST['is_ajax']) && intval($_POST['is_ajax']) == 1 ? true : false;
            $name = isset($_POST['name']) && trim($_POST['name']) != "" ? trim($_POST['name']) : '';
            $title = isset($_POST['title']) && trim($_POST['title']) != "" ? trim($_POST['title']) : '';
            $content = isset($_POST['content']) && trim($_POST['content']) != "" ? $_POST['content'] : '';
            $comment = isset($_POST['comment']) ? $_POST['comment'] : array();

            if (!$title || !$content) {           //标题和内容不为空
                if ($is_ajax) {
                    $result = array('status' => 'DATA_EMPTY', 'message' => L('ask_title_or_content_empty'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('ask_title_or_content_empty'), HTTP_REFERER);
                }
            }
            $comments = is_array($comment) ? array2string(get_ask_comment($this->GLOABLE, $comment)) : $comment;

            //权限检测
            $this->check_isexists($typeid, $is_ajax);            //检测分类是否已经存在
            $this->check_isclose($TYPES[$typeid], $is_ajax);     //检测分类是否已经关闭
            $this->check_isask($TYPES[$typeid], $this->GLOABLE, $is_ajax);   //检测是否可以咨询
            if ($this->GLOABLE['validate']) {     //如果开启验证码，则验证验证码正确性
                wy_base::load_sys_class('session_mysql');
                $code = isset($_POST['code']) && trim($_POST['code']) ? trim($_POST['code']) : '';
                if ($code == '' || $_SESSION['code'] != strtolower($code)) {
                    if ($is_ajax) {
                        $result = array('status' => 'CODE_ERROR', 'message' => L('ask_code_error'));
                        exit(json_encode($result));
                    } else {
                        showmessage(L('ask_code_error'), HTTP_REFERER);
                    }
                }
            }
            if (stristr($content, 'http://') || stristr($content, '</a>')) {
                $result = array('status' => 'STATUS_ERROR', 'message' => '输入格式不正确！');
                exit(json_encode($result));
            }
            //插入咨询数据
            $ask_data = array(
                'typeid' => $typeid,
                'siteid' => SITEID,
                'title' => $title,
                'content' => $content,
                'inputtime' => time(),
                'comment' => $comments
            );
            $ask_data['status'] = $this->GLOABLE['audit_ask'] ? 0 : 1;  //发布问题是否需要审核
            if ($_userid && param::get_cookie('auth')) {  //会员状态写入会员信息，否则写入普通用户信息
                $ask_data['memberid'] = $_userid;
                $ask_data['name'] = $_nickname ? $_nickname : $_username;
            } else {
                $ask_data['memberid'] = 0;
                $ask_data['name'] = $name;
            }
            $qid = $this->db->insert($ask_data, true);
            if (!$qid) {
                if ($is_ajax) {
                    $result = array('status' => 'FAILED', 'message' => L('ask_insert_failed'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('ask_insert_failed'), HTTP_REFERER);
                }
            }

            //插入点击数、回复数数据
            $hits_data = array(
                'questionid' => $qid,
                'hits' => 0,
                'replys' => 0
            );
            $this->hits_db->insert($hits_data);
            if ($is_ajax) {
                $result = array('status' => 'SUCCESS', 'message' => L('ask_insert_success'));
                exit(json_encode($result));
            } else {
                showmessage(L('ask_insert_success'), $jump_url);
            }
        }
        $typeid = $this->typeid;
        $TYPE = $typeid > 0 ? $TYPES[$typeid] : array();
        $CATEGORYS = getcache('category_content_' . SITEID, 'commons');

        //SEO
        $SEO = ask_seo(SITEID, '', $this->GLOABLE['title'], $this->GLOABLE['description'], $this->GLOABLE['keywords']);

        //模板风格使用站点全局设置风格
        $sitelist = getcache('sitelist', 'commons');
        $default_style = $sitelist[SITEID]['default_style'];
        if (!$default_style) {
            $default_style = 'default';
        }

        include template('ask', 'ask', $default_style);
    }

    /**
     * 前台回复咨询
     *
     * return null
     */
    public function reply() {
        if (isset($_POST['qid']) && intval($_POST['qid']) > 0) {
            $jump_url = isset($_POST['url']) && trim($_POST['url']) != "" ? $_POST['url'] : HTTP_REFERER;
            $is_ajax = isset($_POST['is_ajax']) && intval($_POST['is_ajax']) == 1 ? true : false;
            $name = isset($_POST['name']) && trim($_POST['name']) != "" ? trim($_POST['name']) : '';

            $content = isset($_POST['content']) && trim($_POST['content']) != "" ? $_POST['content'] : '';
            $comment = isset($_POST['comment']) ? $_POST['comment'] : array();
            if (!$content) {           //内容不为空
                if ($is_ajax) {
                    $result = array('status' => 'DATA_EMPTY', 'message' => L('reply_content_empty'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('reply_content_empty'), HTTP_REFERER);
                }
            }
            $comments = is_array($comment) ? array2string(get_ask_comment($this->GLOABLE, $comment)) : $comment;

            $TYPES = $this->TYPES;
            $qid = $_POST['qid'];
            $_userid = param::get_cookie('_userid');
            $_username = param::get_cookie('_username');
            $_nickname = param::get_cookie('_nickname');
            $question = $this->db->get_one(array('questionid' => $qid));
            if (empty($question) || $question['status'] <= 0) {  //咨询不存在，咨询未通过审核
                if ($is_ajax) {
                    $result = array('status' => 'NOT_EXISTS', 'message' => L('question_not_exists'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('question_not_exists'), HTTP_REFERER);
                }
            }

            //权限检测
            $typeid = $question['typeid'];
            $this->check_isexists($typeid, $is_ajax);            //检测分类是否已经存在
            $this->check_isclose($TYPES[$typeid], $is_ajax);     //检测分类是否已经关闭
            $this->check_isreply($this->TYPES[$typeid], $this->GLOABLE, $is_ajax);  //检测是否可以回复
            //问题是否过期
            if ($this->check_isinterval($this->TYPES[$typeid], $this->GLOABLE, $question['inputtime'])) {
                if ($is_ajax) {
                    $result = array('status' => 'INTERVAL', 'message' => L('question_is_interval'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('question_is_interval'), HTTP_REFERER);
                }
            }

            //插入回复数据
            $reply_data = array(
                'questionid' => $qid,
                'content' => $content,
                'inputtime' => time(),
                'comment' => $comments
            );
            $reply_data['status'] = $this->GLOABLE['audit_reply'] ? 0 : 1;  //回复咨询是否需要审核
            if ($_userid && param::get_cookie('auth')) {  //会员状态写入会员信息，否则写入普通用户信息
                $reply_data['memberid'] = $_userid;
                $reply_data['name'] = $_nickname ? $_nickname : $_username;
            } else {
                $reply_data['memberid'] = 0;
                $reply_data['name'] = $name;
            }
            //修改回复次数
            $hits_data = 'replys=replys+1';
            $where = array('questionid' => $qid);
            if ($this->reply_db->insert($reply_data) && $this->hits_db->update($hits_data, $where)) {
                if ($is_ajax) {
                    $result = array('status' => 'SUCCESS', 'message' => L('reply_insert_success'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('reply_insert_success'), $jump_url);
                }
            } else {
                if ($is_ajax) {
                    $result = array('status' => 'FAILED', 'message' => L('reply_insert_failed'));
                    exit(json_encode($result));
                } else {
                    showmessage(L('reply_insert_failed'), HTTP_REFERER);
                }
            }
        }
    }

    /**
     * 前台咨询消息显示页面，增加status参数用来显示不同的消息
     *
     * return null
     */
    public function message() {
        $TYPES = $this->TYPES;
        $status = isset($_GET['status']) ? trim($_GET['status']) : '';
        $_userid = param::get_cookie('_userid');
        $_username = param::get_cookie('_username');
        $_nickname = param::get_cookie('_nickname');
        $CATEGORYS = getcache('category_content_' . SITEID, 'commons');

        //SEO
        $SEO = ask_seo(SITEID, '', $this->GLOABLE['title'], $this->GLOABLE['description'], $this->GLOABLE['keywords']);

        //模板风格使用站点全局设置风格
        $sitelist = getcache('sitelist', 'commons');
        $default_style = $sitelist[SITEID]['default_style'];
        if (!$default_style) {
            $default_style = 'default';
        }

        include template('ask', 'message', $default_style);
    }

}

?>
