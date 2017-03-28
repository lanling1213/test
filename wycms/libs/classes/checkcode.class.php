<?php
/**
 * 生成验证码
 * @author mijon
 * 类用法
 * $checkcode = new checkcode();
 * $checkcode->doimage();
 * //取得验证
 * $_SESSION['code']=$checkcode->get_code();
 */
class checkcode {
	public $width  = 130;  // 验证码的宽度
	public $height = 50;  // 验证码的高
	private $font;      // 设置字体的地址
	public $font_color; // 设置字体色
	public $charset    = 'abcdeghkmnpsuvwyzABCDEFGHKLMNPRSTUVWYZ23456789'; // 设置随机生成因子
	public $background = '#EDF7FF'; // 设置背景色
	public $code_len   = 4;           // 生成验证码字符数
	public $font_size  = 24;         // 字体大小

	private $code;    // 验证码
	private $img;     // 图片内存
	private $x_start; // 文字X轴开始的地方
		
	function __construct() {
        $font_path = WY_PATH.'libs'.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'font'.DIRECTORY_SEPARATOR; // 字段路径

        // 多种字段随机变更
		$rand = rand(0,2);
        switch ($rand) {
        case 0 :
			$font_path .= 'Pointy.ttf';
            break;
        case 1 :
			$font_path .= 'thinkphp.ttf';
            break;
        default :
            $font_path .= 'swissel.ttf';
        }
        $this->font = $font_path;
	}
	
	/**
	 * 生成随机验证码。
	 */
	protected function creat_code() {
		$code = '';
		$charset_len = strlen($this->charset)-1;
		for ($i=0; $i<$this->code_len; $i++) {
			$code .= $this->charset[rand(1, $charset_len)];
		}
		return $this->code = $code;
	}
	
	/**
	 * 获取验证码
	 */
	public function get_code() {
		return strtolower($this->code);
	}
	
	/**
	 * 生成图片
	 */
	public function doimage() {
		$code = $this->creat_code();
        $this->img = imagecreate($this->width, $this->height);
        // 设置背景颜色
        //$bgcolor = ImageColorAllocate($this->img, rand(200,255), rand(200,255), rand(200,255)); // 随机背景
		$background = imagecolorallocate($this->img,hexdec(substr($this->background, 1,2)),hexdec(substr($this->background, 3,2)),hexdec(substr($this->background, 5,2)));
        imagefill($this->img, 0, 0, $background);
		//画一个柜形，设置背景颜色。
		//imagefilledrectangle($this->img, 0, $this->height, $this->width, 0, $background);

        // 生成文字
        $this->creat_font();
        // 设置干扰信息
        $this->set_jam();
        // 画线
        //$this->creat_line();
        $this->output();
	}

    /**
     * 验证验证码是否正确
     *
     * @param string $name 验证码输入框的名称
     *
     * @return 成功返回true,失败返回false
     */
    public function verify_code($name)
    {
        $session_storage = 'session_'.wy_base::load_config('system','session_storage');
        wy_base::load_sys_class($session_storage);

        $code = isset($_REQUEST[$name]) && trim($_REQUEST[$name]) ? trim($_REQUEST[$name]) : showmessage(L('input_code'), HTTP_REFERER);
        $code = strtolower($code);
        if (!empty($code) && $code == $_SESSION[$name]) {
            unset($_SESSION[$name]);
            return true;
        }

        unset($_SESSION[$name]);
        return false;
    }
	
	/**
	 * 生成文字
	 */
	private function creat_font() {
        $y         = floor($this->height/2) + floor($this->height/4);
        $font_size = rand($this->font_size, ($this->font_size+(rand(1, 8)))); // 字体随机偏大1-8
        $code_len  = $this->code_len;
        
        for($i=0;$i<$code_len;$i++){
            $char   = $this->code[$i];
            $x      = floor($this->width/$code_len) * $i + 8;
            $jiaodu = rand(-20, 30);
            $color  = ImageColorAllocate($this->img, rand(0,50), rand(50,100), rand(100,140));
            imagettftext($this->img, $font_size, $jiaodu, $x, $y, $color, $this->font, $char);
        }
	}
	
	/**
	 * 画线
	 */
	private function creat_line() {
		imagesetthickness($this->img, 3);
	    $xpos   = ($this->font_size * 2) + rand(-5, 5);
	    $width  = $this->width / 2.66 + rand(3, 10);
	    $height = $this->font_size * 2.14;
	
	    if ( rand(0,100) % 2 == 0 ) {
	      $start = rand(0,66);
	      $ypos  = $this->height / 2 - rand(10, 30);
	      $xpos += rand(5, 15);
	    } else {
	      $start = rand(180, 246);
	      $ypos  = $this->height / 2 + rand(10, 30);
	    }
	
	    $end = $start + rand(75, 110);
	
	    imagearc($this->img, $xpos, $ypos, $width, $height, $start, $end, $this->font_color);
		
	    if ( rand(1,75) % 2 == 0 ) {
	      $start = rand(45, 111);
	      $ypos  = $this->height / 2 - rand(10, 30);
	      $xpos += rand(5, 15);
	    } else {
	      $start = rand(200, 250);
	      $ypos  = $this->height / 2 + rand(10, 30);
	    }
	
	    $end = $start + rand(75, 100);
	
	    imagearc($this->img, $this->width*.75, $ypos, $width, $height, $start, $end, $this->font_color);
	}

    /**
     * 设置干扰文字信息
     */
    private function set_jam() {
        $cou = floor($this->height * 2);
        for($i=0; $i<$cou; $i++){
            $x = rand(0, $this->width);
            $y = rand(0, $this->height);
            $jiaodu = rand(0,360);
            $fontsize = rand(5,10);
            $originalcode = $this->charset;
            $countdistrub = strlen($originalcode);
            $dscode = $originalcode[rand(0, ($countdistrub-1))];
            $color = ImageColorAllocate($this->img, rand(40,140), rand(40,140), rand(40,140));
            imagettftext($this->img, $fontsize, $jiaodu, $x, $y, $color, $this->font, $dscode);
        }
    }
	
	/**
	 * 输出图片
	 */
	private function output() {
        header("Content-type: image/gif\r\n");
        imagegif($this->img);
        imagedestroy($this->img); 
	}
}
