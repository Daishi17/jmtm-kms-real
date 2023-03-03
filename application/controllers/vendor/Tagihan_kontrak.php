<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan_kontrak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tagihan_kontrak/Tagihan_kontrak_model');
    }
    public function buat_tagihan($no_kontrak)
    {
        $data['row_kontrak'] = $this->Tagihan_kontrak_model->get_row_kontrak($no_kontrak);
        $data['title'] = 'Dashboard';
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui');
        $this->load->view('admin/tagihan_kontrak/index', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('admin/tagihan_kontrak/ajax', $data);
    }
    public function by_no_kontrak($no_kontrak)
    {
        $data_tbl_kontrak = $this->Tagihan_kontrak_model->GetByIdKontrak($no_kontrak);
        $data_detail_taggihan = $this->Tagihan_kontrak_model->GetByIdKontrakDetail($no_kontrak);
        $count = $this->db->query("SELECT COUNT(no_kontrak) AS total  FROM tbl_mc WHERE no_kontrak = '$no_kontrak'")->row();

        $cekkontrak = $this->Tagihan_kontrak_model->cekKontrak($no_kontrak);

        $selact_max = $this->Tagihan_kontrak_model->get_last_mc($no_kontrak);

        $vendor_session = $this->session->userdata('id_vendor');
        $pegawai = $this->session->userdata('role');

        $data = [
            'datakontrak' => $data_tbl_kontrak,
            'get_detail_taggihan' => $data_detail_taggihan,
            'cekkontrak' => $cekkontrak,
            'total_kontrak' => $count,
            'selact_max' => $selact_max,
            'vendor_session' => $vendor_session,
            'pegawai' => $pegawai
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // CARI  ADENDUM
    public function get_seacrh_dendum_by_kontrak($no_kontrak = null)
    {
        $result = $this->Tagihan_kontrak_model->GetByKontrakAdendum($no_kontrak);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $kintek) {
            $row = array();
            // $row[] = ++$no;
            $row[] = $kintek->no_kontrak;
            $row[] = $kintek->no_adendum;
            $row[] = $kintek->tanggal_adendum;
            $row[] = "Rp " . number_format($kintek->jumlah, 2, ',', '.');
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Tagihan_kontrak_model->count_seacrh_adendum($no_kontrak),
            "recordsFiltered" => $this->Tagihan_kontrak_model->count_filtered_adendum($no_kontrak),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_traking_mc($id_mc)
    {
        $result = $this->Tagihan_kontrak_model->getdattable_rapot_traking($id_mc);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $kintek) {
            $row = array();
            $row[] = ++$no;
            $row[] = $kintek->uraian;
            $row[] = $kintek->pic;
            $row[] = $kintek->tanggal_rapot;
            $row[] = $kintek->catatan_rapot;
            $row[] = $kintek->hari_vendor . ' Hari';
            $row[] = $kintek->hari_area . ' Hari';
            $row[] = $kintek->hari_pusat . ' Hari';
            $row[] = $kintek->hari_finance . ' Hari';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Tagihan_kontrak_model->count_seacrh_rapot_traking($id_mc),
            "recordsFiltered" => $this->Tagihan_kontrak_model->count_filtered_rapot_traking($id_mc),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function tambah_mc()
    {
        $no_kontrak  = $this->input->post('no_kontraku');
        $jumlah_mc  = $this->input->post('jumlah_mc');
        $tanggal_mc  = $this->input->post('tanggal_mc');
        $jumlah_mcku  = $this->input->post('jumlah_mcku');
        $persen_ppn  = $this->input->post('persen_ppn');
        $cek_um  = $this->input->post('cek_um');
        $get_kode_mc = $this->Tagihan_kontrak_model->get_kode_mc($no_kontrak);
        $urutku = $get_kode_mc + 1;
        $data_urut = $urutku++;
        $startTimeStamp = strtotime($tanggal_mc);
        $endTimeStamp = strtotime(date('Y-m-d'));

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);
        if ($cek_um == 'ada') {
            $data = [
                'no_kontrak' => $no_kontrak,
                'jumlah_mc' => $jumlah_mc,
                'tanggal_mc' => $tanggal_mc,
                'no_mc' => 'um',
                'sd_bulan_lalu' => $jumlah_mc,
                'sd_bulan_ini' => $jumlah_mc,
                'persen_ppn' => $persen_ppn,
                'ppn_total' => $jumlah_mc,
                'setelah_ppn' => $jumlah_mc,
                'status_terakhir' => 'Vendor Kirim Berkas'
            ];
        } else {
            if ($data_urut == 1) {
                $data = [
                    'no_kontrak' => $no_kontrak,
                    'jumlah_mc' => $jumlah_mc,
                    'tanggal_mc' => $tanggal_mc,
                    'no_mc' => $data_urut,
                    'sd_bulan_lalu' => $jumlah_mc,
                    'sd_bulan_ini' => $jumlah_mc,
                    'persen_ppn' => $persen_ppn,
                    'ppn_total' => $jumlah_mc,
                    'setelah_ppn' => $jumlah_mc,
                    'status_terakhir' => 'Vendor Kirim Berkas'
                ];
            } else {
                $data = [
                    'no_kontrak' => $no_kontrak,
                    'jumlah_mc' => $jumlah_mc,
                    'tanggal_mc' => $tanggal_mc,
                    'no_mc' => $data_urut,
                    'sd_bulan_lalu' => $jumlah_mcku,
                    'persen_ppn' => $persen_ppn,
                    'ppn_total' => $jumlah_mc,
                    'setelah_ppn' => $jumlah_mc,
                    'sd_bulan_ini' => $jumlah_mcku + $jumlah_mc,
                    'status_terakhir' => 'Vendor Kirim Berkas'
                ];
            }
        }
        $this->Tagihan_kontrak_model->insert_mc($data);
        $id_mc = $this->db->insert_id();
        $data_kirim_ke_mc = [
            'id_mc' => $id_mc,
            'no_kontrak' => $no_kontrak,
            'id_vendor' => 1,
            'approve_vendor' => 1,
            'jumlah_hari_vendor' => $numberDays,
            'jumlah_hari_area' => 0,
            'jumlah_hari_pusat' => 0,
            'jumlah_hari_finance' => 0,
            'waktu_kirim_vendor' => date('Y-m-d'),
        ];
        $this->Tagihan_kontrak_model->create_file_mc($data_kirim_ke_mc);
        $data_rapot = [
            'id_mc' => $id_mc,
            'no_kontrak' => $no_kontrak,
            'uraian' => 'Vendor Kirim Berkas',
            'pic' => 'Vendor/Area',
            'tanggal_rapot' => date('Y-m-d'),
            'catatan_rapot' => 'Vendor Kirim Berkas',
            'hari_vendor' => $numberDays,
            'hari_area' => 0,
            'hari_pusat' => 0,
            'hari_finance' => 0

        ];
        $this->Tagihan_kontrak_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    // cek row_mc
    public function by_id_mc($id_mc)
    {
        $mc_row = $this->Tagihan_kontrak_model->cek_row_mc($id_mc);
        $row_traking = $this->Tagihan_kontrak_model->cek_mc_traking($id_mc);
        $tanggal_mc = $mc_row['tanggal_mc'];
        $date = date_create($tanggal_mc);
        date_modify($date, '+10 day');
        $data = [
            'row_mc' => $mc_row,
            'traking' => $row_traking,
            'data_selesai' =>  date_format($date, 'Y-m-d')
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function upload_file_mc()
    {
        $id_mc = $this->input->post('id_mc_upload');
        $no_kontrak = $this->input->post('no_kontrak_mc_upload');
        $ket_vendor = $this->input->post('keterangan_upload_mc');

        // jumlah hari waktu upload vendor sampai di approve area 10 hari
        $date = date_create(date('Y-m-d'));
        date_modify($date, '+10 day');

        $config['upload_path'] = './file_maping/file_mc/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 0;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file_mc')) {
            $fileData = $this->upload->data();
            $upload = [
                'id_mc' => $id_mc,
                'no_kontrak' => $no_kontrak,
                'id_vendor' => 1,
                'ket_vendor' => $ket_vendor,
                'approve_vendor' => 1,
                'awal_aprove_vendor' => date('Y-m-d'),
                'batas_aprove_vendor' => date_format($date, 'Y-m-d'),
                'jumlah_hari_vendor' => 10,
                'file_mc' => $fileData['file_name'],
            ];
            $data = [
                'status_penaggihan' => 1
            ];
            $this->Tagihan_kontrak_model->create_file_mc($upload);
            $this->Tagihan_kontrak_model->update_mc($data, $id_mc);
            $this->output->set_content_type('application/json')->set_output(json_encode('success'));
        }
    }






    public function revisi_finance()
    {
        $ket_finance = $this->input->post('ket_finance');
        $id_mc_traking = $this->input->post('id_mc_traking');
        $id_traking = $this->input->post('id_traking');
        $data_penagihan = [
            'status_penaggihan' => 0
        ];
        $this->Tagihan_kontrak_model->update_mc($data_penagihan, $id_mc_traking);
        $this->Tagihan_kontrak_model->delete_mc_traking($id_traking);
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'emiliapramuja0000@gmail.com',
            'smtp_pass' => 'emiliapramsco0000',
            'mailtype'  => 'html',
            'charset'   => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('emiliapramuja0000@gmail.com', 'FINANCE APROVEL JMTM');
        // Email penerima
        $this->email->to('anggapramuja0000@gmail.com'); // Ganti dengan email tujuan

        // Subject email
        $this->email->subject('Permintaan Revisi FINANCE JMTM');

        // Isi email
        $this->email->message($ket_finance);

        $this->email->send();
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }



    public function cekdatae()
    {
        $awal_aprove_vendor = "2022-08-10";
        $date = new DateTime($awal_aprove_vendor);
        $date_plus = $date->modify("+10 days");
        echo $date_plus->format("Y-m-d");

        //    $date = date_create($tanggal_mc);
        // date_modify($date, '+' . $numberDays . ' day');
        // date_format($date, 'Y-m-d')
    }

    // update new
    public function kirim_revisi_vendor()
    {
        $tanggal_mc = $this->input->post('tanggal_mc');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $no_kontrak = $this->input->post('no_kontrak');
        $catatan_rapot = $this->input->post('catatan_rapot');
        $startTimeStamp = strtotime($tanggal_mc);
        $endTimeStamp = strtotime(date('Y-m-d'));
        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);


        $data_penagihan = [
            'status_terakhir' => 'Vendor Kirim Berkas'
        ];
        $update_mc_traking = [
            'waktu_kirim_vendor' => date('Y-m-d'),
            'approve_vendor' => 1,
            'approve_area' => 0,
            'approve_pusat' => 0,
            'approve_finance' => 0,
            'jumlah_hari_vendor' => $numberDays,
            'jumlah_hari_area' => 0,
            'jumlah_hari_pusat' => 0,
            'jumlah_hari_finance' => 0,
        ];

        $this->Tagihan_kontrak_model->update_mc($data_penagihan, $id_mc);
        $this->Tagihan_kontrak_model->update_mc_traking($update_mc_traking, $id_traking);


        $data_rapot = [
            'id_mc' => $id_mc,
            'no_kontrak' => $no_kontrak,
            'uraian' => 'Vendor Kirim Berkas',
            'pic' => 'Vendor',
            'tanggal_rapot' => date('Y-m-d'),
            'catatan_rapot' => $catatan_rapot,
            'hari_vendor' => $numberDays,
            'hari_area' => 0,
            'hari_pusat' => 0,
            'hari_finance' => 0

        ];
        $this->Tagihan_kontrak_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function setujui_area()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_vendor = $this->input->post('waktu_kirim_vendor');
        $no_kontrak = $this->input->post('no_kontrak');
        $jumlah_hari_vendor = $this->input->post('jumlah_hari_vendor');
        $startTimeStamp = strtotime($waktu_kirim_vendor);
        $endTimeStamp = strtotime(date('Y-m-d'));

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);
        $data_penagihan = [
            'status_terakhir' => 'Area Aprove'
        ];
        $update_mc_traking = [
            'jumlah_hari_area' => $numberDays,
            'jumlah_hari_vendor' => $jumlah_hari_vendor,
            'waktu_kirim_area' => date('Y-m-d'),
            'approve_area' => 1,
            'approve_vendor' => 1
        ];

        $this->Tagihan_kontrak_model->update_mc($data_penagihan, $id_mc);
        $this->Tagihan_kontrak_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'no_kontrak' => $no_kontrak,
            'uraian' => 'Area Aprove',
            'pic' => 'Area',
            // 'tanggal_rapot' => date('Y-m-d'),
            'tanggal_rapot' => date('Y-m-d'),
            'catatan_rapot' => $catatan_rapot,
            'hari_vendor' => $jumlah_hari_vendor,
            'hari_area' => $numberDays,
            'hari_pusat' => 0,
            'hari_finance' => 0

        ];
        $this->Tagihan_kontrak_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function revisi_area()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_vendor = $this->input->post('waktu_kirim_vendor');
        $no_kontrak = $this->input->post('no_kontrak');
        $jumlah_hari_vendor = $this->input->post('jumlah_hari_vendor');
        $startTimeStamp = strtotime($waktu_kirim_vendor);
        $endTimeStamp = strtotime(date('Y-m-d'));

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);
        $data_penagihan = [
            'status_terakhir' => 'Revisi Area'
        ];
        $update_mc_traking = [
            'jumlah_hari_area' => $numberDays,
            'jumlah_hari_vendor' => $jumlah_hari_vendor,
            'waktu_kirim_area' => date('Y-m-d'),
            'approve_area' => 1,
            'approve_vendor' => 0
        ];

        $this->Tagihan_kontrak_model->update_mc($data_penagihan, $id_mc);
        $this->Tagihan_kontrak_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'no_kontrak' => $no_kontrak,
            'uraian' => 'Area Revisi',
            'pic' => 'Area',
            // 'tanggal_rapot' => date('Y-m-d'),
            'tanggal_rapot' => date('Y-m-d'),
            'catatan_rapot' => $catatan_rapot,
            'hari_vendor' => $jumlah_hari_vendor,
            'hari_area' => $numberDays,
            'hari_pusat' => 0,
            'hari_finance' => 0

        ];
        $this->Tagihan_kontrak_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }



    public function revisi_pusat()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_area = $this->input->post('waktu_kirim_area');
        $no_kontrak = $this->input->post('no_kontrak');
        $jumlah_hari_vendor = $this->input->post('jumlah_hari_vendor');
        $jumlah_hari_area = $this->input->post('jumlah_hari_area');
        $startTimeStamp = strtotime($waktu_kirim_area);
        $endTimeStamp = strtotime(date('Y-m-d'));

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);
        $data_penagihan = [
            'status_terakhir' => 'Revisi Pusat'
        ];
        $update_mc_traking = [
            'jumlah_hari_pusat' => $numberDays,
            'jumlah_hari_vendor' => $jumlah_hari_vendor,
            'jumlah_hari_area' => $jumlah_hari_area,
            'waktu_kirim_pusat' => date('Y-m-d'),
            'approve_vendor' => 0,
            'approve_area' => 1,
            'approve_pusat' => 1
        ];

        $this->Tagihan_kontrak_model->update_mc($data_penagihan, $id_mc);
        $this->Tagihan_kontrak_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'no_kontrak' => $no_kontrak,
            'uraian' => 'Pusat Revisi',
            'pic' => 'Pusat',
            // 'tanggal_rapot' => date('Y-m-d'),
            'tanggal_rapot' => date('Y-m-d'),
            'catatan_rapot' => $catatan_rapot,
            'hari_vendor' => $jumlah_hari_vendor,
            'hari_area' => $jumlah_hari_area,
            'hari_pusat' => $numberDays,
            'hari_finance' => 0

        ];
        $this->Tagihan_kontrak_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function setujui_pusat()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_area = $this->input->post('waktu_kirim_area');
        $no_kontrak = $this->input->post('no_kontrak');
        $jumlah_hari_vendor = $this->input->post('jumlah_hari_vendor');
        $jumlah_hari_area = $this->input->post('jumlah_hari_area');
        $startTimeStamp = strtotime($waktu_kirim_area);
        $endTimeStamp = strtotime(date('Y-m-d'));

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);
        $data_penagihan = [
            'status_terakhir' => 'Pusat Aprove'
        ];
        $update_mc_traking = [
            'jumlah_hari_vendor' => $jumlah_hari_vendor,
            'jumlah_hari_area' => $jumlah_hari_area,
            'jumlah_hari_pusat' => $numberDays,
            'waktu_kirim_pusat' => date('Y-m-d'),
            'approve_area' => 1,
            'approve_vendor' => 1,
            'approve_pusat' => 1
        ];

        $this->Tagihan_kontrak_model->update_mc($data_penagihan, $id_mc);
        $this->Tagihan_kontrak_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'no_kontrak' => $no_kontrak,
            'uraian' => 'Pusat Aprove',
            'pic' => 'Pusat',
            // 'tanggal_rapot' => date('Y-m-d'),
            'tanggal_rapot' => date('Y-m-d'),
            'catatan_rapot' => $catatan_rapot,
            'hari_vendor' => $jumlah_hari_vendor,
            'hari_area' => $jumlah_hari_area,
            'hari_pusat' => $numberDays,
            'hari_finance' => 0

        ];
        $this->Tagihan_kontrak_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function terima_berkas_finance()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_pusat = $this->input->post('waktu_kirim_pusat');
        $no_kontrak = $this->input->post('no_kontrak');
        $jumlah_hari_vendor = $this->input->post('jumlah_hari_vendor');
        $jumlah_hari_area = $this->input->post('jumlah_hari_area');
        $jumlah_hari_pusat = $this->input->post('jumlah_hari_pusat');
        $startTimeStamp = strtotime($waktu_kirim_pusat);
        $endTimeStamp = strtotime(date('Y-m-d'));

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);
        $data_penagihan = [
            'status_terakhir' => 'Diterima Finance'
        ];
        $update_mc_traking = [
            'jumlah_hari_vendor' => $jumlah_hari_vendor,
            'jumlah_hari_area' => $jumlah_hari_area,
            'jumlah_hari_pusat' => $jumlah_hari_pusat,
            'jumlah_hari_finance' => $numberDays,
            'waktu_kirim_finance' => date('Y-m-d'),
            'approve_area' => 1,
            'approve_vendor' => 1,
            'approve_pusat' => 1,
            'approve_finance' => 1
        ];

        $this->Tagihan_kontrak_model->update_mc($data_penagihan, $id_mc);
        $this->Tagihan_kontrak_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'no_kontrak' => $no_kontrak,
            'uraian' => 'Pusat Aprove',
            'pic' => 'Pusat',
            // 'tanggal_rapot' => date('Y-m-d'),
            'tanggal_rapot' => date('Y-m-d'),
            'catatan_rapot' => $catatan_rapot,
            'hari_vendor' => $jumlah_hari_vendor,
            'hari_area' => $jumlah_hari_area,
            'hari_pusat' => $jumlah_hari_pusat,
            'hari_finance' => $numberDays

        ];
        $this->Tagihan_kontrak_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function pencairan_finance()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_finance = $this->input->post('waktu_kirim_finance');
        $no_kontrak = $this->input->post('no_kontrak');
        $jumlah_hari_vendor = $this->input->post('jumlah_hari_vendor');
        $jumlah_hari_area = $this->input->post('jumlah_hari_area');
        $jumlah_hari_pusat = $this->input->post('jumlah_hari_pusat');
        $jumlah_hari_finance = $this->input->post('jumlah_hari_finance');
        $startTimeStamp = strtotime($waktu_kirim_finance);
        $endTimeStamp = strtotime(date('Y-m-d'));

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day

        // and you might want to convert to integer
        $numberDays = intval($numberDays);
        $data_penagihan = [
            'status_terakhir' => 'Sudah Pencairan'
        ];
        $update_mc_traking = [
            'jumlah_hari_vendor' => $jumlah_hari_vendor,
            'jumlah_hari_area' => $jumlah_hari_area,
            'jumlah_hari_pusat' => $jumlah_hari_pusat,
            'jumlah_hari_finance' => $jumlah_hari_finance,
            'waktu_kirim_finance' => date('Y-m-d'),
            'approve_area' => 1,
            'approve_vendor' => 1,
            'approve_pusat' => 1,
            'approve_finance' => 1
        ];

        $this->Tagihan_kontrak_model->update_mc($data_penagihan, $id_mc);
        $this->Tagihan_kontrak_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'no_kontrak' => $no_kontrak,
            'uraian' => 'Pencairan Finance',
            'pic' => 'Finance',
            // 'tanggal_rapot' => date('Y-m-d'),
            'tanggal_rapot' => date('Y-m-d'),
            'catatan_rapot' => $catatan_rapot,
            'hari_vendor' => $jumlah_hari_vendor,
            'hari_area' => $jumlah_hari_area,
            'hari_pusat' => $jumlah_hari_pusat,
            'hari_finance' => $numberDays

        ];
        $this->Tagihan_kontrak_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
