<?phpdefined('IN_WYCMS') or exit('No permission resources.');class index {    function __construct() {        wy_base::load_app_func('global');        $siteid = isset($_GET['siteid']) ? intval($_GET['siteid']) : get_siteid();        define("SITEID",$siteid);    }        public function init() {        $siteid = SITEID;        $setting = getcache('guestbook', 'commons');        $SEO = seo(SITEID, '', L('guestbook'), '', '');        include template('guestbook', 'index');    }         /**     *  留言板列表页     */    public function list_type() {        $catid = $_GET['catid'];        $siteid = SITEID;        $CATEGORYS = getcache('category_content_'.$siteid,'commons');        $setting = getcache('guestbook', 'commons');        $SEO = seo(SITEID, '', '咨询列表', '', '');                // URL规则设置                $page = isset($_GET[page])&&!empty($_GET[page])?intval($_GET[page]):1;                if($page<0) $page = 1;                                $urlrules = './~list_{$page}.html';                $tmp_urls = explode('~',$urlrules);                define('URLRULE', $urlrules);                $setting = getcache('guestbook', 'commons');                if($setting[$siteid]['is_post']=='0'){                        showmessage(L('suspend_application'),$url);                }                wy_base::load_sys_class('form', '', 0);                // athor  刘林峰    @2013.7.19                // 使用留言板还是客户评价模板                include template('guestbook', 'list');                    }          /**     *  留言板留言      */    public function register() {         // athor  刘林峰    @2013.7.19        // 根据type_id判断URL和使用哪一套模板        $type_id = isset($_GET[typeid])&&!empty($_GET[typeid])?intval($_GET[typeid]):0;        if($type_id==0){                        $SEO = seo(SITEID, '', "在线咨询", '', '');            $url = APP_PATH."ask/";            $template_name = "ask";        } else {                        $SEO = seo(SITEID, '', "客户评价", '', '');            $url = APP_PATH."evaluate/";            $template_name = "evaluate";        }        $catid = $_GET['catid'];        $siteid = SITEID;        $CATEGORYS = getcache('category_content_'.$siteid,'commons');        if(isset($_POST['code'])){            $jump = isset($_POST['jump'])&&trim($_POST['jump'])!=''?intval(trim($_POST['jump'])):0;            wy_base::load_sys_class('session_mysql');            $code = isset($_POST['code']) && trim($_POST['code']) ? trim($_POST['code']) : '';            if ($_SESSION['code'] != strtolower($code)) {                echo json_encode(array('info'=>'code_error','status'=>'y'));                exit;            }            unset($_SESSION['code']);            $guestbook_db = wy_base::load_model(guestbook_model);                          /*添加用户数据*/            $sql = array('siteid'=>$siteid,'title'=>$_POST['title'],'typeid'=>$_POST['typeid'],'name'=>$_POST['name'],'tel'=>$_POST['tel'],'introduce'=>$_POST['introduce'],'passed'=>1,'addtime'=>time());                         $guestbook_db->insert($sql);            if($jump==1) {                echo json_encode(array('info'=>$jump,'status'=>'y'));            } else {                echo json_encode(array('info'=>$url,'status'=>'y'));            }        } else {            // URL规则设置            $page = isset($_GET[page])&&!empty($_GET[page])?intval($_GET[page]):1;            if($page<0) $page = 1;            $urlrules = './~list_{$page}.html';                $tmp_urls = explode('~',$urlrules);            define('URLRULE', $urlrules);                        $setting = getcache('guestbook', 'commons');            if($setting[$siteid]['is_post']=='0'){                showmessage(L('suspend_application'),$url);            }                        //$this->type = wy_base::load_model('type_model');            //$types = $this->type->get_types($siteid);//获取站点下所有留言板分类            wy_base::load_sys_class('form', '', 0);            $setting = getcache('guestbook', 'commons');            $CATEGORYS = getcache('category_content_'.$siteid,'commons');            // athor  刘林峰    @2013.7.19            // 使用留言板还是客户评价模板            include template('guestbook', $template_name);        }    }         public function lists()    {        $catid = $_GET['catid'];        $siteid = SITEID;        $CATEGORYS = getcache('category_content_'.$siteid,'commons');        // URL规则设置        $page = isset($_GET[page])&&!empty($_GET[page])?intval($_GET[page]):1;        if($page<0) $page = 1;        $urlrules = './list_{$page}.html';        $tmp_urls = explode('~',$urlrules);        define('URLRULE', $urlrules);        include template('guestbook', 'list');    }            public function detail(){        $catid = $_GET['catid'];        $cid = $_GET['cid'];        $siteid = SITEID;        $CATEGORYS = getcache('category_content_'.$siteid,'commons');        include template('guestbook', 'detail');    }        /**     *  留言成功页面     *  athor  刘林峰    @2013.7.19     */    public function location(){        $siteid = SITEID;        $arrSiteAllInfo = siteinfo($siteid);        $site_info = string2array($arrSiteAllInfo[infos]);        $CATEGORYS = getcache('category_content_'.$siteid,'commons');        if(isset($_GET)&&trim($_GET['opt'])!=""){            $opt = trim($_GET['opt']);            if ($opt == 1) {                include template('guestbook', "post_success");            } elseif ($opt == 2) {                   include template('guestbook', "post_evaluate_success");                        } else {                               include template('guestbook', "post_failed");                        }        }    }}?>