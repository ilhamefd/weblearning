<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_profil extends CI_Controller {
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

      	$status = $this->session->userdata('level');

		$data=array('title'=>'Profil',
					'isi'  =>'adminpages/profil/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function chg_profil($dsn_id){
		$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('level');

		$data=array('title'=>'Edit Profil',
					'isi'  =>'adminpages/profil/chg_profil'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$data['profil'] = $this->m_global->get_data_all('dosen', null, [strEncrypt('dsn_id', TRUE) => $dsn_id]);
		$data['dsn_id'] = $dsn_id;
		
		$this->load->view('adminlayout/wrapper',$data);	
	}

	public function act_chg_profil($dsn_id){
		$result = [];
		$post 	= $this->input->post();
		
		$this->form_validation->set_rules('kddosen', 'Kode ', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('nmdosen', 'Nama ', 'trim|required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('nohp', 'Nomor Handphone', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('foto', 'Foto', 'trim|required');
				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'kd_dosen'		=> $post['kddosen'],
						'nm_dosen'		=> $post['nmdosen'],
						'jk'			=> $post['jk'],
						'tgl_lahir'		=> $post['tgllahir'],
						'alamat'		=> $post['alamat'],
						'hp'			=> $post['nohp'],
						'email'			=> $post['email'],
						'foto'			=> $post['foto'],
					  ];
			$x = $this->m_global->get_data_all('dosen',null,['kd_dosen' => $post['kddosen']]);
		
			if($x) {
				if(strEncrypt($x[0]->dsn_id) !== $dsn_id) {
					$result['msg'] = 'Data sudah ada !';
					$result['sts'] = '0';
				} else {
					$role = $this->m_global->update('dosen', $menu_data, [strEncrypt('dsn_id', TRUE) => $dsn_id]);

					if($role) {
						$result['msg'] = 'Data berhasil dirubah !';
						$result['sts'] = '1';
					} else {
						$result['msg'] = 'Data gagal dirubah !';
						$result['sts'] = '0';
					}
				}
			} else {
				$role = $this->m_global->update('dosen', $menu_data, [strEncrypt('dsn_id', TRUE) => $dsn_id]);

				if($role) {
					$result['msg'] = 'Data berhasil dirubah !';
					$result['sts'] = '1';
				} else {
					$result['msg'] = 'Data gagal dirubah !';
					$result['sts'] = '0';
				}
			}
		} else {
			$result['msg'] = validation_errors();
			$result['sts'] = '0';
		}

		echo json_encode($result);
	}

	public function chg_foto($dsn_id){
		$data=array('title'=>'Ganti Foto',
					'isi'  =>'adminpages/profil/chg_foto'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['dosen'] = $this->m_global->get_data_all('dosen', null, [strEncrypt('dsn_id', TRUE) => $dsn_id]);
		$data['dsn_id'] = $dsn_id;
		$this->load->view('adminlayout/wrapper',$data);
	}

	public function act_chg_foto($dsn_id){
		$this->load->library('upload');
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/foto_profil/dosen'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '1000'; //maksimum besar file 2M
        $config['max_width']  = '100'; //lebar maksimum 1288 px
        $config['max_height']  = '100'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->overwrite = true;
        $this->upload->initialize($config);

        if($_FILES['img']['name'])
        {
            if ($this->upload->do_upload('img'))
            {
                $gbr = $this->upload->data();
                $data = array(
                 	'foto' =>$gbr['file_name'],             
                );
                
                $this->m_global->update('dosen',$data,['dsn_id'=>$dsn_id]); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Perubahan foto berhasil disimpan !!</div></div>");
                redirect('Admin_profil'); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal mengubah foto !!</div></div>");
                redirect('admin_profil'); //jika gagal maka akan ditampilkan form upload
            }
        }
	}
}