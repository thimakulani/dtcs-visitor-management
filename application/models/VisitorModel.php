<?php

class VisitorModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_visitor($data)
	{
		$this->db->insert('visitors', $data);
	}
	public function get_all_visitors()
	{
		$results = $this->db->get('visitors');
		return $results->result_array();
	}
	public function get_visitor($id)
	{
		$this->db->where('idnumber', $id);
		$results = $this->db->get('visitors');
		return $results->row();
	}

	public function add_visitor_logsheet(array $data)
	{
		$this->db->insert('visitorlogsheets', $data);
	}
	public function get_visitor_logsheet_only()
	{
		$this->db->select('visitorlogsheets.Id, DateIn, TimeIn, d.District, v.Name, v.LastName, v.IdNumber , EntranceId');

		$this->db->from( 'visitorlogsheets');
		$this->db->join('visitors AS v', 'visitorlogsheets.VisitorId = v.Id');
		$this->db->join('districts AS d', 'visitorlogsheets.districtId = d.District_Id');
		return $this->db->get()->result_array();
	}
	public function get_visitor_logsheet($s,$e)
	{
		$this->db->select('visitorlogsheets.Id, DateIn, TimeIn, d.District, v.Name, v.LastName, v.IdNumber , EntranceId');
		$this->db->from( 'visitorlogsheets');
		$this->db->join('visitors AS v', 'visitorlogsheets.VisitorId = v.Id');
		$this->db->join('districts AS d', 'visitorlogsheets.districtId = d.District_Id');
		$this->db->where('DateIn BETWEEN "'. date('Y-m-d', strtotime($s)). '" and "'. date('Y-m-d', strtotime($e)).'"');
		 return $this->db->get()->result_array();
	}

	public function get_specific($start_date, $end_date, $district)
	{
		$this->db->select('visitorlogsheets.Id, DateIn, TimeIn, d.District, v.Name, v.LastName, v.IdNumber , EntranceId');

		$this->db->from( 'visitorlogsheets');
		$this->db->join('visitors AS v', 'visitorlogsheets.VisitorId = v.Id');
		$this->db->join('districts AS d', 'visitorlogsheets.districtId = d.District_Id');
		$this->db->where('DistrictId', $district);
		$this->db->where('DateIn BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		return $this->db->get()->result_array();
	}

	public function get_all_visitors_today()
	{
		$this->db->where( 'datein', date('Y-m-d'));
		return $this->db->get('visitorlogsheets')->num_rows();
	}

	public function get_single_visitor($id)
	{
		$this->db->where('Id', $id);
		$results = $this->db->get('visitors');
		return $results->row();
	}

	public function get_visitor_check_in($id)
	{
		$this->db->select("visitorlogsheets.Id, DateIn, TimeIn, CONCAT(s.Name, ' ', s.Lastname) AS SignedBy");
		$this->db->from( 'visitorlogsheets');
		$this->db->join('Admins AS s', 'visitorlogsheets.SecurityId = s.Id');
		$this->db->where('VisitorId', $id);
		$results = $this->db->get();
		return $results->result_array();
	}

	public function update_user($id, $data)
	{
		$this->db->where('Id', $id);
		$this->db->update('visitors',$data );
	}

}
