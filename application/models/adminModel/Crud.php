<?php

class crud extends CI_Model
{ 
	public function login($post){
		$username=$post['username'];
		$password=md5($post['password']);
		$q=$this->db->where(['username'=>$username,'password'=>$password])
					->get('admin_users');

		return $q->num_rows();
	}
	public function get_courses($status='',$id=''){
		if($status!=''){
			$q=$this->db->where(['status'=>1,'id'=>$id])
				 ->get('courses');	
		}
		else{
			$q=$this->db->where('status',1)
				 ->get('courses');
		}
		return $q->result();
	}

	public function add_course($post,$status='',$id=''){
		if($status!=''){
			$q=$this->db->where(['status'=>1,'id'=>$id])
				 ->update('courses',$post);	
		}
		else
			$q=$this->db->insert('courses',$post);
		return $q;
	}

	public function get_scourses($status='',$id=''){
		if($status!=''){
			$q=$this->db->where(['status'=>1,'id'=>$id])
				 ->get('sub_courses');	
		}
		else{
		$q=$this->db->where('status',1)
				 ->get('sub_courses');
		}
		return $q->result();
	}

	public function add_sub_course($post,$status='',$id=''){
		if($status!=''){
			$q=$this->db->where(['status'=>1,'id'=>$id])
				 ->update('sub_courses',$post);	
		}
		else
		$q=$this->db->insert('sub_courses',$post);
		return $q;
	}

	public function get_category(){
		$q=$this->db->where('status',1)
				 ->get('category');
		return $q->result();
	}

	public function add_category($post){
		$q=$this->db->insert('category',$post);
		return $q;
	}

}

?>