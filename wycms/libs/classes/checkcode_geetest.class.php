<?php
defined('IN_WYCMS') or exit('Access Denied');
/**
 * 极验验证码
 * @author mijon
 * 类用法
 * $checkcode = new checkcode();
 */

// 极验SDK文件
require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'geetest/geetestlib.class.php';

$session_storage = 'session_'.wy_base::load_config('system','session_storage');
wy_base::load_sys_class($session_storage);


class checkcode_geetest
{
	private $gtSDK;
    private $gtServerStatus = 0; // 极验的服务器状态: 成功返回1，宕机返回0
		
	function __construct()
    {
        $id  = wy_base::load_config('system', 'geetest_id');
        $key = wy_base::load_config('system', 'geetest_key');
        $this->gtSDK = new GeetestLib($id, $key);

        $this->gtServerStatus = $this->check_server();
	}

    /**
     * 判断极验的服务器状态
     *
     * @return 返回服务器状态 
     */
    private function check_server()
    {
        if (1 == $this->gtServerStatus) {
            // 已经有状态
            $status = 1;
        } else {
            $identifier = 'wycms';
            $status     = $this->gtSDK->pre_process($identifier);

            // 记录服务器检测状态
            $this->gtServerStatus = $status;

            $_SESSION['gt_server_status'] = $status;
            $_SESSION['gt_identifier']    = $identifier;
        }

        return $status;
    }

    /**
     * 初步与极验的握手信息，用于获取验证码样式
     *
     * @return 返回JSON格式字符串
     */
    public function get_response()
    {
        return $this->gtSDK->get_response_str();
    }

    /**
     * 验证验证码是否正确
     *
     * @return 成功返回true,失败返回false
     */
    public function verify_code()
    {
        $identifier = $_SESSION['gt_identifier'];

        if (1 == $_SESSION['gt_server_status']) {
            $status = $this->gtSDK->success_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode'], $identifier);
        } else {
            // 二次验证
            $status = $this->gtSDK->fail_validate($_POST['geetest_challenge'], $_POST['geetest_validate'], $_POST['geetest_seccode']);
        }

        return $status ?true :false;
    }
}
