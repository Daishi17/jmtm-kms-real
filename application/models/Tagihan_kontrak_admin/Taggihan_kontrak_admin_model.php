<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Taggihan_kontrak_admin_model extends CI_Model
{
    var $filed = array('no_addendum', 'tanggal_addendum', 'nilai_addendum', 'id_addendum');
    private function _get_all_adendum($id_detail_program_penyedia_jasa = null)
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('tbl_addendum_kontrak_penyedia_jasa');
        $this->db->join('tbl_detail_program_penyedia_jasa', 'tbl_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa = tbl_addendum_kontrak_penyedia_jasa.id_detail_program_penyedia_jasa', 'left');
        if (isset($id_detail_program_penyedia_jasa)) {
            $this->db->like('tbl_addendum_kontrak_penyedia_jasa.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        }
        foreach ($this->filed as $item) // looping awal
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

                if (count($this->filed) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->filed[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_addendum_kontrak_penyedia_jasa.no_addendum', 'DESC');
        }
    }

    public function GetByKontrakAdendum($id_detail_program_penyedia_jasa) //nam[ilin data pake ini
    {
        $this->_get_all_adendum($id_detail_program_penyedia_jasa); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_adendum($id_detail_program_penyedia_jasa)
    {
        $this->_get_all_adendum($id_detail_program_penyedia_jasa); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_seacrh_adendum($id_detail_program_penyedia_jasa)
    {
        $this->_get_all_adendum($id_detail_program_penyedia_jasa);
        return $this->db->count_all_results();
    }



    var $filed_rapot = array('id_rapot_mc_traking', 'id_mc', 'uraian', 'pic', 'tanggal_rapot', 'catatan_rapot', 'hari_vendor', 'hari_area', 'hari_pusat', 'hari_finance');
    private function _get_all_rapot($id_mc = null)
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('tbl_rapot_dummy');
        $this->db->where('id_mc', $id_mc);
        foreach ($this->filed_rapot as $item) // looping awal
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

                if (count($this->filed_rapot) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->filed_rapot[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('tbl_rapot_dummy.id_rapot_mc_traking', 'ASC');
        }
    }

    public function getdattable_rapot_traking($id_mc) //nam[ilin data pake ini
    {
        $this->_get_all_rapot($id_mc); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_rapot_traking($id_mc)
    {
        $this->_get_all_rapot($id_mc); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_seacrh_rapot_traking($id_mc)
    {
        $this->_get_all_rapot($id_mc);
        return $this->db->count_all_results();
    }

    public function GetByIdKontrak($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_program_penyedia_jasa');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $data = $this->db->get();
        return $data->row_array();
    }


    public function GetByIdKontrakDetail($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->join('tbl_detail_program_penyedia_jasa', 'tbl_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa = tbl_mc.id_detail_program_penyedia_jasa', 'left');
        $this->db->where('tbl_mc.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->order_by('CAST(no_mc AS DECIMAL(1)) ASC');
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_addendum($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_addendum_kontrak_penyedia_jasa');
        $this->db->join('tbl_detail_program_penyedia_jasa', 'tbl_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa = tbl_addendum_kontrak_penyedia_jasa.id_detail_program_penyedia_jasa', 'left');
        $this->db->where('tbl_addendum_kontrak_penyedia_jasa.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->group_by('tbl_addendum_kontrak_penyedia_jasa.id_addendum');
        $data = $this->db->get();
        return $data->result_array();
    }




    public function get_row_kontrak($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_detail_program_penyedia_jasa');
        $this->db->join('mst_kontrak', 'mst_kontrak.id_kontrak = tbl_detail_program_penyedia_jasa.id_kontrak', 'left');
        $this->db->where('tbl_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->group_by('tbl_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa');
        $data = $this->db->get();
        return $data->row_array();
    }



    public function cekKontrak($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('tbl_mc.id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function cek_row_mc($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('tbl_mc.id_mc', $id_mc);
        $data = $this->db->get();
        return $data->row_array();
    }

    public function cek_row_rapot_dummy($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_rapot_dummy');
        $this->db->join('tbl_mc', 'tbl_mc.id_mc = tbl_rapot_dummy.id_mc', 'left');
        $this->db->where('tbl_rapot_dummy.id_mc', $id_mc);
        $this->db->where('tbl_rapot_dummy.uraian', 'Pencairan');
        $data = $this->db->get();
        return $data->row_array();
    }




    public function cek_mc_traking($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_traking_mc');
        $this->db->join('tbl_mc', 'tbl_mc.id_mc = tbl_traking_mc.id_mc', 'left');
        $this->db->where('tbl_traking_mc.id_mc', $id_mc);
        $data = $this->db->get();
        return $data->row_array();
    }


    public function cek_mc_traking_row($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_traking_mc');
        $this->db->where('tbl_traking_mc.id_mc', $id_mc);
        $data = $this->db->get();
        return $data->row();
    }



    public function cek_only_no_mc($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }



    public function get_last_mc($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->order_by('tbl_mc.no_mc', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }
    public function cek_pertama_mc_apa($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->order_by('tbl_mc.id_mc', 'ASC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }


    public function get_last_mc_jumlah($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        // $this->db->order_by('tbl_mc.no_mc', 'DESC');
        $this->db->order_by('CAST(no_mc AS DECIMAL(1)) DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }


    public function insert_mc($data)
    {
        $this->db->insert('tbl_mc', $data);
    }



    public function create_grafik($data)
    {
        $this->db->insert('tbl_grafik_pencairan', $data);
    }


    public function create_file_mc($data)
    {
        $this->db->insert('tbl_traking_mc', $data);
    }

    // public function create_rapot($data)
    // {
    //     $this->db->insert('tbl_rapot_mc_traking', $data);
    // }


    public function update_mc($data, $where)
    {
        $this->db->where('id_mc', $where);
        $this->db->update('tbl_mc', $data);
    }
    public function update_mc_traking($data, $where)
    {
        $this->db->where('id_traking ', $where);
        $this->db->update('tbl_traking_mc', $data);
    }

    public function delete_mc_traking($id_traking)
    {
        $this->db->delete('tbl_traking_mc', ['id_traking' => $id_traking]);
    }

    // kode otomatis mc
    public function get_kode_mc($id_detail_program_penyedia_jasa)
    {
        $this->db->select_max('no_mc');
        $this->db->from('tbl_mc');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->not_like('no_mc', 'um');
        $data = $this->db->get();
        $hasil = $data->row();
        return $hasil->no_mc;
    }

    // // vendor  JANGAN DI APUS
    // public function get_traking_vendor($id_mc)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_rapot_mc_traking');
    //     $this->db->where('id_mc', $id_mc);
    //     $this->db->where('uraian', 'Vendor Kirim Berkas');
    //     $this->db->order_by('tbl_rapot_mc_traking.id_mc', 'DESC');
    //     $this->db->limit(1);
    //     $data = $this->db->get();
    //     return $data->row_array();
    // }
    // // area
    // public function get_traking_area($id_mc)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_rapot_mc_traking');
    //     $this->db->where('id_mc', $id_mc);
    //     $this->db->where('pic', 'Area');
    //     $this->db->order_by('tbl_rapot_mc_traking.id_mc', 'DESC');
    //     $this->db->limit(1);
    //     $data = $this->db->get();
    //     return $data->row_array();
    // }
    // public function get_traking_pusat($id_mc)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_rapot_mc_traking');
    //     $this->db->where('id_mc', $id_mc);
    //     $this->db->where('pic', 'Pusat');
    //     $this->db->order_by('tbl_rapot_mc_traking.id_mc', 'DESC');
    //     $this->db->limit(1);
    //     $data = $this->db->get();
    //     return $data->row_array();
    // }
    // public function get_traking_finance($id_mc)
    // {
    //     $this->db->select('*');
    //     $this->db->from('tbl_rapot_mc_traking');
    //     $this->db->where('id_mc', $id_mc);
    //     $this->db->where('pic', 'Finance');
    //     $this->db->order_by('tbl_rapot_mc_traking.id_mc', 'DESC');
    //     $this->db->limit(1);
    //     $data = $this->db->get();
    //     return $data->row_array();
    // }


    public function ambil_mc_sebelum_edit($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('id_mc', $id_mc);
        $data = $this->db->get();
        return $data->row_array();
    }


    public function get_last_edit($id_detail_program_penyedia_jasa, $no_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->where('no_mc', $no_mc);
        $data = $this->db->get();
        return $data->row_array();
    }


    public function get_cek_um($id_detail_program_penyedia_jasa)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->where('no_mc', 'um');
        $data = $this->db->get();
        return $data->row_array();
    }

    // vendor
    public function get_traking_vendor($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_rapot_dummy');
        $this->db->where('id_mc', $id_mc);
        $this->db->where('uraian', 'Vendor Kirim Berkas');
        $this->db->order_by('tbl_rapot_dummy.id_mc', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }
    // area tbl_vendor
    public function get_traking_area($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_rapot_dummy');
        $this->db->where('id_mc', $id_mc);
        $this->db->where('pic', 'Area');
        $this->db->order_by('tbl_rapot_dummy.id_mc', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }
    public function get_traking_pusat($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_rapot_dummy');
        $this->db->where('id_mc', $id_mc);
        $this->db->where('pic', 'Pusat');
        $this->db->order_by('tbl_rapot_dummy.id_mc', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }
    public function get_traking_finance($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_rapot_dummy');
        $this->db->where('id_mc', $id_mc);
        $this->db->where('pic', 'Finance');
        $this->db->order_by('tbl_rapot_dummy.id_rapot_mc_traking', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }
    public function create_rapot($data)
    {
        $this->db->insert('tbl_rapot_dummy', $data);
    }

    public function cek_rapot($id_detail_program_penyedia_jasa, $id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_rapot_dummy');
        $this->db->where('id_mc', $id_mc);
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->order_by('tbl_rapot_dummy.id_rapot_mc_traking', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }




    public function hapus_mc($id_mc)
    {
        $this->db->where('id_mc', $id_mc);
        $this->db->delete('tbl_mc');
    }

    public function hapus_dummy_traking($id_mc)
    {
        $this->db->where('id_mc', $id_mc);
        $this->db->delete('tbl_rapot_dummy');
    }


    public function get_only_now_edit($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('id_mc', $id_mc);
        $data = $this->db->get();
        return $data->row_array();
    }


    public function generate_update($id_detail_program_penyedia_jasa, $no_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_mc');
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->where('no_mc >=', $no_mc);
        $this->db->not_like('no_mc', 'um');
        $data = $this->db->get();
        return $data->result_array();
    }
    public function get_traking_data($id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_rapot_dummy');
        $this->db->where('id_mc', $id_mc);
        $this->db->order_by('tbl_rapot_dummy.id_rapot_mc_traking', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }

    public function upadte_aray1($id_mc, $data)
    {
        $this->db->where('id_mc', $id_mc);
        $this->db->update('tbl_mc', $data);

        $this->db->where('id_mc', $id_mc);
        $updatedId = $this->db->get('tbl_mc')->row_array();
        return $updatedId;
    }

    // cek uraian
    public function cek_rapot_uraian_trakhir($id_detail_program_penyedia_jasa, $id_mc)
    {
        $this->db->select('*');
        $this->db->from('tbl_rapot_dummy');
        $this->db->where('id_mc', $id_mc);
        $this->db->where('id_detail_program_penyedia_jasa', $id_detail_program_penyedia_jasa);
        $this->db->order_by('tbl_rapot_dummy.id_rapot_mc_traking', 'DESC');
        $this->db->limit(1);
        $data = $this->db->get();
        return $data->row_array();
    }


    public function get_bulan_januari_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 01);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }


    public function get_bulan_februari_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 02);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }


    public function get_bulan_maret_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 03);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_april_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 04);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_mei_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 05);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_juni_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 06);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_juli_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 07);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_agustus_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', '08');
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_september_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', '09');
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_oktober_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 10);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_november_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 11);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function get_bulan_desember_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_grafik_pencairan');
        $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 12);
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }


    // _pendapatan
    public function get_bulan_januari_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 01);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }


    public function get_bulan_februari_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 02);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }


    public function get_bulan_maret_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 03);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_april_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 04);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_mei_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 05);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_juni_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 06);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_juli_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 07);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_agustus_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', '08');
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_september_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', '09');
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_oktober_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 10);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }

    public function get_bulan_november_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 11);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }
    public function get_bulan_desember_pendapatan_grafik()
    {
        $this->db->select('*');
        $this->db->from('tbl_pendapatan');
        $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 12);
        $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', 2022);
        $data = $this->db->get();
        return $data->result_array();
    }


    public function add_pendapatan($data)
    {
        $this->db->insert('tbl_pendapatan', $data);
    }


    // INI UNTUK PENCAIRAN
    var $order_pencairan = array('id_grafik_pencairan', 'id_detail_program_penyedia_jasa', 'tanggal_cair', 'nilai_grafik', 'catatan');
    private function _get_data_query_pencairan($filter_tahun, $bulan)
    {
        $this->db->from('tbl_grafik_pencairan');
        $this->db->join('tbl_detail_program_penyedia_jasa', 'tbl_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa = tbl_grafik_pencairan.id_detail_program_penyedia_jasa', 'left');
        $this->db->join('mst_kontrak', 'mst_kontrak.id_kontrak = tbl_detail_program_penyedia_jasa.id_kontrak', 'left');
        if ($bulan == 'Januari') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 01);
        } else if ($bulan == 'Februari') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 02);
        } else if ($bulan == 'Maret') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 03);
        } else if ($bulan == 'April') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 04);
        } else if ($bulan == 'Mei') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 05);
        } else if ($bulan == 'Juni') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 06);
        } else if ($bulan == 'Juli') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 07);
        } else if ($bulan == 'Agustus') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', '08');
        } else if ($bulan == 'September') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', '09');
        } else if ($bulan == 'Oktober') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 10);
        } else if ($bulan == 'November') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 11);
        } if ($bulan == 'Desember') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 12);
        }
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', $filter_tahun);
        $i = 0;
        foreach ($this->order_pencairan as $item) // looping awal
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

                if (count($this->order_pencairan) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->order_pencairan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('id_grafik_pencairan', 'DESC');
        }
    }

    public function getdatatable_pencairan($filter_tahun, $bulan) //nam[ilin data pake ini
    {
        $this->_get_data_query_pencairan($filter_tahun, $bulan); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_pencairan($filter_tahun, $bulan)
    {
        $this->_get_data_query_pencairan($filter_tahun, $bulan); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_pencairan($filter_tahun, $bulan)
    {
        $this->db->from('tbl_grafik_pencairan');
        $this->db->join('tbl_detail_program_penyedia_jasa', 'tbl_detail_program_penyedia_jasa.id_detail_program_penyedia_jasa = tbl_grafik_pencairan.id_detail_program_penyedia_jasa', 'left');
        $this->db->join('mst_kontrak', 'mst_kontrak.id_kontrak = tbl_detail_program_penyedia_jasa.id_kontrak', 'left');
        if ($bulan == 'Januari') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 01);
        } else if ($bulan == 'Februari') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 02);
        } else if ($bulan == 'Maret') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 03);
        } else if ($bulan == 'April') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 04);
        } else if ($bulan == 'Mei') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 05);
        } else if ($bulan == 'Juni') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 06);
        } else if ($bulan == 'Juli') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 07);
        } else if ($bulan == 'Agustus') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', '08');
        } else if ($bulan == 'September') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', '09');
        } else if ($bulan == 'Oktober') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 10);
        } else if ($bulan == 'November') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 11);
        } if ($bulan == 'Desember') {
             $this->db->where('MONTH(tbl_grafik_pencairan.tanggal_cair)', 12);
        }
        $this->db->where('YEAR(tbl_grafik_pencairan.tanggal_cair)', $filter_tahun);
        return $this->db->count_all_results();
    }


    // PENDAPATAN
     // INI UNTUK PENCAIRAN
    //  pendapatan
     var $order_pendapatan = array('id_pendapatan', 'nilai_pendapatan', 'tanggal_pendapatan');
     private function _get_data_query_pendapatan($filter_tahun, $bulan)
     {
         $this->db->from('tbl_pendapatan');
         if ($bulan == 'Januari') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 01);
         } else if ($bulan == 'Februari') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 02);
         } else if ($bulan == 'Maret') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 03);
         } else if ($bulan == 'April') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 04);
         } else if ($bulan == 'Mei') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 05);
         } else if ($bulan == 'Juni') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 06);
         } else if ($bulan == 'Juli') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 07);
         } else if ($bulan == 'Agustus') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', '08');
         } else if ($bulan == 'September') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', '09');
         } else if ($bulan == 'Oktober') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 10);
         } else if ($bulan == 'November') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 11);
         } if ($bulan == 'Desember') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 12);
         }
         $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', $filter_tahun);
         $i = 0;
         foreach ($this->order_pendapatan as $item) // looping awal
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
 
                 if (count($this->order_pendapatan) - 1 == $i)
                     $this->db->group_end();
             }
             $i++;
         }
         if (isset($_POST['order'])) {
             $this->db->order_by($this->order_pendapatan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
         } else {
             $this->db->order_by('id_pendapatan', 'DESC');
         }
     }
 
     public function getdatatable_pendapatan($filter_tahun, $bulan) //nam[ilin data pake ini
     {
         $this->_get_data_query_pendapatan($filter_tahun, $bulan); //ambil data dari get yg di atas
         if ($_POST['length'] != -1) {
             $this->db->limit($_POST['length'], $_POST['start']);
         }
         $query = $this->db->get();
         return $query->result();
     }
     public function count_filtered_data_pendapatan($filter_tahun, $bulan)
     {
         $this->_get_data_query_pendapatan($filter_tahun, $bulan); //ambil data dari get yg di atas
         $query = $this->db->get();
         return $query->num_rows();
     }
 
     public function count_all_data_pendapatan($filter_tahun, $bulan)
     {
         $this->db->from('tbl_pendapatan');
         if ($bulan == 'Januari') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 01);
         } else if ($bulan == 'Februari') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 02);
         } else if ($bulan == 'Maret') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 03);
         } else if ($bulan == 'April') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 04);
         } else if ($bulan == 'Mei') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 05);
         } else if ($bulan == 'Juni') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 06);
         } else if ($bulan == 'Juli') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 07);
         } else if ($bulan == 'Agustus') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', '08');
         } else if ($bulan == 'September') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', '09');
         } else if ($bulan == 'Oktober') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 10);
         } else if ($bulan == 'November') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 11);
         } if ($bulan == 'Desember') {
              $this->db->where('MONTH(tbl_pendapatan.tanggal_pendapatan)', 12);
         }
         $this->db->where('YEAR(tbl_pendapatan.tanggal_pendapatan)', $filter_tahun);
         $i = 0;
         return $this->db->count_all_results();
     }
}
