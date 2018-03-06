<?php
/**
 * file           ckplayer播放器参数模型类 for 织梦ckplayer视频播放器插件v1.9.0
 * writer         土匪
 * version        v1.0.20170928
 * QQ             991778797
 * link           http://www.dedejs.com/
 **/

class CkPlayer {
	private $cfg_ml    		= '';
	private $dsql    		= '';
	public function __construct() {
		$this->dsql = $GLOBALS['dsql'];
		
    }
	
	public function getCkConfig($id){
		$this->cfg_ml = new MemberLogin();
		$styleid = $this->getStyleId($id);
		$this->dsql->SetQuery("Select * from `#@__ckcommon` where id='$styleid'");
		$this->dsql->Execute();
		$alertmsg = "";
		$revalue = "";
		if($dbrow=$this->dsql->GetObject()){
			$advjp 		= $this->getCloseAd($dbrow->jpmember);
			$alertmsg 	= $this->getAlertMsg($dbrow->jpmember);
			$useshow = $dbrow->unshow;
			$new_adpre = $dbrow->adpre;
			$new_adpreurl = $dbrow->adpreurl;
			$new_adpretime = $dbrow->adpretime;
			
			$revalue.= "/*\r\n";
			$revalue.= "织梦ckplayer播放器插件配置方案调用\r\n";
			$revalue.= "by土匪\r\n";
			$revalue.= "http://www.dedejs.com/\r\n";
			$revalue.= "*/\r\n";
			$revalue.= "var ckdata={\r\n";
			$revalue.= "skin:'".$dbrow->skin.".swf',\r\n";
			$revalue.= "autoplay:'".$dbrow->autoplay."',\r\n";
			$revalue.= "dwidth:'".$dbrow->dwidth."',\r\n";
			$revalue.= "dheight:'".$dbrow->dheight."',\r\n";
			$revalue.= "mwidth:'".$dbrow->mwidth."',\r\n";
			$revalue.= "mheight:'".$dbrow->mheight."',\r\n";
			$revalue.= "volume:'".$dbrow->volume."',\r\n";
			$revalue.= "logotime:'".$dbrow->logotime."',\r\n";
			$revalue.= "endmotion:'".$dbrow->endmotion."',\r\n";
			$revalue.= "cthidden:'".$dbrow->cthidden."',\r\n";
			$revalue.= "cthidtime:'".$dbrow->cthidtime."',\r\n";
			$revalue.= "adpre:'".$new_adpre."',\r\n";
			$revalue.= "adpreurl:'".$new_adpreurl."',\r\n";
			$revalue.= "adpretime:'".$new_adpretime."',\r\n";
			$revalue.= "advolume:'".$dbrow->advolume."',\r\n";
			$revalue.= "adpreorder:'".$dbrow->adpreorder."',\r\n";
			$revalue.= "adprejp:'".$dbrow->adprejp."',\r\n";
			$revalue.= "adpremute:'".$dbrow->adpremute."',\r\n";
			$revalue.= "adpreload:'".$dbrow->adpreload."',\r\n";
			$revalue.= "adpau:'".$dbrow->adpau."',\r\n";
			$revalue.= "adpauurl:'".$dbrow->adpauurl."',\r\n";
			$revalue.= "adpaucls:'".$dbrow->adpaucls."',\r\n";
			$revalue.= "admarstatus:'".$dbrow->admarstatus."',\r\n";
			$revalue.= "admarcontent:'".$dbrow->admarcontent."',\r\n";
			$revalue.= "admarurl:'".$dbrow->admarurl."',\r\n";
			$revalue.= "admarcolor:'".$dbrow->admarcolor."',\r\n";
			$revalue.= "admarbgc:'".$dbrow->admarbgc."',\r\n";
			$revalue.= "admarbgt:'".$dbrow->admarbgt."',\r\n";
			$revalue.= "admarlight:'".$dbrow->admarlight."',\r\n";
			$revalue.= "lightcolor:'".$dbrow->lightcolor."',\r\n";
			$revalue.= "lightc:'".$dbrow->lightc."',\r\n";
			$revalue.= "adjpstyle:'".$advjp."',\r\n";
			$revalue.= "key:'".$cfg_ckplayer_key."',\r\n";
			$revalue.= "copyright:'".$cfg_ckplayer_name."',\r\n";
			$revalue.= "url:'".$cfg_ckplayer_url."',\r\n";
			$revalue.= "version:'".$cfg_ckplayer_version."',\r\n";
			$revalue.= "alertmsg:'".$alertmsg."'\r\n";
			$revalue.= "}";
		}
		header("Content-type:application/javascript");
		echo $revalue;
	}
	private function getStyleId($id){//判断是否存在配置方案
		$styleid = is_numeric($id) ? $id : "1";
		$row = $this->dsql->GetOne("Select * from `#@__ckcommon` where id='$styleid'");
		if(!is_array($row)){//如果没有该配置方案则调用默认配置方案
			$styleid = 1;
		}
		return $styleid;
	}
	private function getCloseAd($usejpbutton){
		$advjp = ($usejpbutton==0 || $this->cfg_ml->M_Rank >= $usejpbutton) ? 0 : 1;
		return $advjp;
	}
	private function getAlertMsg($usejpbutton){//获取跳过广告时的弹出消息内容
		if ($usejpbutton==0 || $this->cfg_ml->M_Rank >= $usejpbutton) {
			$alertmsg = "";
		}else{
			$this->dsql->Execute('me',"SELECT * FROM `#@__arcrank`");
        	while($rowrank = $this->dsql->GetObject('me')){
				$memberTypes[$rowrank->rank] = $rowrank->membername;
        	}
			$memberTypes[0] = "游客";
			$alertmsg = "对不起，只有".$memberTypes[$usejpbutton]."用户才能跳过广告，您目前的身份是".$memberTypes[$this->cfg_ml->M_Rank]."！";
		}
		return $alertmsg;
	}
	public function outXml($type){
		require_once DEDEINC."/arc.partview.class.php";
		$pv = new PartView();
		$pv->SetTemplet(CK_PATH."views/ckplayer_".$type.".htm");
		header("Content-type:application/xml");
		$pv->Display();
	}
}
?>