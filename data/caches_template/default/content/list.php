<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php if(in_array($catid,array(11,12,13,14,15,16,17,18))) { ?>
<div class="banner">
    <div class="ban_hd">
        <h3>业务专长</h3>
        <em>EXPERTISE</em>
        <div class="line"></div>
    </div>

</div>
<div class="position_bg">
    <div class="position">
        <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">首页 </a>><?php echo catpos($catid);?></p>
    </div>
</div>

<div class="a_bussness">
    <div class="bus_bd cl">
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fd177b7eb643e72fb0af2103a646dd42&action=category&catid=2&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$datas = $content_tag->category(array('catid'=>'2','limit'=>'20',));}?>
            <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
            <li>
                <a href="<?php echo $r['url'];?>">
                    <img src="<?php echo IMG_PATH;?>wycms/icon<?php echo $n;?>.jpg" />
                    <p><?php echo $r['catname'];?></p>
                </a>
            </li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </ul>
    </div>
</div>
<div class="ab_con cl">
    <div class="ab_cont">

        <div class="ab_tit cl">
            <h3 class="fl"><?php echo $CATEGORYS[$catid]['catname'];?></h3>
            <?php if($catid==11) { ?>
            <em class="fl">PRIVATE LENDING</em>
            <?php } elseif ($catid==12) { ?>
            <em class="fl">SUPPLY CHAIN FINANCE</em>
            <?php } elseif ($catid==13) { ?>
            <em class="fl">ENTERPRISE PAYMENT COLLECTION</em>
            <?php } elseif ($catid==14) { ?>
            <em class="fl">BANK DEBT COLLECTION</em>
            <?php } elseif ($catid==15) { ?>
            <em class="fl">INTERNATIONAL DEBT COLLECTION</em> 
            <?php } elseif ($catid==16) { ?>
            <em class="fl">ACCUSING THE DEBT COLLECTION</em>
            <?php } elseif ($catid==17) { ?>
            <em class="fl">PERFORM CASE AGENT</em>
            <?php } elseif ($catid==18) { ?>
            <em class="fl">INTERNET FINANCIAL</em>
            <?php } ?>
        </div>
            <?php if($catid==11) { ?>
            <span><a href="<?php echo $CATEGORYS['39']['url'];?>" class="nMore">更多>></a></span>
            <?php } elseif ($catid==12) { ?>
             <span><a href="<?php echo $CATEGORYS['40']['url'];?>" class="nMore">更多>></a></span>
            <?php } elseif ($catid==13) { ?>
             <span><a href="<?php echo $CATEGORYS['41']['url'];?>" class="nMore">更多>></a></span>
            <?php } elseif ($catid==14) { ?>
             <span><a href="<?php echo $CATEGORYS['42']['url'];?>" class="nMore">更多>></a></span>
            <?php } elseif ($catid==15) { ?>
             <span><a href="<?php echo $CATEGORYS['43']['url'];?>" class="nMore">更多>></a></span>
            <?php } elseif ($catid==16) { ?>
            <span><a href="<?php echo $CATEGORYS['44']['url'];?>" class="nMore">更多>></a></span>
            <?php } elseif ($catid==17) { ?>
             <span><a href="<?php echo $CATEGORYS['45']['url'];?>" class="nMore">更多>></a></span>
            <?php } elseif ($catid==18) { ?>
             <span><a href="<?php echo $CATEGORYS['46']['url'];?>" class="nMore">更多>></a></span>
            <?php } ?>
         
    </div>
    <div class="bu_conb">
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c2c3107524fa97d168a6a6940501ff70&action=lists&catid=%24catid&num=6&moreinfo=true&page=%24page&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 6;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'true','order'=>'inputtime desc','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$wy_pages = wy_pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'true','order'=>'inputtime desc','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li class="<?php if($n==1 || $n==4) { ?>no<?php } ?>">
                <img src="<?php echo IMG_PATH;?>lmtp/<?php echo $CATEGORYS[$catid]['catdir'];?>_<?php echo $n;?>.jpg" />
                <h3><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'55','...');?></a></h3>
                <p><?php echo str_cut(strip_tags($r['description']),'120','...');?></p>
                <div class="about_more cl">
                    <div class="time fl cl">
                        <img class="fl"  src="<?php echo IMG_PATH;?>wycms/time_icon.jpg" />
                        <em class="fl" ><?php echo date('y-m-d',$r['inputtime']);?></em>
                    </div>
                    <div class="more fr">

                        <a href="<?php echo $r['url'];?>" target="_blank">More >></a>
                    </div>
                </div>
            </li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>

        <div class="fanye">
<!--            <a  class="link" href="#"><</a> <a class="link1" href="#">1</a>  <a href="#">2</a>   <a href="#">3</a>   <a href="#">4</a>   <a href="#">5</a>   <a class="link1" href="#">></a>
        -->
       
        </div>
    </div>
</div>
<?php } elseif (in_array($catid,array(39,40,41,42,43,44,45,46))) { ?>
<?php if($catid==39) { ?>
    <?php $cat=11;?>
    <?php } elseif ($catid==40) { ?>
    <?php $cat=12;?>
     <?php } elseif ($catid==41) { ?>
    <?php $cat=13;?>
     <?php } elseif ($catid==42) { ?>
    <?php $cat=14;?>
     <?php } elseif ($catid==43) { ?>
    <?php $cat=15;?>
     <?php } elseif ($catid==44) { ?>
    <?php $cat=16;?>
     <?php } elseif ($catid==45) { ?>
    <?php $cat=17;?>
     <?php } elseif ($catid==46) { ?>
    <?php $cat=18;?>
<?php } ?>
<div class="banner">
 <div class="ban_hd">
   <h3><?php echo $CATEGORYS[$cat]['catname'];?></h3>
            <?php if($cat==11) { ?>
            <em>PRIVATE LENDING</em>
            <?php } elseif ($cat==12) { ?>
            <em>SUPPLY CHAIN FINANCE</em>
            <?php } elseif ($cat==13) { ?>
            <em>ENTERPRISE PAYMENT COLLECTION</em>
            <?php } elseif ($cat==14) { ?>
            <em>BANK DEBT COLLECTION</em>
            <?php } elseif ($cat==15) { ?>
            <em>INTERNATIONAL DEBT COLLECTION</em> 
            <?php } elseif ($cat==16) { ?>
            <em>ACCUSING THE DEBT COLLECTION</em>
            <?php } elseif ($cat==17) { ?>
            <em>PERFORM CASE AGENT</em>
            <?php } elseif ($cat==18) { ?>
            <em>INTERNET FINANCIAL</em>
            <?php } ?>
   <div class="line"></div>
 </div>
</div>
<div class="position_bg">
<div class="position">
   <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">首页 </a>><?php echo catpos($cat);?> </p>
</div>
</div>
<div class="ab_list">
  <ul class="cl" style="width:1400px;">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fd177b7eb643e72fb0af2103a646dd42&action=category&catid=2&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$datas = $content_tag->category(array('catid'=>'2','limit'=>'20',));}?>
        <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
        <li>
            <a href="<?php echo $r['url'];?>">
                <img src="<?php echo IMG_PATH;?>wycms/icon<?php echo $n;?>.jpg" />
                <p><?php echo $r['catname'];?></p>
            </a>
        </li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
<div class="ab_con cl">
    <div class="ab_cont">
    
     <div class="ab_tit cl">
       <h3 id="mao_xswz" class="fl"><?php echo $CATEGORYS[$cat]['catname'];?></h3>
      <?php if($cat==11) { ?>
            <em class="fl">PRIVATE LENDING</em>
            <?php } elseif ($cat==12) { ?>
            <em class="fl">SUPPLY CHAIN FINANCE</em>
            <?php } elseif ($cat==13) { ?>
            <em class="fl">ENTERPRISE PAYMENT COLLECTION</em>
            <?php } elseif ($cat==14) { ?>
            <em class="fl">BANK DEBT COLLECTION</em>
            <?php } elseif ($cat==15) { ?>
            <em class="fl">INTERNATIONAL DEBT COLLECTION</em> 
            <?php } elseif ($cat==16) { ?>
            <em class="fl">ACCUSING THE DEBT COLLECTION</em>
            <?php } elseif ($cat==17) { ?>
            <em class="fl">PERFORM CASE AGENT</em>
            <?php } elseif ($cat==18) { ?>
            <em class="fl">INTERNET FINANCIAL</em>
            <?php } ?>
     </div>
     
    </div>
    
    <div class="list_conb">
         <ul>
         <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c3bad8d255c2de3b89fce96402478e41&action=lists&catid=%24cat&num=9&moreinfo=true&page=%24page&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 9;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$cat,'moreinfo'=>'true','order'=>'inputtime desc','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$wy_pages = wy_pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$cat,'moreinfo'=>'true','order'=>'inputtime desc','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
           <li class="<?php if($n==1 || $n==4 || $n==7) { ?>no<?php } ?>">
            <h3><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'55','...');?></a></h3>
            <p><?php echo str_cut(strip_tags($r['description']),'120','...');?></p>
            <div class="about_more cl">
               <div class="time fl cl">
                <img class="fl"  src="<?php echo IMG_PATH;?>wycms/time_icon.jpg" />
                <em class="fl" ><?php echo date('y-m-d',$r['inputtime']);?></em>
              </div>
              <div class="more fr">
              
              <a href="<?php echo $r['url'];?>">More >></a>
             </div>
            </div>
         </li>
         <?php $n++;}unset($n); ?>
         <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
         </ul>
         
         <div class="fanye">
         <?php echo $wy_pages;?>
         </div>
    </div>
</div>
<?php } else { ?>

<div class="banner">
 <div class="ban_hd">
   <h3><?php echo $CATEGORYS[$catid]['catname'];?></h3>
            <?php if($catid==9) { ?>
            <em>LAWYERS</em>
            <?php } elseif ($catid==19) { ?>
            <em>COMMON SENSE LENDING</em>
            <?php } elseif ($catid==20) { ?>
            <em>TYPICAL CASE</em>
            <?php } elseif ($catid==21) { ?>
            <em>DEBT COLLECTION GUIDELINES</em>
            <?php } elseif ($catid==22) { ?>
            <em>LEGAL INSTRUMENTS</em>
            <?php } elseif ($catid==23) { ?>
            <em>ACADEMIC JOURNAL</em>
            <?php } elseif ($catid==24) { ?>
            <em>SUCCESSFUL CASES</em>
            <?php } elseif ($catid==25) { ?>
            <em>GOING THROUGH</em>
            <?php } elseif ($catid==26) { ?>
            <em>INDUSTRY NEWS</em>
            <?php } elseif ($catid==27) { ?>
            <em>NEW LAW EXPRESS</em>
            <?php } elseif ($catid==28) { ?>
            <em>HANDLING UNITS</em>
            <?php } elseif ($catid==34) { ?>
            <em>PARTNER</em>
            <?php } ?>
   <div class="line"></div>
 </div>
 
</div>
<div class="position_bg">
<div class="position">
   <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">首页 </a>><?php echo catpos($catid);?> </p>
</div>
</div>

<div class="<?php if(in_array($catid,array(22,23,24,25))) { ?>ca_list<?php } else { ?>ab_list<?php } ?>">
  <ul class="cl">
        <?php if(in_array($catid,array(9))) { ?>
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="<?php echo $CATEGORYS['8']['url'];?>"><img src="<?php echo IMG_PATH;?>wycms/shouxi_img.jpg" /><p>首席律师</p></a></li>
        <li><a href="<?php echo $CATEGORYS['1']['url'];?>#mao_jyls"><img src="<?php echo IMG_PATH;?>wycms/team_img.jpg"/><p>精英团队</p></a></li>
        <li><a href="<?php echo $CATEGORYS['10']['url'];?>"><img src="<?php echo IMG_PATH;?>wycms/profile_img.jpg" /><p>律所介绍</p></a></li>
        <?php } elseif (in_array($catid,array(19,20,21))) { ?>
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="<?php echo $CATEGORYS['3']['url'];?>#mao_jdcs"><img src="<?php echo IMG_PATH;?>wycms/know_icon1.jpg" /><p>借贷常识 </p></a></li>
        <li><a href="<?php echo $CATEGORYS['3']['url'];?>#mao_dxal"><img src="<?php echo IMG_PATH;?>wycms/know_icon2.jpg"/><p>典型案例 </p></a></li>
        <li><a href="<?php echo $CATEGORYS['3']['url'];?>#mao_zzzn"><img src="<?php echo IMG_PATH;?>wycms/know_icon3.jpg"/><p>追债指南 </p></a></li>
        <?php } elseif (in_array($catid,array(22,23))) { ?>
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="<?php echo $CATEGORYS['4']['url'];?>#mao_flws"><img src="<?php echo IMG_PATH;?>wycms/book_img.jpg" /><p>法律文书</p></a></li>
        <li><a href="<?php echo $CATEGORYS['4']['url'];?>#mao_xswz"><img src="<?php echo IMG_PATH;?>wycms/book_img1.jpg"/><p>学术文章</p></a></li>
        <?php } elseif (in_array($catid,array(24,25))) { ?>
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="<?php echo $CATEGORYS['5']['url'];?>#mao_cgal"><img src="<?php echo IMG_PATH;?>wycms/case_img1.jpg" /><p>成功案例</p></a></li>
        <li><a href="<?php echo $CATEGORYS['5']['url'];?>#mao_zzbl"><img src="<?php echo IMG_PATH;?>wycms/case_img2.jpg"/><p>正在办理</p></a></li>
        <?php } elseif (in_array($catid,array(26,27,28,34))) { ?>
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="<?php echo $CATEGORYS['6']['url'];?>#mao_yjxw"><img src="<?php echo IMG_PATH;?>wycms/news_icon.jpg" /><p>业界新闻</p></a></li>
        <li><a href="<?php echo $CATEGORYS['6']['url'];?>#mao_xfsd"><img src="<?php echo IMG_PATH;?>wycms/xin_icon.jpg" /><p>新法速递</p></a></li>
        <li><a href="<?php echo $CATEGORYS['6']['url'];?>#mao_badw"><img src="<?php echo IMG_PATH;?>wycms/dan_cion.jpg" /><p>办案单位</p></a></li>

        <?php } ?>

    </ul>
</div>



<div class="ab_con cl">
    <div class="ab_cont">
    
     <div class="ab_tit cl">
       <h3 id="mao_xswz" class="fl"><?php echo $CATEGORYS[$catid]['catname'];?></h3>
       
        <?php if($catid==9) { ?>
            <em class="fl">LAWYERS</em>
            <?php } elseif ($catid==19) { ?>
            <em class="fl">COMMON SENSE LENDING</em>
            <?php } elseif ($catid==20) { ?>
            <em class="fl">TYPICAL CASE</em>
            <?php } elseif ($catid==21) { ?>
            <em class="fl">DEBT COLLECTION GUIDELINES</em>
            <?php } elseif ($catid==22) { ?>
            <em class="fl">LEGAL INSTRUMENTS</em>
            <?php } elseif ($catid==23) { ?>
            <em class="fl">ACADEMIC JOURNAL</em>
            <?php } elseif ($catid==24) { ?>
            <em class="fl">SUCCESSFUL CASES</em>
            <?php } elseif ($catid==25) { ?>
            <em class="fl">GOING THROUGH</em>
            <?php } elseif ($catid==26) { ?>
            <em class="fl">INDUSTRY NEWS</em>
            <?php } elseif ($catid==27) { ?>
            <em class="fl">NEW LAW EXPRESS</em>
            <?php } elseif ($catid==28) { ?>
            <em class="fl">HANDLING UNITS</em>
            <?php } elseif ($catid==34) { ?>
            <em class="fl">PARTNER</em>
            <?php } ?>
     </div>
     
    </div>
    
    <div class="list_conb">
         <ul>
         <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=5104bd2115fdd0de05a0c47bc9ed85a5&action=lists&catid=%24catid&num=9&moreinfo=true&page=%24page&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 9;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>$catid,'moreinfo'=>'true','order'=>'inputtime desc','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$wy_pages = wy_pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>$catid,'moreinfo'=>'true','order'=>'inputtime desc','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
           <li class="<?php if($n==1 || $n==4 || $n==7) { ?>no<?php } ?>">
            <h3><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'55','...');?></a></h3>
            <p><?php echo str_cut(strip_tags($r['description']),'100','...');?></p>
            <div class="about_more cl">
               <div class="time fl cl">
                <img class="fl"  src="<?php echo IMG_PATH;?>wycms/time_icon.jpg" />
                <em class="fl" ><?php echo date('y-m-d',$r['inputtime']);?></em>
              </div>
              <div class="more fr">
              
              <a href="<?php echo $r['url'];?>">More >></a>
             </div>
            </div>
         </li>
         <?php $n++;}unset($n); ?>
         <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
         </ul>
         
         <div class="fanye">
         <?php echo $wy_pages;?>
         </div>
    </div>
</div>
<?php } ?>
<?php include template("content","footer"); ?>