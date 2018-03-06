<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $cfg_soft_lang; ?>">
<title>ckplayer配置方案管理</title>
<link href="css/base.css" rel="stylesheet" type='text/css'>
<script language='javascript'>
function Sel(stype)
{
	  for(var i=0;i < document.getElementsByName('aids').length;i++)
	  {
		  if(stype=='all') document.getElementsByName('aids')[i].checked=true;
		  else document.getElementsByName('aids')[i].checked=false;
	  }
}
function checkSubmit()
{
	var str = '';
	for(var i=0;i < document.getElementsByName('aids').length;i++)
	{
		  if(document.getElementsByName('aids')[i].checked){
		  	if(str=='') str += document.getElementsByName('aids')[i].value;
		  	else str += ',' + document.getElementsByName('aids')[i].value;
		  }
	}
	if(str=='')
	{
		alert('你没选择任何内容！');
		return false;
	}
	else
	{
		location="ckplayercommon_edit.php?aids="+str+"&dopost=delall";
	}
}
</script>
</head>
<body background='images/allbg.gif' leftmargin='8' topmargin='8'>

<table width="98%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#D6D6D6">
  <tr>
    <td height="28" background="images/tbg.gif" colspan="9" style="padding-left:10px;">
  <div style="float:left">
  	<b>ckplayer配置方案管理</b>
  </div>
  <div style="float:right;padding-right:6px;">
		[<a href="ckplayercommon_add.php"><u>添加配置方案</u></a>]
  </div>
  </td>
</tr>
<tr>
   <td height="30" align="center" bgcolor="#F9FCEF"  colspan="9"> 
   <form action="ckplayercommon_main.php" name="form1" method="get">
	  <table border="0" cellspacing="0" cellpadding="3">
      <tr>
          <td>关键字：</td>
          <td><input name="keyword" type="text" id="keyword" size="12" style="width:250px" value="<?php echo $keyword; ?>" /></td>
          
          <td>
           <input name="imageField" class="np" type="image" src="images/button_search.gif" width="60" height="22" border="0" />
          </td>
        </tr>
      </table>
	  </form>
    </td>
</tr>
<form name='form1' method='post' action='ckplayercommon_edit.php' onSubmit='return checkSubmit();'>
<input type='hidden' name='dopost' value='delall'/>
<input type='hidden' name='allid' value=''/>
<tr align="center" bgcolor="#FBFCE2" height="26">
          <td width="5%">选择</td>
          <td width="5%">id</td>
          <td width="15%">方案名称</td>
          <td width="10%">皮肤文件名</td>
          <td width="15%">播放结束后的动作</td>
          <td width="10%">PC端播放器尺寸(宽*高)</td>
          <td width="10%">手机端播放器尺寸(宽*高)</td>
          <td width="15%">最后修改时间</td>
          <td width="15%">管理</td>
</tr>
        <?php
$atts = array();
$atts['tagname'] = 'datalist';
$blockValue = $this->refObj->GetArcList($atts,$this->refObj,$fields); 
if(is_array($blockValue)){
foreach( $blockValue as $key=>$fields )
{
?>
        <tr align="center" bgcolor="#FFFFFF" height="26" onMouseMove="javascript:this.bgColor='#FCFDEE';" onMouseOut="javascript:this.bgColor='#FFFFFF';">
          <td><input type='checkbox' value='<?php echo $fields['id']; ?>' class='np' <?php echo GetSelect($fields['id']); ?> /></td>
          <td><?php echo $fields['id']; ?></td>
          <td><?php echo $fields['stylename']; ?></td>
          <td><?php echo $fields['skin']; ?></td>
          <td><?php echo GetMotion($fields['endmotion']); ?></td>
          <td><?php echo $fields['dwidth']; ?>px * <?php echo $fields['dheight']; ?>px</td>
          <td><?php echo $fields['mwidth'];  echo GetUnit($fields['wunit']); ?> * <?php echo $fields['mheight'];  echo GetUnit($fields['hunit']); ?></td>
          <td><?php echo MyDate('Y-m-d H:i:s',$fields['savetime']); ?></td>
          <td>
          <a href='ckplayercommon_edit.php?id=<?php echo $fields['id']; ?>&dopost=gettag'>[获取代码]</a>
          <a href='ckplayercommon_edit.php?id=<?php echo $fields['id']; ?>&dopost=getedit'>[编辑]</a>
		  <a href='ckplayercommon_edit.php?id=<?php echo $fields['id']; ?>&dopost=delete'>[删除]</a>
          </td>
        </tr>
        
		<?php
}
}?>
    </form>
     <tr bgcolor="#ffffff" height="28">
      <td colspan="9">
      	　
        <a href='#' onclick='Sel("all")' class='np coolbg'>[全选]</a>
      	<a href='#' onclick='Sel("none")' class='np coolbg'>[取消]</a>
      	<a href='#' onclick='checkSubmit()' class='np coolbg'>批量删除</a>
        <a href='ckplayercommon_add.php' class='np coolbg'>添加方案</a>

      </td>
     </tr>
     <tr align="center" bgcolor="#F9FCEF" height="28">
      <td colspan="9">
      	<?php
$atts = array();
$atts['tagname'] = 'pagelist';
$atts['listsize'] = '6';
 echo $this->refObj->GetPageList($atts,$this->refObj,$fields); 
?>

      </td>
     </tr>
     <tr bgcolor="#ffffff" height="28">
      <td colspan="9">
       <font color="#FF0000"> 您当前使用的是免费版，不具备视频地址隐藏功能，如需要视频地址隐藏功能请购买收费版，收费版价格为50元/域名，购买请联系QQ：991778797 或者微信：81018504。</font>

      </td>
     </tr>
   </table>
  </td>
</tr>
</table>
</body>
</html>