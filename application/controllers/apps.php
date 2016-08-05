<?php

/**
 * @author f1108k
 * @copyright 2015
 */



?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apps extends CI_Controller {

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
		if($this->session->userdata('id_admin')){
			$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","dashboard.css"));
		   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js","holder.js"));
		   
		   $this->load->model('user_model');
		   
		   $this->data->title           = "Administrator | Putra Jaya Electronic";
		   $this->data->content_header 	= "templates/admin/header_admin/header_admin";
		   $this->data->content_body    = 'templates/admin/admin_body';
		   $this->data->content_footer    = '';
		   $this->data->alluser = $this->user_model->getDataAllUser();
					
		   
				$this->load->view('header',$this->data);
				$this->load->view('body');
				$this->load->view('footer');
		} else {
			redirect('apps/login');
		}
	   
	   
    }
	
	function login(){
		$this->data = new stdClass();
		
		$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","navbar-fixed-top.css","carousel.css"));
		$this->data->js    = $this->templates->folder_js(array("bootstrap.min.js"));

		$this->data->title           = "Login | Putra Jaya Electronic";
		$this->data->content_header 	= "";
		$this->data->content_body    = 'templates/admin/login/login_body';
		$this->data->content_footer    = '';
			$this->load->view('header',$this->data);
			$this->load->view('body');
			$this->load->view('footer');
	}
	
	function add(){
		$this->data = new stdClass();
		
		if($this->session->userdata('id_admin')){
			$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","dashboard.css"));
		   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js","holder.js"));
		   
		   $this->data->title           = "Add data | Putra Jaya Electronic";
		   $this->data->content_header 	= "templates/admin/header_admin/header_admin";
		   $this->data->content_body    = 'templates/admin/add/add_body';
		   $this->data->content_footer    = '';
				$this->load->view('header',$this->data);
				$this->load->view('body');
				$this->load->view('footer');
		} else {
			redirect('apps/login');
		}
	}

	function edit(){
		//die($this->uri->segment(5));
		if($this->session->userdata('id_admin')){
			$id_items = $this->uri->segment(5);
			if($id_items){
				$this->load->model('user_model');
				$data_items = $this->user_model->getDataItemsById($id_items);
				if($data_items){
					$this->user_model->deleteItems($id_items);
					redirect('apps');
				} else {
					redirect('apps');
				}
			} else {
				redirect('apps');
			}
		} else {
			redirect('apps/login');
		}
	}

	function delete(){
		if($this->session->userdata('id_admin')){
			$id_items = $this->uri->segment(5);
			if($id_items){
				$this->load->model('user_model');
				$data_items = $this->user_model->getDataItemsById($id_items);
				if($data_items){
					$this->user_model->deleteItems($id_items);
					redirect('apps');
				} else {
					redirect('apps');
				}
			} else {
				redirect('apps');
			}
		} else {
			redirect('apps/login');
		}
	}
	
	function report(){
		$this->data = new stdClass();
		
		if($this->session->userdata('id_admin')){
			$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","dashboard.css"));
		   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js","holder.js"));
		   $this->load->model('user_model');
		   
		   $this->data->title           = "Report data | Putra Jaya Electronic";
		   $this->data->content_header 	= "templates/admin/header_admin/header_admin";
		   $this->data->content_body    = 'templates/admin/report/report_body';
		   $this->data->alluser = $this->user_model->getDataAllUser();
					
		   $this->data->content_footer    = '';
				$this->load->view('header',$this->data);
				$this->load->view('body');
				$this->load->view('footer');
		} else {
			redirect('apps/login');
		}
	}
	
	function messages(){
		$this->data = new stdClass();
		
		if($this->session->userdata('id_admin')){
			$this->data->css   = $this->templates->folder_css(array("bootstrap.min.css","dashboard.css"));
		   $this->data->js    = $this->templates->folder_js(array("bootstrap.min.js","holder.js"));
		   
		   $this->data->title           = "Messages | Putra Jaya Electronic";
		   $this->data->content_header 	= "templates/admin/header_admin/header_admin";
		   $this->data->content_body    = 'templates/admin/admin_body';
		   $this->data->content_footer    = '';
				$this->load->view('header',$this->data);
				$this->load->view('body');
				$this->load->view('footer');
		} else {
			redirect('apps/login');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */