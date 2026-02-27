
//--top
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

//--search
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
    return true;
}

$(function(){
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
	$("#container img,#house-container img").bind({
		'error':function(){
			this.src='/images/no_pic.jpg';
		}
	});
});
	
	
