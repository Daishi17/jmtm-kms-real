<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_penyedia extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Penyedia_model');
    }

    public function index()
    {
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui');
        $this->load->view('admin/data_penyedia/index');
        $this->load->view('template/footer_ui');
        $this->load->view('admin/data_penyedia/ajax');
    }

    public function get_data()
    {
        $resultss = $this->Penyedia_model->getdatatable();
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->nama_vendor;
            $row[] = $rs->email_vendor;
            if ($rs->status == 1) {
                $row[] = '<span class="badge bg-success">Aktif</span>';
            } else {
                $row[] = '<span class="badge bg-danger">Tidak Aktif</span>';
            }

            if ($rs->status == 1) {
                $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_vendor . "','edit'" . ')"> <i class="bi bi-pencil-square"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $rs->id_vendor . "','non_aktif'" . ')"><i class="bi bi-x-circle"></i> Non-Aktifkan</a>';
            } else {
                $row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_vendor . "','edit'" . ')"><i class="bi bi-pencil-square"></i> Edit</a> <a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rs->id_vendor . "','aktif'" . ')"><i class="bi bi-check-circle"></i> Aktifkan</a>';
            }

            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Penyedia_model->count_all_data(),
            "recordsFiltered" => $this->Penyedia_model->count_filtered_data(),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function add_vendor()
    {
        $data = [
            'nama_vendor' => $this->input->post('nama_vendor'),
            'telepon_vendor' => $this->input->post('telepon_vendor'),
            'alamat_penyedia' => $this->input->post('alamat_penyedia'),
            'username' => $this->input->post('username'),
            'email_vendor' => $this->input->post('email_penyedia'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'status' => $this->input->post('status')
        ];
        $this->Penyedia_model->add($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function status_control($id_vendor)
    {
        $where = [
            'id_vendor' => $id_vendor
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
        $this->Penyedia_model->update($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function byid($id_vendor)
    {
        $data = $this->Penyedia_model->getByid($id_vendor);
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function update_pegawai($id_vendor)
    {
        $where = [
            'id_vendor' => $id_vendor
        ];

        $data = [
            'nama_vendor' => $this->input->post('nama_vendor2'),
            'telepon_vendor' => $this->input->post('telepon_vendor2'),
            'alamat_penyedia' => $this->input->post('alamat_penyedia2'),
            'username' => $this->input->post('username2'),
            'email_vendor' => $this->input->post('email_penyedia2'),
            'status' => $this->input->post('status2')
        ];
        $this->Penyedia_model->update($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
