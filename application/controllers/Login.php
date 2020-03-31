<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('Login_Model');
			
		}
		public function index() {
			$data['title'] = "Login | Point & Care";

			$this->load->view('Login/index', $data);
			
		}
		public function process() {
			$username = htmlspecialchars($this->input->post('username'));
			$password = htmlspecialchars($this->input->post('password'));

			$cek = $this->Login_Model->login($username, $password);
			if ($cek) {
				foreach ($cek as $ck);

				$this->session->set_userdata('username', $ck->username);
				$this->session->set_userdata('level', $ck->level);
				if ($this->session->userdata('level') == "manager") {
					$this->session->set_userdata('username', $cek[0]->username);
					redirect('Manager','refresh');
				} else if ($this->session->userdata('level') == "pegawai") {
					$this->session->set_userdata('username', $cek[0]->username);
					redirect('Pegawai','refresh');
				} else if ($this->session->userdata('level') == "pencuci") {
					$this->session->set_userdata('username', $cek[0]->username);
					redirect('Pencuci','refresh');
				} 
			} else {
				redirect('Login', 'refresh');
			}
		}
		public function logout() {
			$this->session->sess_destroy();
			redirect('Login', 'refresh');
		}
	}
?>
