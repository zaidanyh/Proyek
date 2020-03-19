<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Controller {
		public function __construct(){
			parent::__construct();
			
		}
		public function index() {
			$data['title'] = "Login | Point & Care";

			$this->load->view('template/header', $data);
			$this->load->view('Login/index');
			$this->load->view('template/footer');
		}
		public function process() {
			$username = htmlspecialchars($this->input->post('username'));
			$password = htmlspecialchars($this->input->post('password'));

			$cek = $this->Login->login($username, $password);
			if ($cek) {
				foreach ($cek as $ck);
				$this->session->set_userdata('username', $ck->username);
				$this->session->set_userdata('level', $ck->level);
				if ($this->session->userdata('level') == "manager") {
				$this->session->set_userdata('nama_lengkap', $cek[0]->nama_lengkap);
				redirect('Manager','refresh');
				} else if ($this->session->userdata('level') == "pegawai") {
					$this->session->set_userdata('nama_lengkap', $cek[0]->nama_lengkap);
					redirect('Pegawai','refresh');
				} else if ($this->session->userdata('level') == "pencuci") {
						$this->session->set_userdata('nama_lengkap', $cek[0]->nama_lengkap);
						redirect('Pencuci','refresh');
				} 
			} else {
				;
			}
		}
	}
?>