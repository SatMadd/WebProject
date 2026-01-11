<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    
    public function register($data) {
        return $this->db->insert('users', $data);
    }

    
    public function check_login($email) {
        return $this->db->get_where('users', ['email' => $email])->row_array();
    }


    // Mengambil semua data user
    public function get_all_users() {
        return $this->db->get('users')->result_array();
    }

    // Mengambil satu user berdasarkan ID
    public function get_user_by_id($id) {
        return $this->db->get_where('users', ['id' => $id])->row_array();
    }

    // Menambah user baru
    public function insert_user($data) {
        return $this->db->insert('users', $data);
    }

    // Update data user
    public function update_user($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    // Menghapus user
    public function delete_user($id) {
        return $this->db->delete('users', ['id' => $id]);
    }
}
