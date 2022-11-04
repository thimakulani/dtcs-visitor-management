<?php

class After_Hour extends CI_Controller
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
		$this->load->model('EmployeeModel');
		$this->load->model('AfterHourModel');
	}
	public function index()
	{
		$data['title'] = 'AFTER HOUR';
		$ao = new AfterHourModel();
		$data['after_hour'] = $ao->get_all_after_hours();
		$this->load->view('templates/header', $data);
		$this->load->view('after_hour/index', $data);
		$this->load->view('templates/footer');

	}
	public function after_hour_check($error = '')
	{
		$data['title'] = 'AFTER HOUR';
		$data['error'] = $error;
		$this->load->view('templates/header', $data);
		$this->load->view('after_hour/after_hour_check', $data);
		$this->load->view('templates/footer');
	}
	public function process_persal()
	{
		$this->form_validation->set_rules('Percal', 'Percal', 'required');
		if($this->form_validation->run())
		{
			$emp = new EmployeeModel();
			$row = $emp->check_persal($this->input->post('Percal'));
			if(!empty($row))
			{
				$this->check_in($row->Percal);
			}
			else{
				$error = '<p>Percal Number Not Registered <br />'.anchor('after_hour/create', 'CREATE EMPLOYEE').'</p> ';
				$this->after_hour_check($error);
			}
		}
		else{
			$this->after_hour_check('');
		}
	}
	public function create($error = '')
	{
		$title['title'] = "REGISTER EMPLOYEE";
		$data['error'] = $error;
		$this->load->view('templates/header',$title);
		$this->load->view('after_hour/create', $data);
		$this->load->view('templates/footer');
	}
	public function register_employees()
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
	public  function check_in($percal)
	{
		$data['title'] = 'AFTER HOUR';
		$data['percal'] = $percal;
		$this->load->view('templates/header', $data);
		$this->load->view('after_hour/check_in', $data);
		$this->load->view('templates/footer');
	}
	private function after_hour_info($percal)
	{

	}
	public function add_after_hour($p)
	{
		$this->form_validation->set_rules('Purpose', 'Purpose', 'required');
		if($this->form_validation->run())
		{
			$s_id = $_SESSION['Id'];
			$district = $_SESSION['District'];
			$ao = new AfterHourModel();
			$data = array(
				'Purpose'=> $this->input->post('Purpose'),
				'Percal'=> $p,
				'DateOut'=> null,
				'TimeOut'=> null,
				'DateIn'=> date('Y-m-d'),
				'TimeIn'=> date("h:i"),
				'SecurityId'=>$s_id,
				'DistrictId'=>$district,
			);
			$ao->add_afterhour($data);
			$d['title'] = '';
			$this->load->view('templates/header',$d);
			$this->load->view('after_hour/welcome');
			$this->load->view('templates/footer');
		}
		else{
			$this->check_in($p);
		}
	}
}
