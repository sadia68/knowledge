<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{

		$query=  $this->db->select('*, questions.id as id')->from('questions')->where('questions.reject',0)->order_by('questions.id','desc')->join('users', 'questions.user_id =users.id')->limit(5)->get();

		$data['total_questions'] =  $this->db->select('*')->from('questions')->get()->num_rows();
		$data['total_answer'] =  $this->db->select('*')->from('answer')->get()->num_rows();
		$data['total_users'] =  $this->db->select('*')->from('users')->get()->num_rows();

		$data['questions'] = $query->result_array();

		$this->load->view('template/header');
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}
}
 