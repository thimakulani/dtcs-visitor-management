<?php

class Employee extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array(
			'form',
			'url'
		));
		$this->load->model('EmployeeModel');
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{

		$emp = new EmployeeModel();
		$data['employees'] = $emp->get_all_employees();
		$title['title'] = "Employees";



		$this->load->view('templates/header',$title);
		$this->load->view('employee/index',$data);
		$this->load->view('templates/footer');
	}
	public function create()
	{
		$title['title'] = "Employees";
		$data['error'] = '';
		$this->load->view('templates/header',$title);
		$this->load->view('employee/create',$data);
		$this->load->view('templates/footer');
	}
	public function register_employee()
	{
		$errors = '';

		$this->form_validation->set_rules('percal', 'Percal', 'required');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Surname', 'required');
		$this->form_validation->set_rules('business_unit', 'Business Unit', 'required');
		$this->form_validation->set_rules('extension', 'Extension', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->create('');

		}
		else{

			$this->load->database();
			$data = array(
				'Name' => $this->input->post('firstname'),
				'LastName' => $this->input->post('lastname'),
				'Percal' => $this->input->post('percal'),
				'BusinessUnit' => $this->input->post('business_unit'),
				'Extension' => $this->input->post('extension'),
			);

			$emp = new EmployeeModel();
			$row = $emp->check_persal($this->input->post('percal'));
			if(!empty($row))
			{
				$errors = 'Percal already exists';
			}
			if(empty($errors)) {
				$emp->register_employee($data);
				$this->index();
			}
			else{
				$this->create($errors);
			}
		}
	}
}
