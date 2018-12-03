<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class User_model extends CI_Model{
		public function insert_user($uname,$mpass){
			$sql="insert into user(uid,uname,pass) values(null,'$uname','$mpass')";
			$query=$this->db->query($sql);
			return $query;
		}

		public function get_name_by_pass($uname,$mpass){
			$sql="select * from user where uname='$uname' and pass='$mpass'";
			$query=$this->db->query($sql);
			return $query->row();

			//返回结果集 要么多行 要么一行
		}

		public function check_name($uname){
			$sql="select * from user where uname='$uname'";
			$query=$this->db->query($sql);
			return $query->row();
		}
	}


?>