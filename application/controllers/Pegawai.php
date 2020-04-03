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
			
			$this->load->view('template/headeradmin', $data);
			$this->load->view('Pegawai/index');
			$this->load->view('template/footeradmin');
		}

		public function userprofile() {
			$username = $this->session->userdata('username');
			$data['title'] = 'Profile Pegawai | Point Care Laundry Shoes';
			$data['account'] = $this->Pegawai_Model->getDataAccount($username);

			$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				$this->Pegawai_Model->editAkun($username);
				redirect('Pegawai/userprofile','refresh');
			} else {
				$this->load->view('template/headeradmin', $data);
				$this->load->view('Pegawai/userprofile', $data);
				$this->load->view('template/footeradmin');
			}
		}

		public function orderlist() {
			$title['title'] = 'Add Job Washer | Point Care Laundry Shoes';
			$data['Order'] = $this->Pegawai_Model->getOrderByStatus();
			
			$this->load->view('template/headeradmin', $title);
			$this->load->view('Pegawai/orderlist', $data);
			$this->load->view('template/footeradmin');
		}

		public function checkOrder() {
			$title['title'] = 'Check Order | Point Care Laundry Shoes';
			$data['check'] = $this->Pegawai_Model->getOrderByStatus("in progress");

			if ($this->input->post('keyword')) {
				$data['check'] = $this->Pegawai_Model->searchDatainCheckOrder();
			}

			$this->load->view('template/headeradmin', $title);
			$this->load->view('Pegawai/checkorder', $data);
			$this->load->view('template/footeradmin');
		}

		public function checkOrderFinish() {
			$title['title'] ='Order Finished | Point Care Laundry Shoes';
			$data['finished'] = $this->Pegawai_Model->getOrderByStatus("finished");

			$this->load->view('template/headeradmin', $title);
			$this->load->view('Pegawai/orderfinished', $data);
			$this->load->view('template/footeradmin');
		}

		public function addOrder() {
			$title['title'] = 'Add Job Washer | Point Care Laundry Shoes';
			$data['ListOrder'] = $this->Pegawai_Model->getOrderByStatus("waiting");

			$this->load->view('template/headeradmin', $title);
			$this->load->view('Pegawai/orderadd', $data);
			$this->load->view('template/footeradmin');
		}
		public function addJobProcess() {
			$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('pesanan', 'Pesanan', 'trim|required');
			$this->form_validation->set_rules('size', 'size', 'trim|required');
			$this->form_validation->set_rules('sepatu', 'Sepatu', 'trim|required');
			$this->form_validation->set_rules('total', 'Total', 'trim|required');
			

			if ($this->form_validation->run() == TRUE) {
				$this->Pegawai_Model->insertPesanan();
				redirect('Pegawai/addOrder','refresh');
			} else {
				redirect('Pegawai','refresh');
			}
		}
		public function editJob($id) {
			$title['title'] = 'Edit List Job | Pegawai Point Care Laundry Shoes';
			$data['get'] = $this->Pegawai_Model->getOrder($id);

			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('sepatu', 'Sepatu', 'trim|required');
			$this->form_validation->set_rules('pesanan', 'Pesanan', 'trim|required');
			$this->form_validation->set_rules('size', 'Size', 'trim|required');
			$this->form_validation->set_rules('total', 'Total', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$this->Pegawai_Model->updatePesanan($id);
				redirect('Pegawai/addOrder','refresh');
			} else {
				$this->load->view('template/headeradmin', $title);
				$this->load->view('Pegawai/orderedit', $data);
				$this->load->view('template/footeradmin');
			}
		}
		public function transaction() {
			$this->form_validation->set_rules('pesanan', 'Pesanan', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('sepatu', 'Sepatu', 'trim|required');
			$this->form_validation->set_rules('size', 'Size', 'trim|required');
			$this->form_validation->set_rules('total', 'Total', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
			$this->form_validation->set_rules('pencuci', 'Pencuci', 'trim|required');
			$this->form_validation->set_rules('pegawai', 'Pegawai', 'trim|required');

			$id = $this->input->post('idku');
			
			if ($this->form_validation->run() == TRUE) {
				$this->Pegawai_Model->TransaksiInsert();
				$this->Pegawai_Model->InsertLaporan();
				$this->Pegawai_Model->deletePesanan($id);
				redirect('Pegawai/checkOrderFinish','refresh');
			} else {
				redirect('Pegawai/checkOrderFinish','refresh');
			}
		}
	}
?>