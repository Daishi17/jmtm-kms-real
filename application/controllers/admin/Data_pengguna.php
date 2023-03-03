<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_pengguna extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin/Pengguna_model');
	}

	public function index()
	{
		$data['active_pengguna'] = 'active';
		$data['menu_open_pengguna'] = 'menu-open';
		$data['departemen'] = $this->Pengguna_model->get_departemen();
		$this->load->view('template/head_ui');
		$this->load->view('template/sidebar_ui', $data);
		$this->load->view('admin/master_pengguna/index', $data);
		$this->load->view('template/footer_ui');
		$this->load->view('admin/master_pengguna/ajax');
	}

	public function get_data()
	{
		$resultss = $this->Pengguna_model->getdatatable();
		$data = [];
		$no = $_POST['start'];
		foreach ($resultss as $rs) {
			$row = array();
			$row[] = ++$no;
			$row[] = $rs->nama_pegawai;
			$row[] = $rs->nip;
			$row[] = $rs->username;
			if ($rs->status == 1) {
				$row[] = '<span class="badge bg-success">Aktif</span>';
			} else {
				$row[] = '<span class="badge bg-danger">Tidak Aktif</span>';
			}

			if ($rs->status == 1) {
				$row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_pegawai . "','edit'" . ')"> <i class="bi bi-pencil-square"></i> Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onClick="byid(' . "'" . $rs->id_pegawai . "','non_aktif'" . ')"><i class="bi bi-x-circle"></i> Non-Aktifkan</a>';
			} else {
				$row[] = '<a href="javascript:;" class="btn btn-warning btn-sm" onClick="byid(' . "'" . $rs->id_pegawai . "','edit'" . ')"><i class="bi bi-pencil-square"></i> Edit</a> <a href="javascript:;" class="btn btn-success btn-sm" onClick="byid(' . "'" . $rs->id_pegawai . "','aktif'" . ')"><i class="bi bi-check-circle"></i> Aktifkan</a>';
			}

			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->Pengguna_model->count_all_data(),
			"recordsFiltered" => $this->Pengguna_model->count_filtered_data(),
			"data" => $data
		);
		$this->output->set_content_type('application/json')->set_output(json_encode($output));
	}

	public function byid($id_pegawai)
	{
		$data = $this->Pengguna_model->getByid($id_pegawai);
		$this->output->set_content_type('application/json')->set_output(json_encode($data));
	}

	public function form_tambah()
	{
		$data['title'] = 'Dashboard';
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar');
		$this->load->view('admin/master_pegawai/form_tambah', $data);
		$this->load->view('template/footer');
		$this->load->view('admin/master_pegawai/ajax', $data);
	}

	public function form_edit($id_pegawai)
	{
		$data['title'] = 'Dashboard';
		$data['pegawai'] = $this->Pengguna_model->getByid($id_pegawai);
		$this->load->view('template/header', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/navbar');
		$this->load->view('admin/master_pegawai/form_edit', $data);
		$this->load->view('template/footer');
		$this->load->view('admin/master_pegawai/ajax', $data);
	}

	public function add_pegawai()
	{
		$data = [
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'nip' =>  $this->input->post('nip'),
			'username' =>  $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'alamat' =>  $this->input->post('alamat'),
			'telepon' =>  $this->input->post('telepon'),
			'email' =>  $this->input->post('email'),
			'id_departemen' =>  $this->input->post('id_departemen'),
			'id_area' =>  $this->input->post('id_area'),
			'id_sub_area' =>  $this->input->post('id_sub_area'),
			'status' =>  $this->input->post('status')
		];

		$this->Pengguna_model->add($data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function update_pegawai($id_pegawai)
	{
		$where = [
			'id_pegawai' => $id_pegawai
		];

		$data = [
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'nip' =>  $this->input->post('nip'),
			'username' =>  $this->input->post('username'),
			'alamat' =>  $this->input->post('alamat'),
			'telepon' =>  $this->input->post('telepon'),
			'email' =>  $this->input->post('email'),
			'id_departemen' =>  $this->input->post('id_departemen'),
			'id_area' =>  $this->input->post('id_area'),
			'id_sub_area' =>  $this->input->post('id_sub_area'),
			'status' =>  $this->input->post('status')
		];
		$this->Pengguna_model->update($where, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}

	public function status_control($id_pegawai)
	{
		$where = [
			'id_pegawai' => $id_pegawai
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
		$this->Pengguna_model->update($where, $data);
		$this->output->set_content_type('application/json')->set_output(json_encode('success'));
	}


	
	public function get_area($id_departemen)
	{
	   $data = $this->Pengguna_model->get_area($id_departemen);
	   echo '<option value="">--Area--</option>';
	   foreach ($data as $key => $value) {
		  echo '<option value="' . $value['id_area'] . '">' . $value['nama_area'] . '</option>';
	   }
	}

    public function get_sub_area($id_area)
	{
	   $data = $this->Pengguna_model->get_sub_area($id_area);
	   echo '<option value="">--Sub Area--</option>';
	   foreach ($data as $key => $value) {
		  echo '<option value="' . $value['id_sub_area'] . '">' . $value['nama_sub_area'] . '</option>';
	   }
	}
}
