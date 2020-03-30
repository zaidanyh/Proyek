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
			$data['list'] = $this->Pencuci_Model->getOrder();

			$this->load->view('template/headeremployee', $data);
			$this->load->view('Pencuci/index', $data);
			$this->load->view('template/footeremployee');
		}

		public function history() {
			$this->load->view('template/headeremployee');
			$this->load->view('Pencuci/history');
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
		public function myJob($username) {
			$title['title'] = 'List My Job | Point Care Laundry Shoes';
			$data['list'] = $this->Pencuci_Model->getOrder($username);
		}
		public function Account($username) {
			$title['title'] = 'Account Washer | Point Care Laundry Shoes';
			$data['user'] = $this->Pencuci_Model->updateUser($username);
		}
	}
?>
