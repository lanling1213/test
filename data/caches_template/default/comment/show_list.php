<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title><?php if(isset($SEO['title']) && !empty($SEO['title'])) { ?><?php echo $SEO['title'];?><?php } ?><?php echo $SEO['site_title'];?></title>
<meta name="keywords" content="<?php echo $SEO['keyword'];?>">
<meta name="description" content="<?php echo $SEO['description'];?>">
<link href="<?php echo CSS_PATH;?>reset.css" rel="stylesheet" type="text/css" />
<link href="<?php echo CSS_PATH;?>style.css" rel="stylesheet" type="text/css" />
<!--<link href="<?php echo CSS_PATH;?>default_blue.css" rel="stylesheet" type="text/css" />-->
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo JS_PATH;?>jquery.sgallery.js"></script>
<style>

body a{outline:none;blr:expression(this.onFocus=this.blur());}

body{font:12px/22px "Microsoft YaHei",arial; text-align:left;color:#333; background:#F7F7F7;}
body,div,ul,ol,li,dl,dt,dd,span,p,h1,h2,h3,h4,h5,h6,img,form,table,tr,td,th,label,input{margin:0;padding:0;}
*{margin:0;padding:0;}
img{border:none; vertical-align:middle;}
ul,ol,li{list-style-type:none;}
em,i{font-style:normal;}
.dib{display:block;}       .din{display:none;}        .dii{display:inline;}
.fa{font-family:arial;}    .ft{font-family:tahoma;}   .fw{font-family:"Microsoft YaHei"}    .fs{font-family:"SimSun"}
.fl{float:left;}        .fr{float:right;}
.f12{font-size:12px;}   .f14{font-size:14px;}   .f16{font-size:16px;}
.fb{font-weight:bold;}  .fb16{font-weight:bold; font-size:16px;} .fb14{font-weight:bold; font-size:14px;}
.tc{text-align:center;}    .tl{text-align:left !important;}    .tr{text-align:right;}
.c333{color:#333;} .c666{color:#666;} .cf00{color:#F00;} .cf60{color:#f60;} .c999{color:#999;} .cd00{color:#d00000;}
.white {color:#fff;}
.space{clear:both;height:10px;overflow:hidden; zoom:1;}
.space6{clear:both;height:6px;overflow:hidden; zoom:1;}
.space20{clear:both;height:20px;overflow:hidden; zoom:1;}
.space50{clear:both;height:50px;overflow:hidden; zoom:1;}
.p10{padding:10px; overflow:hidden; zoom:1;} .pr10{padding-right:10px;} .pt10{padding-top:10px;} .pb10{padding-bottom:10px;}
.mt10{margin-top:10px;}  .mb10{margin-bottom:10px !important;;} .ml10{margin-left:10px;} .mr10{margin-right:10px;}
.mt20{margin-top:20px}  .mb20{margin-bottom:20px !important;;} .ml20{margin-left:20px;} .mr20{margin-right:20px !important;;}
.mt30{margin-top:30px;}  .mb30{margin-bottom:30px;} .ml30{margin-left:30px;} .mr30{margin-right:30px;}
select,input,label,textarea,img/{vertical-align:middle;font-size:12px;color:#555;}
div:after, ul:after, dl:after{content:""; display:block; height:0; clear:both; visibility:hidden;}
.clear:after{display:block;content:'';clear:both;visibility:hidden;}
a{color:#333;text-decoration:none; border:none; }
a:hover{color:#206bb7;text-decoration:none;}
.cl{clear:both;}
.disn{display:none;}
.none{border:none; border:0;} 
.w1180{width:1180px; margin:0 auto; overflow:hidden; _overflow:inherit; *overflow:inherit; zoom:1;}
.rel {position:relative;}
.abs {position:absolute;}
*html{_overflow-x: hidden;}
.noscroll{overflow:hidden;overflow-y:hidden;}
.error { color:#f00;}

.read{width:1100px; margin:0 auto; background:#fff;}
.read_t{border-bottom:1px solid #dfdfdf; width:1100px;}
.read_t .ab_tit{ width:800px; float:left;  }
.read_t .ab_tit h3{ font-size:28px; color:#00479d; border-bottom:3px solid #00479d; padding-bottom:10px; width:120px;}
.read_t .ab_tit em{ color:#d6d6d6; font-size:16px; font-family:"Arial"; margin-top:8px; padding-left:6px; width:86px;}
.read_t span{ float:right; margin-top:10px;}
.read_b { }
.read_b ul{}
.read_b ul li{ line-height:48px; border-bottom:1px dashed #e0e0e0; font-size:14px;}
.read_b ul li span{ float:right;  color:#888888; font-size:12px;}


.all_con{ font-size:28px; color:#00479d; border-bottom:3px solid #00479d; padding-bottom:10px;}

.comment-in { margin-bottom:40px;}
.comment-in p label{ margin-left:20px;}
.comment-in .riea{ width:1088px; border:1px solid #eaeaea; margin-top:55px; height:170px; padding:10px 0  0 10px; color:#ccc; }
.comment-in .yanz{ width:180px; border:1px solid #eaeaea; margin-top:20px; height:34px; padding:10px 0  0 10px; color:#ccc;}
.comment-in .an1{ text-align:center; width:115px; height:30px; border-radius:5px; background:#4073ce; border:none; color:#fff; font-size:16px; font-family:"微软雅黑";margin-top:20px;}

.comment-form{ width:1100px;  padding:40px; margin:40px auto; background:#fff; }
.comment-form .till{  float:left;  width:800px;}
.comment-form .till .le{ font-size:28px; color:#00479d; border-bottom:3px solid #00479d; padding-bottom:10px;}
.comment-form .till .ri{ color:#d6d6d6; font-size:16px; font-family:"Arial"; margin-top:8px; padding-left:6px;}

</style>
</head>
<body onload="iframe_height()">
<?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=2ffe102e68401ea549890d8d90ae2bd1&action=get_comment&commentid=%24commentid\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$comment_tag = wy_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'get_comment')) {$data = $comment_tag->get_comment(array('commentid'=>$commentid,'limit'=>'20',));}?>
<?php $comment = $data;?>
<?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
<div id="bodyheight">
<form action="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=post&commentid=<?php echo $commentid;?>" method="post" onsubmit="return on_submit()">
<input type="hidden" name="title" value="<?php echo urlencode(($comment[title] ? $comment[title] : $title));?>">
<input type="hidden" name="url" value="<?php echo urlencode(($comment[url] ? $comment[url] : $url));?>">
      <div class="comment-form">
   <div class="till">
                            <span class="le">发表评论</span>
                            <span class="ri">
                                <font id="currentnum"><?php if($comment[total]) { ?><?php echo $comment['total'];?><?php } else { ?>0<?php } ?></font>/300
                            </span>
                        </div>
       <div class="comment-in">
        <p><textarea class="riea" type="text" name="content" onfocus="if (this.value == this.defaultValue) {
                    this.value = ''
                }" onblur="if (this.value == this.defaultValue || this.value == '') {
                            this.value = this.defaultValue
                        }">内容</textarea></p>
      <!--    <p>	<input type="text"  class="yanz" name="" value="验证码"  /><label><img src="images/lzf-yzm-pic.png" /></label></p>
       -->  <p class="ri">
            <input type="submit" name="sendmess" value="发送" id="sendmess" class="an1" />
        </p>
        </div>
		
      
</form> 
<div class="read1">
 <div class="read_t cl">
      
         <div class="ab_tit cl">
         <h3 class="fl">全部评论</h3><em class="fl">COMMENT</em>
         </div>
         <span><a href="javascript:void(0);" id="morepl" commentid="<?php echo $commentid;?>" class="nMore"">更多>></a></span>
      </div>
      <div class="read_b">
     
      <ul id="newpl">
	  <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"comment\" data=\"op=comment&tag_md5=2c79c55273d13d267350e8fa7fa0ce3d&action=lists&commentid=%24commentid&siteid=%24siteid&order=id+desc&hot=%24hot&num=3\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$comment_tag = wy_base::load_app_class("comment_tag", "comment");if (method_exists($comment_tag, 'lists')) {$data = $comment_tag->lists(array('commentid'=>$commentid,'siteid'=>$siteid,'order'=>'id desc','hot'=>$hot,'limit'=>'3',));}?>
		<?php if(!empty($data)) { ?>       
		<?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
       <li><?php echo $r['content'];?></li>
		<?php $n++;}unset($n); ?>
		 <?php } ?>
		 <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
	 </ul>
      </div>
</div>     
        <script type="text/javascript">
    var p18 = 2;
    var num18 = 3;
    var times18 = 10;
    $("#morepl").click(function() {
        if (p18 > times18) {
            $("#morepl").html("更多精彩内容切换到电脑版浏览");
            return;
        }
        var commentid = $('#morepl').attr('commentid');
        $.post("/index.php?m=content&c=index&a=ajaxListpl", {commentid: commentid, page: p18, num: num18}, function(data) {
            p18 = p18 + 1;
            eval("var datas=" + data);
            var str = "";
            for (var i = 0; i < datas.length; i++) {

                str += '<li>'+datas[i].content+'</li>';

            }
            $("#newpl").append(str);
            if (datas.length < num18) {
                $("#morepl").css("display", "none");
            }
        });
    });
</script>

<div class="bk10"></div>
<script type="text/javascript">
function support(id, commentid) {
	$.getJSON('<?php echo APP_PATH;?>index.php?m=comment&c=index&a=support&format=jsonp&commentid='+commentid+'&id='+id+'&callback=?', function(data){
		if(data.status == 1) {
			$('#support_'+id).html(parseInt($('#support_'+id).html())+1);
		} else {
			alert(data.msg);
		}
	});
}

function reply(id,commentid) {
	var str = '<form action="<?php echo APP_PATH;?>index.php?m=comment&c=index&a=post&commentid='+commentid+'&id='+id+'" method="post" onsubmit="return on_submit()"><textarea rows="10" style="width:663px;height:238px;" name="content"></textarea><?php if($setting[code]) { ?><label>验证码：<input type="text" name="code"  class="input-text" onfocus="var offset = $(this).offset();$(\'#yzm\').css({\'left\': +offset.left-8, \'top\': +offset.top-$(\'#yzm\').height()});$(\'#yzm\').show();$(\'#yzmText\').data(\'hide\', 1)" onblur=\'$("#yzmText").data("hide", 0);setTimeout("hide_code()", 3000)\' /></label><?php } ?>  <div class="btn"><input type="submit" value="发表评论" /></div>&nbsp;&nbsp;&nbsp;&nbsp;<?php if($userid) { ?><?php echo get_nickname();?> <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=logout&forward=<?php echo urlencode(($comment[url] ? $comment[url] : $url));?>" target="_top">退出</a><?php } else { ?><a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=login&forward=<?php echo urlencode(($comment[url] ? $comment[url] : $url));?>" class="blue" target="_top">登录</a> | <a href="<?php echo APP_PATH;?>index.php?m=member&c=index&a=register" class="blue" target="_top">注册</a>  <?php if(!$setting[guest]) { ?><span style="color:red">需要登陆才可发布评论</span><?php } ?><?php } ?></form>';
	$('#reply_'+id).html(str).toggle();
	iframe_height();
}

function hide_code() {
	if ($('#yzmText').data('hide')==0) {
		$('#yzm').hide();
	}
}
function on_submit() {
	<?php if($setting[code]) { ?>
		var checkcode = $("#yzmText").val() == '' ? $("#yzmreplay").val() : $("#yzmText").val();
		var res = $.ajax({
			url: "<?php echo APP_PATH;?>index.php?m=pay&c=deposit&a=public_checkcode&code="+checkcode,
			async: false
		}).responseText;
	<?php } else { ?>
		var res = 1;
	<?php } ?>
	if(res != 1) {
		alert('验证码错误');
		return false;
	} else {
		iframe_height(200);
		$('#bodyheight').hide();
		$('#loading').show();
		return true;
	}
}
function iframe_height(height) {
	if (!height) {
		var height = document.getElementById('bodyheight').scrollHeight;
	}
	$('#top_src').attr('src', "<?php echo $domain;?>js.html?"+height+'|'+<?php if($comment['total']) { ?><?php echo $comment['total'];?><?php } else { ?>0<?php } ?>);
}



</script>
</div>
<iframe width='0' id='top_src' height='0' src=''></iframe>
<div class="hidden text-c" id="loading">
<img src="<?php echo IMG_PATH;?>msg_img/loading.gif" /> 正在提交中...
</div>
</body>
</html>