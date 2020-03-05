<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Login extends CI_Model {
		public function login($username, $password) {
			$decryp_username = $this->decryp_username($username);
			$decryp_password = $this->decryp_password($password);
			$this->db->where('username', $decryp_username);
			$this->db->where('password', $decryp_password);
			$query = $this->db->get('user', 1);
			
			if ($query->num_rows() == 1) {
				return $query->result();
			} else {
				return FALSE;
			}
		}
		private function decryp_username($value) {
			return hash('sha512', $value .config_item('encryption_key'));
		}
		private function decryp_password($value) {
			return hash('sha512', $value .config_item('encryption_key'));
		}
	}
?>
