<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Tagihan_kontrak_admin/Taggihan_kontrak_admin_model');
	}
	public function index()
	{
		$data['title'] = 'Admin/Dashboard';
		// januari
		$januari = $this->Taggihan_kontrak_admin_model->get_bulan_januari_grafik();
		$total_januari = 0;
		foreach ($januari as $key => $v_januari) {
			$total_januari += $v_januari['nilai_grafik'];
		}
		$data['januari'] = $total_januari;
		// februari
		$februari = $this->Taggihan_kontrak_admin_model->get_bulan_februari_grafik();
		$total_februari = 0;
		foreach ($februari as $key => $v_februari) {
			$total_februari += $v_februari['nilai_grafik'];
		}
		$data['februari'] = $total_februari;
		// maret
		$maret = $this->Taggihan_kontrak_admin_model->get_bulan_maret_grafik();
		$total_maret = 0;
		foreach ($maret as $key => $v_maret) {
			$total_maret += $v_maret['nilai_grafik'];
		}
		$data['maret'] = $total_maret;
		// april
		$april = $this->Taggihan_kontrak_admin_model->get_bulan_april_grafik();
		$total_april = 0;
		foreach ($april as $key => $v_april) {
			$total_april += $v_april['nilai_grafik'];
		}
		$data['april'] = $total_april;
		// mei
		$mei = $this->Taggihan_kontrak_admin_model->get_bulan_mei_grafik();
		$total_mei = 0;
		foreach ($mei as $key => $v_mei) {
			$total_mei += $v_mei['nilai_grafik'];
		}
		$data['mei'] = $total_mei;
		// juni
		$juni = $this->Taggihan_kontrak_admin_model->get_bulan_juni_grafik();
		$total_juni = 0;
		foreach ($juni as $key => $v_juni) {
			$total_juni += $v_juni['nilai_grafik'];
		}
		$data['juni'] = $total_juni;
		// juli
		$juli = $this->Taggihan_kontrak_admin_model->get_bulan_juli_grafik();
		$total_juli = 0;
		foreach ($juli as $key => $v_juli) {
			$total_juli += $v_juli['nilai_grafik'];
		}
		$data['juli'] = $total_juli;
		// agustus
		$agustus = $this->Taggihan_kontrak_admin_model->get_bulan_agustus_grafik();
		$total_agustus = 0;
		foreach ($agustus as $key => $v_agustus) {
			$total_agustus += $v_agustus['nilai_grafik'];
		}
		$data['agustus'] = $total_agustus;
		// september
		$september = $this->Taggihan_kontrak_admin_model->get_bulan_september_grafik();
		$total_september = 0;
		foreach ($september as $key => $v_september) {
			$total_september += $v_september['nilai_grafik'];
		}
		$data['september'] = $total_september;
		// oktober
		$oktober = $this->Taggihan_kontrak_admin_model->get_bulan_oktober_grafik();
		$total_oktober = 0;
		foreach ($oktober as $key => $v_oktober) {
			$total_oktober += $v_oktober['nilai_grafik'];
		}
		$data['oktober'] = $total_oktober;
		// november
		$november = $this->Taggihan_kontrak_admin_model->get_bulan_november_grafik();
		$total_november = 0;
		foreach ($november as $key => $v_november) {
			$total_november += $v_november['nilai_grafik'];
		}
		$data['november'] = $total_november;
		// desember
		$desember = $this->Taggihan_kontrak_admin_model->get_bulan_desember_grafik();
		$total_desember = 0;
		foreach ($desember as $key => $v_desember) {
			$total_desember += $v_desember['nilai_grafik'];
		}
		$data['desember'] = $total_desember;


		// PENDAPATAN
		// _pendapatan
		// januari_pendapatan
		$januari_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_januari_pendapatan_grafik();
		$total_januari_pendapatan = 0;
		foreach ($januari_pendapatan as $key => $v_januari_pendapatan) {
			$total_januari_pendapatan += $v_januari_pendapatan['nilai_pendapatan'];
		}
		$data['januari_pendapatan'] = $total_januari_pendapatan;
		// februari_pendapatan
		$februari_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_februari_pendapatan_grafik();
		$total_februari_pendapatan = 0;
		foreach ($februari_pendapatan as $key => $v_februari_pendapatan) {
			$total_februari_pendapatan += $v_februari_pendapatan['nilai_pendapatan'];
		}
		$data['februari_pendapatan'] = $total_februari_pendapatan;
		// maret_pendapatan
		$maret_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_maret_pendapatan_grafik();
		$total_maret_pendapatan = 0;
		foreach ($maret_pendapatan as $key => $v_maret_pendapatan) {
			$total_maret_pendapatan += $v_maret_pendapatan['nilai_pendapatan'];
		}
		$data['maret_pendapatan'] = $total_maret_pendapatan;
		// april_pendapatan
		$april_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_april_pendapatan_grafik();
		$total_april_pendapatan = 0;
		foreach ($april_pendapatan as $key => $v_april_pendapatan) {
			$total_april_pendapatan += $v_april_pendapatan['nilai_pendapatan'];
		}
		$data['april_pendapatan'] = $total_april_pendapatan;
		// mei_pendapatan
		$mei_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_mei_pendapatan_grafik();
		$total_mei_pendapatan = 0;
		foreach ($mei_pendapatan as $key => $v_mei_pendapatan) {
			$total_mei_pendapatan += $v_mei_pendapatan['nilai_pendapatan'];
		}
		$data['mei_pendapatan'] = $total_mei_pendapatan;
		// juni_pendapatan
		$juni_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_juni_pendapatan_grafik();
		$total_juni_pendapatan = 0;
		foreach ($juni_pendapatan as $key => $v_juni_pendapatan) {
			$total_juni_pendapatan += $v_juni_pendapatan['nilai_pendapatan'];
		}
		$data['juni_pendapatan'] = $total_juni_pendapatan;
		// juli_pendapatan
		$juli_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_juli_pendapatan_grafik();
		$total_juli_pendapatan = 0;
		foreach ($juli_pendapatan as $key => $v_juli_pendapatan) {
			$total_juli_pendapatan += $v_juli_pendapatan['nilai_pendapatan'];
		}
		$data['juli_pendapatan'] = $total_juli_pendapatan;
		// agustus_pendapatan
		$agustus_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_agustus_pendapatan_grafik();
		$total_agustus_pendapatan = 0;
		foreach ($agustus_pendapatan as $key => $v_agustus_pendapatan) {
			$total_agustus_pendapatan += $v_agustus_pendapatan['nilai_pendapatan'];
		}
		$data['agustus_pendapatan'] = $total_agustus_pendapatan;
		// september_pendapatan
		$september_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_september_pendapatan_grafik();
		$total_september_pendapatan = 0;
		foreach ($september_pendapatan as $key => $v_september_pendapatan) {
			$total_september_pendapatan += $v_september_pendapatan['nilai_pendapatan'];
		}
		$data['september_pendapatan'] = $total_september_pendapatan;
		// oktober_pendapatan
		$oktober_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_oktober_pendapatan_grafik();
		$total_oktober_pendapatan = 0;
		foreach ($oktober_pendapatan as $key => $v_oktober_pendapatan) {
			$total_oktober_pendapatan += $v_oktober_pendapatan['nilai_pendapatan'];
		}
		$data['oktober_pendapatan'] = $total_oktober_pendapatan;
		// november_pendapatan
		$november_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_november_pendapatan_grafik();
		$total_november_pendapatan = 0;
		foreach ($november_pendapatan as $key => $v_november_pendapatan) {
			$total_november_pendapatan += $v_november_pendapatan['nilai_pendapatan'];
		}
		$data['november_pendapatan'] = $total_november_pendapatan;
		// desember_pendapatan
		$desember_pendapatan = $this->Taggihan_kontrak_admin_model->get_bulan_desember_pendapatan_grafik();
		$total_desember_pendapatan = 0;
		foreach ($desember_pendapatan as $key => $v_desember_pendapatan) {
			$total_desember_pendapatan += $v_desember_pendapatan['nilai_pendapatan'];
		}
		$data['desember_pendapatan'] = $total_desember_pendapatan;


		$this->load->view('template/head_ui');
		$this->load->view('template/sidebar_ui', $data);
		$this->load->view('admin/dashboard/index');
		$this->load->view('template/footer_ui',);
		$this->load->view('admin/dashboard/ajax', $data);
	}

	public function add_pendapatan()
	{
		$data = [
			'nilai_pendapatan' => $this->input->post('nilai_pendapatan'),
			'tanggal_pendapatan' => $this->input->post('tanggal_pendapatan'),
		];
		$this->Taggihan_kontrak_admin_model->add_pendapatan($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function get_data_pencairan()
	{
		$filter_tahun = $this->input->post('filter_tahun');
		$bulan = $this->input->post('bulan');
		$resultss = $this->Taggihan_kontrak_admin_model->getdatatable_pencairan('2022',$bulan);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->no_kontrak;
			$row[] = $rs->nama_pekerjaan_program_mata_anggaran;
			$row[] = "Rp " . number_format($rs->nilai_grafik, 2, ',', '.');
			$row[] = $rs->tanggal_cair;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Taggihan_kontrak_admin_model->count_all_data_pencairan($filter_tahun,$bulan),
			"recordsFiltered" => $this->Taggihan_kontrak_admin_model->count_filtered_data_pencairan($filter_tahun,$bulan),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function get_data_pendapatan()
	{
		$filter_tahun = $this->input->post('filter_tahun');
		$bulan = $this->input->post('bulan');
		$resultss = $this->Taggihan_kontrak_admin_model->getdatatable_pendapatan('2022',$bulan);
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->tanggal_pendapatan;
			$row[] = "Rp " . number_format($rs->nilai_pendapatan, 2, ',', '.');
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Taggihan_kontrak_admin_model->count_all_data_pendapatan($filter_tahun,$bulan),
			"recordsFiltered" => $this->Taggihan_kontrak_admin_model->count_filtered_data_pendapatan($filter_tahun,$bulan),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}
}
