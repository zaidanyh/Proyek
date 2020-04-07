<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Manager_Model extends CI_Model {

        //mengambil data dari tabel user
        public function getUserByUsername($username) {
            return $this->db->where('username', $username)->get('user')->row();
        }

        //mengambil data user
        public function getUser($level){
            if ($level == "pencuci") {
                $this->db->select('u.*, COUNT(p.status = "in progress") progress, COUNT(p.status="finished") finished, COUNT(t.username) complete');
                $this->db->from('user u');
                $this->db->join('transaksi t', 't.username = u.username', 'left');
                $this->db->join('pesanan p', 'p.username = u.username', 'left');
                $this->db->where('u.level', $level);
                $this->db->group_by('p.status, t.username');
                return $this->db->get()->result_array();
            } else if ($level == "pegawai") {
                $this->db->select('u.*, COUNT(lp.username) transaksi, SUM(lp.total) total');
                $this->db->from('user u');
                $this->db->join('laporan_transaksi lp', 'lp.username = u.username', 'left');
                $this->db->where('u.level', $level);
                $this->db->group_by('lp.username');
                return $this->db->get()->result_array();
            }
        }

        //fungsi add user
        public function addUser() {
            if ($this->input->post('submit')) {
                $user = array(
                    "username"=>$this->input->post('username', TRUE),
                    "password"=>$this->input->post('password', TRUE),
                    "nama_lengkap"=>$this->input->post('fullname', TRUE),
                    "alamat"=>$this->input->post('alamat', TRUE),
                    "email"=>$this->input->post('email', TRUE),
                    "level"=>$this->input->post('level', TRUE)
                );
                $this->db->insert('user', $user);
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

        public function getTransaction() {
            $this->db->select('lp.*, t.tgl_transaksi');
            $this->db->from('laporan_transaksi lp');
            $this->db->join('transaksi t', 'lp.washer = t.username', 'left');
            $this->db->group_by('lp.laporan_id');
            return $this->db->get()->result_array();
        }
    }
?>