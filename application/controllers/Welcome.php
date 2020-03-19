<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller {
		public function __construct(){
			parent::__construct();
			
		}
		public function index() {
			$data['title'] = "Welcome Point Care | Laundry Shoes";

			$this->load->view('template/header', $data);
			$this->load->view('Customer/index');
			$this->load->view('template/footer');
		}
		public function about() {
			$data['title'] = "About Point Care Laundry Shoes";
			$this->load->view('template/header', $data);
			$this->load->view('Customer/about');
			$this->load->view('template/footer');
		}
	}
?>
