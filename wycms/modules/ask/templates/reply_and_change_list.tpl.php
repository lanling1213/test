<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header','admin');?>

<div class="pad-10">
<form action="" method="post" id="myform">
<fieldset>
<legend>回复管理</legend>
<input type="hidden" value="<?php echo $questionid;?>" name="questionid">
<input type="hidden" value="<?php echo $menuid;?>" name="menuid">
<input type="hidden" value="<?php echo $wy_ssud;?>" name="wy_ssud">
<input type="hidden" name="info[title]" value="<?php echo $title;?>" />
<table width="100%" class="table_form">

    <tr>
        <th width="80">咨询人：</th>
        <td>
            <?php echo $name;?>
        </td>
    </tr>
    <?php if($tel) { ?>
    <tr>
        <th width="80">手机号码：</th>
        <td>
            <?php echo $tel;?>
        </td>
    </tr>
    <?php }?>
    <tr>
        <th width="50">咨询内容：</th>
        <td class="y-bg"><?php echo $content;?></td>
    </tr>
    <tr>
        <th width="100" style="border-bottom:none"></th>
        <td class="y-bg" style="height:40px;border-bottom:none"> 
        </td>
    </tr>
    <tr>
        <th width="50">回复内容：</th>
        <td class="y-bg"><textarea name="content" id="" cols="90" rows="10"><?php echo $reply_data['content']?></textarea></td>
    </tr>
</table>
<div class="bk15"></div>
<input type="submit" class="dialog" id="dosubmit" name="dosubmit" value="<?php echo L('submit')?>" />
</fieldset>
</form>
</div>
</body>
</html>