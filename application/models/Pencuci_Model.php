<?php

    defined('BASEPATH') OR exit('No Script Direct Access Allowed');
    class Pencuci_Model extends CI_Model {

        public function getUser($username) {
            return $this->db->where('username', $username)->get('user')->row();
        }

        //untuk menampilkan data dari tabel pesanan
        public function getOrder($username, $status) {
            $this->db->where('username', $username);
            $this->db->not_like('status', $status);
            return $this->db->get('pesanan')->result_array();
        }
        // untuk mengupdate kolom pada tabel pesanan, digunakan untuk mengambil job
        public function takeJob($id) {
            $post = $this->input->post();
            $this->status = $post['status'];
            $this->username = $post['username'];

            $this->db->where('register_id', $id)->update('pesanan', $this);
            
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        public function updateJob($id) {
            $post = $this->input->post();
            $this->status = $post['status'];

            $this->db->where('register_id', $id)->update('pesanan', true);

            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }

        //untuk mengedit akun
        public function updateUser($username) {
            $post = $this->input->post();
            if (!empty($post['password'])) {
                $this->password = $post['password'];
            } else {
                $this->password = $post['old_password'];
            }
            $this->nama_lengkap = $post['fullname'];
            $this->email = $post['email'];
            $this->alamat = $post['alamat'];

            if (!empty($_FILES['foto']['name'])) {
                $this->foto = $this->UploadImageUser();
            } else {
                $this->foto = $post['foto_lama'];
            }
            $this->db->where('username', $username)->update('user', $this);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        //method upload gambar
        private function uploadImageUser() {
            
            $config['upload_path'] = './uploads/user';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '8192';
            $config['overwrite'] = TRUE;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('foto')){
                return $this->upload->data("file_name");
            }
            return "default.png";
        }
        
        public function listJob($status) {
            return $this->db->where('status', $status)->get('pesanan')->result_array();
        }

        public function history($username) {
            return $this->db->where('username', $username)->get('transaksi')->result_array();
            
        }
    }
?>