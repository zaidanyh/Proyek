<?php

    defined('BASEPATH') OR exit('No Script Direct Access Allowed');
    class Pencuci_Model extends CI_Model {

        //untuk menampilkan data dari tabel pesanan
        public function getOrder($username = null) {
            if ($username === null) {
                return $this->db->get('pesanan')->result_array();
            } else {
                return $this->db->where('username', $username)->get('pesanan')->result_array();
            }
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

        //untuk mengedit akun
        public function updateUser($username) {
            $post = $this->input->post();
            $this->password = $post('password');
            $this->nama_lengkap = $post('fullname');
            if (!empty($_FILES['foto']['name'])) {
                $this->foto = $this->uploadImageUser();
            } else {
                $this->foto = $post['old_image'];
            }
            $this->alamat = $post['alamat'];
            $this->email = $post['email'];

            $this->db->where('username', $username)->update('user', $this);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        //method upload gambar
        private function uploadImageUser() {
            
            $config['upload_path'] = './Image/user';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '4096';
            $config['overwrite'] = true;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('foto')){
                return $this->upload->data("file_name");
            }
            return "default.png";
        }
    }
?>