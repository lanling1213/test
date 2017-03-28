<?php
defined('IN_WYCMS') or exit('Access Denied');
defined('INSTALL') or exit('Access Denied');
//模块全局配置放置
    //咨询全局设置
    $menu_db->insert(array('name'=>'ask_setting', 'parentid'=>'29', 'm'=>'ask', 'c'=>'ask', 'a'=>'setting', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);

//模块放置顶级菜单
    $topid = $menu_db->insert(array('name'=>'ask', 'parentid'=>'0', 'm'=>'ask', 'c'=>'ask', 'a'=>'init', 'data'=>'', 'listorder'=>5, 'display'=>'1'), true);

//模块放置二级菜单
    //咨询管理
    $secondid = $menu_db->insert(array('name'=>'ask_manage', 'parentid'=>$topid, 'm'=>'ask', 'c'=>'ask', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);
    //咨询相关管理
    $second_rel_id = $menu_db->insert(array('name'=>'ask_relevant_manage', 'parentid'=>$topid, 'm'=>'ask', 'c'=>'ask', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);

//模块放置三级菜单
    //问题管理
    $ask_question_manageid = $menu_db->insert(array('name'=>'ask_question_manage', 'parentid'=>$secondid, 'm'=>'ask', 'c'=>'ask', 'a'=>'question_list', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);
    //分类管理
    $ask_type_manageid = $menu_db->insert(array('name'=>'ask_type_manage', 'parentid'=>$second_rel_id, 'm'=>'ask', 'c'=>'ask', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);
    //推荐位管理
    $ask_positionid = $menu_db->insert(array('name'=>'ask_position_manage', 'parentid'=>$second_rel_id, 'm'=>'ask', 'c'=>'position', 'a'=>'init', 'data'=>'', 'listorder'=>0, 'display'=>'1'), true);

///////////问题管理///////////////////
    //问题列表
    $question_listid = $menu_db->insert(array('name'=>'question_list', 'parentid'=>$ask_question_manageid, 'm'=>'ask', 'c'=>'ask', 'a'=>'question_list', 'data'=>'', 'listorder'=>0, 'display'=>'0'), true);
    //排序listorder
    $menu_db->insert(array('name'=>'listorder', 'parentid'=>$question_listid, 'm'=>'ask', 'c'=>'ask', 'a'=>'listorder', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //查看管理question_edit
    $menu_db->insert(array('name'=>'question_edit', 'parentid'=>$question_listid, 'm'=>'ask', 'c'=>'ask', 'a'=>'question_edit', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //通过审核change_question_status
    $menu_db->insert(array('name'=>'change_question_status', 'parentid'=>$question_listid, 'm'=>'ask', 'c'=>'ask', 'a'=>'change_question_status', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //删除delete_question
    $menu_db->insert(array('name'=>'delete_question', 'parentid'=>$question_listid, 'm'=>'ask', 'c'=>'ask', 'a'=>'delete_question', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //回复管理reply_list
    $replyid = $menu_db->insert(array('name'=>'reply_list', 'parentid'=>$question_listid, 'm'=>'ask', 'c'=>'ask', 'a'=>'reply_list', 'data'=>'', 'listorder'=>0, 'display'=>'0'), true);
    //通过审核change_reply_status
    $menu_db->insert(array('name'=>'change_reply_status', 'parentid'=>$replyid, 'm'=>'ask', 'c'=>'ask', 'a'=>'change_reply_status', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //删除delete_reply
    $menu_db->insert(array('name'=>'delete_reply', 'parentid'=>$replyid, 'm'=>'ask', 'c'=>'ask', 'a'=>'delete_reply', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //回复reply_content
    $menu_db->insert(array('name'=>'reply_content', 'parentid'=>$replyid, 'm'=>'ask', 'c'=>'ask', 'a'=>'reply_content', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
///////////////////////


//////////分类管理/////////////
    //添加分类
    $menu_db->insert(array('name'=>'ask_add_type', 'parentid'=>$ask_type_manageid, 'm'=>'ask', 'c'=>'ask', 'a'=>'add_type', 'data'=>'', 'listorder'=>0, 'display'=>'1'));
    //重新统计问题数量
    $menu_db->insert(array('name'=>'ask_count_items', 'parentid'=>$ask_type_manageid, 'm'=>'ask', 'c'=>'ask', 'a'=>'count_items', 'data'=>'', 'listorder'=>0, 'display'=>'1'));
    //排序
    $menu_db->insert(array('name'=>'ask_type_listorder', 'parentid'=>$ask_type_manageid, 'm'=>'ask', 'c'=>'ask', 'a'=>'type_listorder', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //修改ask_type_edit
    $menu_db->insert(array('name'=>'ask_type_edit', 'parentid'=>$ask_type_manageid, 'm'=>'ask', 'c'=>'ask', 'a'=>'edit', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //删除
    $menu_db->insert(array('name'=>'ask_type_delete', 'parentid'=>$ask_type_manageid, 'm'=>'ask', 'c'=>'ask', 'a'=>'delete', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
///////////////////////

//////////推荐位管理/////////////
    //添加推荐位ask_position_add
    $menu_db->insert(array('name'=>'ask_position_add', 'parentid'=>$ask_positionid, 'm'=>'ask', 'c'=>'position', 'a'=>'add', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //排序ask_position_listorder
    $menu_db->insert(array('name'=>'ask_position_listorder', 'parentid'=>$ask_positionid, 'm'=>'ask', 'c'=>'position', 'a'=>'listorder', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //修改ask_position_edit
    $menu_db->insert(array('name'=>'ask_position_edit', 'parentid'=>$ask_positionid, 'm'=>'ask', 'c'=>'position', 'a'=>'edit', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
    //删除ask_position_delete
    $menu_db->insert(array('name'=>'ask_position_delete', 'parentid'=>$ask_positionid, 'm'=>'ask', 'c'=>'position', 'a'=>'delete', 'data'=>'', 'listorder'=>0, 'display'=>'0'));
///////////////////////



//写在system.lang.php
$language = array(
    'ask_setting'=>'咨询', 
    'ask'=>'咨询',
    'ask_manage'=>'咨询管理', 
    'ask_question_manage'=>'问题管理', 
    'question_list'=>'问题列表', 
    'listorder'=>'排序', 
    'question_edit'=>'查看管理', 
    'change_question_status'=>'通过审核', 
    'delete_question'=>'删除', 
    'reply_list'=>'回复管理', 
    'change_reply_status'=>'通过审核', 
    'delete_reply'=>'删除', 
    'reply_content'=>'回复', 
    'ask_relevant_manage'=>'咨询相关管理', 
    'ask_type_manage'=>'分类管理', 
    'ask_count_items'=>'重新统计问题数量',
    'ask_add_type'=>'添加分类',
    'ask_type'=>'管理分类',
    'ask_type_listorder'=>'排序',
    'ask_type_edit'=>'修改',
    'ask_type_delete'=>'删除',
    'ask_position_manage'=>'推荐位管理',
    'ask_position_add'=>'添加推荐位',
    'ask_position_listorder'=>'排序',
    'ask_position_edit'=>'修改',
    'ask_position_delete'=>'删除'
);
?>
