<?php
defined('IN_WYCMS') or exit('No permission resources.');
wy_base::load_sys_class('model', '', 0);
class guestbook_model extends model {
	function __construct() {
		$this->db_config = wy_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'guestbook';
		parent::__construct();
	} 
}
?>