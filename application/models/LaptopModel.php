<?php

class LaptopModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_laptop($data)
	{
		$this->db->insert('laptopsheets', $data);
	}

    public function get_all_laptop()
    {
		$this->db->select("laptopsheets.Id, CONCAT(s.Name, ' ', s.Lastname) AS SignedBy, e.Percal, e.Name, e.LastName, DateIn, DateOut, TimeIn, TimeOut, AssetNumber, AssetName, EntranceId, DistrictId");
		$this->db->from('laptopsheets');
		$this->db->join('employees AS e', 'laptopsheets.Percal = e.Percal');
		$this->db->join('admins AS s', 'laptopsheets.SecurityId = s.Id');
		$results = $this->db->get();
		return $results->result_array();
    }

    public function get_all_laptop_today()
    {
		$this->db->where('datein', date('Y-m-d'));
		return $this->db->get('laptopsheets')->num_rows();
    }

	public function get_all_laptop_filter($start_date, $end_date)
	{
		$this->db->select("laptopsheets.Id, CONCAT(s.Name, ' ', s.Lastname) AS SignedBy, laptopsheets.Percal, e.Name, e.LastName, DateIn, DateOut, TimeIn, TimeOut, AssetNumber, AssetName, ");
		//$this->db->select("*");
		$this->db->from('laptopsheets');
		$this->db->join('employees AS e', 'laptopsheets.Percal = e.Percal');
		//$this->db->join('districts AS d', 'laptopsheets.districtId = d.District_Id');
		$this->db->join('admins AS s', 'laptopsheets.SecurityId = s.Id');
		$this->db->where('DateIn BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$results = $this->db->get();
		return $results->result_array();
	}

	public function get_specific_laptops($start_date, $end_date, $district)
	{
		$this->db->select("laptopsheets.Id, CONCAT(s.Name, ' ', s.Lastname) AS SignedBy, e.Percal, e.Name, e.LastName, DateIn, DateOut, TimeIn, TimeOut, AssetNumber, AssetName, EntranceId, d.District");
		$this->db->from('laptopsheets');
		$this->db->join('employees AS e', 'laptopsheets.Percal = e.Percal');
		$this->db->join('districts AS d', 'laptopsheets.districtId = d.District_Id');
		$this->db->join('admins AS s', 'laptopsheets.SecurityId = s.Id');
		$this->db->where('DistrictId', $district);
		$this->db->where('DateIn BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$results = $this->db->get();
		return $results->result_array();
	}

    public function get_specific_user($persal)
    {
		$this->db->select("laptopsheets.Id, CONCAT(s.Name, ' ', s.Lastname) AS SignedBy, e.Percal, e.Name, e.LastName, DateIn, TimeIn, AssetNumber, AssetName");
		$this->db->from('laptopsheets');
		$this->db->join('employees AS e', 'laptopsheets.Percal = e.Percal');
		//$this->db->join('districts AS d', 'laptopsheets.districtId = d.District_Id');
		$this->db->join('admins AS s', 'laptopsheets.SecurityId = s.Id');
		$this->db->where('DateOut', NULL);
		$this->db->where('laptopsheets.Percal', $persal);
		//$this->db->where('DistrictId', $district);
		//$this->db->where('DateIn BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$results = $this->db->get();
		return $results->result_array();
    }

	public function modify_checkout($id, $data)
	{
		$this->db->where('Id',$id);
		$this->db->update('laptopsheets', $data);
	}
}
