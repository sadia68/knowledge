<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogout extends CI_Controller {


	public function index()
	{
		$this->session->sess_destroy();
		
		redirect('AdminLogin');
	}
}
