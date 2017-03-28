<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>

<div class="banner">
    <div class="ban_hd">
        <h3>联系我们</h3>
        <em>Contact us</em>
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
            <h3 class="fl">联系我们</h3><em class="fl">Contact us</em>
        </div>
        <div class="about_lb">
            <p><em><img src="<?php echo IMG_PATH;?>wycms/contact1.jpg" /></em>联系电话：<?php echo $SITEINFO['mobile'];?></p>
            <p><em><img src="<?php echo IMG_PATH;?>wycms/contact2.jpg" /></em>QQ：<?php echo $SITEINFO['qq'];?></p>
            <p><em><img src="<?php echo IMG_PATH;?>wycms/contact3.jpg" /></em>电子邮箱：<?php echo $SITEINFO['email'];?></p>
            <p><em><img src="<?php echo IMG_PATH;?>wycms/contact4.jpg" /></em>联系地址：<?php echo $SITEINFO['address'];?></p>
        </div>
        <div class="cu-map">
            <div id="map" style="height:552px;-webkit-transition: all 0.5s ease-in-out;transition: all 0.5s ease-in-out; border:#ccc 1px solid;"></div>
            <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=6evqr0mSp1TuGDMGKcFPEwQQ"></script>
            <script type="text/javascript" src="<?php echo JS_PATH;?>SearchInfoWindow_min.js"></script>
            <script type="text/javascript" src="<?php echo JS_PATH;?>baidu-map.js"></script>
            <link rel="stylesheet" href="http://api.map.baidu.com/library/SearchInfoWindow/1.5/src/SearchInfoWindow_min.css" />

            <script type="text/javascript">
                // 百度地图API功能
                var map = new BMap.Map('map');
                var poi = new BMap.Point(114.062288, 22.549641);
                map.centerAndZoom(poi, 18);
                map.enableScrollWheelZoom();
                var content = '<div style="margin:0;line-height:20px;padding:2px;">' +
                        '<img src="<?php echo IMG_PATH;?>wycms/map-img.jpg" alt="" style="float:right;zoom:1;overflow:hidden;width:100px;height:100px;margin-left:3px;"/>' +
                        '地址：<?php echo $SITEINFO['address'];?><br/>手机号码：<?php echo $SITEINFO['mobile'];?><br/>简介：北京市盈科（深圳）律师事务所' +
                        '</div>';
                //创建检索信息窗口对象
                var searchInfoWindow = null;
                searchInfoWindow = new BMapLib.SearchInfoWindow(map, content, {
                    title: "北京市盈科（深圳）律师事务所", //标题
                    width: 290, //宽度
                    height: 105, //高度
                    panel: "panel", //检索结果面板
                    enableAutoPan: true, //自动平移
                    searchTypes: [
                        BMAPLIB_TAB_SEARCH, //周边检索
                        BMAPLIB_TAB_TO_HERE, //到这里去
                        BMAPLIB_TAB_FROM_HERE //从这里出发
                    ]
                });
                var marker = new BMap.Marker(poi); //创建marker对象
                marker.enableDragging(); //marker可拖拽
                marker.addEventListener("click", function(e) {
                    searchInfoWindow.open(marker);
                })
                map.addOverlay(marker); //在地图中添加marker
                searchInfoWindow.open(marker); //在marker上打开检索信息串口
            </script>
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
<?php include template("content","footer"); ?>