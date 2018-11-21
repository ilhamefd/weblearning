<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
    {
      parent::__construct();
      
      // session_start();
      $this->load->model('m_login');
      $this->load->model('m_global');
      $this->load->helper('tglindo_helper');
      $username = $this->session->userdata('username');   
    }

  public function index(){
     
      $data=array('title'=>'Home',
          'isi'  =>'cmpages/login/index'
          );

      $this->load->view('cmlayout/wrapper',$data);
  }

  function in()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    date_default_timezone_set('Asia/Jakarta');

    $tgl = tgl_indo(date('Y/m/d'));
    $hari = nama_hari();
    $jam = date('H:i');
    $data = array(
      'username'  => $username,
      'time'      => $hari.', '.$tgl.', '.$jam,
      'keterangan'=> 'login',
      );
    $this->m_global->insert('log_umum',$data);

    $this->m_login->cek($username, $password);

    
  }

  function out()
  {
    date_default_timezone_set('Asia/Jakarta');
    $username = $this->session->userdata('username');
    $tgl = tgl_indo(date('Y/m/d'));
    $hari = nama_hari();
    $jam = date('H:i');
    $data = array(
      'username'  => $username,
      'time'      => $hari.', '.$tgl.', '.$jam,
      'keterangan'=> 'logout',
      );
    $this->m_global->insert('log_umum',$data); 
    
    $this->session->sess_destroy();
    redirect('Login');
  }
}