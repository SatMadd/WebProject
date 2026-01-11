<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    /**
     * Ambil data user login dari database
     */
    private function getUserLogin()
    {
        $user_id = $this->session->userdata('user_id');
        return $this->db->get_where('users', ['id' => $user_id])->row_array();
    }

    /**
     * Dashboard utama
     */
    public function index()
    {
        $data['title'] = 'Dashboard Utama';
        $data['user']  = $this->getUserLogin();

        $this->load->view('dashboard/index', $data);
    }

    /**
     * Page Artikel
     * URL: /dashboard/artikel
     */
    public function artikel()
    {
        $data['title'] = 'Artikel Luar Angkasa';
        $data['user']  = $this->getUserLogin();

        $this->load->view('dashboard/artikel', $data);
    }

    /**
     * Page Quiz
     * URL: /dashboard/quiz
     */
    public function quiz()
    {
        $data['title'] = 'Quiz';
        $data['user']  = $this->getUserLogin();

        $this->load->view('dashboard/quiz', $data);
    }

    /**
     * Page Profile
     * URL: /dashboard/profile
     */
    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user']  = $this->getUserLogin();

        $this->load->view('dashboard/profile', $data);
    }
}
