<?php 
	/**
	 * 检查管理员名称
	 * @param array $data 管理员数据
	 */
	function checkuserinfo($data) {
		if(!is_array($data)){
			showmessage(L('parameters_error'));return false;
		} elseif (!is_username($data['username'])){
			showmessage(L('username_illegal'));return false;
		} elseif (empty($data['email']) || !is_email($data['email'])){
			showmessage(L('email_illegal'));return false;
		} elseif (empty($data['roleid'])){
			return false;
		}
		return $data;
	}
	/**
	 * 检查管理员密码合法性
	 * @param string $password 密码
	 */
	function checkpasswd($password){
		if (!is_password($password)){
			return false;
		}
		return true;
	}

	function system_information($data) {
		$update     = wy_base::load_sys_class('update');
		$notice_url = $update->notice();
		$string     = '<script type="text/javascript">$("#main_frameid").removeClass("display");</script><div id="wycms_notice"></div><script type="text/javascript" src="NOTICE_URL"></script>';

		echo $data.str_replace('NOTICE_URL',$notice_url,$string);
	}
?>
