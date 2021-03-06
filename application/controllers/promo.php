<?php

/**
 * @author f1108k
 * @copyright 2015
 */



?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Promo extends CI_Controller {

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
	   $this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
	   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
       
       $this->data->title           = "Putra Jaya Electronic";
       $this->data->content_header 	= "templates/header/header";
       $this->data->content_body    = 'templates/promo/all_promo_body';
	   $this->data->content_footer    = 'templates/footer/footer_body';
	   $this->data->no_image		=	$this->templates->no_avatar();
	   $this->load->model('user_model');
	   
	   $this->data->hot_promo	=	$this->user_model->getDataAllPromo();
       
       		$this->load->view('header',$this->data);
            $this->load->view('body');
            $this->load->view('footer');
	   
    }
	
	function id(){
		$id	=	$this->uri->segment(3);
		
		if(!$id){
			redirect('');
		}
		
		$this->load->model('user_model');
		$datapromo	=	$this->user_model->getDataPromoById($id);
		
		if($datapromo){
			   $this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
			   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));
			   
			   $this->data->title           = 'Promo '.$datapromo[0]->nama.' | Putra Jaya Electronic';
			   $this->data->content_header 	= "templates/header/header";
			   $this->data->content_body    = 'templates/promo/promo_detil_body';
			   $this->data->content_footer    = 'templates/footer/footer_body';
			   $this->data->no_image		=	$this->templates->no_avatar();
			   $this->load->model('user_model');
			   
			   $this->data->hot_promo	=	$datapromo;
			   
					$this->load->view('header',$this->data);
					$this->load->view('body');
					$this->load->view('footer');
		} else {
			redirect('');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */