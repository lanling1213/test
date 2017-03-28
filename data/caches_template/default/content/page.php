<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php if(in_array($catid,array(36))) { ?>
<div class="banner">
    <div class="ban_hd">
        <h3>免责声明</h3>
        <em>DISCLAIMER</em>
        <div class="line"></div>
    </div>
</div>
<div class="position_bg">
    <div class="position">
        <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">首页 </a>><?php echo catpos($catid);?></p>
    </div>
</div>
<div class="about_con cl">
    <div class="about_l fl">
        <div class="ab_tit cl">
            <h3 class="fl">免责声明</h3><em class="fl">DISCLAIMER</em>
        </div>
        <div class="about_lb">
            <p><?php echo $title;?></p>
            <p><?php echo $content;?></p>
        </div>
    </div>
    <div class="about_r fr">
        <div class="about_rcon">
            <div class="about_rt cl">
                <h3 class="fl">委托流程</h3><em class="fl">ORDER FLOW</em>
            </div>
            <img src="<?php echo IMG_PATH;?>wycms/about_img.jpg" />
            <ul>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cd3830427e83a967a3ae5e64d7cb3b5c&action=lists&catid=32&num=5&order=id+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'32','order'=>'id desc','limit'=>'5',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <li><em><img src="<?php echo IMG_PATH;?>wycms/about_icon1.jpg" /></em><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'50','...');?> </a></li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
        <div class="about_rcon">
            <div class="about_rt cl">
                <h3 class="fl">收费标准</h3><em class="fl">CHARGES</em>
            </div>
            <img src="<?php echo IMG_PATH;?>wycms/about_img1.jpg" />
            <ul>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=bdbee4c4b51354d468b15da1f403143c&action=lists&catid=33&num=5&order=id+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'33','order'=>'id desc','limit'=>'5',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <li><em><img src="<?php echo IMG_PATH;?>wycms/about_icon1.jpg" /></em><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'50','...');?> </a></li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
</div>
<?php } elseif (in_array($catid,array(8,10))) { ?>

<div class="banner">
    <div class="ban_hd">
        <h3>专业团队</h3>
        <em>PROFESSIONAL TEAM</em>
        <div class="line"></div>
    </div>

</div>
<div class="position_bg">
    <div class="position">
        <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="#">首页 </a>><?php echo catpos($catid);?></p>
    </div>
</div>

<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="<?php echo $CATEGORYS['8']['url'];?>"><img src="<?php echo IMG_PATH;?>wycms/shouxi_img.jpg" /><p>首席律师</p></a></li>
        <li><a href="<?php echo $CATEGORYS['1']['url'];?>#mao_jyls"><img src="<?php echo IMG_PATH;?>wycms/team_img.jpg"/><p>精英团队</p></a></li>
        <li><a href="<?php echo $CATEGORYS['10']['url'];?>"><img src="<?php echo IMG_PATH;?>wycms/profile_img.jpg" /><p>律所介绍</p></a></li>
    </ul>
</div>

<div class="bus_conbg">
    <div class="bus_con">
        <div class="bus_cont">
            <h3><?php echo $title;?></h3>
        </div>
        <?php echo $content;?>
        <div class="bus_conm cl">
            <ul class="fl">
                <?php if(module_exists('mood')) { ?>
               <script type="text/javascript" src="<?php echo APP_PATH;?>index.php?m=mood&c=index&a=init&id=<?php echo id_encode($catid,$id,$siteid);?>"></script>
               <?php } ?>
                <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/return.jpg" /></a></li>
            </ul>
            <div class="share fr ">

                <div class="jiathis_style_32x32" style=" float:left">
                    <!-- JiaThis Button BEGIN -->
                    <div id="ckepop">
                        <a class="jiathis_button_weixin" >
                            <img src="<?php echo IMG_PATH;?>wycms/share.jpg" width="221px" height="40px"  />
                        </a> 
                        <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js" charset="utf-8"></script>
                    </div> <!-- JiaThis Button END -->
                </div>
                <div class="fenxiang fl">
                    <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare" style=" width:250px; height:27px; overflow:hidden;">
                        <span class="bds_more">分享到：</span>
                        <a class="bds_qzone"></a>
                        <a class="bds_tsina"></a>
                        <a class="bds_tqq"></a>
                        <a class="bds_renren"></a>
                        <a class="bds_t163"></a>
                        <a class="shareCount"></a>
                    </div>
                    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=697092" ></script>
                    <script type="text/javascript" id="bdshell_js"></script>
                    <script type="text/javascript">
                        document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date() / 3600000)
                    </script>
                </div>
            </div>

        </div>


        <div class="bus_conb">
            <p>免责声明：本网部分文章和信息来源于国际互联网，本网转载出于传递更多信息和学习之目的。如转载稿涉及版权等问题，请立即联系网站所有人，我们会予以更改或删除相关文章，保证您的权利。</p>

        </div>
    </div>
</div>

<?php } ?>
<?php include template("content","footer"); ?>