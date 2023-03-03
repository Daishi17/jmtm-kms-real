<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Tagihan_kontrak extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tagihan_kontrak_admin/Taggihan_kontrak_admin_model');
        $this->load->model('Admin/Data_kontrak_model');
    }
    public function buat_tagihan($id_detail_program_penyedia_jasa)
    {
        $data['row_kontrak'] = $this->Taggihan_kontrak_admin_model->get_row_kontrak($id_detail_program_penyedia_jasa);
        $data['looping_adendum'] = $this->Taggihan_kontrak_admin_model->get_addendum($id_detail_program_penyedia_jasa);
        $data['title'] = 'Dashboard';
        $this->load->view('template/head_ui');
        $this->load->view('template/sidebar_ui');
        $this->load->view('admin/Tagihan_kontrak_admin/index', $data);
        $this->load->view('template/footer_ui');
        $this->load->view('admin/Tagihan_kontrak_admin/ajax', $data);
    }
    public function by_id_detail_program_penyedia_jasa($id_detail_program_penyedia_jasa)
    {
        $data_tbl_kontrak = $this->Taggihan_kontrak_admin_model->GetByIdKontrak($id_detail_program_penyedia_jasa);
        $data_detail_taggihan = $this->Taggihan_kontrak_admin_model->GetByIdKontrakDetail($id_detail_program_penyedia_jasa);
        $count = $this->db->query("SELECT COUNT(id_detail_program_penyedia_jasa) AS total  FROM tbl_mc WHERE id_detail_program_penyedia_jasa = '$id_detail_program_penyedia_jasa'")->row();

        $cekkontrak = $this->Taggihan_kontrak_admin_model->cekKontrak($id_detail_program_penyedia_jasa);

        $cek_pertama_mc_apa = $this->Taggihan_kontrak_admin_model->cek_pertama_mc_apa($id_detail_program_penyedia_jasa);
        $vendor_session = $this->session->userdata('id_vendor');
        $pegawai = $this->session->userdata('id_departemen');

        $get_kode_mc = $this->Taggihan_kontrak_admin_model->get_kode_mc($id_detail_program_penyedia_jasa);
        $urutku = $get_kode_mc + 1;
        $data_urut = $urutku++;

        $jika_ada_um = $this->Taggihan_kontrak_admin_model->get_cek_um($id_detail_program_penyedia_jasa);
        $select_max_mc1 = $this->Taggihan_kontrak_admin_model->get_last_mc($id_detail_program_penyedia_jasa);

        $select_max_mc2 = $this->Taggihan_kontrak_admin_model->get_last_mc_jumlah($id_detail_program_penyedia_jasa);

        $row_kontrak = $this->Taggihan_kontrak_admin_model->get_row_kontrak($id_detail_program_penyedia_jasa);
        $data = [
            'datakontrak' => $data_tbl_kontrak,
            'get_detail_taggihan' => $data_detail_taggihan,
            'cekkontrak' => $cekkontrak,
            'total_kontrak' => $count,
            'selact_max1' => $select_max_mc1,
            'selact_max2' => $select_max_mc2,
            'vendor_session' => $vendor_session,
            'pegawai' => $pegawai,
            'cek_pertama_mc_apa' => $cek_pertama_mc_apa,
            'no_urut_mc' => $data_urut,
            'jika_ada_um' => $jika_ada_um,
            'row_kontrak' => $row_kontrak
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // CARI  ADENDUM
    public function get_seacrh_dendum_by_kontrak($id_detail_program_penyedia_jasa = null)
    {
        $result = $this->Taggihan_kontrak_admin_model->GetByKontrakAdendum($id_detail_program_penyedia_jasa);
        $data = [];
        $no = $_POST['start'];
        foreach ($result as $kintek) {
            $row = array();
            $row[] = $kintek->no_addendum;
            $row[] = $kintek->tanggal_addendum;
            $row[] = "Rp " . number_format($kintek->nilai_addendum, 2, ',', '.');
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Taggihan_kontrak_admin_model->count_seacrh_adendum($id_detail_program_penyedia_jasa),
            "recordsFiltered" => $this->Taggihan_kontrak_admin_model->count_filtered_adendum($id_detail_program_penyedia_jasa),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }

    public function get_data_traking_mc($id_mc)
    {
        $result = $this->Taggihan_kontrak_admin_model->getdattable_rapot_traking($id_mc);
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
            "recordsTotal" => $this->Taggihan_kontrak_admin_model->count_seacrh_rapot_traking($id_mc),
            "recordsFiltered" => $this->Taggihan_kontrak_admin_model->count_filtered_rapot_traking($id_mc),
            "data" => $data
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($output));
    }
    public function tambah_mc()
    {
        $id_detail_program_penyedia_jasa  = $this->input->post('id_detail_program_penyedia_jasau');
        $jumlah_mc  = $this->input->post('jumlah_mc');
        $tanggal_mc  = $this->input->post('tanggal_mc');
        $jumlah_mcku  = $this->input->post('jumlah_mcku');
        $persen_ppn  = $this->input->post('persen_ppn');
        $cek_um  = $this->input->post('cek_um');
        // retensi
        $sts_retensi  = $this->input->post('sts_retensi');
        $nilai_retensi  = $this->input->post('nilai_retensi');
        $nilai_retensi_tanpa_persen  = $this->input->post('nilai_retensi_tanpa_persen');


        // bobot & denda
        $bobot  = $this->input->post('bobot');
        $denda  = $this->input->post('denda');
        // nilai_uang_muka
        $nilai_uang_muka  = $this->input->post('nilai_uang_muka');
        $get_kode_mc = $this->Taggihan_kontrak_admin_model->get_kode_mc($id_detail_program_penyedia_jasa);
        $urutku = $get_kode_mc + 1;
        $data_urut = $urutku++;
        $startTimeStamp = strtotime($tanggal_mc);
        $endTimeStamp = strtotime(date('Y-m-d'));

        $timeDiff = abs($endTimeStamp - $startTimeStamp);

        $numberDays = $timeDiff / 86400;  // 86400 seconds in one day
        if ($persen_ppn == '11') {
            $hitung_persen_total_ppn = $jumlah_mc * 0.11;
        } else {
            $hitung_persen_total_ppn = $jumlah_mc * 0.10;
        }
        $hasil_ppn_total = $hitung_persen_total_ppn;
        $hasil_setelah_ppn = $jumlah_mc + $hasil_ppn_total;
        // and you might want to convert to integer
        $numberDays = intval($numberDays);

        if ($sts_retensi == 1) {
            $total_retensi = $nilai_retensi_tanpa_persen;
        } else {
            $total_retensi = $nilai_retensi;
        }

        if ($cek_um == 'ada') {
            $data = [
                'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                'jumlah_mc' => $jumlah_mc,
                'tanggal_mc' => $tanggal_mc,
                'no_mc' => 'um',
                'sd_bulan_lalu' => $jumlah_mc,
                'sd_bulan_ini' => $jumlah_mc,
                'persen_ppn' => $persen_ppn,
                'ppn_total' => $hasil_ppn_total,
                'setelah_ppn' => $hasil_setelah_ppn,
                // retensi
                'nilai_retensi' => $total_retensi,
                'sts_retensi' => $sts_retensi,
                // bobot & denda
                'bobot' => $bobot,
                'denda' => $denda,
                // nilai_uang_muka
                'nilai_uang_muka' => $nilai_uang_muka,
            ];
        } else {
            if ($data_urut == 1) {
                $data = [
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'jumlah_mc' => $jumlah_mc,
                    'tanggal_mc' => $tanggal_mc,
                    'no_mc' => $data_urut,
                    'sd_bulan_lalu' => $jumlah_mc,
                    'sd_bulan_ini' => $jumlah_mc,
                    'persen_ppn' => $persen_ppn,
                    'ppn_total' => $hasil_ppn_total,
                    'setelah_ppn' => $hasil_setelah_ppn,
                    // retensi
                    'nilai_retensi' => $total_retensi,
                    'sts_retensi' => $sts_retensi,
                    // bobot & denda
                    'bobot' => $bobot,
                    'denda' => $denda,
                    // nilai_uang_muka
                    'nilai_uang_muka' => $nilai_uang_muka,
                ];
            } else {
                $data = [
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'jumlah_mc' => $jumlah_mc,
                    'tanggal_mc' => $tanggal_mc,
                    'no_mc' => $data_urut,
                    'sd_bulan_lalu' => $jumlah_mcku,
                    'persen_ppn' => $persen_ppn,
                    'ppn_total' => $hasil_ppn_total,
                    'setelah_ppn' => $hasil_setelah_ppn,
                    'sd_bulan_ini' => $jumlah_mcku + $jumlah_mc,
                    // retensi
                    'nilai_retensi' => $total_retensi,
                    'sts_retensi' => $sts_retensi,
                    // bobot & denda
                    'bobot' => $bobot,
                    'denda' => $denda,
                    // nilai_uang_muka
                    'nilai_uang_muka' => $nilai_uang_muka,
                ];
            }
        }
        // data
        $this->Taggihan_kontrak_admin_model->insert_mc($data);
        $id_mc = $this->db->insert_id();
        $data_kirim_ke_mc = [
            'id_mc' => $id_mc,
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
            'id_vendor' => 1,
            'approve_vendor' => 1,
            'jumlah_hari_vendor' => $numberDays,
            'jumlah_hari_area' => 0,
            'jumlah_hari_pusat' => 0,
            'jumlah_hari_finance' => 0,
            'waktu_kirim_vendor' => date('Y-m-d'),
        ];
        $this->Taggihan_kontrak_admin_model->create_file_mc($data_kirim_ke_mc);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
    public function edit_mc()
    {
        $id_detail_program_penyedia_jasa  = $this->input->post('id_detail_program_penyedia_jasau');
        $jumlah_mc  = $this->input->post('jumlah_mc');
        $tanggal_mc  = $this->input->post('tanggal_mc');
        $jumlah_mcku  = $this->input->post('jumlah_mc_edit');
        $persen_ppn  = $this->input->post('persen_ppn');
        $cek_um  = $this->input->post('cek_um');
        $data_no_mc  = $this->input->post('data_no_mc');
        $id_mc  = $this->input->post('id_mc');
        $get_kode_mc = $this->Taggihan_kontrak_admin_model->get_kode_mc($id_detail_program_penyedia_jasa);
        $urutku = $get_kode_mc + 1;
        $data_urut = $urutku++;
        $hitung_persen_total_ppn = ($jumlah_mc * $persen_ppn) / 100;
        $hasil_ppn_total = $hitung_persen_total_ppn;
        $hasil_setelah_ppn = $jumlah_mc + $hasil_ppn_total;
        // kondisi generate update
        $ambil_mc_edit = $this->Taggihan_kontrak_admin_model->get_only_now_edit($id_mc);
        $ambil_no_mc_edit = $ambil_mc_edit['no_mc'];
        $ambil_kontrak_edit = $ambil_mc_edit['id_detail_program_penyedia_jasa'];
        // looping by edit 
        if ($cek_um == 'ada') {
            $data = [
                'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                'jumlah_mc' => $jumlah_mc,
                'tanggal_mc' => $tanggal_mc,
                'no_mc' => 'um',
                'sd_bulan_lalu' => $jumlah_mc,
                'sd_bulan_ini' => $jumlah_mc,
                'persen_ppn' => $persen_ppn,
                'ppn_total' => $hasil_ppn_total,
                'setelah_ppn' => $hasil_setelah_ppn,

            ];
            $this->Taggihan_kontrak_admin_model->update_mc($data, $id_mc);
        } else {
            if ($data_no_mc == 'um') {
                $data = [
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'jumlah_mc' => $jumlah_mc,
                    'tanggal_mc' => $tanggal_mc,
                    'no_mc' => 'um',
                    'sd_bulan_lalu' => $jumlah_mc,
                    'sd_bulan_ini' => $jumlah_mc,
                    'persen_ppn' => $persen_ppn,
                    'ppn_total' => $hasil_ppn_total,
                    'setelah_ppn' => $hasil_setelah_ppn,
                ];
                $this->Taggihan_kontrak_admin_model->update_mc($data, $id_mc);
            } else if ($data_no_mc == 1) {
                $data = [
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'jumlah_mc' => $jumlah_mc,
                    'tanggal_mc' => $tanggal_mc,
                    'no_mc' => $data_no_mc,
                    'sd_bulan_lalu' => $jumlah_mc,
                    'sd_bulan_ini' => $jumlah_mc,
                    'persen_ppn' => $persen_ppn,
                    'ppn_total' => $hasil_ppn_total,
                    'setelah_ppn' => $hasil_setelah_ppn,

                ];
                $this->Taggihan_kontrak_admin_model->update_mc($data, $id_mc);
                $data_mc = $this->Taggihan_kontrak_admin_model->generate_update($ambil_kontrak_edit, $ambil_no_mc_edit);
                // array_bulan_ini
                $sd_bulan_ini0 = $data_mc[0]['sd_bulan_ini'];
                // var_dump($data_mc[1]['id_mc']);
                // die;
                if (!isset($data_mc[1])) {
                } else {
                    $id_mc1 = $data_mc[1]['id_mc'];
                    $jumlah_mc1 = $data_mc[1]['jumlah_mc'];
                }

                if (!isset($data_mc[2])) {
                } else {
                    $id_mc2 = $data_mc[2]['id_mc'];
                    $jumlah_mc2 = $data_mc[2]['jumlah_mc'];
                }
                if (!isset($data_mc[3])) {
                } else {
                    $id_mc3 = $data_mc[3]['id_mc'];
                    $jumlah_mc3 = $data_mc[3]['jumlah_mc'];
                }

                if (!isset($data_mc[4])) {
                } else {
                    $id_mc4 = $data_mc[4]['id_mc'];
                    $jumlah_mc4 = $data_mc[4]['jumlah_mc'];
                }
                if (!isset($data_mc[5])) {
                } else {
                    $id_mc5 = $data_mc[5]['id_mc'];
                    $jumlah_mc5 = $data_mc[5]['jumlah_mc'];
                }
                if (!isset($data_mc[6])) {
                } else {
                    $id_mc6 = $data_mc[6]['id_mc'];
                    $jumlah_mc6 = $data_mc[6]['jumlah_mc'];
                }
                if (!isset($data_mc[7])) {
                } else {
                    $id_mc7 = $data_mc[7]['id_mc'];
                    $jumlah_mc7 = $data_mc[7]['jumlah_mc'];
                }
                if (!isset($data_mc[8])) {
                } else {
                    $id_mc8 = $data_mc[8]['id_mc'];
                    $jumlah_mc8 = $data_mc[8]['jumlah_mc'];
                }
                if (!isset($data_mc[9])) {
                } else {
                    $id_mc9 = $data_mc[9]['id_mc'];
                    $jumlah_mc9 = $data_mc[9]['jumlah_mc'];
                }
                if (!isset($data_mc[10])) {
                } else {
                    $id_mc10 = $data_mc[10]['id_mc'];
                    $jumlah_mc10 = $data_mc[10]['jumlah_mc'];
                }
                // 1
                if (isset($data_mc[1])) {
                    $updateAray1 = [
                        'sd_bulan_lalu' => $sd_bulan_ini0,
                        'jumlah_mc' => $jumlah_mc1,
                        'sd_bulan_ini' =>  $sd_bulan_ini0 + $jumlah_mc1,

                    ];
                    $data_arrayku1 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc1, $updateAray1);
                    $mc_real1 = $data_arrayku1['id_mc'];
                } else {
                }
                if (isset($data_mc[2])) {
                    $data_row_post_array1 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real1);
                    $updateAray2 = [
                        'sd_bulan_lalu' => $data_row_post_array1['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc2,
                        'sd_bulan_ini' =>  $data_row_post_array1['sd_bulan_ini'] + $jumlah_mc2,

                    ];
                    $data_arrayku2 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc2, $updateAray2);
                    $mc_real2 = $data_arrayku2['id_mc'];
                } else {
                    // 2
                }
                if (isset($data_mc[3])) {
                    // 2
                    // 3
                    $data_row_post_array2 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real2);
                    $updateAray3 = [
                        'sd_bulan_lalu' => $data_row_post_array2['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc3,
                        'sd_bulan_ini' =>  $data_row_post_array2['sd_bulan_ini'] + $jumlah_mc3,

                    ];
                    $data_arrayku3 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc3, $updateAray3);
                    $mc_real3 = $data_arrayku3['id_mc'];
                } else {
                    // 3
                }

                if (isset($data_mc[4])) {
                    // 1
                    // 2
                    $data_row_post_array3 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real3);
                    $updateAray4 = [
                        'sd_bulan_lalu' => $data_row_post_array3['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc4,
                        'sd_bulan_ini' =>  $data_row_post_array3['sd_bulan_ini'] + $jumlah_mc4,

                    ];
                    $data_arrayku4 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc4, $updateAray4);
                    $mc_real4 = $data_arrayku4['id_mc'];
                } else {

                    // 4
                }
                if (isset($data_mc[5])) {
                    // 4
                    // 5
                    $data_row_post_array4 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real4);
                    $updateAray5 = [
                        'sd_bulan_lalu' => $data_row_post_array4['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc5,
                        'sd_bulan_ini' =>  $data_row_post_array4['sd_bulan_ini'] + $jumlah_mc5,

                    ];
                    $data_arrayku5 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc5, $updateAray5);
                    $mc_real5 = $data_arrayku5['id_mc'];
                } else {
                    // 5
                }
                if (isset($data_mc[6])) {
                    // 6
                    // 5
                    $data_row_post_array5 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real5);
                    $updateAray6 = [
                        'sd_bulan_lalu' => $data_row_post_array5['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc6,
                        'sd_bulan_ini' =>  $data_row_post_array5['sd_bulan_ini'] + $jumlah_mc6,

                    ];
                    $data_arrayku6 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc6, $updateAray6);
                    $mc_real6 = $data_arrayku6['id_mc'];
                } else {
                    // 6
                }
                if (isset($data_mc[7])) {
                    // 7
                    // 6
                    $data_row_post_array6 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real6);
                    $updateAray7 = [
                        'sd_bulan_lalu' => $data_row_post_array6['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc7,
                        'sd_bulan_ini' =>  $data_row_post_array6['sd_bulan_ini'] + $jumlah_mc7,

                    ];
                    $data_arrayku7 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc7, $updateAray7);
                    $mc_real7 = $data_arrayku7['id_mc'];
                } else {
                    // 7
                }
                if (isset($data_mc[8])) {
                    // 8
                    // 7
                    $data_row_post_array7 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real7);
                    $updateAray8 = [
                        'sd_bulan_lalu' => $data_row_post_array7['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc8,
                        'sd_bulan_ini' =>  $data_row_post_array7['sd_bulan_ini'] + $jumlah_mc8,

                    ];
                    $data_arrayku8 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc8, $updateAray8);
                    $mc_real8 = $data_arrayku8['id_mc'];
                } else {
                    // 8
                }
                if (isset($data_mc[9])) {
                    // 9
                    // 8
                    $data_row_post_array8 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real8);
                    $updateAray9 = [
                        'sd_bulan_lalu' => $data_row_post_array8['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc9,
                        'sd_bulan_ini' =>  $data_row_post_array8['sd_bulan_ini'] + $jumlah_mc9,

                    ];
                    $data_arrayku9 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc9, $updateAray9);
                    $mc_real9 = $data_arrayku9['id_mc'];
                } else {
                    // 9
                }
                if (isset($data_mc[10])) {
                    // 10
                    // 9
                    $data_row_post_array9 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real9);
                    $updateAray10 = [
                        'sd_bulan_lalu' => $data_row_post_array9['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc10,
                        'sd_bulan_ini' =>  $data_row_post_array9['sd_bulan_ini'] + $jumlah_mc10,

                    ];
                    $data_arrayku10 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc10, $updateAray10);
                    $mc_real10 = $data_arrayku10['id_mc'];
                } else {
                }
            } else {
                $data = [
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'jumlah_mc' => $jumlah_mc,
                    'tanggal_mc' => $tanggal_mc,
                    'no_mc' => $data_no_mc,
                    'sd_bulan_lalu' => $jumlah_mcku,
                    'persen_ppn' => $persen_ppn,
                    'ppn_total' => $hasil_ppn_total,
                    'setelah_ppn' => $hasil_setelah_ppn,
                    'sd_bulan_ini' => $jumlah_mcku + $jumlah_mc,
                ];

                $this->Taggihan_kontrak_admin_model->update_mc($data, $id_mc);
                $data_mc = $this->Taggihan_kontrak_admin_model->generate_update($ambil_kontrak_edit, $ambil_no_mc_edit);
                // array_bulan_ini
                $sd_bulan_ini0 = $data_mc[0]['sd_bulan_ini'];
                // var_dump($data_mc[1]['id_mc']);
                // die;
                if (!isset($data_mc[1])) {
                } else {
                    $id_mc1 = $data_mc[1]['id_mc'];
                    $jumlah_mc1 = $data_mc[1]['jumlah_mc'];
                }

                if (!isset($data_mc[2])) {
                } else {
                    $id_mc2 = $data_mc[2]['id_mc'];
                    $jumlah_mc2 = $data_mc[2]['jumlah_mc'];
                }
                if (!isset($data_mc[3])) {
                } else {
                    $id_mc3 = $data_mc[3]['id_mc'];
                    $jumlah_mc3 = $data_mc[3]['jumlah_mc'];
                }

                if (!isset($data_mc[4])) {
                } else {
                    $id_mc4 = $data_mc[4]['id_mc'];
                    $jumlah_mc4 = $data_mc[4]['jumlah_mc'];
                }
                if (!isset($data_mc[5])) {
                } else {
                    $id_mc5 = $data_mc[5]['id_mc'];
                    $jumlah_mc5 = $data_mc[5]['jumlah_mc'];
                }
                if (!isset($data_mc[6])) {
                } else {
                    $id_mc6 = $data_mc[6]['id_mc'];
                    $jumlah_mc6 = $data_mc[6]['jumlah_mc'];
                }
                if (!isset($data_mc[7])) {
                } else {
                    $id_mc7 = $data_mc[7]['id_mc'];
                    $jumlah_mc7 = $data_mc[7]['jumlah_mc'];
                }
                if (!isset($data_mc[8])) {
                } else {
                    $id_mc8 = $data_mc[8]['id_mc'];
                    $jumlah_mc8 = $data_mc[8]['jumlah_mc'];
                }
                if (!isset($data_mc[9])) {
                } else {
                    $id_mc9 = $data_mc[9]['id_mc'];
                    $jumlah_mc9 = $data_mc[9]['jumlah_mc'];
                }
                if (!isset($data_mc[10])) {
                } else {
                    $id_mc10 = $data_mc[10]['id_mc'];
                    $jumlah_mc10 = $data_mc[10]['jumlah_mc'];
                }



                // 1
                if (isset($data_mc[1])) {
                    $updateAray1 = [
                        'sd_bulan_lalu' => $sd_bulan_ini0,
                        'jumlah_mc' => $jumlah_mc1,
                        'sd_bulan_ini' =>  $sd_bulan_ini0 + $jumlah_mc1,

                    ];
                    $data_arrayku1 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc1, $updateAray1);
                    $mc_real1 = $data_arrayku1['id_mc'];
                } else {
                }
                if (isset($data_mc[2])) {
                    $data_row_post_array1 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real1);
                    $updateAray2 = [
                        'sd_bulan_lalu' => $data_row_post_array1['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc2,
                        'sd_bulan_ini' =>  $data_row_post_array1['sd_bulan_ini'] + $jumlah_mc2,

                    ];
                    $data_arrayku2 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc2, $updateAray2);
                    $mc_real2 = $data_arrayku2['id_mc'];
                } else {
                    // 2
                }
                if (isset($data_mc[3])) {
                    // 2
                    // 3
                    $data_row_post_array2 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real2);
                    $updateAray3 = [
                        'sd_bulan_lalu' => $data_row_post_array2['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc3,
                        'sd_bulan_ini' =>  $data_row_post_array2['sd_bulan_ini'] + $jumlah_mc3,

                    ];
                    $data_arrayku3 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc3, $updateAray3);
                    $mc_real3 = $data_arrayku3['id_mc'];
                } else {
                    // 3
                }

                if (isset($data_mc[4])) {
                    // 1
                    // 2
                    $data_row_post_array3 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real3);
                    $updateAray4 = [
                        'sd_bulan_lalu' => $data_row_post_array3['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc4,
                        'sd_bulan_ini' =>  $data_row_post_array3['sd_bulan_ini'] + $jumlah_mc4,

                    ];
                    $data_arrayku4 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc4, $updateAray4);
                    $mc_real4 = $data_arrayku4['id_mc'];
                } else {

                    // 4
                }
                if (isset($data_mc[5])) {
                    // 4
                    // 5
                    $data_row_post_array4 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real4);
                    $updateAray5 = [
                        'sd_bulan_lalu' => $data_row_post_array4['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc5,
                        'sd_bulan_ini' =>  $data_row_post_array4['sd_bulan_ini'] + $jumlah_mc5,

                    ];
                    $data_arrayku5 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc5, $updateAray5);
                    $mc_real5 = $data_arrayku5['id_mc'];
                } else {
                    // 5
                }
                if (isset($data_mc[6])) {
                    // 6
                    // 5
                    $data_row_post_array5 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real5);
                    $updateAray6 = [
                        'sd_bulan_lalu' => $data_row_post_array5['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc6,
                        'sd_bulan_ini' =>  $data_row_post_array5['sd_bulan_ini'] + $jumlah_mc6,

                    ];
                    $data_arrayku6 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc6, $updateAray6);
                    $mc_real6 = $data_arrayku6['id_mc'];
                } else {
                    // 6
                }
                if (isset($data_mc[7])) {
                    // 7
                    // 6
                    $data_row_post_array6 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real6);
                    $updateAray7 = [
                        'sd_bulan_lalu' => $data_row_post_array6['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc7,
                        'sd_bulan_ini' =>  $data_row_post_array6['sd_bulan_ini'] + $jumlah_mc7,

                    ];
                    $data_arrayku7 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc7, $updateAray7);
                    $mc_real7 = $data_arrayku7['id_mc'];
                } else {
                    // 7
                }
                if (isset($data_mc[8])) {
                    // 8
                    // 7
                    $data_row_post_array7 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real7);
                    $updateAray8 = [
                        'sd_bulan_lalu' => $data_row_post_array7['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc8,
                        'sd_bulan_ini' =>  $data_row_post_array7['sd_bulan_ini'] + $jumlah_mc8,

                    ];
                    $data_arrayku8 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc8, $updateAray8);
                    $mc_real8 = $data_arrayku8['id_mc'];
                } else {
                    // 8
                }
                if (isset($data_mc[9])) {
                    // 9
                    // 8
                    $data_row_post_array8 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real8);
                    $updateAray9 = [
                        'sd_bulan_lalu' => $data_row_post_array8['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc9,
                        'sd_bulan_ini' =>  $data_row_post_array8['sd_bulan_ini'] + $jumlah_mc9,

                    ];
                    $data_arrayku9 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc9, $updateAray9);
                    $mc_real9 = $data_arrayku9['id_mc'];
                } else {
                    // 9
                }
                if (isset($data_mc[10])) {
                    // 10
                    // 9
                    $data_row_post_array9 = $this->Taggihan_kontrak_admin_model->cek_row_mc($mc_real9);
                    $updateAray10 = [
                        'sd_bulan_lalu' => $data_row_post_array9['sd_bulan_ini'],
                        'jumlah_mc' => $jumlah_mc10,
                        'sd_bulan_ini' =>  $data_row_post_array9['sd_bulan_ini'] + $jumlah_mc10,

                    ];
                    $data_arrayku10 = $this->Taggihan_kontrak_admin_model->upadte_aray1($id_mc10, $updateAray10);
                    $mc_real10 = $data_arrayku10['id_mc'];
                } else {
                }
            }
        }

        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }



    // cek row_mc_rapot_dummy
    public function by_id_mc_rapot($id_mc)
    {
        $row_rapot = $this->Taggihan_kontrak_admin_model->cek_row_rapot_dummy($id_mc);
        $data = [
            'row_rapot_dummy' => $row_rapot,
        ];
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    // cek row_mc
    public function by_id_mc($id_mc)
    {
        $mc_row = $this->Taggihan_kontrak_admin_model->cek_row_mc($id_mc);
        $row_traking = $this->Taggihan_kontrak_admin_model->cek_mc_traking($id_mc);
        $get_traking_vendor = $this->Taggihan_kontrak_admin_model->get_traking_vendor($id_mc);
        $get_traking_area = $this->Taggihan_kontrak_admin_model->get_traking_area($id_mc);
        $get_traking_pusat = $this->Taggihan_kontrak_admin_model->get_traking_pusat($id_mc);
        $get_traking_finance = $this->Taggihan_kontrak_admin_model->get_traking_finance($id_mc);
        $get_traking_data = $this->Taggihan_kontrak_admin_model->get_traking_data($id_mc);

        $id_detail_program_penyedia_jasa = $mc_row['id_detail_program_penyedia_jasa'];
        $get_kode_mc = $this->Taggihan_kontrak_admin_model->get_kode_mc($id_detail_program_penyedia_jasa);
        $urutku = $get_kode_mc + 1;
        $data_urut = $urutku++;

        $tanggal_mc = $mc_row['tanggal_mc'];
        $date = date_create($tanggal_mc);
        date_modify($date, '+10 day');

        // ini untuk edit mc 

        if ($mc_row['no_mc'] == 'um') {
            $jika_ada_um_edit = $this->Taggihan_kontrak_admin_model->get_cek_um($id_detail_program_penyedia_jasa);
            $data = [
                'row_mc' => $mc_row,
                'traking' => $row_traking,
                'data_selesai' =>  date_format($date, 'Y-m-d'),
                'get_traking_vendor' => $get_traking_vendor,
                'get_traking_area' => $get_traking_area,
                'get_traking_pusat' => $get_traking_pusat,
                'get_traking_finance' => $get_traking_finance,
                'get_traking_data' => $get_traking_data,
                'no_urut_mc' => $data_urut,
                'jika_ada_um_edit' => $jika_ada_um_edit,
            ];
        } else  if ($mc_row['no_mc'] == '1') {
            $jika_ada_um_edit = $this->Taggihan_kontrak_admin_model->get_cek_um($id_detail_program_penyedia_jasa);
            $data = [
                'row_mc' => $mc_row,
                'traking' => $row_traking,
                'data_selesai' =>  date_format($date, 'Y-m-d'),
                'get_traking_vendor' => $get_traking_vendor,
                'get_traking_area' => $get_traking_area,
                'get_traking_pusat' => $get_traking_pusat,
                'get_traking_finance' => $get_traking_finance,
                'get_traking_data' => $get_traking_data,
                'no_urut_mc' => $data_urut,
                'jika_ada_um_edit' => $jika_ada_um_edit,
            ];
        } else {
            $kontrak_sebelum_edit = $mc_row['id_detail_program_penyedia_jasa'];
            $no_mc_sebelum_edit = (int)$mc_row['no_mc'] - 1;
            $data_mc_sebelum_row_edit = $this->Taggihan_kontrak_admin_model->get_last_edit($kontrak_sebelum_edit, $no_mc_sebelum_edit);
            $jika_ada_um_edit = $this->Taggihan_kontrak_admin_model->get_cek_um($id_detail_program_penyedia_jasa);
            $data = [
                'row_mc' => $mc_row,
                'traking' => $row_traking,
                'data_selesai' =>  date_format($date, 'Y-m-d'),
                'get_traking_vendor' => $get_traking_vendor,
                'get_traking_area' => $get_traking_area,
                'get_traking_pusat' => $get_traking_pusat,
                'get_traking_finance' => $get_traking_finance,
                'get_traking_data' => $get_traking_data,
                'no_urut_mc' => $data_urut,
                'total_mc_sebelum_edit' => $data_mc_sebelum_row_edit,
                'jika_ada_um_edit' => $jika_ada_um_edit,
            ];
        }
        $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    public function upload_file_mc()
    {
        $id_mc = $this->input->post('id_mc_upload');
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasau_mc_upload');
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
                'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
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
            $this->Taggihan_kontrak_admin_model->create_file_mc($upload);
            $this->Taggihan_kontrak_admin_model->update_mc($data, $id_mc);
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
        $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc_traking);
        $this->Taggihan_kontrak_admin_model->delete_mc_traking($id_traking);
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
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasa');
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

        $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
        $this->Taggihan_kontrak_admin_model->update_mc_traking($update_mc_traking, $id_traking);


        $data_rapot = [
            'id_mc' => $id_mc,
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
            'uraian' => 'Vendor Kirim Berkas',
            'pic' => 'Vendor',
            'tanggal_rapot' => date('Y-m-d'),
            'catatan_rapot' => $catatan_rapot,
            'hari_vendor' => $numberDays,
            'hari_area' => 0,
            'hari_pusat' => 0,
            'hari_finance' => 0

        ];
        $this->Taggihan_kontrak_admin_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function setujui_area()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_vendor = $this->input->post('waktu_kirim_vendor');
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasa');
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

        $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
        $this->Taggihan_kontrak_admin_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
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
        $this->Taggihan_kontrak_admin_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function revisi_area()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_vendor = $this->input->post('waktu_kirim_vendor');
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasa');
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

        $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
        $this->Taggihan_kontrak_admin_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
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
        $this->Taggihan_kontrak_admin_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }



    public function revisi_pusat()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_area = $this->input->post('waktu_kirim_area');
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasau');
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

        $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
        $this->Taggihan_kontrak_admin_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'id_detail_program_penyediajasa' => $id_detail_program_penyedia_jasa,
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
        $this->Taggihan_kontrak_admin_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function setujui_pusat()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_area = $this->input->post('waktu_kirim_area');
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasau');
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

        $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
        $this->Taggihan_kontrak_admin_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
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
        $this->Taggihan_kontrak_admin_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function terima_berkas_finance()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_pusat = $this->input->post('waktu_kirim_pusat');
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasau');
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

        $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
        $this->Taggihan_kontrak_admin_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
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
        $this->Taggihan_kontrak_admin_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function pencairan_finance()
    {
        $catatan_rapot = $this->input->post('catatan_rapot');
        $id_mc = $this->input->post('id_mc');
        $id_traking = $this->input->post('id_traking');
        $waktu_kirim_finance = $this->input->post('waktu_kirim_finance');
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasau');
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

        $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
        $this->Taggihan_kontrak_admin_model->update_mc_traking($update_mc_traking, $id_traking);
        $data_rapot = [
            'id_mc' => $id_mc,
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
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
        $this->Taggihan_kontrak_admin_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }


    public function kirim_traking()
    {
        $tanggal_mc = $this->input->post('tanggal_mc');
        $id_mc = $this->input->post('id_mc');
        $pic = $this->input->post('pic');
        $tanggal_rapot = $this->input->post('tanggal_rapot');
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasau');
        $uraian = $this->input->post('uraian');

        if ($pic == 'Vendor') {
            $startTimeStamp = strtotime($tanggal_mc);
            $endTimeStamp = strtotime($tanggal_rapot);
            $timeDiff = abs($endTimeStamp - $startTimeStamp);
            $numberDays = $timeDiff / 86400;
            $numberDays = intval($numberDays);
            $data_penagihan = [
                'status_terakhir' => 'Vendor Kirim Berkas',
                'sts_tanggal_trakhir' => $tanggal_rapot
            ];
            $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
            $data_rapot = [
                'id_mc' => $id_mc,
                'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                'uraian' => 'Vendor Kirim Berkas',
                'pic' => $pic,
                'tanggal_rapot' => $tanggal_rapot,
                'catatan_rapot' => 'Vendor Kirim Berkas',
                'hari_vendor' => $numberDays,

            ];
        } else if ($pic == 'Area') {
            $cek_rapot =  $this->Taggihan_kontrak_admin_model->cek_rapot($id_detail_program_penyedia_jasa, $id_mc);
            if ($cek_rapot) {
                $cek_uraian =  $this->Taggihan_kontrak_admin_model->cek_rapot_uraian_trakhir($id_detail_program_penyedia_jasa, $id_mc);
                if ($cek_uraian['uraian'] == 'Revisi Area') {
                    $tanggal_rapot_trakhir = $cek_rapot['tanggal_rapot'];
                    $startTimeStamp = strtotime($tanggal_mc);
                    $endTimeStamp = strtotime($tanggal_rapot);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff / 86400;
                    $numberDays = intval($numberDays);
                } else {
                    $hari_vendor = $cek_rapot['hari_vendor'];
                    $hari_area = $cek_rapot['hari_area'];
                    $tanggal_rapot_trakhir = $cek_rapot['tanggal_rapot'];
                    $startTimeStamp = strtotime($tanggal_rapot_trakhir);
                    $endTimeStamp = strtotime($tanggal_rapot);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff / 86400;
                    $numberDays = intval($numberDays);
                }
            } else {
                $hari_vendor = 0;
                $hari_area = 0;
                $tanggal_rapot_trakhir = $tanggal_mc;
                $startTimeStamp = strtotime($tanggal_rapot_trakhir);
                $endTimeStamp = strtotime($tanggal_rapot);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff / 86400;
                $numberDays = intval($numberDays);
            }
            if ($uraian == 'Terima') {
                if ($cek_rapot['uraian'] == 'Revisi Area') {
                    $data_penagihan = [
                        'status_terakhir' => 'Berkas Diterima Area',
                        'sts_tanggal_trakhir' => $tanggal_rapot
                    ];
                    $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                    $data_rapot = [
                        'id_mc' => $id_mc,
                        'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                        'uraian' => 'Berkas Diterima Area',
                        'pic' => $pic,
                        'tanggal_rapot' => $tanggal_rapot,
                        'catatan_rapot' => 'Berkas Diterima Area',
                        'hari_vendor' => $numberDays,
                        'hari_area' => 0,
                        'hari_pusat' => 0,
                        'hari_finance' => 0

                    ];
                } else {
                    $data_penagihan = [
                        'status_terakhir' => 'Berkas Diterima Area',
                        'sts_tanggal_trakhir' => $tanggal_rapot
                    ];
                    $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);

                    $data_rapot = [
                        'id_mc' => $id_mc,
                        'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                        'uraian' => 'Diterima Area',
                        'pic' => $pic,
                        'tanggal_rapot' => $tanggal_rapot,
                        'catatan_rapot' => 'Berkas Diterima Area',
                        'hari_vendor' => $hari_vendor,
                        'hari_area' => $hari_area,
                        'hari_pusat' => 0,
                        'hari_finance' => 0

                    ];
                }
            } else if ($uraian == 'Aprove') {
                $data_penagihan = [
                    'status_terakhir' => 'Aprove Area',
                    'sts_tanggal_trakhir' => $tanggal_rapot
                ];
                $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                $data_rapot = [
                    'id_mc' => $id_mc,
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'uraian' => 'Aprove Area',
                    'pic' => $pic,
                    'tanggal_rapot' => $tanggal_rapot,
                    'catatan_rapot' => 'Aprove Area',
                    'hari_vendor' => $hari_vendor,
                    'hari_area' => $numberDays,
                    'hari_pusat' => 0,
                    'hari_finance' => 0

                ];
            } else {
                $data_penagihan = [
                    'status_terakhir' => 'Revisi Area',
                    'sts_tanggal_trakhir' => $tanggal_rapot
                ];
                $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                $data_rapot = [
                    'id_mc' => $id_mc,
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'uraian' => 'Revisi Area',
                    'pic' => $pic,
                    'tanggal_rapot' => $tanggal_rapot,
                    'catatan_rapot' => 'Revisi Area',
                    'hari_vendor' => $hari_vendor,
                    'hari_area' => $numberDays,
                    'hari_pusat' => 0,
                    'hari_finance' => 0

                ];
            }
        } else if ($pic == 'Pusat') {
            $cek_rapot =  $this->Taggihan_kontrak_admin_model->cek_rapot($id_detail_program_penyedia_jasa, $id_mc);
            if ($cek_rapot) {
                $cek_uraian =  $this->Taggihan_kontrak_admin_model->cek_rapot_uraian_trakhir($id_detail_program_penyedia_jasa, $id_mc);
                if ($cek_uraian['uraian'] == 'Revisi Pusat') {
                    $tanggal_rapot_trakhir = $cek_rapot['tanggal_rapot'];
                    $startTimeStamp = strtotime($tanggal_mc);
                    $endTimeStamp = strtotime($tanggal_rapot);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff / 86400;
                    $numberDays = intval($numberDays);
                } else {
                    $hari_vendor = $cek_rapot['hari_vendor'];
                    $hari_area = $cek_rapot['hari_area'];
                    $hari_pusat = $cek_rapot['hari_pusat'];
                    $tanggal_rapot_trakhir = $cek_rapot['tanggal_rapot'];
                    $startTimeStamp = strtotime($tanggal_rapot_trakhir);
                    $endTimeStamp = strtotime($tanggal_rapot);
                    $timeDiff = abs($endTimeStamp - $startTimeStamp);
                    $numberDays = $timeDiff / 86400;
                    $numberDays = intval($numberDays);
                }
            } else {
                $hari_vendor = 0;
                $hari_area = 0;
                $hari_pusat = 0;
                $tanggal_rapot_trakhir = $tanggal_mc;
                $startTimeStamp = strtotime($tanggal_rapot_trakhir);
                $endTimeStamp = strtotime($tanggal_rapot);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff / 86400;
                $numberDays = intval($numberDays);
            }

            if ($uraian == 'Terima') {
                if ($cek_uraian['uraian'] == 'Revisi Pusat') {
                    $data_penagihan = [
                        'status_terakhir' => 'Berkas Diterima Pusat',
                        'sts_tanggal_trakhir' => $tanggal_rapot
                    ];
                    $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                    $data_rapot = [
                        'id_mc' => $id_mc,
                        'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                        'uraian' => 'Diterima Pusat',
                        'pic' => $pic,
                        'tanggal_rapot' => $tanggal_rapot,
                        'catatan_rapot' => 'Berkas Diterima Pusat',
                        'hari_vendor' => $numberDays,
                        'hari_area' => 0,
                        'hari_pusat' => 0,
                        'hari_finance' => 0

                    ];
                } else {
                    $data_penagihan = [
                        'status_terakhir' => 'Berkas Diterima Pusat',
                        'sts_tanggal_trakhir' => $tanggal_rapot
                    ];
                    $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                    $data_rapot = [
                        'id_mc' => $id_mc,
                        'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                        'uraian' => 'Diterima Pusat',
                        'pic' => $pic,
                        'tanggal_rapot' => $tanggal_rapot,
                        'catatan_rapot' => 'Berkas Diterima Pusat',
                        'hari_vendor' => $hari_vendor,
                        'hari_area' => $hari_area,
                        'hari_pusat' => 0,
                        'hari_finance' => 0

                    ];
                }
            } else if ($uraian == 'Aprove') {
                $data_penagihan = [
                    'status_terakhir' => 'Aprove Pusat',
                    'sts_tanggal_trakhir' => $tanggal_rapot
                ];
                $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                $data_rapot = [
                    'id_mc' => $id_mc,
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'uraian' => 'Aprove Pusat',
                    'pic' => $pic,
                    'tanggal_rapot' => $tanggal_rapot,
                    'catatan_rapot' => 'Aprove Pusat',
                    'hari_vendor' => $hari_vendor,
                    'hari_area' => $hari_area,
                    'hari_pusat' => $numberDays,
                    'hari_finance' => 0

                ];
            } else {
                $data_penagihan = [
                    'status_terakhir' => 'Revisi Pusat',
                    'sts_tanggal_trakhir' => $tanggal_rapot
                ];
                $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                $data_rapot = [
                    'id_mc' => $id_mc,
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'uraian' => 'Revisi Pusat',
                    'pic' => $pic,
                    'tanggal_rapot' => $tanggal_rapot,
                    'catatan_rapot' => 'Revisi Pusat',
                    'hari_vendor' => $hari_vendor,
                    'hari_area' => $hari_area,
                    'hari_pusat' => $numberDays,
                    'hari_finance' => 0

                ];
            }
        } else if ($pic == 'Finance') {
            $cek_rapot =  $this->Taggihan_kontrak_admin_model->cek_rapot($id_detail_program_penyedia_jasa, $id_mc);

            if ($cek_rapot) {
                $hari_vendor = $cek_rapot['hari_vendor'];
                $hari_area = $cek_rapot['hari_area'];
                $hari_pusat = $cek_rapot['hari_pusat'];
                $hari_finance = $cek_rapot['hari_finance'];
                $tanggal_rapot_trakhir = $cek_rapot['tanggal_rapot'];
                $startTimeStamp = strtotime($tanggal_rapot_trakhir);
                $endTimeStamp = strtotime($tanggal_rapot);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff / 86400;
                $numberDays = intval($numberDays);
            } else {
                $hari_vendor = 0;
                $hari_area = 0;
                $hari_pusat = 0;
                $hari_finance = 0;
                $tanggal_rapot_trakhir = $tanggal_mc;
                $startTimeStamp = strtotime($tanggal_rapot_trakhir);
                $endTimeStamp = strtotime($tanggal_rapot);
                $timeDiff = abs($endTimeStamp - $startTimeStamp);
                $numberDays = $timeDiff / 86400;
                $numberDays = intval($numberDays);
            }

            if ($uraian == 'Terima') {
                $data_penagihan = [
                    'status_terakhir' => 'Diterima Finance',
                    'sts_tanggal_trakhir' => $tanggal_rapot
                ];
                $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                $data_rapot = [
                    'id_mc' => $id_mc,
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'uraian' => 'Diterima Finance',
                    'pic' => $pic,
                    'tanggal_rapot' => $tanggal_rapot,
                    'catatan_rapot' => 'Diterima Finance',
                    'hari_vendor' => $hari_vendor,
                    'hari_area' => $hari_area,
                    'hari_pusat' => $hari_pusat,
                    'hari_finance' => $numberDays

                ];
            } else if ($uraian == 'Pencairan') {
                $data_penagihan = [
                    'status_terakhir' => 'Pencairan',
                    'sts_tanggal_trakhir' => $tanggal_rapot
                ];
                $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                $data_rapot = [
                    'id_mc' => $id_mc,
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'uraian' => 'Pencairan',
                    'pic' => $pic,
                    'tanggal_rapot' => $tanggal_rapot,
                    'catatan_rapot' => 'Pencairan',
                    'hari_vendor' => $hari_vendor,
                    'hari_area' => $hari_area,
                    'hari_pusat' => $hari_pusat,
                    'hari_finance' => $numberDays

                ];
            } else {
                $data_penagihan = [
                    'status_terakhir' => 'Revisi Finance',
                    'sts_tanggal_trakhir' => $tanggal_rapot
                ];
                $this->Taggihan_kontrak_admin_model->update_mc($data_penagihan, $id_mc);
                $data_rapot = [
                    'id_mc' => $id_mc,
                    'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
                    'uraian' => 'Revisi Finance',
                    'pic' => $pic,
                    'tanggal_rapot' => $tanggal_rapot,
                    'catatan_rapot' => 'Revisi Finance',
                    'hari_vendor' => $hari_vendor,
                    'hari_area' => 0,
                    'hari_pusat' => 0,
                    'hari_finance' => 0

                ];
            }
        }

        $this->Taggihan_kontrak_admin_model->create_rapot($data_rapot);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }



    public function hapus_traking($id_mc)
    {
        $this->Taggihan_kontrak_admin_model->hapus_mc($id_mc);
        $this->Taggihan_kontrak_admin_model->hapus_dummy_traking($id_mc);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }

    public function pencairan_grafik()
    {
        $id_detail_program_penyedia_jasa = $this->input->post('id_detail_program_penyedia_jasau');
        $id_mc = $this->input->post('id_mc');
        $sts_tanggal_trakhir = $this->input->post('sts_tanggal_trakhir');
        $catatan = $this->input->post('catatan');
        $setelah_ppn = $this->input->post('setelah_ppn');

        $data = [
            'id_mc' => $id_mc,
            'id_detail_program_penyedia_jasa' => $id_detail_program_penyedia_jasa,
            'tanggal_cair' => $sts_tanggal_trakhir,
            'nilai_grafik' => $setelah_ppn,
            'catatan' => $catatan,
        ];
        $this->Taggihan_kontrak_admin_model->create_grafik($data);
        $this->output->set_content_type('application/json')->set_output(json_encode('success'));
    }
}
