<?php
defined('IN_WYCMS') or exit('No permission resources.');
wy_base::load_app_class('admin','admin',0);

class wysso extends admin {
	function __construct() {
		parent::__construct();
	}
	
	function menu() {
	}
	
	
	function public_menu_left() {
		$setting = wy_base::load_config('system');

		include $this->admin_tpl('wysso');
	}
}
?>
