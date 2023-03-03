<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	public function login($username)
	{
		$this->db->select('*');
		$this->db->from('mst_pegawai');
		$this->db->join('mst_departemen', 'mst_departemen.id_departemen = mst_pegawai.id_departemen');
		$this->db->join('mst_area', 'mst_area.id_area = mst_pegawai.id_area');
		$this->db->where(array(
			'mst_pegawai.username' => $username
		));
		$this->db->group_by('mst_pegawai.id_pegawai');
		return $this->db->get()->row();
	}

	public function update($where, $data)
	{
		$this->db->update('tbl_pegawai', $data, $where);
		return $this->db->affected_rows();
	}
	public function insert_log($data)
	{
		$this->db->insert('tbl_log_akses', $data);
		$this->db->affected_rows();
	}


	public function login_vendor($username)
	{
		$this->db->select('*');
		$this->db->from('tbl_vendor');
		$this->db->where(array(
			'tbl_vendor.username' => $username
		));
		$this->db->group_by('tbl_vendor.id_vendor');
		return $this->db->get()->row();
	}

	public function update_vendor($where, $data)
	{
		$this->db->update('tbl_vendor', $data, $where);
		return $this->db->affected_rows();
	}
	public function insert_log_vendor($data)
	{
		$this->db->insert('tbl_log_akses_vendor', $data);
		$this->db->affected_rows();
	}


	public function get_pegawai()
	{
		$this->db->select('*');
		$this->db->from('mst_pegawai');
		$this->db->where('mst_pegawai.id_pegawai', $this->session->userdata('id_pegawai'));
		return $this->db->get()->row_array();
	}
	
}
