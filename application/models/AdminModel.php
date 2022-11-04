<?php

class AdminModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_admin($data)
	{
		$this->db->insert('admins', $data);
	}
	public function check_field($f, $v){
		$this->db->where($f, $v);
		$results = $this->db->get('admins');
		return $results->num_rows();
	}

	public function get_all_users()
	{
		$this->db->select('Id, Name, Lastname, Email, PhoneNumber, IdNumber, Username, Password, r.RoleName, AccountStatus, d.District');
		$this->db->from('admins');
		$this->db->join('roles AS r','admins.Role = r.roleId');
		$this->db->join('districts AS d','admins.District = d.District_Id');
		$results = $this->db->get()->result_array();
		return $results;
	}
}
