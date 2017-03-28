<?php
defined('IN_WYCMS') or exit('No permission resources.');
if(!defined('CACHE_MODEL_PATH')) define('CACHE_MODEL_PATH',WYCMS_PATH.'data'.DIRECTORY_SEPARATOR.'caches_model'.DIRECTORY_SEPARATOR.'caches_data'.DIRECTORY_SEPARATOR);

wy_base::load_sys_class('model', '', 0);
class collection_node_model extends model {
	public function __construct() {
		$this->db_config = wy_base::load_config('database');
		$this->db_setting = 'default';
		$this->table_name = 'collection_node';
		parent::__construct();
	}

}
?>
