<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna_model extends CI_Model
{
    var $table = 'mst_pegawai';
    var $colum_order = array('id_pegawai', 'nama_pegawai',  'nip', 'username', 'status', 'id_pegawai');
    var $order = array('id_pegawai', 'nama_pegawai', 'nip', 'username', 'status', 'id_pegawai');

    private function _get_data_query()
    {
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->order as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like(
                        $item,
                        $_POST['search']['value']
                    );
                }

                if (count($this->order) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_pegawai', 'DESC');
        }
    }

    public function getdatatable() //nam[ilin data pake ini
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data()
    {
        $this->_get_data_query(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function getByid($id_pegawai)
    {
        return $this->db->get_where($this->table, ['id_pegawai' => $id_pegawai])->row();
    }

    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function add($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function get_detail_role()
    {
        $this->db->select('*');
        $this->db->from('mst_pegawai');
        $this->db->join('mst_departemen', 'mst_departemen.id_departemen = mst_pegawai.id_departemen');
		$this->db->join('mst_area', 'mst_area.id_area = mst_pegawai.id_area');
        $this->db->order_by('mst_pegawai.id_pegawai', 'desc');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_area($id_departemen)
	{
		$this->db->select('*');
		$this->db->from('mst_area');
		$this->db->where('mst_area.id_departemen', $id_departemen);
		$data = $this->db->get();
		return $data->result_array();
	}

	public function get_departemen()
	{
		$this->db->select('*');
		$this->db->from('mst_departemen');
		$data = $this->db->get();
		return $data->result_array();
	}

	public function get_sub_area($id_area)
	{
		$this->db->select('*');
		$this->db->from('mst_sub_area');
		$this->db->where('mst_sub_area.id_area', $id_area);
		$data = $this->db->get();
		return $data->result_array();
	}
}
