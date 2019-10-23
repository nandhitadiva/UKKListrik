<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('login_model');
	// }

	public function index()
	{
			$this->load->view('v_login');
	}
	public function proses_login()
	{
		$this->load->model('login_model','user');
		if ($this->session->userdata('login') == FALSE) 
		{
			$this->form_validation->set_rules('username', 'username', 'trim|required',array('required' => 'username harus diisi'));
			$this->form_validation->set_rules('password', 'password', 'trim|required',array('required' => 'Password harus diisi'));
			
			if($this->form_validation->run() == TRUE)
			{
				if ($this->user->cek_login() == TRUE)
				{
					redirect('Dashboard','refresh');
				}
				else
				{
					$this->session->set_flashdata('pesan','Login Gagal');
					redirect('Login','refresh');
				}
			}
			else{
				$this->session->set_flashdata('pesan', validation_errors());
				redirect('Login','refresh');
			}
		}else{
			redirect('Dashboard','refresh');
		}
	}
		public function logout(){
			$this->session->sess_destroy();
			redirect('Login');
		}
}
