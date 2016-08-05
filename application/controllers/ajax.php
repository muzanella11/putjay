<?php

/**
 * @author f1108k
 * @copyright 2015
 */



?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

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
	   redirect('');
    }
	
	function login(){
		$this->data = new stdClass();
        if(!$this->session->userdata('user_id')){
            if($this->input->is_ajax_request()){
                $variabel   =   htmlspecialchars($this->input->post('variabel'));
                $password   =   htmlspecialchars($this->input->post('password'));
                
                $this->load->model('user_model');
                
                if($this->templates->length($variabel) == ''){
                    $dataJson['message']    =   'Please enter your email or username';
                    $dataJson['t']          =   0;
                    $dataJson['id']         =   'variabel';
                }
                elseif(strpos($variabel,'@')){
                    $data_user   =   $this->user_model->getDataUserByEmail($variabel);
                    if(!$data_user){
                        $dataJson['message']    =   'This email is not registered';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'variabel';    
                    }
                    elseif($password == ''){
                        $dataJson['message']    =   'Please enter your password';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'password';    
                    }
                    elseif($password != $data_user[0]->password){
                        $dataJson['message']    =   'Wrong password';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'password';    
                    } 
                    else{
                        $dataJson['t']      =   1;   
                    }
                }
                else{
                    $data_user   =   $this->user_model->getDataUserByUsername($variabel);
                    if(!$data_user){
                        $dataJson['message']    =   'This username is not registered';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'variabel';
                    }
                    elseif($password == ''){
                        $dataJson['message']    =   'Please enter your password';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'password';    
                    }
                    elseif($password != $data_user[0]->password){
                        $dataJson['message']    =   'Wrong password';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'password';    
                    }
                    else{
                        $dataJson['t']      =   1;   
                    }
                }
                
                if($dataJson['t']   ==  '1'){
                    // Ketika User berhasil Login
                    //$this->user_model->recordLogin($data_user[0]->user_id);
                    $this->user_model->userOn($data_user[0]->id_user);
                    
                    $data_session   =   array(
                            'user_id'           =>  $data_user[0]->id_user,
                            'nama'         =>  $data_user[0]->nama,
                            'username'          =>  $data_user[0]->username,
                            'saldo'            =>  $data_user[0]->saldo,
                            'status'            =>  $data_user[0]->status_online
                    );
                    $this->session->set_userdata($data_session);
                    
                }
                echo json_encode($dataJson);
            }
            //redirect('');
            
        }
        
    }
	
	function submit_register(){
        if($this->input->is_ajax_request()){
            $nama		= htmlspecialchars($this->input->post('nama'),ENT_QUOTES);
            $username	= $this->input->post('username');
            $email      = strtolower(htmlspecialchars($this->input->post('email')));
            $password   = htmlspecialchars($this->input->post('password'));
			$passconf   = htmlspecialchars($this->input->post('passconf'));
            
            $digit_patt	= '/([0-9])/';
			$alpha_patt	= '/([a-zA-Z])/';
            $spch_patt	= '/([\-\_?!*%&^@#$`~,.<>;\':"\\/\/[\]\|{}()=+])/';
            
            $this->load->model('user_model');
			$data_username	=	$this->user_model->getDataUserByUsername($username);
            //die($user_id);
            //die($username);
            //die($email);
            //die($password);
            //die($data_username[0]->username);
            if($this->templates->length($nama) == 0) {
					$dataJson['t']			= 0;
					$dataJson['message'] 	= "Please enter your name";
					$dataJson['id'] 	 	= "nama";
				}
				elseif($this->templates->length($nama) < 3){
					$dataJson['message'] 	= "Your name is too short";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "nama";
				}
				elseif ($this->templates->length($nama) > 100){
					$dataJson['message'] 	= "Your name is too long";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "nama";
				}
				elseif(preg_match($digit_patt,$nama)) {
					$dataJson['message'] 	= "Your name is invalid";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "nama";
				}
				elseif(preg_match($spch_patt,$nama)) {
					$dataJson['message'] 	= "Your name is invalid";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "nama";
				}
				elseif($this->templates->length($email) == 0){
					$dataJson['message'] 	= "Please enter your email";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "email";
				}
				elseif($this->templates->length($email) < 3){
					$dataJson['message'] 	= "Your email is too short";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "email";
				}
				elseif($this->templates->length($email) > 100){
					$dataJson['message'] 	= "Your email is too long";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "email";
				}
				elseif($this->user_model->getDataUserByEmail($email)){
					$dataJson['message'] 	= "This email already register";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "email";
				}
				elseif	($this->templates->length($password) < 8){
					$dataJson['message'] 	= "Please enter your password minimum 8 character";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "password";
				}
				elseif	(!preg_match($digit_patt,$password)){
					$dataJson['message'] 	= "Password must consist of min one number and one letter";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "password";
				}
				elseif (!preg_match($alpha_patt,$password)){
					$dataJson['message'] 	= "Password must consist of min one number and one letter";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "password";
				}
				elseif($this->templates->length($passconf) == 0){
					$dataJson['message'] 	= "Please retype your password";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "passconf";
				}
				elseif ($password != $passconf){
					$dataJson['message'] 	= "Password not match";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "passconf";
				}
				
                elseif(preg_match($spch_patt,$username)) {
					$dataJson['message'] 	= "Your username is invalid";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "username";
				}
                elseif ($this->templates->length($username) == 0) {
					$dataJson['message']	= "Please enter your username";
					$dataJson['t']			= 0;
					$dataJson['id']			= "username";
				}
				elseif	($this->templates->length($username) < 3){
					$dataJson['message'] 	= "Your username is too short";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "username";
				}
				elseif	($this->templates->length($username) > 50){
					$dataJson['message'] 	= "Your username is too long";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 		= "username";
				}
                elseif	($data_username){
					$dataJson['message'] 	= "This username is already exist";
					$dataJson['t'] 		 	= "0";
					$dataJson['id'] 	 	= "username";
				} else {
					$database		= array(
						'email'			    	=> $email,
						'password'	       		=> $password,
						'nama'      			=> $nama,
						'username'				=> $username                                                
					);
                    $this->user_model->addNewUser($database);
                    
                    $dataJson['t']  = 1;
                }
                echo json_encode($dataJson);
        }
    }
	
	function modal(){
		if($this->input->is_ajax_request()){
			$data_menu = htmlspecialchars($this->input->post('type'));
			if($data_menu == 'Signin' || $data_menu == 'Signup' || $data_menu == 'Add To Cart'){
				if($data_menu == 'Signin'){
					$this->load->view('templates/signin_or_signup/signin_body');
				}
				elseif($data_menu == 'Signup'){
					$this->load->view('templates/signin_or_signup/signup_body');
				}
				elseif($data_menu == 'Add To Cart'){
					$this->load->view('templates/cart/cart_input_body');
				}
			}
		}
	}
	
	function buy(){
		if($this->input->is_ajax_request()){
			$id_items	=	htmlspecialchars($this->input->post('id'));
			$this->load->model('user_model');
			$this->data->data_items	=	$this->user_model->getDataItemsById($id_items);
			
			$this->load->view('templates/cart/cart_input_body',$this->data);
		}
	}
	
	function add_to_cart(){
		if($this->input->is_ajax_request()){
			$user_id	=	$this->session->userdata('user_id');
			$id_items	=	htmlspecialchars($this->input->post('id_items'));
			$harga	=	htmlspecialchars($this->input->post('harga'));
			$nama	=	htmlspecialchars($this->input->post('nama_barang'));
			//die($nama);
			$jumlah	=	htmlspecialchars($this->input->post('jumlah'));
			$total	=	$harga*$jumlah;
			$deskripsi	=	htmlspecialchars($this->input->post('deskripsi'));
			
			$this->load->model('user_model');
			
			$database = array(
			'user_id'	=>	$user_id,
			'id_items'	=>	$id_items,
			'harga'		=>	$harga,
			'jumlah'	=>	$jumlah,
			'total'		=>	$total,
			'nama'		=>	$nama,
			'deskripsi'	=>	$deskripsi
			);
			
			$this->user_model->addToCart($database);
			
			$dataJson['t']	=	1;
			
			echo json_encode($dataJson);
		}
	}
	
	function logadmin(){
		if($this->input->is_ajax_request()){
		$this->data = new stdClass();
			if($this->input->is_ajax_request()){
                $variabel   =   htmlspecialchars($this->input->post('variabel_login'));
                $password   =   htmlspecialchars($this->input->post('password'));
                
                $this->load->model('user_model');
                
                if($this->templates->length($variabel) == ''){
                    $dataJson['message']    =   'Please enter your email or username';
                    $dataJson['t']          =   0;
                    $dataJson['id']         =   'email';
                }
                elseif(strpos($variabel,'@')){
                    $data_user   =   $this->user_model->getDataAdminByEmail($variabel);
                    if(!$data_user){
                        $dataJson['message']    =   'This email is not registered';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'email';    
                    }
                    elseif($password == ''){
                        $dataJson['message']    =   'Please enter your password';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'password';    
                    }
                    elseif($password != $data_user[0]->password){
                        $dataJson['message']    =   'Wrong password';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'password';    
                    } 
                    else{
                        $dataJson['t']      =   1;   
                    }
                }
                else{
                    $data_user   =   $this->user_model->getDataAdminByUsername($variabel);
                    if(!$data_user){
                        $dataJson['message']    =   'This username is not registered';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'username';
                    }
                    elseif($password == ''){
                        $dataJson['message']    =   'Please enter your password';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'password';    
                    }
                    elseif($password != $data_user[0]->password){
                        $dataJson['message']    =   'Wrong password';
                        $dataJson['t']          =   0;
                        $dataJson['id']         =   'password';    
                    }
                    else{
                        $dataJson['t']      =   1;   
                    }
                }
                
                if($dataJson['t']   ==  '1'){
                    // Ketika User berhasil Login
                    $data_session   =   array(
                            'id_admin'           	  =>  $data_user[0]->id_admin,
                            'name'          	  	  =>  $data_user[0]->name,
                            'username'       		  =>  $data_user[0]->username,
                            'status_admin'            =>  $data_user[0]->status_admin
                    );
                    $this->session->set_userdata($data_session);
                    
                }
                echo json_encode($dataJson);
            }
		} else {
			redirect('');
		}
	}
	
	function check_menu_add(){
		if($this->input->is_ajax_request()){
			$data_menu = htmlspecialchars($this->input->post('add_type'));
			if($data_menu == 1 || $data_menu == 2 || $data_menu == 3 || $data_menu == 4){
				if($data_menu == 1){
					$this->load->view('templates/admin/add/add_admin_body');
				}
				elseif($data_menu == 2){
					$this->load->view('templates/admin/add/add_category_body');
				}
				elseif($data_menu == 3){
					$this->load->view('templates/admin/add/add_items_body');
				}
				elseif($data_menu == 4){
					$this->load->view('templates/admin/add/add_promo_body');
				}
			}
		}
	}
	
	function check_menu_report(){
		if($this->input->is_ajax_request()){
			$data_menu = htmlspecialchars($this->input->post('add_type'));
			if($data_menu == 1 || $data_menu == 2 || $data_menu == 3 || $data_menu == 4){
				$this->load->model('user_model');
				if($data_menu == 1){
					$this->load->view('templates/admin/report/add_admin_body');
				}
				elseif($data_menu == 2){
					$this->data->alluser = $this->user_model->getDataAllUser();
					$this->load->view('templates/admin/report/report_user_body',$this->data);
				}
				elseif($data_menu == 3){
					$this->data->allitems = $this->user_model->getDataAllItems();
					$this->load->view('templates/admin/report/report_items_body',$this->data);
				}
				elseif($data_menu == 4){
					$this->data->allpromo = $this->user_model->getDataAllPromo();
					$this->load->view('templates/admin/report/report_promo_body',$this->data);
				}
			}
		}
	}
	
	function search_items_add_promo(){
		if($this->input->is_ajax_request()){
			$variabel = htmlspecialchars($this->input->post('nama'));
			$this->load->model('user_model');
			if($variabel){
				$this->data->allitems = $this->user_model->getDataAllItemsByName($variabel);
				$this->load->view('templates/admin/add/search_items_body',$this->data);
			}
		}
	}
	
	function submit_promo(){
		if($this->input->is_ajax_request()){
			$promo_id	=	htmlspecialchars($this->input->post('q'));
			$this->load->model('user_model');
			
			if($promo_id){
				$this->user_model->setPromo($promo_id);
				$dataJson['t'] = 1;
			} else {
				$dataJson['t'] = 0;
			}
			echo json_encode($dataJson);
		}
	}
	
	function unset_promo_items(){
		if($this->input->is_ajax_request()){
			$promo_id	=	htmlspecialchars($this->input->post('q'));
			$this->load->model('user_model');
			
			if($promo_id){
				$this->user_model->unsetPromo($promo_id);
				$dataJson['t'] = 1;
			} else {
				$dataJson['t'] = 0;
			}
			echo json_encode($dataJson);
		}
	}
	
	function submit_items(){
		if($this->input->is_ajax_request()){
			$nama   =   htmlspecialchars($this->input->post('nama'));
            $category   =   htmlspecialchars($this->input->post('category'));
            $price   =   htmlspecialchars($this->input->post('price'));
            $desc   =   htmlspecialchars($this->input->post('description'));
			
			$this->load->model('user_model');
            
			if($this->templates->length($nama) == ''){
				$dataJson['message']    =   'Please enter your name items';
				$dataJson['t']          =   0;
				$dataJson['id']         =   'name';
			}
			elseif($this->templates->length($nama) < 2){
				$dataJson['message']    =   'Too short name';
				$dataJson['t']          =   0;
				$dataJson['id']         =   'name';
			}
			elseif($this->templates->length($nama) > 100){
				$dataJson['message']    =   'Too long name';
				$dataJson['t']          =   0;
				$dataJson['id']         =   'name';
			}
			elseif($this->templates->length($category) == ''){
				$dataJson['message']    =   'Please select category';
				$dataJson['t']          =   0;
				$dataJson['id']         =   'category';
			}
			elseif($this->templates->length($price) > 100){
				$dataJson['message']    =   'Too long';
				$dataJson['t']          =   0;
				$dataJson['id']         =   'price';
			}
			elseif(!is_numeric($price)){
				$dataJson['message']    =   'Wrong type';
				$dataJson['t']          =   0;
				$dataJson['id']         =   'price';
			}
			elseif($this->templates->length($desc) < 2){
				$dataJson['message']    =   'Too short description';
				$dataJson['t']          =   0;
				$dataJson['id']         =   'description';
			}
			elseif($this->templates->length($desc) > 300){
				$dataJson['message']    =   'Too long description';
				$dataJson['t']          =   0;
				$dataJson['id']         =   'description';
			}
			else {
				$database   =   array(
					'nama'     =>  $nama,
					'category'	=> $category,
					'price'		=> $price,
					'description' => $desc
				);
				
				$this->user_model->addNewItems($database);
				
				$dataJson['t'] = 1;
			}
			echo json_encode($dataJson);
			
			
			
			
		}
	}
	
	function submit_edit_items(){
		if($this->input->is_ajax_request()){
			
		}
	}
	
    function register(){
        //if($this->session->userdata('email')){
        //    redirect('signup');
        //}
            $email      =   strtolower(htmlspecialchars($this->input->post('cemHZZ52xP')));
            $password   =   htmlspecialchars($this->input->post('password'));
            $language   =   $this->input->post('language');
            $timezone   =   $this->input->post('timezone');
            
            //$this->load->model('user_model');
            
            $session_register   =   array(
                'email'     =>  $email,
                'password'  =>  $password,
                'language'  =>  $language,
                'timezone'  =>  $timezone
            );
            
            $this->session->set_userdata($session_register);
            $ok = 1;
            
            if($ok){
                redirect('signup');
            } else {
                redirect('');
            }
            

    }
    
    function check_register(){
        if($this->input->is_ajax_request()){
            $email      =   strtolower(htmlspecialchars($this->input->post('email')));
            $password   =   htmlspecialchars($this->input->post('password'));
            $passconf   =   htmlspecialchars($this->input->post('passconf'));
            $fullname   =   htmlspecialchars($this->input->post('fullname'));
            $username   =   htmlspecialchars($this->input->post('username'));
            $digit_patt	= '/([0-9])/';
			$alpha_patt	= '/([a-zA-Z])/';
            
            $this->load->model('user_model');
            
            if($this->templates->length($email) == 0){
                $dataJson['message']    =   'Please enter your email';
                $dataJson['t']          =   0;
                $dataJson['id']         =   'email';
            }
            elseif($this->templates->length($email) < 3){
                $dataJson['message']    =   'Your email is too short';
                $dataJson['t']          =   0;
                $dataJson['id']         =   'email';
            }
            elseif($this->templates->length($email) > 100){
                $dataJson['message']    =   'Your email is too long';
                $dataJson['t']          =   0;
                $dataJson['id']         =   'email';
            }
            elseif($this->user_model->getDataUserByEmail($email)){
                $dataJson['message']    =   'This email is already registered';
                $dataJson['t']          =   0;
                $dataJson['id']         =   'email';
            } 
            elseif	($this->templates->length($password) == 0) {
				$dataJson['message']	= "Please enter your password";
				$dataJson['t']			= 0;
				$dataJson['id']			= "password";
			}
			elseif	($this->templates->length($password) < 8){
				$dataJson['message'] 	= "Please enter your password minimum 8 character";
				$dataJson['t'] 		 	= "0";
				$dataJson['id'] 	 	= "password";
			}
			elseif	(!preg_match($digit_patt,$password)){
				$dataJson['message'] 	= "Password must consist of min one number and one letter";
				$dataJson['t'] 		 	= "0";
				$dataJson['id'] 	 	= "password";
			}
			elseif (!preg_match($alpha_patt,$password)){
				$dataJson['message'] 	= "Password must consist of min one number and one letter";
				$dataJson['t'] 		 	= "0";
				$dataJson['id'] 	 	= "password";
			}
            elseif (!$passconf){
                $dataJson['message'] 	= "Type your password again";
				$dataJson['t'] 		 	= "0";
				$dataJson['id'] 	 	= "passconf";
            }
            elseif ($passconf != $password){
                $dataJson['message'] 	= "Password not match";
				$dataJson['t'] 		 	= "0";
				$dataJson['id'] 	 	= "passconf";
            }
            elseif ($this->templates->length($fullname) < 3){
                $dataJson['message'] 	= "Please enter your fullname";
				$dataJson['t'] 		 	= "0";
				$dataJson['id'] 	 	= "fullname";
            }
            elseif($this->templates->length($fullname) > 30){
                $dataJson['message']    =   'Your fullname is too long';
                $dataJson['t']          =   0;
                $dataJson['id']         =   'fullname';
            }
            elseif ($this->templates->length($username) < 3){
                $dataJson['message'] 	= "Please enter your username";
				$dataJson['t'] 		 	= "0";
				$dataJson['id'] 	 	= "username";
            }
            elseif($this->templates->length($username) > 15){
                $dataJson['message']    =   'Your username is too long';
                $dataJson['t']          =   0;
                $dataJson['id']         =   'username';
            }
            else {
                $dataJson['t']  =   1;
            }  
            
            echo json_encode($dataJson);
            
        }
    }

    function search_items(){
    	if($this->input->is_ajax_request()){
    		$q = htmlspecialchars($this->input->post('q'));
    		if(!empty($q)){
    			$this->load->model('user_model');
	    		$this->data->no_image	=	$this->templates->no_avatar();

	    		$this->data->data_result = $this->user_model->getDataAllItemsByName($q);
	    		$this->load->view('templates/header/list_search',$this->data);
    		}
    	} else {
    		redirect('');
    	}
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */