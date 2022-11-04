<?php

class Admin extends CI_Controller
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
		$this->load->model('AdminModel');
		$this->load->model('DistrictModel');
		$this->load->model('Roles');
	}
	public function index()
	{
		$ad = new AdminModel();
		$data['title'] = 'ADMIN';
		$r_data['admin'] = $ad->get_all_users();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/index', $r_data);
		$this->load->view('templates/footer');

	}
	public function create($error = '')
	{
		$r = new Roles();
		$d = new DistrictModel();
		$data['title'] = 'ADMIN';
		$data['error'] = $error;
		$data['roles'] = $r->get_all_roles();
		$data['districts'] = $d->get_district();
		$this->load->view('templates/header', $data);
		$this->load->view('admin/create', $data);
		$this->load->view('templates/footer');
	}
	public function add_admin()
	{
		$this->form_validation->set_rules('Firstname', 'First Name', 'required');
		$this->form_validation->set_rules('Lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('Email', 'Email Address', 'required');
		$this->form_validation->set_rules('PhoneNumber', 'Phone Number', 'required');
		$this->form_validation->set_rules('IdNumber', 'ID Number', 'required');
		$this->form_validation->set_rules('Password', 'Password', 'required');

		if($this->form_validation->run())
		{
			$pass_word = sha1($this->input->post('Password'));
			$data = array(
				'Name'=>$this->input->post('Firstname'),
				'Lastname'=>$this->input->post('Lastname'),
				'Password'=>$pass_word,
				'PhoneNumber'=>$this->input->post('PhoneNumber'),
				'IdNumber'=>$this->input->post('IdNumber'),
				'Email'=>$this->input->post('Email'),
				'Role'=>$this->input->post('Role'),
				'District'=>$this->input->post('District'),
				'AccountStatus'=> 'Active',
			);
			$admin = new AdminModel();
			$error = '';
			if($admin->check_field('IdNumber',$this->input->post('IdNumber')) > 0)
			{
				$error = 'Id Number Already exists \r\n';
			}
			if($admin->check_field('Email',$this->input->post('Email')) > 0)
			{
				$error = 'Email Address Already exists \r\n';
			}
			if(empty($error))
			{
				$admin->add_admin($data);
				$this->index();
			}
			else{
				$this->create($error);
			}


		}


	}
}
