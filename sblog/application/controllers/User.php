<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User extends CI_Controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('User_model');
		}

		public function index(){

		}

		public function checkname(){
			header('Access-Control-Allow-Origin:*');  
			header('Access-Control-Allow-Methods:*');  
			header('Access-Control-Allow-Headers:x-requested-with,content-type');  

			$uname=$this->input->post('uname');
			//echo $uname;
			$rs=$this->User_model->check_name($uname);
			if($rs){
				//echo "success";
				echo json_encode($rs);
			}else{
				echo "error";
			}
			/*
			if($uname=='laoshan'){
				echo "success";
			}else{
				echo "error";
			}*/
		}

		public function ulogin(){
			$array_items = array('uid','uname','logged_in');

			$this->session->unset_userdata($array_items);

			redirect('blog/index');
		}

		public function login(){
			if($this->input->get('c')){
				$c=$this->input->get('c');
				$m=$this->input->get('f');
				$data['str']=$c."=".$m;
				$this->load->view('login.php',$data);
			}else{
				$this->load->view('login.php');
			}
			
		}

		public function do_login(){
			$uname=$this->input->post('username');
			$pass=$this->input->post('pass');
			$mpass=md5($pass);
			$hstr=$this->input->post('hstr');
			$arr=explode('=',$hstr);
			$rs=$this->User_model->get_name_by_pass($uname,$mpass);
			if($rs){
				/*
				setcookie('uid',$rs->uid);
				setcookie('uname',$rs->uname);*/
				$newdata = array(
				    'uid'  =>$rs->uid,
				    'uname'=>$rs->uname,
				    'logged_in' => TRUE
				);

				$this->session->set_userdata($newdata);
				if($arr[0]){
					redirect("$arr[0]/$arr[1]");
				}else{
					redirect('Blog/index');
				}
				
			}

		}


		public function reg(){
			$this->load->view('reg.php');
		}

		public function do_reg(){
			$uname=$this->input->post('username');
			$pass=$this->input->post('pass');
			$mpass=md5($pass);

			
			$rs=$this->User_model->insert_user($uname,$mpass);
			if($rs){
				redirect('user/login');
			}else{
				//redirect('user/reg');
				$this->reg();
			}
		}
	}



?>