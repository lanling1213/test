<?php defined('IN_WYCMS') or exit('No permission resources.'); ?><?php include template("wap","header"); ?>
<div class="online">
    <div class="read_t cl">
        <div class="ab_tit cl ">
            <h3 class="fl">在线留言</h3><em class="fl">FEEDBACK</em>
        </div>
        <span><a href="#">更多>></a></span>
    </div>
</div>
<div class="content">
    <div class="m-r-ct">
        <div class="m-ct-hd">
            <p>
                1、不论您想得到法律咨询、代书服务或想聘请律师人作为代理人、辩护人需来访，请提前与律师预约。<br />
                2、如果您所涉及案情较紧急，而律师手机关机或未接听，说明律师正在开庭或其他原因不方便应答，律师看到信息后会立即回复，或者请您稍后再拨打。咨询热线：<?php echo $info['mobile'];?><br />
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
                    <p style="display:none"><label>咨询标题：</label><input type="text" name="title" id="biaoti"  value="咨询标题"></p>  

                    <p><textarea name="content" id="introduce" onfocus="if (this.value == this.defaultValue)
                                this.value = ''" onblur="if (this.value == this.defaultValue || this.value == '')
                                            this.value = this.defaultValue">请输入要咨询的案件详情...</textarea></p>
                    <p><input type="text" name="name" id="name" value="姓名：（仅律师可见）" onfocus="if (this.value == this.defaultValue)
                                this.value = ''" onblur="if (this.value == this.defaultValue || this.value == '')
                                            this.value = this.defaultValue" /></p>
                    <p><input type="text" name="comment[tel]" id="tel" value="电话：（仅律师可见）" onfocus="if (this.value == this.defaultValue)
                                this.value = ''" onblur="if (this.value == this.defaultValue || this.value == '')
                                            this.value = this.defaultValue" /></p>
                    <p><input class="yzm" name="code" id="code" type="text" value="验证码" onfocus="if (this.value == this.defaultValue)
                                this.value = ''" onblur="if (this.value == this.defaultValue || this.value == '')
                                            this.value = this.defaultValue" /><?php echo form::checkcode('code_img','4','25',100,36);?></p>
                    <p class="war"><em id="msgdemo"></em></p>
                    <p><button  name="dosubmit" id="submitform" type="submit">立即咨询</button></p>
                </form>
            </div>
            <div class="last">
                <div class="read_t cl">
                    <div class="ab_tit cl ">
                        <h3 class="fl">最新咨询</h3><em class="fl">Latest Consulting</em>
                    </div>
                    <span><a href="#">更多>></a></span>
                </div>
            </div>  
            <div class="f-space30"></div>
            <div class="m-ask-list">
                <ul id="wzlist">
                    <?php if(defined('IN_ADMIN')  && !defined('HTML')) {echo "<div class=\"admin_piao\" pc_action=\"ask\" data=\"op=ask&tag_md5=34f15ba04860333a2ab50b56055b1820&action=lists&typeid=1&siteid=1&status=1&num=2&page=%24page&order=inputtime+desc&replyinfo=1&return=datas\"><a href=\"javascript:void(0)\" class=\"admin_piao_edit\">编辑</a>";}$ask_tag = wy_base::load_app_class("ask_tag", "ask");if (method_exists($ask_tag, 'lists')) {$pagesize = 2;$page = intval($page) ? intval($page) : 1;if($page<=0){$page=1;}$offset = ($page - 1) * $pagesize;$ask_total = $ask_tag->count(array('typeid'=>'1','siteid'=>'1','status'=>'1','order'=>'inputtime desc','replyinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));$pages = pages($ask_total, $page, $pagesize, $urlrule);$wy_pages = wy_pages($ask_total, $page, $pagesize, $urlrule);$datas = $ask_tag->lists(array('typeid'=>'1','siteid'=>'1','status'=>'1','order'=>'inputtime desc','replyinfo'=>'1','limit'=>$offset.",".$pagesize,'action'=>'lists',));}?>
                    <?php $n=1;if(is_array($datas)) foreach($datas AS $r) { ?>
                    <li>
                        <div class="m-wen cl">
                            <img class="fl" src="<?php echo IMG_PATH;?>wap/wen.jpg" />
                            <p class="fl"><a href="#"><?php echo $r['content'];?></a></p>
                        </div>
                        <?php if(!empty($r[reply])) { ?>
                        <?php $n=1;if(is_array($r[reply])) foreach($r[reply] AS $v) { ?>
                        <div class="m-da cl">
                            <img class="fl" src="<?php echo IMG_PATH;?>wap/da.jpg" />
                            <p class="fl"><a href="#none"><?php echo $v['content'];?></a></p>
                        </div>
                        <div class="m-time cl">
                            <p>回复律师：<a href="#none"><?php echo $info['name'];?></a></p><p >回复时间：<?php echo date('y-m-d',$v['inputtime']);?></p>
                        </div>
                        <?php $n++;}unset($n); ?>
                        <?php } ?>
                    </li>
                    <?php $n++;}unset($n); ?>
                    <?php if(defined('IN_ADMIN') && !defined('HTML')) {echo '</div>';}?>
                </ul>
                <div class="f-space30"></div>
                <div class="m-page">
                    <a href="javascript:void(0);" data-page="1" class="nMore">更多>></a>
                </div>
            </div>
        </div>
    </div>
</div>
<script  type="text/javascript" src="<?php echo JS_PATH;?>Validform_v5.3.2.js" ></script>
<script type="text/javascript">
    $(function() {
        var demo = $("#myform").Validform({
            tiptype: function(msg, o, cssctl) {
                var objtip = $("#msgdemo");
                cssctl(objtip, o.type);
                objtip.text(msg);
            },
            ajaxPost: true, //AJAX请求
            btnSubmit: "#submitform",
            btnReset: "#btn_reset",
            callback: function(data) { //AJAX请求的回调函数                          
                if (data.status == "SUCCESS") {
                    $('#msgdemo').html(" ");
                    location.href = "/ask.html";
                    alert('提交成功');
                } else {
                    $('#msgdemo').html("<font color='red'>" + data.message + "</font>");
                    return false;
                }
            }
        });
        demo.addRule([{
                ele: "#title",
                datatype: "*1-40",
                tip: "",
                nullmsg: "标题不能为空",
                errormsg: "请输入标题"
            }, {
                ele: "#name",
                datatype: "*1-8",
                tip: "",
                nullmsg: "姓名不能为空",
                errormsg: "姓名在1-8个字符之间"
            }, {
                ele: "#introduce",
                datatype: "*6-1000",
                tip: "",
                nullmsg: "咨询内容不能为空",
                errormsg: "咨询内容在6-1000个字之间"
            }, {
                ele: "#tel",
                tip: "电话：",
                datatype: "/^0{0,1}(13[0-9]|15[5-9]|15[0-3]|147|180|182|18[5-9])[0-9]{8}$/",
                nullmsg: "请输入手机号码",
                errormsg: "手机号码不正确"
            }, {
                ele: "#code",
                tip: "",
                datatype: "/^[0-9a-zA-Z]{4}$/",
                nullmsg: "请输入验证码",
                errormsg: "请正确输入验证码"
            }]);
    });
</script>
<script type="text/javascript">
    $(".nMore").click(function(){
        var page  = Number($(this).attr('data-page')) + 1,
            url  = '/index.php?m=wap&c=index&a=ajaxAskList&ajax=1&page='+page,
            obj  = this;
            $(obj).text("数据加载中...");
        $.getJSON(url, function(rs){
            loading = false;
            if (rs.data) {
                $(obj).attr('data-page', page);
                for (var i in rs.data) {
                    var item = rs.data[i];
                    var li='<li><div class="m-wen cl"><img class="fl" src="<?php echo IMG_PATH;?>wap/wen.jpg" /><p class="fl"><a href="#">'+item.content+'</a></p></div>';
                     if (item.reply_content != '' && item.reply_content != null) {
                       li+='<div class="m-da cl"><img class="fl" src="<?php echo IMG_PATH;?>wap/da.jpg" /><p class="fl"><a href="#none">' + item.reply_content + '</a></p></div><div class="m-time cl"><p>回复律师：<a href="#none">李源律师</a></p><p >回复时间：'+item.inputtime+'</p></div>';
                    } 
                    li+='</li>';
                    $('#wzlist').append(li);
                }
            } else {
                $(obj).hide();
            };
            $(obj).text("");
        });
    });
</script>
<?php include template("wap","footer"); ?>
