<?php
/**
 *  index.php WYCMS 入口
 *
 * @copyright			(C) 2005-2010 WYCMS
 * @license				http://www.wycms.cn/license/
 * @lastmodify			2010-6-1
 */
define('WYCMS_PATH', dirname(__FILE__).'/');
include WYCMS_PATH.'/wycms/base.php';

wy_base::creat_app();

?>
