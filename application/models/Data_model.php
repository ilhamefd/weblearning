<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_model extends CI_Model {

    public $table = 'evaluasi';
    public $id = 'eva_id';
    public $order = 'DESC';

    function __construct() {
        parent::__construct();
    }

    //ini untuk memasukkan kedalam tabel pegawai
    function loaddata($dataarray) {
        for ($i = 1; $i < count($dataarray); $i++) {
            $data = array(
                "kd_mk"     => $dataarray[$i]['kd_mk'],
                "kd_dosen"  => $dataarray[$i]['kd_dosen'],
                "kd_prodi"  => $dataarray[$i]['kd_prodi'], 
                "offering"  => $dataarray[$i]['offering'],
                "pertemuan" => $dataarray[$i]['pertemuan'],
                "jenis"     => $dataarray[$i]['jenis'],
                "soal"      => $dataarray[$i]['soal'],
                "a"         => $dataarray[$i]['a'],
                "b"         => $dataarray[$i]['b'],
                "c"         => $dataarray[$i]['c'],
                "d"         => $dataarray[$i]['d'],
                "e"         => $dataarray[$i]['e'],
                "kunci"     => $dataarray[$i]['kunci'],
            );

            //ini untuk menambahkan apakah dalam tabel sudah ada data yang sama
            //apabila data sudah ada maka data di-skip
            // saya contohkan kalau ada data nama yang sama maka data tidak dimasukkan
            $role = $this->db->insert($this->table, $data);

            if($role) {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-success fade in\" id=\"alert\">Soal Berhasil di Tambahkan !!</div></div>");
                //redirect('dosen_materi/detail/'.strEncrypt($mtr_id)); 
            } else {
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Soal Gagal di Tambahkan !!</div></div>");
                //redirect('dosen_materi/detail/'.strEncrypt($mtr_id));
            }
        }
    }
}