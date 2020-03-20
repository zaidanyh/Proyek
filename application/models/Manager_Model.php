<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Manager_Model extends CI_Model {

        //untuk tabel user
        //untuk menambah data user
        public function insertUser($data) {
            $this->db->insert('user', $data);
            return $this->db->affected_rows();
        }
        //untuk delete data
        public function deleteUser($username) {
            $this->db->where('username', $username);
            $this->db->delete('pesanan');
            $this->db->delete('user');
            return $this->db->affected_rows();
        }
        //menampilkan data berdasarkan level
        public function getByLevel($level) {
            return $this->db->where('level', $level)->get('user')->resul_array();
        }

        //untuk tabel pesanan
        //menampilkan data berdasarkan username, digunakan untuk mengetahui pencuci sudah dapat pekerjaan berapa
        public function getOrder($username = null) {
            if ($username === null) {
                return $this->db->get('pesanan')->result_array();
                //menampilkan semua data dari tabel pesanan
            } else {
                return $this->db->where('username', $username)->get('pesanan')->result_array();
            }
        }
        //menampilkan data berdasarkan status
        public function getStatus($status) {
            return $this->db->where('status', $status)->get('pesanan')->result_array();
        }
        //menampilkan data user
        public function getUserbyOrder($username = null) {
            if ($username === null) {
                $this->db->select('u.username username, u.nama_lengkap fullname, u.foto foto, u.alamat alamat, u.email email, COUNT(p.username) jumlah');
                $this->db->from('pesanan p');
                $this->db->join('user u', 'p.username = u.username', 'inner');
                $this->db->group_by('p.username');
                return $this->db->get()->result_array();
            } else {
                $this->db->select('u.username username, u.nama_lengkap fullname, u.foto foto, u.alamat alamat, u.email email, COUNT(p.username) jumlah');
                $this->db->from('pesanan AS p');
                $this->db->join('user AS u', 'p.username = u.username', 'inner');
                $this->db->where('u.username', $username);
                $this->db->group_by('p.username');
                return $this->db->get()->result_array();
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
        public function getUserbyTransaksi($username = null ){
            if ($username === null) {
                $this->db->select('u.username username, u.nama_lengkap fullname, u.foto.foto, u.alamat alamat, u.email email, COUNT(t.username) jumlah');
                $this->db->from('transaksi t');
                $this->db->join('user u', 't.username = u.username', 'inner');
                $this->db->group_by('t.username');
                return $this->db->get()->result_array();
            } else {
                $this->db->select('u.username username, u.nama_lengkap fullname, u.foto.foto, u.alamat alamat, u.email email, COUNT(t.username) jumlah');
                $this->db->from('transaksi t');
                $this->db->join('user u', 't.username = u.username', 'inner');
                $this->db->where('u.username', $username);
                $this->db->group_by('t.username');
                return $this->db->get()->result_array();
            }
        }
    }
?>