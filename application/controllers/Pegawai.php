<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pegawai extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('Pegawai_Model');

			if ($this->session->userdata('level') != "pegawai") {
				redirect('Login', 'refresh');
			}
		}
		public function index() {
			$data['title'] = "Home Pegawai | Point & Care";
		}
	}
?>
