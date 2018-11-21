<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_pengguna extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('SecurityModel');
		$this->load->model('M_login');
		//Do your magic here
	}
	
	public function index() {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Pengguna',
					'isi'  =>'adminpages/masterdata/pengguna/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['pengguna'] = $this->m_global->get_data_all('user', null);
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function add() {
		$data=array('title'=>'Tambah Data Pengguna',
					'isi'  =>'adminpages/masterdata/pengguna/add'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['pengguna'] = $this->m_global->get_data_all('user',null);
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_add(){
		$result = [];
		$post 	= $this->input->post();

		$this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha_numeric|is_unique[user.username]');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('repassword', 'Re-Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			// $tgl = tgl_indo($post['tgllahir']);
			$menu_data 	= [
						'username'		=> $post['username'],
						'password'		=> md5($post['password']),
						'level'		=> $post['level'],
					  ];

			$role = $this->m_global->insert('user', $menu_data);

			if($role) {
				$result['msg'] = 'Data pengguna berhasil ditambahakan !';
				$result['sts'] = '1';
			} else {
				$result['msg'] = 'Data pengguna gagal ditambahakan !';
				$result['sts'] = '0';
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}


	// public function edit($usr_id) {
	// 	$data=array('title'=>'Edit Data Pengguna',
	// 				'isi'  =>'adminpages/masterdata/pengguna/edit'
	// 					);
	// 	$data['users'] = $this->m_global->get_data_all('user', null, [strEncrypt('usr_id', TRUE) => $usr_id]);
	// 	$data['usr_id'] = $usr_id;
	// 	$this->load->view('adminlayout/wrapper',$data);
	// }

	// public function act_edit($usr_id)
	// {
	// 	$result = [];
	// 	$post 	= $this->input->post();
		
	// 	$this->form_validation->set_rules('username', 'User Name', 'trim|required|alpha_numeric');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required');
	// 	$this->form_validation->set_rules('level', 'Level', 'trim|required');
				
	// 	if ($this->form_validation->run() == TRUE){
	// 		$menu_data 	= [
	// 					'username'		=> $post['username'],
	// 					'password'		=> $post['password'],
	// 					'level'			=> $post['level'],
	// 				  ];
	// 		$x = $this->m_global->get_data_all('user',null,['username' => $post['username']]);
		
	// 		if($x) {
	// 			if(strEncrypt($x[0]->usr_id) !== $usr_id) {
	// 				$result['msg'] = 'Data pengguna sudah ada !';
	// 				$result['sts'] = '0';
	// 			} else {
	// 				$role = $this->m_global->update('user', $menu_data, [strEncrypt('usr_id', TRUE) => $usr_id]);

	// 				if($role) {
	// 					$result['msg'] = 'Data pengguna berhasil dirubah !';
	// 					$result['sts'] = '1';
	// 				} else {
	// 					$result['msg'] = 'Data pengguna gagal dirubah !';
	// 					$result['sts'] = '0';
	// 				}
	// 			}
	// 		} else {
	// 			$role = $this->m_global->update('user', $menu_data, [strEncrypt('usr_id', TRUE) => $usr_id]);

	// 			if($role) {
	// 				$result['msg'] = 'Data pengguna berhasil dirubah !';
	// 				$result['sts'] = '1';
	// 			} else {
	// 				$result['msg'] = 'Data pengguna gagal dirubah !';
	// 				$result['sts'] = '0';
	// 			}
	// 		}
	// 	} else {
	// 		$result['msg'] = validation_errors();
	// 		$result['sts'] = '0';
	// 	}

	// 	echo json_encode($result);
	// }

	public function delete($usr_id) {
		$usr_id=$this->input->post('usr_id');
		$data['pengguna'] = $this->m_global->delete('user',['usr_id'=>$usr_id]);
	}

}