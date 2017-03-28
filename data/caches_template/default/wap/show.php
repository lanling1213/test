<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("wap","header"); ?>
<?php if($catid==11 || $catid==12 || $catid==13 || $catid==14 || $catid==15 || $catid==16 || $catid==17 || $catid==18) { ?>
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

<?php } elseif ($catid==8 || $catid==9 || $catid==10) { ?>
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

<div class="bus_conbg">
    <div class="bus_con">
        <div class="bus_cont">
            <h3><?php echo $title;?></h3>
            <em>来源：<?php if($copyfrom) { ?><?php echo $copyfrom;?><?php } else { ?>未知<?php } ?>      作者：<?php if($writer) { ?><?php echo $writer;?><?php } else { ?>未知<?php } ?>     时间：<?php echo date('y-m-d',strtotime($inputtime));?></em>
        </div>
        <?php if($catid==9) { ?>
        <div class="pe_pic">
            <img src="<?php echo $thumb;?>" alt="<?php echo $title;?>"/>
        </div>
        <?php } ?>
        <p><?php echo $rs['content'];?></p>
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
            <a>上一篇：<?php if($next_page[title]=="last_page") { ?>没有了<?php } else { ?><a href="/show_<?php echo $next_page['catid'];?>_<?php echo $next_page['id'];?>.html"><?php echo $next_page['title'];?></a><?php } ?><br />
                <a>下一篇：<?php if($previous_page[title]=="first_page") { ?>没有了<?php } else { ?><a href="/show_<?php echo $previous_page['catid'];?>_<?php echo $previous_page['id'];?>.html"><?php echo $previous_page['title'];?></a><?php } ?>

                    </div>
                    </div>

                    <?php if($catid!=9) { ?>
                    <div class="read">
                        <div class="read_t cl">


                            <div class="ab_tit cl ">
                                <h3 class="fl">延展阅读</h3><em class="fl">ACADEMIC JOURNAL</em>
                            </div>
                            <span><a href="#">更多>></a></span>
                        </div>
                        <div class="read_b">
                            <ul>
                                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c181b2788bf68137c4143d2915f31937&action=lists&catid=37&num=5&order=listorder+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'37','order'=>'listorder desc','limit'=>'5',));}?>
                                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                <li><span><?php echo date('y-m-d',$r['inputtime']);?></span><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo $r['title'];?> </a></li>
                                <?php $n++;}unset($n); ?>
                                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                            </ul>
                        </div>
                    </div>

                    <div class="comment">
                        <div class="read_t cl">
                            <div class="ab_tit cl ">
                                <h3 class="fl">发表评论</h3><em class="fl">COMMENT</em>
                            </div>
                           
                        </div>
                        <div class="comment_b">
                            <div class="t8">
                                <div class="comment-in">
                                    <?php $commentid=id_encode('content_'.$catid,$id,$siteid)?>
                                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=2ffe102e68401ea549890d8d90ae2bd1&action=get_comment&commentid=%24commentid\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$comment_tag = wy_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'get_comment')) {$data = $comment_tag->get_comment(array('commentid'=>$commentid,'limit'=>'20',));}?>
                                    <?php $comment = $data;?>
                                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                                    <form action="<?php echo APP_PATH;?>index.php?m=wap&amp;c=index&amp;a=comment" method="post">
                                        <p><textarea class="riea" name="msg" type="text" onfocus="if (this.value == this.defaultValue) {
                                                            this.value = ''
                                                        }" onblur="if (this.value == this.defaultValue || this.value == '') {
                                                                    this.value = this.defaultValue
                                                                }">内容</textarea></p>

                                        <input type="hidden" name="commentid" value="<?php echo id_encode('content_'.$catid,$id,$siteid);?>" />
                                        <input type="hidden" name="typeid" value="<?php echo $typeid;?>" />
                                        <input type="hidden" name="catid" value="<?php echo $catid;?>" />
                                        <input type="hidden" name="id" value="<?php echo $id;?>" />
                                        <input type="hidden" name="title" value="<?php echo urlencode(($comment[title] ? $comment[title] : $title));?>">
                                        <input type="hidden" name="url" value="<?php echo urlencode(show_url($catid,$typeid,$id));?>">
                                        <br/>
                                        <input class="fr button" type="submit" name="dosumbit" value="提交评论" class="an1" />

                                    </form>

                                </div>
                                <div class="read_t cl">
                                    <div class="ab_tit cl ">
                                        <h3 class="fl">全部评论</h3><em class="fl">All COMMENT</em>
                                    </div>
                                    
                                </div>
                                <ul>
                                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=84f0ce37c7cb39aef3ef0184f99dd2a1&action=lists&commentid=%24commentid&siteid=%24siteid&page=%24_GET%5Bpage%5D&hot=%24hot&num=4&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$comment_tag = wy_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'lists')) {$pagesize = 4;$page = intval($_GET[page]) ? intval($_GET[page]) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$comment_total = $comment_tag->count(array('commentid'=>$commentid,'siteid'=>$siteid,'hot'=>$hot,'limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($comment_total, $page, $pagesize, $urlrule);$wy_pages = wy_pages($comment_total, $page, $pagesize, $urlrule);$data = $comment_tag->lists(array('commentid'=>$commentid,'siteid'=>$siteid,'hot'=>$hot,'limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>  
                                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                                      <li><?php echo $r['content'];?></li>
                                    <?php $n++;}unset($n); ?>
                                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                                  
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    </div>
                    <?php include template("wap","footer"); ?>