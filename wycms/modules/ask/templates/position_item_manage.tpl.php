<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');?>
<script type="text/javascript">
<!--
$(function(){
	$.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
	$("#title").formValidator({onshow:"<?php echo L('input').L('posid_title')?>",onfocus:"<?php echo L('posid_title').L('not_empty')?>"}).inputValidator({min:1,max:999,onerror:"<?php echo L('posid_title').L('not_empty')?>"});	
})
//-->
</script>
<div class="pad_10">
<div class="common-form">
<form name="myform" action="?m=ask&c=position&a=public_item_manage" method="post" id="myform">
<input type="hidden" name="posid" value="<?php echo $posid?>"></input>
<input type="hidden" name="id" value="<?php echo $id?>"></input>
<table width="100%" class="table_form">
<tr>
<td  width="100"><?php echo L('posid_title')?></td> 
<td><input type="text" name="info[title]" class="input-text" value="<?php echo $title?>" id="title" size="40"></input></td>
</tr>

<tr>
<td><?php echo L('posid_inputtime')?></td> 
<td><?php echo form::date('info[inputtime]', date('Y-m-d h:i:s',$inputtime), 1)?></td>
</tr>

<tr>
<td><?php echo L('posid_desc')?></td> 
<td>
<textarea name="info[content]" rows="2" cols="20" id="content" class="inputtext" style="height:100px;width:300px;"><?php echo $content?></textarea>
</td>
</tr>


</table>

    <div class="bk15"></div>
    <input name="dosubmit" type="submit" value="<?php echo L('submit')?>" class="dialog" id="dosubmit">
</form>
</div>
</div>
</body>
</html>
