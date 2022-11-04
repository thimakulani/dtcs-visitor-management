<?php

class Visitor extends CI_Controller
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
		$this->load->model('VisitorModel');
	}
	public  function index()
	{
		$visitors = new VisitorModel();
		$data['title'] = 'VISITORS';
		$v['visitors'] = $visitors->get_all_visitors();
		$this->load->view('templates/header', $data);
		$this->load->view('visitors/index', $v);
		$this->load->view('templates/footer');
	}
	public  function edit($id)
	{
		$visitors = new VisitorModel();
		$data['title'] = 'VISITORS';
		$v['visitor'] = $visitors->get_single_visitor($id);
		$v['check_in'] = $visitors->get_visitor_check_in($id);

		$this->load->view('templates/header', $data);
		$this->load->view('visitors/edit', $v);
		$this->load->view('templates/footer');
	}
	public function update($id)
	{
		$this->form_validation->set_rules('identification', 'Identification', 'required');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone Number', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->edit($id);
		}
		else{
			$this->load->database();
			$data = array(
				'Name' => $this->input->post('firstname'),
				'LastName' => $this->input->post('lastname'),
				'IdNumber' => $this->input->post('identification'),
				'Address' => $this->input->post('address'),
				'PhoneNumber' => $this->input->post('phone'),
			);
			$this->load->model('VisitorModel');
			$v = new VisitorModel();
			$v->update_user($id, $data);
			$this->edit($id);
		}

	}
	public  function check_in()
	{
		$data['title'] = 'VISITORS';
		$this->load->view('templates/header', $data);
		$this->load->view('visitors/check_in', $data);
		$this->load->view('templates/footer');
	}
	public function check_in_info($id)
	{
		$title['title'] = 'Laptop Register';
		$data['id_number'] = $id;
		$this->load->view('templates/header', $title);
		$this->load->view('laptop/laptop_info',$data);
		$this->load->view('templates/footer');
	}
	public function create($error = '')
	{
		$title['title'] = 'VISITOR REGISTER';
		$data['error'] = $error;
		$this->load->view('templates/header', $title);
		$this->load->view('visitors/create', $data);
		$this->load->view('templates/footer');
	}
	public function process_register()
	{
		$errors = '';

		$this->form_validation->set_rules('id', 'Identification', 'required');
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('phone_number', 'Phone Number', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->create('');
		}
		else{
			$this->load->database();
			$data = array(
				'Name' => $this->input->post('firstname'),
				'LastName' => $this->input->post('lastname'),
				'IdNumber' => $this->input->post('id'),
				'Address' => $this->input->post('address'),
				'PhoneNumber' => $this->input->post('phone_number'),
			);
			$this->load->model('VisitorModel');
			$v = new VisitorModel();
			$row = $v->get_visitor($this->input->post('id'));
			if(!empty($row))
			{
				$errors = 'Identification already exists';
			}
			if(empty($errors))
			{
				$v->add_visitor($data);
				$this->index();
			}
			else{
				$this->create($errors);
			}
		}
	}
	public function process_id()
	{
		$this->form_validation->set_rules('IdNumber', 'ID Number', 'required');
		if($this->form_validation->run())
		{
			$v = new VisitorModel();
			$row = $v->get_visitor($this->input->post('IdNumber'));
			if(empty($row))
			{
				//$this->check_in_info($this->input->post('IdNumber'));
				$this->create($this->input->post('IdNumber').' IS NOT REGISTERED');
			}
			else{
				$data = array(
					'VisitorId'=>$row->Id,
					'SecurityId'=>$_SESSION['Id'],
					'DistrictId'=>$_SESSION['District'],
					'EntranceId'=>$row->Id,
					'DateIn'=> date('Y-m-d'),
					'TimeIn'=> date("h:i"),
				);
				$v->add_visitor_logsheet($data);
				$d['title'] = '';
				$this->load->view('templates/header',$d);
				$this->load->view('visitors/welcome');
				$this->load->view('templates/footer');
			}
		}
		else{
			$this->check_in();
		}
	}
}
