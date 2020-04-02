<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pencuci extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('Pencuci_Model');

			if ($this->session->userdata('level') != "pencuci") {
				redirect('Login', 'refresh');
			}
		}
		public function index() {
			$data['title'] = "Home Pencuci | Point & Care";

			$this->load->view('template/headeremployee', $data);
			$this->load->view('Pencuci/index');
			$this->load->view('template/footeremployee');
		}
		public function Account() {
			$username = $this->session->userdata('username');
			$title['title'] = 'Account Washer | Point Care Laundry Shoes';
			$data['user'] = $this->Pencuci_Model->getUser($username);

			$this->form_validation->set_rules('fullname', 'Fullname', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$this->Pencuci_Model->updateUser($username);
				redirect('Pencuci/Account','refresh');
			} else {
				$this->load->view('template/headeremployee', $title);
				$this->load->view('Pencuci/userprofile', $data);
				$this->load->view('template/footeremployee');
			}
		}
		public function Job() {
			$title['title'] = 'List Job | Point Care Laundry Shoes';
			$data['Job'] = $this->Pencuci_Model->listJob("waiting");

			$this->load->view('template/headeremployee', $title);
			$this->load->view('Pencuci/listjob', $data);
			$this->load->view('template/footeremployee');
		}

		public function takeJob($id) {
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required');

			if ($this->form_validation->run() == TRUE) {
				$this->Pencuci_Model->takeJob($id);
				redirect('Pencuci/myJob','refresh');
			} else {
				redirect('Pencuci','refresh');
			}
		}
		public function myJob() {
			$username = $this->session->userdata('username');
			$title['title'] = 'List My Job | Point Care Laundry Shoes';
			$data['list'] = $this->Pencuci_Model->getOrder($username, "in progress");

			$this->load->view('template/headeremployee', $title);
			$this->load->view('Pencuci/myjob', $data);
			$this->load->view('template/footeremployee');
			
		}
		
		public function history() {
			$this->load->view('template/headeremployee');
			$this->load->view('Pencuci/history');
			$this->load->view('template/footeremployee');
		}
	}
?>
