<?php

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('LoginModel');
	}
	public function index($error = '')
	{
		$data['error'] = $error;
		$this->load->view('pages/login', $data);
	}
	public function forgot_password($error ='')
	{
		$data['error'] = $error;
		$this->load->view('pages/forgot_password', $data);
	}
	public function login_validation()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->index('');
		}else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$login = new LoginModel();
			$row = $login->can_login($email, $password)->row();
			if($row !== null)
			{
				$this->session->set_userdata('Id', $row->Id);
				$this->session->set_userdata('District', $row->District);
				$this->session->set_userdata('Email', $row->Name.' '.$row->Lastname);
				redirect('dashboard');
			}
			else{
				$this->index('Invalid email or password');
			}
		}
	}
	public function password_validation()
	{
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->forgot_password('');//->view('pages/login');
		}else{
			$email = $this->input->post('email');
			$password = sha1($this->input->post('password'));
			$login = new LoginModel();
			$row = $login->get_email($email)->row();
			if($row !== null)
			{
				$login->update_password($row->Id, $password);
				$this->load->view('pages/complete');
			}
			else{
				$this->forgot_password('Invalid email');
			}
		}
	}
}
