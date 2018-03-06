<?php
/**
 * file           模型工厂类 for 织梦ckplayer视频播放器插件v1.9.0
 * writer         土匪
 * version        v1.0.20170928
 * QQ             991778797
 * link           http://www.dedejs.com/
 **/

class LoadModel {
	static $models = array();
	static function model($model_name = null){
		if(!isset(self::$models[$model_name])||!(self::$models[$model_name] instanceof $model_name)){
			self::$models[$model_name] = new $model_name();
		}
		return self::$models[$model_name];
	}
}
?>