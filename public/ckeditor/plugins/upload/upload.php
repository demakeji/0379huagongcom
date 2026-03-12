<?php
/**
 * CKEditor编辑器上传插件
 */
header('Content-Type:text/html; charset=utf-8');
header('P3P:CP="ALL ADM DEV PSAi COM OUR OTRo STP IND ONL"');
session_start();
require_once("../../../class.upload.php");					//加载文件上传类

$CKEditorFuncNum = trim($_GET['CKEditorFuncNum']) ? trim($_GET['CKEditorFuncNum']) : 1;

if ( !isset($_FILES['upload']) || empty($_FILES['upload'])) {
	$msg = "您还没有选择需要上传的图片，或图片超出大小限制!";
	echo SendResults($CKEditorFuncNum,'',$msg);
	exit;
}
$fileup = new FileUpload();							//新建文件上传对象
$fileup->inputname = 'upload';
$fileup->file_tmpdir = '/tmp/';						//上传到的临时文件夹
$fileup->file_updir = '../../../../../pic/';		//根目录下pic文件夹
$fileup->file_savepath = date('Ymd');
$fileup->allowmime = array('image');				//允许图片类型的mime
$fileup->allowtype = array('jpg','gif','png');		//允许jpg、gif和png格式的图片
$fileup->file_savename = 'auto';					//不保留原名称
$fileup->file_overwrite = true;						//覆盖文件
$fileup->file_maxsize = 10 * 1024 * 1024;			//最大允许上传10兆的图片
$fileup->img_ext = '';								//保留原扩展名
$fileup->img_thumb = false;							//生成缩略图
$fileup->img_alter = true;							//允许对图片容量进行控制
$fileup->img_alter_width = 600;
$fileup->img_alter_height= 480;
$fileup->img_alter_step  = 100;
$fileup->img_altersize = 200 * 1024;				//生成图片的最大容量为200kb

$fileup->UpFile();
$returninfo	  = $fileup->returninfo;
$sErrorNumber = $returninfo['error'];
$sFileUrl	  = '/pic/'.date('Ymd').'/'. $returninfo['savename'];
$sFielName	  = $returninfo['savename'];
$sCustomMsg	  = '';


if($returninfo['error'] != 0){
	$sCustomMsg = $fileup->errorlist[$returninfo['error']];
	$sFileUrl = "";
	echo SendResults( $CKEditorFuncNum, $sFileUrl, $sCustomMsg );
	exit;
}

echo SendResults( $CKEditorFuncNum, $sFileUrl, $sCustomMsg );
exit;

/********************************************************/
function SendResults( $ckEditorFuncNum, $fileUrl = '', $sCustomMsg = '' )
{
	$str  = "";
	$str .= "<script type='text/javascript'>";
	$str .= "window.parent.CKEDITOR.tools.callFunction('".$ckEditorFuncNum."','".$fileUrl."','".$sCustomMsg."');";
	$str .= "</script>";
	return $str;
}
?>