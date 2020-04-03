<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Manager_Model extends CI_Model {

        //mengambil data dari tabel user
        public function getUserByUsername($username) {
            return $this->db->where('username', $username)->get('user')->row();
        }

        //mengambil data user dari tabel transaksi
        public function getUser($username = null, $level){
            if ($username === null) {
                $this->db->select('COUNT(t.pencuci) pencuci, u.*');
                $this->db->from('transaksi t');
                $this->db->join('user u', 't.username = u.username', 'inner');
                $this->db->where('u.level', $level);
                $this->db->group_by('t.pencuci');
                return $this->db->get()->result_array();
            } else {
                $this->db->select('count(t.pencuci) jumlah, u.*');
                $this->db->from('transaksi t');
                $this->db->join('user u', 't.username = u.username', 'inner');
                $this->db->where('t.username', $username);
                $this->db->group_by('t.username');
                return $this->db->get()->result_array();
            }
        }
        //edit akun
        public function editAkun($username) {
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
                $this->foto = $this->UploadImage();
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
        
        //fungsi upload gambar
        private function UploadImage() {
            
            $config['upload_path'] = './uploads/user';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']  = '8192';
            $config['overwrite'] = true;
            
            $this->load->library('upload', $config);
            
            if ($this->upload->do_upload('foto')){
                return $this->upload->data("file_name");
            }
            return "default.png";
        }
    }
?>