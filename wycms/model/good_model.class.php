<?php
defined('IN_PHPCMS') or exit('No permission resources.');
pc_base::load_sys_class('model', '', 0);
class good_model extends model {
   public function __construct() {
       $this->db_config = pc_base::load_config('database');  //加载数据库
       $this->db_setting = 'default';
       $this->table_name = 'good';                 // 指向good表
       parent::__construct();
   }
}
?>

