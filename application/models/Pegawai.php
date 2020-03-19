<?php
    defined('BASEPATH') OR exit('No Script Direcet Access Allowed');

    class Pegawai extends CI_Model {

        //untuk mengedit data pada tabel
        public function editAkun($data, $username) {
            $this->db->update('user', $data, ['username'=> $username]);
            return $this->db->affected_rows();
        }
        //untuk menambah data pada tabel pesanan
        public function insertPesanan($data) {
            $this->db->insert('pesanan', $data);
            return $this->db->affected_rows();
        }
        //untuk menghapus data pada tabel pesanan
        public function deletePesanan($id) {
            $this->db->where('register_id', $id);
            $this->db->delete('pesanan');
            return $this->db->affected_rows();
        }
        //untuk mengupdate data pada tabel pesanan
        public function updatePesanan($data, $id) {
            $this->db->update('pesanan', $data, ['register_id' => $id]);
            return $this->db->affected_rows();
        }
    }
?>