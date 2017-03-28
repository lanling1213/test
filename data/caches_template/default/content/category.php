<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<?php if(in_array($catid,array(1))) { ?>
<div class="banner">
    <div class="ban_hd">
        <h3>专业团队</h3>
        <em>PROFESSIONAL TEAM</em>
        <div class="line"></div>
    </div>

</div>
<div class="position_bg">
    <div class="position">
        <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">首页 </a>><?php echo catpos($catid);?></p>
    </div>
</div>

<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a target="_blank" href="<?php echo $CATEGORYS['8']['url'];?>"><img src="<?php echo IMG_PATH;?>wycms/shouxi_img.jpg" /><p>首席律师</p></a></li>
        <li><a href="#mao_jyls"><img src="<?php echo IMG_PATH;?>wycms/team_img.jpg"/><p>精英团队</p></a></li>
        <li><a target="_blank" href="<?php echo $CATEGORYS['10']['url'];?>"><img src="<?php echo IMG_PATH;?>wycms/profile_img.jpg" /><p>律所介绍</p></a></li>
    </ul>
</div>


<div class="team">
    <div class="read_t cl">

        <div class="ab_tit cl ">
            <h3 id="mao_sxls" class="fl">首席律师</h3><em class="fl">CHIEF COUNSEL</em>
        </div>

    </div>

    <div class="team_t cl">
        <img  class="fl"src="<?php echo $CATEGORYS['8']['image'];?>" />
        <p class="fr">【基本情况】<br />
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=8e5634eb01b578743bafe4c91d4e51bb&sql=select+%2A+from+wy_page+where+catid%3D8&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}wy_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from wy_page where catid=8 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datas = $a;unset($a);?>
            <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
            <?php echo str_cut(strip_tags($r[content]),'1200','...');?>
            <a href="<?php echo $CATEGORYS['8']['url'];?>" target="_blank">【更多详情】</a><br /></p>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>


    <div class="read_t cl">

        <div class="ab_tit cl ">
            <h3 id="mao_jyls" class="fl">精英团队</h3><em class="fl">LAWYERS</em>
        </div>

    </div>

    <div class="team_b">
        <ul class="cl">
            <?php $i=0;?>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=774440b850503a7eb3f1b5e1a0378349&action=lists&catid=9&num=8&order=listorder+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'9','order'=>'listorder desc','limit'=>'8',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <?php $i++;?>
            <li  class="<?php if($i==1 || $i==5) { ?>no<?php } ?>"><a href="<?php echo $r['url'];?>" target="_blank"><img src="<?php if($r['thumb']) { ?><?php echo $r['thumb'];?><?php } else { ?><?php echo IMG_PATH;?>wycms/know1.jpg<?php } ?>" style="width: 227px;height: 256px;" /><p><?php echo $r['title'];?></p></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
</div>
<?php } elseif (in_array($catid,array(2))) { ?>
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
            <h3 class="fl"><?php echo $CATEGORYS['12']['catname'];?></h3>
            <em class="fl">SUPPLY CHAIN FINANCE</em>
        </div>
    </div>
    <div class="bu_conb">
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ccd5c3daa216c5bce188058547dae3ce&action=lists&catid=12&num=6&moreinfo=true&page=%24page&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$pagesize = 6;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$content_total = $content_tag->count(array('catid'=>'12','moreinfo'=>'true','order'=>'inputtime desc','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($content_total, $page, $pagesize, $urlrule);$wy_pages = wy_pages($content_total, $page, $pagesize, $urlrule);$data = $content_tag->lists(array('catid'=>'12','moreinfo'=>'true','order'=>'inputtime desc','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li class="<?php if($n==1 || $n==4) { ?>no<?php } ?>">
                <img src="<?php if($r['thumb']) { ?><?php echo $r['thumb'];?><?php } else { ?><?php echo IMG_PATH;?>wycms/know1.jpg<?php } ?>" />
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
        <?php echo $wy_pages;?>
        </div>
    </div>
</div>
<?php } elseif (in_array($catid,array(3))) { ?>
<div class="banner">
    <div class="ban_hd">
        <h3>债务知识</h3>
        <em>DEBT KNOWLEDGE</em>
        <div class="line"></div>
    </div>

</div>
<div class="position_bg">
    <div class="position">
        <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">首页 </a>><?php echo catpos($catid);?> </p>
    </div>
</div>

<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="#mao_jdcs"><img src="<?php echo IMG_PATH;?>wycms/know_icon1.jpg" /><p>借贷常识 </p></a></li>
        <li><a href="#mao_dxal"><img src="<?php echo IMG_PATH;?>wycms/know_icon2.jpg"/><p>典型案例 </p></a></li>
        <li><a href="#mao_zzzn"><img src="<?php echo IMG_PATH;?>wycms/know_icon3.jpg"/><p>追债指南 </p></a></li>
    </ul>
</div>
<?php $b=0;?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=22922143bc9f7811ae1b153182c86ef6&action=category&catid=3&order=id+asc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'3','order'=>'id asc','limit'=>'20',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
<?php $b++;?>
<?php if($b==2) { ?><div class="new_con"><?php } ?>
    <div class="ab_con cl">
        <div class="ab_cont">
            <div class="ab_tit cl">

                <?php if($b==1) { ?>
                <h3 id="mao_jdcs" class="fl"><?php echo $v['catname'];?></h3>
                <em class="fl">COMMON SENSE  LENDING</em>
                <?php } elseif ($b==2) { ?>
                <h3 id="mao_dxal" class="fl"><?php echo $v['catname'];?></h3>
                <em class="fl">TYPICAL  CASE</em>
                <?php } elseif ($b==3) { ?>
                <h3 id="mao_zzzn" class="fl"><?php echo $v['catname'];?></h3>
                <em class="fl">DEBT COLLECTION  GUIDELINES</em>
                <?php } ?>
            </div>
            <span><a  href="<?php echo $v['url'];?>" id="more<?php echo $b;?>" catid="<?php echo $v['catid'];?>" class="nMore">更多>></a></span>
        </div>

        <div class="ab_conb">
            <ul id="news<?php echo $b;?>">
                <?php $i=0;?>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=55d3a9c23e140dee0b7a71a792a4579d&action=lists&catid=%24v%5Bcatid%5D&num=3&order=id+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id desc','limit'=>'3',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <?php $i++;?>
                <li class="<?php if($i==1) { ?>no<?php } ?>">
                    <img src="<?php echo IMG_PATH;?>3_<?php echo $b;?>_<?php echo $n;?>.jpg" />
                    <h3><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'55','...');?></a></h3>
                    <p><?php echo str_cut(strip_tags($r['description']),'120','...');?></p>
                    <div class="about_more cl">
                        <div class="time fl cl">
                            <img class="fl"  src="<?php echo IMG_PATH;?>wycms/time_icon.jpg" />
                            <em class="fl" ><?php echo date('y-m-d',$r[inputtime]);?></em>
                        </div>
                        <div class="more fr">
                            <a href="<?php echo $r['url'];?>" target="_blank">More >></a>
                        </div>
                    </div>
                </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
    <?php if($b==2) { ?></div><?php } ?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

<?php } elseif (in_array($catid,array(4))) { ?>
<div class="banner">
    <div class="ban_hd">
        <h3>律师文集</h3>
        <em>LEGALERS ANTHOLOGY</em>
        <div class="line"></div>
    </div>

</div>
<div class="position_bg">
    <div class="position">
        <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">首页 </a>><?php echo catpos($catid);?> </p>
    </div>
</div>

<div class="ca_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="#mao_flws"><img src="<?php echo IMG_PATH;?>wycms/book_img.jpg" /><p>法律文书</p></a></li>
        <li><a href="#mao_xswz"><img src="<?php echo IMG_PATH;?>wycms/book_img1.jpg"/><p>学术文章</p></a></li>
    </ul>
</div>
<?php $b=0;?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=53fe2245bddc8c78d26ce5f4f8a95daa&action=category&catid=4&order=id+asc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'4','order'=>'id asc','limit'=>'20',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
<?php $b++;?>
<?php if($b==1) { ?><div class="new_con"><?php } ?>
    <div class="ab_con cl">
        <div class="ab_cont">
            <div class="ab_tit cl">
                <?php if($b==1) { ?>
                <h3 id="mao_flws" class="fl"><?php echo $v['catname'];?></h3>
                <em class="fl">LEGAL INSTRUMENTS </em>
                <?php } elseif ($b==2) { ?>
                <h3 id="mao_xswz" class="fl"><?php echo $v['catname'];?></h3>
                <em class="fl">ACADEMIC JOURNAL</em>
                <?php } ?>
            </div>
            <span><a  href="<?php echo $v['url'];?>" id="more<?php echo $b;?>" catid="<?php echo $v['catid'];?>" class="nMore">更多>></a></span>
        </div>

        <div class="ab_conb">
            <ul id="news<?php echo $b;?>">
                <?php $i=0;?>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=55d3a9c23e140dee0b7a71a792a4579d&action=lists&catid=%24v%5Bcatid%5D&num=3&order=id+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id desc','limit'=>'3',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <?php $i++;?>
                <li class="<?php if($i==1) { ?>no<?php } ?>">
                    <img src="<?php echo IMG_PATH;?>4_<?php echo $b;?>_<?php echo $n;?>.jpg" />
                    <h3><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'55','...');?></a></h3>
                    <p><?php echo str_cut(strip_tags($r['description']),'120','...');?></p>
                    <div class="about_more cl">
                        <div class="time fl cl">
                            <img class="fl"  src="<?php echo IMG_PATH;?>wycms/time_icon.jpg" />
                            <em class="fl" ><?php echo date('y-m-d',$r[inputtime]);?></em>
                        </div>
                        <div class="more fr">
                            <a href="<?php echo $r['url'];?>" target="_blank">More >></a>
                        </div>
                    </div>
                </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
    <?php if($b==1) { ?></div><?php } ?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

<?php } elseif (in_array($catid,array(5))) { ?>
<div class="banner">
    <div class="ban_hd">
        <h3>亲办案件</h3>
        <em>OFFICE  PRO  CASE</em>
        <div class="line"></div>
    </div>

</div>
<div class="position_bg">
    <div class="position">
        <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">首页 </a>><?php echo catpos($catid);?> </p>
    </div>
</div>

<div class="ca_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="#mao_cgal"><img src="<?php echo IMG_PATH;?>wycms/case_img1.jpg" /><p>成功案例</p></a></li>
        <li><a href="#mao_zzbl"><img src="<?php echo IMG_PATH;?>wycms/case_img2.jpg"/><p>正在办理</p></a></li>
    </ul>
</div>
<?php $b=0;?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c423cd1a75fe27be4490c27bc8dd4c91&action=category&catid=5&order=id+asc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'5','order'=>'id asc','limit'=>'20',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
<?php $b++;?>
<?php if($b==1) { ?><div class="new_con"><?php } ?>
    <div class="ab_con cl">
        <div class="ab_cont">
            <div class="ab_tit cl">
                <?php if($b==1) { ?>
                <h3 id="mao_cgal" class="fl"><?php echo $v['catname'];?></h3>
                <em class="fl">SUCCESSFUL CASES </em>
                <?php } elseif ($b==2) { ?>
                <h3 id="mao_zzbl" class="fl"><?php echo $v['catname'];?></h3>
                <em class="fl">GOING  THROUGH</em>
                <?php } ?>
            </div>
            <span><a  href="<?php echo $v['url'];?>" id="more<?php echo $b;?>" catid="<?php echo $v['catid'];?>" class="nMore">更多>></a></span>
        </div>

        <div class="ab_conb">
            <ul id="news<?php echo $b;?>">
                <?php $i=0;?>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=55d3a9c23e140dee0b7a71a792a4579d&action=lists&catid=%24v%5Bcatid%5D&num=3&order=id+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id desc','limit'=>'3',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <?php $i++;?>
                <li class="<?php if($i==1) { ?>no<?php } ?>">
                 <?php if($b==1) { ?>
                    <img src="<?php if($r['thumb']) { ?><?php echo $r['thumb'];?><?php } else { ?><?php echo IMG_PATH;?>5_<?php echo $b;?>_<?php echo $n;?>.jpg<?php } ?>" />
                 <?php } else { ?>
                    <img src="<?php echo IMG_PATH;?>5_<?php echo $b;?>_<?php echo $n;?>.jpg" />
                 <?php } ?>   
                    <h3><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'55','...');?></a></h3>
                    <p><?php echo str_cut(strip_tags($r['description']),'120','...');?></p>
                    <div class="about_more cl">
                        <div class="time fl cl">
                            <img class="fl"  src="<?php echo IMG_PATH;?>wycms/time_icon.jpg" />
                            <em class="fl" ><?php echo date('y-m-d',$r[inputtime]);?></em>
                        </div>
                        <div class="more fr">
                            <a href="<?php echo $r['url'];?>" target="_blank">More >></a>
                        </div>
                    </div>
                </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
    <?php if($b==1) { ?></div><?php } ?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

<?php } elseif (in_array($catid,array(6))) { ?>
<div class="banner">
    <div class="ban_hd">
        <h3>法律资讯</h3>
        <em>LEGAL ADVICE</em>
        <div class="line"></div>
    </div>

</div>
<div class="position_bg">
    <div class="position">
        <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">首页 </a>><?php echo catpos($catid);?> </p>
    </div>
</div>

<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wycms/home.jpg" /><p>首页</p></a></li>
        <li><a href="#mao_yjxw"><img src="<?php echo IMG_PATH;?>wycms/news_icon.jpg" /><p>业界新闻</p></a></li>
        <li><a href="#mao_xfsd"><img src="<?php echo IMG_PATH;?>wycms/xin_icon.jpg" /><p>新法速递</p></a></li>
        <li><a href="#mao_badw"><img src="<?php echo IMG_PATH;?>wycms/dan_cion.jpg" /><p>办案单位</p></a></li>
    </ul>
</div>
<?php $b=0;?>
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=cdc10ef7b95dc5fa09d9e6199398b1f1&action=category&catid=6&num=2&order=id+asc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'6','order'=>'id asc','limit'=>'2',));}?>
<?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
<?php $b++;?>
<?php if($b==2) { ?><div class="new_con"><?php } ?>
    <div class="ab_con cl">
        <div class="ab_cont">
            <div class="ab_tit cl">

                <?php if($b==1) { ?>
                <h3 id="mao_yjxw" class="fl"><?php echo $v['catname'];?></h3>
                <em class="fl">INDUSTRY NEWS</em>
                <?php } elseif ($b==2) { ?>
                <h3 id="mao_xfsd" class="fl"><?php echo $v['catname'];?></h3>
                <em class="fl">NEW LAW EXPRESS</em>
                <?php } ?>
            </div>
            <span><a  href="<?php echo $v['url'];?>" id="more<?php echo $b;?>" catid="<?php echo $v['catid'];?>" class="nMore">更多>></a></span>
        </div>

        <div class="ab_conb">
            <ul id="news<?php echo $b;?>">
                <?php $i=0;?>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=55d3a9c23e140dee0b7a71a792a4579d&action=lists&catid=%24v%5Bcatid%5D&num=3&order=id+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$v[catid],'order'=>'id desc','limit'=>'3',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <?php $i++;?>
                <li class="<?php if($i==1) { ?>no<?php } ?>">
                    <img src="<?php echo IMG_PATH;?>3_<?php echo $b;?>_<?php echo $n;?>.jpg" />
                    <h3><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'55','...');?></a></h3>
                    <p><?php echo str_cut(strip_tags($r['description']),'120','...');?></p>
                    <div class="about_more cl">
                        <div class="time fl cl">
                            <img class="fl"  src="<?php echo IMG_PATH;?>wycms/time_icon.jpg" />
                            <em class="fl" ><?php echo date('y-m-d',$r[inputtime]);?></em>
                        </div>
                        <div class="more fr">
                            <a href="<?php echo $r['url'];?>" target="_blank">More >></a>
                        </div>
                    </div>
                </li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
    </div>
    <?php if($b==2) { ?></div><?php } ?>
<?php $n++;}unset($n); ?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<div class="ab_con cl">
    <div class="ab_cont">

        <div class="ab_tit cl">
            <h3 id="mao_badw" class="fl">办案单位</h3><em class="fl">HANDLING UNITS</em>
        </div>

    </div>

    <div class="units_conb">
        <ul class="cl">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=46ebfcca6f8db6adc47582ef7b1e655c&action=lists&catid=28&num=12&order=id+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'28','order'=>'id desc','limit'=>'12',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li ><a href="<?php echo $r['url'];?>"><?php echo str_cut(strip_tags($r['title']),'50','...');?> </a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </ul>
    </div>
</div>
<!-- <div class="new_con">
    <div class="ab_con cl">
        <div class="ab_cont">

            <div class="ab_tit cl">
                <h3 id="mao_badw" class="fl">合作伙伴</h3><em class="fl">PARTNER</em>
            </div>

        </div>

        <div class="units_conb">
            <ul class="cl">
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=74e481c090ac34fa5f4255ae6f9dde3e&action=lists&catid=34&num=12&order=id+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">修改</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'34','order'=>'id desc','limit'=>'12',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <li ><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'50','...');?> </a></li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

            </ul>
        </div>
    </div>
</div> -->
<?php } else { ?>
<?php } ?>
<?php include template("content","footer"); ?>