<?php

class EmployeeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function check_persal($p)
	{
		$this->db->where('percal', $p);
		$results = $this->db->get('employees');
		return $results->row();
	}
	public function register_employee($data)
	{
		$this->db->insert('employees', $data);
	}

    public function get_employee($persal)
    {
    }

    public function get_all_employees()
    {
		$results = $this->db->get('employees');
		return $results->result_array();
    }
}
