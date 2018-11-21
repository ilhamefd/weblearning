<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SecurityModel extends CI_Model {
	public function level_empty(){
		$username = $this->session->userdata('username');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('Login');
		}
	}
	
}

/* End of file SecurityModel.php */
/* Location: ./application/models/SecurityModel.php */