<?php
    defined('BASEPATH') OR exit('No Script Direcet Access Allowed');

    class Pegawai_Model extends CI_Model {

        public function getDataAccount($username) {
            return $this->db->where('username', $username)->get('user')->row();
        }

        //untuk mengedit data account/user
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
        //untuk menambah data pada tabel pesanan
        public function insertPesanan() {
            
            if ($this->input->post('submit')) {
                $insert = array(
                    "kode_pesanan"=>$this->input->post('kode', TRUE),
                    "atasnama"=>$this->input->post('nama', TRUE),
                    "nama_pesanan"=>$this->input->post('pesanan', TRUE),
                    "nama_sepatu"=>$this->input->post('sepatu', TRUE),
                    "size"=>$this->input->post('size', TRUE),
                    "total"=>$this->input->post('total', TRUE),
                    "tgl_pesanan"=>date("Y-m-d"),
                    "pegawai"=>$this->input->post('pegawai', TRUE)
                );
                $this->db->insert('pesanan', $insert);
            }
        }

        //untuk mengupdate data pada tabel pesanan
        public function updatePesanan($id) {
            $post = $this->input->post();
            $this->atasnama = $post['nama'];
            $this->nama_pesanan = $post['pesanan'];
            $this->nama_sepatu = $post['sepatu'];
            $this->size = $post['size'];
            $this->total = $post['total'];

            $this->db->where('register_id', $id)->update('pesanan', $this);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        public function getOrder($id) {
            return $this->db->where('register_id', $id)->get('pesanan')->row();
        }
        public function getOrderByStatus($username = null, $status = null) {
            if ($username === null && $status === null) {
                return $this->db->get('pesanan')->result_array();
            } else if ($username === null) {
                return $this->db->where('status', $status)->get('pesanan')->result_array();
            } else if ($status === null) {
                return $this->db->where('pegawai', $username)->get('pesanan')->result_array();
            } else {
                $this->db->where('pegawai', $username);
                $this->db->where('status', $status);
                return $this->db->get('pesanan')->result_array();
            }
        }
        public function searchDatainCheckOrder() {
            $input = $this->input->post('keyword');
            $this->db->like('kode_pesanan', $input);
            $this->db->or_like('atasnama', $input);
            $this->db->or_like('nama_sepatu', $input);
            return $this->db->get('pesanan')->result_array();
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
        
        public function TransaksiInsert() {
            $transaction = array(
                "nama_pesanan"=>$this->input->post('pesanan', TRUE),
                "nama_sepatu"=>$this->input->post('sepatu', TRUE),
                "size"=>$this->input->post('size', TRUE),
                "total"=>$this->input->post('total', TRUE),
                "tgl_transaksi"=>$this->input->post('tanggal', TRUE),
                "username"=>$this->input->post('pencuci', TRUE),
            );
            $this->db->insert('transaksi', $transaction);
        }
        public function InsertLaporan() {
            $array = array(
                "nama_pesanan"=>$this->input->post('pesanan', TRUE),
                "atasnama"=>$this->input->post('nama', TRUE),
                "nama_sepatu"=>$this->input->post('sepatu', TRUE),
                "size"=>$this->input->post('size', TRUE),
                "total"=>$this->input->post('total', TRUE),
                "tgl_terima"=>date("Y-m-d"),
                "washer"=>$this->input->post('pencuci', TRUE),
                "username"=>$this->input->post('pegawai', TRUE)
            );
            $this->db->insert('laporan_transaksi', $array);
        }

        public function deletePesanan($id) {
            $this->db->where('register_id', $id)->delete('pesanan');
        }

        public function historyTransaction($username) {
            return $this->db->where('username', $username)->get('laporan_transaksi')->result_array();
        }
    }
?>