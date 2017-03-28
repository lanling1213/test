<?php 
class session_files {
    function __construct() {
		$path = wy_base::load_config('system', 'session_n') > 0 ? wy_base::load_config('system', 'session_n').';'.wy_base::load_config('system', 'session_savepath')  : wy_base::load_config('system', 'session_savepath');
		ini_set('session.save_handler', 'files');
		session_save_path($path);
		session_start();
    }
}
?>
