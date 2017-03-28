<?php
defined('IN_WYCMS') or exit('No permission resources.');
/**
 * 删除30天前的消息队列
 */
function del_queue() {
	$times = SYS_TIME-2592000;
	$queue = wy_base::load_model('queue_model');
	$queue->delete("times <= $times");
}