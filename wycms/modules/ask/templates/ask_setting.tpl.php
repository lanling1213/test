<?php
defined('IN_ADMIN') or exit('No permission resources.'); 
include $this->admin_tpl('header', 'admin');
?>
<div class="pad-10">
<div class="col-tab">
<form action="?m=ask&c=ask&a=setting" method="post" id="myform">
    <ul class="tabBut cu-li">
    <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',4,1);"><?php echo L('ask_module_configuration')?></li>
    <li id="tab_setting_2" onclick="SwapTab('setting','on','',4,2);"><?php echo L('ask_seo');?></li>
    <li id="tab_setting_3" onclick="SwapTab('setting','on','',4,3);"><?php echo L('ask_other_setting');?></li>
    </ul>
    <div id="div_setting_1" class="contentList pad-10">
    <table width="100%"  class="table_form">
    <tr>
    <th width="140"><?php echo L('close_reply')?>：</th>
    <td class="y-bg"><input type="checkbox" name="info[close]" value="1" <?php if ($arr_ask_setting['close']){echo 'checked';}?> /><?php echo L('close_reply_explain')?></td>
    </tr>
    <tr>
    <th width="140"><?php echo L("whether_to_validate")?>：</th>
    <td class="y-bg"><input type="checkbox" name="info[validate]" value="1" <?php if ($arr_ask_setting['validate']){echo 'checked';}?> /></td>
    </tr>
    <tr>
    <th width="140"><?php echo L('audit_on_ask_whether_to_open')?>：</th>
    <td class="y-bg"><input type="checkbox" name="info[audit_ask]" value="1" <?php if ($arr_ask_setting['audit_ask']){echo 'checked';}?> /></td>
    </tr>
    <tr>
    <th width="140"><?php echo L('audit_on_reply_whether_to_open')?>：</th>
    <td class="y-bg"><input type="checkbox" name="info[audit_reply]" value="1" <?php if ($arr_ask_setting['audit_reply']){echo 'checked';}?> /></td>
    </tr>
    <tr>
    <th width="140"><?php echo L('ask_on_whether_to_allow_visitors')?>：</th>
    <td class="y-bg"><input type="checkbox" name="info[allow_visitors_ask]" value="1" <?php if ($arr_ask_setting['allow_visitors_ask']){echo 'checked';}?> /></td>
    </tr>
    <tr>
    <th width="140"><?php echo L('reply_on_whether_to_allow_visitors')?>：</th>
    <td class="y-bg"><input type="checkbox" name="info[allow_visitors_reply]" value="1" <?php if ($arr_ask_setting['allow_visitors_reply']){echo 'checked';}?> /></td>
    </tr>
    <tr>
    <th width="140"><?php echo L('expiration_interval')?>：</th>
    <td class="y-bg"><input type="input" name="info[interval]" value="<?php echo $arr_ask_setting['interval'] ?>" /> <?php echo L('day').L('serodata')?></td>
    </tr>
    </table>
  </div>
  
  <div id="div_setting_2" class="contentList pad-10 hidden">
    <table width="100%" class="table_form ">
  <tr>
    <th width="200"><?php echo L('meta_title')?>：</th>
    <td class="y-bg"><input name="info[title]" value="<?php echo $arr_ask_setting['title'] ?>" maxlength="60" size="60" /></td>
  </tr>
  <tr>
    <th><?php echo L('meta_keywords')?>：</th>
    <td class="y-bg"><textarea name="info[keywords]" id="" cols="80" rows="4"><?php echo $arr_ask_setting['keywords'] ?></textarea></td>
  </tr>
  <tr>
    <th><?php echo L('meta_description')?>：</th>
    <td class="y-bg"><textarea name="info[description]" id="" cols="80" rows="5"><?php echo $arr_ask_setting['description'] ?></textarea></td>
  </tr>
    </table>
  </div>
  
  <div id="div_setting_3" class="contentList pad-10 hidden">
    <table width="100%" class="table_form ">
  <tr>
    <th width="140"><?php echo L('ask').L('setting_comment')?>：</th>
    <td class="y-bg"><div class="lf"><textarea name="info[comment]" cols="50" rows="7"><?php echo $arr_ask_setting['comment'] ?></textarea></div><div class="lf pad-10"><?php echo L('setting_comment_tips');?><br /><?php echo L('setting_comment_tips_ru');?></div></td>
  </tr>
    </table>
  </div>

<div class="bk15"></div>
<input type="submit" id="dosubmit" name="dosubmit" class="button" value="<?php echo L('submit')?>" />
</form>
</div>
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
//-->
</script>

</body>
</html>
