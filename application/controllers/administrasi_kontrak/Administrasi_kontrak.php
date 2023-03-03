<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
// error_reporting(0);
class Administrasi_kontrak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Data_kontrak_model');
        $this->load->model('Admin/Administrasi_kontrak_model');
    }

    public function index()
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $get_pegawai = $this->Auth_model->get_pegawai();
        $id_departemen = $get_pegawai['id_departemen'];
        $id_area = $get_pegawai['id_area'];
        $id_sub_area = $get_pegawai['id_sub_area'];

        $data['get_mata_anggaran']  = $this->Data_kontrak_model->get_mata_anggaran($id_departemen, $id_area, $id_sub_area);
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('admin/administrasi_kontrak/index', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('admin/administrasi_kontrak/ajax');
    }



    public function buat_tagihan($id_detail_program_penyedia_jasa)
    {
        $data['active_kontrak'] = 'active';
    }


    public function get_data_hps($id_detail_sub_program_penyedia_jasa)
    {
        $resultss = $this->Data_kontrak_model->getdatatable_hps($id_detail_sub_program_penyedia_jasa);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = $rs->no_hps;
            $row[] = $rs->uraian_hps;
            $row[] = $rs->satuan_hps;
            if ($rs->harga_satuan_hps == null) {
                $row[] =  "";
                $row[] =  "";
                $row[] =  "";
            } else {
                $row[] =  $rs->volume_hps;
                $row[] =  "Rp " . number_format($rs->harga_satuan_hps, 2, ',', '.');
                $row[] =  "Rp " . number_format($rs->total_harga, 2, ',', '.');
            }

            $row[] = '<a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid_detail_sub_program_penyedia_jasa(' . "'" . $rs->id_hps_kontrak_penyedia_jasa . "','hapus'" . ')"><i class="fas fa fa-trash"></i> hapus</a><a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid_hps_kontrak_penyedia_jasa(' . "'" . $rs->id_hps_kontrak_penyedia_jasa . "','edit'" . ')"><i class="fas fa fa-edit"></i> Edit</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_kontrak_model->count_all_datahps($id_detail_sub_program_penyedia_jasa),
            "recordsFiltered" => $this->Data_kontrak_model->count_filtered_datahps($id_detail_sub_program_penyedia_jasa),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }


    public function pasca_pengadaan()
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $get_pegawai = $this->Auth_model->get_pegawai();
        $id_departemen = $get_pegawai['id_departemen'];
        $id_area = $get_pegawai['id_area'];
        $id_sub_area = $get_pegawai['id_sub_area'];

        $data['get_mata_anggaran']  = $this->Data_kontrak_model->get_mata_anggaran($id_departemen, $id_area, $id_sub_area);
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('admin/administrasi_kontrak/pasca_pengadaan', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('admin/administrasi_kontrak/ajax');
    }

    public function addendum_kontrak($id_detail_program_penyedia_jasa)
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $get_pegawai = $this->Auth_model->get_pegawai();
        $id_departemen = $get_pegawai['id_departemen'];
        $id_area = $get_pegawai['id_area'];
        $id_sub_area = $get_pegawai['id_sub_area'];

        $data['get_mata_anggaran']  = $this->Data_kontrak_model->get_mata_anggaran($id_departemen, $id_area, $id_sub_area);
        $data['row_program_kontrak_detail']  = $this->Data_kontrak_model->get_mata_anggaran_row($id_detail_program_penyedia_jasa);

        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('admin/administrasi_kontrak/addendum_kontrak', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('admin/administrasi_kontrak/ajax');
    }




    public function get_data_addendum($id_detail_program_penyedia_jasa)
    {

        $resultss = $this->Data_kontrak_model->getdatatable__addendum_kontrak_penyedia_jasa($id_detail_program_penyedia_jasa);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->no_addendum;
            $row[] = $rs->nama_addendum;
            $row[] = $rs->tanggal_addendum;
            $row[] =  "Rp " . number_format($rs->nilai_addendum, 2, ',', '.');
            $row[] = '<a href="javascript:;" title="Hapus Addendum" class="mr-2 btn btn-danger btn-sm" onClick="byid_detail_program_penyedia_jasa(' . "'" . $rs->id_detail_program_penyedia_jasa . "','hapus'" . ')"><i class="fas fa fa-trash"></i></a><a title="Edit Addendum" href="javascript:;" class="btn btn-warning btn-sm" onClick="byid_detail_program_penyedia_jasa(' . "'" . $rs->id_detail_program_penyedia_jasa . "','edit'" . ')"><i class="fas fa fa-edit"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_kontrak_model->count_all_data_addendum_kontrak_penyedia_jasa($id_detail_program_penyedia_jasa),
            "recordsFiltered" => $this->Data_kontrak_model->count_filtered_data_addendum_kontrak_penyedia_jasa($id_detail_program_penyedia_jasa),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function save_addendum()
    {
        $id_detail_program_penyedia_jasa =  $this->input->post('id_detail_program_penyedia_jasa');
        $nama_addendum =  $this->input->post('nama_addendum');
        $nilai_addendum =  $this->input->post('nilai_addendum');
        $tanggal_addendum =  $this->input->post('tanggal_addendum');
        $no_addendum =  $this->input->post('no_addendum');
        $data = [
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
            'nama_addendum' => $nama_addendum,
            'nilai_addendum' => $nilai_addendum,
            'tanggal_addendum' => $tanggal_addendum,
            'no_addendum' => $no_addendum,
        ];
        $this->Data_kontrak_model->tambah_addendum_kontrak_penyedia_jasa($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    // gunning
    public function upload_gunning($id_detail_program_penyedia_jasa)
    {
        $nama_file_gunning = $this->input->post('nama_file_gunning');
        $config['upload_path'] = './file_gunning/';
        $config['allowed_types'] = 'pdf|xlss|docx';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_gunning')) {

            $fileData = $this->upload->data();
            $where = [
                'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
            ];
            $upload = [
                'nama_file_gunning' => $nama_file_gunning,
                'file_gunning' => $fileData['file_name'],
            ];
            $this->Data_kontrak_model->update_rup($where, $upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            redirect(base_url('upload'));
        }
    }

    // sho
    public function upload_sho($id_detail_program_penyedia_jasa)
    {
        $nama_file_sho = $this->input->post('nama_file_sho');
        $config['upload_path'] = './file_sho/';
        $config['allowed_types'] = 'pdf|xlss|docx';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_sho')) {

            $fileData = $this->upload->data();
            $where = [
                'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
            ];
            $upload = [
                'nama_file_sho' => $nama_file_sho,
                'file_sho' => $fileData['file_name'],
            ];
            $this->Data_kontrak_model->update_rup($where, $upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            redirect(base_url('upload'));
        }
    }

    // smk
    public function upload_smk($id_detail_program_penyedia_jasa)
    {
        $nama_file_smk = $this->input->post('nama_file_smk');
        $config['upload_path'] = './file_smk/';
        $config['allowed_types'] = 'pdf|xlss|docx';
        $config['max_size'] = 0;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_smk')) {

            $fileData = $this->upload->data();
            $where = [
                'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
            ];
            $upload = [
                'nama_file_smk' => $nama_file_smk,
                'file_smk' => $fileData['file_name'],
            ];
            $this->Data_kontrak_model->update_rup($where, $upload);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        } else {
            redirect(base_url('upload'));
        }
    }

    public function simpan_penyedia()
    {
        $id_detail_program_penyedia_jasa =  $this->input->post('id_detail_program_penyedia_jasa');
        $nama_penyedia =  $this->input->post('nama_penyedia');
        $where = [
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
        ];
        $data = [
            'nama_penyedia' => $nama_penyedia,
        ];
        $this->Data_kontrak_model->update_rup($where, $data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function administrasi_dokumen()
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $get_pegawai = $this->Auth_model->get_pegawai();
        $id_departemen = $get_pegawai['id_departemen'];
        $id_area = $get_pegawai['id_area'];
        $id_sub_area = $get_pegawai['id_sub_area'];

        $data['get_mata_anggaran']  = $this->Data_kontrak_model->get_mata_anggaran($id_departemen, $id_area, $id_sub_area);
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('admin/administrasi_kontrak/administrasi_dokumen', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('admin/administrasi_kontrak/ajax');
    }



    public function kelola_format_dokumen($id_detail_program_penyedia_jasa)
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $get_pegawai = $this->Auth_model->get_pegawai();
        $id_departemen = $get_pegawai['id_departemen'];
        $id_area = $get_pegawai['id_area'];
        $id_sub_area = $get_pegawai['id_sub_area'];

        $data['get_mata_anggaran']  = $this->Data_kontrak_model->get_mata_anggaran($id_departemen, $id_area, $id_sub_area);
        $data['row_program_kontrak_detail']  = $this->Data_kontrak_model->get_mata_anggaran_row($id_detail_program_penyedia_jasa);
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('admin/administrasi_kontrak/kelola_format_dokumen', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('admin/administrasi_kontrak/ajax');
    }

    public function byid_program_penyedia_jasa($id_detail_program_penyedia_jasa)
	{
		$response = [
			'row_program_penyedia_jasa' => $this->Administrasi_kontrak_model->get_by_program_penyedia($id_detail_program_penyedia_jasa),
            'bapp_row' => $this->Data_kontrak_model->table_row_bapp($id_detail_program_penyedia_jasa),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


    public function simpan_bapp($id_detail_program_penyedia_jasa)
    {
        // No Surat
        $nomor_bapp =  $this->input->post('nomor_bapp');
        $tanggal_bapp =  $this->input->post('tanggal_bapp');
        // kontrak_pekerjaan
        $no_pekerjaan_bapp =  $this->input->post('no_pekerjaan_bapp');
        $tanggal_pekerjaan_bapp =  $this->input->post('tanggal_pekerjaan_bapp');
        // surat perintah kerja
        $no_pekerjaan_spmk =  $this->input->post('no_pekerjaan_spmk');
        $tanggal_pekerjaan_spmk =  $this->input->post('tanggal_pekerjaan_spmk');
        // surat perintah kerja
        $no_pekerjaan_ppp_pihak_kedua =  $this->input->post('no_pekerjaan_ppp_pihak_kedua');
        $tanggal_pekerjaan_ppp_pihak_kedua =  $this->input->post('tanggal_pekerjaan_ppp_pihak_kedua');

        $cek_bapp_table = $this->Data_kontrak_model->table_result_bapp($id_detail_program_penyedia_jasa);
        if ($cek_bapp_table) {
            $where = [
                'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
            ];
            $data = [
                'nomor_bapp' => $nomor_bapp,
                'tanggal_bapp' => $tanggal_bapp,
                'no_pekerjaan_bapp' => $no_pekerjaan_bapp,
                'tanggal_pekerjaan_bapp' => $tanggal_pekerjaan_bapp,
                'no_pekerjaan_spmk' => $no_pekerjaan_spmk,
                'tanggal_pekerjaan_spmk' => $tanggal_pekerjaan_spmk,
                'no_pekerjaan_ppp_pihak_kedua' => $no_pekerjaan_ppp_pihak_kedua,
                'tanggal_pekerjaan_ppp_pihak_kedua' => $tanggal_pekerjaan_ppp_pihak_kedua,
            ];
            $this->Data_kontrak_model->update_bapp($where, $data);
        } else {
            $data = [
                'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                'nomor_bapp' => $nomor_bapp,
                'tanggal_bapp' => $tanggal_bapp,
                'no_pekerjaan_bapp' => $no_pekerjaan_bapp,
                'tanggal_pekerjaan_bapp' => $tanggal_pekerjaan_bapp,
                'no_pekerjaan_spmk' => $no_pekerjaan_spmk,
                'tanggal_pekerjaan_spmk' => $tanggal_pekerjaan_spmk,
                'no_pekerjaan_ppp_pihak_kedua' => $no_pekerjaan_ppp_pihak_kedua,
                'tanggal_pekerjaan_ppp_pihak_kedua' => $tanggal_pekerjaan_ppp_pihak_kedua,
            ];
            $this->Data_kontrak_model->tambah_bapp($data);
        }

        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function view_dokumen_8($id_detail_program_penyedia_jasa)
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $get_pegawai = $this->Auth_model->get_pegawai();
        $id_departemen = $get_pegawai['id_departemen'];
        $id_area = $get_pegawai['id_area'];
        $id_sub_area = $get_pegawai['id_sub_area'];

        $data['get_mata_anggaran']  = $this->Data_kontrak_model->get_mata_anggaran($id_departemen, $id_area, $id_sub_area);
        $data['row_program_kontrak_detail']  = $this->Data_kontrak_model->get_mata_anggaran_row($id_detail_program_penyedia_jasa);
        $data['bapp_row'] = $this->Data_kontrak_model->table_row_bapp($id_detail_program_penyedia_jasa);
        $data['row_mc'] = $this->Data_kontrak_model->row_mc($id_detail_program_penyedia_jasa);
        $this->load->view('admin/administrasi_kontrak/dokumen_administrasi_kontrak/pdf_dokumen_8', $data);
    }


    public function addendum_kontrak_sub_program($id_detail_sub_program_penyedia_jasa)
    {
        $data['active_kontrak'] = 'active';
        $data['menu_open_kontrak'] = 'menu-open';
        $get_pegawai = $this->Auth_model->get_pegawai();
        $id_departemen = $get_pegawai['id_departemen'];
        $id_area = $get_pegawai['id_area'];
        $id_sub_area = $get_pegawai['id_sub_area'];
        $data['get_mata_anggaran']  = $this->Data_kontrak_model->get_mata_anggaran($id_departemen, $id_area, $id_sub_area);
        $data['row_sub_program']  = $this->Data_kontrak_model->get_row_sub_program($id_detail_sub_program_penyedia_jasa);
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui', $data);
        $this->load->view('admin/administrasi_kontrak/addendum_fq', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('admin/administrasi_kontrak/ajax');
    }
    public function get_data_addendum_pq($id_detail_sub_program_penyedia_jasa)
    {

        $resultss = $this->Data_kontrak_model->getdatatable__addendum_kontrak_penyedia_jasa_pq($id_detail_sub_program_penyedia_jasa);
        $data = [];
        $no = $_POST['start'];
        foreach ($resultss as $rs) {
            $row = array();
            $row[] = ++$no;
            $row[] = $rs->no_addendum;
            $row[] = $rs->nama_addendum;
            $row[] = $rs->tanggal_addendum;
            $row[] =  "Rp " . number_format($rs->nilai_addendum, 2, ',', '.');
            $row[] = '<a href="javascript:;" title="Hapus Addendum" class="mr-2 btn btn-danger btn-sm" onClick="byid_detail_sub_program_penyedia_jasa(' . "'" . $rs->id_detail_sub_program_penyedia_jasa . "','hapus'" . ')"><i class="fas fa fa-trash"></i></a><a title="Edit Addendum" href="javascript:;" class="btn btn-warning btn-sm" onClick="byid_detail_sub_program_penyedia_jasa(' . "'" . $rs->id_detail_sub_program_penyedia_jasa . "','edit'" . ')"><i class="fas fa fa-edit"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Data_kontrak_model->count_all_data_addendum_kontrak_penyedia_jasa_pq($id_detail_sub_program_penyedia_jasa),
            "recordsFiltered" => $this->Data_kontrak_model->count_filtered_data_addendum_kontrak_penyedia_jasa_pq($id_detail_sub_program_penyedia_jasa),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function save_addendum_pq()
    {
        $id_detail_sub_program_penyedia_jasa =  $this->input->post('id_detail_sub_program_penyedia_jasa');
        $nama_addendum =  $this->input->post('nama_addendum');
        $nilai_addendum =  $this->input->post('nilai_addendum');
        $tanggal_addendum =  $this->input->post('tanggal_addendum');
        $no_addendum =  $this->input->post('no_addendum');
        $data = [
            'id_detail_sub_program_penyedia_jasa' => $id_detail_sub_program_penyedia_jasa,
            'nama_addendum' => $nama_addendum,
            'nilai_addendum' => $nilai_addendum,
            'tanggal_addendum' => $tanggal_addendum,
            'no_addendum' => $no_addendum,
        ];
        $where = [
            'id_detail_sub_program_penyedia_jasa' => $id_detail_sub_program_penyedia_jasa,
        ];
        $data_where = [
            'nilai_addendum_terakhir_fq' => $nilai_addendum,
        ];
        $this->Data_kontrak_model->save_addendum_pq($data);
        $this->Data_kontrak_model->update_ke_sub_program($where, $data_where);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
