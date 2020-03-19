<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Manager extends CI_Model {

        //untuk tabel user
        //untuk menambah data user
        public function insertUser($data) {
            $this->db->insert('user', $data);
            return $this->db->affected_rows();
        }
        //menampilkan data dari tabel user
        public function getUser($username = null) {
            if ($username === null) {
                return $this->db->get('user')->result_array();
            } else {
                return $this->db->where('username', $username)->get('user')->result_array();
            }
        }
        //menampilkan data user berdasarkan level
        public function getByUser($level) {
            if ($level == "pegawai") {
                return $this->db->where('level', "pegawai")->get('user')->result_array();
            } else if ($level == "pencuci") {
                return $this->db->where('level', "pencuci")->get('user')->resul_array();
            } else {
                return false;
            }
        }

        //untuk tabel pesanan
        //menampilkan data dari tabel pesanan
        public function getOrder($status = null) {
            if ($status === null) {
                return $this->db->get('pesanan')->result_array();
            } else {
                return $this->db->where('status', $status)->get('pesanan')->result_array();
            }
        }
        //menampilkan data dari tabel pesanan berdasarkan username
        public function getByUsername($username = null) {
            if ($username === null) {
                return $this->db->where('username', NULL)->get('pesanan')->result_array();
                //menampilkan dari ketika username masih null
            } else {
                return $this->db->where('username', $username)->get('pesanan')->result_array();
            }
        }

        //untuk tabel transaksi
        //menampilkan data dari tabel transaksi
        public function getTransaksi($username = null) {
            if ($username === null) {
                return $this->db->get('transaksi')->result_array();
            } else {
                return $this->db->where('username', $username)->get('transaksi')->result_array();
            }
        }
    }
?>