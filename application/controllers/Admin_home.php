<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_home extends CI_Controller {
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

		$data=array('title'=>'Home',
					'isi'  =>'adminpages/home/home'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
    	$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['mhs'] = $this->m_global->count_data_all('mahasiswa', null);
		$data['dsn'] = $this->m_global->count_data_all('dosen', null);
		$data['mk'] = $this->m_global->count_data_all('matkul', null);
		$this->load->view('adminlayout/wrapper',$data);	
	}

}