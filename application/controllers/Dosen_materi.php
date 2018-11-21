<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_materi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('SecurityModel');
		$this->load->model('M_login');
		$this->load->helper('download');
		//Do your magic here
	}
	
	public function index() {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Materi',
					'isi'  =>'dosenpages/materi/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['mengajar'] = $this->m_global->get_data_all('mengajar',[['matkul', 'matkul.kd_mk = mengajar.kd_mku','inner']],['kd_dosen'=>$username]);
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);	
	}

	public function daftar($kd_mk=0, $kd_prodi=0, $offering=0) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Materi',
					'isi'  =>'dosenpages/materi/list'
						);

		$data['kd_mk'] = $kd_mk;
		$data['kd_prodi'] = $kd_prodi;
		$data['offering'] = $offering;
	
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$kd_dosen = $this->session->userdata('username');
		$data['materi'] = $this->m_global->get_data_all('materi',[['lib_materi', 'lib_materi.lib_id = materi.library_id', 'inner']],['kd_mk'=> $kd_mk, 'kd_dosen'=>$kd_dosen, 'kd_prodi'=>$kd_prodi, 'offering'=>$offering],'*',null,['mtr_id','asc']);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);	
	}

	public function detail($mtr_id) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Materi',
					'isi'  =>'dosenpages/materi/detail'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$data['materi'] = $this->m_global->get_data_all('materi',[['lib_materi', 'lib_materi.lib_id = materi.library_id', 'inner']],[strEncrypt('mtr_id', TRUE) => $mtr_id]);
		
		$data['komentar'] = $this->m_global->get_data_all('komentar',null,[strEncrypt('mtr_id', TRUE) => $mtr_id,'id_balasan'=>'0'], '*',  null, ['id_komen', 'desc'] );
		
		$data['balasan'] = $this->m_global->get_data_all('komentar',null,[strEncrypt('mtr_id', TRUE) => $mtr_id,'id_balasan <>'=>'0'], '*',  null, ['id_komen', 'desc'] );
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		
		$this->load->view('dosenlayout/wrapper',$data);	
	}

	public function add_komen($mtr_id){
		$result = [];
		$post 	= $this->input->post();
		$kd_dosen = $this->session->userdata('username');


		if (empty($post['add_komen'])){
			 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Komentar Harus diisi !!</div></div>");
                redirect('dosen_materi/detail/'.strEncrypt($mtr_id));
			}else{
			
			$menu_data 	= [
						'nim'		=> $kd_dosen,
						'komentar'	=> $post['add_komen'],
						'id_balasan'=> '0',
						'mtr_id'	=> $mtr_id,
					  ];

			$role = $this->m_global->insert('komentar', $menu_data);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Komentar Berhasil di Tambahkan !!</div></div>");
                redirect('dosen_materi/detail/'.strEncrypt($mtr_id)); 
			} else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Komentar Gagal di Tambahkan !!</div></div>");
                redirect('dosen_materi/detail/'.strEncrypt($mtr_id));
			}
		}
	}

	public function add_balasan($mtr_id){
		$result = [];
		$post 	= $this->input->post();
		// $mtr 	= $this->input->post('mtr_id');
		$kd_dosen = $this->session->userdata('username');

		if (empty($post['add_balasan'])){
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Balasan Harus diisi !!</div></div>");
                redirect('dosen_materi/detail/'.strEncrypt($mtr_id));
		}else{
			$menu_data 	= [
						'nim'		=> $kd_dosen,
						'komentar'	=> $post['add_balasan'],
						'id_balasan'=> $post['id_bls'],
						'mtr_id'	=> $mtr_id,
					  ];
					
			$role = $this->m_global->insert('komentar', $menu_data);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Balasan Berhasil di Tambahkan !!</div></div>");
                redirect('dosen_materi/detail/'.strEncrypt($mtr_id)); 
			} else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Balasan Gagal di Tambahkan !!</div></div>");
                redirect('dosen_materi/detail/'.strEncrypt($mtr_id));
			}
	 	}
	}

	public function add($kd_mk=0, $kd_prodi=0, $offering=0, $a=0) {
		$data=array('title'=>'Tambah Data Materi',
					'isi'  =>'dosenpages/materi/add'
						);
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$data['a']=$a;
		
		$cond = $kd_prodi.$offering;
		switch ($cond) {
				//untuk PTI
		    case "PTINA":
		       	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'ptia'=>'0'],'*');
		        break;
		    case "PTINB":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'ptib'=>'0'],'*');
		        break;
		     case "PTINC":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'ptic'=>'0'],'*');
		        break;
		     case "PTIND":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'ptid'=>'0'],'*');
		        break;
		        //untuk PTE
		    case "PTELA":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'ptea'=>'0'],'*');
		        break;
		    case "PTELB":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'pteb'=>'0'],'*');
		        break;
		    case "PTELC":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'ptec'=>'0'],'*');
		        break;
		    case "PTELD":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'pted'=>'0'],'*');
		        break;
		        //untuk TI
		    case "NINFA":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'tia'=>'0'],'*');
		        break;
		    case "NINFB":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'tib'=>'0'],'*');
		        break;
		    case "NINFC":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'tic'=>'0'],'*');
		        break;
		    case "NINFD":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'tid'=>'0'],'*');
		        break;
		        //untuk TE
		    case "NTELA":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'tea'=>'0'],'*');
		        break;
		    case "NTELB":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'teb'=>'0'],'*');
		        break;
		    case "NTELC":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'tec'=>'0'],'*');
		        break;
		    case "NTELD":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'ted'=>'0'],'*');
		        break;
		     	//untuk d3 elka
		    case "NEKAA":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'deka'=>'0'],'*');
		        break;
		    case "NEKAB":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'dekb'=>'0'],'*');
		        break;
		    case "NEKAC":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'dekc'=>'0'],'*');
		        break;
		    case "NEKAD":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'dekd'=>'0'],'*');
		        break;
		     	//unutk d3 eltro
		    case "NTROA":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'dtra'=>'0'],'*');
		        break;
		    case "NTROB":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'dtrb'=>'0'],'*');
		        break;
		    case "NTROC":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'dtrc'=>'0'],'*');
		        break;
		    case "NTROD":
		      	$data['library'] = $this->m_global->get_data_all('lib_materi',null,['kd_dos'=>$username,'kode_mk'=>$kd_mk,'dtrd'=>'0'],'*');
		        break;
		    default:
		        echo "Forbidden";
		}
		
		$data['dosen'] = $username;
		$data['kd_mk'] = $kd_mk;
		$data['kd_prodi'] = $kd_prodi;
		$data['offering'] = $offering;
		$data['materi'] = $this->m_global->get_data_all('materi',null);
		$this->load->view('dosenlayout/wrapper',$data);
	}

	public function act_add(){
		$result = [];
		$post 	= $this->input->post();

		$username = $this->session->userdata('username');
		$data['dosen'] = $username;
		
		$this->form_validation->set_rules('pertemuan', 'Pertemuan', 'trim|required');
		$this->form_validation->set_rules('lib', 'Library', 'required');
		$this->form_validation->set_rules('kodemakul', 'Kode Matakuliah', 'required');
		$this->form_validation->set_rules('off', 'Offering', 'required');
		$this->form_validation->set_rules('kodeprodi', 'Kode prodi', 'required');


		if ($this->form_validation->run() == TRUE){
			// $tgl = tgl_indo($post['tgllahir']);
			$menu_data 	= [
						'kd_mk'		=> $post['kodemakul'],
						'kd_dosen'	=> $data['dosen'],
						'pertemuan'	=> $post['pertemuan'],
						'library_id'=> $post['lib'],
						'kd_prodi'	=> $post['kodeprodi'],
						'offering'	=> $post['off'],
					  ];
			
			$check= $this->m_global->count_data_all('materi',null,['kd_mk'=>$menu_data['kd_mk'],'kd_dosen'=>$menu_data['kd_dosen'],'kd_prodi'=>$menu_data['kd_prodi'], 'offering'=>$menu_data['offering'],'library_id'=>$menu_data['library_id']]);
			
			if($check!=1){
				$role = $this->m_global->insert('materi', $menu_data);
				$cond = $menu_data['kd_prodi'].$menu_data['offering'];
				switch ($cond) {
			//untuk PTI
		    case "PTINA":
		       	$update = $this->m_global->update('lib_materi',['ptia'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "PTINB":
		      	$update = $this->m_global->update('lib_materi',['ptib'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		     case "PTINC":
		      	$update = $this->m_global->update('lib_materi',['ptic'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		     case "PTIND":
		      	$update = $this->m_global->update('lib_materi',['ptid'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    //untuk PTE
		    case "PTELA":
		      	$update = $this->m_global->update('lib_materi',['ptea'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "PTELB":
		      	$update = $this->m_global->update('lib_materi',['pteb'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "PTELC":
		      	$update = $this->m_global->update('lib_materi',['ptec'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "PTELD":
		      	$update = $this->m_global->update('lib_materi',['pted'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    //untuk TI
		    case "NINFA":
		       	$update = $this->m_global->update('lib_materi',['tia'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NINFB":
		      	$update = $this->m_global->update('lib_materi',['tib'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		     case "NINFC":
		      	$update = $this->m_global->update('lib_materi',['tic'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		     case "NINFD":
		      	$update = $this->m_global->update('lib_materi',['tid'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    //untuk TE
		    case "NTELA":
		      	$update = $this->m_global->update('lib_materi',['tea'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NTELB":
		      	$update = $this->m_global->update('lib_materi',['teb'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NTELC":
		      	$update = $this->m_global->update('lib_materi',['tec'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NTELD":
		      	$update = $this->m_global->update('lib_materi',['ted'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    //untuk D3 ELKA
		    case "NEKAA":
		      	$update = $this->m_global->update('lib_materi',['deka'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NEKAB":
		      	$update = $this->m_global->update('lib_materi',['dekb'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NEKAC":
		      	$update = $this->m_global->update('lib_materi',['dekc'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NEKAD":
		      	$update = $this->m_global->update('lib_materi',['dekd'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    //untuk D3 ELtro
		    case "NTROA":
		      	$update = $this->m_global->update('lib_materi',['dtra'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NTROB":
		      	$update = $this->m_global->update('lib_materi',['dtrb'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NTROC":
		      	$update = $this->m_global->update('lib_materi',['dtrc'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    case "NTROD":
		      	$update = $this->m_global->update('lib_materi',['dtrd'=>'1'],['lib_id'=>$menu_data['library_id']]);
		        break;
		    default:
		        echo "Forbidden";
		}
				

				if($role) {
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Materi Berhasil di Upload !!</div></div>");
	                redirect('dosen_materi/daftar/'.$menu_data['kd_mk'].'/'.$menu_data['kd_prodi'].'/'.$menu_data['offering']); 
				} else {
	                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Materi Gagal di Upload !!</div></div>");
	                redirect('dosen_materi/daftar/'.$menu_data['kd_mk'].'/'.$menu_data['kd_prodi'].'/'.$menu_data['offering']);
				}
			}else{
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Materi Sudah Ada!!</div></div>");
	                redirect('dosen_materi/daftar/'.$menu_data['kd_mk'].'/'.$menu_data['kd_prodi'].'/'.$menu_data['offering']);
			}
			
			

		}
	}

	public function add_quiz($mtr_id) {
		$data=array('title'=>'Tambah Quiz',
					'isi'  =>'dosenpages/materi/quiz'
						);
		$data['materi'] = $this->m_global->get_data_all('materi', null, [strEncrypt('mtr_id', TRUE) => $mtr_id]);
		$data['mtr_id'] = $mtr_id;
		$kd_dosen = $this->session->userdata('username');
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);
	}
	
	public function quiz_act_edit($mtr_id)
	{
		$result = [];
		$post 	= $this->input->post();
		
		$this->form_validation->set_rules('quiz', 'Quiz', 'trim|required');
				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'kuis'		=> $post['quiz'],
					  ];
			
			$role = $this->m_global->update('materi', $menu_data, [strEncrypt('mtr_id', TRUE) => $mtr_id]);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Quiz berhasil di Tambahkan !!</div></div>");
               	redirect('dosen_materi'); 
			} else {
            	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Quiz Gagal di Tambahkan !!</div></div>");
                redirect('dosen_materi');
			}
		}
	}	

	public function edit($mtr_id) {
		$data=array('title'=>'Edit Data Mengajar',
					'isi'  =>'dosenpages/materi/edit'
						);
		$data['materi'] = $this->m_global->get_data_all('materi', null, [strEncrypt('mtr_id', TRUE) => $mtr_id]);
		$data['mtr_id'] = $mtr_id;
		$kd_dosen = $this->session->userdata('username');
		$username = $this->session->userdata('username');
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);
	}

	public function act_edit($mtr_id)
	{
		$result = [];
		$post 	= $this->input->post();
		
		$this->form_validation->set_rules('kd_mk', 'Kode Matakuliah', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('kd_dosen', 'Kode Dosen', 'trim|required');
		$this->form_validation->set_rules('pertemuan', 'Pertemuan', 'trim|required');
		$this->form_validation->set_rules('judul', 'Judul', 'trim|required');
		$this->form_validation->set_rules('materi', 'Materi', 'trim|required');

				
		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'kd_mk'		=> $post['kd_mk'],
						'kd_dosen'	=> $post['kd_dosen'],
						'pertemuan'	=> $post['pertemuan'],
						'judul'		=> $post['judul'],
						'materi'	=> $post['materi'],
					  ];
			
			$role = $this->m_global->update('materi', $menu_data, [strEncrypt('mtr_id', TRUE) => $mtr_id]);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Materi Berhasil di Rubah !!</div></div>");
               	redirect('dosen_materi'); 
			} else {
            	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Materi Gagal di Rubah !!</div></div>");
                redirect('dosen_materi');
			}
		}
	}

	public function cek_tugas($mtr_id) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Tugas',
					'isi'  =>'dosenpages/materi/tugas'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['tugas'] = $this->m_global->get_data_all('file',null,['mtr_id' => $mtr_id]);
		$data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
		$this->load->view('dosenlayout/wrapper',$data);	
	}

	public function tgsnil($fil_id=0)
	{
		$result = [];
		$post 	= $this->input->post();
		
		$this->form_validation->set_rules('nilai', 'Kode Dosen', 'trim|required');
		$this->form_validation->set_rules('feedback', 'Pertemuan', 'trim|required');
		
		$mtr_id = $post['mtr'];

		if ($this->form_validation->run() == TRUE){
			$menu_data 	= [
						'nilai'		=> $post['nilai'],
						'feedback'	=> $post['feedback'],
					  ];
			
			$role = $this->m_global->update('file', $menu_data, ['fil_id'=> $fil_id]);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Nilai Berhasil di Masukkan !!</div></div>");
               	redirect('dosen_materi/cek_tugas/'.$mtr_id.''); 
			} else {
            	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Nilai Gagal di Masukkan !!</div></div>");
                redirect('dosen_materi');
			}
		}
	}

	public function download($nm_file){   
    
    	$data = file_get_contents(base_url().'assets/file/');    
    	//$name = $nm_file;
    	
    	force_download($nm_file, $data);
  	}

  	public function updel($mtr_id=0,$kd_mk=0,$kd_prodi=0,$offering=0,$library_id=0,$cond=0) {
		
		$cond = $kd_prodi.$offering;

		switch ($cond) {
			//UNTUK PTI
		    case "PTINA":
		       	$update = $this->m_global->update('lib_materi',['ptia'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "PTINB":
		      	$update = $this->m_global->update('lib_materi',['ptib'=>'0'],['lib_id'=>$library_id]);
		        break;
		     case "PTINC":
		      	$update = $this->m_global->update('lib_materi',['ptic'=>'0'],['lib_id'=>$library_id]);
		        break;
		     case "PTIND":
		      	$update = $this->m_global->update('lib_materi',['ptid'=>'0'],['lib_id'=>$library_id]);
		        break;
		    //UNTUK PTE
		    case "PTELA":
		      	$update = $this->m_global->update('lib_materi',['ptea'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "PTELB":
		      	$update = $this->m_global->update('lib_materi',['pteb'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "PTELC":
		      	$update = $this->m_global->update('lib_materi',['ptec'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "PTELD":
		      	$update = $this->m_global->update('lib_materi',['pted'=>'0'],['lib_id'=>$library_id]);
		        break;
		    //untuk TI
		    case "NINFA":
		       	$update = $this->m_global->update('lib_materi',['tia'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NINFB":
		      	$update = $this->m_global->update('lib_materi',['tib'=>'0'],['lib_id'=>$library_id]);
		        break;
		     case "NINFC":
		      	$update = $this->m_global->update('lib_materi',['tic'=>'0'],['lib_id'=>$library_id]);
		        break;
		     case "NINFD":
		      	$update = $this->m_global->update('lib_materi',['tid'=>'0'],['lib_id'=>$library_id]);
		        break;
		    //untuk TE
		    case "NTELA":
		      	$update = $this->m_global->update('lib_materi',['tea'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NTELB":
		      	$update = $this->m_global->update('lib_materi',['teb'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NTELC":
		      	$update = $this->m_global->update('lib_materi',['tec'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NTELD":
		      	$update = $this->m_global->update('lib_materi',['ted'=>'0'],['lib_id'=>$library_id]);
		        break;
		    //untuk D3 ELKA
		    case "NEKAA":
		      	$update = $this->m_global->update('lib_materi',['deka'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NEKAB":
		      	$update = $this->m_global->update('lib_materi',['dekb'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NEKAC":
		      	$update = $this->m_global->update('lib_materi',['dekc'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NEKAD":
		      	$update = $this->m_global->update('lib_materi',['dekd'=>'0'],['lib_id'=>$library_id]);
		        break;
		    //untuk D3 ELtro
		    case "NTROA":
		      	$update = $this->m_global->update('lib_materi',['dtra'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NTROB":
		      	$update = $this->m_global->update('lib_materi',['dtrb'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NTROC":
		      	$update = $this->m_global->update('lib_materi',['dtrc'=>'0'],['lib_id'=>$library_id]);
		        break;
		    case "NTROD":
		      	$update = $this->m_global->update('lib_materi',['dtrd'=>'0'],['lib_id'=>$library_id]);
		        break;
		    default:
		        echo "Forbidden";
		}

		$del = $this->m_global->delete('materi',['mtr_id'=>$mtr_id]);		
		
		if($update) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Materi berhasil di Hapus !!</div></div>");
               	redirect('dosen_materi/daftar/'.$kd_mk.'/'.$kd_prodi.'/'.$offering.''); 
			} else {
            	$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Nilai Gagal di Hapus !!</div></div>");
                redirect('dosen_materi/daftar/'.$kd_mk.'/'.$kd_prodi.'/'.$offering.'');
			}		
	} 
}