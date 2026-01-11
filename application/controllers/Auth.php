<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->db->where('last_active >=', date('Y-m-d H:i:s', strtotime('-5 minutes')));
$online_users = $this->db->count_all_results('users');

    }

   
    public function register() {
        // Rule validasi input
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[users.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]');

        if ($this->form_validation->run() == FALSE) {
            $data['title']="Halaman Register";
            $this->load->view('auth/register',$data); // Tampilkan form register
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email'    => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'role'     => 'user'
            ];

            $this->User_model->register($data);
            $this->session->set_flashdata('message', 'Registrasi Berhasil! Silahkan Login.');
            redirect('auth/login');
        }
    }

    
  public function login() {
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == FALSE) {
        $data['title'] = "Halaman Login";
        $this->load->view('auth/login', $data);
    } else {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User_model->check_login($email);

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data_session = [
                    'user_id'   => $user['id'],
                    'email'     => $user['email'],
                    'role'      => $user['role'], // Mengambil role dari DB
                    'logged_in' => TRUE
                ];
                $this->session->set_userdata($data_session);

                // --- LOGIKA REDIRECT BERDASARKAN ROLE ---
                if ($user['role'] == 'admin') {
                    redirect('dashboard'); // Admin ke Dashboard
                } else {
                    redirect('user');      // User biasa ke Controller User (CRUD)
                }
                // ----------------------------------------

            } else {
                $this->session->set_flashdata('error', 'Password Salah!');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Email tidak terdaftar!');
            redirect('auth/login');
        }
    }
}

 
    public function logout() {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}