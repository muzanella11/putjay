<?php

/**
 * @author f1108k
 * @copyright 2015
 * 

 */



?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	class MY_Model extends CI_Model{
		function __construct(){
			parent::__construct();	
		}
		function getDataAdminByEmail($email){
			$sql    =   "SELECT * FROM admin WHERE email='".$email."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataAdminByUsername($username){
			$sql    =   "SELECT * FROM admin WHERE username='".$username."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataAdminById($id){
			$sql    =   "SELECT * FROM admin WHERE id_admin='".$id."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function addNewItems($data){
			$sql    =   "INSERT INTO items (nama,kategori,harga,deskripsi,date_create)
                            VALUES('".$data['nama']."','".$data['category']."','".$data['price']."','".$data['description']."',now())";
            $this->db->query($sql);
            
		}
        function deleteItems($items_id){
            $sql    =   "DELETE FROM items WHERE id_items ='".$items_id."'";
            $this->db->query($sql);
        }
		function setPromo($items_id){
			    $promo         =   "status_promo='1'";
                
                $sql       =   "UPDATE items SET ".$promo." WHERE id_items ='".$items_id."'";
                $this->db->query($sql);
		}
		function unsetPromo($items_id){
			$promo         =   "status_promo='0'";
			
			$sql       =   "UPDATE items SET ".$promo." WHERE id_items ='".$items_id."'";
			$this->db->query($sql);
		}
		function getDataAllPromo(){
			$sql    =   "SELECT * FROM items WHERE status_promo='1'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataPromoById($id){
			$sql    =   "SELECT * FROM items WHERE id_items='".$id."' && status_promo='1'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataHotPromo($limit){
			$sql    =   "SELECT * FROM items WHERE status_promo='1' LIMIT ".$limit."";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataItemsByCategory($c){
			$sql    =   "SELECT * FROM items WHERE kategori='".$c."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataItemsById($i){
			$sql    =   "SELECT * FROM items WHERE id_items='".$i."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataItemsDetilByCategory($c,$q){
			$sql    =   "SELECT * FROM items WHERE kategori='".$c."' && id_items='".$q."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataAllItems(){
			$sql    =   "SELECT * FROM items";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataAllItemsByName($name){
			$sql    =   "SELECT * FROM items WHERE nama LIKE '%".$name."%'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataAllUser(){
			$sql    =   "SELECT * FROM user";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
		function getDataCartByIdUser($u){
			$sql    =   "SELECT * FROM cart WHERE id_user='".$u."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
		}
        function getDataCartById($i){
            $sql    =   "SELECT * FROM cart WHERE id_cart='".$i."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
		function addToCart($data){
            $sql    =   "INSERT INTO cart (id_user,id_items,nama,deskripsi,harga,jumlah_order,total,tanggal_order)
                            VALUES('".$data['user_id']."','".$data['id_items']."','".$data['nama']."','".$data['deskripsi']."','".$data['harga']."','".$data['jumlah']."','".$data['total']."',now())";
            $this->db->query($sql);
            
            if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
			}
			else
			{
				$this->db->trans_commit();
			}
        }
        function deleteDataCart($i){
            $sql    =   "DELETE FROM cart WHERE id_cart ='".$i."'";
            $this->db->query($sql);
        }
		
        function userOn($user_id){
            $sql    =   "UPDATE user SET status_online='1' WHERE id_user ='".$user_id."'";
            $this->db->query($sql);
        }
        function userOff($user_id){
            $sql    =   "UPDATE user SET status_online='0' WHERE id_user='".$user_id."'";
            $this->db->query($sql);
            
            /*$ip     =   $_SERVER['REMOTE_ADDR'];
            $sql_insert_log =   "INSERT INTO user_log (user_id,action,date,ip)
                                    VALUES('".$user_id."',2,now(),'".$ip."')";
            $this->db->query($sql_insert_log);*/
        }
        function addNewUser($data){
            $sql    =   "INSERT INTO user (nama,email,username,password,date_join)
                            VALUES('".$data['nama']."','".$data['email']."','".$data['username']."','".$data['password']."',now())";
            $this->db->query($sql);
            
            if ($this->db->trans_status() === FALSE)
			{
				$this->db->trans_rollback();
			}
			else
			{
				$this->db->trans_commit();
			}
        }
		
		function getDataUserById($id){
            $sql    =   "SELECT * FROM user WHERE id_user='".$id."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
		function getDataUserByEmail($email){
            $sql    =   "SELECT * FROM user WHERE email='".$email."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
		function getDataUserByUsername($username){
            $sql    =   "SELECT * FROM user WHERE username='".$username."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
        }
		
        function updateDataAccount($data,$user_id){
            $fname     =   "first_name='".$data['first_name']."'";
            $lname     =   "last_name='".$data['last_name']."'";
            $username  =   "username='".$data['username']."'";
            //$email     =   "email='".$data['email']."'";
            //$password  =   "password='".$data['password']."'";
            //$user_id   =   $this->db->insert_id();
            $sql       =   "UPDATE user SET ".$fname.",".$lname.",".$username." WHERE user_id = '".$user_id."'";
            $this->db->query($sql);
            //return 1;
            //die(var_dump($sql));
            //$this->db->query($sql_insert_log);
        }
        /*
        function getDataUserForLogin($variabel,$password){
            $sql    =   "SELECT * FROM user WHERE email='".$variabel."' or username='".$variabel."' && password='".$password."'";
            $query  =   $this->db->query($sql);
            if($query->num_rows() > 0){
                return $query->result();
            }
        }*/
        function recordLogin($user_id){
            $ip     =   $_SERVER['REMOTE_ADDR'];
            $sql_insert_log_login =   "INSERT INTO user_log (user_id,action,date,ip)
                                    VALUES('".$user_id."',1,now(),'".$ip."')";
            $this->db->query($sql_insert_log_login);
        }
        function updateProfile($data){
            //$fname     =   "first_name='".$data['first_name']."'";
            //$lname     =   "last_name='".$data['last_name']."'";
            //$username  =   "username='".$data['username']."'";
            $user_id         =   "'".$data['user_id']."'";
            $bio             =   "biography='".$data['bio']."'";
            $location        =   "location='".$data['location']."'";
            $url             =   "url='".$data['url']."'";
            //$step_one  =   "step_one=1";
            //$email     =   "email='".$data['email']."'";
            //$password  =   "password='".$data['password']."'";
            //$user_id   =   $this->db->insert_id();
            $sql       =   "UPDATE user SET ".$bio.",".$location.",".$url." WHERE user_id = ".$user_id."";
            //die($sql);
            $this->db->query($sql);
        }
        function completeProfile($user_id,$option){
                $option_one         =   "step_one='1'";
                $option_two         =   "step_two='1'";
                
                if($option == 1){
                    $option_result  =   $option_one;
                } else {
                    $option_result  =   $option_two;
                }
                
                $sql       =   "UPDATE user SET ".$option_result." WHERE user_id ='".$user_id."'";
                $this->db->query($sql);  
                
        }
    }
?>