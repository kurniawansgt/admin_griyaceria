<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pelajaran extends CI_Controller {        
        
        function __construct()
        {
            parent::__construct();
            
            $this->load->model('Mata_Pelajaran_Model');
        }
        
        function index(){           
            if($this->session->userdata('kodepengajar')!=""){
                $data['setubah'] = ($this->session->userdata('kodepengajar')=="GC-ADMIN") ? 1 : 0;
                $data['pelajaranList'] = $this->Mata_Pelajaran_Model->showDataAllOrderBy('kode_mapel','ASC')->result();
                $this->load->view('master/mata_pelajaran',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_input(){
            if($this->session->userdata('kodepengajar')!=""){
                $this->load->view('master/mata_pelajaran_frm');
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_ubah($id){
            if($this->session->userdata('kodepengajar')!=""){
                $data['pelajaran'] = $this->Mata_Pelajaran_Model->showDataById($id)->result();
                $this->load->view('master/mata_pelajaran_frm',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function simpan_data(){
            if($this->session->userdata('kodepengajar')!=""){
                $id = $_REQUEST['id'];
                $kode_mapel = $_REQUEST['kodepelajaran'];
                $nama_mapel = ucwords($_REQUEST['namapelajaran']);            
                $status_aktif = $_REQUEST['statusaktif'];
                $ip_client      = $this->input->ip_address();

                $data = array (
                    "id" => $id,
                    "kode_mapel" => $kode_mapel,
                    "nama_mapel" => $nama_mapel,                
                    "status_aktif" => $status_aktif,
                    "created_by" => 'Administrator',
                    "created_at" => date("Y-m-d H:i:s"),
                    "last_ip" => $ip_client
                );

                if($id == 0 || $id == ""){
                    // proses memanggil fungsi saveData di class produks_model dengan 1 parameter data array yang akan di simpan
                    $result = $this->Mata_Pelajaran_Model->saveData($data); 
                } else {
                    // proses memanggil fungsi updateData di class produks_model dengan 2 parameter id data & array data yang akan di update
                    $result = $this->Mata_Pelajaran_Model->updateData($id,$data); 
                }

                $this->index();
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function hapus_data($id){            
            if($this->session->userdata('kodepengajar')!=""){
                $this->Mata_Pelajaran_Model->deleteData($id);

                echo "<script>alert('Data Berhasil di Hapus'); window.location = '".base_url()."pelajaran';</script>";
            } else {
                redirect(base_url('login/logout'));
            }
        }
    }
?>
