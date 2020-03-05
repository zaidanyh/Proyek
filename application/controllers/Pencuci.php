<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Pencuci extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('Model File');

			if ($this->session->userdata('level') != "pencuci") {
				redirect('Login', 'refresh');
			}
		}
		public function index() {
			$data['title'] = "Home Pencuci | Point & Care";
		}
	}
?>
