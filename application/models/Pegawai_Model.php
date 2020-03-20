<?php
    defined('BASEPATH') OR exit('No Script Direcet Access Allowed');

    class Pegawai_Model extends CI_Model {

        //untuk mengedit data pada tabel
        public function editAkun($data, $username) {
            $this->db->update('user', $data, ['username'=> $username]);
            return $this->db->affected_rows();
        }
        //untuk menambah data pada tabel pesanan
        public function insertPesanan() {
            if ($this->input->post('submit')) {
                $insert = array(
                    "kode_pesanan"=>$this->input->post('kode', TRUE),
                    "nama_pesanan"=>$this->input->post('pesanan', TRUE),
                    "nama_sepatu"=>$this->input->post('sepatu', TRUE),
                    "total"=>$this->input->post('total', TRUE),
                    "tgl_pesanan"=>$this->input->post('tgl', TRUE)
                );
                $this->db->insert('pesanan', $insert);
            }
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