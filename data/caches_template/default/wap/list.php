<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("wap","header"); ?>
<?php if(in_array($catid,array(11,12,13,14,15,16,17,18))) { ?>
<!-- Swiper -->
<div class="ca_list">
    <div class="swiper-container" >
        <div class="swiper-wrapper" style="transform:translate3d(0px, 0px, 0px);" >
            <div class="swiper-slide" ><a href="/lists_12.html"><img src="<?php echo IMG_PATH;?>wap/icon2.jpg"><p>供应链金融</p></a></div>
            <div class="swiper-slide" ><a href="/lists_18.html"><img src="<?php echo IMG_PATH;?>wap/icon8.jpg"><p>互联网金融</p></a></div>
            <div class="swiper-slide "><a href="/lists_11.html"><img src="<?php echo IMG_PATH;?>wap/icon1.jpg"><p>民间借贷</p></a></div>
            <div class="swiper-slide"><a href="/lists_13.html"><img src="<?php echo IMG_PATH;?>wap/icon3.jpg"><p>企业账款清收</p></a></div>
            <div class="swiper-slide"><a href="/lists_14.html"><img src="<?php echo IMG_PATH;?>wap/icon4.jpg"><p>不良资产处理</p></a></div>
            <div class="swiper-slide"><a href="/lists_15.html"><img src="<?php echo IMG_PATH;?>wap/icon5.jpg"><p> 国际债务清收</p></a></div>
            <div class="swiper-slide"><a href="/lists_16.html"><img src="<?php echo IMG_PATH;?>wap/icon6.jpg"><p> 非诉债务清收</p></a></div>
            <div class="swiper-slide"><a href="/lists_17.html"><img src="<?php echo IMG_PATH;?>wap/icon7.jpg"><p> 执行案件代理 </p></a></div>

        </div>
        <!-- Add Scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>
    <!-- Initialize Swiper -->

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView: 3,
            paginationClickable: true,
            scrollbar: '.swiper-scrollbar',
            scrollbarHide: true,
            spaceBetween: -30,
            grabCursor: true

        });
    </script>
</div>
<div class="ab_cont">
    <div class="ab_tit cl">
        <h3 class="fl"><?php echo $CATEGORYS[$catid]['catname'];?></h3><em class="fl">TYPICAL CASE </em>
    </div>
    <!-- <span><a href="#">更多>></a></span> -->
</div>
<div class="bo_conm">
    <img class="img_size" alt="<?php echo $CATEGORYS[$catid]['catname'];?>" src="<?php if($CATEGORYS[$catid]['image']) { ?><?php echo $CATEGORYS[$catid]['image'];?><?php } else { ?><?php echo IMG_PATH;?>wap/about_img.jpg<?php } ?>" />
    <ul id="news18">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a70474737d76ac8070ffb4163d12195b&action=lists&catid=%24catid&num=10&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'order'=>'inputtime desc','limit'=>'10',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
</div>
<div class="m-page1">
    <a href="javascript:void(0);" id="more18" catid="<?php echo $catid;?>" class="nMore">更多>></a>
</div>
<script type="text/javascript">
    var p18 = 2;
    var num18 = 5;
    var times18 = 10;
    $("#more18").click(function() {
        if (p18 > times18) {
            $("#more18").html("更多精彩内容切换到电脑版浏览");
            $("#more18").attr("href", "<?php echo $CATEGORYS[$catid]['url'];?>");
            return;
        }
        var catid = $('#more18').attr('catid');

        $.post("/index.php?m=wap&c=index&a=ajaxList", {catid: catid, page: p18, num: num18}, function(data) {
            p18 = p18 + 1;
            eval("var datas=" + data);
            var str = "";
            for (var i = 0; i < datas.length; i++) {

                var title = datas[i].title.substring(0, 30) + "...";
                str += ' <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_' + datas[i].catid + '_' + datas[i].id + '.html">' + datas[i].title + '</a></li>';
            }
            $("#news18").append(str);
            if (datas.length < num18) {
                $("#more18").css("display", "none");
            }
        });
    });
</script>
<?php } elseif (in_array($catid,array(7))) { ?>
<div class="about_con">
    <div class="about_lb">
        <ul>
            <li class="cl"><em class="fl"><img src="<?php echo IMG_PATH;?>wap/contact1.jpg" /></em><p class="fl">联系电话：<?php echo $info['mobile'];?></p></li>
            <li class="cl"><em class="fl"><img src="<?php echo IMG_PATH;?>wap/contact2.jpg" /></em><p class="fl">QQ：<?php echo $info['qq'];?></p></li>
            <li class="cl"><em class="fl"><img src="<?php echo IMG_PATH;?>wap/contact3.jpg" /></em><p class="fl">电子邮箱：<?php echo $info['email'];?></p></li>
            <li class="cl"><em class="fl"><img src="<?php echo IMG_PATH;?>wap/contact4.jpg" /></em><p class="fl">联系地址：<?php echo $info['address'];?></p></li>
        </ul>
        <div class="m-page">
									<a href="/lists_38.html">一键导航</a>
								</div>
    </div>
    <ul class="code">
       
        <li><img src="<?php echo $info['weixin_img'];?>"><p></p></li>
    </ul>
</div>
</div>
<div class="ab_cont">
    <div class="ab_tit cl">
        <h3 class="fl">收费标准</h3><em class="fl">CHARGES </em>
    </div>
    <span><a href="/lists_33.html">更多>></a></span>
</div>
<div class="ab_conm">
    <img class="img_size" alt="收费标准" src="<?php echo $CATEGORYS['33']['image'];?>" />
    <ul>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=e4d70d01413d2f4c455a3746c3950436&action=lists&catid=33&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'33','order'=>'inputtime desc','limit'=>'5',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
</div>
<div class="ab_conb cl">
    <div class="ab_cont">
        <div class="ab_tit cl">
            <h3 class="fl">委托流程</h3><em class="fl">ORDER FLOW</em>
        </div>
        <span><a href="/lists_32.html">更多>></a></span>
    </div>
    <div class="ab_conm">
        <img class="img_size" alt="委托流程" src="<?php echo $CATEGORYS['32']['image'];?>" />
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=37cc4b89b3ce0a862af9de9e26c13390&action=lists&catid=32&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'32','order'=>'inputtime desc','limit'=>'5',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
</div>
</div>
<?php } elseif (in_array($catid,array(38))) { ?>

<script src="http://api.map.baidu.com/components?ak=9CRqItvEkq1yM95p4C6PKj77&v=1.0"></script>

<lbs-map class="lbs-mapBox" style="  padding-bottom: 50px;"  >
    <lbs-poi name="北京市盈科(深圳)律师事务所" location="114.0621,22.549756" addr="广东省深圳市福田区益田路6003号荣超商务中心B座3楼 北京市盈科（深圳）律师事务所 "  icon-src="http://api0.map.bdimg.com/<?php echo IMG_PATH;?>wap/marker_red_sprite.png" height="30px" width="45px"></lbs-poi>
</lbs-map>
<script type="text/javascript">
    $(".lbs-mapBox").height($(window).height() - 49);
    //更多选项
    $('.moreNav').click(function() {
        $(this).toggleClass("on");
        $('.otherNav').toggle();
    });
</script>
<?php } elseif (in_array($catid,array(32,33,34))) { ?>
<div class="ab_cont">
    <div class="ab_tit cl">
        <h3 class="fl"><?php echo $CATEGORYS[$catid]['catname'];?></h3>
        <?php if($catid==32) { ?>
        <em class="fl">ORDER FLOW</em>
        <?php } elseif ($catid==33) { ?>
        <em class="fl">CHARGES </em>
        <?php } else { ?>
        <em class="fl">PARTNER  </em>
        <?php } ?>
    </div>
    <!-- <span><a href="#">更多>></a></span> -->
</div>
<div class="bo_conm">
    <img class="img_size" src="<?php if($CATEGORYS[$catid]['image']) { ?><?php echo $CATEGORYS[$catid]['image'];?><?php } else { ?><?php echo IMG_PATH;?>wap/about_img.jpg<?php } ?>" />
    <ul id="news18">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a70474737d76ac8070ffb4163d12195b&action=lists&catid=%24catid&num=10&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'order'=>'inputtime desc','limit'=>'10',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
</div>
<div class="m-page1">
    <a href="javascript:void(0);" id="more18" catid="<?php echo $catid;?>" class="nMore">更多>></a>
</div>
<script type="text/javascript">
    var p18 = 2;
    var num18 = 5;
    var times18 = 10;
    $("#more18").click(function() {
        if (p18 > times18) {
            $("#more18").html("更多精彩内容切换到电脑版浏览");
            $("#more18").attr("href", "<?php echo $CATEGORYS[$catid]['url'];?>");
            return;
        }
        var catid = $('#more18').attr('catid');

        $.post("/index.php?m=wap&c=index&a=ajaxList", {catid: catid, page: p18, num: num18}, function(data) {
            p18 = p18 + 1;
            eval("var datas=" + data);
            var str = "";
            for (var i = 0; i < datas.length; i++) {

                var title = datas[i].title.substring(0, 30) + "...";
                str += ' <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_' + datas[i].catid + '_' + datas[i].id + '.html">' + datas[i].title + '</a></li>';
            }
            $("#news18").append(str);
            if (datas.length < num18) {
                $("#more18").css("display", "none");
            }
        });
    });
</script>
<?php } elseif (in_array($catid,array(8,10))) { ?>

<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="/lists_8.html"><img src="<?php echo IMG_PATH;?>wap/shouxi_img.jpg" /><p>首席律师 </p></a></li>
        <li><a href="/lists_1.html#team_mao"><img src="<?php echo IMG_PATH;?>wap/team_img.jpg"/><p>精英团队</p></a></li>
        <li><a href="/lists_10.html"><img src="<?php echo IMG_PATH;?>wap/profile_img.jpg"/><p>律所介绍 </p></a></li>
    </ul>
</div>
<div class="bus_conbg">
    <div class="bus_con">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=a937df669517cee3f34bd2a2c2fa793f&sql=select+%2A+from+wy_page+where+catid%3D%24catid&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}wy_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from wy_page where catid=$catid LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <div class="neirong">
        <?php echo $r['content'];?>
        </div>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        <div class="bus_conm cl">
            <ul>
                <?php if(module_exists('mood')) { ?>
                <script type="text/javascript" src="<?php echo APP_PATH;?>index.php?m=mood&c=index&a=wap_init&id=<?php echo id_encode($catid,$id,$siteid);?>"></script>
                <?php } ?>
                <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/return.jpg" /></a></li>
            </ul>

            <div class="share ">

                <div class="jiathis_style_32x32" style=" float:left">
                    <!-- JiaThis Button BEGIN -->
                    <div id="ckepop">
                        <a class="jiathis_button_weixin "   >

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
</div>
</div>
<?php } else { ?>
<!-- Swiper -->
<?php if($catid==8 || $catid==9 || $catid==10) { ?>
<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="/lists_8.html"><img src="<?php echo IMG_PATH;?>wap/shouxi_img.jpg" /><p>首席律师 </p></a></li>
        <li><a href="/lists_1.html#team_mao"><img src="<?php echo IMG_PATH;?>wap/team_img.jpg"/><p>精英团队</p></a></li>
        <li><a href="/lists_10.html"><img src="<?php echo IMG_PATH;?>wap/profile_img.jpg"/><p>律所介绍 </p></a></li>
    </ul>
</div>
<?php } elseif ($catid==19 || $catid==20 || $catid==21) { ?>
<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="/lists_3.html#know_mao"><img src="<?php echo IMG_PATH;?>wap/know_icon1.jpg" /><p>借贷常识 </p></a></li>
        <li><a href="/lists_3.html#type_mao"><img src="<?php echo IMG_PATH;?>wap/know_icon2.jpg"/><p>典型案例 </p></a></li>
        <li><a href="/lists_3.html#zhui_mao"><img src="<?php echo IMG_PATH;?>wap/know_icon3.jpg"/><p>追债指南 </p></a></li>
    </ul>
</div>
<?php } elseif ($catid==22 || $catid==23) { ?>
<div class="ca_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="/lists_4.html#book_mao"><img src="<?php echo IMG_PATH;?>wap/book_img.jpg" /><p>法律文书</p></a></li>
        <li><a href="/lists_4.html#artical_mao"><img src="<?php echo IMG_PATH;?>wap/book_img1.jpg"/><p>学术文章</p></a></li>
    </ul>
</div>
<?php } elseif ($catid==24 || $catid==25) { ?>
<div class="ca_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="/lists_5.html#cases_mao"><img src="<?php echo IMG_PATH;?>wap/case_img1.jpg" /><p>成功案例</p></a></li>
        <li><a href="/lists_5.html#go_mao"><img src="<?php echo IMG_PATH;?>wap/case_img2.jpg"/><p>正在办理</p></a></li>
    </ul>
</div>
<?php } elseif ($catid==26 || $catid==27 || $catid==28) { ?>
<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="/lists_6.html#know_mao"><img src="<?php echo IMG_PATH;?>wap/news_icon.jpg" /><p>业界新闻 </p></a></li>
        <li><a href="/lists_6.html#type_mao"><img src="<?php echo IMG_PATH;?>wap/xin_icon.jpg"/><p>新法速递 </p></a></li>
        <li><a href="/lists_6.html#zhui_mao"><img src="<?php echo IMG_PATH;?>wap/dan_cion.jpg"/><p>办案单位 </p></a></li>
    </ul>
</div>
<?php } ?>

<!-- Initialize Swiper -->


<div class="ab_cont">
    <div class="ab_tit cl">
        <h3 class="fl"><?php echo $CATEGORYS[$catid]['catname'];?></h3><em class="fl">TYPICAL CASE </em>
    </div>
    <!-- <span><a href="#">更多>></a></span> -->
</div>
<div class="bo_conm">
    <img class="img_size" src="<?php if($CATEGORYS[$catid]['image']) { ?><?php echo $CATEGORYS[$catid]['image'];?><?php } else { ?><?php echo IMG_PATH;?>wap/about_img.jpg<?php } ?>" />
    <ul id="news18">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a70474737d76ac8070ffb4163d12195b&action=lists&catid=%24catid&num=10&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$catid,'order'=>'inputtime desc','limit'=>'10',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
</div>
<div class="m-page1">
    <a href="javascript:void(0);" id="more18" catid="<?php echo $catid;?>" class="nMore">更多>></a>
</div>
<script type="text/javascript">
    var p18 = 2;
    var num18 = 5;
    var times18 = 10;
    $("#more18").click(function() {
        if (p18 > times18) {
            $("#more18").html("更多精彩内容切换到电脑版浏览");
            $("#more18").attr("href", "<?php echo $CATEGORYS[$catid]['url'];?>");
            return;
        }
        var catid = $('#more18').attr('catid');

        $.post("/index.php?m=wap&c=index&a=ajaxList", {catid: catid, page: p18, num: num18}, function(data) {
            p18 = p18 + 1;
            eval("var datas=" + data);
            var str = "";
            for (var i = 0; i < datas.length; i++) {

                var title = datas[i].title.substring(0, 30) + "...";
                str += ' <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_' + datas[i].catid + '_' + datas[i].id + '.html">' + datas[i].title + '</a></li>';
            }
            $("#news18").append(str);
            if (datas.length < num18) {
                $("#more18").css("display", "none");
            }
        });
    });
</script>
<?php } ?>
<?php include template("wap","footer"); ?>