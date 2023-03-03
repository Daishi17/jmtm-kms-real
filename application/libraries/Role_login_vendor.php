<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set("Asia/Jakarta");

class Role_login_vendor
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('Auth_model');
        $this->ci->load->helper('string');
    }

    public function login($username, $password)
    {
        $cek = $this->ci->Auth_model->login_vendor($username);

        if ($cek) {
            if ($cek && password_verify($password, $cek->password)) {
                if ($cek->status == 1) {
                    $sekarang = date('Y-m-d H:i');
                    $data = [
                        'waktu_login' => $sekarang,
                        'alamat_ip' => $this->ci->input->ip_address(),
                        'id_vendor' => $cek->id_vendor
                    ];
                    $this->ci->Auth_model->insert_log_vendor($data);
                    $username = $cek->username;
                    $id_vendor = $cek->id_vendor;
                    // $otp_verifikasi = $cek->otp_verifikasi;

                    $this->ci->session->set_userdata('username', $username);
                    $this->ci->session->set_userdata('id_vendor', $id_vendor);
                    // $this->ci->session->set_userdata('otp_verifikasi', $otp_verifikasi);
                    // buat session


                    redirect('vendor/dashboard');
                } else {
                    $this->ci->session->set_flashdata('tidak_aktif', 'Username Tidak Aktif');
                    redirect('auth_vendor');
                }
            } else {
                $this->ci->session->set_flashdata('salah', 'Username Atau Password Salah');
                redirect('auth_vendor');
            }
        } else {
            $this->ci->session->set_flashdata('salah', 'Username Tidak Terdaftar');
            redirect('auth_vendor');
        }
    }
    public function cek_login()
    {
        if ($this->ci->session->userdata('username') == "") {
            $this->ci->session->set_flashdata('pesan', 'Anda Belom Login !!!');
            redirect('auth_vendor');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('username');
        $this->ci->session->unset_userdata('id_vendor');
        redirect('auth_vendor');
    }
}
