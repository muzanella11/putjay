<?php

/**
 * @author f1108k
 * @copyright 2015
 */



?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {

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
	function __construct(){
		parent::__construct();	
		$this->data = new stdClass();
	}
	public function index()
	{
		$this->data = new stdClass();
	   $this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
       $this->data->content_body    = 'templates/category/category_body';
	   $this->data->content_footer    = 'templates/footer/footer_body';
       
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	   
    }
	function accessories(){
		
	   $this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Accessories | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(1,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(1);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
	function camera(){
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Camera | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(2,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(2);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
	function computer(){
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Computer | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(3,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(3);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
	function furniture(){
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Furniture | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(4,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(4);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
	function laptop(){
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Laptop | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(5,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(5);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
	function printer(){
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Printer | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(6,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(6);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
	function smartphone(){
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Smartphone | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(7,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(7);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
	function smartwatch(){
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Smartwatch | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(8,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(8);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
	function tablet(){
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Tablet | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(9,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(9);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
	function tv(){
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Kategori - Tv | Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
	   
	   if($this->uri->segment(4)){
		$this->data->content_body    = 'templates/category/category_detil_body';
	   } else {
		$this->data->content_body    = 'templates/category/all_category_body';   
	   }
	   
       $this->data->content_footer    = 'templates/footer/footer_body';
	   
	   $this->load->model('user_model');
	   $this->data->no_image	=	$this->templates->no_avatar();
	   
	   if($this->uri->segment(4)){
		   $id	=	$this->uri->segment(4);
		$this->data->kategori	=	$this->user_model->getDataItemsDetilByCategory(10,$id);
	   } else {
		$this->data->kategori	=	$this->user_model->getDataItemsByCategory(10);   
	   }
	   
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */