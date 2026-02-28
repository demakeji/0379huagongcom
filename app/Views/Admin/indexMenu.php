<html>
<head>
<title>{{$meta_title}}_左侧菜单</title>
<link rel="stylesheet" href="img/base.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" type="text/javascript" src="js/ajax.js"></script>
<script language='javascript'>var curopenItem = '1';</script>
<script language="javascript" type="text/javascript" src="js/leftmenu.js"></script>
<style>
div {padding:0px;margin:0px;}
body {padding:0px;margin:auto;text-align:center;background-color:#eff5ed;
	background:url(img/leftmenu_bg.gif);padding-left:3px;overflow:scroll;overflow-x:hidden;}
dl.bitem {clear:both;width:140px;margin:0px 0px 5px 12px;background:url(img/menubg_open.gif) repeat-x;}
dl.bitem dt { height:25px; line-height:25px; padding-left:35px; cursor:pointer;}
dl.bitem dt b {	color:#4D6C2F;}
dl.bitem dd {padding:3px 3px 3px 3px; background-color:#fff;}
div.items {clear:both;padding:0px;height:0px;}
.fllct {float:left;width:85px;}
.flrct {padding-top:3px;float:left;}
.sitemu li {padding:0px 0px 0px 18px;line-height:22px;background:url(img/arr4.gif) no-repeat 5px 9px;}
ul { padding-top:3px;}
li { height:22px;}
a.mmac div{background:url(img/leftbg2.gif) no-repeat;height:37px!important;height:47px;
	padding:6px 4px 4px 10px;word-wrap: break-word;	word-break : break-all;	font-weight:bold;color:#325304;}
a.mm div{background:url(img/leftmbg1.gif) no-repeat;height:37px!important;height:47px;padding:6px 4px 4px 10px;
	word-wrap: break-word;	word-break : break-all;	font-weight:bold;color:#475645;	cursor:pointer;}
a.mm:hover div{background:url(img/leftbg2.gif) no-repeat;color:#4F7632;}
.mmf{height:1px;padding:5px 7px 5px 7px;}
#mainct{padding-top:8px;background: url(img/idnbg1.gif) repeat-y;}
</style>
<base target="main" />
</head>
<body>

<table width="180" align="left" border='0' cellspacing='0' cellpadding='0'>
	<tr>
		<td valign='top' style='padding-top:10px' width='20'>
  	  		<div class='mmf'></div>
		</td>
  		<td width='160' id='mainct' valign="top">
			<div id='ct1'>
				<!-- 菜单开始 -->
				<dl class='bitem'>
					<dt onclick='showHide("items1_1")'><b>首页管理</b></dt>
					<dd style='display:block' class='sitem' id='items1_1'>
						<ul class='sitemu'>
							<li><a href='custom_admin.php' target='main'>定制内容</a></li>
							<li><a href='advert_admin.php?do=list&type=index' target='main'>首页广告</a></li>
							<li><a href='makehtml_index.php' target='main'>预览更新</a></li>
						</ul>
					</dd>
				</dl>
				<dl class='bitem'>
					<dt onclick='showHide("items2_1")'><b>广告管理</b></dt>
					<dd style='display:block' class='sitem' id='items2_1'>
						<ul class='sitemu'>
							<li><a href='advert_admin.php?do=list' target='main'>广告列表</a></li>
							<li><a href='advert_admin.php?do=add' target='main'>新增广告</a></li>
						</ul>
					</dd>
				</dl>
				<dl class='bitem'>
					<dt onclick='showHide("items3_1")'><b>文章管理</b></dt>
					<dd style='display:block' class='sitem' id='items3_1'>
						<ul class='sitemu'>
							<li><a href='artcate_admin.php' target='main'>栏目管理</a></li>
							<li><a href='article_admin.php?do=main' target='main'>文章列表</a></li>
							<li><a href='article_admin.php?do=add' target='main'>添加文章</a></li>
						</ul>
					</dd>
				</dl>
				<dl class='bitem'>
					<dt onclick='showHide("items4_1")'><b>物流信息</b></dt>
					<dd style='display:block' class='sitem' id='items4_1'>
						<ul class='sitemu'>
							<li><a href='wlxx_admin.php' target='main'>信息查询</a></li>
							<li><a href='wlxx_admin.php?do=add' target='main'>新增信息</a></li>
						</ul>
					</dd>
				</dl>
				<dl class='bitem'>
					<dt onclick='showHide("items4_1")'><b>产品管理</b></dt>
					<dd style='display:block' class='sitem' id='items4_1'>
						<ul class='sitemu'>
							<li><a href='prodcate_admin.php' target='main'>产品类目</a></li>
							<li><a href='prodcate_admin.php' target='main'>类目属性</a></li>
							<li><a href='product_admin.php' target='main'>产品列表</a></li>
							<li><a href='product_admin.php?do=add' target='main'>新增产品</a></li>
							<li><a href='brand_admin.php' target='main'>美妆品牌</a></li>
							<li><a href='mproduct_admin.php' target='main'>美妆列表</a></li>
							<li><a href='mproduct_admin.php?do=add' target='main'>新增美妆</a></li>
						</ul>
					</dd>
				</dl>
				<dl class='bitem'>
					<dt onclick='showHide("items5_1")'><b>相册管理</b></dt>
					<dd style='display:block' class='sitem' id='items5_1'>
						<ul class='sitemu'>
							<li><a href='album_admin.php?do=main&type=chuzu' target='main'>相册列表</a></li>
							<li><a href='photo_admin.php?do=main&type=chushou' target='main'>图片列表</a></li>
						</ul>
					</dd>
				</dl>
				<dl class='bitem'>
					<dt onclick='showHide("items7_1")'><b>会员管理</b></dt>
					<dd style='display:block' class='sitem' id='items7_1'>
						<ul class='sitemu'>
							<li><a href='user_admin.php?do=main' target='main'>后台用户</a></li>
							<li><a href='userinfo_admin.php?do=main' target='main'>商户信息</a></li>
						</ul>
					</dd>
				</dl>
				<!-- 菜单结束 -->
			</div>
		</td>
	</tr>
	<tr>
		<td width='26'></td>
		<td width='160' valign='top'><img src='img/idnbgfoot.gif' /></td>
	</tr>
</table>

</body>
</html>