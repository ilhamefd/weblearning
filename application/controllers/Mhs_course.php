<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mhs_course extends CI_Controller {
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

		$data=array('title'=>'Course',
					'isi'  =>'mhspages/course/index'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);
		$data['ambmk'] = $this->m_global->get_data_all('ambilmk',[['matkul','matkul.kd_mk = ambilmk.kd_mk','inner']], ['nim'=>$username]);
		
		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function add() {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Tambah Course',
					'isi'  =>'mhspages/course/add'
						);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$data['ambmk'] = $this->m_global->get_data_all('mengajar',[['matkul','matkul.kd_mk = mengajar.kd_mku','inner']]);
		
		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function act_add($kd_mk = 0, $kd_dosen = 0, $kd_prodi=0, $offering=0){
		$result = [];
		$post 	= $this->input->post();
		
		$banding = [
					'kd_mk'			=> $kd_mk,
					'nim'			=> $this->session->userdata('username'),
		];

		$menu_data 	= [
					'kd_mk'			=> $kd_mk,
					'nim'			=> $this->session->userdata('username'),
					'kd_dosen'		=> $kd_dosen,
					'kd_prodi'		=> $kd_prodi,
					'offering'		=> $offering,
					'konfirmasi'	=> 'yes',
				  ];
		//hitung dari tabel ambil mk jika satu maka reject
		$data['hitung'] = $this->m_global->count_data_all('ambilmk', null, $banding);
		
		if($data['hitung']!='0'){
			  $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Course Sudah diambil !!</div></div>");
  	            redirect('mhs_course');
		}else{
			 $this->m_global->insert('ambilmk', $menu_data);
			 $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success\" id=\"alert\">Course Berhasil di Tambahkan !!</div></div>");
                 redirect('mhs_course');
		}
	}

	public function daftar($kd_mk=0, $kd_dosen =0, $kd_prodi=0, $offering=0) {
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Materi',
					'isi'  =>'mhspages/course/list'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

		$data['materi'] = $this->m_global->get_data_all('materi',[['lib_materi','lib_materi.lib_id = materi.library_id','inner']],['kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen, 'kd_prodi'=>$kd_prodi, 'offering'=>$offering],'*',null,['pertemuan','asc']);
		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function quiz($kd_mk=0, $kd_dosen=0, $kd_prodi=0, $offering=0, $pertemuan=0, $kuis=0){
		$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');
      	$username = $this->session->userdata('username');
      	
      	$data['cek'] =$this->m_global->count_data_all('log_kuis', null, ['username'=>$username ,'kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen,'kd_prodi'=>$kd_prodi, 'pertemuan'=>$pertemuan,'kuis'=>$kuis]);
		
		if($data['cek']!='0'){
			$data=array('title'=>'Quiz',
					'isi'  =>'mhspages/course/infoquiz'
						);
			$username = $this->session->userdata('username');
			$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

			$this->load->view('mhslayout/wrapper',$data);
		}else{     

			$data=array('title'=>'Quiz',
						'isi'  =>'mhspages/course/quiz'
							);
			$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
			$username = $this->session->userdata('username');
			$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

			$data['soal'] = $this->m_global->get_data_all('evaluasi',null,['kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen, 'kd_prodi'=>$kd_prodi, 'pertemuan' => $pertemuan, 'jenis' => $kuis], '*',  null, ['eva_id', 'random'] );
			
			$data['jumlah'] = $this->m_global->count_data_all('evaluasi',null,['kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen, 'pertemuan' => $pertemuan, 'kd_prodi'=>$kd_prodi, 'jenis' => $kuis]);
			$data['mk'] = $kd_mk;
			$data['dos'] = $kd_dosen;
			$data['prod'] = $kd_prodi;
			$data['off'] = $offering;
			$data['pert'] = $pertemuan;
			$data['quiz'] = $kuis;

			$this->load->view('mhslayout/wrapper',$data);
		}	
	}

	public function correct_quiz(){
		$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');


		$data=array('title'=>'Quiz',
					'isi'  =>'mhspages/course/correctquiz'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

		$result  = [];
		$post 	 = $this->input->post();
		$id 	 = $post['id']; 
		$pilihan = $post['pilihan']; 
		$jumlah  = $post['jumlah'];
		
		$score=0;
		$benar=0;
		$salah=0;
		$kosong=0;
			for($i=0;$i<$jumlah;$i++){
				$nomor=$id[$i];
				if(empty($pilihan[$nomor])){
					$kosong++;
					}else{
					$jawaban=$pilihan[$nomor];
				$sambung=$this->m_global->get_data_all('evaluasi',null,['eva_id'=>$nomor,'kunci'=>$jawaban]);
				$cek=$this->m_global->count_data_all('evaluasi',null,['eva_id'=>$nomor,'kunci'=>$jawaban]);
					if($cek){
						$benar++;
						}
						else{
						$salah++;
						}
					}
					$score=$benar/$jumlah*100;
				}
		$nim = $this->session->userdata('username');
	
		$data_nilai = [
			'nim'		=> $nim,
			'kd_mk'		=> $post['kd_mk'],
			'kd_dosen'	=> $post['kd_dosen'],
			'kd_prodi'	=> $post['kd_prodi'],
			'offering'	=> $post['offering'],
			'pertemuan' => $post['pertemuan'],
			'jenis'		=> $post['quiz'],
			'nilai' 	=> round($score)
		];

		$this->m_global->insert('nilai', $data_nilai);
		
		date_default_timezone_set('Asia/Jakarta');
	    $tgl  = tgl_indo(date('Y/m/d'));
   		$hari = nama_hari();
    	$jam  = date('H:i');

		$log_pretes = [
			'username'	=> $nim,
			'kd_mk'		=> $post['kd_mk'],
			'kd_dosen'	=> $post['kd_dosen'],
			'pertemuan'	=> $post['pertemuan'],
			'kd_prodi'	=> $post['kd_prodi'],
			'offering'	=> $post['offering'],
			'kuis'		=> $post['quiz'],
			'time'		=> $hari.', '.$tgl.', '.$jam,
			'keterangan'=> 'selesai',
		];

		$this->m_global->insert('log_kuis',$log_pretes);

		$data['benar']  = $benar;
		$data['salah']  = $salah;
		$data['kosong'] = $kosong;
		$data['score']  = round($score);
		if(round($score)>=75) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Selamat anda dapat melanjutkan pembelajaran berikutnya!!</div></div>");
               
			} else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Nilai Kurang, Anda harus belajar lebih giat lagi!!</div></div>");

			}
		$this->load->view('mhslayout/wrapper',$data);	
	}



	public function pre($kd_mk=0, $kd_dosen=0, $kd_prodi=0, $offering=0, $pertemuan=0){
		$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');
      	$username = $this->session->userdata('username');
      	
      	$data['cek'] =$this->m_global->count_data_all('log_pre', null, ['username'=>$username ,'kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen,'kd_prodi'=>$kd_prodi, 'pertemuan'=>$pertemuan]);
      	
     	//$data['ceksoal'] = $this->m_global->count_data_all('evaluasi',null,['kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen, 'pertemuan' => $pertemuan, 'kd_prodi'=>$kd_prodi, 'jenis' => 'pre']);
		
		
		if($data['cek']!='0'){
			$data=array('title'=>'Pre-Test',
					'isi'  =>'mhspages/course/infopre'
						);
			$username = $this->session->userdata('username');
			$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

			$this->load->view('mhslayout/wrapper',$data);
		}else{     

			$data=array('title'=>'Pre-Test',
						'isi'  =>'mhspages/course/pretest'
							);
			$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
			$username = $this->session->userdata('username');
			$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

			$data['soal'] = $this->m_global->get_data_all('evaluasi',null,['kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen, 'pertemuan' => $pertemuan, 'kd_prodi'=>$kd_prodi, 'jenis' => 'prepos'],'*',null, ['tujuan', 'random'],0,10);

			//$data['soal'] = $this->m_global->get_data_all('evaluasi',null,['kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen, 'pertemuan' => $pertemuan, 'kd_prodi'=>$kd_prodi, 'jenis' => 'pre'], '*',  null, ['eva_id', 'random'] );
			
			$data['jumlah'] = '10';
			$data['mk'] = $kd_mk;
			$data['dos'] = $kd_dosen;
			$data['prod'] = $kd_prodi;
			$data['off'] = $offering;
			$data['pert'] = $pertemuan;

			$this->load->view('mhslayout/wrapper',$data);
			}	
	}

	public function correct_pre(){
		$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');


		$data=array('title'=>'Pre-Test',
					'isi'  =>'mhspages/course/correctpre'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

		$result  = [];
		$post 	 = $this->input->post();
		$id 	 = $post['id']; 
		$pilihan = $post['pilihan']; 
		$jumlah  = $post['jumlah'];

		$score=0;
		$benar=0;
		$salah=0;
		$kosong=0;
			for($i=0;$i<$jumlah;$i++){
				$nomor=$id[$i];
				if(empty($pilihan[$nomor])){
					$kosong++;
					}else{
					$jawaban=$pilihan[$nomor];
				$sambung=$this->m_global->get_data_all('evaluasi',null,['eva_id'=>$nomor,'kunci'=>$jawaban]);
				$cek=$this->m_global->count_data_all('evaluasi',null,['eva_id'=>$nomor,'kunci'=>$jawaban]);
					if($cek){
						$benar++;
						}
						else{
						$salah++;
						}
					}
					$score=$benar/$jumlah*100;
				}
		$nim = $this->session->userdata('username');
	
		$data_nilai = [
			'nim'		=> $nim,
			'kd_mk'		=> $post['kd_mk'],
			'kd_dosen'	=> $post['kd_dosen'],
			'kd_prodi'	=> $post['kd_prodi'],
			'offering'	=> $post['offering'],
			'pertemuan' => $post['pertemuan'],
			'jenis'		=> 'pre',
			'nilai' 	=> round($score)
		];

		$this->m_global->insert('nilai', $data_nilai);
		
		date_default_timezone_set('Asia/Jakarta');
	    $tgl  = tgl_indo(date('Y/m/d'));
   		$hari = nama_hari();
    	$jam  = date('H:i');

		$log_pretes = [
			'username'	=> $nim,
			'kd_mk'		=> $post['kd_mk'],
			'kd_dosen'	=> $post['kd_dosen'],
			'pertemuan'	=> $post['pertemuan'],
			'kd_prodi'	=> $post['kd_prodi'],
			'offering'	=> $post['offering'],
			'time'		=> $hari.', '.$tgl.', '.$jam,
			'keterangan'=> 'selesai',
		];

		$this->m_global->insert('log_pre',$log_pretes);

		$data['benar']  = $benar;
		$data['salah']  = $salah;
		$data['kosong'] = $kosong;
		$data['score']  = round($score);
		if(round($score)>=75) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Selamat anda dapat melanjutkan pembelajaran berikutnya!!</div></div>");
               
			} else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Nilai kurang, Anda harus belajar lebih giat lagi!!</div></div>");

			}
		
		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function pos($kd_mk=0, $kd_dosen = 0, $kd_prodi=0, $offering=0, $pertemuan = 0){
		$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');
      	$username = $this->session->userdata('username');
      	
      	$data['cek'] =$this->m_global->count_data_all('log_pos', null, ['username'=>$username ,'kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen,'kd_prodi'=>$kd_prodi, 'pertemuan'=>$pertemuan]);
      	
      	if($data['cek']!='0'){
      		$data=array('title'=>'Post-Test',
					'isi'  =>'mhspages/course/infopos'
						);
			$username = $this->session->userdata('username');
			$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

			$this->load->view('mhslayout/wrapper',$data);
      	}else{
			$data=array('title'=>'Post-Test',
						'isi'  =>'mhspages/course/postest'
							);
			$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
			$username = $this->session->userdata('username');
			$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

			$data['soal'] = $this->m_global->get_data_all('evaluasi',null,['kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen, 'pertemuan' => $pertemuan, 'kd_prodi'=>$kd_prodi, 'jenis' => 'prepos'],'*',null, ['tujuan', 'random'],0,10);

			// $data['soal'] = $this->m_global->get_data_all('evaluasi',null,['kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen, 'pertemuan' => $pertemuan, 'kd_prodi'=>$kd_prodi, 'jenis' => 'prepos'], '*',  null, ['eva_id', 'random'] );
			
			//$data['jumlah'] = $this->m_global->count_data_all('evaluasi',null,['kd_mk'=>$kd_mk, 'kd_dosen'=>$kd_dosen, 'kd_prodi'=>$kd_prodi, 'pertemuan' => $pertemuan, 'jenis' => 'pos']);

			$data['jumlah'] = '10';
			$data['mk'] = $kd_mk;
			$data['dos'] = $kd_dosen;
			$data['prod'] = $kd_prodi;
			$data['off'] = $offering;
			$data['pert'] = $pertemuan;
			$this->load->view('mhslayout/wrapper',$data);
		}	
	}

	public function correct_pos(){
		$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Post-Test',
					'isi'  =>'mhspages/course/correctpos'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);

		$result  = [];
		$post 	 = $this->input->post();
		$id 	 = $post['id']; 
		$pilihan = $post['pilihan']; 
		$jumlah  = $post['jumlah'];

		$score=0;
		$benar=0;
		$salah=0;
		$kosong=0;
			for($i=0;$i<$jumlah;$i++){
				$nomor=$id[$i];
				if(empty($pilihan[$nomor])){
					$kosong++;
					}else{
					$jawaban=$pilihan[$nomor];
				$sambung=$this->m_global->get_data_all('evaluasi',null,['eva_id'=>$nomor,'kunci'=>$jawaban]);
				$cek=$this->m_global->count_data_all('evaluasi',null,['eva_id'=>$nomor,'kunci'=>$jawaban]);
					if($cek){
						$benar++;
						}
						else{
						$salah++;
						}
					}
					$score=$benar/$jumlah*100;
				}
		$nim = $this->session->userdata('username');
	
		$data_nilai = [
			'nim'		=> $nim,
			'kd_mk'		=> $post['kd_mk'],
			'kd_dosen'	=> $post['kd_dosen'],
			'pertemuan' => $post['pertemuan'],
			'kd_prodi'	=> $post['kd_prodi'],
			'offering'	=> $post['offering'],
			'jenis'		=> 'pos',
			'nilai' 	=> round($score)
		];

		$this->m_global->insert('nilai', $data_nilai);

		date_default_timezone_set('Asia/Jakarta');
	    $tgl  = tgl_indo(date('Y/m/d'));
   		$hari = nama_hari();
    	$jam  = date('H:i');

		$log_postes = [
			'username'	=> $nim,
			'kd_mk'		=> $post['kd_mk'],
			'kd_dosen'	=> $post['kd_dosen'],
			'kd_prodi'	=> $post['kd_prodi'],
			'offering'	=> $post['offering'],
			'pertemuan'	=> $post['pertemuan'],
			'time'		=> $hari.', '.$tgl.', '.$jam,
			'keterangan'=> 'selesai',
		];

		$this->m_global->insert('log_pos',$log_postes);
		
		$data['benar']  = $benar;
		$data['salah']  = $salah;
		$data['kosong'] = $kosong;
		$data['score']  = round($score);
		if(round($score)>=75) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Selamat anda dapat melanjutkan pembelajaran berikutnya!!</div></div>");
               
			} else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Nilai Kurang, Anda harus belajar lebih giat lagi!!</div></div>");

			}
		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function detail($mtr_id=0) {//perlu ditambahkan id library untuk menampilkan judul
      	$this->SecurityModel->level_empty();

      	$status = $this->session->userdata('$level');

		$data=array('title'=>'Data Materi',
					'isi'  =>'mhspages/course/detail'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
		$data['profil'] = $this->m_global->get_data_all('mahasiswa', null, ['nim'=>$username]);
		
		
		//Menampilkan materi komentar serta balasan
		$data['materi'] = $this->m_global->get_data_all('materi',[['lib_materi','lib_materi.lib_id=materi.library_id','inner']],['mtr_id' => $mtr_id]);
		$data['komentar'] = $this->m_global->get_data_all('komentar',null,['mtr_id' => $mtr_id,'id_balasan'=>'0'], '*',  null, ['id_komen', 'desc'] );
		$data['balasan'] = $this->m_global->get_data_all('komentar',null,['mtr_id' => $mtr_id,'id_balasan <>'=>'0'], '*',  null, ['id_komen', 'desc'] );
		
		//Membuat log baca materi
		date_default_timezone_set('Asia/Jakarta');
	    $tgl  = tgl_indo(date('Y/m/d'));
   		$hari = nama_hari();
    	$jam  = date('H:i');
    	$data_log = array(
      		'username'  => $username,
      		'mtr_id'	=> $mtr_id,
      		'time'      => $hari.', '.$tgl.', '.$jam,
      		'keterangan'=> 'dibaca',
      	);
    	$this->m_global->insert('log_materi',$data_log);

		$this->load->view('mhslayout/wrapper',$data);	
	}

	public function add_komen($mtr_id){
		$result = [];
		$post 	= $this->input->post();
		$nim = $this->session->userdata('username');

		// $this->form_validation->set_rules('add_komen', 'Kolom Komentar', 'trim|required');

		if (empty($post['add_komen'])){
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Komentar Harus diisi !!</div></div>");
                redirect('mhs_course/detail/'.$mtr_id);
		}else{
			// $tgl = tgl_indo($post['tgllahir']);
			$menu_data 	= [
						'nim'		=> $nim,
						'komentar'	=> $post['add_komen'],
						'id_balasan'=> '0',
						'mtr_id'	=> $mtr_id,
					  ];

			$role = $this->m_global->insert('komentar', $menu_data);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Komentar Berhasil di Tambahkan !!</div></div>");
                redirect('mhs_course/detail/'.$mtr_id); 
			} else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Komentar Gagal di Tambahkan !!</div></div>");
                redirect('mhs_course/detail/'.$mtr_id);
			}
		}
	}

	public function add_balasan($mtr_id){
		$result = [];
		$post 	= $this->input->post();
		//$mtr 	= $this->input->post('mtr_id');
		$nim = $this->session->userdata('username');

		if (empty($post['add_balasan'])){
			$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Balasan Harus diisi !!</div></div>");
                redirect('mhs_course/detail/'.$mtr_id);
		}else{
			$menu_data 	= [
						'nim'		=> $nim,
						'komentar'	=> $post['add_balasan'],
						'id_balasan'=> $post['id_bls'],
						'mtr_id'	=> $mtr_id,
					  ];
					
			$role = $this->m_global->insert('komentar', $menu_data);

			if($role) {
				$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Balasan Berhasil di Tambahkan !!</div></div>");
                redirect('mhs_course/detail/'.$mtr_id); 
			} else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Balasan Gagal di Tambahkan !!</div></div>");
                redirect('mhs_course/detail/'.$mtr_id);
			}
	 	}
	}
	
	public function batalkan($abl_id) {
		$abl_id=$this->input->post('abl_id');
		$data['course'] = $this->m_global->delete('ambilmk',['abl_id'=>$abl_id]);
		
	}

	public function submit_tgs($mtr_id){
		$nim = $this->session->userdata('username');
		date_default_timezone_set('Asia/Jakarta');
	    $tgl  = tgl_indo(date('Y/m/d'));
   		$hari = nama_hari();
    	$jam  = date('H:i');

		$this->load->library('upload');
        $nmfile = "file_tugas_".$nim; //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './assets/file'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp|rar|zip|pdf|docx|pptx|xlsx|pkt'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '80000'; //maksimum besar file 2M
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->overwrite = true;
        $this->upload->initialize($config);

        if($_FILES['img']['name'])
        {
            if ($this->upload->do_upload('img'))
            {
                $gbr = $this->upload->data();
                $data = array(
                	'mtr_id'	=>$mtr_id,
                	'nim'		=>$nim,
                 	'nm_file'	=>$gbr['file_name'],
                 	'time'      => $hari.', '.$tgl.', '.$jam,
                );
                
                $this->m_global->insert('file',$data); //akses model untuk menyimpan ke database
                //pesan yang muncul jika berhasil diupload pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Tugas berhasil dikumpulkan !!</div></div>");
                redirect('mhs_course/detail/'.$mtr_id); //jika berhasil maka akan ditampilkan view vupload
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal mengumpulkan tugas !!</div></div>");
                redirect('mhs_course/detail/'.$mtr_id); //jika gagal maka akan ditampilkan form upload
            }
        }
	}

}