<?php
defined('BASEPATH') or exit('No direct script access allowed');
error_reporting(0);

class Data_administrasi_kontrak extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Administrasi_kontrak_model');
		$this->load->model('Admin/Penyedia_model');
	}

	public function index()
	{
		$data['vendor'] = $this->Administrasi_kontrak_model->get_vendor();
		$data['data_program'] = $this->Administrasi_kontrak_model->get_program();
		$data['title'] = 'data_administrasi';

		$this->load->view('template/head_ui');
		$this->load->view('template/sidebar_ui');
		$this->load->view('admin/data_administrasi_kontrak/index', $data);
		$this->load->view('template/footer_ui');
		$this->load->view('admin/data_administrasi_kontrak/ajax');
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
			$row[] = "Rp " . number_format($rs->total_kontrak, 2, ',', '.');
			$row[] = date('d-m-Y', strtotime($rs->tanggal_kontrak));

			$row[] = '<div class="input-group mb-3">
			<div class="input-group-prepend">
			<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown">
			   Aksi
			</button>
			<div class="dropdown-menu">
			<a class="dropdown-item " href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->no_kontrak . "','addendum'" . ')"><i class="fa fa-book"></i> Addendum</a>
			<a class="dropdown-item " href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->no_kontrak . "','buat_tagihan'" . ')"><i class="fa fa-file-contract"></i>  Tagihan</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item " href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->no_kontrak . "','edit'" . ')"><i class="fa fa-file-chart"></i><i class="fa fa-file"></i> Edit</a>
			</div>
			</div>';

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

		$id_vendor = $this->input->post('id_vendor');


		if ($id_vendor) {

			$data = [
				'no_kontrak' => $this->input->post('no_kontrak'),
				'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
				'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),
				'total_kontrak' => $this->input->post('total_kontrak'),
				'id_vendor' => $id_vendor,
			];
			$this->Administrasi_kontrak_model->add_data($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		} else {
			$data_vendor = [
				'nama_vendor' => $this->input->post('nama_vendor')
			];
			$this->Penyedia_model->add($data_vendor);
			$id_vendor_inserted = $this->db->insert_id();
			$data = [
				'no_kontrak' => $this->input->post('no_kontrak'),
				'nama_pekerjaan' => $this->input->post('nama_pekerjaan'),
				'tanggal_kontrak' => $this->input->post('tanggal_kontrak'),
				'total_kontrak' => $this->input->post('total_kontrak'),
				'id_vendor' => $id_vendor_inserted
			];
			$this->Administrasi_kontrak_model->add_data($data);
			$this->output->set_content_type('application/json')->set_output(json_encode('success'));
		}
	}

	public function edit_kontrak($no_kontrak)
	{
		$id_vendor = $this->input->post('id_vendor_edit');
		$nama_vendor_edit = $this->input->post('nama_vendor_edit');
		$id_vendor_ada = $this->input->post('id_vendor_edit2');

		if ($id_vendor) {

			$cek_vendor = $this->Penyedia_model->cek_vendor($id_vendor);
			if ($cek_vendor->nama_vendor == $nama_vendor_edit) {
				$where = [
					'no_kontrak' => $no_kontrak
				];
				$data = [
					'no_kontrak' => $this->input->post('no_kontrak_edit'),
					'nama_pekerjaan' => $this->input->post('nama_pekerjaan_edit'),
					'tanggal_kontrak' => $this->input->post('tanggal_kontrak_edit'),
					'total_kontrak' => $this->input->post('total_kontrak_edit'),
					'id_vendor' => $id_vendor_ada,
				];
				$this->Administrasi_kontrak_model->update_data($data, $where);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			} else {
				$where = [
					'no_kontrak' => $no_kontrak
				];
				$data_vendor = [
					'nama_vendor' => $nama_vendor_edit,
					'password' => password_hash('123', PASSWORD_DEFAULT),
				];
				$this->Penyedia_model->add($data_vendor);
				$id_vendor_inserted = $this->db->insert_id();
				$data = [
					'no_kontrak' => $this->input->post('no_kontrak_edit'),
					'nama_pekerjaan' => $this->input->post('nama_pekerjaan_edit'),
					'tanggal_kontrak' => $this->input->post('tanggal_kontrak_edit'),
					'total_kontrak' => $this->input->post('total_kontrak_edit'),
					'id_vendor' => $id_vendor_inserted
				];
				$this->Administrasi_kontrak_model->update_data($data, $where);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			}
		} else {
			$cek_vendor = $this->Penyedia_model->cek_vendor($id_vendor_ada);
			if ($cek_vendor->nama_vendor == $nama_vendor_edit) {
				$where = [
					'no_kontrak' => $no_kontrak
				];
				$data = [
					'no_kontrak' => $this->input->post('no_kontrak_edit'),
					'nama_pekerjaan' => $this->input->post('nama_pekerjaan_edit'),
					'tanggal_kontrak' => $this->input->post('tanggal_kontrak_edit'),
					'total_kontrak' => $this->input->post('total_kontrak_edit'),
					'id_vendor' => $id_vendor_ada,
				];
				$this->Administrasi_kontrak_model->update_data($data, $where);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			} else {
				$where = [
					'no_kontrak' => $no_kontrak
				];
				$data_vendor = [
					'nama_vendor' => $nama_vendor_edit,
					'password' => password_hash('123', PASSWORD_DEFAULT)
				];
				$this->Penyedia_model->add($data_vendor);
				$id_vendor_inserted = $this->db->insert_id();
				$data = [
					'no_kontrak' => $this->input->post('no_kontrak_edit'),
					'nama_pekerjaan' => $this->input->post('nama_pekerjaan_edit'),
					'tanggal_kontrak' => $this->input->post('tanggal_kontrak_edit'),
					'total_kontrak' => $this->input->post('total_kontrak_edit'),
					'id_vendor' => $id_vendor_inserted
				];
				$this->Administrasi_kontrak_model->update_data($data, $where);
				$this->output->set_content_type('application/json')->set_output(json_encode('success'));
			}
		}
	}

	public function byid($no_kontrak)
	{
		$response = [
			'no_kontrak' => $this->Administrasi_kontrak_model->get_by_kontrak($no_kontrak),
			'kontrak' => $this->Administrasi_kontrak_model->get_kontrak($no_kontrak)
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



	public function byid_program_penyedia_jasa($id_detail_program_penyedia_jasa)
	{
		$response = [
			'row_program_penyedia_jasa' => $this->Administrasi_kontrak_model->get_by_program_penyedia($id_detail_program_penyedia_jasa),
		];
		$this->output->set_content_type('application/json')->set_output(json_encode($response));
	}


	public function save_edit_program()
	{
		$type = $this->input->post('type_data');
		$id_kontrak = $this->input->post('id_kontrak');
		$id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasa');
		$data_kirim = $this->input->post('data_kirim');
		$data_kirim_date = $this->input->post('data_kirim_date');
		if ($type == 'nama_vendor') {
			$where = [
				'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
			];
			$data = [
				'nama_penyedia' => $data_kirim,
			];
			$this->Administrasi_kontrak_model->update_ke_program_penyedia_jasa($where, $data);
		} else if ($type == 'no_kontrak') {
			$where = [
				'id_kontrak' => $id_kontrak,
			];
			$data = [
				'no_kontrak' => $data_kirim,
			];
			$this->Administrasi_kontrak_model->update_kontrak($where, $data);
		} else if ($type == 'tanggal_kontrak') {
			$where = [
				'id_kontrak' => $id_kontrak,
			];
			$data = [
				'tahun_kontrak' => $data_kirim_date,
			];
			$this->Administrasi_kontrak_model->update_kontrak($where, $data);
		}
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	// Kontrak Mangement

}
