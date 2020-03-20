<?php
    defined('BASEPATH') OR exit('No Direct Script Access Allowed');

    class Customer extends CI_Model {
        
        public function Search() {
			$keyword = $this->input->post('keyword');
			$this->db->like('kode_pesanan', $keyword);
			return $this->db->get('pesanan')->result_array();
		}
    }
?>