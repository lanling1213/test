<?php
/**
 * ask 后台管理
 *
 * @author  wycms chenzhongying  <1571465446@qq.com>
 */
defined('IN_WYCMS') or exit('No permission resources.');
wy_base::load_app_class('admin', 'admin', 0);
wy_base::load_sys_class('form','',0);
wy_base::load_sys_class('format','',0);
//模型缓存路径
define('CACHE_MODEL_PATH',CACHE_PATH.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);

/**
 * ask 后台管理
 *
 * @author    WYCMS chenzhongying <1571465446@qq.com>
 */
class ask extends admin
{
    private $siteid, $ask_type_db, $ask_setting_db, $ask_question_db, $ask_reply_db, $types, $ask_position_db, $ask_position_data_db, $ask_question_hits_db, $ask_global_config;
    /**
     * 构造函数
     *
     * @return null
     */
    public function __construct() {
        parent::__construct();
        $this->siteid = $this->get_siteid();
        $this->ask_type_db = wy_base::load_model('ask_type_model');
        $this->ask_setting_db = wy_base::load_model('ask_setting_model');
        $this->ask_question_db = wy_base::load_model('ask_question_model');
        $this->ask_reply_db = wy_base::load_model('ask_reply_model');
        $this->ask_position_db = wy_base::load_model('ask_position_model');
        $this->ask_position_data_db = wy_base::load_model('ask_position_data_model');
        $this->ask_question_hits_db = wy_base::load_model('ask_question_hits_model');
        $this->types = getcache('ask_type_'.$this->siteid, 'commons');
        $this->ask_global_config = getcache('ask_config_'.$this->siteid,'commons');
        wy_base::load_app_func('global', 'ask');
    }
    /**
     * 管理咨询分类初始化
     *
     * @return void
     */
    public function init() 
    {
        //$show_header = $show_dialog  = $show_wy_ssud = '';
        $show_wy_ssud = '';
        $tree = wy_base::load_sys_class('tree');
        $sitelist = getcache('sitelist', 'commons');
        $tree->icon = array('&nbsp;&nbsp;&nbsp;│ ', '&nbsp;&nbsp;&nbsp;├─ ', '&nbsp;&nbsp;&nbsp;└─ ');
        $tree->nbsp = '&nbsp;&nbsp;&nbsp;';
        $arr_types = array();
        $result = $this->types;
        $show_detail = count($result) < 500 ? 1 : 0;
        $parentid = $_GET['parentid'] ? intval($_GET['parentid']) : 0;
        
        if (!empty($result)) {
            foreach ($result as $r) {
                $r['modelname'] = $models[$r['modelid']]['name'];
                $r['str_manage'] = '';
                if (!$show_detail) {
                    if ($r['parentid']!=$parentid) {
                        continue;
                    }
                    $r['parentid'] = 0;
                    $r['str_manage'] .= '<a href="?m=ask&c=ask&a=init&parentid='.$r['typeid'].'&menuid='.$_GET['menuid'].'&s='.$r['type'].'&wy_ssud='.$_SESSION['wy_ssud'].'">'.L('manage_sub_category').'</a> | ';
                }
                $r['str_manage'] .= '<a href="?m=ask&c=ask&a=add_type&parentid='.$r['typeid'].'&menuid='.$_GET['menuid'].'&s='.$r['type'].'&wy_ssud='.$_SESSION['wy_ssud'].'">'.L('ask_add_sub_type').'</a> | ';
                $r['str_manage'] .= '<a href="?m=ask&c=ask&a=edit&typeid='.$r['typeid'].'&menuid='.$_GET['menuid'].'&type='.$r['type'].'&wy_ssud='.$_SESSION['wy_ssud'].'">'.L('edit').'</a> | <a href="javascript:confirmurl(\'?m=ask&c=ask&a=delete&typeid='.$r['typeid'].'&menuid='.$_GET['menuid'].'\',\''.L('confirm', array('message'=>addslashes($r['typename']))).'\')">'.L('delete').'</a>';
                $setting = string2array($r['setting']);
                $r['display_close_icon'] = !$setting['isclose'] ? '' : ' <img src ="'.IMG_PATH.'icon/gear_disable.png" title="'.L('close').'">';
                $arr_types[$r['typeid']] = $r;
            }
        }
        $str  = "<tr>
                    <td align='center'><input name='listorders[\$id]' type='text' size='3' value='\$listorder' class='input-text-c'></td>
                    <td align='center'>\$id</td>
                    <td>\$spacer<a target='_blank' href='index.php?m=ask&c=index&a=lists&typeid=\$typeid'>\$typename<a>\$display_close_icon</td>
                    <td align='center'>\$items</td>
                    <td align='center'>\$str_manage</td>
                </tr>";
        $tree->init($arr_types);
        $all_types = $tree->get_tree(0, $str);
        include $this->admin_tpl('type_manage');
    }
    /**
     * 添加咨询分类
     *
     * @return void
     */
    public function add_type() 
    {
        if (isset($_POST['dosubmit'])) {
            wy_base::load_sys_func('iconv');

            if (isset($_POST['batch_add']) && empty($_POST['batch_add'])) {
                if ($_POST['info']['typename']=='') {
                    showmessage(L('input_typename'));
                }
                $_POST['info']['typename'] = safe_replace($_POST['info']['typename']);
                $_POST['info']['typename'] = str_replace(array('%'),'',$_POST['info']['typename']);
                if ($_POST['info']['typename']=='') {
                    showmessage(L('input_typeame'));
                }
                if (!$this->public_check_typename(0, $_POST['info']['typename'])) {
                    showmessage(L('typename_have_exists'));
                }
            }
            $_POST['info']['siteid'] = $this->siteid;
            $arr_seo = array('type_template','list_template','show_template','meta_title', 'meta_keywords', 'meta_description');
            foreach($_POST['setting'] as $k=>$v){
                if (!in_array($k, $arr_seo)) {
                    $_POST['setting'][$k] = intval(trim($v));
                }
            }
            $_POST['info']['setting'] = array2string($_POST['setting']);
            $end_str = $old_end =  '<script type="text/javascript">window.top.art.dialog({id:"test"}).close();window.top.art.dialog({id:"test",content:\'<h2>'.L("add_success").'</h2><span style="fotn-size:16px;">'.L("following_operation").'</span><br /><ul style="fotn-size:14px;"><li><a href="?m=ask&c=ask&a=public_cache&menuid='.$_POST['menuid'].'" target="right"  onclick="window.top.art.dialog({id:\\\'test\\\'}).close()">'.L("following_operation_1").'</a></li><li><a href="'.HTTP_REFERER.'" target="right" onclick="window.top.art.dialog({id:\\\'test\\\'}).close()">'.L("following_operation_2").'</a></li></ul>\',width:"400",height:"200"});</script>';
            if (!isset($_POST['batch_add']) || empty($_POST['batch_add'])) {
                $typename = CHARSET == 'gbk' ? $_POST['info']['typename'] : iconv('utf-8', 'gbk', $_POST['info']['typename']);
                $this->ask_type_db->insert($_POST['info'], true);
            } else {//批量添加
                $end_str = '';
                $batch_adds = explode("\n", $_POST['batch_add']);
                foreach ($batch_adds as $_v) {
                    if (trim($_v)=='') {
                        continue;
                    }
                    $_POST['info']['typename'] = trim($_v);
                    if(!$this->public_check_typename(0,$_POST['info']['typename'])) {
                        $end_str .= $end_str ? ','.$_POST['info']['typename'] : $_POST['info']['typename'];
                        continue;
                    }
                    $this->ask_type_db->insert($_POST['info'], true);
                }
                $end_str = $end_str ? L('follow_typename_have_exists').$end_str : $old_end;
            }
            $this->cache();
            showmessage(L('add_success').$end_str);
        } else {
            //获取站点模板信息
            wy_base::load_app_func('global');
            $template_list = template_list($this->siteid, 0);
            foreach ($template_list as $k=>$v) {
                $template_list[$v['dirname']] = $v['name'] ? $v['name'] : $v['dirname'];
                unset($template_list[$k]);
            }
            $show_validator = '';
            //添加子级，显示父级的设置
            if (isset($_GET['parentid'])) {
                $parentid = $_GET['parentid'];
                $r = $this->ask_type_db->get_one(array('typeid'=>$parentid,'siteid'=>$this->siteid));
                if ($r) {
                    extract($r, EXTR_SKIP);
                }
                $setting = string2array($setting);
            }
            wy_base::load_sys_class('form', '', 0);
            include $this->admin_tpl('type_add');
        }
    }
    /**
     * 修改分类
     */
    public function edit() 
    {
        if(isset($_POST['dosubmit'])) {
            wy_base::load_sys_func('iconv');
            $typeid = 0;
            $typeid = intval($_POST['typeid']);
            $setting = $_POST['setting'];
            $_POST['info']['setting'] = array2string($setting);
            $typename = CHARSET == 'gbk' ? safe_replace($_POST['info']['typename']) : iconv('utf-8','gbk',safe_replace($_POST['info']['typename']));
            $typename = str_replace(array('%'),'',$typename);

            //应用设置跟模板到所有子栏目
            if($_POST['setting_template_child'] || $_POST['setting_pri_child']){
                $this->types = $types = $this->ask_type_db->select(array('siteid'=>$this->siteid), '*', '', 'listorder ASC, typeid ASC', '', 'typeid');
                $idstr = $this->get_arrchildid($typeid);
                 if(!empty($idstr)){
                    $sql = "select typeid,setting from wy_ask_type where typeid in($idstr) and siteid={$this->siteid}";
                    $this->ask_type_db->query($sql);
                    $arr = $this->ask_type_db->fetch_array();
                     if(!empty($arr)){
                            foreach ($arr as $v){
                                if ($_POST['setting_template_child'] && $_POST['setting_pri_child']) {
                                    $new_setting = array2string(
                                    array_merge(string2array($v['setting']), array('isclose' => $_POST['setting']['isclose'],'isreply' =>  $_POST['setting']['isreply'],'isvisitor_ask' =>  $_POST['setting']['isvisitor_ask'],'isvisitor_reply' =>  $_POST['setting']['isvisitor_reply'],'interval_time' =>  $_POST['setting']['interval_time'],'template_list' => $_POST['setting']['template_list'],'type_template' => $_POST['setting']['type_template'],'list_template' =>  $_POST['setting']['list_template'],'show_template' =>  $_POST['setting']['show_template'])));
                                } elseif (!$_POST['setting_template_child'] && $_POST['setting_pri_child']) {
                                    $new_setting = array2string(
                                    array_merge(string2array($v['setting']), array('isclose' => $_POST['setting']['isclose'],'isreply' =>  $_POST['setting']['isreply'],'isvisitor_ask' =>  $_POST['setting']['isvisitor_ask'],'isvisitor_reply' =>  $_POST['setting']['isvisitor_reply'],'interval_time' =>  $_POST['setting']['interval_time'])));
                                } elseif ($_POST['setting_template_child'] && !$_POST['setting_pri_child']) {
                                    $new_setting = array2string(
                                    array_merge(string2array($v['setting']), array('template_list' => $_POST['setting']['template_list'],'type_template' => $_POST['setting']['type_template'],'list_template' =>  $_POST['setting']['list_template'],'show_template' =>  $_POST['setting']['show_template'])));
                                }
                                $this->ask_type_db->update(array('setting'=>$new_setting), array('typeid'=>$v['typeid'],'siteid'=>$this->siteid));
                            }
                    }    
                }
            }
            
            $this->ask_type_db->update($_POST['info'],array('typeid'=>$typeid,'siteid'=>$this->siteid));
            $this->cache();
            //更新附件状态
            showmessage(L('operation_success').'<script type="text/javascript">window.top.art.dialog({id:"test"}).close();window.top.art.dialog({id:"test",content:\'<h2>'.L("operation_success").'</h2><span style="fotn-size:16px;">'.L("edit_following_operation").'</span><br /><ul style="fotn-size:14px;"><li><a href="?m=ask&c=ask&a=public_cache&menuid='.$_POST['menuid'].'" target="right"  onclick="window.top.art.dialog({id:\\\'test\\\'}).close()">'.L("following_operation_1").'</a></li></ul>\',width:"400",height:"200"});</script>','?m=ask&c=ask&a=init');
        } else {
            //获取站点模板信息
            wy_base::load_app_func('global');
            $template_list = template_list($this->siteid, 0);
            foreach ($template_list as $k=>$v) {
                $template_list[$v['dirname']] = $v['name'] ? $v['name'] : $v['dirname'];
                unset($template_list[$k]);
            }
            $show_validator = $typeid = $r = '';
            $typeid = intval($_GET['typeid']);
            wy_base::load_sys_class('form','',0);
            $r = $this->ask_type_db->get_one(array('typeid'=>$typeid, 'siteid'=>$this->siteid));
            if ($r) {
                extract($r);
            }
            $setting = string2array($setting);
            include $this->admin_tpl('type_edit');

        }   
    }
    /**
     * 删除分类
     *
     * @return void
     */
    public function delete() 
    {
        $typeid = intval($_GET['typeid']);
        if($this->types[$typeid]['items']) {
            showmessage(L('types_does_not_allow_delete'));
        }
        $this->delete_child($typeid);
        $this->ask_type_db->delete(array('typeid'=>$typeid, 'siteid'=>$this->siteid));
        $this->cache();
        showmessage(L('operation_success'),HTTP_REFERER);
    }
    
    /**
     * 递归删除分类
     *
     * @param $typeid 要删除的分类id
     * 
     * @return bool
     */
    private function delete_child($typeid) 
    {
        $typeid = intval($typeid);
        if (empty($typeid)) {
            return false;
        }
        $r = $this->ask_type_db->get_one(array('parentid'=>$typeid, 'siteid'=>$this->siteid));
        if($r) {
            $this->delete_child($r['typeid']);
            $this->ask_type_db->delete(array('typeid'=>$r['typeid'], 'siteid'=>$this->siteid));
        }
        return true;
    }
    /**
     * 更新缓存并修复类别
     *
     * @return boolean
     */
    public function public_cache()
    {
        $this->repair();
        $this->cache();
        //menuid 是为了返回使返回的页面的导航菜单正常
        showmessage(L('operation_success'),'?m=ask&c=ask&a=init&menuid='.$_REQUEST['menuid']);
    }
    /**
     * 修复类别数据
     *
     * @return boolean true
     */
    private function repair()
    {
        wy_base::load_sys_func('iconv');
        @set_time_limit(600);
        $this->types = $types = array();
        $this->types = $types = $this->ask_type_db->select(array('siteid'=>$this->siteid), '*', '', 'listorder ASC, typeid ASC', '', 'typeid');
        if (is_array($this->types)) {
            foreach($this->types as $typeid => $typedata) {
                $arrparentid = $this->get_arrparentid($typeid);
                $setting = string2array($typedata['setting']);
                $arrchildid = $this->get_arrchildid($typeid);
                $child = is_numeric($arrchildid) ? 0 : 1;
                if ($types[$typeid]['arrparentid']!=$arrparentid || $types[$typeid]['arrchildid']!=$arrchildid || $types[$typeid]['child']!=$child) {
                    $this->ask_type_db->update(array('arrparentid'=>$arrparentid,'arrchildid'=>$arrchildid,'child'=>$child),array('typeid'=>$typeid));
                }
                $listorder = $typedata['listorder'] ? $typedata['listorder'] : $typeid;
                if ($types[$typeid]['listorder']!=$listorder) {
                    $this->ask_type_db->update(array('listorder'=>$listorder), array('typeid'=>$typeid));
                }
            }
        }
        //删除在非正常显示的栏目
        foreach ($this->types as $typeid => $typedata) {
            if ($typedata['parentid'] != 0 && !isset($this->types[$typedata['parentid']])) {
                $this->ask_type_db->delete(array('typeid'=>$typeid));
            }
        }
        return true;
    }
    /**
     * 更新缓存
     *
     * @return boolean
     */
    public function cache()
    {
        $types = $this->types = array();
        $this->types = $this->ask_type_db->select(array('siteid'=>$this->siteid),'*',10000,'listorder ASC');
        foreach($this->types as $r) {
            $setting = string2array($r['setting']);
            $r['isclose'] = $setting['isclose'];
            $r['isreply'] = $setting['isreply'];
            $r['isvisitor_ask'] = $setting['isvisitor_ask'];
            $r['isvisitor_reply'] = $setting['isvisitor_reply'];
            $r['interval_time'] = $setting['interval_time'];
            $r['interval_time'] = $setting['interval_time'];
            $types[$r['typeid']] = $r;
        }
        setcache('ask_type_'.$this->siteid,$types,'commons');
        return true;
    }
    /**
     * 获取父栏目ID列表
     * 
     * @param integer $typeid              栏目ID
     * @param array $arrparentid          父目录ID
     * @param integer $n                  查找的层次
     */
    private function get_arrparentid($typeid, $arrparentid = '', $n = 1) 
    {
        if($n > 5 || !is_array($this->types) || !isset($this->types[$typeid])) return false;
        $parentid = $this->types[$typeid]['parentid'];
        $arrparentid = $arrparentid ? $parentid.','.$arrparentid : $parentid;
        if($parentid) {
            $arrparentid = $this->get_arrparentid($parentid, $arrparentid, ++$n);
        } else {
            $this->types[$typeid]['arrparentid'] = $arrparentid;
        }
        $parentid = $this->types[$typeid]['parentid'];
        return $arrparentid;
    }
    /**
     * 
     * 获取子栏目ID str
     * @param $typeid 栏目ID
     */
    private function get_arrchildid($typeid) 
    {
        $arrchildid = $typeid;
        if(is_array($this->types)) {
            foreach($this->types as $id => $cat) {
                if($cat['parentid'] && $id != $typeid && $cat['parentid']==$typeid) {
                    $arrchildid .= ','.$this->get_arrchildid($id);
                }
            }
        }
        return $arrchildid;
    }
    
    /**
     * 检查分类名是否存在
     *
     * @param int    $return_method 返回方法
     * @param string $catdir        目录
     *
     * @return boolean
     */
    public function public_check_typename($return_method = 1, $typename = '')
    {
        $old_typename = '';
        $typename = $typename ? $typename : $_GET['typename'];
        $parentid = intval($_GET['parentid']);
        $old_typename = $_GET['old_typename'];
        $r = $this->ask_type_db->get_one(array('siteid'=>$this->siteid, 'typename'=>$typename, 'parentid'=>$parentid));
        if ($r && $old_typename == $r['typename']) {
            if ($return_method) {
                exit('0');
            } else {
                return false;
            }
        } else {
            if ($return_method) {
                exit('1');
            } else {
                return true;
            }
        }
    }
    
    /**
     * 咨询全局设置
     *
     * @return void
     */
    public function setting() 
    {
        $cur_site_set_data = $this->ask_setting_db->get_one(array('siteid'=>$this->siteid));
        if (isset($_POST['dosubmit'])) {
            if (empty($_POST['info'])) {
                showmessage(L('operation_failure'), HTTP_REFERER);
            }
            $arr_default_value = array(
                'close' => '0',
                'validate' => '0',
                'audit_ask' => '0',
                'audit_reply' => '0',
                'allow_visitors_ask' => '0',
                'allow_visitors_reply' => '0'
            );
            $arr_seo = array('title', 'keywords', 'description', 'comment');
            foreach($_POST['info'] as $k=>$v){
                if (!in_array($k, $arr_seo)) {
                    $_POST['info'][$k] = intval(trim($v));
                }
            }
            //补全传过来的参数默认为0
            $arr_diff = array_diff_key($arr_default_value, $_POST['info']);
            if (!empty($arr_diff)) {
                $arr_setting = array_merge($_POST['info'], $arr_diff);
            } else {
                $arr_setting = $_POST['info'];
            }
            if ($cur_site_set_data) {
                $arr_update_where = array('setting'=>array2string($arr_setting));
                $this->ask_setting_db->update($arr_update_where, array('siteid'=>$this->siteid));
                setcache('ask_config_'.$this->siteid, $arr_setting, 'commons');
                showmessage(L('operation_success'), HTTP_REFERER);
            } else {
                $arr_insert_where = array('siteid'=>$this->siteid, 'setting'=>array2string($arr_setting));
                $this->ask_setting_db->insert($arr_insert_where);
                setcache('ask_config_'.$this->siteid, $arr_setting, 'commons');
                showmessage(L('operation_success'), HTTP_REFERER);
            }
        } else {
            $show_header = true;
            $arr_ask_setting = string2array($cur_site_set_data['setting']);
            include $this->admin_tpl('ask_setting');
        }
    }
    
    /**
     * 重新计算咨询类别信息数量
     *
     * @return unknow_type
     */
    public function count_items()
    {
        $result = $this->ask_type_db->select('');
        foreach ($result as $r) {
            if ($r['child']==1) {
                $number = $this->ask_question_db->count("typeid in ({$r['arrchildid']}) and siteid = {$this->siteid}");
            } else {
                $number = $this->ask_question_db->count(array('typeid'=>$r['typeid'],'siteid'=>$this->siteid));
            }
            $this->ask_type_db->update(array('items'=>$number), array('typeid'=>$r['typeid'],'siteid'=>$this->siteid));
        }
        $this->cache();
        showmessage(L('operation_success'), HTTP_REFERER);
    }
    
    /**
     * 重新计算该分类下的所有问题回复数量
     *
     * @return unknow_type
     */
    public function count_reply_nums()
    {
        if (intval(trim($_GET['typeid']))=='') {
            showmessage(L("missing_part_parameters"),HTTP_REFERER);
        }
        $result = $this->ask_question_db->select(array('typeid'=>intval(trim($_GET['typeid'])), 'siteid'=>$this->siteid), 'questionid');
        foreach ($result as $r) {
            $number = $this->ask_reply_db->count(array('questionid'=>$r['questionid']));
            
            $r = $this->ask_question_hits_db->get_one(array('questionid'=>$r['questionid']));
            if ($r) {
                $this->ask_question_hits_db->update("replys = {$number}", array('questionid'=>$r['questionid'])); 
            } else {
                $this->ask_question_hits_db->insert(array('questionid'=>$r['questionid'], 'replys'=>$number), true);
            }
        }
        showmessage(L('operation_success'), HTTP_REFERER);
    }
    
    /**
     * json方式加载模板
     *
     * @return json str
     */
    public function public_tpl_file_list() 
    {
        $style = isset($_GET['style']) && trim($_GET['style']) ? trim($_GET['style']) : exit(0);
        $typeid = isset($_GET['typeid']) && intval($_GET['typeid']) ? intval($_GET['typeid']) : 0;
        $batch_str = isset($_GET['batch_str']) ? '['.$typeid.']' : '';
        if ($typeid) {
            $type = getcache('ask_type_'.$this->siteid,'commons');
            $type = $type[$typeid];
            $type['setting'] = string2array($type['setting']);
        }
        wy_base::load_sys_class('form','',0);
        $html = array(
            'type_template'=> form::select_template($style, 'ask',(isset($type['setting']['type_template']) && !empty($type['setting']['type_template']) ? $type['setting']['type_template'] : 'type'),'name="setting'.$batch_str.'[type_template]"','type'), 
            'list_template'=>form::select_template($style, 'ask',(isset($type['setting']['list_template']) && !empty($type['setting']['list_template']) ? $type['setting']['list_template'] : 'list'),'name="setting'.$batch_str.'[list_template]"','list'),
            'show_template'=>form::select_template($style, 'ask',(isset($type['setting']['show_template']) && !empty($type['setting']['show_template']) ? $type['setting']['show_template'] : 'show'),'name="setting'.$batch_str.'[show_template]"','show')
        );
        if (CHARSET == 'gbk') {
            $html = array_iconv($html, 'gbk', 'utf-8');
        }
        echo json_encode($html);
    }
    /**
     * question_list 
     *
     * @return json str
     */
    public function question_list() 
    {
        
        $show_header = $show_dialog  = $show_wy_ssud = '';
        $arrSite = getcache('sitelist', 'commons');
        if(isset($_GET['typeid']) && $_GET['typeid'] && $this->types[$_GET['typeid']]['siteid']==$this->siteid) {
            $typeid = $_GET['typeid'] = intval($_GET['typeid']);
            $type = $this->types[$typeid];
            $setting = string2array($type['setting']);
            $where = 'typeid='.$typeid;
            //搜索
            if (isset($_GET['status']) && $_GET['status']!='') {
                if ($_GET['status']=='-1') {
                    $where .= ' AND status=0';
                } else {
                    $where .= ' AND status='.$_GET['status'];
                }
            }
            if(isset($_GET['start_time']) && $_GET['start_time']) {
                $start_time = strtotime($_GET['start_time']);
                $where .= " AND `inputtime` > '$start_time'";
            }
            if(isset($_GET['end_time']) && $_GET['end_time']) {
                $end_time = strtotime($_GET['end_time']);
                $where .= " AND `inputtime` < '$end_time'";
            }
            if($start_time>$end_time) showmessage(L('starttime_than_endtime'));
            if(isset($_GET['keyword']) && !empty($_GET['keyword'])) {
                $type_array = array('title','name');
                $searchtype = intval($_GET['searchtype']);
                if ($searchtype < 2) {
                    $searchtype = $type_array[$searchtype];
                    $keyword = strip_tags(trim($_GET['keyword']));
                    $where .= " AND `$searchtype` like '%$keyword%'";
                } elseif ($searchtype==2) {
                    $keyword = intval($_GET['keyword']);
                    $where .= " AND `questionid`='$keyword'";
                }
            }
            $where .= " AND `siteid`={$this->siteid}";
            if(isset($_GET['posids']) && !empty($_GET['posids'])) {
                $posids = $_GET['posids']!='' ? intval($_GET['posids']) : 0;
                if ($posids == 1) {
                    $where .= " AND `posids` = {$posids}";
                } elseif ($posids == 2) {
                    $where .= " AND `posids` = '0'";
                }
            }
            $_GET['page'] = $_GET['page'] ? $_GET['page'] : 1; 
            $datas = $this->ask_question_db->listinfo($where,'questionid desc',$_GET['page']);
            $pages = $this->ask_question_db->pages;
            
            $wy_ssud = $_SESSION['wy_ssud'];
            include $this->admin_tpl('question_list', 'ask');
        } else {
            include $this->admin_tpl('question_quick', 'ask');
        }
    }
    /**
     * 显示栏目菜单列表
     */
    public function public_types() 
    {
        $show_header = '';
        $tree = wy_base::load_sys_class('tree');
        $types = array();
        if(!empty($this->types)) {
            foreach($this->types as $r) {
                $r['icon_type'] = $r['vs_show'] = '';
                $r['type'] = 'question_list';
                $r['add_icon'] = "<a><img src='".IMG_PATH."file.gif' alt='".L('add')."'></a> ";
                $types[$r['typeid']] = $r;
            }
        }
        if(!empty($types)) {
            $tree->init($types);
            $strs = "<span class='\$icon_type'>\$add_icon<a href='?m=ask&c=ask&a=\$type&status=0&menuid=".$_GET['menuid']."&typeid=\$typeid' target='right' onclick='open_list(this)'>\$typename</a></span>";
            $strs2 = "<span class='folder'>\$typename</span>";
            $types = $tree->get_treeview(0,'type_tree',$strs,$strs2,$ajax_show);
        } else {
            $types = L('please_add_type');
        }
        include $this->admin_tpl('type_tree');
        exit;
    }
    /**
     * 快速进入搜索
     *
     * @return void
     */
    public function public_ajax_search()
    {
        if ($_GET['typename']) {
            $field = 'typename';
            $typename = trim($_GET['typename']);
            if (CHARSET == 'gbk') {
                $typename = iconv('utf-8', 'gbk', $typename);
            }
            $result = $this->ask_type_db->select("$field LIKE('$typename%') AND siteid='$this->siteid' AND child=0", 'typeid,typename', 10);
            if (CHARSET == 'gbk') {
                $result = array_iconv($result, 'gbk', 'utf-8');
            }
            echo json_encode($result);
        }
    }
    
    /**
     * 问题排序
     * 
     * @return void
     */
    public function type_listorder() 
    {
        if(isset($_GET['dosubmit'])) {
            //print_r($_POST);exit;
            foreach($_POST['listorders'] as $typeid => $listorder) {
                $this->ask_type_db->update(array('listorder'=>intval($listorder)),array('typeid'=>intval($typeid), 'siteid'=>$this->siteid));
                $this->cache();
            }
            showmessage(L('operation_success'),HTTP_REFERER);
        } else {
            showmessage(L('operation_failure'),HTTP_REFERER);
        }
    }
    
    /**
     * 问题排序
     * 
     * @return void
     */
    public function listorder() 
    {
        if(isset($_GET['dosubmit'])) {
            foreach($_POST['listorders'] as $questionid => $listorder) {
                $this->ask_question_db->update(array('listorder'=>intval($listorder)),array('questionid'=>intval($questionid), 'siteid'=>$this->siteid));
            }
            showmessage(L('operation_success'),HTTP_REFERER);
        } else {
            showmessage(L('operation_failure'),HTTP_REFERER);
        }
    }
    /**
     * 修改问题状态
     *
     * @returne void
     */
    public function change_question_status()
    {
        if(isset($_GET['dosubmit'])) {
            if (is_array($_REQUEST['ids'])) {
                $arrquestionid = $_REQUEST['ids'];
                $questionid = implode(',', $arrquestionid);
            } else {
                $questionid = intval(trim($_REQUEST['questionid']));
            }
            //0待审核 1已审核 99已解决
            $_GET['status'] =  $_GET['status']<0 ? 0 : $_GET['status'];
            if (intval(trim($_GET['status'])) != '') {
                $status = intval(trim($_GET['status']));
            } else {
                showmessage(L('status_param_not_right'),HTTP_REFERER);
            }
            $where = "questionid IN ({$questionid}) AND siteid={$this->siteid}";
            $data = array('status'=>$status);
            //问题表
            $this->ask_question_db->update($data, $where);
            showmessage(L('operation_success'),HTTP_REFERER);
        } else {
            showmessage(L('operation_failure'),HTTP_REFERER);
        }
    }
    /**
     * 修改回复状态
     *
     * @returne void
     */
    public function change_reply_status()
    {
        if(isset($_GET['dosubmit'])) {
            if (is_array($_REQUEST['ids'])) {
                $arrreplyid = $_REQUEST['ids'];
                $replyid = implode(',', $arrreplyid);
            } else {
                $replyid = intval(trim($_REQUEST['replyid']));
            }
            //0待审核 1已审核 99已解决
            $_GET['status'] =  $_GET['status']<0 ? 0 : $_GET['status'];
            if (intval(trim($_GET['status'])) != '') {
                $status = intval(trim($_GET['status']));
            } else {
                showmessage(L('status_param_not_right'),HTTP_REFERER);
            }
            $where = "replyid in ({$replyid})";
            $data = array('status'=>$status);
            //问题表
            $this->ask_reply_db->update($data, $where);
            showmessage(L('operation_success'),HTTP_REFERER);
        } else {
            showmessage(L('operation_failure'),HTTP_REFERER);
        }
    }
    /**
     * 删除问题
     *
     * @returne void
     */
    public function delete_question() 
    {
        if(isset($_GET['dosubmit'])) {
            if (is_array($_REQUEST['ids'])) {
                $arrquestionid = $_REQUEST['ids'];
                $questionid = implode(',', $arrquestionid);
            } else {
                $questionid = intval(trim($_REQUEST['questionid']));
            }
            $where = "questionid in ({$questionid}) AND siteid={$this->siteid}";
            $no_siteid_where = "questionid in ({$questionid})";
            $pos_where = "posid in ({$questionid}) AND siteid={$this->siteid}";
            //问题表
            $this->ask_question_db->delete($where);
            //统计表
            $this->ask_question_hits_db->delete($no_siteid_where);
            //回复表
            $this->ask_reply_db->delete($no_siteid_where);
            //推荐位
            $this->ask_position_db->delete($pos_where); 
            showmessage(L('operation_success'),HTTP_REFERER);
        } else {
            showmessage(L('operation_failure'),HTTP_REFERER);
        }
    }
    /**
     * 删除回复
     *
     * @returne void
     */
    public function delete_reply() 
    {
        if(isset($_GET['dosubmit'])) {
            if (is_array($_REQUEST['ids'])) {
                $arrreplyid = $_REQUEST['ids'];
                $num = count($arrreplyid);
                $replyid = implode(',', $arrreplyid);
                
            } else {
                $replyid = intval(trim($_GET['replyid']));
            }
            //统计表
            $sql = "UPDATE wy_ask_question_hits,wy_ask_reply SET wy_ask_question_hits.replys = wy_ask_question_hits.replys - {$num} WHERE wy_ask_question_hits.questionid = wy_ask_reply.questionid AND wy_ask_reply.replyid in ({$replyid}) AND wy_ask_question_hits.replys>0";
            $curReplyData = $this->ask_question_hits_db->query($sql);
            
            //回复表
            $where = "replyid in ({$replyid})";
            $this->ask_reply_db->delete($where);
            showmessage(L('operation_success'),HTTP_REFERER);
        } else {
            showmessage(L('operation_failure'),HTTP_REFERER);
        }
    }
    
    /**
     * 回复及修改回复列表
     *
     * @returne void
     */
    public function reply_content()
    {
        if(isset($_POST['dosubmit'])) {
            
            if (intval(trim($_POST['questionid']))=='') {
                showmessage(L("missing_part_parameters"),HTTP_REFERER);
            }
            $admin_username = param::get_cookie('admin_username');
            $userid = $_SESSION['userid'];
            if ($admin_username == '' || $userid=='') {
                showmessage(L("please_login"),HTTP_REFERER);
            }
            //插入回复/更新回复
            $r = $this->ask_reply_db->get_one(array('questionid'=>$_POST['questionid']));
            $arrInsertData = array('questionid'=>$_POST['questionid'], 'name'=>$admin_username, 'userid'=>$userid, 'inputtime'=>SYS_TIME, 'updatetime'=>SYS_TIME, 'status'=>'1', 'content'=>$_POST['content']);
            if ($r) {
                $up = $this->ask_reply_db->update($arrInsertData, array('questionid'=>$_POST['questionid']));
                $up ? showmessage(L("update_success"),HTTP_REFERER) : showmessage(L("update_failure"),HTTP_REFERER);
            } else {
                $id = $this->ask_reply_db->insert($arrInsertData, true);
                $id ? showmessage(L("reply_success"),HTTP_REFERER) : showmessage(L("reply_failure"),HTTP_REFERER);
            }
        } else {
            if (intval(trim($_GET['questionid']))!='') {
                $questionid = intval(trim($_GET['questionid']));
                $data = $this->ask_question_db->get_one(array('questionid'=>$questionid, 'siteid'=>$this->siteid));
                extract($data);
                // $type = $this->types[$typeid];
                
                $comment = string2array($comment);
                $tel = $comment['tel'] ? intval($comment['tel']) : '';
                $reply_data = $this->ask_reply_db->get_one(array('questionid'=>$questionid));
                
                include $this->admin_tpl('reply_and_change_list', 'ask');
                
            } else {
                showmessage(L('missing_part_parameters'));
            }
        }
    }

}
?>
