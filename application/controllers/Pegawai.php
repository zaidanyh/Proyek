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
			$data['title'] = "Home Pegawai | Point Care Laundry Shoes";
			
			$this->load->view('template/headeradmin');
			$this->load->view('Pegawai/index');
			$this->load->view('template/footeradmin');
		}
		public function addJob() {
			$title['title'] = 'Add Job Washer | Point Care Laundry Shoes';
			$this->load->view('View File');
			$this->load->view('View File');
			$this->load->view('View File');
		}
		public function addJobProcess() {
			$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
			$this->form_validation->set_rules('pesanan', 'Pesanan', 'trim|required');
			$this->form_validation->set_rules('sepatu', 'Sepatu', 'trim|required');
			$this->form_validation->set_rules('total', 'Total', 'trim|required');
			$this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$this->Pegawai_Model->insertPesanan();
				redirect('Pegawai','refresh');
			} else {
				redirect('Pegawai/addJob','refresh');
			}
		}
	}
?>
