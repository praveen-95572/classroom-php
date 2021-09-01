<?php

class crud extends CI_Model
{
	public function get_courses(){
		$q=$this->db->where('status',1)
				 ->get('courses');
		return $q->result();
	}
	public function get_scourses($id){
		$q=$this->db->where(['course_id'=>$id,'status'=>1])
				 ->get('sub_courses');
		return $q->result();
	}
	public function get_subcourses($id){
		$q=$this->db->where(['id'=>$id,'status'=>1])
				 ->get('sub_courses');
		return $q->result();
	}
	public function get_category($id){
		$q=$this->db->where(['sub_course_id'=>$id,'status'=>1])
				 ->get('category');
		return $q->result();
	}
	public function get_video($vid){
		if($vid!=''){
			$q=$this->db->where(['sc_id'=>$vid,'status'=>1])
				 ->get('video');			 
		}
		else{
			$q=$this->db->where(['status'=>1])
				 ->get('video');
		}
		return $q->result();
	}

	public function login(array $post){
		$q= $this->db->where($post)->get('student');
		if($q->num_rows()){
			return $q->result();
		}
		else
			return false;
	}
	public function register($post){
		$name=$post['name'];  $email=$post['email'];  $password=md5($post['password']);
		$mobile=$post['mobile'];   $added_on=date('Y-m-d H:i:s');
		$q=$this->db->insert('student',['name'=>$name,'email'=>$email,'password'=>$password,'mobile'=>$mobile,'added_on'=>$added_on]);
		$q= $this->db->where(['email'=>$email,'password'=>$password])->get('student');
		return $q->result();
	}

	public function contact(array $array){
		 if($this->db->insert('contact',$array))
		 	return 1;
		 else
		 	return 0;
	}
}
?>