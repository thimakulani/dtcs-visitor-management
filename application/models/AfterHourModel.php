<?php

class AfterHourModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_afterhour($data)
	{
		$this->db->insert('afterhourregisters', $data);
	}

	public function get_all_after_hours()
	{
		$this->db->select('afterhourregisters.Id, e.Percal, e.Name, e.LastName, Purpose, DateIn, DateOut, TimeIn, TimeOut, EntranceId, d.District');
		$this->db->from('afterhourregisters');
		$this->db->join('employees e', 'afterhourregisters.Percal = e.Percal');
		$this->db->join('districts AS d', 'afterhourregisters.districtId = d.District_Id');
		$r = $this->db->get();
		return $r->result_array();
	}
	public function get_all_after_hours_filer($s,$e)
	{
		$this->db->select('afterhourregisters.Id, e.Percal, e.Name, e.LastName, Purpose, DateIn, DateOut, TimeIn, TimeOut, EntranceId, DistrictId');
		$this->db->from('afterhourregisters');
		$this->db->join('employees e', 'afterhourregisters.Percal = e.Percal');
		$this->db->where('DateIn BETWEEN "'. date('Y-m-d', strtotime($s)). '" and "'. date('Y-m-d', strtotime($e)).'"');
		$r = $this->db->get();
		return $r->result_array();
	}

	public function get_all_after_hours_query($start_date, $end_date, $district)
	{
		$this->db->select('afterhourregisters.Id, e.Percal, e.Name, e.LastName, Purpose, DateIn, DateOut, TimeIn, TimeOut, EntranceId, d.District');
		$this->db->from('afterhourregisters');
		$this->db->join('employees e', 'afterhourregisters.Percal = e.Percal');
		$this->db->join('districts AS d', 'afterhourregisters.districtId = d.District_Id');
		$this->db->where('DistrictId', $district);
		$this->db->where('DateIn BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$r = $this->db->get();
		return $r->result_array();
	}

}
