<?php

/**
 * @author f1108k
 * @copyright 2015
 */



?>
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Logout_admin extends CI_Controller{
		function __construct(){
			parent::__construct();
			
		}
		function index(){
			if($this->session->userdata('id_admin')){
				$this->load->model('user_model');
                
                $data_user      =   $this->user_model->getDataAdminById($this->session->userdata('id_admin'));
                    $data_session   =   array(
							'id_admin'           	  =>  $data_user[0]->id_admin,
                            'name'          	  	  =>  $data_user[0]->name,
                            'username'       		  =>  $data_user[0]->username,
                            'status_admin'            =>  $data_user[0]->status_admin
                    );
                
                $this->session->unset_userdata($data_session);
                redirect('apps/login');
				//$this->user_model->recordLogOut($this->encrypt->decode($this->session->userdata('user_id')));
			} else {
                redirect('');
			}
            
		}
	}
?>