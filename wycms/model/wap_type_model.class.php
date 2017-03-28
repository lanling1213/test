<?php
defined('IN_WYCMS') or exit('No permission resources.');
wy_base::load_sys_class('model', '', 0);
class wap_type_model extends model {
	
	public $table_name;
	public function __construct() {
		$this->db_config = wy_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'wap_type';
		parent::__construct();
	}
}
?>
