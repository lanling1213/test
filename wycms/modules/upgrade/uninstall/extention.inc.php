 <?php 
defined('IN_WYCMS') or exit('Access Denied');
defined('UNINSTALL') or exit('Access Denied');
$type_db = wy_base::load_model('type_model');
$typeid = $type_db->delete(array('module'=>'upgrade'));
if(!$typeid) return FALSE;
 ?>