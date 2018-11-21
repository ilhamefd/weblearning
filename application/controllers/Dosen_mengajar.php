<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_mengajar extends CI_Controller {
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

		$data=array('title'=>'Data Mengajar',
					'isi'  =>'dosenpages/mengajar/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		
		$data['mengajar'] = $this->m_global->get_data_all('mengajar',[['matkul','matkul.kd_mk = mengajar.kd_mku','inner']],['kd_dosen'=>$username]);
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);	
	}

	public function add() {
		$data=array('title'=>'Tambah Data Mengajar',
					'isi'  =>'dosenpages/mengajar/add'
						);
		$data['mkul'] = $this->m_global->get_data_all('matkul',null,null,'*');
		$data['mengajar'] = $this->m_global->get_data_all('mengajar',null);
		$kd_dosen = $this->session->userdata('username');
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);
	}

	public function act_add(){
		$result = [];
		$post 	= $this->input->post();
		$kd_dosen = $this->session->userdata('username');
		//$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);

		$this->form_validation->set_rules('kd_mk', 'Kode Matakuliah', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('kd_prodi', 'Kode Prodi', 'trim|required');
		$this->form_validation->set_rules('offering', 'Offering', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			
			$menu_data 	= [
						'kd_dosen'	=> $kd_dosen,
						'kd_mku'	=> $post['kd_mk'],
						'kd_prodi'	=> $post['kd_prodi'],
						'offering'	=> $post['offering'],
					  ];
			$check= $this->m_global->count_data_all('mengajar',null,['kd_dosen'=>$menu_data['kd_dosen'], 'kd_mku'=>$menu_data['kd_mku'], 'kd_prodi'=>$menu_data['kd_prodi'], 'offering'=>$menu_data['offering']]);
			
			if ($check!=1){
				$role = $this->m_global->insert('mengajar', $menu_data);

				if($role) {
					$result['msg'] = 'Data mengajar berhasil ditambahakan !';
					$result['sts'] = '1';
				} else {
					$result['msg'] = 'Data mengajar gagal ditambahakan !';
					$result['sts'] = '0';
				}
				
			}else{
				$result['msg'] = 'Data mengajar sudah ditambahakan !';
				$result['sts'] = '0';				
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}


	public function edit($mgj_id) {
		$data=array('title'=>'Edit Data Mengajar',
					'isi'  =>'dosenpages/mengajar/edit'
						);
		$data['mengajar'] = $this->m_global->get_data_all('mengajar', null, [strEncrypt('mgj_id', TRUE) => $mgj_id]);
		$data['mgj_id'] = $mgj_id;
		$kd_dosen = $this->session->userdata('username');
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);
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