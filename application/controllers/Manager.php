<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Manager extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Manager_Model');

			if ($this->session->userdata('level') != "manager") {
				redirect('Login', 'refresh');
			}
		}
		public function index() {
			$data['title'] = "Home Manager | Point Care Laundry Shoes";
			
			$this->load->view('template/headermanager', $data);
			$this->load->view('Manager/index');
			$this->load->view('template/footeradmin');

		}
		public function account() {
			$username = $this->session->userdata('username');
			$title['title'] = 'Profile Manager| Point Care Laundry Shoes';
			$data['profile'] = $this->Manager_Model->getUserByUsername($username);

			$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				$this->Manager_Model->editAkun($username);
				redirect('Manager/account','refresh');
			} else {
				$this->load->view('template/headermanager', $title);
				$this->load->view('Manager/userprofile', $data);
				$this->load->view('template/footeradmin');
			}
		}
		public function employee() {
			$title['title'] = 'User List | Point Care Laundry Shoes';
			$data['hasilPencuci'] = $this->Manager_Model->getUser("pencuci");
			$data['hasilPegawai'] = $this->Manager_Model->getUser("pegawai");

			$this->load->view('template/headermanager', $title);
			$this->load->view('Manager/userlist', $data);
			$this->load->view('template/footeradmin');
		}

		public function transaction() {
			$title['title'] = 'Transaction Complete | Point Care Laundry Shoes';
			$data['transaction'] = $this->Manager_Model->getTransaction();
			
			$this->load->view('template/headermanager', $title);
			$this->load->view('Manager/transaksiList', $data);
			$this->load->view('template/footeradmin');
		}

		public function addUser() {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('level', 'Level', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$this->Manager_Model->addUser();
				redirect('Manager/user', 'refresh');
			} else {
				redirect('Manager','refresh');
			}
		}
	}
?>
