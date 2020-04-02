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

		
		public function useradd() {
			$title['title'] = 'Add Job Washer | Point Care Laundry Shoes';

			$this->load->view('template/headermanager', $title);
			$this->load->view('Manager/useradd');
			$this->load->view('template/footeradmin');
		}

		public function userlist() {
			$data['title'] = "Home Manager | Point Care Laundry Shoes";
			$this->load->view('template/headermanager', $data);
			$this->load->view('Manager/userlist');
			$this->load->view('template/footeradmin');

		}

		public function userprofile() {
			$username = $this->session->userdata('username');
			$data['title'] = 'Profile | Point Care Laundry Shoes';
			$data['account'] = $this->Manager_Model->getDataAccount($username);

			$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			
			if ($this->form_validation->run() == TRUE) {
				$this->Pegawai_Model->editAkun($username);
				redirect('Pegawai/userprofile','refresh');
			} else {
				$this->load->view('template/headermanager', $data);
				$this->load->view('Manager/userprofile', $data);
				$this->load->view('template/footeradmin');
			}
		}

	}
?>
