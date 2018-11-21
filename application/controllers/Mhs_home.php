<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhs_home extends CI_Controller {
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
					'isi'  =>'mhspages/home/home'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);
		$data['mk'] = $this->m_global->count_data_all('ambilmk', null,['nim'=>$username]);
		$this->load->view('mhslayout/wrapper',$data);	
	}

}