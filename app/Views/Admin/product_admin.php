<html>
<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<title>管理员后台--洛阳崟生化工有限公司</title>
<link href='/img/base.css' rel='stylesheet' type='text/css'>
</head>
<body background='/img/allbg.gif' leftmargin='8' topmargin='8'>
<script src="/js/ajax.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/j.js"></script>
<style type="text/css">
.tb tr{height:36px;}
.container{margin-left:20px;}
.red{color:red;}
.tip{color:#555;}
</style>
<script type="text/javascript">
function ok(ref){
	$(".prodcate").each(function(){$(this).remove()});
	$.ajax({
		type: "post",
		data: "do=ajax&Cid="+ref,
		datatype: "json",
		url: "product_admin.php",
		success: function (msg){
			msg=eval(msg);
			$("#prodcate2").val(msg.length);
			$("#prodcate3").val('pro3');
			for(var i=msg.length-1;i>=0;i--){
				var txt0="<tr class='prodcate'><td align='right'><strong>"+msg[i].CAname+"：</strong></td><td><input type='text' name='prodcate["+msg[i].CAid+"]' id='prodcate10' size='36' value='' maxlength='24' /><span class='tip'> 长度在20个字以内</span></td></tr>";
				$("#prodcatesele").after(txt0);
			}
		}
	});
}
</script>
<div class="container">
	<!-- 添加或编辑内容 -->
	<?php if ($do == 'add'|| $do == 'edit'): ?>
	<script type="text/javascript">
	
	function checkform(){
		
		return true;
	}
	</script>
	<!-- 在表单上方添加错误提示 -->
	<?php if (session()->has('errors')) : ?>
		<div style="color: red; margin-bottom: 10px;">
			<?php foreach (session('errors') as $error) : ?>
				<p><?= $error ?></p>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	<script type="text/javascript" charset="utf-8" src="ckeditor/ckeditor.js"></script>
    <form 
  	action="<?= site_url($do === 'edit' ? 'admin/product_admin/update' : 'admin/product_admin/store') ?>" 
  	method="post" 
  	enctype="multipart/form-data" 
  	name="form1" 
  	id="form1" 
  	onSubmit="return checkform()"
	>
    	<table width="96%" cellspacing="0" cellpadding="0" class="tb">
    		<tr>
    			<td align="right"><strong><a href="product_admin.php?do=main">返回列表&gt;&gt;</a></strong></td>
    			<td>&nbsp;</td>
    		</tr>
			<tr>
    			<td align="right">&nbsp;</td>
    			<td><label>----基础信息-----------------</label></td>
    		</tr>
			<tr id="prodcatesele">
				<td align="right"><span class="red"> * </span><strong>产品类目：</strong></td>
				<td>
					<select name="Cid" id="Cid" onChange="ok(this.value)" >
					<option value="0">--请选择类目--</option>
					<?php 
					// 容错处理：确保 $prodcatelist 是数组，避免遍历非数组报错
					if (is_array($prodcatelist) && !empty($prodcatelist)):
						// 遍历类目列表
						foreach ($prodcatelist as $tp):
							// 容错：确保 $tp 包含 Cid/Cname，$one 是数组且包含 Cid
							$tpCid = isset($tp['Cid']) ? $tp['Cid'] : '';
							$tpCname = isset($tp['Cname']) ? $tp['Cname'] : '';
							$oneCid = is_array($one) && isset($one['Cid']) ? $one['Cid'] : '';
							
							// 核心：判断当前类目是否是产品所属类目，若是则添加 selected 属性
							$selected = ($tpCid == $oneCid) ? 'selected' : '';
					?>
						<option value="<?= $tpCid ?>" <?= $selected ?>><?= $tpCname ?></option>
					<?php 
						endforeach;
					else:
						// 无类目数据时的提示
					?>
						<option value="">暂无类目</option>
					<?php endif; ?>
					</select>
					<span class="tip"></span>
				</td>
				<td rowspan="4">
					<!-- 优化图片路径的容错处理 -->
					<img alt="产品图片" src="<?= (is_array($one) && isset($one['image']) && !empty($one['image'])) ? $one['image'] : '' ?> " width="200" height="200">
				</td>
			</tr>
    		<!-- <?php if (empty($cateattr)): ?>
    		{{foreach key=tk item=ca from=$cateattr}}
    		<tr class="prodcate">
    			<td align="right"><strong>{{$ca.CAname}}：</strong></td>
    			<td>
    				<input type="text" name="prodcate[{{$ca.CAid}}]" id="prodcate{{$ca.CAid}}" size="36" value="{{$ca.PAvalue}}" maxlength="24" />
					<span class="tip">长度在20个字以内</span>
    			</td>
    		</tr>
    		{{/foreach}}
    		<?php endif ?> -->
    		<tr>
    			<td align="right"><span class="red"> * </span><strong>产品标题：</strong></td>
    			<td>
    				<input type="text" name="title" id="title" size="36" value="<?= empty($one['title']) ? '' : $one['title'] ?>" maxlength="24" />
					<span class="tip">长度在20个字以内</span>
    			</td>
    		</tr>
    		<tr>
    			<td align="right"><strong>图片路径：</strong></td>
    			<td>
					<input type="text" name="image" id="image" size="40" value="<?= empty($one['image']) ? '' : $one['image'] ?>" maxlength="120" />
					<span class="tip">图片路径优先于新传图片</span>
    			</td>
    		</tr>
    		<tr class="upimage" >
    			<td align="right" ><strong>　图片：</strong></td>
    			<td>
    				<iframe src="uploadimage.php?type=hproduct&path=<?= empty($upimgpath) ? '' : $upimgpath ?>" frameborder="0" scrolling="no" width="680" height="120" ></iframe>
    			</td>
    		</tr>
    		<tr>
    			<td align="right"><strong>产品含量：</strong></td>
    			<td>
    				<input type="text" name="hanliang" id="Price" size="16" value="<?= empty($one['hanliang']) ? '' : $one['hanliang'] ?>" maxlength="15" />
					<span class="tip">填写数字，如3666.00</span>
    			</td>
    		</tr>
    		<tr>
    			<td align="right"><strong>产品规格：</strong></td>
    			<td>
    				<input type="text" name="guige" id="Price" size="16" value="<?= empty($one['guige']) ? '' : $one['guige'] ?>" maxlength="15" />
					<span class="tip">填写数字，如3666.00</span>
    			</td>
    		</tr>
    		<tr>
    			<td align="right"><strong>产品单价：</strong></td>
    			<td>
    				<input type="text" name="price" id="Price" size="16" value="<?= empty($one['price']) ? '' : $one['price'] ?>" maxlength="15" />
					<span class="tip">填写数字，如3666.00</span>
    			</td>
    		</tr>
    		<!--<tr>
    			<td align="right"><strong>产品单位：</strong></td>
    			<td>
    				<input type="text" name="Punit" id="Punit" size="16" value="{{$one.Punit}}" maxlength="15" />
					<span class="tip">填写数字，如“吨”</span>
    			</td>
    		</tr>
    		--><!--<tr>
    			<td align="right"><strong>有效日期：</strong></td>
    			<td>
    				<input type="text" name="Pdate" id="Pdate" size="16" value="{{$one.Pdate}}" maxlength="10" />
					<span class="tip">如：2012-12-21</span>
    			</td>
    		</tr>
			--><!--<tr>
    			<td align="right"><strong>最小起订数：</strong></td>
    			<td>
    				<input type="text" name="Pleast" id="Pleast" size="16" value="{{$one.Pleast}}" maxlength="15" />
					<span class="tip">填写数字，如2.1，可用(建筑面积/占地面积)计算</span>
    			</td>
    		</tr>
			--><!--<tr>
    			<td align="right"><strong>最大供货量：</strong></td>
    			<td>
    				<input type="text" name="Pgross" id="Pgross" size="16" value="{{$one.Pgross}}" maxlength="15" />
					<span class="tip">填写百分比数字格式，如0.33代表33%，一般不低于0.30</span>
    			</td>
    		</tr>
			--><tr>
    			<td align="right"><strong>产地：</strong></td>
    			<td>
    				<input type="text" name="chandi" id="PsendArea" size="60" value="<?= empty($one['chandi']) ? '' : $one['chandi'] ?>" maxlength="60" />
					<span class="tip">长度在50个字以内</span>
    			</td>
    		</tr>
			<!--<tr>
    			<td align="right"><strong>发货间隔天数：</strong></td>
    			<td>
    				<input type="text" name="PsendDate" id="PsendDate" size="16" value="{{$one.PsendDate}}" maxlength="15" />
					<span class="tip">填写数字，如700</span>
    			</td>
    		</tr>
    		-->
			<tr>
    			<td align="right"><strong>产品详细介绍：</strong></td>
    			<td>
					<textarea name="Pcontent" id="Pcontent" cols="80" rows="8" style="margin-bottom:10px" ><?= empty($one['content']) ? '' : $one['content'] ?></textarea><br />
					<script>
					//<![CDATA[
					var ck=CKEDITOR.replace( 'Pcontent',{
						skin:'office2003',
						width:500,
						height:120,
						toolbar:[
							['Source','SelectAll','RemoveFormat','-','NumberedList','BulletedList','-','Outdent','Indent','-','Image','Table','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
							'/',
							['Font','FontSize','-','TextColor','BGColor','-','Bold','Italic','Underline']
						],
						filebrowserImageUploadUrl:'/websrc/include/ckeditor.upload.php'
					});
					//]]>
					</script>
    			</td>
    		</tr>
    		<!--
				<td align="right"><strong>产品状态：</strong></td>
    			<td>
					<input name="IsTop" type="checkbox" value="1" {{if $one.IsTop}}checked{{/if}}><strong>是否推荐：</strong>
					<input name="IsHide" type="checkbox" value="1" {{if $one.IsHide}}checked{{/if}}><strong>是否隐藏：</strong>
				</td>-->
    		<tr>
    			<td></td>
    			<td>
					<br />
    				<input type="hidden" name="Hpid" value="<?= empty($one['Hpid']) ? '' : $one['Hpid'] ?>" />
    				<input type="hidden" name="do" value="save" />
					<input type="hidden" name="page" value="{{$page}}" />
    				<input type="submit" value=" 提 交 " />
    			</td>
    		</tr>
			<tr></tr>

    	</table>
    </form>
	<!-- 内容列表 -->
    <?php else: ?>
	<style type="text/css">
	.rb{ border-right:1px solid #666666 }
	.tb{ border-top:1px solid #666666 }
	a.cancel{color:#ff6633}
	a.start{color:#22ff00}
	a:hover{text-decoration:underline;}
	</style>
	<script type="text/javascript">
	function goList(){
		var area=$("#area").val();
		location.href="?do=main&orderby={{$orderby}}&area="+area;
		return true;
	}
	function showhidetip(id){
		var title=$("#title"+id).text();
		if(confirm("确定要对产品"+id+":\""+title+"\"操作吗?")){
			return true;
		}else{
			return false;
		}
	}
	</script>
	<table width="98%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#D1DDAA">
	  <tr>
	  	<td height="28" colspan="20" background="/img/tbg.gif">
		   <table width="99%" border="0" cellspacing="0" cellpadding="0">
		     <tr>
		       <td width="29%">&nbsp;<strong>产品列表</strong>
			   <select name="area" id="area" onChange="goList()" >
			    <option value="" >产品类目</option>
			   {{foreach key=tk item=tp from=$prodcatelist}}
					<option value="{{$tp.Cid}}" {{if $tp.Cid==$Cid}}selected{{/if}} >{{$tp.Cname}}</option>
				{{/foreach}}
			   </select>
			   </td>
		       <td width="71%" align="right">
		          <a href="product_create" >新增产品</a>
		       </td>
		     </tr>
		   </table>
		</td>
	  </tr>
	  <tr bgcolor="#FEFCEF" height="26" align="center">
	    <td width="4%"><a href="?do=main&area={{$area}}&page=1&orderby=3" title="点击按序号排序" >序号</a></td>
		<td width="4%">产品标题</td>
		<td width="4%">含量</td>
		<td width="4%">规格</td>
		<td width="4%">产品价格(元)</td>
		<td width="4%">库存(吨)</td>
		<!--<td width="5%">有效日期</td>
		<td width="4%">最小起订量</td>
		<td width="4%">最大供货量</td>
		<td width="4%">发货地点</td>
		<td width="4%">发货间隔天数</td>
		<td width="4%">产品详细介绍</td>
		<td width="2%">是否推荐</td>
		<td width="2%">是否隐藏</td>
		-->
		<td width="5%">发布时间</td>
		<td width="5%">更新时间</td>
	    <td width="6%">操作</td>
	  </tr> 
	  <?php foreach ($result as $gg): ?>
	  <tr height="26" align="center" bgcolor="#FFFFFF" onMouseMove="javascript:this.bgColor='#EDF7D0';"
	 	 			onMouseOut="javascript:this.bgColor='#FFFFFF';">
		<td><?= $gg['Hpid']?></td>
		<td id="title<?= esc($gg['Hpid']) ?>" ><?= esc($gg['title']) ?></td>
		<td><input name="hanliang" type="text" value="<?= esc($gg['hanliang'])?>" size="10"></td>
		<td><input name="guige" type="text" value="<?= esc($gg['guige']) ?>" size="10"></td>
		<td><input name="price" type="text" value="<?= esc($gg['price']) ?>" size="10"></td>
		<td><input name="kucun" type="text" value="库存" size="10"></td>
		<!--<td>{{if $gg.Pdate!=0}}{{$gg.Pdate|date_format:"%Y-%m-%d"}}{{else}}{{/if}}</td>
		<td>{{$gg.Pleast}}</td>
		<td>{{$gg.Pgross}}</td>
		<td>{{$gg.PsendArea}}</td>
		<td>{{$gg.PsendDate}}</td>
		<td>{{$gg.Pcontent}}</td>
		<td>{{$gg.IsTop}}</td>
		<td>{{if $gg.IsHide}}<font color="#b2b">隐藏</font>{{/if}}</td>
		-->
		<td><?= esc($gg['Ptime']) ?></td>
		<td><?= esc($gg['Utime']) ?></td>
		<td align="center">
			<a href="product_edit/<?= esc($gg['Hpid']) ?>">编辑</a>&nbsp|&nbsp;
			<a href="product_admin?do=del&Hpid=<?= esc($gg['Hpid']) ?>" onClick="return showhidetip(<?= esc($gg['Hpid']) ?>" >删除</a>
		</td>
	  </tr>
	  <?php endforeach ?>
	  <?php if ($pager->getPageCount('products') > 1): ?>
	  <tr bgcolor="#F1FDE3"> 
		<td height="36" colspan="9" align="center">
			<div class="pagelistbox">
				<span>当前第 <font color="FF6600"><?= $pager->getCurrentPage('products')?></font> 页,共 <?= $pager->getPageCount('products') ?> 页/ <?= $pager->getTotal('products') ?> 条记录</span>	
				<?php if ($pager->getCurrentPage('products')>1): ?>
					<?php if ($pager->getCurrentPage('products')>1): ?>
				<a class='indexPage' href='<?= $pager->getPageURI($pager->getFirstPage('products'), 'products') ?>'>首页</a>
					<?php endif ?>		
				<a class='prevPage' href='<?= $pager->getPreviousPageURI('products') ?>'>上页</a>
				<?php endif ?>
				<?php if ($pager->getCurrentPage('products') < $pager->getPageCount('products')): ?>
				<a class='nextPage' href='<?= $pager->getNextPageURI('products') ?>'>下页</a> 
					<?php if ($pager->getPageCount('products')>2): ?>
				<a class='endPage' href='<?= $pager->getPageURI($pager->getLastPage('products')) ?>'>末页</a>
					<?php endif ?>
				<?php endif ?>
				<span>
					跳转至<input type="text" id="page_select" name="page_select" value="<?= $pager->getCurrentPage('product')?>" size="4" style="width:30px;height:18px;" />
					&nbsp;<input type="button" value="GO" size="10" onClick="gopage()" style="padding:2px 10px;" />
				</span>
				<script>
					function gopage(){				
						var page=document.getElementById('page_select').value;				
						location.href="?{{if $pageurl}}{{$pageurl}}{{else}}do=main&area={{$area}}{{/if}}&orderby={{$orderby}}&page="+page;
					}
				</script>			
			</div> 
		</td>
	  </tr>
	  <?php endif ?>
	</table>
    <?php endif ?>
</div>