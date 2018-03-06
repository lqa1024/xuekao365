//缩略图路径转换
var litpic = '';
if(videoinfo['litpic'].indexOf("http://")!=-1){
	litpic = videoinfo['litpic'];
}else{
	litpic = videoinfo['basehost']+videoinfo['litpic'];
}
//视频参数
var flashvars={
	e:ckdata['endmotion'],
	p:ckdata['autoplay'],
	v:ckdata['volume'],
	lv:'0'
};
var support=['all'];
var video=[videoinfo['path']+'/ckplayer/index.php?c=VideoUrl&a=getUrl&m=1&url='+videoinfo['videourl']+'&murl='+videoinfo['videourl_m']+'->ajax/get/utf-8'];
CKobject.embedHTML5('a1','ckplayer_a1',ckdata["mwidth"],ckdata["mheight"],video,flashvars,support);
