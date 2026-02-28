<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{{$meta_title}}_后台管理系统</title>
<link href="{{$ADMIN_URL_ROOT}}/img/frame.css" rel="stylesheet" type="text/css" />
<script src="{{$ADMIN_URL_ROOT}}/img/jquery.js" language="javascript" type="text/javascript"></script>
<script src="{{$ADMIN_URL_ROOT}}/img/frame.js" language="javascript" type="text/javascript"></script>
</head>
<body class="showmenu">

<div class="head">
	<div class="top">
		<div class="top_logo">
			<p>{{$meta_title}}</p>
		</div>
		<div class="top_link">
			<ul>
				<li class="welcome">您好：{{$userid}} ，欢迎使用{{$meta_title}}！</li>				
	     		<li><a href="index.php" target="_top">后台首页</a></li>	     		
	     		<li><a href="{{$WEB_URL_ROOT}}" target="_blank">{{$sitename}}主页</a></li>
      			<li><a href="logout.php" target="_top">注销</a></li>
			</ul>
		</div>		
	</div>	
	<div class="topnav">
		<div class="menuact" style="width:220px; float:right">
			<a href="http://www.topoyo.com" target="_blank">技术支持：德玛西亚</a>
		</div>
	</div>	
</div>
 
<div class="left">
	<div class="menu" id="menu">
		 <iframe src="index_menu.php" id="menufra" name="menu" frameborder="0"></iframe>
	</div>
</div>
 
<div class="right">
	<div class="main">
		<iframe id="main" name="main" frameborder="0" src="index_body.php"></iframe>
	</div>
</div>
 
</body>
</html>