<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_nilai extends CI_Controller {
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

		$data=array('title'=>'Data Nilai',
					'isi'  =>'dosenpages/nilai/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['mengajar'] = $this->m_global->get_data_all('mengajar',null,['kd_dosen'=>$username]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['mkul'] = $this->m_global->get_data_all('mengajar',[['matkul','matkul.kd_mk = mengajar.kd_mku','inner']],['kd_dosen'=>$username],'*',null,null,0,null,'kd_mk');
		$this->load->view('dosenlayout/wrapper',$data);	
	}

	public function view() {
		$result = [];
		$post 	= $this->input->post();
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Mahasiswa',
					'isi'  =>'dosenpages/nilai/list'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		
		$menu_data 	= [
						'kd_mk'		=> $post['kd_mk'],
						'kd_dosen'	=> $this->session->userdata('username'),
						'pertemuan' => $post['pertemuan'],
						'jenis'		=> $post['jenis'],
						'kd_prodi'	=> $post['kd_prodi'],
						'offering'  => $post['offering'],
					  ];
		$data['mahasiswa'] = $this->m_global->get_data_all('nilai',[['mahasiswa','mahasiswa.nim = nilai.nim','inner']], $menu_data);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);	
	}

	public function edit($mgj_id) {
		$data=array('title'=>'Edit Data Mengajar',
					'isi'  =>'dosenpages/nilai/'
						);
		$data['mengajar'] = $this->m_global->get_data_all('mengajar', null, [strEncrypt('mgj_id', TRUE) => $mgj_id]);
		$data['mgj_id'] = $mgj_id;
		$kd_dosen = $this->session->userdata('username');
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_edit($mgj_id)
	{
		$result = [];
		$post 	= $this->input->post();
		
		$kd_dosen = $this->session->userdata('$username');
		$this->form_validation->set_rules('kd_mk', 'Kode Matakuliah', 'trim|required|alpha_numeric');
		
				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'kd_dosen'		=> $kd_dosen,
						'kd_mk'		=> $post['kd_mk'],
					  ];
			$x = $this->m_global->get_data_all('mengajar',null,['kd_mk' => $post['kd_mk']]);
		
			if($x) {
				if(strEncrypt($x[0]->mgj_id) !== $mgj_id) {
					$result['msg'] = 'Data mengajar sudah ada !';
					$result['sts'] = '0';
				} else {
					$role = $this->m_global->update('mengajar', $menu_data, [strEncrypt('mgj_id', TRUE) => $mgj_id]);

					if($role) {
						$result['msg'] = 'Data mengajar berhasil dirubah !';
						$result['sts'] = '1';
					} else {
						$result['msg'] = 'Data mengajar gagal dirubah !';
						$result['sts'] = '0';
					}
				}
			} else {
				$role = $this->m_global->update('mengajar', $menu_data, [strEncrypt('mgj_id', TRUE) => $mgj_id]);

				if($role) {
					$result['msg'] = 'Data mengajar berhasil dirubah !';
					$result['sts'] = '1';
				} else {
					$result['msg'] = 'Data mengajar gagal dirubah !';
					$result['sts'] = '0';
				}
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}

	public function delete($mgj_id) {
		$mgj_id=$this->input->post('mgj_id');
		$data['mengajar'] = $this->m_global->delete('mengajar',['mgj_id'=>$mgj_id]);
	}

}