<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asset_model extends CI_Model
{
    var $table = 'ms_aset';
    var $field = array('kd_aset', 'tgl_peroleh', 'kd_aset', 'mrk_aset', 'nm_kelompok', 'nm_jenis', 'nm_lokasi', 'sts_aset', 'sts_terima', 'sts_aktifasi', 'kd_aset');
    private function _get_data_query()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->join('ms_kelompok', 'ms_aset.kd_kelompok = ms_kelompok.kd_kelompok', 'left');
        $this->db->join('ms_jenis', 'ms_aset.kd_jnsbarang = ms_jenis.kd_jenis', 'left');
        $this->db->join('ms_lokasi', 'ms_aset.kd_lokasi = ms_lokasi.kd_lokasi', 'left');
        if (isset($_POST['sts_aset'])) {
            $this->db->like('ms_aset.sts_aset', $_POST['sts_aset']);
        }
        foreach ($this->field as $item) // looping awal
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

                if (count($this->field) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->field[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('kd_aset', 'DESC');
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

    // public function get_kode()
    // {
    //     // $this->db->select('LEFT(ms_aset.kd_aset,10) as kd_aset', FALSE);
    //     $field = $this->db->query("SELECT kd_jenis FROM ms_jenis");
    //     $field2 = $this->db->query("SELECT kd_kelompok FROM ms_kelompok");
    //     $this->db->select_max('kd_aset');
    //     $this->db->like($field, $field2, 'after');
    //     $this->db->order_by('kd_aset', 'DESC');
    //     $this->db->limit(1);
    //     $query = $this->db->get('ms_aset'); //cek dulu apakah ada sudah ada kode di tabel.
    //     if ($query->num_rows() <> 0) {
    //         //cek kode jika telah tersedia
    //         $data = $query->row();
    //         $kode = intval($data->kd_aset) + 1;
    //     } else {
    //         $kode = 1; //cek jika kode belum terdapat pada table
    //     }
    //     $batas = str_pad($kode, 10, "0", STR_PAD_LEFT);
    //     $kodetampil = $batas; //format kode
    //     return $kodetampil;
    // }

    public function get_dataku($text = null, $table = null, $field = null)
    {
        $this->db->select_max('kd_aset');
        $this->db->like($field, $text, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);
        return $this->db->get($table)->row_array()[$field];
    }


    public function create($upload)
    {
        return $this->db->insert('ms_aset', $upload);
    }


    public function get_row_data_asset($kd_aset)
    {
        $this->db->select('*');
        $this->db->from('ms_aset');
        $this->db->join('ms_kelompok', 'ms_aset.kd_kelompok = ms_kelompok.kd_kelompok', 'left');
        $this->db->join('ms_jenis', 'ms_aset.kd_jnsbarang = ms_jenis.kd_jenis', 'left');
        $this->db->join('ms_lokasi', 'ms_aset.kd_lokasi = ms_lokasi.kd_lokasi', 'left');
        $this->db->where('kd_aset', $kd_aset);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function row_only_aset($kd_aset)
    {
        $this->db->select('*');
        $this->db->from('ms_aset');
        $this->db->where('kd_aset', $kd_aset);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function edit_data($where, $data)
    {
        $this->db->update('ms_aset', $data, $where);
        return $this->db->affected_rows();
    }

    public function result_master_asset()
    {
        $this->db->select('*');
        $this->db->from('ms_aset');
        $this->db->where('sts_aktifasi', 1);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getBykode($kd_asset)
    {
        // return $this->db->get_where($this->table, ['kd_jenis' => $kd_jenis])->row();
        if ($kd_asset == null) {
            return 0;
        } else {
            $query = $this->db->query("SELECT * FROM ms_aset WHERE kd_aset = '$kd_asset'");
            return $query->row();
        }
    }

    public function cek_kode_penempatan($kd_asset)
    {
        if ($kd_asset == null) {
            return 0;
        } else {
            $query = $this->db->query("SELECT * FROM trx_detil_penempatan WHERE kd_asset = '$kd_asset'");
            return $query->row();
        }
    }

    public function count_distribusi($kd_asset)
    {
        if ($kd_asset == null) {
            return 0;
        } else {
            $query = $this->db->query("SELECT COUNT(kd_asset) AS total_mutasi FROM trx_detil_penempatan WHERE kd_asset = '$kd_asset' AND sts_asset = 2");
            return $query->row();
        }
    }

    public function insert_detail_penempatan($detail_penempatan, $update_status_asset, $insert_detail_penempatan)
    {
        $this->db->insert('trx_detil_penempatan', $detail_penempatan);
        $this->db->update('ms_aset', $update_status_asset, $insert_detail_penempatan);
        return $this->db->affected_rows();
    }

    public function insert_penempatan($penempatan)
    {
        $this->db->insert('trx_penempatan', $penempatan);
        return $this->db->affected_rows();
    }

    // get kode_penempatan
    public function get_kd_penempatan()
    {
        $this->db->select('LEFT(trx_penempatan.kd_penempatan,8) as kd_penempatan', FALSE);
        $this->db->order_by('kd_penempatan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('trx_penempatan'); //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia
            $data = $query->row();
            $kode = intval($data->kd_penempatan) + 1;
        } else {
            $kode = 1; //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 8, "0", STR_PAD_LEFT);
        $kodetampil = $batas; //format kode
        return $kodetampil;
    }

    public function get_kd_kelompok($kd_kelompok)
    {
        $query = $this->db->query("SELECT * FROM ms_aset WHERE kd_kelompok = $kd_kelompok");
        return $query->row();
    }

    public function cek_kd_kelompok($text = null, $table = null, $field = null)
    {
        $this->db->select_max('kd_aset');
        $this->db->like($field, $text, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);
        return $this->db->get($table)->row_array()[$field];
    }

    public function get_penempatan_kd()
    {
        $this->db->select('LEFT(trx_penempatan.kd_penempatan,4) as kd_penempatan', FALSE);
        $this->db->order_by('kd_penempatan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('trx_penempatan'); //cek dulu apakah ada sudah ada kode di tabel.
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia
            $data = $query->row();
            $kode = intval($data->kd_penempatan) + 1;
        } else {
            $kode = 1; //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodetampil = $batas; //format kode
        return $kodetampil;
    }

    public function cek_db()
    {
        $query = $this->db->query("SELECT kd_penempatan FROM trx_penempatan");
        return $query->row_array();
    }

    // cek ruangan

    public function cek_ruangan_penempatan($kd_penempatan, $kode_asset)
    {
        $this->db->select('*');
        $this->db->from('trx_detil_penempatan');
        $this->db->where('kd_penempatan', $kd_penempatan);
        $this->db->where('kd_asset', $kode_asset);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function cek_ruangan_penempatan_detail($kd_penempatan, $kd_asset)
    {
        $this->db->select('*');
        $this->db->from('trx_detil_penempatan');
        $this->db->where('kd_penempatan', $kd_penempatan);
        $this->db->where('kd_asset', $kd_asset);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_master_kd_penempatan_udh_ada($kd_penempatan)
    {
        $this->db->select('*');
        $this->db->from('trx_penempatan');
        $this->db->where('kd_penempatan', $kd_penempatan);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function cek_kode_asset($kd_asset, $kd_penempatan)
    {
        $this->db->select('*');
        $this->db->from('trx_detil_penempatan');
        $this->db->where('kd_asset', $kd_asset);
        $this->db->where('kd_penempatan', $kd_penempatan);
        $query = $this->db->get();
        return $query->row_array();
    }






    // cek jika sudah ada asset di ruangan ini
    var $field2 = array('kd_penempatan', 'kd_asset', 'kd_qrcode', 'tgl_detil_penempatan', 'sts_asset', 'sts_keadaan');
    private function _get_data_query2($kd_penempatan)
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('trx_detil_penempatan');
        $this->db->join('ms_aset', 'trx_detil_penempatan.kd_asset = ms_aset.kd_aset', 'left');
        $this->db->where('kd_penempatan', $kd_penempatan);
        foreach ($this->field2 as $item) // looping awal
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

                if (count($this->field2) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->field2[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('kd_penempatan', 'DESC');
        }
    }

    public function get_dattable_cek_ruangan($kd_penempatan) //nam[ilin data pake ini
    {
        $this->_get_data_query2($kd_penempatan); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data2($kd_penempatan)
    {
        $this->_get_data_query2($kd_penempatan); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data2($kd_penempatan)
    {
        $this->db->from('trx_detil_penempatan');
        $this->db->where('kd_penempatan', $kd_penempatan);
        return $this->db->count_all_results();
    }


    var $table2 = 'trx_penempatan';
    var $field3 = ['trx_detil_penempatan.kd_penempatan', 'tgl_penempatan', 'trx_detil_penempatan.kd_penempatan', 'nm_ruangan', 'nm_lokasi', 'nm_pegawai', 'trx_detil_penempatan.kd_penempatan'];
    private function _get_data_query_asset()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from($this->table2);
        $this->db->join('trx_detil_penempatan', 'trx_penempatan.kd_penempatan = trx_detil_penempatan.kd_penempatan', 'left');
        $this->db->join('ms_ruangan', 'trx_penempatan.kd_ruangan = ms_ruangan.kd_ruangan', 'left');
        $this->db->join('ms_aset', 'trx_detil_penempatan.kd_asset = ms_aset.kd_aset', 'left');
        $this->db->join('ms_lokasi', 'trx_penempatan.kd_lokasi = ms_lokasi.kd_lokasi', 'left');
        $this->db->join('ms_pegawai', 'ms_lokasi.kd_lokasi = ms_pegawai.kd_lokasi', 'left');
        $this->db->group_by('trx_detil_penempatan.kd_penempatan');
        foreach ($this->field3 as $item) // looping awal
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

                if (count($this->field3) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->field3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('trx_detil_penempatan.kd_penempatan', 'DESC');
        }
    }

    public function getdatatable_asset() //nam[ilin data pake ini
    {
        $this->_get_data_query_asset(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_asset()
    {
        $this->_get_data_query_asset(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_asset()
    {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }

    public function get_qr_detail($kd_qrcode)
    {
        $this->db->select('*');
        $this->db->from($this->table2);
        $this->db->join('trx_detil_penempatan', 'trx_penempatan.kd_penempatan = trx_detil_penempatan.kd_penempatan', 'left');
        $this->db->join('ms_aset', 'trx_detil_penempatan.kd_asset = ms_aset.kd_aset', 'left');
        $this->db->join('ms_lokasi', 'trx_penempatan.kd_lokasi = ms_lokasi.kd_lokasi', 'left');
        $this->db->join('ms_pegawai', 'ms_lokasi.kd_lokasi = ms_pegawai.kd_lokasi', 'left');
        $this->db->join('ms_ruangan', 'trx_penempatan.kd_ruangan = ms_ruangan.kd_ruangan', 'left');
        $this->db->where('trx_penempatan.kd_penempatan', $kd_qrcode);
        $query = $this->db->get();
        return $query->row_array();
    }

    var $table3 = 'trx_detil_penempatan';
    var $field4 = ['kd_penempatan', 'tgl_detil_penempatan', 'kd_qrcode', 'mrk_aset', 'nilai_peroleh', 'sts_aset', 'sts_keadaan', 'tgl_peroleh', 'kd_penempatan'];
    private function _get_data_query_asset_detail($kd_ruang)
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('trx_detil_penempatan');
        $this->db->join('ms_aset', 'trx_detil_penempatan.kd_asset = ms_aset.kd_aset');
        $this->db->where('kd_penempatan', $kd_ruang);
        foreach ($this->field4 as $item) // looping awal
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

                if (count($this->field4) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->field4[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('trx_detil_penempatan.kd_penempatan', 'DESC');
        }
    }

    public function getdatatable_asset_detail($kd_qrcode) //nam[ilin data pake ini
    {
        $this->_get_data_query_asset_detail($kd_qrcode); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_asset_detail($kd_qrcode)
    {
        $this->_get_data_query_asset_detail($kd_qrcode); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_asset_detail($kd_qrcode)
    {
        $this->_get_data_query_asset_detail($kd_qrcode);
        return $this->db->count_all_results();
    }



    // cek jika sudah ada asset di ruangan ini
    var $field5 = array('kd_penempatan', 'kd_asset', 'kd_qrcode', 'tgl_detil_penempatan', 'sts_asset', 'sts_keadaan');
    private function _get_data_query5()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('trx_detil_penempatan');
        foreach ($this->field5 as $item) // looping awal
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

                if (count($this->field5) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->field5[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('kd_penempatan', 'DESC');
        }
    }

    public function get_dattable_cek_ruangan5() //nam[ilin data pake ini
    {
        $this->_get_data_query5(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data5()
    {
        $this->_get_data_query5(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data5()
    {
        $this->db->from('trx_detil_penempatan');
        return $this->db->count_all_results();
    }

    public function get_cek_data($qrcode)
    {
        $this->db->select('*');
        $this->db->from('trx_detil_penempatan');
        $this->db->join('ms_aset', 'trx_detil_penempatan.kd_asset = ms_aset.kd_aset', 'left');
        $this->db->join('ms_kelompok', 'ms_aset.kd_kelompok = ms_kelompok.kd_kelompok', 'left');
        $this->db->join('ms_jenis', 'ms_aset.kd_jnsbarang = ms_jenis.kd_jenis', 'left');
        $this->db->join('trx_penempatan', 'trx_detil_penempatan.kd_penempatan = trx_penempatan.kd_penempatan', 'left');
        $this->db->join('ms_lokasi', 'trx_penempatan.kd_lokasi = ms_lokasi.kd_lokasi', 'left');
        $this->db->join('ms_ruangan', 'trx_penempatan.kd_ruangan = ms_ruangan.kd_ruangan', 'left');
        $this->db->where('kd_qrcode', $qrcode);
        $query = $this->db->get();
        return $query->row_array();
    }
    public function get_result_asset()
    {
        $this->db->select('*');
        $this->db->from('ms_aset');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_sts_asset_($sts_aset)
    {
        $query = $this->db->query("SELECT * FROM ms_aset WHERE sts_aset = $sts_aset");
        return $query->result();
    }

    public function hapus_aset($kd_aset)
    {
        $this->db->where('kd_asset', $kd_aset);
        $this->db->delete('trx_detil_penempatan');
        return $this->db->affected_rows();
    }

    public function get_jenis_kd($kd_jenis)
    {
        $query = $this->db->query("SELECT * FROM ms_aset WHERE kd_jnsbarang = '$kd_jenis'");
        return $query->row();
    }

    public function get_final_kode($text = null, $table = null, $field = null)
    {
        $this->db->select_max('kd_aset');
        $this->db->like($field, $text, 'after');
        $this->db->order_by($field, 'desc');
        $this->db->limit(1);
        return $this->db->get($table)->row_array()[$field];
    }

    public function get_sts_asset_and_lokasi($sts_asset, $lokasi)
    {
        $query = $this->db->query("SELECT * FROM ms_aset WHERE kd_lokasi = $lokasi AND sts_aset = $sts_asset");
        return  $query->result_array();
    }


    // update for agustus 20222
    public function edit_distribusi_aset($data, $kd_aset_edit)
    {
        $this->db->where('kd_asset', $kd_aset_edit);
        $this->db->update('trx_detil_penempatan', $data);
        return $this->db->affected_rows();
    }

    // penempatan
    var $distribusi = ['kd_penempatan', 'tgl_penempatan', 'kd_penempatan', 'nm_ruangan', 'nm_lokasi', 'nm_pegawai', 'kd_penempatan'];
    private function _get_data_query_asset_distribusi()
    {
        $i = 0;
        $this->db->select('*');
        $this->db->from('trx_penempatan');
        $this->db->join('ms_ruangan', 'trx_penempatan.kd_ruangan = ms_ruangan.kd_ruangan', 'left');
        $this->db->join('ms_lokasi', 'trx_penempatan.kd_lokasi = ms_lokasi.kd_lokasi', 'left');
        $this->db->join('ms_pegawai', 'ms_lokasi.kd_lokasi = ms_pegawai.kd_lokasi', 'left');
        $this->db->group_by('trx_penempatan.kd_penempatan');
        foreach ($this->distribusi as $item) // looping awal
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

                if (count($this->distribusi) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->field3[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else {
            $this->db->order_by('trx_penempatan.kd_penempatan', 'DESC');
        }
    }

    public function getdatatable_asset_distribusi() //nam[ilin data pake ini
    {
        $this->_get_data_query_asset_distribusi(); //ambil data dari get yg di atas
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }
    public function count_filtered_data_asset_distribusi()
    {
        $this->_get_data_query_asset_distribusi(); //ambil data dari get yg di atas
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data_asset_distribusi()
    {
        $this->db->from($this->table2);
        return $this->db->count_all_results();
    }
}
