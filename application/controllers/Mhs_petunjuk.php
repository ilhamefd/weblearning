<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhs_petunjuk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('SecurityModel');
		$this->load->model('M_login');
		$this->load->helper('tglindo_helper');	   
		//Do your magic here
	}
	
	public function index($user=0) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Petunjuk',
					'isi'  =>'mhspages/petunjuk/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('mahasiswa',null, ['nim'=>$username]);
		$data['petunjuk'] = $this->m_global->get_data_all('petunjuk', null,['user'=>$user]);
		$this->load->view('mhslayout/wrapper',$data);	
	}

}