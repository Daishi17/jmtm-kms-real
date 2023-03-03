<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrasi_kontrak_model extends CI_Model
{

    var $table = 'tbl_kontrak';
    var $colum_order = array('no_kontrak', 'nama_pekerjaan',  'tanggal_kontrak', 'total_kontrak', 'id_vendor');
    var $order = array('no_kontrak', 'nama_pekerjaan',  'tanggal_kontrak', 'total_kontrak', 'id_vendor');

    private function _get_data_query()
    {
        $this->db->from($this->table);
        $this->db->join('tbl_vendor', 'tbl_kontrak.id_vendor = tbl_vendor.id_vendor');
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
            $this->db->order_by('no_kontrak', 'DESC');
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

    var $order2 = array('id_adendum', 'no_adendum', 'tanggal_adendum', 'jumlah', 'no_kontrak');
    private function _get_data_query_adendum($no_kontrak)
    {
        $this->db->from('tbl_adendum');
        $this->db->where('no_kontrak', $no_kontrak);
        $this->db->order_by('no_adendum');
        $i = 0;
        foreach ($this->order2 as $item) // looping awal
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

                if (count($this->order2) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_adendum', 'DESC');
        }
    }

    public function getdatatable_adendum($no_kontrak) //nam[ilin data pake ini
    {
        $this->_get_data_query_adendum($no_kontrak); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_adendum($no_kontrak)
    {
        $this->_get_data_query_adendum($no_kontrak); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_adendum($no_kontrak)
    {
        $this->db->from('tbl_kontrak');
        $this->db->where('no_kontrak', $no_kontrak);
        return $this->db->count_all_results();
    }

    public function add_data($data)
    {
        $this->db->insert('tbl_kontrak', $data);
    }

    public function add_ke_detail($data)
    {
        $this->db->insert('tbl_detail_kontrak', $data);
    }




    public function get_vendor()
    {
        $this->db->select('*');
        $this->db->from('tbl_vendor');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_program()
    {
        $this->db->select('*');
        $this->db->from('tbl_program');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_kontrak($no_kontrak)
    {
        $this->db->select('*');
        $this->db->from('tbl_kontrak');
        $this->db->join('tbl_vendor', 'tbl_kontrak.id_vendor = tbl_vendor.id_vendor', 'left');
        $this->db->where('no_kontrak', $no_kontrak);
        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_by_kontrak($no_kontrak)
    {
        $this->db->select('*');
        $this->db->from('tbl_adendum');
        $this->db->where('no_kontrak', $no_kontrak);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function cek_adendum_kontrak($no_kontrak)
    {
        $this->db->select('*');
        $this->db->from('tbl_adendum');
        $this->db->where('no_kontrak', $no_kontrak);
        $this->db->order_by('no_adendum', 'desc');
        $query = $this->db->get();
        return $query->row_array();
    }

    public function tambah_adendum($no_kontrak)
    {
        $this->db->insert('tbl_adendum', $no_kontrak);
        return $this->db->affected_rows();
    }

    public function update_data($data, $where)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function get_by_program_penyedia($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_program_penyedia_jasa');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function update_ke_program_penyedia_jasa($where, $data)
    {
        $this->db->update('tbl_detail_program_penyedia_jasa', $data, $where);
        return $this->db->affected_rows();
    }

    public function update_kontrak($where, $data)
    {
        $this->db->update('mst_kontrak', $data, $where);
        return $this->db->affected_rows();
    }

}
