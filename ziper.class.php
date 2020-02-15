<?php
/**
 * ****************************************************************
 * 标题：Ziper类								  
 * 作者:Gqleung							  
 * 邮箱：admin@plasf.cn 						  
 * 博客：www.plasf.cn 	
 * 										  
 * 描述：在PHP-ZipArchive类的基础上进行二次封装使得调用更加便捷       
 * zip方法:用于压缩文件/文件夹                                      
 * contents_to_zip方法:该方法可以在Zip文件里面写入指定文件和内容      
 * unzip方法:解压zip文件                                           
 * **************************************************************
 */
class Ziper{
	protected $ziper;
	protected $zipfilename;
	public function __construct(){
		$this->ziper =  new ZipArchive();
	}
	/**
	 * [zip description]
	 * @param  string $filename     新建压缩文件的文件名，若不符合(*.zip)格式将自动添加zip后缀
	 * @param  string $Fromfilename 被压缩文件/文件夹的路径
	 * @return string               若错误返回错误信息,若压缩成功将返回 TRUE
	 */
	public function zip($filename='',$Fromfilename){
		if (!empty($filename) && preg_match('/zip/m', $filename)){
			if(!$this->ziper->open($filename, ZipArchive::CREATE))
				return 'File open failed';
		}elseif(!empty($filename)&& !preg_match('/zip/m', $filename)){
			$filename = $filename.'zip';
			if(!$this->ziper->open($filename, ZipArchive::CREATE))
				return 'File open failed';
		}
		if(is_dir($Fromfilename)){
			$list_dir = scandir($Fromfilename);
			for($i=2;$i<count($list_dir);$i++){
				if(is_dir($Fromfilename.'/'.$list_dir[$i])){
					$this->ziper->addGlob($Fromfilename.'/'.$list_dir[$i].'/*.*', 0, array('add_path' => $Fromfilename.'/'.$list_dir[$i].'/', 'remove_path' => $Fromfilename.'/'.$list_dir[$i]));
					$list_chr = scandir($Fromfilename.'/'.$list_dir[$i]);
					for($j=2;$j<count($list_chr);$j++){
						if(is_dir($Fromfilename.'/'.$list_dir[$i].'/'.$list_chr[$j])){
							echo $list_chr[$j];
							$this->zip('',$Fromfilename.'/'.$list_dir[$i].'/'.$list_chr[$j]);

						}
					}
					
				}
			}
		}else{
					$this->ziper->addFile ($Fromfilename);
			}
		return TRUE;
		
	}
/**
 * [contents_to_zip description]
 * @param  string $filename    压缩文件名
 * @param  string $zipfilename 需要向压缩文件写入的文件名
 * @param  string $content     写入文件的内容
 * @return string              成功返回True,否则返回错误内容
 */
	public function contents_to_zip($filename,$zipfilename,$content){
		if(!$this->ziper->open($filename, ZipArchive::CREATE))
			return 'File open failed';
		if(!$this->ziper->addFromString ($zipfilename, $content))
			return 'File write failed';
		return TRUE;

	}
/**
 * [unzip description]
 * @param  string $filename 被压缩文件路径名
 * @param  string $dir      解压缩所到目录
 * @return string           返回错误原因
 */
	public function unzip($filename,$dir){
		if(!file_exists($filename))
			return 'File does not exist';
		if(!$this->ziper->open($filename))
			return 'File open failed';
		if(!is_dir($dir)){
			mkdir($dir,775);
		}else{
			return 'Dir mk failed';
		}
		if(!$this->ziper->extractTo($dir))
			return 'File unzip failed';
		return TRUE;
	}
	public function __destruct() {
		$this->ziper->close();
	}

}

?>