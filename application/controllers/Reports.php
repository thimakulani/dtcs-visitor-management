<?php

class Reports extends CI_Controller
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
		$this->load->model('LaptopModel');
		$this->load->model('DistrictModel');
		$this->load->model('AfterHourModel');
		$this->load->model('VisitorModel');
	}
	public function index()
	{
		$data['title'] = 'REPORTS';
		$this->load->view('templates/header', $data);
		$this->load->view('reports/index');
		$this->load->view('templates/footer');
	}
	public function laptop_sheet()
	{
		$lm = new LaptopModel();
		$dt = new DistrictModel();
		$r_data['district'] = $dt->get_district();
		$title['title'] = 'REPORTS';
		$r_data['laptops'] = $lm->get_all_laptop();
		$this->load->view('templates/header', $title);
		$this->load->view('reports/laptop_sheet', $r_data);
		$this->load->view('templates/footer');
	}
	public function visitor_sheet()
	{
		$v = new VisitorModel();
		$dt = new DistrictModel();
		$r_data['district'] = $dt->get_district();
		$title['title'] = 'REPORTS';
		$r_data['visitor_sheet'] = $v->get_visitor_logsheet_only();
		$this->load->view('templates/header', $title);
		$this->load->view('reports/visitor_sheet', $r_data);
		$this->load->view('templates/footer');
	}
	public function query_visitor()
	{
		$v = new VisitorModel();
		$dt = new DistrictModel();
		$start_date = $this->input->post('start_dates');
		$end_date = $this->input->post('end_dates');
		$district = $this->input->post('district');


		if(isset($start_date) && isset($end_date) && isset($district))
		{
			$title['title'] = 'REPORTS';
			if ($district == '0') {

				$r_data['visitor_sheet'] = $v->get_visitor_logsheet($start_date, $end_date);
			} else {

				$r_data['visitor_sheet'] = $v->get_specific($start_date, $end_date, $district);
			}
			$r_data['district'] = $dt->get_district();
			$this->load->view('templates/header', $title);
			$this->load->view('reports/visitor_sheet', $r_data);
			$this->load->view('templates/footer');
		}
		else{
			$this->visitor_sheet();
		}
	}
	public function after_hour()
	{
		$ao = new AfterHourModel();
		$dt = new DistrictModel();
		$r_data['district'] = $dt->get_district();
		$title['title'] = 'REPORTS';
		$r_data['after_hour'] = $ao->get_all_after_hours();
		$this->load->view('templates/header', $title);
		$this->load->view('reports/after_hour', $r_data);
		$this->load->view('templates/footer');
	}
	public function query_laptops()
	{
		$l = new LaptopModel();
		$dt = new DistrictModel();
		$start_date = $this->input->post('start_dates');
		$end_date = $this->input->post('end_dates');
		$district = $this->input->post('district');

		if(isset($start_date) && isset($end_date) && isset($district))
		{
			$title['title'] = 'REPORTS';
			if ($district == '0')
			{
				$r_data['laptops'] = $l->get_all_laptop_filter($start_date, $end_date);
				print_r($r_data['laptops']);
			} else {
				$r_data['laptops'] = $l->get_specific_laptops($start_date, $end_date, $district);
			}
			$r_data['district'] = $dt->get_district();
			$this->load->view('templates/header', $title);
			$this->load->view('reports/laptop_sheet', $r_data);
			$this->load->view('templates/footer');
		}
		else{
			$this->laptop_sheet();
		}
	}
	public function query_after_hour()
	{
		$a = new AfterHourModel();
		$dt = new DistrictModel();
		$start_date = $this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$district = $this->input->post('district');;


		if(isset($start_date) && isset($end_date) && isset($district))
		{
			$title['title'] = 'REPORTS';
			if ($district == '0') {
				$r_data['after_hour'] = $a->get_all_after_hours_filer($start_date, $end_date);
			} else {
				$r_data['after_hour'] = $a->get_all_after_hours_query($start_date, $end_date, $district);
			}
			$r_data['district'] = $dt->get_district();
			$this->load->view('templates/header', $title);
			$this->load->view('reports/after_hour', $r_data);
			$this->load->view('templates/footer');
		}
		else{
			$this->after_hour();
		}
	}
}
