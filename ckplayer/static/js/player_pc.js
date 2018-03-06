//缩略图路径转换
var litpic = '';
if(videoinfo['litpic'].indexOf("http://")!=-1){
	litpic = videoinfo['litpic'];
}else{
	litpic = videoinfo['basehost']+videoinfo['litpic'];
}
//视频参数
var flashvars={
	f:videoinfo['path']+'/ckplayer/index.php?c=VideoUrl&a=getUrl&url='+videoinfo['videourl'],
	a:'',
	s:'5',
	c:'0',x:'',
	l:ckdata['adpre'],
	r:ckdata['adpreurl'],
	t:ckdata['adpretime'],
	d:ckdata['adpau'],
	u:ckdata['adpauurl'],
	e:ckdata['endmotion'],
	p:ckdata['autoplay'],
	v:ckdata['volume'],
	lv:'0',
	my_title:videoinfo['title'],
	my_pic:litpic,
	my_url:videoinfo['arcurl']
};
var support=['all'];
var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always'};
var video=[videoinfo['path']+'/ckplayer/index.php?c=VideoUrl&a=getUrl&m=1&url='+videoinfo['videourl']+'&murl='+videoinfo['videourl_m']+'->ajax/get/utf-8'];
CKobject.embed(videoinfo['path']+'/ckplayer/static/player/ckplayer.swf','a1','ckplayer_a1',ckdata['dwidth'],ckdata['dheight'],false,flashvars,video,params);
function ckadjump(){
	alert(ckdata['alertmsg']);
}
//开关灯
var box = new LightBox();
function closelights(){//关灯
	box.Show();
}
function openlights(){//开灯
	box.Close();
}