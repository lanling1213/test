<?php
defined('IN_ADMIN') or exit('No permission resources.');
$show_validator = true;
include $this->admin_tpl('header');
?>
<script type="text/javascript">
<!--
    $(document).ready(function() {
        $.formValidator.initConfig({autotip:true,formid:"myform",onerror:function(msg){}});
        $("#name").formValidator({onshow:"<?php echo L('input').L('site_info_name')?>",onfocus:"<?php echo L('site_info_name').L('between_2_to_20')?>"}).inputValidator({min:2,max:20,onerror:"<?php echo L('site_info_name').L('between_2_to_20')?>"});
        $("#email").formValidator({onshow:"<?php echo L('input').L('email')?>",onfocus:"<?php echo L('input').L('email')?>"}).regexValidator({regexp:"^$|^[\\w\\-\\.]+@[\\w\\-\\.]+(\\.\\w+)+$",onerror:"<?php echo L('email').L('format_incorrect')?>"});
    });
//-->
</script>
<form name="myform" action="?m=admin&c=site&a=edit_infos" method="post" id="myform">
<input type="hidden" name="wy_ssud" value="<?php echo $_SESSION['wy_ssud'];?>">
<div class="pad-10">
<div class="col-tab">
<ul class="tabBut cu-li">
            <li id="tab_setting_1" class="on" onclick="SwapTab('setting','on','',5,1);"><?php echo L("basic_info");?></li>
            <li id="tab_setting_2" onclick="SwapTab('setting','on','',5,2);"><?php echo L("contact_us");?></li>
            <li id="tab_setting_3" onclick="SwapTab('setting','on','',5,3);"><?php echo L("other_info");?></li>
</ul>
<div id="div_setting_1" class="contentList pad-10">
    <table width="100%" class="table_form contentWrap">
        <tr>
            <td width="120px"><?php echo L("site_info_picture");?></td>
            <td>
                <div class="img-wrap m-b-5 w150">
                    <?php $picture_src = empty($picture) ?IMG_PATH.'member/nophoto.gif' :$picture;?>
                    <img src="<?php echo $picture_src;?>" id="picture" width="150" height="150" />
                    <span id="picture_text" class="hidden red"><?php echo L('picture_loading_failure');?><span>
                </div>
                <?php echo form::images('info[picture]', 'picture_input', $picture, 'picture');?></td>
            </tr>
        <tr>
            <td><?php echo L("site_info_name");?></td>
            <td><input type="text" name="info[name]" id="name" class="input-text" size="20" value="<?php echo $name?>" /></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_area')?></td>
            <td><input type="text" name="info[area]" id="area" class="input-text" size="50" value="<?php echo $area?>" /></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_license');?></td>
            <td><input type="text" name="info[license]" id="license" class="input-text" size="40" value="<?php echo $license?>" /></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_company');?></td>
            <td><input type="text" name="info[company]" id="company" class="input-text" size="40" value="<?php echo $company?>" /></td>
        </tr>
        <tr>
            <td><?php echo L("site_info_duty");?></td>
            <td><input type="text" name="info[duty]" id="duty" class="input-text" size="50" value="<?php echo $duty?>" /></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_copyright');?></td>
            <td><input type="text" name="info[copyright]" id="copyright" class="input-text" size="40" value="<?php echo stripslashes($copyright)?>" /></td>
        </tr>
    </table>
</div>
<div id="div_setting_2" class="contentList pad-10 hidden">
    <table width="100%" class="table_form contentWrap">
        <tr>
            <td width="120px"><?php echo L('Email')?></td>
            <td><div><input type="text" name="info[email]" id="email" class="input-text" size="40" value="<?php echo $email?>" /></div></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_mobile');?></td>
            <td><input type="text" name="info[mobile]" id="mobile" class="input-text" size="40" value="<?php echo $mobile?>" /></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_qq');?></td>
            <td><input type="text" name="info[qq]" id="qq" class="input-text" size="40" value="<?php echo $qq?>" /></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_tel');?></td>
            <td><input type="text" name="info[tel]" id="tel" class="input-text" size="40" value="<?php echo $tel?>" /></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_fax');?></td>
            <td><input type="text" name="info[fax]" id="fax" class="input-text" size="40" value="<?php echo $fax?>" /></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_address');?></td>
            <td><input type="text" name="info[address]" id="address" class="input-text" size="40" value="<?php echo $address?>" /></td>
        </tr>
        <tr>
            <td><?php echo L('site_info_postcode');?></td>
            <td><input type="text" name="info[postcode]" id="postcode" class="input-text" size="20" value="<?php echo $postcode?>" /></td>
        </tr>
    </table>
</div>
<div id="div_setting_3" class="contentList pad-10 hidden">
    <table width="100%" class="table_form contentWrap">
        <tr>
            <td width="120px"><?php echo L("site_info_weixin_img");?></td>
            <td>
                <div class="img-wrap m-b-5 w130">
                    <?php $weixin_img_src = empty($weixin_img) ?IMG_PATH.'nopic_default.jpg' :$weixin_img;?>
                    <img src="<?php echo $weixin_img_src;?>" id="weixin_img" width="130" height="130" />
                    <span id="weixin_img_text" class="hidden red"><?php echo L('picture_loading_failure');?><span>
                </div>
                <?php echo form::images('info[weixin_img]', 'weixin_img_input', $weixin_img, 'weixin_img');?>
            </td>
        </tr>
        <tr>
            <td><?php echo L("site_info_qq_weibo");?></td>
            <td><input type="text" name="info[qq_weibo]" id="qq_weibo" class="input-text" size="30" value="<?php echo $qq_weibo?>" /></td>
        </tr>
        <tr>
            <td><?php echo L("site_info_sina_weibo");?></td>
            <td><input type="text" name="info[sina_weibo]" id="sina_weibo" class="input-text" size="30" value="<?php echo $sina_weibo?>" /></td>
        </tr>
    </table>
</div>
<div class="bk15"></div>
<input name="dosubmit" type="submit" value="<?php echo L('submit')?>" class="button" id="dosubmit" />
</div>
</div>
</form>
<script type="text/javascript">
<!--
    var picture_input = $("#picture_input"),
        weixin_img_input = $("#weixin_img_input"),
        ERROR_IMG = '<?php echo IMG_PATH;?>404.jpeg';
    $('#picture').error(function () {
        $('#picture_text').show();
        $('#picture').attr('src', ERROR_IMG);
    });
    $('#weixin_img').error(function () {
        $('#weixin_img_text').show();
        $('#weixin_img').attr('src', ERROR_IMG);
    });
    function chnage_image () {
        var picture_val    = picture_input.val(),
            weixin_img_val = weixin_img_input.val();
        // 站长照片
        if (picture_val != '' && picture_val != $('#picture').attr('val')) {
            $('#picture_text').hide();
            // 记录值，判断值是否有变动
            $('#picture').attr('val', picture_val);
            $('#picture').attr('src', picture_val);
        }
        // 微信图片
        if (weixin_img_val != '' && weixin_img_val != $('#weixin_img').attr('val')) {
            $('#weixin_img_text').hide();
            $('#weixin_img').attr('val', weixin_img_val);
            $('#weixin_img').attr('src', weixin_img_val);
        }
    }
    setInterval('chnage_image()', 1000);

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
