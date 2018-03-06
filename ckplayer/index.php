<?php
/**
 * file           ckplayer配置方案参数调用输出文件 for 织梦ckplayer视频播放器插件v1.9.0
 * writer         土匪
 * version        v1.0.20170928
 * QQ             991778797
 * link           http://www.dedejs.com/
 **/
 if (! defined('CK_PATH'))
{
	define('CK_PATH', dirname(__FILE__) . '/');
}
require_once(CK_PATH."../include/common.inc.php");
require_once(CK_PATH.'class/LoadModel.class.php');
require_once(CK_PATH.'class/Controller.class.php');
require_once(DEDEINC.'/memberlogin.class.php');
$control  = $_GET["c"];
$action   = !empty($_GET["a"]) ? $_GET["a"]."_action" : "getConfig_action";
$ckplayer = new Controller($control);
$ckplayer->$action();
exit();
?>