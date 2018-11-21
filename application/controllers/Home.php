<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    //$this->load->model('SecurityModel');
		//$this->load->model('M_login');	   

		//Do your magic here
	}
	public function index() {
      	//$this->SecurityModel->level_empty();

      	//$status = $this->session->userdata('$level');

		$data=array('title'=>'Home',
					'isi'  =>'cmpages/home/index'
						);
		//$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		
		$this->load->view('cmlayout/wrapper',$data);	
	}

}