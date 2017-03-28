<?php defined('IN_WYCMS') or exit('No permission resources.'); ?>


                <?php $n=1; if(is_array($setting)) foreach($setting AS $k => $v) { ?>
                 <i class="iconfont" id="n<?php echo $k;?>" name="n" onclick="vote(<?php echo $k;?>)" <?php if(isset($key) && $key==$k) { ?> checked<?php } ?>>
                        <li  class=" fl dianzan">
                            <label style="color:white;" for="n<?php echo $k;?>" >
                               (<?php echo $data[$v['fields']];?>)
                                </label>
                        </li>
                        </i>
                <?php $n++;}unset($n); ?>
                

<!--      <li class=" fl dianzan">
        <input name="ctl00$Main$hdArticleId" type="hidden" id="Main_hdArticleId" value="250184" />
        <input type="hidden" name="ty" id="ty" value="5" />
        <div id="Main_zannum" class="t5a" onclick="Javascript:UpdateNum()">0</div>
      </li>-->


<script type="text/javascript">
function vote(id) {
	$.getJSON('<?php echo APP_PATH;?>index.php?m=mood&c=index&a=post&id=<?php echo $mood_id;?>&k='+id+'&'+Math.random()+'&callback=?', function(data){
		if(data.status==1)	{
			
			$('.iconfont').html(data.data);
		}else {
			alert(data.data);
		}
	})
}

</script>                                                           