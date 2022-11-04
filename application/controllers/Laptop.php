<?php

class Laptop extends CI_Controller
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
		$this->load->model('LaptopModel');
	}
	public function laptop_check_in($error = '')
	{
		$title['title'] = 'Laptop Register';
		$data['error'] = $error;
		$this->load->view('templates/header', $title);
		$this->load->view('laptop/laptop_check_in', $data);
		$this->load->view('templates/footer');
	}
	public function laptop_check_out($error = '')
	{
		$title['title'] = 'Laptop Register';
		$data['error'] = $error;
		$this->load->view('templates/header', $title);
		$this->load->view('laptop/laptop_check_out', $data);
		$this->load->view('templates/footer');
	}
	public function index()
	{
		$lm = new LaptopModel();

		$title['title'] = 'Laptop Register';
		$r_data['laptops'] = $lm->get_all_laptop();
		$this->load->view('templates/header', $title);
		$this->load->view('laptop/index', $r_data);
		$this->load->view('templates/footer');
	}
	public function process_persal_checkout()
	{
		$this->form_validation->set_rules('Percal', 'Percal', 'required');
		if($this->form_validation->run())
		{
			$emp = new EmployeeModel();
			$row = $emp->check_persal($this->input->post('Percal'));
			if(!empty($row))
			{
				$this->checkout_list($this->input->post('Percal'));
			}
			else{
				$error = '<p>Percal Number Not Registered <br />'.anchor('laptop/create', 'CREATE EMPLOYEE').'</p>';
				$this->laptop_check_in($error);
			}
		}
		else{
			$this->laptop_check_in('');
		}
	}
	public function verify()
	{
		$id = $this->input->get('id');
		$persal = $this->input->get('persal');
		$laptop = new  LaptopModel();
		$data = array(
			'DateOut'=>date('Y-m-d'),
			'TimeOut'=>date("h:i"),
		);
		$laptop->modify_checkout($id, $data);
		$this->checkout_list($persal);
	}
	public function checkout_list($persal)
	{
		$emp = new EmployeeModel();
		$laptop = new LaptopModel();
		$title['title'] = "REGISTER EMPLOYEE";
		$data['results'] = $emp->check_persal($persal);
		$data['laptops'] = $laptop->get_specific_user($persal);
		$this->load->view('templates/header',$title);
		$this->load->view('laptop/checkout_list', $data);
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
				$this->laptop_info($this->input->post('Percal'));
			}
			else{
				$error = '<p>Percal Number Not Registered <br />'.anchor('laptop/create', 'CREATE EMPLOYEE').'</p>';
				$this->laptop_check_in($error);
			}
		}
		else{
			$this->laptop_check_in('');
		}
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
	public function create($error = '')
	{
		$title['title'] = "REGISTER EMPLOYEE";
		$data['error'] = $error;
		$this->load->view('templates/header',$title);
		$this->load->view('laptop/create', $data);
		$this->load->view('templates/footer');
	}
	public function laptop_info($p)
	{
		$title['title'] = 'LAPTOP REGISTER';
		$data['percal'] = $p;

		$this->load->view('templates/header', $title);
		$this->load->view('laptop/laptop_info',$data);
		$this->load->view('templates/footer');
	}
	public function add_laptop($percal)
	{
		$lp = new LaptopModel();
		$this->form_validation->set_rules('Description', 'Description', 'required');
		$this->form_validation->set_rules('SerialNo', 'Serial No', 'required');
		$this->form_validation->set_rules('Ownership', 'Ownership', 'required');
		//$this->form_validation->set_rules('Percal', 'Percal', 'required');
		if($this->form_validation->run())
		{
			$s_id = $_SESSION['Id'];
			$district= $_SESSION['District'];
			$data = array(
				'AssetName'=>$this->input->post('Description'),
				'AssetNumber'=>$this->input->post('SerialNo'),
				'Ownership'=>$this->input->post('Ownership'),
				'Percal'=>$percal,
				'DateIn'=>date('Y-m-d'),
				'SecurityId'=>$s_id,
				'TimeIn'=>date("h:i"),
				'DistrictId'=>$district,
			);
			$lp->add_laptop($data);
			//echo 'processed';
			$this->welcome();
		}
		else{

			$this->laptop_info($percal);
		}
	}
	public function welcome()
	{
		$d['title'] = '';
		$this->load->view('templates/header',$d);
		$this->load->view('laptop/welcome');
		$this->load->view('templates/footer');
	}
	
}
