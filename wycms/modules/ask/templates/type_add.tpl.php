<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('header', 'admin');?>
<script type="text/javascript"> 
<!--
    $(function(){
        $.formValidator.initConfig({formid:"myform",autotip:true,onerror:function(msg,obj){window.top.art.dialog({content:msg,lock:true,width:'200',height:'50'}, function(){this.close();$(obj).focus();})}});
        
        $("#typename").formValidator({onshow:"<?php echo L('input_typename');?>",onfocus:"<?php echo L('input_typename');?>",oncorrect:"<?php echo L('input_right');?>"}).inputValidator({min:1,onerror:"<?php echo L('input_typename');?>"}).ajaxValidator({type : "get",url : "",data :"m=ask&c=ask&a=public_check_typename",datatype : "html",cached:false,getdata:{parentid:'parentid'},async:'false',success : function(data){	if( data == "1" ){return true;}else{return false;}},buttons: $("#dosubmit"),onerror : "<?php echo L('typename_have_exists');?>",onwait : "<?php echo L('connecting');?>"});
        
        $("#template_list").formValidator({onshow:"<?php echo L('template_setting');?>",onfocus:"<?php echo L('template_setting');?>",oncorrect:"<?php echo L('input_right');?>"}).inputValidator({min:1,onerror:"<?php echo L('template_setting');?>"});
        
    })
//-->
</script>

<form name="myform" id="myform" action="?m=ask&c=ask&a=add_type" method="post">
<div class="pad-10">
<div class="col-tab">
<ul class="tabBut cu-li">
<li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',4,1);"><?php echo L('type_basic');?></li>
<li id="tab_setting_2" onclick="SwapTab('setting','on','',4,2);"><?php echo L('type_template');?></li>
<li id="tab_setting_3" onclick="SwapTab('setting','on','',4,3);"><?php echo L('type_seo');?></li>
<li id="tab_setting_4" onclick="SwapTab('setting','on','',4,4);"><?php echo L('type_pri');?></li>
</ul>
<div id="div_setting_1" class="contentList pad-10">

<table width="100%" class="table_form ">
    <tr>
     <th><?php echo L('add_type_types');?>：</th>
      <td>
      <input type='radio' name='addtype' value='0' checked id="normal_addid"> <?php echo L('normal_add');?>&nbsp;&nbsp;&nbsp;&nbsp;
      <input type='radio' name='addtype' value='1'  onclick="$('#normal_add').html(' ');$('#normal_add').css('display','none');$('#batch_add').css('display','');$('#normal_addid').attr('disabled','true');this.disabled='true'"> <?php echo L('batch_add');?></td>
    </tr>
    <tr>
        <th width="200"><?php echo L('parent_type')?>：</th>
        <td>
        <?php echo select_type('ask_type_'.$this->siteid,$parentid,'name="info[parentid]" id="parentid"',L('please_select_parent_type'),$this->siteid);?>
        </td>
    </tr>
     
    <tr>
        <th><?php echo L('typename')?>：</th>
        <td>
        <span id="normal_add"><input type="text" name="info[typename]" id="typename" class="input-text" value=""></span>
        <span id="batch_add" style="display:none"> 
        <table width="100%" class="sss">
            <tr><td width="310"><textarea name="batch_add" maxlength="255" style="width:300px;height:60px;"></textarea></td>
                <td align="left">
                <?php echo L('batch_add_tips');?>
                </td>
            </tr>
        </table>
        </span>
        </td>
    </tr>
      <!--图片以后再弄
      <tr>
        <th><?php echo L('type_img')?>：</th>
        <td><?php echo form::images('info[image]', 'image', $image, 'content');?></td>
      </tr>-->

</table>
</div>
<div id="div_setting_2" class="contentList pad-10 hidden">
<table width="100%" class="table_form ">
<tr>
  <th width="200"><?php echo L('available_styles');?>：</th>
        <td>
        <?php echo form::select($template_list, $setting['template_list'], 'name="setting[template_list]" id="template_list" onchange="load_file_list(this.value);"', L('please_select'))?> 
        </td>
</tr>
        <tr>
        <th width="200"><?php echo L('type_index_tpl')?>：</th>
        <td  id="type_template">
        </td>
      </tr>
      <tr>
        <th width="200"><?php echo L('type_list_tpl')?>：</th>
        <td  id="list_template">
        </td>
      </tr>
      <tr>
        <th width="200"><?php echo L('content_tpl')?>：</th>
        <td  id="show_template">
        </td>
      </tr>
</table>
</div>
<div id="div_setting_3" class="contentList pad-10 hidden">
<table width="100%" class="table_form ">
    <tr>
      <th width="200"><?php echo L('meta_title');?></th>
      <td><input name='setting[meta_title]' type='text' id='meta_title' value='<?php echo $setting['meta_title'];?>' size='60' maxlength='60'></td>
    </tr>
    <tr>
      <th ><?php echo L('meta_keywords');?></th>
      <td><textarea name='setting[meta_keywords]' id='meta_keywords' style="width:90%;height:40px"><?php echo $setting['meta_keywords'];?></textarea></td>
    </tr>
    <tr>
      <th ><?php echo L('meta_description');?></th>
      <td><textarea name='setting[meta_description]' id='meta_description' style="width:90%;height:50px"><?php echo $setting['meta_description'];?></textarea></td>
    </tr>
</table>
</div>
<div id="div_setting_4" class="contentList pad-10 hidden">
<table width="100%" class="table_form ">
    <tr>
        <th><?php echo L('close_type');?>：</th>
        <td>
            <input type='radio' name='setting[isclose]' value='1'> <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type='radio' name='setting[isclose]' value='0' checked > <?php echo L('no');?>
        </td>
    </tr>
    <tr>
        <th><?php echo L('allow_reply');?>：</th>
        <td>
            <input type='radio' name='setting[isreply]' value='1' checked> <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type='radio' name='setting[isreply]' value='0'  > <?php echo L('no');?>
        </td>
    </tr>
    <tr>
        <th><?php echo L('allow_visitor_ask');?>：</th>
        <td>
            <input type='radio' name='setting[isvisitor_ask]' value='1' checked> <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type='radio' name='setting[isvisitor_ask]' value='0'  > <?php echo L('no');?>
        </td>
    </tr>
    <tr>
        <th><?php echo L('allow_visitor_reply');?>：</th>
        <td>
            <input type='radio' name='setting[isvisitor_reply]' value='1' checked> <?php echo L('yes');?>&nbsp;&nbsp;&nbsp;&nbsp;
            <input type='radio' name='setting[isvisitor_reply]' value='0'  > <?php echo L('no');?>
        </td>
    </tr>
    <tr>
          <th width="200"><?php echo L('expiration_interval');?></th>
          <td><input name='setting[interval_time]' type='text' value='0' size='5' maxlength='5' style='text-align:center'> <?php echo L('day').L('serodata');?></td>
    </tr>
</table>
</div>
 <div class="bk15"></div>
    <input name="typeid" type="hidden" value="<?php echo $typeid;?>">
    <input name="menuid" type="hidden" value="<?php echo $_GET['menuid'];?>">
    <input name="dosubmit" type="submit" value="<?php echo L('submit')?>" class="button">

</form>
</div>

</div>
<!--table_form_off-->
</div>

<script language="JavaScript">
<!--
    window.top.$('#display_center_id').css('display','none');
    function SwapTab(name,cls_show,cls_hide,cnt,cur){
        for(i=1;i<=cnt;i++){
            if(i==cur){
                 $('#div_'+name+'_'+i).show();
                 $('#tab_'+name+'_'+i).attr('class',cls_show);
            }else{
                 $('#div_'+name+'_'+i).hide();
                 $('#tab_'+name+'_'+i).attr('class',cls_hide);
            }
        }
    }
    function load_file_list(id) {
        if(id=='') return false;
        $.getJSON('?m=ask&c=ask&a=public_tpl_file_list&style='+id+'&typeid=<?php echo $parentid?>', function(data){$('#type_template').html(data.type_template);$('#list_template').html(data.list_template);$('#show_template').html(data.show_template);});
    }
//-->
</script>
