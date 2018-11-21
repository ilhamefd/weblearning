<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_materi extends CI_Controller {
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

		$data=array('title'=>'Data Materi',
					'isi'  =>'adminpages/masterdata/materi/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['materi'] = $this->m_global->get_data_all('materi', null);
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function hapus($mtr_id) {
		$mtr_id=$this->input->post('mtr_id');
		$data['materi'] = $this->m_global->delete('materi',['mtr_id'=>$mtr_id]);
	}

	public function tampil(){
		$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Materi',
					'isi'  =>'adminpages/masterdata/materi/list'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);

		$result = [];
		$post 	= $this->input->post();
		$data_input = [
			'kd_mk'		=> $post['kd_mk'],
			'kd_dosen'	=> $post['kd_dosen'],
			'kd_prodi'	=> $post['kd_prodi'],
			'offering'	=> $post['offering'],
		];

		$data['materi'] = $this->m_global->get_data_all('materi', [['lib_materi','lib_materi.lib_id=materi.library_id', 'inner']], $data_input,'*',null,['pertemuan', 'asc']);
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function add() {
		$data=array('title'=>'Tambah Data Materi',
					'isi'  =>'adminpages/masterdata/materi/add'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);

		$data['materi'] = $this->m_global->get_data_all('materi',null);
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_add(){
		$result = [];
		$post 	= $this->input->post();

		$this->form_validation->set_rules('kd_mk', 'Kode Matakuliah', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('kd_dosen', 'Kode Dosen', 'trim|required');
		$this->form_validation->set_rules('pertemuan', 'Pertemuan', 'trim|required');
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('materi', 'Materi', 'required');
		$this->form_validation->set_rules('kd_prodi', 'Prodi', 'required');
		$this->form_validation->set_rules('offering', 'Offering', 'required');
		

		if ($this->form_validation->run() == TRUE){
			// $tgl = tgl_indo($post['tgllahir']);
			$menu_data 	= [
						'kd_mk'		=> $post['kd_mk'],
						'kd_dosen'	=> $post['kd_dosen'],
						'pertemuan'	=> $post['pertemuan'],
						'judul'		=> $post['judul'],
						'materi'	=> $post['materi'],
						'kd_prodi'	=> $post['kd_prodi'],
						'offering'	=> $post['offering'],
					  ];

			$role = $this->m_global->insert('materi', $menu_data);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Materi Berhasil di Upload !!</div></div>");
                redirect('admin_materi'); 
			} else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Materi Gagal di Upload !!</div></div>");
                redirect('admin_materi');
			}
		}
	}


	public function edit($lib_id) {
		$data=array('title'=>'Edit Data Materi',
					'isi'  =>'adminpages/masterdata/materi/edit'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['materi'] = $this->m_global->get_data_all('lib_materi', null, [strEncrypt('lib_id', TRUE) => $lib_id]);
		$data['lib_id'] = $lib_id;
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_edit($lib_id)
	{
		$result = [];
		$post 	= $this->input->post();
		
		// $this->form_validation->set_rules('kd_mk', 'Kode Matakuliah', 'trim|required|alpha_numeric');
		// $this->form_validation->set_rules('kd_dosen', 'Kode Dosen', 'trim|required');
		// $this->form_validation->set_rules('pertemuan', 'Pertemuan', 'trim|required');
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('konten', 'Materi', 'trim|required');

				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						// 'kd_mk'		=> $post['kd_mk'],
						// 'kd_dosen'	=> $post['kd_dosen'],
						// 'pertemuan'	=> $post['pertemuan'],
						'judul'		=> $post['judul'],
						'konten'	=> $post['konten'],
					  ];
			
			$role = $this->m_global->update('lib_materi', $menu_data, [strEncrypt('lib_id', TRUE) => $lib_id]);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Materi Berhasil di Rubah !!</div></div>");
               	redirect('admin_materi'); 
			} else {
            	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Materi Gagal di Rubah !!</div></div>");
                redirect('admin_materi');
			}
		}
	}

}