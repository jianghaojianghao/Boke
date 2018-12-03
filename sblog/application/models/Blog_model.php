<?php defined('BASEPATH') OR exit('No direct script access allowed');
	class Blog_model extends CI_Model{
		public function insert_data($title,$con,$uid,$cid){
			$sql="insert into blog(bid,title,content,ntime,uid,cid) values(null,'$title','$con',now(),'$uid','$cid')";
			$query=$this->db->query($sql);
			return $query;
		}

		public function get_catalog($uid){
			$sql="select * from catalog where uid='$uid'";
			$query=$this->db->query($sql);
			return $query->result();
		}

		public function check_cata($cata,$uid){
			$sql="select * from catalog where cname='$cata' and uid='$uid'";
			$query=$this->db->query($sql);
			return $query->row();
		}

		public function insert_cata($cata,$uid){
			$sql="insert into catalog(cid,cname,uid) values(null,'$cata','$uid')";
			$query=$this->db->query($sql);
			return $query;
		}

		public function get_all(){
			//$sql="select * from blog order by bid asc limit 2 ";
			$sql="select * from blog,user where user.uid=blog.uid";
			$query=$this->db->query($sql);
			return $query->result();
		}
	}


?>