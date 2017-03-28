<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>
<div id="closeParentTime" style="display:none"></div>
<SCRIPT LANGUAGE="JavaScript">
<!--
    if(window.top.$("#current_pos").data('clicknum')==1 || window.top.$("#current_pos").data('clicknum')==null) {
    parent.document.getElementById('display_center_id').style.display='';
    parent.document.getElementById('center_frame').src = '?m=ask&c=ask&a=public_types&menuid=<?php echo $_GET['menuid'];?>&wy_ssud=<?php echo $_SESSION['wy_ssud'];?>';
    window.top.$("#current_pos").data('clicknum',0);
}
//-->
</SCRIPT>
<div class="pad-10">
<div class="content-menu ib-a blue line-x">
<!--<a class="add fb" href="javascript:;" onclick=javascript:openwinx('?m=content&c=content&a=add&menuid=&typeid=<?php echo $typeid;?>&wy_ssud=<?php echo $_SESSION['wy_ssud'];?>','')><em><?php echo L('add_content');?></em></a>--> 
<a href="?m=ask&c=ask&a=question_list&typeid=<?php echo $typeid;?>&status=1&menuid=<?php echo $_GET['menuid'];?>&wy_ssud=<?php echo $wy_ssud;?>" <?php if(isset($_GET['status']) && $_GET['status']==1) echo 'class=on';?>><em><?php echo L('check_passed');?></em></a><span>|</span>
<a href="?m=ask&c=ask&a=question_list&typeid=<?php echo $typeid;?>&status=0&menuid=<?php echo $_GET['menuid'];?>&wy_ssud=<?php echo $wy_ssud;?>" <?php if(isset($_GET['status']) && $_GET['status']==0) echo 'class=on';?>><em><?php echo L('wait_audit');?></em></a><span>|</span>
 <a href="javascript:;" onclick="javascript:$('#searchid').css('display','');"><em><?php echo L('search');?></em></a><span>|</span><a href="?m=ask&c=ask&a=count_reply_nums&typeid=<?php echo $typeid;?>&wy_ssud=<?php echo $wy_ssud;?>"><em><?php echo L('reply_count_items');?></em></a>
</div>
<div id="searchid" style="display:<?php if(!isset($_GET['search'])) echo 'none';?>">
<form name="searchform" action="" method="get" >
<input type="hidden" value="ask" name="m">
<input type="hidden" value="ask" name="c">
<input type="hidden" value="question_list" name="a">
<input type="hidden" value="<?php echo $typeid;?>" name="typeid">
<input type="hidden" value="<?php echo $menuid;?>" name="menuid">
<input type="hidden" value="1" name="search">
<input type="hidden" value="<?php echo $wy_ssud;?>" name="wy_ssud">
<table width="100%" cellspacing="0" class="search-form">
    <tbody>
        <tr>
        <td>
        <div class="explain-col">
 
                <?php echo L('asktime');?>：
                <?php echo form::date('start_time',$_GET['start_time'],0,0,'false');?>- &nbsp;<?php echo form::date('end_time',$_GET['end_time'],0,0,'false');?>
                
                <select name="posids"><option value='' <?php if($_GET['posids']=='') echo 'selected';?>><?php echo L('all');?></option>
                <option value="1" <?php if($_GET['posids']==1) echo 'selected';?>><?php echo L('elite');?></option>
                <option value="2" <?php if($_GET['posids']==2) echo 'selected';?>><?php echo L('no_elite');?></option>
                </select>  
                
                <select name="status"><option value='' <?php if(is_null($_GET['status'])) echo 'selected';?>><?php echo L('all');?></option>
                <option value="-1" <?php if($_GET['status']==-1) echo 'selected';?>><?php echo L('wait_audit');?></option>
                <option value="1" <?php if($_GET['status']==1) echo 'selected';?>><?php echo L('pass');?></option>
                <option value="99" <?php if($_GET['status']==99) echo 'selected';?>><?php echo L('resolved');?></option>
                </select> 
                
                <select name="searchtype">
                    <option value='0' <?php if($_GET['searchtype']==0) echo 'selected';?>><?php echo L('title');?></option>
                    <option value='1' <?php if($_GET['searchtype']==1) echo 'selected';?>><?php echo L('username');?></option>
                    <option value='2' <?php if($_GET['searchtype']==2) echo 'selected';?>>ID</option>
                </select>
                
                <input name="keyword" type="text" value="<?php if(isset($keyword)) echo $keyword;?>" class="input-text" />
                <input type="submit" name="search" class="button" value="<?php echo L('search');?>" />
    </div>
        </td>
        </tr>
    </tbody>
</table>
</form>
</div>
<form name="myform" id="myform" action="" method="post" >
<div class="table-list">
    <table width="100%">
        <thead>
            <tr>
            <th width="16"><input type="checkbox" value="" id="check_box" onclick="selectall('ids[]');"></th>
            <th width="37"><?php echo L('listorder');?></th>
            <th width="40">ID</th>
            <th><?php echo L('content');?></th>
            <th width="70"><?php echo L('askname');?></th>
            <th width="100">电话号码</td>
            <th width="118"><?php echo L('asktime');?></th>
            <th width="110"><?php echo L('operations_manage');?></th>
            </tr>
        </thead>
<tbody>
    <?php
    if(is_array($datas)) {
        $this->ask_question_hits_db = wy_base::load_model('ask_question_hits_model');
        foreach ($datas as $r) {
            $hits_r = $this->ask_question_hits_db->get_one(array('questionid'=>$r['questionid']));
    ?>
    <tr>
        <td align="center"><input class="inputcheckbox " name="ids[]" value="<?php echo $r['questionid'];?>" type="checkbox"></td>
        <td align='center'><input name='listorders[<?php echo $r['questionid'];?>]' type='text' size='3' value='<?php echo $r['listorder'];?>' class='input-text-c'></td>
        <td align='center'><?php echo $r['questionid'];?></td>
        <td><a target="_blank" href="<?php echo $arrSite[$this->siteid]['domain'] ?>index.php?m=ask&c=index&a=show&typeid=<?php echo $r['typeid'];?>&qid=<?php echo $r['questionid'];?>"><span><?php echo $r['content'];?></span></a></td>
        <td align='center'><?php echo $r['name'];?></td>
        <td align='center'>
        <?php 
            $comment = string2array($r['comment']);
            if (intval($comment['tel'])) {
                echo intval($comment['tel']);
            }
        ?>
        </td>
        <td align='center'><?php echo format::date($r['inputtime'],1);?></td>
        <td align='center'><a href="javascript:view_reply_and_change('<?php echo $r['questionid'];?>','<?php echo safe_replace($r['title']);?>')"><?php echo L('reply_change');?></a></td>
    </tr>
     <?php }
    }
    ?>
</tbody>
     </table>
    <div class="btn"><label for="check_box"><?php echo L('selected_all');?>/<?php echo L('cancel');?></label>
        <input type="hidden" value="<?php echo $wy_ssud;?>" name="wy_ssud">
        <input type="button" class="button" value="<?php echo L('listorder');?>" onclick="myform.action='?m=ask&c=ask&a=listorder&dosubmit=1';myform.submit();"/>
        <input type="button" class="button" value="<?php echo L('passed_checked');?>" onclick="myform.action='?m=ask&c=ask&a=change_question_status&status=1&dosubmit=1';myform.submit();"/>
        <input type="button" class="button" value="<?php echo L('delete');?>" onclick="myform.action='?m=ask&c=ask&a=delete_question&dosubmit=1';return confirm_delete()"/>
    </div>
    <div id="pages"><?php echo $pages;?></div>
</div>
</form>
</div>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH?>cookie.js"></script>
<script type="text/javascript"> 
<!--
function push() {
    var str = 0;
    var id = tag = '';
    $("input[name='ids[]']").each(function() {
        if($(this).attr('checked')=='checked') {
            str = 1;
            id += tag+$(this).val();
            tag = '|';
        }
    });
    if(str==0) {
        alert('<?php echo L('you_do_not_check');?>');
        return false;
    }
    window.top.art.dialog({id:'push'}).close();
    window.top.art.dialog({title:'<?php echo L('push');?>：',id:'push',iframe:'?m=content&c=push&action=position_list&typeid=<?php echo $typeid?>&modelid=<?php echo $modelid?>&id='+id,width:'800',height:'500'}, function(){var d = window.top.art.dialog({id:'push'}).data.iframe;// 使用内置接口获取iframe对象
    var form = d.document.getElementById('dosubmit');form.click();return false;}, function(){window.top.art.dialog({id:'push'}).close()});
}
function confirm_delete(){
    if(confirm('<?php echo L('confirm_delete', array('message' => L('selected')));?>')) $('#myform').submit();
}

function view_check_manage(id, name) {
    window.top.art.dialog({id:'check_mange'}).close();
    window.top.art.dialog(
        {
        yesText:'<?php echo L('dialog_close');?>',
        title:'<?php echo L('check_manage');?>：'+name,
        id:'check_mange',
        iframe:'index.php?m=ask&c=ask&a=question_edit&questionid='+id,width:'800',height:'500'}, 
        function(){
             var d = window.top.art.dialog({id:'check_mange'}).data.iframe;d.document.getElementById('dosubmit').click();
             return false;
        },
        function(){
            window.top.art.dialog({id:'check_mange'}).close();
        }
    );
}

function view_reply(id, name) {
    window.top.art.dialog({id:'check_reply'}).close();
    window.top.art.dialog(
        {
        yesText:'<?php echo L('dialog_close');?>',
        title:'<?php echo L('reply_manage');?>：'+name,
        id:'check_reply',
        iframe:'index.php?m=ask&c=ask&a=reply_list&questionid='+id,width:'800',height:'500'}, 
        function(){
            location.reload();
            window.top.art.dialog({id:'check_reply'}).close();
        }
    );
}

function view_reply_and_change(id, name) {
    window.top.art.dialog({id:'check_reply'}).close();
    window.top.art.dialog(
        {
        yesText:'<?php echo L('dialog_close');?>',
        title:'<?php echo L('reply_manage');?>：'+name,
        id:'check_reply',
        iframe:'index.php?m=ask&c=ask&a=reply_content&questionid='+id,width:'800',height:'500'}, 
        function(){
            var d = window.top.art.dialog({id:'check_reply'}).data.iframe;d.document.getElementById('dosubmit').click();
            return false;
        },
        function(){
            window.top.art.dialog({id:'check_reply'}).close();
        }
    );
}

setcookie('refersh_time', 0);
function refersh_window() {
    var refersh_time = getcookie('refersh_time');
    if(refersh_time==1) {
        window.location.reload();
    }
}
setInterval("refersh_window()", 3000);
//-->
</script>
</body>
</html>