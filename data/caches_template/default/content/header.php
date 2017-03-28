<?php defined('IN_WYCMS') or exit('No permission resources.'); ?>﻿<?php $SITEINFO = siteinfo($siteid);$sitename = $SITEINFO['name'];$SITEINFO = string2array($SITEINFO['infos']);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta name="location" content="province=广东;city=深圳"/>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title><?php if($catname) { ?><?php echo $catname;?>-<?php if(isset($page)&&$page>1) { ?>第<?php echo $page;?>页-<?php } ?><?php } elseif ($title && $_GET['m']!='ask') { ?><?php echo $title;?>-<?php if(isset($page)&&$page>1) { ?>第<?php echo $page;?>页-<?php } ?><?php } elseif ($_GET['m']=='ask' && $_GET[a]=='lists') { ?>在线咨询-<?php if(isset($page)&&$page>1) { ?>第<?php echo $page;?>页-<?php } ?>深圳追债网<?php } elseif ($_GET['m']=='ask' &&$_GET[a]=='show') { ?><?php echo str_cut($content,90,false);?>-深圳追债网<?php } else { ?>深圳债权债务律师|深圳经济纠纷律师|深圳追债律师|深圳收债律师-深圳追债网<?php } ?><?php if($catid=="" && $CAT[parentid]==0) { ?><?php } else { ?>深圳追债网<?php } ?></title> 
        <meta name="keywords" content="<?php if($catname&&!isset($id)) { ?><?php echo $catname;?><?php } elseif ($title&&isset($id)) { ?><?php echo $rs['keywords'];?>,<?php echo $CAT['catname'];?>,<?php echo $title;?><?php } else { ?>深圳债权债务律师,深圳经济纠纷律师,深圳追债律师,深圳收债律师,深圳追债网<?php } ?>"/>
        <meta name="description" content="<?php if($title&&isset($id)) { ?><?php echo $rs['description'];?><?php } elseif ($catid==""&&$_GET[m]=='content') { ?>深圳追债网<?php echo $CAT['catname'];?>栏目为您提供<?php echo $CAT['catname'];?>相关法律知识和内容，如果还需要更多的、专业的<?php echo $CAT['catname'];?>知识，可咨询深圳追债律师李源律师，咨询热线：<?php echo $SITEINFO['tel'];?><?php } elseif ($_GET['m']=='ask' && $_GET[a]=='lists') { ?>在线咨询-深圳追债网<?php } elseif ($_GET['m']=='ask' && $_GET[a]=='show') { ?><?php echo $content;?><?php } else { ?>深圳追债网是由深圳李源律师创建,擅长民间借贷,债务清收,执行案件代理,互联网金融,供应链金融,债务纠纷等法律事务,咨询热线：<?php echo $SITEINFO['mobile'];?> | <?php echo $SITEINFO['tel'];?>。<?php } ?>"/>

</head>
<link href="<?php echo CSS_PATH;?>style.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery1.42.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH;?>jquery.SuperSlide.2.1.js"></script>
     <SCRIPT LANGUAGE="JavaScript">
    function mobile_device_detect(url)
    {

            var thisOS=navigator.platform;

            var os=new Array("iPhone","iPod","iPad","android","Nokia","SymbianOS","Symbian","Windows Phone","Phone","Linux armv71","MAUI","UNTRUSTED/1.0","Windows CE","BlackBerry","IEMobile");

     for(var i=0;i<os.length;i++)
            {

     if(thisOS.match(os[i]))
            {   
      window.location=url;
     }
      
     }


     //因为相当部分的手机系统不知道信息,这里是做临时性特殊辨认
     if(navigator.platform.indexOf('iPad') != -1)
            {
      window.location=url;
     }

     //做这一部分是因为Android手机的内核也是Linux
     //但是navigator.platform显示信息不尽相同情况繁多,因此从浏览器下手，即用navigator.appVersion信息做判断
      var check = navigator.appVersion;

      if( check.match(/linux/i) )
              {
       //X11是UC浏览器的平台 ，如果有其他特殊浏览器也可以附加上条件
       if(check.match(/mobile/i) || check.match(/X11/i))
                     {
       window.location=url;
       }  
     }

     //类in_array函数
     Array.prototype.in_array = function(e)
     {
      for(i=0;i<this.length;i++)
      {
       if(this[i] == e)
       return true;
      }
      return false;
     }
    } 

    mobile_device_detect("http://m.law380.com/");

    </SCRIPT>
    <body onload="mobile_device_detect('http://m.law380.com/')">

        <div class="header">
            <div class="logo fl">
                <a href="/"><img src="<?php echo IMG_PATH;?>wycms/logo.jpg" alt="深圳追债网" /></a>
            </div>

            <div class="nav fr">
                <ul class="cl">
                    <li><a href="/">首页</a></li>
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"content\" data=\"op=content&tag_md5=2db11f7bba28e15c90e73b70aa9397b5&action=category&catid=0&num=7&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$content_tag = wy_base::load_app_class("content_tag", "content");if (method_exists($content_tag, 'category')) {$data = $content_tag->category(array('catid'=>'0','limit'=>'7',));}?>
                    <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                    <li><em>|</em><a href="<?php if($r[catid]==2) { ?><?php echo $CATEGORYS['12']['url'];?><?php } else { ?><?php echo $r['url'];?><?php } ?>"><?php echo $r['catname'];?></a></li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
            </div>
        </div>