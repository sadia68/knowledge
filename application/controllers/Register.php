<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function index()
	{

		$this->form_validation->set_rules('username', 'User Name', 'required|is_unique[users.username]|english_check');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]');

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
			$this->load->view('register');
			$this->load->view('template/footer');
		} else{

			$data['username']=$this->input->post('username');
			$data['email']=$this->input->post('email');
			$data['password']=md5($this->input->post('password'));

			$this->db->insert('users',$data);

					$msg='<div class="alert alert-success">Congratulations! Your Account Created successfully.</div>';
					
					$this->session->set_flashdata('message',$msg);

			redirect('Register/index');

		}
	}
}
