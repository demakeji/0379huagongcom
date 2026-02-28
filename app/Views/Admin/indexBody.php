<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{$meta_title}}_管理员后台-首页</title>
<base target="_self">
<link rel="stylesheet" type="text/css" href="img/base.css" />
<link rel="stylesheet" type="text/css" href="img/indexbody.css" />
<script language='javascript' src='js/ajax.js'></script>
</head>
<body leftmargin="8" topmargin='8' bgcolor="#FFFFFF">

<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td>
     <div style='float:left;padding-left:200px;'>欢迎使用{{$meta_title}}</div>
     <div id='' style='float:right;padding-right:8px;'><!--  //保留位置（顶右）  --></div>
   </td>
  </tr>
  <tr>
    <td height="1" background="img/sp_bg.gif" style='padding:0px'></td>
  </tr>
</table>
 
<div id='mainmsg'>
	<div id="leftside"> 
		<dl class='dbox'>
			<dt class='lside'>
				<div class='l'>快捷操作</div>
				<div class='r'></div>
			</dt>
			<dd>
				<div id='quickmenu' style="margin-left:20px;" >
					<div class='icoitem' ><a href='user_admin.php' target='main'>帐号管理</a></div>
					<div class='icoitem' ><a href="custom_admin.php" target="main">定制内容</a></div>
					<div class='icoitem' ><a href="makehtml_index.php" target="main">首页更新</a></div>
					<!--
					<div class='icoitem' ><a href='news_admin.php?do=add' target='main'>新增资讯</a></div>
					<div class='icoitem' ><a href='news_admin.php?do=main' target='main'>资讯列表</a></div>
					-->
				</div>
			</dd>
		</dl>
   
		<dl class='dbox'>
			<dt class='lside'>
				<div class='l'>信息摘要</div>
			</dt>
			<dd class='intable'>
				{{if $newsinfo_list}}
				<table width="98%" class="dboxtable">
					<tr style="height:0;line-height:0;" align="center" >
						<td width='25%'>栏目名称</td>
						<td width='25%'>发布总量</td>
						<td width='25%'>{{if $AUid}}个人发布{{/if}}</td>
						<td ></td>
					</tr>
					{{foreach item=cate key=cid from=$newsinfo_list}}
					<tr align="center" >
						<td height='36' class='nline' >
							{{if $cate.sub}}
							{{$cate.name}}
							{{else}}
							<a href="news_admin.php?do=main&type={{$cid}}" target='main'>{{$cate.name}}</a>
							{{/if}}
						</td>
						<td class='nline' >{{$cate.allnum}}</td>
						<td class='nline' >{{$cate.usernum}}</td>
						<td class='nline' ></td>
					</tr>
					{{/foreach}}

				</table>
				{{/if}}
			</dd>
		</dl>
 
		<dl class='dbox'>
			<dt class='lside'>
				<div class='l'>技术支持信息</div>
			</dt>
			<dd class='intable'>
				<table width="98%" class="dboxtable">
					<tr>
						<td width='25%' height='36' class='nline' align="center" > 开发团队： </td>
						<td class='nline' align="left" ><a href="http://www.topoyo.com" target="_blank">德玛化工</a></td>
					</tr>
					<tr>
						<td height='36' class='nline' align="center" >联系方式：</td>
						<td class='nline' align="left" >TEL:15303866852 270176349@qq.com</td>
					</tr>
				</table>
			</dd>
		</dl>
	</div>
	<div id="rightside"></div>	
</div>

<br style='clear:both'/>
<!-- //底部 -->
<div align="center" class="footer">
	Copyright &copy; {{$year}} <a href='{{$WEB_URL_ROOT}}' target='_blank'>{{$meta_title}}</a>
</div>
 
</body>
</html>