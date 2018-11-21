<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_petunjuk extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('SecurityModel');
		$this->load->model('M_login');
		$this->load->helper('tglindo_helper');	   
		//Do your magic here
	}
	
	public function index() {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Petunjuk',
					'isi'  =>'adminpages/petunjuk/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['petunjuk'] = $this->m_global->get_data_all('petunjuk', null);
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function detail($petunjuk_id) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Petunjuk',
					'isi'  =>'adminpages/petunjuk/detail'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['petunjuk'] = $this->m_global->get_data_all('petunjuk', null, [strEncrypt('petunjuk_id', TRUE) => $petunjuk_id]);
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function edit($petunjuk_id) {
		$data=array('title'=>'Edit Petunjuk',
					'isi'  =>'adminpages/petunjuk/edit'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['petunjuk'] = $this->m_global->get_data_all('petunjuk', null, [strEncrypt('petunjuk_id', TRUE) => $petunjuk_id]);
		$data['petunjuk_id'] = $petunjuk_id;
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_edit($petunjuk_id)
	{
		$result = [];
		$post 	= $this->input->post();

		$this->form_validation->set_rules('isi', 'Petunjuk', 'trim|required');
				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'isi'		=> $post['isi'],
					  ];
			
			$role = $this->m_global->update('petunjuk', $menu_data, [strEncrypt('petunjuk_id', TRUE) => $petunjuk_id]);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Petunjuk Berhasil di Rubah !!</div></div>");
               	redirect('admin_petunjuk'); 
			} else {
            	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Petunjuk Gagal di Rubah !!</div></div>");
                redirect('admin_petunjuk');
			}
		}
	}
}