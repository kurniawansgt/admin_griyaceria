<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Pengajar extends CI_Controller {        
        
        function __construct()
        {
            parent::__construct();
            
            $this->load->model('Pengajar_Model');
        }
        
        function index(){      
            if($this->session->userdata('kodepengajar')!=""){
                $data['setubah'] = ($this->session->userdata('kodepengajar')=="GC-ADMIN") ? 1 : 0;
                $data['pengajarList'] = $this->Pengajar_Model->showDataAllOrderBy('kode_pengajar','ASC')->result();
                $this->load->view('master/pengajar',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_input(){
            if($this->session->userdata('kodepengajar')!=""){
                $data['tipeList'] = $this->Pengajar_Model->getTipePengajar()->result();
                $this->load->view('master/pengajar_frm',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_ubah($id){
            if($this->session->userdata('kodepengajar')!=""){
                $data['pengajar'] = $this->Pengajar_Model->showDataById($id)->result();
                $data['tipeList'] = $this->Pengajar_Model->getTipePengajar()->result();
                $this->load->view('master/pengajar_frm',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function simpan_data(){
            if($this->session->userdata('kodepengajar')!=""){
                $id    = $_REQUEST['id'];
                $kodePengajar   = $_REQUEST['kodepengajar'];
                $namapengajar       = ucwords($_REQUEST['namapengajar']);
                $tahunmasuk = $_REQUEST['tahunmasuk'];
                $tipe = $_REQUEST['tipepengajar'];
                $user_pengajar  = $_REQUEST['userpengajar'];
                $pass_pengajar  = $_REQUEST['passpengajar'];
                $statusaktif = $_REQUEST['statuspengajar'];
                $ip_client      = $this->input->ip_address();

                $data = array (
                    "id" => $id,
                    "kode_pengajar" => $kodePengajar,
                    "nama_pengajar" => $namapengajar,
                    "tahun_masuk" => $tahunmasuk,
                    "tipe_honor" => $tipe,
                    "user_pengajar" => $user_pengajar,
                    "pass_pengajar" => $pass_pengajar,                
                    "status_aktif" => $statusaktif,
                    "created_by" => 'Administrator',
                    "created_at" => date("Y-m-d H:i:s"),
                    "last_ip" => $ip_client
                );

                if($id == 0 || $id == ""){
                    // proses memanggil fungsi saveData di class produks_model dengan 1 parameter data array yang akan di simpan
                    $result = $this->Pengajar_Model->saveData($data); 
                } else {
                    // proses memanggil fungsi updateData di class produks_model dengan 2 parameter id data & array data yang akan di update
                    $result = $this->Pengajar_Model->updateData($id,$data); 
                }

                $this->index();
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function hapus_data($id){            
            if($this->session->userdata('kodepengajar')!=""){
                $this->Pengajar_Model->deleteData($id);

                echo "<script>alert('Data Berhasil di Hapus'); window.location = '".base_url()."pengajar';</script>";
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function ubah_sandi_frm(){            
            if($this->session->userdata('kodepengajar')!=""){
                $this->load->view('master/ubah_sandi');
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function ubah_sandi(){
            if($this->session->userdata('kodepengajar')!=""){
                $sandibaru = $_REQUEST['sandibaru'];
                $userCode = $this->session->userdata('kodepengajar');
                $ip_client = $this->input->ip_address();

                $data = array (
                    "pass_pengajar" => $sandibaru,
                    "updated_by" => $this->session->userdata('namapengajar'),
                    "updated_at" => date("Y-m-d H:i:s"),
                    "last_ip" => $ip_client
                );

                $result = $this->Pengajar_Model->updateDataSandi($userCode,$data);

                echo "<script>alert(\"Sandi baru berhasil di ubah, sistem secara otomatis akan kembali ke halaman login. Silahkan login menggunakan sandi baru tersebut.\");window.location=\"".base_url('login/logout')."\";</script>";
                //redirect('login/logout');
            } else {
                redirect(base_url('login/logout'));
            }
        }
    }
?>
