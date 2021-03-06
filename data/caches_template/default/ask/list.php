<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("content","header"); ?>
<div class="banner">
    <div class="ban_hd">
        <h3>关于我们</h3>
        <em>ABOUT US</em>
        <div class="line"></div>
    </div>

</div>
<div class="position_bg">
    <div class="position">
        <p><em><img src="<?php echo IMG_PATH;?>wycms/posi.jpg" /></em>您现在的位置：<a href="/">李源律师网站 </a>><a href="#">在线咨询</a> </p>
    </div>
</div>

<div class="ask_content">
    <div class="content">
        <div class="m-r-ct">
            <div class="m-ct-hd">
                <h3 class="fl">在线咨询</h3><em class="fl">Online Consultation</em>
                <img src="<?php echo IMG_PATH;?>wycms/line2.png" />
                <p>
                    1、不论您想得到法律咨询、代书服务或想聘请律师人作为代理人、辩护人需来访，请提前与律师预约。<br />
                    2、如果您所涉及案情较紧急，而律师手机关机或未接听，说明律师正在开庭或其他原因不方便应答，律师看到信息后会立即回复，或者请您稍后再拨打。咨询热线：<?php echo $SITEINFO['mobile'];?><br />
                    3.在线咨询时请至少留下一种联系方式，方便律师通知咨询已经得到回复。</p>
            </div>

            <div class="m-ct-bd">
                <div class="l-ask-bd">
                    <?php wy_base::load_sys_class('form', '', 0);?>
                    <form action="/index.php?m=ask&c=index&a=ask" method="post" id="myform" onsubmit="if (this.name.value == this.name.defaultValue)
                                this.name.value = '';
                            if (this.introduce.value == this.introduce.defaultValue)
                                this.introduce.value = '';">
                        <input type="hidden" name="typeid" value="1" />
                        <input type="hidden" name="is_ajax" value="1" />
                        <input type="hidden" name="url" value="/post_success/" /> 
                        <p style="display:none"><input name="title" id="biaoti" type="text" value="咨询标题" /></p>
                        <p><textarea id="introduce" name="content" onfocus="if (this.value == this.defaultValue)
                                    this.value = ''" onblur="if (this.value == this.defaultValue || this.value == '')
                                                this.value = this.defaultValue">请输入要咨询的案件详情...</textarea></p>
                        <p><input type="text" name="name" id="name" value="姓名：（仅律师可见）" onfocus="if (this.value == this.defaultValue)
                                    this.value = ''" onblur="if (this.value == this.defaultValue || this.value == '')
                                                this.value = this.defaultValue" /></p>
                        <p><input type="text" name="comment[tel]" id="tel" value="电话：（仅律师可见）" onfocus="if (this.value == this.defaultValue)
                                    this.value = ''" onblur="if (this.value == this.defaultValue || this.value == '')
                                                this.value = this.defaultValue" /></p>
                        <p><input class="yzm" id="code" name="code" type="text" value="验证码" onfocus="if (this.value == this.defaultValue)
                                    this.value = ''" onblur="if (this.value == this.defaultValue || this.value == '')
                                                this.value = this.defaultValue" /><?php echo form::checkcode('code_img','4','16',100,35);?></p>
                        <p class="war"><em id="msgdemo"></em></p>
                        <p><button name="dosubmit" id="submitform" type="submit">提交</button> <button type="reset">取消</button></p>
                    </form>
                </div>


                <div class="ask_mid">
                    <p>如果您还有疑问，可以直接拨打免费法律咨询电话：<?php echo $SITEINFO['mobile'];?>，专业律师会快速为您解答！</p>
                </div>
                <div class="f-space30"></div>
                <div class="m-ask-list">
                    <ul id="wzlist">
                        <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"ask\" data=\"op=ask&tag_md5=57d68c0f2a508a8c80d5262ceff1455d&action=lists&typeid=1&siteid=1&num=2&order=questionid+desc&replyinfo=1&return=data\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$ask_tag = wy_base::load_app_class("ask_tag", "ask");if (method_exists($ask_tag, 'lists')) {$data = $ask_tag->lists(array('typeid'=>'1','siteid'=>'1','order'=>'questionid desc','replyinfo'=>'1','limit'=>'2',));}?>
                        <?php $n=1;if(is_array($data)) foreach($data AS $r) { ?>
                        <li>
                            <div class="m-wen cl">
                                <img class="fl" src="<?php echo IMG_PATH;?>wycms/wen.jpg" />
                                <p class="fl"><?php echo $r['content'];?></p>
                            </div>
                            <?php if(!empty($r[reply])) { ?>  
                            <?php $n=1;if(is_array($r[reply])) foreach($r[reply] AS $v) { ?>
                            <div class="m-da cl">
                                <img class="fl" src="<?php echo IMG_PATH;?>wycms/da.jpg" />
                                <p class="fl"><?php echo $v['content'];?></p>
                            </div>
                            <div class="m-time">
                                <p>回复律师：<a href="<?php echo $CATEGORYS['8']['url'];?>"><?php echo $SITEINFO['name'];?></a><span>回复时间：<?php echo date("Y-m-d H:i:s",$v[inputtime]);?></span></p>
                            </div>
                            <?php $n++;}unset($n); ?>
                            <?php } ?>
                        </li>
                        <?php $n++;}unset($n); ?>
                        <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                    </ul>
                    <div class="f-space30"></div>
                    <div class="m-page">
                        <a href="javascript:void(0);" data-page="1"  class="nMore">点击查看更多咨询</a>
                    </div>
                     <script type="text/javascript">
    $(".nMore").click(function(){
        var page  = Number($(this).attr('data-page')) + 1;
            url  = '/index.php?m=ask&c=index&a=ajaxAskList&ajax=1&page='+page;
            obj  = this;
            $(obj).text("数据加载中...");
        $.getJSON(url, function(rs){
            loading = false;
            if (rs.data) {
                $(obj).attr('data-page', page);
                for (var i in rs.data) {
                    var item = rs.data[i];
                    var li = '<li><div class="m-wen cl"><img class="fl" src="<?php echo IMG_PATH;?>wycms/wen.jpg" /><p class="fl">'+item.content+'</p></div>';
                if (item.reply_content != '' && item.reply_content != null) {
                        li += '<div class="m-da cl"><img class="fl" src="<?php echo IMG_PATH;?>wycms/da.jpg" /><p class="fl">'+item.reply_content+'</p></div><div class="m-time"><p>回复律师：<a href="<?php echo $CATEGORYS['8']['url'];?>"><?php echo $SITEINFO['name'];?></a><span>回复时间：<?php echo date("Y-m-d H:i:s",$v[inputtime]);?></span></p></div>';
                    } 
                    li+="</li>";
                    $('#wzlist').append(li);
                }
            }
            $(obj).text("点击查看更多咨询");
            if (rs.status==0) {
                $(obj).hide();
            }
        });
    });
</script>
                </div>
            </div>
        </div>
    </div>
    <?php include template("content","footer"); ?>