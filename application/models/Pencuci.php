<?php
    defined('BASEPATH') OR exit('No Script Direct Access Allowed');
    class Pencuci extends CI_Model {

        // untuk mengupdate kolom pada tabel pesanan, digunakan untuk mengambil job
        public function takeJob($data, $id) {
            $this->db->update('pesanan', $data, ['register_id' => $id]);
            return $this->db->affected_rows();
        }

        //untuk mengedit akun
        public function updateUser($data, $username) {
            $this->db->update('user', $data, ['username' => $username]);
            return $this->db->affected_rows();
        }
    }
?>