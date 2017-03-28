<?php
/**
 * ask后台推荐位页面
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */
defined('IN_WYCMS') or exit('No permission resources.');
wy_base::load_app_class('admin', 'admin', 0);
wy_base::load_app_func('global', 'ask');
wy_base::load_sys_class('form', '', 0);
/**
 * ask后台推荐位页面
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */
class position extends admin
{
    private $db;         //ask推荐位模型
    private $pos_db;     //ask推荐位数据模型
	private $ask_db;     //问题模型

    /**
     * 构造函数
     */
    function __construct()
    {
        parent::__construct();
        $this->db     = wy_base::load_model('ask_position_model');
        $this->pos_db = wy_base::load_model('ask_position_data_model');
        $this->ask_db = wy_base::load_model('ask_question_model');
        $this->sites  = wy_base::load_app_class('sites');
        define('SITEID', self::get_siteid());
    }

    /**
     * 初始化函数
     *
     * @return void
     */
    public function init()
    {
        $infos = array();
        $where = '';
        $current_siteid = SITEID;
        $TYPES = getcache('ask_type_' . $current_siteid, 'commons');
        $where = "`siteid`='$current_siteid' OR `siteid`='0'";
        $page = $_GET['page'] ? $_GET['page'] : '1';
        $infos = $this->db->listinfo($where, $order = 'listorder DESC,posid DESC', $page, $pagesize = 20);
        foreach ($infos as $k => $v) {
            $infos[$k]['num'] = $this->question_count($v['posid']);
        }
        $pages = $this->db->pages;
        $show_dialog = true;
        $big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=ask&c=position&a=add\', title:\''.L('posid_add').'\', width:\'500\', height:\'360\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('posid_add'));
        include $this->admin_tpl('position_list');
    }

    /**
     * 推荐位添加
     *
     * @return void
     */
    public function add()
    {
        if (isset($_POST['dosubmit'])) {
            if (!is_array($_POST['info']) || empty($_POST['info']['name'])) {
                showmessage(L('operation_failure'));
            }
            $_POST['info']['siteid'] = SITEID;
            $_POST['info']['typeid'] = intval($_POST['info']['typeid']);
            $_POST['info']['listorder'] = intval($_POST['info']['listorder']);
            $_POST['info']['thumb'] = $_POST['info']['thumb'];
            $insert_id = $this->db->insert($_POST['info'], true);
            $this->_set_cache();
            if ($insert_id) {
                showmessage(L('operation_success'), '', '', 'add');
            }
        } else {
            $show_header = $show_validator = true;
            include $this->admin_tpl('position_add');
        }

    }

    /**
     * 推荐位编辑
     *
     * @return void
     */
    public function edit()
    {
        if (isset($_POST['dosubmit'])) {
            $_POST['posid'] = intval($_POST['posid']);
            if (!is_array($_POST['info']) || empty($_POST['info']['name'])) {
                showmessage(L('operation_failure'));
            }
            $_POST['info']['siteid'] = intval($_POST['info']['modelid']) ? get_siteid() : 0;
            $_POST['info']['listorder'] = intval($_POST['info']['listorder']);
            $_POST['info']['thumb'] = $_POST['info']['thumb'];          
            $this->db->update($_POST['info'], array('posid'=>$_POST['posid']));
            $this->_set_cache();
            showmessage(L('operation_success'), '', '', 'edit');
        } else {
            $info = $this->db->get_one(array('posid'=>intval($_GET['posid'])));
            extract($info);
            $show_validator = $show_header = $show_scroll = true;
            include $this->admin_tpl('position_edit');
        }

    }

    /**
     * 推荐位删除
     *
     * @return void
     */
    public function delete()
    {
        $posid = intval($_GET['posid']);
        $this->db->delete(array('posid'=>$posid));
        $this->_set_cache();
        showmessage(L('posid_del_success'), '?m=ask&c=position');
    }

    /**
     * 推荐位排序
     *
     * @return void
     */
    public function listorder()
    {
        if (isset($_POST['dosubmit'])) {
            foreach ($_POST['listorders'] as $posid => $listorder) {
                $this->db->update(array('listorder'=>$listorder), array('posid'=>$posid));
            }
            $this->_set_cache();
            showmessage(L('operation_success'), '?m=ask&c=position');
        } else {
            showmessage(L('operation_failure'), '?m=ask&c=position');
        }
    }

    /**
     * 推荐位问题统计
     *
     * @param int $posid 推荐位ID
     *
     * @return int
     */
    public function question_count($posid)
    {
        $posid = intval($posid);
        $where = array('posid'=>$posid);
        $infos = $this->pos_db->get_one($where, $data = 'count(*) as count');
        return $infos['count'];
    }

    /**
     * 推荐位问题列表
     *
     * @return void
     */
    public function public_item()
    {
        if (isset($_POST['dosubmit'])) {
            $items = count($_POST['items']) > 0  ? $_POST['items'] : showmessage(L('posid_select_to_remove'), HTTP_REFERER);
            if (is_array($items)) {
                $sql = array();
                foreach ($items as $item) {
                    $this->pos_db->delete(array('id' => intval($item), 'posid' => $_POST['posid']));
                    $this->type_pos($item);
                }
            }
            showmessage(L('operation_success'), HTTP_REFERER);
        } else {
            $posid = intval($_GET['posid']);
            $TYPE = getcache('ask_type_' . SITEID, 'commons');
            $page = $_GET['page'] ? $_GET['page'] : '1';
            $pos_arr = $this->pos_db->listinfo(array('posid' => $posid, 'siteid' => SITEID), 'listorder DESC,id DESC', $page, $pagesize = 20);
            $pages = $this->pos_db->pages;
            $infos = array();
            foreach ($pos_arr as $_k => $_v) {
                $r = string2array($_v['data']);
                $r['typename'] = $CATEGORY[$_v['typeid']]['typename'];
                $r['posid'] = $_v['posid'];
                $r['id'] = $_v['id'];
                $r['listorder'] = $_v['listorder'];
                $r['typeid'] = $_v['typeid'];
                $key = $r['id'];
                $infos[$key] = $r;

            }
            $big_menu = array('javascript:window.top.art.dialog({id:\'add\',iframe:\'?m=ask&c=position&a=add\', title:\''.L('posid_add').'\', width:\'500\', height:\'300\', lock:true}, function(){var d = window.top.art.dialog({id:\'add\'}).data.iframe;var form = d.document.getElementById(\'dosubmit\');form.click();return false;}, function(){window.top.art.dialog({id:\'add\'}).close()});void(0);', L('posid_add'));
            include $this->admin_tpl('position_items');
        }
    }

    /**
     * 推荐位文章管理
     *
     * @return void
     */
    public function public_item_manage()
    {
        if (isset($_POST['dosubmit'])) {
            $posid = intval($_POST['posid']);
            $id= intval($_POST['id']);
            $pos_arr = $this->pos_db->get_one(array('id'=>$id, 'posid'=>$posid));
            $array = string2array($pos_arr['data']);
            $array['inputtime'] = strtotime($_POST['info']['inputtime']);
            $array['title'] = trim($_POST['info']['title']);
            $array['content'] = trim($_POST['info']['content']);
            $data = array2string($array);
            $this->pos_db->update($data, array('id' => $id, 'posid' => $posid));
            showmessage(L('operation_success'), '', '', 'edit');
        } else {
            $posid = intval($_GET['posid']);
            $id = intval($_GET['id']);
            if ($posid == 0 || $id == 0) {
                showmessage(L('linkage_parameter_error'), HTTP_REFERER);
            }
            $pos_arr = $this->pos_db->get_one(array('id' => $id, 'posid' => $posid));
            extract(string2array($pos_arr['data']));
            $show_validator = true;
            $show_header = true;
            include $this->admin_tpl('position_item_manage');
        }

    }

    /**
     * 推荐位文章排序
     *
     * @return void
     */
    public function public_item_listorder()
    {
        if (isset($_POST['posid'])) {
            foreach ($_POST['listorders'] as $id => $listorder) {
                $this->pos_db->update(array('listorder' => intval($listorder)), array('id' => $id, 'posid' => $_POST['posid']));
            }
            showmessage(L('operation_success'), HTTP_REFERER);
        } else {
            showmessage(L('operation_failure'), HTTP_REFERER);
        }
    }

    /**
     * 设置缓存
     *
     * @return array
     */
    private function _set_cache()
    {
        $infos = $this->db->select('', '*', 1000, 'listorder DESC');
        $positions = array();
        foreach ($infos as $info) {
            $positions[$info['posid']] = $info;
        }
        setcache('type_position', $positions, 'commons');
        return $infos;
    }

    /**
     * 问题推荐字段修改
     *
     * @param int $id id
     *
     * @return boolean
     */
    private function type_pos($id)
    {
        $id = intval($id);
        $posids = $this->pos_db->get_one(array('id' => $id)) ? 1 : 0;
        return $this->ask_db->update(array('posids' => $posids), array('questionid' => $id));
    }

    /**
     * 预览
     *
     * @return null
     */
    public function preview(){
        $thumb = $_GET['thumb'];
        include $this->admin_tpl('position_priview');   
    }
}
?>
