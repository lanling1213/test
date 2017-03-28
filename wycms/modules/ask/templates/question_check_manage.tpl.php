<?php
defined('IN_ADMIN') or exit('No permission resources.'); 
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-10">
<form action="?m=ask&c=ask&a=question_edit&dosubmit=1" method="post" id="myform">
<fieldset>
<legend><?php echo $this->types[$typeid]['typename']?></legend>
<input value="<?php echo $questionid;?>" type="hidden" name="questionid">
<input value="<?php echo $typeid;?>" type="hidden" name="info[typeid]">
<table width="100%" class="table_form">
    <tr>
        <th width="140"><?php echo L('title')?>：</th>
        <td class="y-bg"><input class="input-text" type="input" style="width:400px;" name="info[title]" value="<?php echo $title;?>" /></td>
    </tr>
    <tr>
        <th width="140"><?php echo L('content')?>：</th>
        <td class="y-bg"><textarea name="info[content]" id="" cols="80" rows="6"><?php echo $content;?></textarea></td>
    </tr>
    <tr>
        <th width="140"><?php echo L('askname')?>：</th>
        <td class="y-bg"><?php echo $name;?></td>
    </tr>
    <tr>
        <th width="140"><?php echo L('asktime')?>：</th>
        <td class="y-bg"><?php echo date('Y-m-d H:i:s', $inputtime);?></td>
    </tr>
    <tr>
        <th width="140"><?php echo L('updatetime')?>：</th>
        <td class="y-bg"><?php if ($updatetime==0){echo L('no_update');}else{echo date('Y-m-d H:i:s', $updatetime);}?></td>
    </tr>
    <tr>
        <th width="140"><?php echo L('replytime')?>：</th>
        <td class="y-bg"><?php if ($replytime==0){echo L('no_reply');}else{echo date('Y-m-d H:i:s', $replytime);}?></td>
    </tr>
    <tr>
        <th width="140"><?php echo L('status')?>：</th>
        <td class="y-bg">
            <select name="info[status]">
                <option value="0" <?php if($status==0) echo 'selected';?>><?php echo L('wait_audit');?></option>
                <option value="1" <?php if($status==1) echo 'selected';?>><?php echo L('pass');?></option>
                <option value="99" <?php if($status==99) echo 'selected';?>><?php echo L('resolved');?></option>
            </select>
        </td>
    </tr>
<?php 
    if ($position_html) { ?>
    <tr>
        <th width="140"><?php echo L('ask_position')?>：</th>
        <td>
            <?php echo $position_html;?> 
        </td>
    </tr>
<?php } ?>
    <tr>
        <th width="140"><?php echo L('setting_comment')?>：</th>
        <td class="y-bg">
            <table width="100%">
            <?php 
                foreach($arrComment as $r){
                    $arrKeyValue = explode('|', $r);
            ?>
                <tr>
                    <th width="80"><?php echo $arrKeyValue[1]?>：</th>
                    <td>
                        <?php echo $curArrComment[$arrKeyValue[0]];?>
                    </td>
                </tr>
            <?php 
                }
            ?>
            </table>
        </td>
    </tr>
    
    
</table>
<div class="bk15"></div>
<input type="submit" class="dialog" id="dosubmit" name="dosubmit" value="<?php echo L('submit')?>" />
</fieldset>
</form>
</div>
</body>
</html>