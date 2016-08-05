<?php

/**
 * @author f1108k
 * @copyright 2015
 */



?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Templates {
    private $folder_css_sign_in;
    private $folder_js_sign_in;
    
    private $folder_css;
    private $folder_js;
    private $path = "putjay/";
    private $folder_image;
	private $folder_image_default;
    
    function __construct(){
        $this->folder_css   		= "/stylesheet/css/";
		$this->folder_js    		= "/stylesheet/javascript/";
		$this->folder_image 		= "http://". $_SERVER['HTTP_HOST'] ."/" . $this->path . "stylesheet/images/";
		//$this->folder_image_default = "http://". $_SERVER['HTTP_HOST'] ."/" . $this->path . "stylesheet/image/default_avatar/";
		$this->folder_image_default = "http://". $_SERVER['HTTP_HOST'] ."/" . "stylesheet/image/default_avatar/";
		$this->image_dir			= $_SERVER['DOCUMENT_ROOT'] . "/" . $this->path . "stylesheet/images/";
		$this->us_img_dir			= $_SERVER['DOCUMENT_ROOT'] . "/" . $this->path . "media/";
		$this->us_img_path			= "http://". $_SERVER['HTTP_HOST'] ."/". $this->path . "media/";
	}
    function folder_css($css=""){
		$data_css = '';
		$css[] = "style.css";
		foreach ($css as $key => $val){
			$data_css .= "<link href=" . "http://".$_SERVER['HTTP_HOST'] . "/". $this->folder_css. $val ." rel='stylesheet' type='text/css'/>\n";	
		}
		
		return $data_css;
	}
    function folder_js($js=""){
		$data_js = '';
		$file = '';
		$file[] = "jquery.js";
		if($js){
			foreach ($js as $key => $val){                
				$file[] = $val;
			}       
		}
		foreach ($file as $key => $val){
			$data_js .= "<script src=" . "http://".$_SERVER['HTTP_HOST'] . "/" . $this->folder_js. $val ." type='text/javascript'></script>\n";	
		}
		
		return $data_js;
	}
	function no_avatar(){
		$file	=	'default.jpg';
		$link	=	$this->folder_image_default;
		
		$data_image_default	=	$link.$file;
		
		return $data_image_default;
	}
	function length($string){
		$str_length	= strlen(trim($string));
		return $str_length;
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */