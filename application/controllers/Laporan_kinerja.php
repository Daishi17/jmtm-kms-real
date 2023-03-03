<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
class Laporan_kinerja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Data_kontrak_model');
        $this->load->model('Auth_model');
    }

    public function index()
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('laporan_kinerja/index', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('laporan_kinerja/ajax');
    }

    public function get_data()

    {
        $get_pegawai = $this->Auth_model->get_pegawai();
        $id_departemen = $get_pegawai['id_departemen'];
        $id_area = $get_pegawai['id_area'];
        $id_sub_area = $get_pegawai['id_sub_area'];
        $resultss = $this->Data_kontrak_model->getdatatable($id_departemen, $id_area, $id_sub_area);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = '<label data-toggle="tooltip" data-placement="bottom" title="' . $rs->nama_kontrak . '" style=" white-space: nowrap; width: 300px;overflow: hidden;text-overflow: ellipsis;">' . $rs->nama_kontrak . '</label>';
            $row[] = $rs->nama_departemen . ' ' . $rs->nama_area . ' ' . $rs->nama_sub_area;
            $row[] = $rs->no_kontrak;
            $row[] = $rs->tahun_kontrak;
            $row[] = $rs->tahun_anggaran;
            $row[] = $rs->jenis_kontrak;
            $row[] = '<div class="input-group mb-3">
            <div class="input-group-prepend">
            <button type="button" class="btn btn-outline-primary btn-block btn-sm dropdown-toggle" data-toggle="dropdown">
               Aksi
            </button>
            <div class="dropdown-menu">
            <a href="' . base_url('laporan_kinerja/buat_laporan_kinerja/') . $rs->id_kontrak . '" class="dropdown-item"><i class="fa fa-file-contract"></i> Kelola Laporan_kontrak</a>
            </div>
            </div>';

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_kontrak_model->count_all_data($id_departemen, $id_area, $id_sub_area),
            "recordsFiltered" => $this->Data_kontrak_model->count_filtered_data($id_departemen, $id_area, $id_sub_area),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function byid($id_program)
    {
        $data = $this->Data_kontrak_model->getByid($id_program);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
    public function buat_laporan_kinerja($id_kontrak)
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $data['row_kontrak'] = $this->Data_kontrak_model->get_by_id_join($id_kontrak);
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('laporan_kinerja/buat_laporan_kinerja', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('laporan_kinerja/ajax');
    }

    
    public function update_progres_fisik()
    {
        $where = [
            'id_detail_sub_program_penyedia_jasa' => $this->input->post('id_detail_sub_program_penyedia_jasa'),
        ];
        $update_capex = [
            'persen_progres_fisik' => $this->input->post('persen_progres_fisik'),
        ];
        $this->Data_kontrak_model->update_ke_sub_program($where, $update_capex);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
