<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Kelas extends CI_Controller {        
        
        function __construct()
        {
            parent::__construct();
            
            $this->load->model('Kelas_Model');
        }
        
        function index(){            
            if($this->session->userdata('kodepengajar')!=""){
                $data['setubah'] = ($this->session->userdata('kodepengajar')=="GC-ADMIN") ? 1 : 0;
                $data['kelasList'] = $this->Kelas_Model->showDataAllOrderBy('kode_kelas','ASC')->result();
                $this->load->view('master/kelas',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_input(){
            if($this->session->userdata('kodepengajar')!=""){
                $this->load->view('master/kelas_frm');
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_ubah($id){
            if($this->session->userdata('kodepengajar')!=""){
                $data['kelas'] = $this->Kelas_Model->showDataById($id)->result();
                $this->load->view('master/kelas_frm',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function simpan_data(){
            if($this->session->userdata('kodepengajar')!=""){
                $idKelas    = $_REQUEST['id'];
                $kodeKelas = $_REQUEST['kodekelas'];
                $namaKelas = $_REQUEST['namakelas'];
                $ip_client      = $this->input->ip_address();

                $data = array (
                    "id" => $idKelas,
                    "kode_kelas" => $kodeKelas,
                    "nama_kelas" => $namaKelas,
                    "created_by" => 'Administrator',
                    "created_at" => date("Y-m-d H:i:s"),
                    "last_ip" => $ip_client
                );

                if($idKelas == 0 || $idKelas == ""){
                    // proses memanggil fungsi saveData di class produks_model dengan 1 parameter data array yang akan di simpan
                    $result = $this->Kelas_Model->saveData($data); 
                } else {
                    // proses memanggil fungsi updateData di class produks_model dengan 2 parameter id data & array data yang akan di update
                    $result = $this->Kelas_Model->updateData($idKelas,$data); 
                }

                $this->index();
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function hapus_data($id){            
            if($this->session->userdata('kodepengajar')!=""){
                $this->Kelas_Model->deleteData($id);

                echo "<script>alert('Data Berhasil di Hapus'); window.location = '".base_url()."kelas';</script>";
            } else {
                redirect(base_url('login/logout'));
            }
        }
    }
?>
