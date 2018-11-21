<?php defined('BASEPATH') or exit('No direct script access allowed');

Class M_login extends CI_Model {

       	public function cek($u, $p) {
       	$pass=md5($p);
		$this->db->where('username', $u);
		$this->db->where('password', $pass);
		$query = $this->db->get('user');

		if ($query->num_rows()>0) 
		{
			foreach ($query->result() as $row) 
			{
				$sess = array('usr_id' => $row->usr_id,
							'username' => $row->username,
							'password' => $row->password,
							'level' => $row->level
							);
				
				$this->session->set_userdata($sess);
				if ($sess['level'] == 'admin') 
				{
					redirect('admin_home');
				}
				else if($sess['level'] == 'dosen')
				{
					redirect('dosen_home');
				}
				else if($sess['level'] == 'mhs')
				{
					redirect('mhs_home');
				}
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger"> Maaf <strong>Username atau Password </strong> anda salah. </div>');
			redirect('Login');
		}
	}
}