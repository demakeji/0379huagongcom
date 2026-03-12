<?php
/**
 * 文件上传类 FileUpload	属公共组件，可通用
 *
 * @author      fuyuanming
 * @copyright   2012
 * @date		2012-12-24
 * @email		fymxc1986@126.com
 *
 *
 */
class FileUpload{
	/* 表单控件名 */
	var $inputname = '';
	/* 默认允许上传的文件MIME类型 */
	var $allowmime = array('text', 'image', 'audio', 'video', 'applications');
	/* 默认允许上传的文件扩展名 级别低于MIME过滤
	 * 若要上传rar,zip须设定MIME允许applications类型*/
	var $allowtype = array('mp3','wma','rar','zip','txt','doc','pdf','bmp','gif','jpg','png');
	/* 允许上传的单文件容量，单位byte，默认10Mb */
	var $file_maxsize = 10485760;
	/* 文件暂存目录，相对或绝对路径 */
	var $file_tmpdir = './tmp/';
	/* 文件存储主目录，置空时存入暂存目录 */
	var $file_updir = './upload/';
	/* 文件分组存储路径，默认按MIME+月份，如'image/201212/25/' */
	var $file_savepath = '';
	/* 文件存储名称，不含扩展名，
	 * 默认'auto'为时间+随机数，'old'为原名称，
	 * 或自定义固定名称  */
	var $file_savename = 'auto';
	/* 是否允许同名文件覆盖 */
	var $file_overwrite = true;

	/* 图片文件存储时默认扩展名jpg，
	 * 设置空为保持原扩展名 */
	var $img_ext = 'jpg';
	/* 图片调整容量开关、大小控制 */
	var $img_alter = true;
	var $img_altersize = 512000;//500K默认
	/* 图片调整长宽、步长控制 */
	var $img_alter_width = 1000;
	var $img_alter_height = 800;
	var $img_alter_step = 100;
	/* 图片文件默认压缩选项 */
	var $img_thumb = true;
	/* 图片压缩默认前缀、宽度、高度 */
	var $thumb_prefix = 'thumb_';
	var $thumb_width = 100;
	var $thumb_height = 100;
	/* 是否进行等比例压缩 */
	var $thumb_equalratio = true;

	var $upfilenum = 0;
	var $upfilelist = array();
	var $returninfo = array();
	var $error = array();
	/* 临时存储单个上传文件的信息数组 */
	var $fileinfo = array();

	var $errorlist = array(
		0	=>	'文件上传成功',
		1	=>	'上传的文件大小超出了php.ini中upload_max_filesize的限制',
        2	=>	'上传的文件大小超出了HTML表单的MAX_FILE_SIZE限制',
		3	=>	'上传的文件只有部分被上传',
		4	=>	'没有文件被上传',
		5	=>	'服务器临时文件夹丢失',
		6	=>	'缺少一个临时文件夹',
		7	=>	'无法写入文件到磁盘',
		8	=>	'文件上传被扩展拦截',
		10	=>	'设定的表单控件名称$inputname不可用',
		11	=>	'您上传的文件格式不在允许范围内',
		12	=>	'目录不可写',
		13	=>	'存在同名的文件',
		14	=>	'您上传的文件大小超过单个文件上传限制',
		15	=>	'删除临时文件失败',
		16	=>	'您的php版本不支持对GIF格式进行缩放',
		17	=>	'您的php版本不支持对JPEG格式进行缩放',
		18	=>	'您的php版本不支持图片缩放',
		19	=>	'您上传的文件已经损坏!',
		20	=>	'尝试创建新文件时发生了错误',
		21	=>	'尝试创建缩略图时发生了错误',
		22	=>	'保存缩略图时发生错误，请确认存储文件夹的读写权限',
		101	=>	'您尚未设定表单控件名称$inputname',
		102	=>	'您尚未设定文件保存名称$file_savename, auto为时间戳，old为保留原文件名，其它为自定义',
		103	=>	'您上传的文件MIME类型不在允许范围内',
		104	=>	'暂不支持对此种格式图片进行缩放',
		105	=>	'您上传的图片文件可能已经损坏，无法进行缩放',
		106	=>	'无法读取上传的图片文件宽高，缩放失败'
	);
	/* --------------------------------------------------------------------- */

	/* 构造函数 */
	function __construct(){
		date_default_timezone_set('PRC');//设置时区
		$this->file_savepath = 'image/'.date('Ym/d/');//默认传图
	}

	/* 检测配置 */
	function CheckConf(){
		if(empty($this->inputname)){
			$this->showmsg(101);
		}else if(!isset($_FILES[$this->inputname])){
			$this->showmsg(10);
		}else if(empty($_FILES[$this->inputname])){
			$this->showmsg(4);
		}else{
			if(trim($this->file_savename)==''){
				$this->showmsg(102);
			}
			if( $this->file_updir!='' && substr($this->file_updir, -1, 1) != '/' ){
				$this->file_updir .= '/';
			}
			if( substr($this->file_savepath, -1, 1) != '/' ){
				$this->save_path .= '/';
			}
			$tmp_path = $this->file_updir . $this->file_savepath;
			if(!file_exists($tmp_path)){
				$this->MakeDirs($tmp_path);
			}
			if (!is_writable($tmp_path)){
	            $this->showmsg(12);
	        }
			$this->upfilelist = $_FILES[$this->inputname];
			$this->upfilenum = count($this->upfilelist['name']);
		}
	}

	/* 上传文件 */
	function UpFile(){
		$this->CheckConf();//检查后开始循环上传文件列表
		if(!empty($this->error)){//有设置错则中断
			return false;
		}
		// 单个文件上传，inputname不带[]的BUG修正
		if($this->upfilenum == 1){
			$tmp_filearr = $this->upfilelist;
			foreach($tmp_filearr as $tk=>$tv){
				if(!is_array($tmp_filearr[$tk])){
					$tmp_filearr[$tk] = array();
					$tmp_filearr[$tk][0] = $tv;
				}
			}
			$this->upfilelist = $tmp_filearr;
		}
		for($i = 0; $i < $this->upfilenum; $i++){
			//转储文件信息
			$this->fileinfo['tmp_name']	= $this->upfilelist['tmp_name'][$i];
			$this->fileinfo['name']	 	= $this->upfilelist['name'][$i];
			$this->fileinfo['type']	 	= $this->upfilelist['type'][$i];
			$this->fileinfo['size']	 	= $this->upfilelist['size'][$i];
			$this->fileinfo['error']	= $this->upfilelist['error'][$i];
			$this->fileinfo['ext']	 	= $this->Get_File_ext($this->fileinfo['name']);//扩展名

			//设置存储时的文件名，要判断是否含有特殊字符或汉字
			if($this->file_savename!='auto'){
				if( $this->file_savename=='old' ){//原文件名称
					if( preg_match('/[^a-zA-Z0-9_\-\.]/',$this->fileinfo['name']) ){
						$this->file_savename = 'auto';
					}else{
						$tmp_name = substr($this->fileinfo['name'], 0, strpos($this->fileinfo['name'],'.') );
						$this->fileinfo['savename'] = $tmp_name .'.'. $this->fileinfo['ext'];
					}
				}else{//自定义名称
					if( preg_match('/[^a-zA-Z0-9_\-\.]/',$this->file_savename) ){
						$this->file_savename = 'auto';
					}else{
						$this->fileinfo['savename'] = $this->file_savename .'.'. $this->fileinfo['ext'];
					}
				}
			}
			if($this->file_savename=='auto'){//默认设置
				//先取名称，后加扩展名，图片则用设置的
				$this->fileinfo['savename'] = Date('YmdHis').'_'.str_pad(rand(1,1000),3,'0',STR_PAD_LEFT);
				if( $this->img_ext && strpos($this->fileinfo['type'],'image')!==false ){
					$this->fileinfo['ext'] = $this->img_ext;
				}
				$this->fileinfo['savename'] .= '.'. $this->fileinfo['ext'];
			}

			//设置存储时的文件路径
			$this->fileinfo['realpath'] = $this->file_updir . $this->file_savepath . $this->fileinfo['savename'];

			//检查文件MIME、扩展名及其它必要信息
			$this->CheckFile();
			if($this->fileinfo['error']){//单一文件有错，中断循环
				$this->showmsg($this->fileinfo['error']);
				$this->returninfo[] = $this->fileinfo;
				@unlink($this->fileinfo['tmp_name']);//删除临时文件
				continue;
			}

			//上传文件或图片
			$tmp_flag = copy($this->fileinfo['tmp_name'], $this->fileinfo['realpath'] );
			if(!$tmp_flag){
				$this->fileinfo['error'] = 20;
				$this->showmsg($this->fileinfo['error']);
				$this->returninfo[] = $this->fileinfo;
				@unlink($this->fileinfo['tmp_name']);//删除临时文件
				continue;
			}
			//删除临时文件
			if( file_exists($this->fileinfo['tmp_name']) && !unlink($this->fileinfo['tmp_name']) ){
				$this->fileinfo['error'] = 15;
				$this->showmsg($this->fileinfo['error']);
			}

			//对图片进行调整及压缩，兼容flash流形式上传
			$img_alter_flag = in_array($this->fileinfo['ext'],array('jpg','gif','png','bmp'));
			if( strstr($this->fileinfo['type'],'image') || $img_alter_flag ){
				if($this->img_alter ){
					//尝试根据配置调整图片,仅超出允许容量时
					$tmp_i = 1;
					$tmp_fsize = $this->fileinfo['size'];
					$tmp_width = $this->img_alter_width;
					$tmp_height = $this->img_alter_height;
					$tmp_ratio = $tmp_height/$tmp_width;
					$tmp_step_width = $this->img_alter_step;
					$tmp_step_height = $tmp_ratio * $this->img_alter_step;
					$tmp_count	= ceil($tmp_width/$tmp_step_width);
					while($tmp_i <= $tmp_count && $tmp_fsize > $this->img_altersize ){
						$this->AlterImg($this->fileinfo, $tmp_width, $tmp_height);
						$tmp_fsize = $this->fileinfo['size'] = @filesize($this->fileinfo['realpath']);
						clearstatcache();
						$tmp_width = $tmp_width - $tmp_step_width;
						$tmp_height = $tmp_height - $tmp_step_height;
						$tmp_i++;
					}
				}
				if( $this->img_thumb){
					$oldimg = $this->fileinfo['realpath'];
					$tmp_name = $this->thumb_prefix . $this->fileinfo['savename'];
					$newimg = $this->file_updir . $this->file_savepath . $tmp_name;
					//创建缩略图，名称存入$file['thumbname']
					$thumb_flag = $this->MakeThumbImg($this->fileinfo['ext'], $oldimg, $newimg,
						$this->thumb_width, $this->thumb_height, $this->thumb_equalratio);
					if($thumb_flag>0){
						$this->showmsg($thumb_flag);
						$this->fileinfo['error'] = $thumb_flag;
					}else{
						$this->fileinfo['thumbname'] = $this->thumb_prefix . $this->fileinfo['savename'];
					}
				}
			}
			//设置返回信息
			$this->returninfo[] = $this->fileinfo;
			//置空文件信息
			$this->fileinfo = array();
		}
		//单一上传时的返回信息处理
		if($this->upfilenum == 1){
			$this->returninfo = $this->returninfo[0];
			$this->fileinfo = array();
		}
	}

	/**
	 * 含文件名，文件扩展名的数组信息
	 * array('ext'=>'jpg','realpath'=>'/iamges/1.jpg')
	 * @param array $finfo
	 */
	function AlterImg($finfo,$width,$height){
		return $this->MakeThumbImg($finfo['ext'], $finfo['realpath'], $finfo['realpath'], $width, $height);
	}

	/**
	 * 按给定宽高、路径、类型创建缩略图
	 * @param string $imgext
	 * @param string $oldimg
	 * @param string $newimg
	 * @param int $width
	 * @param int $height
	 * @param bool $equalratio 是否等比缩放
	 */
	function MakeThumbImg($imgext, $oldimg, $newimg, $width, $height, $equalratio = true){
		//据扩展名确定要使用的缩略函数gif,jpeg,png,wbmp
		if($imgext == 'jpg'){ $imgext = 'jpeg'; }
		if($imgext == 'bmp'){ $imgext = 'wbmp'; }
		$MakeFun = "imagecreatefrom". $imgext;
        $SaveFun = "image". $imgext;
       //检查对应函数是否存在
		if ( !function_exists($MakeFun) ){
			return 104;
		}
		//读取原图片长宽信息
		$imageinfo = getimagesize($oldimg);
		$original_width = $imageinfo[0];	//ImageSX($original);
		$original_height = $imageinfo[1];	//ImageSY($original);
		if($original_width==0 || $original_height==0){
			return 106;
		}
		//根据长宽计算内存使用
		if( !$this->HasImageMemory($original_width,$original_height) ){
			$this->fileinfo['error'] = 106;
			$this->showmsg($this->fileinfo['error']);
			return 106;
		}
		//读取原图片，创建IMAGE对象
		$original = $MakeFun($oldimg);
		if (!$original) {
			return 105;
		}
		$this->fileinfo['img_width'] = $original_width;
		$this->fileinfo['img_height'] = $original_height;

		if ($original_height <= $height  && $original_width <= $width){
			//如果原图宽高比较小，则只进行copy
			if( !copy($oldimg, $newimg) ){
				return 22;
			}else{
				return 0;//成功创建缩略图，返回0
			}
		}else{
			/* ------------------------------------------------------------- */
			if($equalratio){//等比例压缩
				//压缩宽度初始化
				$thumb_width = $original_width ;
				$thumb_height = $original_height ;
				$thumb_ratio = $original_width / $original_height;
				//如果原图较大，对宽高判断比较再进行压缩
				if ($thumb_width > $width){// 宽 > 设定宽度
					$thumb_width = $width ;
					$thumb_height = ceil($width / $thumb_ratio);
					if ($thumb_height > $height){
						$thumb_height = $height ;
						$thumb_width = ceil($height * $thumb_ratio);
					}
				}else if ($thumb_height > $height ){//高 > 设定高度
					$thumb_height = $height ;
					$thumb_width = ceil($height * $thumb_ratio);
					if ($thumb_width > $width){
						$thumb_height = ceil($width / $thumb_ratio);
						$thumb_width = $width ;
					}
				}
			}else{//固定宽高
				$thumb_width = $width ;
				$thumb_height = $height ;
			}
			//额外控制
			if ($thumb_width == 0) $thumb_width = $original_width;
			if ($thumb_height == 0) $thumb_height = $original_height;
			/* ------------------------------------------------------------- */
			$this->fileinfo['thumb_width'] = $thumb_width;
			$this->fileinfo['thumb_height'] = $thumb_height;
			//创建图像对象
			if( $this->HasImageMemory($thumb_width, $thumb_height) ){
				$created_thumb = imagecreatetruecolor($thumb_width, $thumb_height);
			}else{
				$created_thumb = false;
			}
			if ( !$created_thumb ){//建立图像对象失败
				return 20;
			}
			if ( !imagecopyresampled($created_thumb, $original, 0, 0, 0, 0,
                    $thumb_width, $thumb_height, $original_width, $original_height) )
			{//缩略动作失败
				imagedestroy($created_thumb);
				return 21;
			}
			if ( !$SaveFun($created_thumb, $newimg) )
			{//保存缩略图失败
				imagedestroy($created_thumb);
				return 22;
			}else{
				imagedestroy($created_thumb);
				return 0;//成功创建缩略图，返回0
			}
		}
	}

	/**
	 * 检查文件信息是否通过配置
	 */
	function CheckFile(){
		if($this->fileinfo['type']==''){
			$this->fileinfo['mime'] = '';
		}else{
			$this->fileinfo['mime'] = substr($this->fileinfo['type'], 0, strpos($this->fileinfo['type'],'/') );
		}
		//检查文件类型
		if( $this->fileinfo['mime']!='' && !in_array($this->fileinfo['mime'], $this->allowmime) ){
			$this->fileinfo['error'] = 103;
		}
		//检查文件格式
		if($this->fileinfo['ext']=='' || !in_array($this->fileinfo['ext'], $this->allowtype)){
			$this->fileinfo['error'] = 11;
		}
		//检查是否存在同名文件
		if( !$this->file_overwrite && file_exists($this->fileinfo['realpath']) ){
			$this->fileinfo['error'] = 13;
		}
		//检查文件大小
		if( $this->file_maxsize > 0 && $this->fileinfo['size'] > $this->file_maxsize ){
			$this->fileinfo['error'] = 14;
		}
		return $this->fileinfo;
	}

	/**
	 * 取文件名的扩展名，如jpg
	 * @param string $filename
	 */
	function Get_File_ext($fname){
        $arr = explode(".", $fname);
        $ext = $arr[count($arr)-1];
        return strtolower($ext);
    }

	/**
	 * 递归创建目录
	 * @param string $path
	 */
	function MakeDirs($path){
		$dir = dirname($path);
		if (!file_exists($dir)) {
			$this->MakeDirs($dir);
			@mkdir($path,0777);
		}else{
			@mkdir($path,0777);
		}
	}

	/**
	 * 显示信息，退出程序
	 * @param int $code
	 */
	function showmsg($code, $exit = false){
		if(isset($this->errorlist[$code])){
			$this->error = array('code'=>$code,'content'=>$this->errorlist[$code]);
			if($exit) {
				die($this->errorlist[$code]);
			}
		}else{
			if($exit) {
				die('error');
			}else{
				return false;
			}
		}
	}

	/**
	 * 根据长宽估计读取或创建图片所需内存是否够用
	 * @return 内存预计不足则返回false
	 */
	function HasImageMemory($w,$h){
		$memory_limit = ini_get('memory_limit');
		$memory_require = $w * $h * 3 * 1.8 + 1024 * 1024;
		$memory_remain = intval($memory_limit) * 1024 * 1024 - memory_get_usage();
		#echo "w:{$w},h:{$h},limit:{$memory_limit}, require:$memory_require, remain:$memory_remain";

		if( $memory_require < $memory_remain){
			return true;
		}else{
			return false;
		}
	}

}