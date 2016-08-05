<?php

/**
 * @author f1108k
 * @copyright 2015
 */



?>
<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Logout extends CI_Controller{
		function __construct(){
			parent::__construct();
			
		}
		function index(){
			$this->data = new stdClass();
			if($this->session->userdata('user_id')){
				$this->load->model('user_model');
                
                $data_user      =   $this->user_model->getDataUserById($this->session->userdata('user_id'));
				$data_session   =   array(
						'user_id'           =>  $data_user[0]->user_id,
						'nama'         =>  $data_user[0]->nama,
						'username'          =>  $data_user[0]->username,
						'saldo'            =>  $data_user[0]->saldo,
						'status'            =>  $data_user[0]->status_online
				);
				$my_id	=	$this->session->userdata('user_id');
				$this->user_model->userOff($my_id);
				$this->session->unset_userdata($data_session);
                redirect('');
			} else {
                redirect('');
			}
            
		}
	}
?>