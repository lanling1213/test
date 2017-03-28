<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET;?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title><?php echo L('wycms_logon')?></title>
<link href="<?php echo CSS_PATH?>login_reset.css" type="text/css" rel="stylesheet" />
<link href="<?php echo CSS_PATH?>login.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo JS_PATH?>jquery.min.js"></script>
<script type="text/javascript">
<!--
	if(top!=self)
	if(self!=top) top.location=self.location;
//-->
</script>
</head>
<body>
	<div class="login-wrap">
    	<div class="login-cont hauto">
			<form action="index.php?m=admin&c=index&a=login&dosubmit=1" method="post" name="myform">
            <dl class="login-cont-l"> <dd class="user">
					<input name="username" type="text" value="" placeholder="用户名" imgpath="input_username.png" />
				</dd>
                <dd class="pwd">
					<input name="password" type="password" value="" placeholder="密码" imgpath="input_password.png" />
				</dd>
            <?php if (1 == wy_base::load_config('system', 'geetest_open')) { ?>
                <dd id="code_img"></dd>
                <?php echo form::checkcode('code_img')?>
            <?php } else {?>
                <dd class="v-word">
                    <input name="code" type="text" class="ipt ipt_reg" maxlength="4" value="" placeholder="验证码" imgpath="input_code.png" />
                    <span class="v-img">
                        <?php echo form::checkcode('code_img', 4, 20, 110, 41)?>
					</span>
                </dd>
            <?php }?>
                <dd class="btn"><input type="submit" value="" /></dd>	
            </dl>
            <script type="text/javascript">
                // placeholder 兼容 - 使用背景图片模式
                if (!('placeholder' in document.createElement('input'))) {
                    var inputs = document.getElementsByTagName('input'),
                        len    = inputs.length,
                        i      = 0,
                        // 全局图片路径
                        IMG_PATH = '<?php echo IMG_PATH?>admin_img/';

                    // 监控事件
                    function changeToValue ()
                    {
                        if (this.value == '' && this.style.background == '') {
                            setImgPath(this);
                        } else {
                            if (this.style.background!='' && this.value!='') {
                                // 取消事件
                                this.onpropertychange = function(){};
                                this.removeAttribute('style');
                                if(this.style.background == '')
                                {
                                   setEvents(this);
                                }
                            }
                        }
                    }

                    // 设置事件
                    function setEvents (obj)
                    {
                        if (typeof(obj.oninput) == 'object') {
                            obj.addEventListener('input', changeToValue, false);
                        } else {
                            obj.onpropertychange = changeToValue;
                        }
                    }

                    // 背景图片设置
                    function setImgPath (obj)
                    {
                        var imgpath = obj.getAttribute('imgpath');
                        if (imgpath != null && obj.value == '') {
                            // 取消事件
                            obj.onpropertychange = function () {};
                            obj.style.background='url('+IMG_PATH+imgpath+') no-repeat scroll -13px 0 transparent';
                            setEvents(obj);
                        }
                    }

                    for (i=0;i<len;i++) {
                        if (inputs[i].getAttribute('placeholder') != null) {
                            setImgPath(inputs[i]);
                            setEvents(inputs[i]);
                        }
                    }
                }
            </script>
            </form>
            <div class="login-cont-r">
                <p>一个有效果的律师律所网站需要不断的运营和推广。了解更多知识，请关注：</p>
                <div class="space15"></div>
                <p>律师营销网官方微博</p>
                <div class="weibo-link hauto">
                    <a href="http://e.weibo.com/lawmarketing" target="_blank"><img src="<?php echo IMG_PATH?>admin_img/logo/weibo_ico.jpg" width="32" height="32" /></a>
                    <a href="http://t.qq.com/lawyeryingxiao" target="_blank"><img src="<?php echo IMG_PATH?>admin_img/logo/qt_ico.jpg" width="32" height="32" /></a>
                    <a href="http://lawyermarketing.blog.163.com/" target="_blank"><img src="<?php echo IMG_PATH?>admin_img/logo/163_ico.jpg" width="32" height="32" /></a>
                    <a href="http://user.qzone.qq.com/1272702841/infocenter" target="_blank"><img src="<?php echo IMG_PATH?>admin_img/logo/qzone_ico.jpg" width="32" height="32" /></a>
                </div>
                <div class="space15"></div>
                <p>律师营销网官方微信：手机扫描二维码添加关注</p>
                <div class="erwei"><img src="<?php echo IMG_PATH?>admin_img/erweima.jpg" width="75" height="73" /> </div>
            </div>
        </div>    
        <div class="clr"></div>
    	<div class="login_copyright hauto"><p>CopyRight 2013   广州快律网络科技有限公司   技术支持：<a href="http://www.lawyermarketing.cn" target="_blank" style="color:#FFFFFF">律师营销网</a></p></div>            
    </div>
</body>
</html>
