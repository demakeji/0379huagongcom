//--tab
// article
function showArti(num) 
{for(var id = 0;id<=2;id++) 
{var fpid="focusArti"+id; 
if(id==num){ 
try{document.getElementById(fpid).style.display="block"}catch(e){}; 
}else{ 
try{document.getElementById(fpid).style.display="none"}catch(e){};}}}

// video
function showVideo(num) 
{for(var id = 0;id<=2;id++) 
{var fpid="focusVideo"+id; 
if(id==num){ 
try{document.getElementById(fpid).style.display="block"}catch(e){}; 
}else{ 
try{document.getElementById(fpid).style.display="none"}catch(e){};}}}

// ownerbbs
function showOwnerBbs(num) 
{for(var id = 0;id<=2;id++) 
{var fpid="focusOwnerBbs"+id; 
if(id==num){ 
try{document.getElementById(fpid).style.display="block"}catch(e){}; 
}else{ 
try{document.getElementById(fpid).style.display="none"}catch(e){};}}}

//--index
function addFavorite(title,url){
	title=title?title:document.getElementsByTagName('title')[0].text;;
	url=url?url:window.location.href;
	try{
		window.external.addFavorite(url,title);
	}catch(e){
		try{
			window.sidebar.addPanel(title,url,'');
		}catch(e){
			alert('您的浏览器不支持或不允许此操作，请按"Ctrl+D"或手动加入收藏。');
		}
	}
}

function setHome(url){
	url=url?url:window.location.href;
	try{
		document.body.style.behavior='url(#default#homepage)';
		document.body.setHomePage(url);
	}catch(e){
		if(window.netscape){
			try{
				netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
			}catch(e){
				alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将[signed.applets.codebase_principal_support]设置为'true'");
			}
			var prefs=Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
			prefs.setCharPref('browser.startup.homepage',url);
		}else{
			alert('您的浏览器不支持或不允许此操作，请您手动设置首页。');
		}
	}
}

//--imgload
function Noimg(obj){
	obj.src='/images/no_pic.jpg';
}
function AbbrImg(obj,w,h){
	wr=obj.width/w;hr=obj.height/h;
	if(wr>1&&wr>=hr) obj.width=w;
	if(hr>1&&hr>wr) obj.height=h;
}


function checkSearch(){
	var area=$("#AreaCode").val();
	var price=$("#SalePriceRange").val();
    var key=$.trim(($("#EstateName").val()).replace('请输入楼盘名称',''));
	var url="/loupan/search/0-"+area+"-"+price+"-1.html";
	if( key ){
		url+="?key="+key;
	}
	$("#EstateName").val(key);
    $("#searchform").attr("action",url);
}

function quickSearch(){
	var area=$("#AreaCode2").val();
	var price=$("#SalePriceRange2").val();
	var url="/loupan/search/0-"+area+"-"+price+"-1.html";
    $("#quicksearch").attr("action",url);
	$("#quicksearch").submit();
}

$(function(){
	$(".main-news .pic-slides ul").cycle({
		fx:'scrollLeft',
		timeout:'5000',
		speed:'300',
		pause: 1,
        pager:'#slideNav'			
	});
	$(".quick_query .pic-slides ul").cycle({
		fx:'scrollRight',
		timeout:'5000',
		speed:'300',
		pause: 1,
        pager:'#ZhiNanNav'			
	});
	var keyval=$("#EstateName").val();
	function checEstateName(){	
		if( $("#EstateName").val().replace(/[^\x00-\xff]/g,"rr").length>40 ){
			$("#EstateName").val(keyval);
			return false; 
		}else{
			keyval=$("#EstateName").val();
			return true;
		}
	}
	$('#EstateName').bind({
		'focus':function(){
			var key=$.trim(($("#EstateName").val()).replace('请输入楼盘名称',''));
			$('#EstateName').val(key).css('color','#b02');
		},
		'blur':function(){
			var key=$.trim(($("#EstateName").val()).replace('请输入楼盘名称',''));
			if( key=='' ){
				$("#EstateName").val('请输入楼盘名称').css('color','#666');
			}
		},
		"keydown":checEstateName,
		"keyup":checEstateName
	});
	$("#container img").bind({
		'error':function(){
			this.src='/images/no_pic.jpg';
		}
	});
	$(".hot-bbs li, #focusOwnerBbs1 ul li").each(function(i){
		if( (i+1)%5==1 ){
			$(this).css('font-weight','bold');
		}else{
			$(this).children('strong').css('font-weight','normal');
		}
	});
	
	var showcode1 = '<div style="padding:5px 5px 0;">';
	showcode1 += '<embed src="http://biz.lyd.com.cn/2013/images/20121211_hdlz.swf" width="950" height="60" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" >';
	showcode1 += '</div>';
	$("#main-menu").after('<div id="show_index_a1" class="page-wrap" >'+showcode1+'</div>');
	
	
	var showcode3 = '<div style="padding:10px 5px 0;">';
	showcode3 += '<a href="link.php?url=http://www.rkph.com.cn/" target="_blank" ><img src="http://biz.lyd.com.cn/2013/images/20130106_ljdc.gif" width="950" height="60" border="0" alt="恒大绿洲" title="恒大绿洲" /></a>';
	showcode3 += '</div>';
	$(".new-building").before('<div id="show_index_a3" class="page-wrap" >'+showcode3+'</div>');
	
	$(function(){
		var html = 'body{background:url(/images/newyear_bg.jpg) center 0 no-repeat; padding-top:164px;}';
		html = '<style type="text/css">'+html+'</style>';
		$("#topbar").before(html);
	});
	
});
	
	
