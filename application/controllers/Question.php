<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Question extends CI_Controller {

	public function index()
	{
		if(($this->session->userdata('userid'))){
		}else{ redirect('Login'); }


$this->load->library('pagination');



		if (!empty($_GET['title'])) {

			$query = $this->db->LIKE('title', $_GET['title'],'both');
			$query = $this->db->OR_LIKE('description', $_GET['title'],'both');
		}

		if (!empty($_GET['category_id'])) {
			$query = $this->db->where('category_id', $_GET['category_id']);
		}


		$query=$this->db->select('*, questions.id as id')->from('questions')->where('questions.reject',0)->order_by('questions.id','desc')->join('users', 'questions.user_id =users.id')->get();
		
		$data['result'] = $query->result_array();

		$config['suffix']          = "?" . http_build_query($_GET, '', "&");
		$config['base_url']        = site_url('Question/index');
		$config['total_rows']      = $query->num_rows();
		$config['per_page']        = 10;
		$config['num_links']       = 4;
		$config['full_tag_open']   = '<ul class="pagination">';
		$config['full_tag_close']  = '</ul>';
		$config['cur_tag_open']    = '<li class="page-item active"><a href="" class="page-link">';
		$config['cur_tag_close']   = '</a></li>';
		$config['prev_tag_open']   = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';
		$config['last_tag_open']   = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['next_link']       = 'Next >>';
		$config['prev_link']       = '<< Prev';

		if ($this->uri->segment(3)) {
			$data['segment'] = $this->uri->segment(3);
		} else {
			$data['segment'] = 0;
		}

		$this->pagination->initialize($config);

		if (!empty($_GET['title'])) {

			$query = $this->db->LIKE('title', $_GET['title'],'both');
			$query = $this->db->OR_LIKE('description', $_GET['title'],'both');
		}


		if (!empty($_GET['category_id'])) {
			$query = $this->db->where('category_id', $_GET['category_id']);
		}


		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*, questions.id as id')->from('questions')->where('questions.reject',0)->order_by('questions.id','desc')->join('users', 'questions.user_id =users.id')->get();

		$data['result'] = $query->result_array();


		$this->load->view('template/header');
		$this->load->view('question', $data);
		$this->load->view('template/footer');
	}

	public function add_question()
	{

		if(($this->session->userdata('userid'))){
		}else{ redirect('Login'); }


		$this->form_validation->set_rules('title', 'Question title', 'required');

		$this->form_validation->set_rules('category_id', 'Category', 'required');
		
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[10]');
		
		if ($this->form_validation->run() == FALSE)
		{

			$this->load->view('template/header');
			$this->load->view('add_question');
			$this->load->view('template/footer');

		}else{


			$data['title']=$this->input->post('title');
			$data['description']=$this->input->post('description');
			$data['code']=$this->input->post('code');
			$data['category_id']=$this->input->post('category_id');
			$data['user_id']=$this->session->userdata('userid');
			$data['date']=time();

			$this->db->insert('questions',$data);


			$last_id=$this->db->insert_id();

			$msg='<div class="alert alert-success"> Your question posted successfully. </div>';


			$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);


		}

	}

	public function question_details($id)
	{

		if(($this->session->userdata('userid'))){
		}else{ redirect('Login'); }

		$this->db->set('seen','seen+1',FALSE);
		$this->db->where('id',$id);
		$this->db->update('questions');

		$query=  $this->db->select('*, questions.id as id')->from('questions')->order_by('users.id','desc')->join('users', 'questions.user_id =users.id')->where('questions.id',$id)->get();

		$data['question'] = $query->result_array();

		$query=  $this->db->select('*, answer.id as answerId')->from('answer')->order_by('answer.id','desc')->join('users', 'answer.user_id =users.id')->where('answer.question_id',$id)->get();
		$data['answers'] = $query->result_array();

		$data['id']=$id;
		
		$this->load->view('template/header');
		$this->load->view('question_details',$data);
		$this->load->view('template/footer');
	}

	
	public function answer($id){
		
		if(($this->session->userdata('userid'))){
		}else{ redirect('Login'); }

/*		$check=  $this->db->select('*')->from('answer')->where('question_id',$id)->where('user_id',$this->session->userdata('userid'))->get()->num_rows();
		if ($check>0) {

			$msg='<div class="alert alert-danger"> You already answered this question! </div>';

			$this->session->set_flashdata('message',$msg);

			redirect($_SERVER['HTTP_REFERER']);	
		}*/

		$insert_data['answer']=nl2br($this->input->post('answer'));
		$insert_data['user_id']=$this->session->userdata('userid');
		$insert_data['question_id']=$id;

		$this->db->insert('answer',$insert_data);

		$this->db->set('answer','answer+1',FALSE);
		$this->db->where('id',$id);
		$this->db->update('questions');

		$msg='<div class="alert alert-success"> Thanks for your answer! </div>';

		$this->session->set_flashdata('message',$msg);

		redirect($_SERVER['HTTP_REFERER']);	

	}
	


	public function my_questions()
	{
		if(($this->session->userdata('userid'))){
		}else{ redirect('Login'); }


$this->load->library('pagination');

		$query=$this->db->select('*, questions.id as id')->from('questions')->order_by('questions.id','desc')->join('users', 'questions.user_id =users.id')->where('questions.user_id',$this->session->userdata('userid'))->get();


		$data['result'] = $query->result_array();

		$config['suffix']          = "?" . http_build_query($_GET, '', "&");
		$config['base_url']        = site_url('Question/my_questions');
		$config['total_rows']      = $query->num_rows();
		$config['per_page']        = 10;
		$config['num_links']       = 4;
		$config['full_tag_open']   = '<ul class="pagination">';
		$config['full_tag_close']  = '</ul>';
		$config['cur_tag_open']    = '<li class="page-item active"><a href="" class="page-link">';
		$config['cur_tag_close']   = '</a></li>';
		$config['prev_tag_open']   = '<li class="page-item">';
		$config['prev_tag_close']  = '</li>';
		$config['next_tag_open']   = '<li class="page-item">';
		$config['next_tag_close']  = '</li>';
		$config['num_tag_open']    = '<li>';
		$config['num_tag_close']   = '</li>';
		$config['last_tag_open']   = '<li class="page-item">';
		$config['last_tag_close']  = '</li>';
		$config['first_tag_open']  = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		$config['next_link']       = 'Next >>';
		$config['prev_link']       = '<< Prev';

		if ($this->uri->segment(3)) {
			$data['segment'] = $this->uri->segment(3);
		} else {
			$data['segment'] = 0;
		}

		$this->pagination->initialize($config);

		$query = $this->db->limit($config['per_page'], $data['segment'])->select('*, questions.id as id')->from('questions')->order_by('questions.id','desc')->join('users', 'questions.user_id =users.id')->where('questions.user_id',$this->session->userdata('userid'))->get();

		$data['result'] = $query->result_array();


		$this->load->view('template/header');
		$this->load->view('my_questions', $data);
		$this->load->view('template/footer');
	}



	public function update_question($id)
	{

		if(($this->session->userdata('userid'))){
		}else{ redirect('Login'); }


		$this->form_validation->set_rules('title', 'Question title', 'required');

		$this->form_validation->set_rules('category_id', 'Category', 'required');
		
		$this->form_validation->set_rules('description', 'Description', 'required|min_length[10]');
		
		if ($this->form_validation->run() == FALSE)
		{
		$query=  $this->db->select('*, questions.id as id')->from('questions')->order_by('users.id','desc')->join('users', 'questions.user_id =users.id')->where('questions.id',$id)->get();

		$data['question'] = $query->result_array();


			$this->load->view('template/header');
			$this->load->view('update_question',$data);
			$this->load->view('template/footer');

		}else{


			$data['title']=$this->input->post('title');
			$data['description']=$this->input->post('description');
			$data['code']=$this->input->post('code');
			$data['category_id']=$this->input->post('category_id');
			$data['user_id']=$this->session->userdata('userid');
			$data['date']=time();

			$this->db->where('id',$id);
			$this->db->update('questions',$data);


			$last_id=$this->db->insert_id();

			$msg='<div class="alert alert-success"> Question updated successfully. </div>';


			$this->session->set_flashdata('message',$msg);
			redirect($_SERVER['HTTP_REFERER']);


		}

	}	public function delete_question($id)


	{
		$this->db->where('id',$id);
		$this->db->delete('questions');
		$msg='<div class="alert alert-success">Question deleted successfully!</div>';
		$this->session->set_flashdata('message',$msg);
		redirect($_SERVER['HTTP_REFERER']);
	}


}
