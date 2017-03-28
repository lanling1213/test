<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("wap","header"); ?>
<?php if(in_array($catid,array(1))) { ?>
<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="/lists_8.html"><img src="<?php echo IMG_PATH;?>wap/shouxi_img.jpg" /><p>首席律师 </p></a></li>
        <li><a href="#team_mao"><img src="<?php echo IMG_PATH;?>wap/team_img.jpg"/><p>精英团队</p></a></li>
        <li><a href="/lists_10.html"><img src="<?php echo IMG_PATH;?>wap/profile_img.jpg"/><p>律所介绍 </p></a></li>
    </ul>
</div>
<div class="ab_conb cl">
    <div class="team_cont">
        <div class="ab_tit cl">
            <h3 class="fl">首席律师</h3><em class="fl">CHIEF COUNSEL</em>
        </div>
        <span><a href="/lists_8.html">更多>></a></span>
    </div>
    <div class="team_conm">
        <img class="fl" alt='李源律师' src="<?php echo IMG_PATH;?>wap/img_team.jpg">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=65aa4731e5359dd0580dd9e94ef9edaa&sql=select+%2A+from+wy_page+where+catid%3D8&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}wy_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from wy_page where catid=8 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <p class="fr"><?php echo str_cut(strip_tags($r['content']),'240','...');?></p>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </div>
</div>
</div>
<div class="team_cont">
    <div class="ab_tit cl">
        <h3 id="team_mao" class="fl">精英团队</h3><em class="fl">CHIEF COUNSEL</em>
    </div>
    <!--<span><a href="#">更多>></a></span>-->
</div>
<div class="team_con">
    <ul class="cl">
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=ab3d7d68ea8b7ed0b2201ab478e3d11c&action=lists&catid=9&num=8&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'9','order'=>'inputtime desc','limit'=>'8',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li class="<?php if($n%2!=0) { ?>no<?php } ?>"><a href='/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html'><img style="width:160px;height: 180px;" alt="<?php echo $r['title'];?>" src="<?php echo $r['thumb'];?>"><p><?php echo $r['title'];?></p></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
<?php } elseif (in_array($catid,array(5))) { ?>
<div class="ca_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="#cases_mao"><img src="<?php echo IMG_PATH;?>wap/case_img1.jpg" /><p>成功案例</p></a></li>
        <li><a href="#go_mao"><img src="<?php echo IMG_PATH;?>wap/case_img2.jpg"/><p>正在办理</p></a></li>
    </ul>
</div>
<div class="ab_conb cl">
    <div class="ab_cont">
        <div class="ab_tit cl">
            <h3 id="cases_mao" class="fl">成功案例</h3><em class="fl">CASES</em>
        </div>
        <span><a href="/lists_24.html">更多>></a></span>
    </div>
    <div class="ab_conm">
        <img class="img_size" alt='成功案例' src="<?php echo $CATEGORYS['24']['image'];?>" />
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f0a3badaba6cbe2a8bd0979054302cc1&action=lists&catid=24&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'24','order'=>'inputtime desc','limit'=>'5',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
</div>
</div>
<div class="ab_cont">
    <div class="ab_tit cl">
        <h3 id="go_mao" class="fl">正在办理</h3><em class="fl">GOING THROUGH </em>
    </div>
    <span><a href="/lists_25.html">更多>></a></span>
</div>
<div class="bo_conm">
    <img class="img_size" alt="正在办理" src="<?php echo $CATEGORYS['25']['image'];?>" />
    <ul>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=77a2948da6d76b972f0333a9a23686e8&action=lists&catid=25&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'25','order'=>'inputtime desc','limit'=>'5',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
</div>
<?php } elseif (in_array($catid,array(3))) { ?>
<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="#know_mao"><img src="<?php echo IMG_PATH;?>wap/know_icon1.jpg" /><p>借贷常识 </p></a></li>
        <li><a href="#type_mao"><img src="<?php echo IMG_PATH;?>wap/know_icon2.jpg"/><p>典型案例 </p></a></li>
        <li><a href="#zhui_mao"><img src="<?php echo IMG_PATH;?>wap/know_icon3.jpg"/><p>追债指南 </p></a></li>
    </ul>
</div>
<div class="ab_conb cl">
    <div class="ab_cont">
        <div class="ab_tit cl">
            <h3  id="know_mao" class="fl">借贷常识</h3><em class="fl">SENSE LENDING</em>
        </div>
        <span><a href="/lists_19.html">更多>></a></span>
    </div>
    <div class="ab_conm">
        <img class="img_size" alt="借贷常识" src="<?php echo $CATEGORYS['19']['image'];?>" />
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=eee72d6a1c7f53b9d416e211cfca0fc4&action=lists&catid=19&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'19','order'=>'inputtime desc','limit'=>'5',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
</div>
</div>
<div class="ab_cont">
    <div class="ab_tit cl">
        <h3 id="type_mao" class="fl">典型案例</h3><em class="fl">TYPICAL CASE </em>
    </div>
    <span><a href="/lists_20.html">更多>></a></span>
</div>
<div class="bo_conm">
    <img class="img_size" alt="典型案例" src="<?php echo $CATEGORYS['20']['image'];?>" />
    <ul>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f51fe18ea43c9b9b6b369e0a3cc8f560&action=lists&catid=20&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'20','order'=>'inputtime desc','limit'=>'5',));}?>
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
            <h3 id="zhui_mao" class="fl">追债指南</h3><em class="fl">GUIDELINES</em>
        </div>
        <span><a href="/lists_21.html">更多>></a></span>
    </div>
    <div class="ab_conm">
        <img class="img_size" alt="追债指南" src="<?php echo $CATEGORYS['21']['image'];?>" />
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=c40bfe83bf4ad9bb182fceeac40b3cac&action=lists&catid=21&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'21','order'=>'inputtime desc','limit'=>'5',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
</div>
</div>
<?php } elseif (in_array($catid,array(4))) { ?>
<div class="ca_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="#book_mao"><img src="<?php echo IMG_PATH;?>wap/book_img.jpg" /><p>法律文书</p></a></li>
        <li><a href="#artical_mao"><img src="<?php echo IMG_PATH;?>wap/book_img1.jpg"/><p>学术文章</p></a></li>
    </ul>
</div>
<div class="ab_conb cl">
    <div class="ab_cont">

        <div class="ab_tit cl">
            <h3 id="book_mao" class="fl">法律文书</h3><em class="fl">INSTRUMENTS</em>
        </div>
        <span><a href="/lists_22.html">更多>></a></span>
    </div>

    <div class="ab_conm">
        <img class="img_size" alt="法律文书" src="<?php echo $CATEGORYS['22']['image'];?>"  />
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=a37db7db98aa6a6be4ba67f5ac29d52e&action=lists&catid=22&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'22','order'=>'inputtime desc','limit'=>'5',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
</div>
</div>
<div class="ab_cont">
    <div class="ab_tit cl">
        <h3 id="artical_mao" class="fl">学术文章</h3><em class="fl">JOURNAL </em>
    </div>
    <span><a href="/lists_23.html">更多>></a></span>
</div>
<div class="bo_conm">
    <img class="img_size" alt="学术文章" src="<?php echo $CATEGORYS['23']['image'];?>"  />
    <ul>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=08144d55dc35701f1ebcce73ac829b3c&action=lists&catid=23&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'23','order'=>'inputtime desc','limit'=>'5',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
</div>
<?php } elseif (in_array($catid,array(6))) { ?>
<div class="ab_list">
    <ul class="cl">
        <li><a href="/"><img src="<?php echo IMG_PATH;?>wap/home.jpg" /><p>首页</p></a></li>
        <li><a href="#know_mao"><img src="<?php echo IMG_PATH;?>wap/news_icon.jpg" /><p>业界新闻 </p></a></li>
        <li><a href="#type_mao"><img src="<?php echo IMG_PATH;?>wap/xin_icon.jpg"/><p>新法速递 </p></a></li>
        <li><a href="#zhui_mao"><img src="<?php echo IMG_PATH;?>wap/dan_cion.jpg"/><p>办案单位 </p></a></li>
    </ul>
</div>
<div class="ab_conb cl">
    <div class="ab_cont">
        <div class="ab_tit cl">
            <h3  id="know_mao" class="fl">业界新闻</h3><em class="fl">INDUSTRY NEWS</em>
        </div>
        <span><a href="/lists_26.html">更多>></a></span>
    </div>
    <div class="ab_conm">
        <img class="img_size" alt="业界新闻" src="<?php echo $CATEGORYS['26']['image'];?>" />
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=70d6da3db9b5f46587b90bf80df7ed30&action=lists&catid=26&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'26','order'=>'inputtime desc','limit'=>'5',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li><em><img src="<?php echo IMG_PATH;?>wap/about_icon1.png" /></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
</div>
</div>
<div class="ab_cont">
    <div class="ab_tit cl">
        <h3 id="type_mao" class="fl">新法速递</h3><em class="fl">NEW LAW  </em>
    </div>
    <span><a href="/lists_27.html">更多>></a></span>
</div>
<div class="bo_conm">
    <img class="img_size" alt="新法速递" src="<?php echo $CATEGORYS['27']['image'];?>" />
    <ul>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=392b255427250525dc8125252c0f615f&action=lists&catid=27&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'27','order'=>'inputtime desc','limit'=>'5',));}?>
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
            <h3 id="zhui_mao" class="fl">办案单位</h3><em class="fl">HANDLING UNITS</em>
        </div>
        <span><a href="/lists_28.html">更多>></a></span>
    </div>
    <div class="pa_conm">
        <ul>
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=d150bedd86d255265146e238b0ba8e19&action=lists&catid=28&num=4&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'28','order'=>'inputtime desc','limit'=>'4',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo $r['title'];?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
</div>
</div>
<div class="ab_cont">
    <div class="ab_tit cl">
        <h3 id="type_mao" class="fl">合作伙伴</h3><em class="fl">PARTNER  </em>
    </div>
    <span><a href="/lists_34.html">更多>></a></span>
</div>
<div class="pa_conm">
    <ul>
        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=439a1eba94379e834a9300d5c0a54f2e&action=lists&catid=34&num=3&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'34','order'=>'inputtime desc','limit'=>'3',));}?>
        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
        <li><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo $r['title'];?></a></li>
        <?php $n++;}unset($n); ?>
        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
    </ul>
</div>
</div>
<?php } ?>
<?php include template("wap","footer"); ?>