<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php $info = siteinfo(1);$info = string2array($info['infos']);?>
<!doctype html><head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=3.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>wap/style.css" />
    <link rel="stylesheet" href="<?php echo CSS_PATH;?>wap/swiper.min.css" />
    <script src="<?php echo JS_PATH;?>TouchSlide.1.1.js"></script>
    <script src="<?php echo JS_PATH;?>zepto.js"></script>
     <script src="<?php echo JS_PATH;?>jquery-1.4.4.min.js"></script>
    <script src="<?php echo JS_PATH;?>swiper.min.js"></script>
    <title><?php if($catname) { ?><?php echo $catname;?>-<?php if(isset($page)&&$page>1) { ?>第<?php echo $page;?>页-<?php } ?><?php } elseif ($title && $_GET['m']!='ask') { ?><?php echo $title;?>-<?php if(isset($page)&&$page>1) { ?>第<?php echo $page;?>页-<?php } ?><?php } elseif ($_GET['m']=='ask' && $_GET[a]=='lists') { ?>在线咨询-<?php if(isset($page)&&$page>1) { ?>第<?php echo $page;?>页-<?php } ?>深圳追债网<?php } elseif ($_GET['m']=='ask' &&$_GET[a]=='show') { ?><?php echo str_cut($content,90,false);?>-深圳追债网<?php } else { ?>深圳债务纠纷律师|深圳经济纠纷律师|深圳债务追讨律师-深圳追债网<?php } ?><?php if($catid=="" && $CAT[parentid]==0) { ?><?php } else { ?>深圳追债网<?php } ?></title> 
    <meta name="keywords" content="<?php if($catname&&!isset($id)) { ?><?php echo $catname;?><?php } elseif ($title&&isset($id)) { ?><?php echo $rs['keywords'];?>,<?php echo $CAT['catname'];?>,<?php echo $title;?><?php } else { ?>深圳债务纠纷律师,深圳经济纠纷律师,深圳债务追讨律师,深圳追债网<?php } ?>"/>
    <meta name="description" content="<?php if($title&&isset($id)) { ?><?php echo $rs['description'];?><?php } elseif ($catid==""&&$_GET[m]=='content') { ?>深圳追债网<?php echo $CAT['catname'];?>栏目为您提供<?php echo $CAT['catname'];?>相关法律知识和内容，如果还需要更多的、专业的<?php echo $CAT['catname'];?>知识，可咨询深圳追债律师李源律师，咨询热线：<?php echo $SITEINFO['tel'];?><?php } elseif ($_GET['m']=='ask' && $_GET[a]=='lists') { ?>在线咨询-深圳追债网<?php } elseif ($_GET['m']=='ask' && $_GET[a]=='show') { ?><?php echo $content;?><?php } else { ?>深圳追债网是由深圳李源律师创建,擅长民间借贷,债务清收,执行案件代理,互联网金融,供应链金融,债务纠纷等法律事务,咨询热线：<?php echo $SITEINFO['tel'];?>。<?php } ?>"/>
    
</head>
<div class="main">
    <div class="header rel innhead">
        <p class="htit"><?php if($CATEGORYS[$catid]['catname']) { ?><?php echo $CATEGORYS[$catid]['catname'];?><?php } else { ?>在线咨询<?php } ?></p>
        <a href="/" class="h-left abs"><em class="ico_back abs"></em></a>
    </div>