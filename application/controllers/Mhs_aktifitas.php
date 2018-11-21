<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhs_aktifitas extends CI_Controller {
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

		$data=array('title'=>'Aktifitas',
					'isi'  =>'mhspages/aktifitas/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);
		
		$data['logmateri'] = $this->m_global->get_data_all('log_materi',[['materi','log_materi.mtr_id = materi.mtr_id','inner'],['lib_materi','lib_materi.lib_id = materi.library_id','inner']], ['username'=>$username], '*', null, ['logmtr_id', 'desc']);
		
		$data['logpre'] = $this->m_global->get_data_all('log_pre', [['matkul','matkul.kd_mk=log_pre.kd_mk', 'inner']], ['username'=>$username], '*', null, ['logpre_id', 'desc']);

		$data['logpos'] = $this->m_global->get_data_all('log_pos', [['matkul','matkul.kd_mk=log_pos.kd_mk', 'inner']], ['username'=>$username], '*', null, ['logpos_id', 'desc']);

		$data['logcm'] = $this->m_global->get_data_all('log_umum',null , ['username'=>$username], '*', null, ['logu_id', 'desc']);

		$this->load->view('mhslayout/wrapper',$data);	
	}
}