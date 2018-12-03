<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blog extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}

		public function add_catalog(){
			if($this->session->userdata('uid')){
				$this->load->view('add_catalog.php');
			}else{
				//$this->load->view('add_catalog.php');
				$s=$this->uri->segment(1);
				$m=$this->uri->segment(2);

				//echo $s."||".$m;
				redirect("user/login?c=$s&f=$m");
			}
			
		}

		public function do_add_catalog(){
			$cata=$this->input->post('cata');

			$this->load->model('Blog_model');
			$uid=$this->session->userdata('uid');
			$rs=$this->Blog_model->check_cata($cata,$uid);
			if($rs){
				redirect("blog/add_catalog");
			}else{
				$uid=$this->session->userdata('uid');
				$result=$this->Blog_model->insert_cata($cata,$uid);
				if($result){
					redirect('blog/add');
				}
			}
		}

		public function index(){
			//echo 12345;
			$this->load->model('Blog_model');
			$rs=$this->Blog_model->get_all();
			$data['blogs']=$rs;
			$this->load->view('index.php',$data);
		}

		public function add(){
			$uid=$this->session->userdata('uid');
			$this->load->model('Blog_model');
			$rs=$this->Blog_model->get_catalog($uid);
			$data['cata']=$rs;
			$this->load->view('add.php',$data);
		}

		public function do_add(){
			//echo 123;
			//$title=$_POST['title'];
			$title=$this->input->post('title');
			$con=$this->input->post('con');
			$cata=$this->input->post('cata');

			
			$uid=$this->session->userdata('uid');
			$this->load->model('Blog_model');
			$rs=$this->Blog_model->insert_data($title,$con,$uid,$cata);
			if($rs){
				redirect('Blog/index');
			}else{
				echo "error";
			}
			//echo $title;
		}
	}

?>