<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vote extends CI_Controller {


	public function like_answer($id)
	{
	
				$data['answer_id']=$id;
				$data['user_id']=$this->session->userdata('userid');
				
				$check=  $this->db->select('*')->from('vote')->where('answer_id',$id)->where('user_id',$data['user_id'])->get();
			
				$check_number = $check->num_rows();

				if ($check_number==1) {
					$this->db->set('like_answer',1);
					$this->db->set('dislike_answer',0);
					$this->db->where('answer_id',$id);
					$this->db->update('vote');
				}
				else{
					$data['like_answer']=1;
					$this->db->insert('vote',$data);
				}
				
					
				$msg='<div class="alert alert-success"> You like an answer </div>';
					
				$this->session->set_flashdata('message',$msg);
				redirect($_SERVER['HTTP_REFERER']);

	}

	public function dislike_answer($id)
	{
	
				$data['answer_id']=$id;
				$data['user_id']=$this->session->userdata('userid');
				
				$check=  $this->db->select('*')->from('vote')->where('answer_id',$id)->where('user_id',$data['user_id'])->get()->result_array();
			

				$check_number = count($check);


				if ($check_number==1) {

					$this->db->set('like_answer',0);
					$this->db->set('dislike_answer',1);
					$this->db->where('id',$check[0]['id']);
					$this->db->update('vote');
				}
				else{
					$data['dislike_answer']=1;
					$this->db->insert('vote',$data);
				}
				
					
				$msg='<div class="alert alert-success"> You dislike an answer </div>';
					
				$this->session->set_flashdata('message',$msg);
				redirect($_SERVER['HTTP_REFERER']);

	}
}