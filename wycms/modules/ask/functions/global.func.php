<?php 
/**
 * global.func.php (ask)公告函数
 *
 * @author wycms <wycms@wayoulegal.net>
 * @copyright 2010-2031 WYCMS (C)
 */
/**
 * 栏目选择
 *
 * @param string       $file           类别缓存文件名
 * @param intval/array $typeid         选中的ID，多选是可以是数组
 * @param string       $str            属性
 * @param string       $default_option 默认选项
 * @param intval       $siteid         如果设置了siteid 那么则按照siteid取
 * 
 * @return string
 */
function select_type($file = '', $typeid = 0, $str = '', $default_option = '', $siteid = 0)
{
    $tree = wy_base::load_sys_class('tree');
    if (!$siteid) {
        $siteid = param::get_cookie('siteid');
    }
    if (!$file) {
        $file = 'ask_type_'.$siteid;
    }
    $result = getcache($file, 'commons');
    $string = '<select '.$str.'>';
    if ($default_option) {
        $string .= "<option value='0'>$default_option</option>";
    }
    if (is_array($result)) {
        foreach ($result as $r) {
            if (is_array($typeid)) {
                $r['selected'] = in_array($r['typeid'], $typeid) ? 'selected' : '';
            } elseif (is_numeric($typeid)) {
                $r['selected'] = $typeid==$r['typeid'] ? 'selected' : '';
            }
            $categorys[$r['typeid']] = $r;
        }
    }
    $str  = "<option value='\$typeid' \$selected>\$spacer \$typename</option>;";
    $str2 = "<optgroup label='\$spacer \$typename'></optgroup>";
    $tree->init($categorys);
    $string .= $tree->get_tree_category(0, $str, $str2);
    $string .= '</select>';
    return $string;
}

/**
 * 模板风格列表
 *
 * @param integer $siteid  站点ID，获取单个站点可使用的模板风格列表
 * @param integer $disable 是否显示停用的{1:是,0:否}
 *
 * @return array
 */
function ask_type_template_list($siteid = '', $disable = 0)
{
    $list = glob(WY_PATH.'templates'.DIRECTORY_SEPARATOR.'*', GLOB_ONLYDIR);
    $arr = $template = array();
    if ($siteid) {
        $site = wy_base::load_app_class('sites', 'admin');
        $info = $site->get_by_id($siteid);
        if ($info['template']) {
            $template = explode(',', $info['template']);
        }
    }
    foreach ($list as $key=>$v) {
        $dirname = basename($v);
        if ($siteid && !in_array($dirname, $template)) {
            continue;
        }
        if (file_exists($v.DIRECTORY_SEPARATOR.'config.php')) {
            $arr[$key] = include $v.DIRECTORY_SEPARATOR.'config.php';
            if (!$disable && isset($arr[$key]['disable']) && $arr[$key]['disable'] == 1) {
                unset($arr[$key]);
                continue;
            }
        } else {
            $arr[$key]['name'] = $dirname;
        }
        $arr[$key]['dirname']=$dirname;
    }
    return $arr;
}

/**
 * 获取全局配置允许通过的备注字段
 *
 * @param array $GLOABLE 全局配置
 * @param array $comment 备注内容
 *
 * @return array
 */
function get_ask_comment($GLOABLE, $comment)
{
    $arr = array();
    if (trim($GLOABLE['comment']) == '' || !is_array($comment)) {
        return $arr;
    }
    $field_arr = explode("\n", $GLOABLE['comment']);
    foreach ($field_arr as $fields) {
        if (trim($fields) == "") {
            break;
        }
        $field = explode("|", trim($fields));
        $arr[$field[0]] = isset($comment[$field[0]]) ? $comment[$field[0]] : '';
    }
    return $arr;
}

/**
 * 生成咨询SEO
 *
 * @param int    $siteid      站点ID
 * @param int    $typeid      类型ID
 * @param string $title       标题
 * @param string $description 描述
 * @param string $keyword     关键词
 *
 * @return array seo数组数据
 */
function ask_seo($siteid, $typeid = '', $title = '', $description = '', $keyword = '')
{
    if (!empty($title)) {
        $title = strip_tags($title);
    }
    if (!empty($description)) {
        $description = strip_tags($description);
    }
    if (!empty($keyword)) {
        $keyword = str_replace(' ', ',', strip_tags($keyword));
    }
    $sites = getcache('sitelist', 'commons');
    $site  = $sites[$siteid];
    $type  = array();
    if (!empty($typeid)) {
        $TYPES = getcache('ask_type_' . $siteid, 'commons');
        $type = $TYPES[$typeid];
        $type['setting'] = string2array($type['setting']);
    }
    $seo['site_title'] = isset($site['site_title']) && !empty($site['site_title']) ? $site['site_title'] : $site['name'];
    $seo['keyword'] = isset($keyword) && !empty($keyword) ? $keyword : (isset($type['setting']['meta_keywords']) && !empty($type['setting']['meta_keywords']) ? $type['setting']['meta_keywords'] : (isset($site['keywords']) && !empty($site['keywords']) ? $site['keywords'] : ''));
    $seo['description'] = isset($description) && !empty($description) ? $description : (isset($type['setting']['meta_description']) && !empty($type['setting']['meta_description']) ? $type['setting']['meta_description'] : (isset($site['description']) && !empty($site['description']) ? $site['description'] : ''));
    $seo['title'] = isset($title) && !empty($title) ? $title : (isset($type['setting']['meta_title']) && !empty($type['setting']['meta_title']) ? $type['setting']['meta_title'] : (isset($type['typename']) && !empty($type['typename']) ? $type['typename'] : ''));
    foreach ($seo as $k=>$v) {
        $seo[$k] = str_replace(array("\n","\r"), '', $v);
    }
    return $seo;
}
?>
