<?php

class LoginModel extends CI_Model
{

	public function can_login($email, $password){
		$this->load->database();
		$this->db->where('email',$email);
		$this->db->where('password',sha1($password));
		return $this->db->get("admins");
	}

	public function get_email($email)
	{
		$this->load->database();
		$this->db->where('email',$email);
		return $this->db->get("admins");
	}

	public function update_password($Id, $password)
	{
		$this->db->set('password', $password);
		$this->db->where('id', $Id);
		$this->db->update('admins');
	}
}
