<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Welcome extends CI_Controller {
		public function __construct(){
			parent::__construct();
		}
		public function index() {
			$data['title'] = "Welcome";
			$this->load->view('template/header', $data);
			$this->load->view('Customer/index', $data);
			$this->load->view('template/footer', $data);
			
		}
	}
?>
