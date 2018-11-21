<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dosen_soal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	  $this->load->model('SecurityModel');
		$this->load->model('M_login');
    $this->load->model('Data_model');	   
	  $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->helper('download');
		//Do your magic here
	}
	
  public function index() {
    $this->SecurityModel->level_empty();

    $status = $this->session->userdata('$level');

    $data=array('title'=>'Upload Soal',
          'isi'  =>'dosenpages/soal/index'
            );
    $data['login']  = $this->m_global->get_data_all('user', null, ['level'=>$status]);
    $username = $this->session->userdata('username');
    
    $data['un'] = $username;
    $data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
    $data['mkul'] = $this->m_global->get_data_all('mengajar',[['matkul','matkul.kd_mk = mengajar.kd_mku','inner']],['kd_dosen'=>$username],'*',null,null,0,null,'kd_mk');
    $this->load->view('dosenlayout/wrapper',$data); 
  }

  public function view(){
    $this->SecurityModel->level_empty();

    $status = $this->session->userdata('$level');

    $data=array('title'=>'Upload Soal',
          'isi'  =>'dosenpages/soal/view'
            );
    $data['login']  = $this->m_global->get_data_all('user', null, ['level'=>$status]);
    $username = $this->session->userdata('username');
    
    $data['un'] = $username;
    $data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);

    $result = [];
    $post   = $this->input->post();
    $kd_mku     = $post['kodemakul'];
    $kd_prodi   = $post['prodi'];
    $pertemuan  = $post['pertemuan'];
    $jenis      = $post['jenis'];
    
    $data['eval'] = $this->m_global->get_data_all('evaluasi',null,['kd_mk'=>$kd_mku,'kd_dosen'=>$username,'kd_prodi'=>$kd_prodi, 'pertemuan'=>$pertemuan, 'jenis'=>$jenis]);

    $this->load->view('dosenlayout/wrapper',$data); 
  }

	public function add() {
    $this->SecurityModel->level_empty();

    $status = $this->session->userdata('$level');

		$data=array('title'=>'Upload Soal',
					'isi'  =>'dosenpages/soal/add'
						);
		$data['login']	= $this->m_global->get_data_all('user', null, ['level'=>$status]);
		$username = $this->session->userdata('username');
    
    $data['un'] = $username;
    $data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
    $data['mkul'] = $this->m_global->get_data_all('mengajar',[['matkul','matkul.kd_mk = mengajar.kd_mku','inner']],['kd_dosen'=>$username],'*',null,null,0,null,'kd_mk');
		$this->load->view('dosenlayout/wrapper',$data);	
	}

  public function form() {

    $this->SecurityModel->level_empty();

    $status = $this->session->userdata('$level');

    $data=array('title'=>'Upload Soal',
          'isi'  =>'dosenpages/soal/form'
            );
    $data['login']  = $this->m_global->get_data_all('user', null, ['level'=>$status]);
    $username = $this->session->userdata('username');
    $data['un'] = $username;
    $data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
   
    $result = [];
    $post   = $this->input->post();

    $data['kd_m']   = $post['kodemakul'];
    $data['kd_do']  = $post['kodedos'];
    $data['pro']    = $post['prodi'];
    $data['per']    = $post['pertemuan'];
    $data['jen']    = $post['jenis'];
    $data['jum']    = $post['jumlah'];
  
    $this->load->view('dosenlayout/wrapper',$data); 
  }

  public function act_add() {
  $result = [];
  $post   = $this->input->post();
  $jml= $post['jumlah'];
 
  for ($a=1; $a<=$jml; $a++) {
    $result[]= array(
      'kd_mk'     => $post['kodemakul'.$a],
      'kd_dosen'  => $post['kodedos'.$a],
      'kd_prodi'  => $post['prodi'.$a],
      'pertemuan' => $post['pertemuan'.$a],
      'jenis'     => $post['jenis'.$a],
      'tujuan'    => $post['tujuan'.$a],
      'soal'      => $post['soal'.$a],
      'a'         => $post['jawabana'.$a],
      'b'         => $post['jawabanb'.$a],
      'c'         => $post['jawabanc'.$a],
      'd'         => $post['jawaband'.$a],
      'e'         => $post['jawabane'.$a],
      'kunci'     => $post['kunci'.$a],
    );
   } 
 
    $role = $this->db->insert_batch('evaluasi', $result); // fungsi  untuk menyimpan multi array ke database
    
    if($role) {
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\"> Data soal berhasil diupload!!</div></div>");
         redirect('dosen_soal');  
      } else {
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\"> Data soal gagal diupload!!</div></div>");
        redirect('dosen_soal');
      }
   }

   public function edit($eva_id) {
    $data=array('title'=>'Edit Soal',
          'isi'  =>'dosenpages/soal/edit'
            );
    $data['eval'] = $this->m_global->get_data_all('evaluasi', null, [strEncrypt('eva_id', TRUE) => $eva_id]);
    $data['eva_id'] = $eva_id;
    $kd_dosen = $this->session->userdata('username');
    $username = $this->session->userdata('username');
    $data['profil']=$this->m_global->get_data_all('dosen',null, ['kd_dosen'=>$username]);
    $this->load->view('dosenlayout/wrapper',$data);
  }

  public function act_edit($eva_id)
  {
    $result = [];
    $post   = $this->input->post();
    
    $this->form_validation->set_rules('soal', 'Soal', 'trim|required');
    $this->form_validation->set_rules('jawabana', 'Jawaban', 'trim|required');
    $this->form_validation->set_rules('jawabanb', 'Jawaban', 'trim|required');
    $this->form_validation->set_rules('jawabanc', 'Jawaban', 'trim|required');
    $this->form_validation->set_rules('jawaband', 'Jawaban', 'trim|required');
    $this->form_validation->set_rules('jawabane', 'Jawaban', 'trim|required');

        
    if ($this->form_validation->run() == TRUE){
      $menu_data  = [
      'soal'      => $post['soal'],
      'a'         => $post['jawabana'],
      'b'         => $post['jawabanb'],
      'c'         => $post['jawabanc'],
      'd'         => $post['jawaband'],
      'e'         => $post['jawabane'],
      'kunci'     => $post['kunci']
    ];
      
      $role = $this->m_global->update('evaluasi', $menu_data, [strEncrypt('eva_id', TRUE) => $eva_id]);

      if($role) {
        $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Soal Berhasil di Rubah !!</div></div>");
                redirect('dosen_soal'); 
      } else {
              $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Soal Gagal di Rubah !!</div></div>");
                redirect('dosen_soal');
      }
    }
  }

}