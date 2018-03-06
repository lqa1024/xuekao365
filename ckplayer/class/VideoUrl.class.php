<?php
/**
 * file           ckplayer播放器视频播放地址模型类 for 织梦ckplayer视频播放器插件v1.9.0
 * writer         土匪
 * version        v1.0.20170928
 * QQ             991778797
 * link           http://www.dedejs.com/
 **/

class VideoUrl {
	private $ck_wap    		= '';
	public function __construct() {
		$this->ck_wap   = ($_GET["m"] ==1) ? 1 : "";
    }
	public function getUrl(){
		$url  = $_GET["url"];
		$murl = $_GET["murl"];
		$videourl  = $this->htmlencode($url);
		$mvideourl = $this->htmlencode($murl);
		if(strpos($url,'.mp4') || strpos($url,'.flv') || strpos($url,'.f4v') || strpos($url,'.m3u8')){
			if(!$this->ck_wap){
				$this->getPcUrl($videourl);
			}else{
				$this->getWapUrl($videourl,$mvideourl);
			}
		}else{
			$this->getNetUrl($videourl);
		}
	}
	private function getPcUrl($videourl){
		$list = explode('||',$videourl);
		$playlist = array();
		$playlist2 = array("flashvars"=>"","video"=>"");
		$playlist2['flashvars'] = "";
		for($i = 0;$i < count($list);$i++){
			$playlist[$i] = array("file"=>"","size"=>"","seconds"=>"");
			$playlist[$i]['file'] = $list[$i];
			$playlist[$i]['size'] = "";
			$playlist[$i]['seconds'] = "";
			$playlist2['video'][$i] = $playlist[$i];
		}
		header('Content-type:application/json');
		echo json_encode($playlist2);
	}
	private function getWapUrl($pcurl,$wapurl = null){
		$list = !empty($wapurl) ? $wapurl : $pcurl;
		$resulturl = explode('||',$list);
		echo $resulturl[0];
	}
	private function getNetUrl($videourl){
		require_once(CK_PATH.'class/UrlAPI.class.php');
		$dedejs_api = new UrlAPI($this->ck_wap);
		$dedejs_api->getVideo($videourl);
	}
	private function htmlencode($str){
		$nstr = htmlentities($str,ENT_COMPAT,"utf-8");
		return $nstr;
	}
	
}
?>