<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_administrasi_kontrak extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Administrasi_kontrak_model');
	}

	public function index()
	{
		$data['vendor'] = $this->Administrasi_kontrak_model->get_vendor();
		$this->load->view('template/head_ui');
		$this->load->view('template/sidebar_vendor');
		$this->load->view('vendor/data_administrasi_kontrak/index', $data);
		$this->load->view('template/footer_ui');
		$this->load->view('vendor/data_administrasi_kontrak/ajax');
	}

	public function get_data()
	{
		$resultss = $this->Administrasi_kontrak_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nama_pekerjaan;
			$row[] = $rs->nama_vendor;
			$row[] = $rs->no_kontrak;
			$row[] = $rs->total_kontrak;
			$row[] = date('d-m-Y', strtotime($rs->tanggal_kontrak));
			$row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->no_kontrak . "','addendum'" . ')"> <i class="bi bi-pencil-square"></i> Addendum</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $rs->no_kontrak . "','buat_tagihan'" . ')"><i class="bi bi-x-circle"></i> Tagihan</a>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Administrasi_kontrak_model->count_all_data(),
			"recordsFiltered" => $this->Administrasi_kontrak_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_data_adendum($no_kontrak)
	{
		$resultss = $this->Administrasi_kontrak_model->getdatatable_adendum($no_kontrak);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->no_adendum;
			$row[] = date('d-m-Y', strtotime($rs->tanggal_adendum));
			$row[] = $rs->jumlah;
			$row[] = $rs->no_kontrak;

			$row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->no_kontrak . "','addendum'" . ')"> <i class="bi bi-pencil-square"></i> Lihat Addendum</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $rs->no_kontrak . "','buat_tagihan'" . ')"><i class="bi bi-x-circle"></i> Buat Tagihan</a>';

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Administrasi_kontrak_model->count_all_data_adendum($no_kontrak),
			"recordsFiltered" => $this->Administrasi_kontrak_model->count_filtered_data_adendum($no_kontrak),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function add_kontrak()
	{

		$data = [
			'no_kontrak' => $this->input->post('no_kontrak'),
			'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
			'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),
			'total_kontrak' => $this->input->post('total_kontrak'),
			'id_vendor' => $this->input->post('id_vendor')
		];
		$this->Administrasi_kontrak_model->add_data($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function byid($no_kontrak)
	{
		$response = [
			'no_kontrak' => $this->Administrasi_kontrak_model->get_by_kontrak($no_kontrak),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}

	public function add_adendum()
	{
		$no_kontrak =  $this->input->post('no_kontrak_for_adendum');

		$cek_adendum = $this->Administrasi_kontrak_model->cek_adendum_kontrak($no_kontrak);


		$data = [
			'no_adendum' =>  $cek_adendum['no_adendum'] + 1,
			'tanggal_adendum' => $this->input->post('tanggal_adendum'),
			'jumlah' => $this->input->post('jumlah'),
			'no_kontrak' => $no_kontrak
		];
		$this->Administrasi_kontrak_model->tambah_adendum($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}
}
