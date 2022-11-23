<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Login extends CI_Controller {
        function __construct(){
            parent::__construct();		
            $this->load->model('Login_Model');
            $this->load->model('Jadwal_Model');
            $this->load->model('Tools_Model');
	}
 
	function index(){
            $this->load->view('v_login');
	}
 
	function aksi_login(){
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $where = array(
                'user_pengajar' => $username,
                'pass_pengajar' => ($password),
                'status_aktif' => 1
            );
            
            $dateNow = date("Y-m-d");
            $hariNow = $this->Tools_Model->hari_ind($dateNow);
            $tglNow = $this->Tools_Model->tgl_ind($dateNow);
                
            $cek = $this->Login_Model->cek_login($where)->num_rows();
            $cekUser = $this->Login_Model->cek_login($where)->result();
                
            if($cek > 0){                                                
                $wherejadwal = array(
                    'kodepengajar' => $cekUser[0]->kode_pengajar,      
                    'haripelajaran' => $hariNow,
                    'tahunpelajaran' => '2022'
                );

                $cekJadwalJml = $this->Jadwal_Model->cek_jadwal($wherejadwal)->num_rows(); 
                $cekJadwal = $this->Jadwal_Model->cek_jadwal($wherejadwal)->result();
                
                if($cekJadwalJml > 0){
                    $jadwalNgajar = $cekJadwal;
                } else {
                    $wherejadwal = array(
                        'kodepengajar' => $cekUser[0]->kode_pengajar,                          
                        'tahunpelajaran' => '2022'
                    );
                    $jadwalNgajar = $this->Jadwal_Model->cek_jadwal($wherejadwal)->result(); 
                }

                $data_session = array(
                    'namapengajar' => $cekUser[0]->nama_pengajar,
                    'kodepengajar' => $cekUser[0]->kode_pengajar,
                    'userpengajar' => $cekUser[0]->user_pengajar,
                    'kodemapel' => $jadwalNgajar,
                    'hariini' => $tglNow,
                    'status' => "login"
                );

                $this->session->set_userdata($data_session);
                $kdpel = $this->session->userdata('kodemapel');

                if($cekUser[0]->kode_pengajar == "GC-ADMIN"){
                    $page = "realisasiKbm";
                } else if($cekUser[0]->kode_pengajar == "GC-GUEST"){
                    $page = "santri";
                } else {
                    $page = "santri/presensi_list/".date("Y-m-d")."/0/".$kdpel[0]->kodepelajaran;
                }
                redirect(base_url($page));
            }else{                
                echo "<script>alert(\"Ups...!!! Username & Password Anda Salah\");window.location=\"".  base_url('login')."\";</script>";
            }
	}
 
	function logout(){
            $this->session->sess_destroy();
            redirect(base_url('login'));
	}
    }
?>
