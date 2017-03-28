<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div class="fullSlide">
    <div class="bd">
        <ul>
            <li alt= "深圳追债网" style="background:url(<?php echo IMG_PATH;?>wycms/banner1.jpg)  center 0 no-repeat;">

            </li>
            <li alt= "深圳供应链金融律师" style="background:url(<?php echo IMG_PATH;?>wycms/banner2.jpg)  center 0 no-repeat;">

            </li>
            <li alt= "深圳债务追讨律师" style="background:url(<?php echo IMG_PATH;?>wycms/banner3.jpg)  center 0 no-repeat;">		

            </li>

        </ul>
    </div>

    <div class="hd"><ul></ul></div>

    <script type="text/javascript">
        jQuery(".fullSlide").slide({titCell: ".hd ul", mainCell: ".bd ul", effect: "topLoop", autoPlay: true, autoPage: true, trigger: "click"});
    </script>

</div>

<div class="bussness">
    <div class="bus_hd">
        <h3>业务专长</h3>
        <em>EXPERTISE</em>
    </div>

    <div class="bus_bd cl">
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=fd177b7eb643e72fb0af2103a646dd42&action=category&catid=2&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$datas = $content_tag->category(array('catid'=>'2','limit'=>'20',));}?>
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

<div class="content_bg">
    <div class="content cl ">
        <div class="counsel">
            <div class="counsel_hd">
                <div class="counsel_hdt">
                    <h3><a href="<?php echo $CATEGORYS['8']['url'];?>">首席律师</a></h3>
                    <em>Chief Counsel</em>
                </div>
                <div class="line"></div>
                <div class="counsel_hdb">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=8e5634eb01b578743bafe4c91d4e51bb&sql=select+%2A+from+wy_page+where+catid%3D8&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}wy_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from wy_page where catid=8 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$datas = $a;unset($a);?>
                    <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
                    <p><?php echo str_cut(strip_tags($r[content]),'360','...');?><a href="<?php echo $CATEGORYS['8']['url'];?>" target="_blank">MORE >></a></p>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </div>

            </div>

            <div class="counsel_bd cl">
                <div class="counsel_bdt">
                    <h3><a href="http://www.law380.com/zytd/#mao_jyls">精英团队</a></h3>
                    <em>Elite team</em>
                    <div class="line"></div>
                </div>

                <div class="counsel_bdl">
                    <ul>
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=632ce766d37d74ab5905a9a16f6b6ae0&action=lists&catid=9&num=2&order=listorder+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'9','order'=>'listorder desc','limit'=>'2',));}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li><a href="<?php echo $r['url'];?>" target="_blank"> <img style="width: 80px;height: 80px;" src="<?php echo $r['thumb'];?>" /></a></li>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                        <li><a href="<?php echo $CATEGORYS['1']['url'];?>#mao_jyls"> <img src="<?php echo IMG_PATH;?>wycms/more.jpg" /></a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="midimg">
     <img alt="深圳债权债务律师李源" src="<?php echo IMG_PATH;?>wycms/lawer_img.jpg" />
    </div>
        <div class="cases">
            <div class="cases_hd">
                <h3><a href="http://www.law380.com/qbaj/#mao_cgal">成功案例</a></h3><span class="fr" style="color:#fff;"><a href="http://www.law380.com/qbaj/#mao_cgal">MORE >></a></span>
                <em>SUCCESS CASES </em>
                <div class="line"></div>
            </div>

            <div class="cases_bd">
                <ul >
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3f5459737e6838739a4ace6c6ed2623f&action=lists&catid=24&num=8&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'24','order'=>'inputtime desc','limit'=>'8',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li class="cl"><span><?php echo date('y/m/d',$r['inputtime']);?></span><a href="<?php echo $r['url'];?>" target="_blank"><?php echo str_cut(strip_tags($r['title']),'55','...');?></a></li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="knowledge">
    <div class="know_hd">
        <h3>债务知识</h3>
        <em>DEBT KNOWLEDGE</em>
    </div>

    <div class="know_bd cl">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c4809b6a63e08e18443acd487f869596&action=category&catid=3&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$datas = $content_tag->category(array('catid'=>'3','limit'=>'20',));}?>
        <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
        <div class="know1 ">
            <div class="know1t">
                <?php if($r[catid]==19) { ?>
                <span><a href="<?php echo $CATEGORYS['3']['url'];?>#mao_jdcs">MORE >></a></span> 
                <?php } elseif ($r[catid]==20) { ?>
                <span><a href="<?php echo $CATEGORYS['3']['url'];?>#mao_dxal">MORE >></a></span> 
                <?php } else { ?>
                <span><a href="<?php echo $CATEGORYS['3']['url'];?>#mao_zzzn">MORE >></a></span> 
                <?php } ?>
                <h3><?php echo $r['catname'];?></h3>
            </div>
            <div class="line"></div>
            <img src="<?php if($r['image']) { ?><?php echo $r['image'];?><?php } else { ?><?php echo IMG_PATH;?>wycms/know1.jpg<?php } ?>" alt="<?php echo $r['catname'];?>" />
            <ul>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0f17536097b41102d39a57d254f4a425&action=lists&catid=%24r%5Bcatid%5D&num=3&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$r[catid],'order'=>'inputtime desc','limit'=>'3',));}?>
                <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                <li><a href="<?php echo $v['url'];?>" target="_blank"><?php echo str_cut(strip_tags($v['title']),'60','...');?></a></li>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </ul>
        </div>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>
</div>

<div class="lawer_bg">
    <div class="lawer">
        <div class="know_hd">
            <h3>法律资讯</h3>
            <em>LEGAL  ADVICE</em>
        </div>

        <div class="know_bd  cl ">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=3442b927d704dd2a1f641d07ab8eafc5&action=category&catid=6&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$datas = $content_tag->category(array('catid'=>'6','limit'=>'20',));}?>
            <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
            <div class="know1 ">
                <div class="know1t">
                    <?php if($r[catid]==26) { ?>
                    <span><a href="<?php echo $CATEGORYS['6']['url'];?>#mao_yjxw">MORE >></a></span> 
                    <?php } elseif ($r[catid]==27) { ?>
                    <span><a href="<?php echo $CATEGORYS['6']['url'];?>#mao_xfsd">MORE >></a></span> 
                    <?php } else { ?>
                    <span><a href="<?php echo $CATEGORYS['6']['url'];?>#mao_badw">MORE >></a></span> 
                    <?php } ?>
                    <h3><?php echo $r['catname'];?></h3>
                </div>
                <div class="line"></div>
                <img src="<?php if($r['image']) { ?><?php echo $r['image'];?><?php } else { ?><?php echo IMG_PATH;?>wycms/know1.jpg<?php } ?>" alt="<?php echo $r['catname'];?>"/>
                <ul>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0f17536097b41102d39a57d254f4a425&action=lists&catid=%24r%5Bcatid%5D&num=3&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$r[catid],'order'=>'inputtime desc','limit'=>'3',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                    <li><a href="<?php echo $v['url'];?>" target="_blank"><?php echo str_cut(strip_tags($v['title']),'60','...');?></a></li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </div>
    </div>
</div>

<div class="bottom">
    <div  class="anthology">
        <div class="know_hd">
            <h3>律师文集</h3>
            <em>LAWYERS  ANTHOLOGY</em>
        </div>

        <div class="know_bd">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=bedb888528514dbec32162612efd02ce&action=category&catid=4&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$datas = $content_tag->category(array('catid'=>'4','limit'=>'20',));}?>
            <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
            <div class="know1 ">
                <div class="know1t">
                     <?php if($r[catid]==22) { ?>
                    <span><a href="<?php echo $CATEGORYS['4']['url'];?>#mao_flws">MORE >></a></span> 
                    <?php } else { ?>
                    <span><a href="<?php echo $CATEGORYS['4']['url'];?>#mao_xswz">MORE >></a></span> 
                    <?php } ?>
                    <h3><?php echo $r['catname'];?></h3>
                </div>
                <div class="line"></div>
                <img src="<?php if($r['image']) { ?><?php echo $r['image'];?><?php } else { ?><?php echo IMG_PATH;?>wycms/know1.jpg<?php } ?>" alt="<?php echo $r['catname'];?>" />
                <ul>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=0f17536097b41102d39a57d254f4a425&action=lists&catid=%24r%5Bcatid%5D&num=3&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>$r[catid],'order'=>'inputtime desc','limit'=>'3',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                    <li><a href="<?php echo $v['url'];?>" target="_blank"><?php echo str_cut(strip_tags($v['title']),'60','...');?></a></li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>                 
        </div>
    </div>

    <div class="partner">
        <div class="know_hd">
            <h3>合作伙伴</h3>
            <em>PARTNER</em>
        </div>

        <div class="know_bd">
            <div class="know1">
                <div class="know1t">
                    <span></span><h3><?php echo $CATEGORYS['34']['catname'];?></h3>
                </div>
                <div class="line"></div>
                <img src="<?php if($CATEGORYS[34][image]) { ?><?php echo $CATEGORYS['34']['image'];?><?php } else { ?><?php echo IMG_PATH;?>wycms/know1.jpg<?php } ?>" alt="<?php echo $CATEGORYS['34']['catname'];?>" />
                <ul>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=439a1eba94379e834a9300d5c0a54f2e&action=lists&catid=34&num=3&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'34','order'=>'inputtime desc','limit'=>'3',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
                    <li><a href="<?php echo $v['url'];?>" target="_blank"><?php echo str_cut(strip_tags($v['title']),'60','...');?></a></li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>


        </div>
    </div>
</div>

<div class="link cl">
    <div class="lin_hd">
        <h3>友情链接</h3>
        <div class="line"></div>
    </div>

    <div class="lin_bd">
        <ul class="cl">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"link\" data=\"op=link&tag_md5=36732dcae9560eabb1131f8ac2c18183&action=type_list&siteid=%24siteid&num=200&linktype=0&order=listorder+DESC\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$link_tag = wy_base::load_app_class("link_tag", "link");if (method_exists($link_tag, 'type_list')) {$data = $link_tag->type_list(array('siteid'=>$siteid,'linktype'=>'0','order'=>'listorder DESC','limit'=>'200',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $v) { ?>
            <li><a href="<?php echo $v['url'];?>" target="_blank"><?php echo $v['name'];?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>

        </ul>
    </div>
</div>
<?php include template("content","footer"); ?>