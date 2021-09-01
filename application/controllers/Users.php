<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('userModel/crud','crud');
	}

	public function index()
	{
		$courses=$this->crud->get_courses();
		$this->load->view('Users/index',['courses'=>$courses]);
	}
	

	public function courses($id){
		$courses=$this->crud->get_courses();
		$scourses=$this->crud->get_scourses($id);
		$this->load->view('Users/course',['scourses'=>$scourses,'courses'=>$courses]);
	}

	public function category(){
		$id=$this->uri->segment(3);
		$vid=$this->uri->segment(4);
		$courses=$this->crud->get_courses();
		$category=$this->crud->get_category($id);
		$scourses=$this->crud->get_subcourses($id);
		$video=$this->crud->get_video($vid='');
		$this->load->view('Users/category',['courses'=>$courses,'category'=>$category,'scourse'=>$scourses,'video'=>$video]); 	
	}

	public function contact(){
		$u_id='';
		if($this->session->userdata('id'))
			$u_id=$this->session->userdata('id');
		if($u_id=='')
			echo "Please Login !";
		else{
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('msg','message','required|min_length[50]');
        if ($this->form_validation->run() == FALSE){
			$errors = validation_errors();
            echo $errors;
        }else{
        	echo "Response submitted";
		$array=$this->input->post();
		$this->crud->contact($array);	
		}}
	}

	public function login(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password','Password','required');
        if ($this->form_validation->run() == FALSE){
			$errors = "Wrong email or password ";
            echo $errors;
        }else{
		$post=$this->input->post();
		$q=$this->crud->login($post);
		if($q){
			$this->session->set_userdata('login','Yes');
			$this->session->set_userdata("id",$q[0]->id);
			$this->session->set_userdata('name',$q[0]->name);
			//return (json_encode(array('status'=>'1','msg'=>'success')));
			echo "Login Successful";
		}
		else
			echo "Invalid Ceredentials";
			//die(json_encode(array('status'=>'0','msg'=>'failed')));
		}
	}

	public function register(){
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[student.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[8]');
        $this->form_validation->set_rules('name','name','required');
        $this->form_validation->set_rules('mobile','mobile no','required|regex_match[/^[0-9]{10}$/]|numeric');
        if ($this->form_validation->run() == FALSE){
      		$errors = validation_errors();
            echo $errors;
        }else{
		$post=$this->input->post();
		echo "Now, you are the member of our community";
		$q=$this->crud->register($post);
			$this->session->set_userdata('login','Yes');
			$this->session->set_userdata("id",$q[0]->id);
			$this->session->set_userdata('name',$q[0]->name);
			//return (json_encode(array('status'=>'1','msg'=>'success')));
			
		
		}
	}

	
	public function logout(){
			$this->session->unset_userdata('login');
			$this->session->unset_userdata("id");
			$this->session->unset_userdata('name');
			return redirect('Users');
			
	}
}
