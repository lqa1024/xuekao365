<?php
$z[0]=Array("global","",236,264);
$z[0][4]=array();
$z[0][4]['name']="cfg_soft_lang";
$z[1]=Array("field","",277,296);
$z[1][4]=array();
$z[1][4]['name']="title";
$z[2]=Array("global","",297,323);
$z[2][4]=array();
$z[2][4]['name']="cfg_webname";
$z[3]=Array("field","",364,393);
$z[3][4]=array();
$z[3][4]['name']="keywords";
$z[4]=Array("field","",433,491);
$z[4][4]=array();
$z[4][4]['name']="description";
$z[4][4]['function']="html2text(@me)";
$z[5]=Array("global","",509,541);
$z[5][4]=array();
$z[5][4]['name']="cfg_templets_skin";
$z[6]=Array("global","",671,699);
$z[6][4]=array();
$z[6][4]['name']="cfg_mobileurl";
$z[7]=Array("field","",713,729);
$z[7][4]=array();
$z[7][4]['name']="id";
$z[8]=Array("global","",1198,1226);
$z[8][4]=array();
$z[8][4]['name']="cfg_mobileurl";
$z[9]=Array("field","",1240,1256);
$z[9][4]=array();
$z[9][4]['name']="id";
$z[10]=Array("include","",1371,1406);
$z[10][4]=array();
$z[10][4]['filename']="head.htm";
$z[11]=Array("field","",1538,1567);
$z[11][4]=array();
$z[11][4]['name']="position";
$z[12]=Array("list","\r\n    <li> [field:array runphp='yes']@me = (empty(@me['litpic']) ? \"\" : \"<a href='{@me['arcurl']}' class='preview'><img src='{@me['litpic']}'/></a>\"); [/field:array]\r\n     [<b>[field:typelink/]</b>] <a href=\"[field:arcurl/]\" class=\"title\">[field:title/]</a> <span class=\"info\"> <small>日期：</small>[field:pubdate function=\"GetDateTimeMK(@me)\"/] <small>点击：</small>[field:click/] <small>好评：</small>[field:scores/] </span>\r\n     <p class=\"intro\"> [field:description/]... </p>\r\n    </li>\r\n    ",1644,2232);
$z[12][4]=array();
$z[12][4]['pagesize']="10";
$z[12][4]['isweight']="Y";
$z[12][4]['orderby']="weight";
$z[12][4]['orderway']="asc";
$z[13]=Array("pagelist","",2333,2411);
$z[13][4]=array();
$z[13][4]['listitem']="info,index,end,pre,next,pageno,option";
$z[13][4]['listsize']="5";
$z[14]=Array("channel","\r\n      <li><a href='[field:typeurl/]'>[field:typename/]</a></li>\r\n      ",2615,2822);
$z[14][4]=array();
$z[14][4]['type']="son";
$z[14][4]['currentstyle']="<li><a href='~typelink~' class='thisclass'>~typename~</a></li>";
$z[15]=Array("arclist","\r\n      <li><a href=\"[field:arcurl/]\">[field:title/]</a>\r\n       <p>[field:description function='cn_substr(@me,80)'/]...</p>\r\n      </li>\r\n      ",3087,3288);
$z[15][4]=array();
$z[15][4]['flag']="c";
$z[15][4]['titlelen']="42";
$z[15][4]['row']="6";
$z[16]=Array("arclist","\r\n      <li><a href=\"[field:arcurl/]\">[field:title/]</a></li>\r\n      ",3522,3641);
$z[16][4]=array();
$z[16][4]['row']="10";
$z[16][4]['orderby']="click";
$z[17]=Array("include","",3850,3887);
$z[17][4]=array();
$z[17][4]['filename']="footer.htm";

?>