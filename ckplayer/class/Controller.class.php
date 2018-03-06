<?php
/**
 * file           ckplayer播放器控制器类 for 织梦ckplayer视频播放器插件v1.9.0
 * writer         土匪
 * version        v1.0.20170928
 * QQ             991778797
 * link           http://www.dedejs.com/
 **/

class Controller{
	private $obj = "";
	public function __construct($model) {
		$model = !$model ? 'CkPlayer' : $model;
		require_once(CK_PATH.'class/'.$model.'.class.php');
		$this->obj = LoadModel::model($model);
    }
	public function getConfig_action(){
		$result = $this->obj->getCkConfig();
	}
	public function outXml_action(){
		$result = $this->obj->outXml();
	}
	public function getUrl_action(){
		$result = $this->obj->getUrl();
	}
	public function getBarrage_action(){
		$result = $this->obj->getBarrage();
	}
	public function sendBarrage_action(){
		$result = $this->obj->sendBarrage();
	}
}
?>