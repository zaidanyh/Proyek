<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Manager extends CI_Controller {
		public function __construct() {
			parent::__construct();
			$this->load->model('Model File');

			if ($this->session->userdata('level') != "manager") {
				redirect('Login', 'refresh');
			}
		}
		public function index() {

		}
	}
?>
