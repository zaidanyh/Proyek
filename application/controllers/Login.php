<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('Login');
		}
		public function index() {
			$data['title'] = "Login | Point & Care";

			$this->load->view('Login/index', $data);
		}
	}
?>
