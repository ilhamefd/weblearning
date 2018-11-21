<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_dosen extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('SecurityModel');
		$this->load->model('M_login');
		$this->load->model('M_global');

		$this->load->helper('tglindo_helper');	   

		//Do your magic here
	}
	
	public function index() {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Dosen',
					'isi'  =>'adminpages/masterdata/dosen/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$data['dosen'] = $this->m_global->get_data_all('dosen', null);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function add() {
		$data=array('title'=>'Tambah Data Dosen',
					'isi'  =>'adminpages/masterdata/dosen/add'
						);
		$data['dosen'] = $this->m_global->get_data_all('dosen',null);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_add(){
		$result = [];
		$post 	= $this->input->post();

		$this->form_validation->set_rules('kddosen', 'Kode Dosen', 'trim|required|alpha_numeric|is_unique[dosen.kd_dosen]');
		$this->form_validation->set_rules('nmdosen', 'Nama Dosen', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nohp', 'Nomor Handphone', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('repassword', 'Re-Password', 'trim|required|matches[password]');
		$this->form_validation->set_rules('level', 'Level', 'trim|required');

		

		if ($this->form_validation->run() == TRUE){
			// $tgl = tgl_indo($post['tgllahir']);
			$menu_data_dsn 	= [
						'kd_dosen'		=> $post['kddosen'],
						'nm_dosen'		=> $post['nmdosen'],
						'jk'			=> $post['jk'],
						'tgl_lahir'		=> $post['tgllahir'],
						'alamat'		=> $post['alamat'],
						'hp'			=> $post['nohp'],
						'email'			=> $post['email'],
						'foto'			=> 'dosen.png',
					  ];
			$menu_data_usr 	= [
						'username'		=> $post['kddosen'],
						'password'		=> md5($post['password']),
						'level'			=> $post['level'],
					  ];


			$role = $this->m_global->insert('dosen', $menu_data_dsn);

			if($role) {
				$roleb = $this->m_global->insert('user', $menu_data_usr);
				$result['msg'] = 'Data berhasil ditambahakan !';
				$result['sts'] = '1';
			} else {
				$result['msg'] = 'Data gagal ditambahakan !';
				$result['sts'] = '0';
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}


	public function edit($dsn_id) {
		$data=array('title'=>'Edit Data Dosen',
					'isi'  =>'adminpages/masterdata/dosen/edit'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['dosen'] = $this->m_global->get_data_all('dosen', null, [strEncrypt('dsn_id', TRUE) => $dsn_id]);
		$data['dsn_id'] = $dsn_id;
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_edit($dsn_id)
	{
		$result = [];
		$post 	= $this->input->post();
		
		$this->form_validation->set_rules('kddosen', 'Kode Dosen', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('nmdosen', 'Nama Dosen', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nohp', 'Nomor Handphone', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'kd_dosen'		=> $post['kddosen'],
						'nm_dosen'		=> $post['nmdosen'],
						'jk'			=> $post['jk'],
						'tgl_lahir'		=> $post['tgllahir'],
						'alamat'		=> $post['alamat'],
						'hp'			=> $post['nohp'],
						'email'			=> $post['email'],
					  ];
			$x = $this->m_global->get_data_all('dosen',null,['kd_dosen' => $post['kddosen']]);
		
			if($x) {
				if(strEncrypt($x[0]->dsn_id) !== $dsn_id) {
					$result['msg'] = 'Data dosen sudah ada !';
					$result['sts'] = '0';
				} else {
					$role = $this->m_global->update('dosen', $menu_data, [strEncrypt('dsn_id', TRUE) => $dsn_id]);

					if($role) {
						$result['msg'] = 'Data berhasil dirubah !';
						$result['sts'] = '1';
					} else {
						$result['msg'] = 'Data gagal dirubah !';
						$result['sts'] = '0';
					}
				}
			} else {
				$role = $this->m_global->update('dosen', $menu_data, [strEncrypt('dsn_id', TRUE) => $dsn_id]);

				if($role) {
					$result['msg'] = 'Data berhasil dirubah !';
					$result['sts'] = '1';
				} else {
					$result['msg'] = 'Data gagal dirubah !';
					$result['sts'] = '0';
				}
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}

	public function delete($kd_dosen) {
		$kd_dosen=$this->input->post('kd_dosen');
		$this->m_global->delete('user',['username'=>$kd_dosen]);
		$data['dosen'] = $this->m_global->delete('dosen',['kd_dosen'=>$kd_dosen]);
		
	}

}