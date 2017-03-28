<?php defined('IN_WYCMS') or exit('No permission resources.'); ?>  <div class="cl"></div>
    <div class="space"></div>
    <div class="space20"></div>
</div>
<div class="b-nav fixed-bottom">
    <div class="b-navCon rel">
        <a href="/"><img src="<?php echo IMG_PATH;?>wap/home.png" alt="">网站首页</a>
        <a href="tel:<?php echo $info['mobile'];?>"><img src="<?php echo IMG_PATH;?>wap/phone.png" alt="">电话咨询</a>
        <a href="/ask.html"><img src="<?php echo IMG_PATH;?>wap/message.png" alt="">在线咨询</a>
        <a class="moreNav rel"><img src="<?php echo IMG_PATH;?>wap/more.png" alt="">更多选项<em class="f-shang"></em></a>
        <div class="otherNav">
            <div class="otherNavBox">
                <ul>
                    <li><a href="/lists_1.html">专业团队</a></li>
                    <li><a href="/lists_12.html">业务专长</a></li>
                    <li><a href="/lists_5.html">亲办案件</a></li>
                    <li><a href="/lists_6.html">法律资讯</a></li>
                    <li><a href="/lists_3.html">债务知识</a></li>
                    <li><a href="/lists_4.html">律师文集</a></li>
                    <li><a href="/lists_7.html">关于我们</a></li>
                </ul>
            </div>

        </div>
    </div>
</div>
</div>

<script type="text/javascript">
    TouchSlide({
        slideCell: "#focus",
        titCell: ".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
        mainCell: ".bd ul",
        effect: "leftLoop",
        autoPlay: true, //自动播放



        autoPage: true, //自动分页
        switchLoad: "_src", //切换加载，真实图片路径为"_src" 
        interTime: 3000,
        delayTime: 500
    });
    //设置banner图片的高度
    var w_img = $(".focus .bd li img").width();
    $(".focus .bd li img").height(w_img / 2);
    //设置图片的高度
    var w_simg = $(".item-tBox").width();
    $(".item-pic img").height((w_simg - 8) * 0.65);
    //图标高度
    $(window).resize(function() {
        var h_ico = $(".ix-con li a").width();
        $(".ix-con li a").height(h_ico);
    })
    //更多选项
    $('.moreNav').click(function() {
        $(this).toggleClass("on");
        $('.otherNav').toggle();
    });

</script>         
</body>
</html>
