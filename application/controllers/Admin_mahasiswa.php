<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_mahasiswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('SecurityModel');
		$this->load->model('M_login');
		$this->load->helper('tglindo_helper');	   
		//Do your magic here
	}
	
	public function index() {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Mahasiswa',
					'isi'  =>'adminpages/masterdata/mahasiswa/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['mahasiswa'] = $this->m_global->get_data_all('mahasiswa', null);
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function add() {
		$data=array('title'=>'Tambah Data Mahasiswa',
					'isi'  =>'adminpages/masterdata/mahasiswa/add'
						);
		$data['mahasiswa'] = $this->m_global->get_data_all('mahasiswa',null);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_add(){
		$result = [];
		$post 	= $this->input->post();

		$this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'trim|required|numeric|is_unique[mahasiswa.nim]');
		$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('repassword', 'Re-Password', 'trim|required|matches[password]');


		if ($this->form_validation->run() == TRUE){
			// $tgl = tgl_indo($post['tgllahir']);
			$menu_data_mhs 	= [
						'nim'			=> $post['nim'],
						'nama'			=> $post['nama'],
						'jk'			=> $post['jk'],
						'tgl_lahir'		=> $post['tgllahir'],
						'alamat'		=> $post['alamat'],
						'hp'			=> $post['hp'],
						'email'			=> $post['email'],
						'foto'			=> 'mahasiswa.png',
					  ];
			$menu_data_usr 	= [
						'username'		=> $post['nim'],
						'password'		=> md5($post['password']),
						'level'			=> 'mhs',
					  ];

			$role = $this->m_global->insert('mahasiswa', $menu_data_mhs);

			if($role) {
				$role = $this->m_global->insert('user', $menu_data_usr);
				$result['msg'] = 'Data mahasiswa berhasil ditambahakan !';
				$result['sts'] = '1';
			} else {
				$result['msg'] = 'Data mahasiswa gagal ditambahakan !';
				$result['sts'] = '0';
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}


	public function edit($mhs_id) {
		$data=array('title'=>'Edit Data Mahasiswa',
					'isi'  =>'adminpages/masterdata/mahasiswa/edit'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['mahasiswa'] = $this->m_global->get_data_all('mahasiswa', null, [strEncrypt('mhs_id', TRUE) => $mhs_id]);
		$data['mhs_id'] = $mhs_id;
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_edit($mhs_id)
	{
		$result = [];
		$post 	= $this->input->post();
		
		$this->form_validation->set_rules('nim', 'NIM Mahasiswa', 'trim|required|numeric');
		$this->form_validation->set_rules('nama', 'Nama Mahasiswa', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('hp', 'Nomor Handphone', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'nim'			=> $post['nim'],
						'nama'			=> $post['nama'],
						'jk'			=> $post['jk'],
						'tgl_lahir'		=> $post['tgllahir'],
						'alamat'		=> $post['alamat'],
						'hp'			=> $post['hp'],
						'email'			=> $post['email'],

					  ];
			$x = $this->m_global->get_data_all('mahasiswa',null,['nim' => $post['nim']]);
		
			if($x) {
				if(strEncrypt($x[0]->mhs_id) !== $mhs_id) {
					$result['msg'] = 'Data mahasiswa sudah ada !';
					$result['sts'] = '0';
				} else {
					$role = $this->m_global->update('mahasiswa', $menu_data, [strEncrypt('mhs_id', TRUE) => $mhs_id]);

					if($role) {
						$result['msg'] = 'Data mahasiswa berhasil dirubah !';
						$result['sts'] = '1';
					} else {
						$result['msg'] = 'Data mahasiswa gagal dirubah !';
						$result['sts'] = '0';
					}
				}
			} else {
				$role = $this->m_global->update('mahasiswa', $menu_data, [strEncrypt('mhs_id', TRUE) => $mhs_id]);

				if($role) {
					$result['msg'] = 'Data mahasiswa berhasil dirubah !';
					$result['sts'] = '1';
				} else {
					$result['msg'] = 'Data mahasiswa gagal dirubah !';
					$result['sts'] = '0';
				}
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}

	public function delete($nim) {
		$nim=$this->input->post('nim');
		$this->m_global->delete('user',['username'=>$nim]);
		$data['mahasiswa'] = $this->m_global->delete('mahasiswa',['nim'=>$nim]);
		
	}

}