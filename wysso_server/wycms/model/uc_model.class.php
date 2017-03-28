<?php
defined('IN_WYCMS') or exit('No permission resources.');
wy_base::load_sys_class('model', '', 0);
class uc_model extends model {
	public function __construct($db_config) {
		$this->db_config = array('ucenter'=>$db_config);
		$this->db_setting = 'ucenter';
		$this->table_name = 'members';
		parent::__construct();
	}
}
?>
