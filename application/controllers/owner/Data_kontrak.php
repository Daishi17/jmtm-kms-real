<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Data_kontrak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Operasi/Data_kontrak_model');
    }

    public function index()
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $data['detail_role']  = $this->Data_kontrak_model->get_segalanya();
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('operasi/kontrak_management/index', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('operasi/kontrak_management/ajax');
    }

    public function get_data()
    {
        $sess_detail_role = $this->session->userdata('id_detail_role');
        $resultss = $this->Data_kontrak_model->getdatatable($sess_detail_role);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_kontrak;
            $row[] = $rs->no_kontrak;
            $row[] = $rs->tahun_anggaran;
            $row[] = $rs->nilai_kontrak_awal;
            if ($rs->status == 1) {
                $row[] = '<span class="badge badge-success">Aktif</span>';
            } else {
                $row[] = '<span class="badge badge-danger">Tidak Aktif</span>';
            }
            if ($rs->id_kontrak == 1) {
                $row[] = '<div class="input-group mb-3">
                         <div class="input-group-prepend">
                         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Aksi
                         </button>
                         <div class="dropdown-menu">
                         <a class="dropdown-item " href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_kontrak . "','detail_kontrak'" . ')"><i class="fa fa-book"></i> Detail Kontrak</a>
                         <a class="dropdown-item " href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_kontrak . "','edit'" . ')"><i class="fa fa-file-contract"></i> Tambah Uraian</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item " href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_kontrak . "','non_aktif'" . ')"><i class="fa fa-file-chart"></i><i class="fa fa-file"></i> Non-Aktifkan</a>
                         </div>
                         </div>';
            } else {
                $row[] = '<div class="input-group mb-3">
                         <div class="input-group-prepend">
                         <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Aksi
                         </button>
                         <div class="dropdown-menu">
                         <a class="dropdown-item " href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_kontrak . "','detail_kontrak'" . ')"><i class="fa fa-book"></i> Detail Kontrak</a>
                         <a class="dropdown-item " href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_kontrak . "','edit'" . ')"><i class="fa fa-file-contract"></i> Tambah Uraian</a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item " href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_kontrak . "','aktif'" . ')"><i class="fa fa-file-chart"></i><i class="fa fa-file"></i> Aktifkan</a>
                         </div>
                         </div>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_kontrak_model->count_all_data($sess_detail_role),
            "recordsFiltered" => $this->Data_kontrak_model->count_filtered_data($sess_detail_role),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function byid($id_program)
    {
        $data = $this->Data_kontrak_model->getByid($id_program);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function add_kontrak()
    {
        $data = [
            'nama_kontrak' => $this->input->post('nama_kontrak'),
            'tahun_anggaran' =>  $this->input->post('tahun_anggaran'),
            'nilai_kontrak_awal' =>  $this->input->post('nilai_kontrak_awal'),
            'id_detail_role' => $this->input->post('id_detail_role'),
            'no_kontrak' => $this->input->post('no_kontrak'),
            'status' => 1
        ];
        $this->Data_kontrak_model->add($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function detail_kontrak($id_kontrak)
    {
        $data['title'] = 'Dashboard';
        $data['kontrak'] = $this->Data_kontrak_model->get_by_id_join($id_kontrak);
        if (!$data['kontrak']) {
            redirect('operasi/data_kontrak');
        }
        $this->load->view('template/head_ui', $data);
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('operasi/kontrak_management/detail_kontrak', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('operasi/kontrak_management/ajax_detail', $data);
    }

    public function status_control($id_program)
    {
        $where = [
            'id_program' => $id_program
        ];

        $status = $this->input->post('status');

        if ($status == 1) {
            $data = [
                'status' =>  1
            ];
        } else {
            $data = [
                'status' =>  0
            ];
        }
        // var_dump($data);
        $this->Data_kontrak_model->update($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // opex
    public function get_data_capex($id_kontrak)
    {
        $resultss = $this->Data_kontrak_model->getdatatable_capex($id_kontrak);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_uraian_lv3;
            $row[] = date('d-m-Y', strtotime($rs->date_created));
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:;" onClick="byid(' . "'" . $rs->id_capex . "','detail_kontrak'" . ')"><i class="fa fa-book"></i> Detail</a>
            <a class="btn btn-sm btn-danger" href="javascript:;" onClick="byid(' . "'" . $rs->id_capex . "','detail_kontrak'" . ')"><i class="fa fa-trash"></i> Hapus</a>
            <a class="btn btn-sm btn-warning" href="javascript:;" onClick="byid(' . "'" . $rs->id_capex . "','detail_kontrak'" . ')"><i class="fa fa-trash"></i> Edit</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_kontrak_model->count_all_capex($id_kontrak),
            "recordsFiltered" => $this->Data_kontrak_model->count_filtered_capex($id_kontrak),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function simpan_capex($id_kontrak)
    {
        $data = [
            'id_kontrak' => $id_kontrak,
            'nama_uraian_lv3' => $this->input->post('nama_uraian_lv3'),
            'date_created' => date('Y-m-d H:i')
        ];
        $this->Data_kontrak_model->add_capex($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // end opex


    // opex
    public function get_data_opex($id_kontrak)
    {
        $resultss = $this->Data_kontrak_model->getdatatable_opex($id_kontrak);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_uraian_lv3;
            $row[] = date('d-m-Y', strtotime($rs->date_created));
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:;" onClick="byid(' . "'" . $rs->id_opex . "','detail_kontrak'" . ')"><i class="fa fa-book"></i> Detail</a>
            <a class="btn btn-sm btn-danger" href="javascript:;" onClick="byid(' . "'" . $rs->id_opex . "','detail_kontrak'" . ')"><i class="fa fa-trash"></i> Hapus</a>
            <a class="btn btn-sm btn-warning" href="javascript:;" onClick="byid(' . "'" . $rs->id_opex . "','detail_kontrak'" . ')"><i class="fa fa-trash"></i> Edit</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_kontrak_model->count_all_opex($id_kontrak),
            "recordsFiltered" => $this->Data_kontrak_model->count_filtered_opex($id_kontrak),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function simpan_opex($id_kontrak)
    {
        $data = [
            'id_kontrak' => $id_kontrak,
            'nama_uraian_lv3' => $this->input->post('nama_uraian_lv3'),
            'date_created' => date('Y-m-d H:i')
        ];
        $this->Data_kontrak_model->add_opex($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end opex

    // bua
    public function get_data_bua($id_kontrak)
    {
        $resultss = $this->Data_kontrak_model->getdatatable_bua($id_kontrak);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_uraian_lv3;
            $row[] = date('d-m-Y', strtotime($rs->date_created));
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:;" onClick="byid(' . "'" . $rs->id_bua . "','detail_kontrak'" . ')"><i class="fa fa-book"></i> Detail</a>
            <a class="btn btn-sm btn-danger" href="javascript:;" onClick="byid(' . "'" . $rs->id_bua . "','detail_kontrak'" . ')"><i class="fa fa-trash"></i> Hapus</a>
            <a class="btn btn-sm btn-warning" href="javascript:;" onClick="byid(' . "'" . $rs->id_bua . "','detail_kontrak'" . ')"><i class="fa fa-trash"></i> Edit</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_kontrak_model->count_all_bua($id_kontrak),
            "recordsFiltered" => $this->Data_kontrak_model->count_filtered_bua($id_kontrak),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function simpan_bua($id_kontrak)
    {
        $data = [
            'id_kontrak' => $id_kontrak,
            'nama_uraian_lv3' => $this->input->post('nama_uraian_lv3'),
            'date_created' => date('Y-m-d H:i')
        ];
        $this->Data_kontrak_model->add_bua($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end bua


    // sdm
    public function get_data_sdm($id_kontrak)
    {
        $resultss = $this->Data_kontrak_model->getdatatable_sdm($id_kontrak);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_uraian_lv3;
            $row[] = date('d-m-Y', strtotime($rs->date_created));
            $row[] = '<a class="btn btn-sm btn-info" href="javascript:;" onClick="byid(' . "'" . $rs->id_sdm . "','detail_kontrak'" . ')"><i class="fa fa-book"></i> Detail</a>
              <a class="btn btn-sm btn-danger" href="javascript:;" onClick="byid(' . "'" . $rs->id_sdm . "','detail_kontrak'" . ')"><i class="fa fa-trash"></i> Hapus</a>
              <a class="btn btn-sm btn-warning" href="javascript:;" onClick="byid(' . "'" . $rs->id_sdm . "','detail_kontrak'" . ')"><i class="fa fa-trash"></i> Edit</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_kontrak_model->count_all_sdm($id_kontrak),
            "recordsFiltered" => $this->Data_kontrak_model->count_filtered_sdm($id_kontrak),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function simpan_sdm($id_kontrak)
    {
        $data = [
            'id_kontrak' => $id_kontrak,
            'nama_uraian_lv3' => $this->input->post('nama_uraian_lv3'),
            'date_created' => date('Y-m-d H:i')
        ];
        $this->Data_kontrak_model->add_sdm($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    // end sdm
}
