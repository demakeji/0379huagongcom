/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	//界面语言
	config.language = 'zh-Cn';
	
	//编辑器皮肤
	config.skin 	= 'office2003';
	
	//编辑器字体全屏显示					
	config.fullPage = false,

	//设置宽高
	config.width	= 800;
	config.height   = 200;

	//背景颜色														无效
	config.uiColor	= '#CCF';

	//工具栏(基础Basic、全能Full、自定义的toolbar_Full)
	//config.toolbar	= 'Basic';
	//config.toolbar	= 'Full';
	//自定义工具栏
	config.toolbar_Full = [
		['Source','-','Save','NewPate','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print','SpellChecker','Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		['Form','Checkbox','Radio','TextField','Textarea','Select','Button','ImageButton','HiddenField'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Link','Unlink','Anchor'],
		['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		'/',
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor']
	];
	
	//工具栏是否可以被收缩
	config.toolbarCanCollapse = false;

	//工具栏的位置 top bottom
	config.toolbarLocation = 'top';

	//工具栏默认是否展开
	config.toolbarStartupExpanded = true;

	//拖拽改变大小
	config.resize_enabled = true;

	//改变大小的最大宽度和高度
	config.resize_maxWidth = 2000;
	config.resize_maxHeight= 500;
	
	//改变大小的最小宽度和高度
	config.resize_minWidth = 750;
	config.resize_minHeight= 200;

	//提交含有编辑器的表单时，是否更新元素内的数据
	config.autoUpdateElement = true;

	//设置是使用绝对还是相对目录,为空为相对目录
	config.baseHref = '';

	//编辑器的z-index值
	config.baseFloatZIndex = 10000;

	//快捷键设置
	config.keystrokes = [
		[ CKEDITOR.ALT		+ 121 /*F10*/, 'toolbarFocus' ],		//获取焦点
		[ CKEDITOR.ALT		+ 122 /*F11*/, 'elementsPathFocus'],	//元素焦点
		[ CKEDITOR.SHIFT	+ 121 /*F10*/, 'contextMenu'],			//文本菜单
		[ CKEDITOR.CTRL		+ 90  /*Z*/,   'undo'],					//撤销
		[ CKEDITOR.CTRL		+ 89  /*Y*/,   'redo'],					//重做
		[ CKEDITOR.CTRL + CKEDITOR.SHIFT + 90 /*Z*/,'redo'],		//				无效
		[ CKEDITOR.CTRL		+ 76  /*L*/,   'link'],					//链接
		[ CKEDITOR.CTRL		+ 66  /*B*/,   'bold'],					//粗体
		[ CKEDITOR.CTRL		+ 73  /*I*/,   'italic'],				//斜体
		[ CKEDITOR.CTRL		+ 85  /*U*/,   'underline'],			//下划线
		[ CKEDITOR.ALT		+ 109 /*-*/,   'toolbarCollapse']		//				控制工具条收缩    无效
	];

	//回车换行使用的标签设定 1 p | 0 div | 2 br
	config.enterMode = 2 ;
	config.shiftEnterMode = 1 ;

	//设置快捷键锁定
	config.blockedKeystrokes = [
		CKEDITOR.CTRL + 66 /*B*/,CKEDITOR.CTRL + 73 /*I*/,CKEDITOR.CTRL + 85 /*U*/
	];

	//设置编辑内元素的背景色的取值
	//config.colorButton_backStyle = {
	//	element : 'span',
	//	styles:	  {'background-color' : '#F00'}
	//};
	
	//字体编辑时的字符集
	config.font_names = '宋体;楷体_GB2312;黑体;隶书;幼圆;Arial;Times New Roman;Verdana';
	
	//默认使用的字符集
	//config.font_defaultLabel = '宋体';
	
	//设置字体大小时使用的式样
	config.fontSize_style = {
		element : 'span',
		styles	: {'font-size' : '#(size)'},
		overrides:[{element : 'font', attributes : {'face' : null}}]
	};
	
	//字体编辑时可选的字体大小
	config.fontSize_sizes = '8/8px;10/10px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px';
	
	//默认使用的字符集
	//config.fontSize_defaultLabel = '12';
	
	//编辑器上传组件的文件上传路径
	config.filebrowserImageUploadUrl = '/websrc/include/ckeditor/plugins/upload/upload.php';
};

/*
	customConfig:'../config.js',
	autoUpdateElement:true,
	baseHref:'',
	contentsCss:'../contents.css',
	contentsLangDirection:'ui',
	contentsLanguage:'',
	language:'',
	defaultLanguage:'en',
	enterMode:1,
	forceEnterMode:false,
	shiftEnterMode:2,
	corePlugins:'',
	docType:'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">',
	bodyId:'',
	bodyClass:'',
	fullPage:false,
	height:200,
	plugins:'about,a11yhelp,basicstyles,bidi,blockquote,button,clipboard,colorbutton,colordialog,contextmenu,dialogadvtab,div,elementspath,enterkey,entities,filebrowser,find,flash,font,format,forms,horizontalrule,htmldataprocessor,image,indent,justify,keystrokes,link,list,liststyle,maximize,newpage,pagebreak,pastefromword,pastetext,popup,preview,print,removeformat,resize,save,scayt,smiley,showblocks,showborders,sourcearea,stylescombo,table,tabletools,specialchar,tab,templates,toolbar,undo,wysiwygarea,wsc',
	extraPlugins:'',
	removePlugins:'',
	protectedSource:[],
	tabIndex:0,
	theme:'default',
	skin:'kama',
	width:'',
	baseFloatZIndex:10000
*/