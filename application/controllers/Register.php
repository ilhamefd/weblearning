<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    //$this->load->model('SecurityModel');
		//$this->load->model('M_login');	   

		//Do your magic here
	}
	public function index() {
      	//$this->SecurityModel->level_empty();

      	//$status = $this->session->userdata('$level');

		$data=array('title'=>'Home',
					'isi'  =>'cmpages/register/index'
						);
		//$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		
		$this->load->view('cmlayout/wrapper',$data);	
	}

	public function act_add(){
		$result = [];
		$post 	= $this->input->post();

		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('nim', 'NIM', 'trim|required|alpha_numeric|is_unique[user.username]');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('nohp', 'Nomor Handphone', 'trim|required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('repassword', 'Ulangi Password', 'trim|required|matches[password]');

		if ($this->form_validation->run() == TRUE){
			// $tgl = tgl_indo($post['tgllahir']);
			$menu_datausr	= [
						'username'		=> $post['nim'],
						'password'	=> md5($post['password']),
						'level'		=> 'mhs',
					];
			
			$menu_datamhs	= [
						'nim'		=> $post['nim'],
						'nama'		=> $post['nama'],
						'jk'		=> $post['jk'],
						'tgl_lahir'	=> $post['tgllahir'],
						'alamat'	=> $post['alamat'],
						'email'		=> $post['email'],
						'hp'		=> $post['nohp'],
						'foto'		=> 'mahasiswa.png',
					];

			$role = $this->m_global->insert('user', $menu_datausr);

			if($role) {
				$pgn = $this->m_global->insert('mahasiswa', $menu_datamhs);

				$result['msg'] = 'Register berhasil !';
				$result['sts'] = '1';
			} else {
				$result['msg'] = 'Register gagal !';
				$result['sts'] = '0';
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}
}