<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('Customer');
		}
		public function index() {
			$data['title'] = "Welcome Point Care | Laundry Shoes";

			$this->load->view('template/header', $data);
			$this->load->view('Customer/index');
			$this->load->view('template/footer');
		}

		public function about() {
			$data['title'] = "About Point Care Laundry Shoes";
			
			$this->load->view('Customer/about', $data);
			
		}

		public function check() {
			$title['title'] = 'Search Your Shoes | Point Care Laundry Shoes';

			if ($this->input->post('search')) {
				$data['shoes'] = $this->Customer->Search();
			}
			$this->load->view('template/header');
			$this->load->view('Customer/check');
			$this->load->view('template/footer');
		}
	}
?>
