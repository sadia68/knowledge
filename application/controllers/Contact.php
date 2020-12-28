<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {


 
	public function index()
	{
		if(($this->session->userdata('userid'))){
		}else{ redirect('Login'); }
		$this->form_validation->set_rules('name', 'Name', 'required|english_check');

		$this->form_validation->set_rules('email', 'Email', 'required');

		$this->form_validation->set_rules('subject', 'Subjct', 'required');
		
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[10]');


		$this->form_validation->set_message('english_check', 'Use only alphabet and space');

				function  english_check($str){

			if (!preg_match("/^[a-zA-Z ]*$/",$str)) {
				return FALSE;
			}else{
				return TRUE;
			}

		}

		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('template/header');
			$this->load->view('contact');
			$this->load->view('template/footer');
		}else{

			$data['name']=$this->input->post('name');
			$data['email']=$this->input->post('email');
			$data['subject']=$this->input->post('subject');
			$data['message']=$this->input->post('message');
			$data['message']=$this->input->post('message');
			$data['message_to']=1;
			
			date_default_timezone_set("Asia/Dhaka");
			$data['created_on']=strtotime('now');
		if(($this->session->userdata('userid'))){
			$data['message_from'] = $this->session->userdata('userid');
		}

			$this->db->insert('contact',$data);

			$msg='<div class="alert alert-success">Thanks for your message!</div>';
		
		$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);

		
	}
}



public function my_messages(){

		if(($this->session->userdata('userid'))){
			$userid = $this->session->userdata('userid');
		} else{
			redirect('Login');
		}

			$data['results']=$this->db
			->group_start()->where('message_from',$userid)->or_where('message_from',1)->group_end()
			->group_start()->or_where('message_to',1)->or_where('message_to',$userid)->group_end()
			->get('contact')->result_array();
			//var_dump($result);
			$this->load->view('template/header');
			$this->load->view('my_messages', $data);
			$this->load->view('template/footer');

}

public function messages(){

$this->load->library('pagination');

		if (!empty($_GET['name'])) {

			$query = $this->db->LIKE('name', $_GET['name']);
			$data['name'] = $_GET['name'];
		}


		if (!empty($_GET['email'])) {

			$query = $this->db->LIKE('email', $_GET['email'],'both');
			$data['email'] = $_GET['email'];
		}

		if (!empty($_GET['message'])) {

			$query = $this->db->LIKE('message', $_GET['message'],'both');
			$data['message'] = $_GET['message'];
		}


		$query=$this->db->select('*')->from('contact')->get();

		$data['totalmessage'] = $query->num_rows();

		$data['result'] = $query->result_array();

		$config['suffix']          = "?" . http_build_query($_GET, '', "&");
		$config['base_url']        = site_url('Contact/messages/');
		$config['total_rows']      = $query->num_rows();
		$config['per_page']        = 10;
		$config['num_links']       = 4;
		$config['full_tag_open']   = '<ul class="pagination no-margin">';
		$config['full_tag_close']  = '</ul>';
		$config['cur_tag_open']    = '<li class="active"><a href="">';
		$config['cur_tag_close']   = '</a></li>';
		$config['prev_tag_open']   = '<li>';
		$config['prev_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li>';
		$config['next_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';
		$config['last_tag_open']   = '<li>';
		$config['last_tag_close']  = '</li>';
		$config['first_tag_open']  = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['next_link']       = 'Next >';
		$config['prev_link']       = '< Prev';

		if ($this->uri->segment(3)) {
			$data['segment'] = $this->uri->segment(3);
		} else {
			$data['segment'] = 0;
		}



		$this->pagination->initialize($config);


		if (!empty($_GET['name'])) {

			$query = $this->db->LIKE('name', $_GET['name']);
			$data['name'] = $_GET['name'];
		}


		if (!empty($_GET['email'])) {

			$query = $this->db->LIKE('email', $_GET['email'],'both');
			$data['email'] = $_GET['email'];
		}

		if (!empty($_GET['message'])) {

			$query = $this->db->LIKE('message', $_GET['message'],'both');
			$data['message'] = $_GET['message'];
		}


		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*')->from('contact')->get();

		$data['result'] = $query->result_array();




			$this->load->view('admin/header');
			$this->load->view('admin/sidebar');
			$this->load->view('messages',$data);
			$this->load->view('admin/footer');

}

	public function delete($id)
	{
		
		$this->db->where('id',$id);
		$this->db->delete('contact');

	$msg='<div class="alert alert-success">Deleted successfully!</div>';
		
		$this->session->set_flashdata('message',$msg);

		redirect('Contact/messages');
	}


}
