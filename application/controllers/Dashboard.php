<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('VisitorModel');
		$this->load->model('LaptopModel');
	}
	public function index()
	{
		$v = new VisitorModel();
		$l = new LaptopModel();
		$data['title'] = 'Dashboard';
		$r_data['v_counter'] = $v->get_all_visitors_today();
		$r_data['l_counter'] = $l->get_all_laptop_today();
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index',$r_data);
		$this->load->view('templates/footer');
	}
}
