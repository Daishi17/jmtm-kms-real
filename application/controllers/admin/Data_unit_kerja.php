<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_unit_kerja extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Unit_kerja_model');
    }

    public function index()
    {
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui');
        $this->load->view('admin/data_unit_kerja/index');
        $this->load->view('template/footer_ui');
        $this->load->view('admin/data_unit_kerja/ajax');
    }

    public function get_data()
    {
        $resultss = $this->Unit_kerja_model->getdatatable();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_unit_kerja;
            if ($rs->status == 1) {
                $row[] = '<span class="badge bg-success">Aktif</span>';
            } else {
                $row[] = '<span class="badge bg-danger">Tidak Aktif</span>';
            }

            if ($rs->status == 1) {
                $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_unit_kerja . "','edit'" . ')"> <i class="bi bi-pencil-square"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $rs->id_unit_kerja . "','non_aktif'" . ')"><i class="bi bi-x-circle"></i> Non-Aktifkan</a>';
            } else {
                $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_unit_kerja . "','edit'" . ')"><i class="bi bi-pencil-square"></i> Edit</a> <a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rs->id_unit_kerja . "','aktif'" . ')"><i class="bi bi-check-circle"></i> Aktifkan</a>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Unit_kerja_model->count_all_data(),
            "recordsFiltered" => $this->Unit_kerja_model->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function byid($id_unit_kerja)
    {
        $data = $this->Unit_kerja_model->getByid($id_unit_kerja);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function add_unit_kerja()
    {
        $data = [
            'nama_unit_kerja' => $this->input->post('nama_unit_kerja'),
            'status' => $this->input->post('status')
        ];
        $this->Unit_kerja_model->add($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function status_control($id_unit_kerja)
    {
        $where = [
            'id_unit_kerja' => $id_unit_kerja
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
        $this->Unit_kerja_model->update($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function update($id_unit_kerja)
    {
        $where = [
            'id_unit_kerja' => $id_unit_kerja
        ];

        $data = [
            'nama_unit_kerja' => $this->input->post('nama_unit_kerja2'),
            'status' => $this->input->post('status2')
        ];
        $this->Unit_kerja_model->update($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
