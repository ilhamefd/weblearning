<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_library extends CI_Controller {
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

		$data=array('title'=>'Library',
					'isi'  =>'dosenpages/library/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		// $data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username],'*',null, ['lib_id','desc']);
		$data['mengajar'] = $this->m_global->get_data_all('mengajar',[['matkul','matkul.kd_mk = mengajar.kd_mku','inner']],['kd_dosen'=>$username],'*',null,null,0,null,'kd_mk');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);	
	}
	
	public function daftar($kd_mku=0) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Library',
					'isi'  =>'dosenpages/library/list'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mku],'*',null, ['lib_id','asc']);
		$data['kd_mku'] = $kd_mku;
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);	
	}

	public function view($lib_id) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'View Library',
					'isi'  =>'dosenpages/library/view'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$data['library'] = $this->m_global->get_data_all('lib_materi',null,[strEncrypt('lib_id', TRUE) => $lib_id]);
		
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		
		$this->load->view('dosenlayout/wrapper',$data);	
	}

	public function add($kd_mku=0) {
		$data=array('title'=>'Tambah Library',
					'isi'  =>'dosenpages/library/add'
						);
		
		$kd_dosen = $this->session->userdata('username');
		$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$kd_dosen]);
		$username = $this->session->userdata('username');
		$data['kd_mku'] = $kd_mku;
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);
	}

	public function act_add(){
		$result = [];
		$post 	= $this->input->post();
		$kd_dosen = $this->session->userdata('username');
		$kd_matkul= $post['kode_mk'];
		//$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);

		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('konten', 'Konten', 'trim|required');

		if ($this->form_validation->run() == TRUE){
			// $tgl = tgl_indo($post['tgllahir']);
			$menu_data 	= [
						'kd_dos'	=> $kd_dosen,
						'kode_mk'	=> $post['kode_mk'],
						'judul'		=> $post['judul'],
						'konten'	=> $post['konten'],
						'ptia'		=> '0',
						'ptib'		=> '0',
						'ptic'		=> '0',
						'ptid'		=> '0',
						'ptea'		=> '0',
						'pteb'		=> '0',
						'ptec'		=> '0',
						'pted'		=> '0',
					  ];

			$role = $this->m_global->insert('lib_materi', $menu_data);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Library Berhasil di Tambah !!</div></div>");
                redirect('dosen_library/daftar/'.$kd_matkul.''); 
			} else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Library Gagal di Tambah !!</div></div>");
                redirect('dosen_library/daftar/'.$kd_matkul.'');
			}
		}
	}


	public function edit($lib_id) {
		$data=array('title'=>'Edit Library',
					'isi'  =>'dosenpages/library/edit'
						);
		$data['library'] = $this->m_global->get_data_all('lib_materi', null, [strEncrypt('lib_id', TRUE) => $lib_id]);
		$data['lib_id'] = $lib_id;
		$kd_dosen = $this->session->userdata('username');
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);
	}

	public function act_edit($lib_id)
	{
		$result = [];
		$post 	= $this->input->post();
		
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('konten', 'Konten', 'trim|required');

				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'judul'		=> $post['judul'],
						'konten'	=> $post['konten'],
					  ];
			
			$role = $this->m_global->update('lib_materi', $menu_data, [strEncrypt('lib_id', TRUE) => $lib_id]);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Library Berhasil di Rubah !!</div></div>");
               	redirect('dosen_library'); 
			} else {
            	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Library Gagal di Rubah !!</div></div>");
                redirect('dosen_library');
			}
		}
	}

	public function delete($lib_id=0, $kd_mku=0) {
			
		$del= $this->m_global->delete('lib_materi',['lib_id'=>$lib_id]);

		if($del) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Library Berhasil dihapus !!</div></div>");
               	redirect('dosen_library/daftar/'.$kd_mku.''); 
			} else {
            	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Library Gagal dihapus !!</div></div>");
                redirect('dosen_library/daftar/'.$kd_mku.'');
			}

	}

}