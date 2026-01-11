<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        $user_id = $this->session->userdata('user_id');

        $data['user'] = $this->db
            ->get_where('users', ['id' => $user_id])
            ->row_array();

        $data['title'] = 'Profile';

        $this->load->view('dashboard/profile', $data);
    }

    public function update()
    {
        $user_id   = $this->session->userdata('user_id');
        $username  = $this->input->post('username');
        $pass1     = $this->input->post('password1');
        $pass2     = $this->input->post('password2');

        if (!$username) {
            $this->session->set_flashdata('error', 'Nama tidak boleh kosong.');
            redirect('profile');
        }

        // Update nama
        $dataUpdate = ['username' => $username];

        // Jika password diisi
        if ($pass1 || $pass2) {

            if ($pass1 !== $pass2) {
                $this->session->set_flashdata('error', 'Password tidak cocok.');
                redirect('profile');
            }

            if (strlen($pass1) < 6) {
                $this->session->set_flashdata('error', 'Password minimal 6 karakter.');
                redirect('profile');
            }

            $dataUpdate['password'] = password_hash($pass1, PASSWORD_DEFAULT);
        }

        $this->db->where('id', $user_id)->update('users', $dataUpdate);

        // Update session username
        $this->session->set_userdata('username', $username);

        $this->session->set_flashdata('success', 'Profile berhasil diperbarui.');
        redirect('profile');
    }
}
