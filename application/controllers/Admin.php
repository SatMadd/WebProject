<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }
    }

    public function index() {
        $data['title'] = "Admin Dashboard";

        $data['total_users'] = $this->db->count_all('users');

        $this->db->where('last_active >=', date('Y-m-d H:i:s', strtotime('-5 minutes')));
        $data['online_users'] = $this->db->count_all_results('users');

        $data['articles'] = $this->db->count_all('articles');

        $this->load->view('admin/index', $data);
    }

    // ================= USER MANAGEMENT =================

    public function users() {
        $data['title'] = "Manajemen User";
        $data['users'] = $this->db->get('users')->result_array();
        $this->load->view('admin/users', $data);
    }

    public function ban($id) {
        $this->db->where('id', $id)->update('users', ['is_banned' => 1]);
        redirect('admin/users');
    }

    public function unban($id) {
        $this->db->where('id', $id)->update('users', ['is_banned' => 0]);
        redirect('admin/users');
    }

    public function promote($id) {
        $this->db->where('id', $id)->update('users', ['role' => 'admin']);
        redirect('admin/users');
    }

    public function demote($id) {
        $this->db->where('id', $id)->update('users', ['role' => 'user']);
        redirect('admin/users');
    }

    // ================= ARTICLE MANAGEMENT =================

    public function articles() {
        $data['title'] = "Kelola Artikel";
        $data['articles'] = $this->db->get('articles')->result_array();
        $this->load->view('admin/articles', $data);
    }

    public function add_article() {
        $this->db->insert('articles', [
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'created_by' => $this->session->userdata('user_id')
        ]);

        redirect('admin/articles');
    }

    public function delete_article($id) {
        $this->db->where('id', $id)->delete('articles');
        redirect('admin/articles');
    }
}
