<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('Customer');
		}
		public function index() {
			$title['title'] = "Welcome Point Care | Laundry Shoes";

			$this->load->view('template/header', $title);
			$this->load->view('Customer/index');
			$this->load->view('template/footer');
		}

		public function about() {
			$title['title'] = "About Point Care Laundry Shoes";

			$this->load->view('template/header', $title);
			$this->load->view('Customer/about');
			$this->load->view('template/footer');

			
		}

		public function check() {
			$title['title'] = 'Search Your Shoes | Point Care Laundry Shoes';
			$data['shoes'] = $this->Customer->Search();

			$this->load->view('template/header', $title);
			$this->load->view('Customer/check', $data);
			$this->load->view('template/footer');
		}
	}
?>
