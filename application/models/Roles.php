<?php

class Roles extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_all_roles()
	{
		return $this->db->get('roles')->result_array();
	}
}
