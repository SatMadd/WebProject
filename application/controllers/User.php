<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Cek apakah user sudah login atau belum
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('error', 'Silahkan login terlebih dahulu!');
            redirect('auth/login');
        }
    }

    public function index() {
        // Mengambil data user yang sedang login dari database berdasarkan ID di session
        $user_id = $this->session->userdata('user_id');
        $data['user'] = $this->db->get_where('users', ['id' => $user_id])->row_array();
        $data['title'] = "Dashboard Utama";

        $this->load->view('dashboard/index', $data);
    }
}