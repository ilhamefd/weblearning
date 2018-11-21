<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_matkul extends CI_Controller {
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

		$data=array('title'=>'Data Matakuliah',
					'isi'  =>'adminpages/masterdata/matakuliah/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['matkul'] = $this->m_global->get_data_all('matkul', null);
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function add() {
		$data=array('title'=>'Tambah Data Matakuliah',
					'isi'  =>'adminpages/masterdata/matakuliah/add'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['matkul'] = $this->m_global->get_data_all('matkul',null);
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_add(){
		$result = [];
		$post 	= $this->input->post();

		$this->form_validation->set_rules('kd_mk', 'Kode Matakuliah', 'trim|required|alpha_numeric|is_unique[matkul.kd_mk]');
		$this->form_validation->set_rules('nm_mk', 'Nama Matakuliah', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			// $tgl = tgl_indo($post['tgllahir']);
			$menu_data 	= [
						'kd_mk'		=> $post['kd_mk'],
						'nm_mk'		=> $post['nm_mk'],
					  ];

			$role = $this->m_global->insert('matkul', $menu_data);

			if($role) {
				$result['msg'] = 'Data matakuliah berhasil ditambahakan !';
				$result['sts'] = '1';
			} else {
				$result['msg'] = 'Data matakuliah gagal ditambahakan !';
				$result['sts'] = '0';
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}


	public function edit($mku_id) {
		$data=array('title'=>'Edit Data Matakuliah',
					'isi'  =>'adminpages/masterdata/matakuliah/edit'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['matkul'] = $this->m_global->get_data_all('matkul', null, [strEncrypt('mku_id', TRUE) => $mku_id]);
		$data['mku_id'] = $mku_id;
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_edit($mku_id)
	{
		$result = [];
		$post 	= $this->input->post();
		
		$this->form_validation->set_rules('kd_mk', 'Kode Matakuliah', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('nm_mk', 'Nama Matakuliah', 'trim|required');
				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'kd_mk'		=> $post['kd_mk'],
						'nm_mk'		=> $post['nm_mk'],
					  ];
			$x = $this->m_global->get_data_all('matkul',null,['kd_mk' => $post['kd_mk']]);
		
			if($x) {
				if(strEncrypt($x[0]->mku_id) !== $mku_id) {
					$result['msg'] = 'Data matakuliah sudah ada !';
					$result['sts'] = '0';
				} else {
					$role = $this->m_global->update('matkul', $menu_data, [strEncrypt('mku_id', TRUE) => $mku_id]);

					if($role) {
						$result['msg'] = 'Data matakuliah berhasil dirubah !';
						$result['sts'] = '1';
					} else {
						$result['msg'] = 'Data matakuliah gagal dirubah !';
						$result['sts'] = '0';
					}
				}
			} else {
				$role = $this->m_global->update('matkul', $menu_data, [strEncrypt('mku_id', TRUE) => $mku_id]);

				if($role) {
					$result['msg'] = 'Data matakuliah berhasil dirubah !';
					$result['sts'] = '1';
				} else {
					$result['msg'] = 'Data matakuliah gagal dirubah !';
					$result['sts'] = '0';
				}
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}

	public function delete($mku_id) {
		$mku_id=$this->input->post('mku_id');
		$data['matkul'] = $this->m_global->delete('matkul',['mku_id'=>$mku_id]);
	}

}