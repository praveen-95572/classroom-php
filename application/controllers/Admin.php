<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('adminModel/crud','crud');
		$status=$this->uri->segment(3,0);
		$id=$this->uri->segment(4,0);
	}

	public function index(){
		$this->load->view('Admin/index');
	}
	public function dashboard(){
		if($this->input->post()){
		$post=$this->input->post();
		$res=$this->crud->login($post);
		if($res){
			$this->session->set_userdata('adminlogin','Login');
			$this->load->view('Admin/dashboard');
			}
		else{
			$this->session->set_flashdata('admin_login','Invalid Credential !');

			$this->load->view('Admin/index');
			} 
		}
		else
			return redirect('Admin');
	}
	public function courses(){
		$status=$this->uri->segment(3,0);
		$id=$this->uri->segment(4,0);
		if(!$this->session->userdata('adminlogin'))
			return redirect('Admin');
		$courses=$this->crud->get_courses($status,$id);
		$this->load->view('Admin/courses',['courses'=>$courses]);
	}
	public function add_course(){
		if(!$this->session->userdata('adminlogin'))
			return redirect('Admin');
		$status=$this->uri->segment(3,0);
		$id=$this->uri->segment(4,0);
		$config['upload_path'] = "<?=base_url('upload') ?>";
    	$config['allowed_types'] = 'gif|jpg|png';
    	$config['max_size'] = '100';
    	$config['max_width']  = '1024';
    	$config['max_height']  = '768';
    	$config['overwrite'] = TRUE;
    	$config['encrypt_name'] = FALSE;
    	$config['remove_spaces'] = TRUE;
    	$this->load->library('upload', $config);
  		if($this->form_validation->run('addcourse_rules') && $this->upload->do_upload('photo')){
		$post=$this->input->post();
		$imageDetailArray = $this->upload->data();
        $image =  $imageDetailArray['file_name'];
		$res=$this->crud->add_course($post,$status,$id);
		if($res)
			$this->session->set_flashdata('addcourse_error','success');
		else
			$this->session->set_flashdata('addcourse_error','error');
		
		return redirect('admin/courses');	
		}
		else{
		$upload_error=$this->upload->display_errors();	
   		$this->session->set_flashdata('addcourse_error','error');
		$courses=$this->crud->get_courses();
		$this->load->view('Admin/courses',['courses'=>$courses,compact('upload_error')]);
		}
	}

	public function subcourses(){
		if(!$this->session->userdata('adminlogin'))
			return redirect('Admin');
		$status=$this->uri->segment(3,0);
		$id=$this->uri->segment(4,0);
		$courses=$this->crud->get_courses();
		$scourses=$this->crud->get_scourses($status,$id);
		$this->load->view('Admin/subcourses',['scourses'=>$scourses,'courses'=>$courses]);
	}

	public function add_subcourse(){
		if(!$this->session->userdata('adminlogin'))
			return redirect('Admin');
		$config=['upload_path'=> './upload/', 
         		'allowed_types'=> 'gif|jpg|png']; 
        $this->load->library('upload',$config);
		if($this->form_validation->run('addsubcourse_rules') && $this->upload->do_upload()){
		$post=$this->input->post();
		$data=$this->upload->data();
		print_r("<script>alert(".$data.");<script>");
		$img_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
		$post['photo']=$img_path;
		echo $img_path;
		
		$res=$this->crud->add_sub_course($post);
		if($res)
			$this->session->set_flashdata('addcourse_error1','success');
		else
			$this->session->set_flashdata('addcourse_error1','error');
		
		return redirect('admin/courses');	
		}
		else{
		//$this->form_validation->set_error_delimiters('<div class="error">','</div>'); 
   		$this->session->set_flashdata('addcourse_error1','error');
		$courses=$this->crud->get_courses();
		$scourses=$this->crud->get_scourses();
		$this->load->view('Admin/subcourses',['scourses'=>$scourses,'courses'=>$courses]);
		}}

	public function category(){
		if(!$this->session->userdata('adminlogin'))
			return redirect('Admin');
		$courses=$this->crud->get_courses();
		$scourses=$this->crud->get_scourses();
		$category=$this->crud->get_category();
		$this->load->view('Admin/category',['scourses'=>$scourses,'courses'=>$courses,'category'=>$category]);
	}
}
?>