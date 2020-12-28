<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		
		if($this->session->userdata('admin_id')){   
			
		}else{
			redirect('AdminLogin');
		} 
		 
	}

	
	public function index()
	{
		

		$data['users'] = $this->db->select('*')->from('users')->where('type', 'sugnup')->get()->result_array();
		
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/home', $data);
		$this->load->view('admin/inc/footer');

	}
	

	public function dashboard()
	{
		$data['admin'] = $this->db->select('*')->from('admin')->get()->result_array();
		
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/admin_dashboard', $data);
		$this->load->view('admin/inc/footer');
	}



	public function change_email($id)
	{
		$email = $this->input->post('email');
		$this->db->set('email', $email);
		$this->db->where('id',$id);
		$this->db->update('admin');
		$msg='<div class="alert alert-success">Email Updated successfully!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function change_phone_number($id)
	{
		$phone = $this->input->post('phone');
		$this->db->set('phone', $phone);
		$this->db->where('id',$id);
		$this->db->update('admin');
		$msg='<div class="alert alert-success">Number Updated successfully!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}



	public function change_password($id)
	{

		$password = md5($this->input->post('password'));
		$this->db->set('password', $password);
		$this->db->where('id',$id);
		$this->db->update('admin');

		$msg='<div class="alert alert-success">Password Updated successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}


	public function user()
	{
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/user_page');
		$this->load->view('admin/inc/footer');
	}




	public function user_list()
	{

		$data['users'] = $this->db->select('*')->from('users')->get()->result_array();
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/user_list', $data);
		$this->load->view('admin/inc/footer');
	}



	public function questions()
	{

		$data['questions'] = $this->db->select('*')->from('questions')->get()->result_array();
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/questions', $data);
		$this->load->view('admin/inc/footer');
	}

	public function block_list()
	{

		$data['users'] = $this->db->select('*')->from('users')->where('block',1)->get()->result_array();
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/user_list', $data);
		$this->load->view('admin/inc/footer');
	}


	public function question_details($id)
	{

		$query=  $this->db->select('*, questions.id as id')->from('questions')->order_by('users.id','desc')->join('users', 'questions.user_id =users.id')->where('questions.id',$id)->get();

		$data['question'] = $query->result_array();

		$query=  $this->db->select('*')->from('answer')->order_by('answer.id','desc')->join('users', 'answer.user_id =users.id')->where('answer.question_id',$id)->get();
		$data['answers'] = $query->result_array();
		
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/question_details', $data);
		$this->load->view('admin/inc/footer');
	}

	public function reject_question($id)
	{
		$this->db->set('reject',1);
		$this->db->where('id',$id);
		$this->db->update('questions');
		$msg='<div class="alert alert-success">Question marked as rejected!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}





	public function rejected_questions()
	{

		$data['questions'] = $this->db->select('*')->from('questions')->where('reject',1)->get()->result_array();
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/rejected_questions', $data);
		$this->load->view('admin/inc/footer');
	}





	public function user_message()
	{
		$data['messages'] = $this->db->select('*')->from('contact')->order_by('id','desc')->get()->result_array();
		$this->load->view('admin/inc/header');
		$this->load->view('admin/inc/navbar');
		$this->load->view('admin/user_message', $data);
		$this->load->view('admin/inc/footer');
	}

	public function delete_message($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('contact');
		$msg='<div class="alert alert-success">Message deleted successfully!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function unblock_user($id)
	{
		$this->db->set('block',0);
		$this->db->where('id',$id);
		$this->db->update('users');
		$msg='<div class="alert alert-success">user Removed From block List!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function reply_user()
	{

			$data['email']=$this->input->post('email');
			$data['message']=$this->input->post('message');
			//$this->load->view('email_user_reply',$data);
			$result = $this->db->select('*')->from('users')->where('email', $data['email'])->get()->result_array();

			if(count($result)>0){
			$data['message_to']=$result[0]['id'];
			$data['message']=$this->input->post('message');
			$data['message_from']=1;
			$data['created_on']=strtotime("now");
			$this->db->insert('contact',$data);
			} 

		$msg='<div class="alert alert-success">Replied successfully!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}


}