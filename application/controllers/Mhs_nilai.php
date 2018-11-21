<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhs_nilai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	    $this->load->model('SecurityModel');
		$this->load->model('M_login');	   
		$this->load->helper('tglindo_helper');
		//Do your magic here
	}

	public function index()
	{
		$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Nilai',
					'isi'  =>'mhspages/nilai/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);
		$data['ambmk'] = $this->m_global->get_data_all('ambilmk',[['matkul','matkul.kd_mk = ambilmk.kd_mk','inner']], ['nim'=>$username]);
		
		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function daftarpre($kd_mk=0, $kd_dosen = 0) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Daftar Nilai',
					'isi'  =>'mhspages/nilai/nilaipre'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

		$data['pre'] = $this->m_global->get_data_all('nilai',null,[strEncrypt('kd_mk', TRUE) => $kd_mk, strEncrypt('kd_dosen', TRUE) => $kd_dosen,'jenis'=>'pre'],'*',null,['pertemuan','asc']);		

		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function daftarpos($kd_mk=0, $kd_dosen = 0) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Daftar Nilai',
					'isi'  =>'mhspages/nilai/nilaipos'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

		$data['pos'] = $this->m_global->get_data_all('nilai',null,[strEncrypt('kd_mk', TRUE) => $kd_mk, strEncrypt('kd_dosen', TRUE) => $kd_dosen,'jenis'=>'pos'],'*',null,['pertemuan','asc']);		

		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function daftartgs() {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Daftar Tugas',
					'isi'  =>'mhspages/nilai/nilaitgs'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

		$data['tgs'] = $this->m_global->get_data_all('file',[['materi','materi.mtr_id=file.mtr_id','inner'],['lib_materi','lib_materi.lib_id=materi.library_id','inner'],['matkul','matkul.kd_mk=lib_materi.kode_mk','inner']],['nim'=>$username],'*',null,['fil_id','desc']);		

		
		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function download($nm_file){   
    
    	$data = file_get_contents(base_url().'assets/file/');    
    	//$name = $nm_file;
    	
    	force_download($nm_file, $data);
  	}
}


/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */