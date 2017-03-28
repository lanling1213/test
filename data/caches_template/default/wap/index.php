<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php $info = siteinfo(1);$info = string2array($info['infos']);?>
<!doctype html><head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=3.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>wap/style.css" />
    <script src="<?php echo JS_PATH;?>TouchSlide.1.1.js"></script>
    <script src="<?php echo JS_PATH;?>zepto.js"></script>
    <title><?php if($catname) { ?><?php echo $catname;?>-<?php if(isset($page)&&$page>1) { ?>第<?php echo $page;?>页-<?php } ?><?php } elseif ($title && $_GET['m']!='ask') { ?><?php echo $title;?>-<?php if(isset($page)&&$page>1) { ?>第<?php echo $page;?>页-<?php } ?><?php } elseif ($_GET['m']=='ask' && $_GET[a]=='lists') { ?>在线咨询-<?php if(isset($page)&&$page>1) { ?>第<?php echo $page;?>页-<?php } ?>深圳追债网<?php } elseif ($_GET['m']=='ask' &&$_GET[a]=='show') { ?><?php echo str_cut($content,90,false);?>-深圳追债网<?php } else { ?>深圳债务纠纷律师|深圳经济纠纷律师|深圳债务追讨律师-深圳追债网<?php } ?><?php if($catid=="" && $CAT[parentid]==0) { ?><?php } else { ?>深圳追债网<?php } ?></title> 
    <meta name="keywords" content="<?php if($catname&&!isset($id)) { ?><?php echo $catname;?><?php } elseif ($title&&isset($id)) { ?><?php echo $rs['keywords'];?>,<?php echo $CAT['catname'];?>,<?php echo $title;?><?php } else { ?>深圳债务纠纷律师,深圳经济纠纷律师,深圳债务追讨律师,深圳追债网<?php } ?>"/>
    <meta name="description" content="<?php if($title&&isset($id)) { ?><?php echo $rs['description'];?><?php } elseif ($catid==""&&$_GET[m]=='content') { ?>深圳追债网<?php echo $CAT['catname'];?>栏目为您提供<?php echo $CAT['catname'];?>相关法律知识和内容，如果还需要更多的、专业的<?php echo $CAT['catname'];?>知识，可咨询深圳追债律师李源律师，咨询热线：<?php echo $SITEINFO['tel'];?><?php } elseif ($_GET['m']=='ask' && $_GET[a]=='lists') { ?>在线咨询-深圳追债网<?php } elseif ($_GET['m']=='ask' && $_GET[a]=='show') { ?><?php echo $content;?><?php } else { ?>深圳追债网是由深圳李源律师创建,擅长民间借贷,债务清收,执行案件代理,互联网金融,供应链金融,债务纠纷等法律事务,咨询热线：<?php echo $SITEINFO['tel'];?>。<?php } ?>"/>
</head>
<div class="main">
    <div class="header cl">
        <div class="logo fl">
            <a href="/"><img  src="<?php echo IMG_PATH;?>wap/logo.jpg" alt="深圳追债网"></a>
        </div>
        <div class="phone fr">
            <img class="fl" alt="<?php echo $info['mobile'];?>" src="<?php echo IMG_PATH;?>wap/phone.jpg">
            <p class="fl">李源律师：</br>
                <?php echo $info['mobile'];?></p>
        </div>

    </div>
    <div id="focus" class="focus">
        <div class="hd">
            <ul>

            </ul>
        </div>
        <div class="bd">
            <ul>
                <li> <a href="#"><img _src="<?php echo IMG_PATH;?>wap/banner.jpg" src="<?php echo IMG_PATH;?>wap/blank.png" alt="深圳追债网" /></a></li>
                <li><a href="#"><img _src="<?php echo IMG_PATH;?>wap/banner1.jpg" src="<?php echo IMG_PATH;?>wap/blank.png" alt="深圳供应链金融律师"/></a></li>
                <li><a href="#"><img _src="<?php echo IMG_PATH;?>wap/banner2.jpg" src="<?php echo IMG_PATH;?>wap/blank.png" alt="深圳债务追讨律师"/></a></li>
            </ul>
        </div>
    </div>
    <div class="ix-con">
        <ul>
            <li><a href="/lists_12.html" class="rel"><img src="<?php echo IMG_PATH;?>wap/icon2.jpg" alt=""><br />供应链金融</a></li>
            <li><a href="/lists_18.html" class="rel"><img src="<?php echo IMG_PATH;?>wap/icon8.jpg" alt=""><br />互联网金融 </a></li>
            <li><a href="/lists_11.html" class="rel"><img src="<?php echo IMG_PATH;?>wap/icon1.jpg" alt=""><br />民间借贷</a></li>
            <li><a href="/lists_13.html" class="rel"><img src="<?php echo IMG_PATH;?>wap/icon3.jpg" alt=""><br />企业账款清收</a></li>
        </ul>
        <ul class="ix-conb">
            <li><a href="/lists_14.html" class="rel"><img src="<?php echo IMG_PATH;?>wap/icon4.jpg" alt=""><br />不良资产处理</a></li>
            <li><a href="/lists_15.html" class="rel"><img src="<?php echo IMG_PATH;?>wap/icon5.jpg" alt=""><br />国际债务清收</a></li>
            <li><a href="/lists_16.html" class="rel"><img src="<?php echo IMG_PATH;?>wap/icon6.jpg" alt=""><br />非诉债务清收</a></li>
            <li><a href="/lists_17.html" class="rel"><img src="<?php echo IMG_PATH;?>wap/icon7.jpg" alt=""><br /> 执行案件代理</a></li>
        </ul>
    </div>

    <div class="introduce">

        <div class="bd">


            <div class="cl"></div>


            <div class="fl bd_con">
                <div class="hd">
                    <a href="/lists_8.html"><span>首席律师</span></a>
                    <br/>
                </div>
                <em>Chief Counsel</em> 
                <div class="line"></div>
                <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"get\" data=\"op=get&tag_md5=65aa4731e5359dd0580dd9e94ef9edaa&sql=select+%2A+from+wy_page+where+catid%3D8&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}wy_base::load_sys_class("get_model", "model", 0);$get_db = new get_model();$r = $get_db->sql_query("select * from wy_page where catid=8 LIMIT 20");while(($s = $get_db->fetch_next()) != false) {$a[] = $s;}$data = $a;unset($a);?>
                <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                <p><?php echo str_cut(strip_tags($r['content']),'160','...');?><a href="/lists_8.html">  【详细】</a></p>
                <?php $n++;}unset($n); ?>
                <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
            </div>

            <div class="bd_img fl"> 
                <a href="/lists_8.html"><img alt="李源律师" src="<?php echo IMG_PATH;?>wap/people_img.jpg" /></a>
            </div>
        </div>  
    </div>    

    <div class="ix-teamlist">
        <div class="cl">
            <span class="fr"><a href="/lists_24.html">更多</a></span><h3><b class="line1">成功案例</b><em>Cases</em></h3>
        </div>

        <ul class="ix-tlCon">
            <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=f0a3badaba6cbe2a8bd0979054302cc1&action=lists&catid=24&num=5&order=inputtime+desc&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'lists')) {$data = $content_tag->lists(array('catid'=>'24','order'=>'inputtime desc','limit'=>'5',));}?>
            <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
            <li class="rel cl"><em class="ico_list"><img src="<?php echo IMG_PATH;?>wap/iconlist.jpg"></em><a href="/show_<?php echo $r['catid'];?>_<?php echo $r['id'];?>.html"><?php echo str_cut($r['title'],'50','...');?></a></li>
            <?php $n++;}unset($n); ?>
            <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
        </ul>
    </div>
  <?php include template("wap","footer"); ?>