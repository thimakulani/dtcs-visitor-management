<?php

class Settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('DistrictModel');
	}
	public function index()
	{
		$data['title'] = 'SETTINGS';
		$this->load->view('templates/header', $data);
		$this->load->view('settings/index');
		$this->load->view('templates/footer');
	}
	public function district()
	{
		$dt = new DistrictModel();
		$data['title'] = 'DISTRICT';
		$data['district'] = $dt->get_district();

		$this->load->view('templates/header', $data);
		$this->load->view('settings/district', $data);
		$this->load->view('templates/footer');
	}
	public function detail_district($id){
		$dt = new DistrictModel();
		$data['title'] = 'DISTRICT';
		$data['id'] = $id;
		$data['name'] = $dt->get_district_name($id);
		$this->load->view('templates/header', $data);
		$this->load->view('settings/detail_district', $data);
		$this->load->view('templates/footer');
	}
	public function edit_district($id)
	{
		$dt = new DistrictModel();
		$data['title'] = 'DISTRICT';
		$data['id'] = $id;
		$data['name'] = $dt->get_district_name($id);
		$this->load->view('templates/header', $data);
		$this->load->view('settings/edit_district', $data);
		$this->load->view('templates/footer');
	}
	public function update_district(){
		$this->form_validation->set_rules('name', 'Name', 'required');

		if($this->form_validation->run())
		{
			$dt = new DistrictModel();
			if($dt->search_district($this->input->post('name')))
			{
				$this->add_district('District Already Exists');
			}
			else{
				//$data = array('name'=>$this->input->post('name'));
				$dt->update_district($this->input->post('id'), $this->input->post('name'));
				$this->district();
			}
		}
		else{
			$this->add_district('');
		}
	}

	public function add_district($error = '')
	{
		$data['title'] = 'DISTRICT';
		$data['error'] = $error;
		$this->load->view('templates/header', $data);
		$this->load->view('settings/add_district',$data);
		$this->load->view('templates/footer');
	}
	public function delete_district($id){

		$dt = new DistrictModel();

		$data['title'] = 'Region';
		$data['id'] = $id;
		$data['name'] = $dt->get_district_name($id);
		$this->load->view('templates/header', $data);
		$this->load->view('settings/delete_district',$data);
		$this->load->view('templates/footer');
	}

	public function remove_district($id)
	{
		//$id = '';
		if(!empty($id))
		{
			$dt = new DistrictModel();
			$dt->delete_district($id);
		}
		$this->district();
	}
	public function create_district()
	{
		$this->form_validation->set_rules('name', 'District', 'required');

		if($this->form_validation->run())
		{
			$dt = new DistrictModel();
			if($dt->search_district($this->input->post('name')))
			{
				$this->add_district('District Already Exists');
			}
			else{
				$data = array('District'=>$this->input->post('name'));
				$dt->add_district($data);
				$this->district();
			}
		}
		else{
			$this->add_district('');
		}
	}

}
