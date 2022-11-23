<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class RealisasiKbm extends CI_Controller {        
        
        function __construct()
        {
            parent::__construct();

            $this->load->model('Realisasi_Mengajar_Model');
            $this->load->model('Pengajar_Model');
            $this->load->model('Mata_Pelajaran_Model');            
            $this->load->model('Kelas_Model');            
        }
        
        function index(){
            if($this->session->userdata('kodepengajar')!=""){
                $kode_pengajar = ($this->session->userdata('kodepengajar')!="GC-ADMIN") ? $this->session->userdata('kodepengajar') : "";
                $data['realisasi'] = $this->Realisasi_Mengajar_Model->showDataAllOrderBy($kode_pengajar,'tgl_kbm','DESC')->result();
                $data['setubah'] = ($this->session->userdata('kodepengajar')=="GC-ADMIN") ? 1 : 0;

                $this->load->view('transaksi/daftar_realisasi_mengajar',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_input(){
            if($this->session->userdata('kodepengajar')!=""){
                $data['pengajar'] = $this->Pengajar_Model->showDataAll()->result();
                $data['mata_pelajaran'] = $this->Mata_Pelajaran_Model->showDataAll()->result();
                $data['kelas'] = $this->Kelas_Model->showDataAll()->result();

                $this->load->view('transaksi/realisasi_mengajar', $data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_input_mandiri(){
            if($this->session->userdata('kodepengajar')!=""){
                $data['kodepengajar'] = $this->session->userdata('kodepengajar');
                $data['namapengajar'] = $this->session->userdata('namapengajar');
                $data['kode_pelajaran'] = $this->session->userdata('kodemapel');
                $kdpel = $this->session->userdata('kodemapel');
                $arrkodepel = array();
                foreach($kdpel as $kodepel){
                    $arrkodepel[] = $kodepel->kodepelajaran;
                }
                $data['pengajar'] = $this->Pengajar_Model->showDataByKode($this->session->userdata('kodepengajar'))->result();
                $data['mata_pelajaran'] = $this->Mata_Pelajaran_Model->showDataByKode($arrkodepel)->result();
                $data['kelas'] = $this->Kelas_Model->showDataAll()->result();

                $this->load->view('transaksi/realisasi_mengajar_mandiri', $data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_ubah($id){
            if($this->session->userdata('kodepengajar')!=""){
                $kdpel = $this->session->userdata('kodemapel');
                $arrkodepel = array();
                foreach($kdpel as $kodepel){
                    $arrkodepel[] = $kodepel->kodepelajaran;
                }
                $data['realisasi'] = $this->Realisasi_Mengajar_Model->showDataById($id)->result();
                if($this->session->userdata('kodepengajar')=="GC-ADMIN"){
                    $data['pengajar'] = $this->Pengajar_Model->showDataAll()->result();
                    $data['mata_pelajaran'] = $this->Mata_Pelajaran_Model->showDataAll()->result();
                } else {
                    $data['pengajar'] = $this->Pengajar_Model->showDataByKode($this->session->userdata('kodepengajar'))->result();
                    $data['mata_pelajaran'] = $this->Mata_Pelajaran_Model->showDataByKode($arrkodepel)->result();
                }                        
                $data['kelas'] = $this->Kelas_Model->showDataAll()->result();
                $page = ($this->session->userdata('kodepengajar')=="GC-ADMIN") ? "realisasi_mengajar" : "realisasi_mengajar_mandiri";

                $this->load->view('transaksi/'.$page, $data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function simpan_data(){
            if($this->session->userdata('kodepengajar')!=""){
                $idRealisasi    = $_REQUEST['id'];
                $tglRealisasi   = $_REQUEST['tgl_realisasi'];
                $pengajar       = explode("#",$_REQUEST['pengajar']);
                $kode_pengajar  = $pengajar[0];
                $nama_pengajar  = $pengajar[1];
                $mata_pelajaran = explode("#", $_REQUEST['mata_pelajaran']);
                $kode_pelajaran = $mata_pelajaran[0];
                $nama_pelajaran = $mata_pelajaran[1];
                $kelas          = $_REQUEST['kelas'];
                $jam_mulai      = $_REQUEST['jam_mulai'].":".$_REQUEST['menit_mulai'];
                $jam_selesai    = $_REQUEST['jam_selesai'].":".$_REQUEST['menit_selesai'];
                $materi_belajar = $_REQUEST['materi_pembelajaran'];
                $ip_client      = $this->input->ip_address();

                $data = array (
                    "id" => $idRealisasi,
                    "tgl_kbm" => $tglRealisasi,
                    "jam_masuk_kbm" => $jam_mulai,
                    "jam_keluar_kbm" => $jam_selesai,
                    "kelas" => $kelas,
                    "kode_mapel" => $kode_pelajaran,
                    "nama_mapel" => $nama_pelajaran,
                    "kode_pengajar" => $kode_pengajar,
                    "nama_pengajar" => $nama_pengajar,
                    "isi_kbm" => $materi_belajar,
                    "status" => 0,
                    "created_by" => 'Administrator',
                    "created_at" => date("Y-m-d H:i:s"),
                    "last_ip" => $ip_client
                );

                if($idRealisasi == 0 || $idRealisasi == ""){
                    // proses memanggil fungsi saveData di class produks_model dengan 1 parameter data array yang akan di simpan
                    $result = $this->Realisasi_Mengajar_Model->saveData($data); 
                } else {
                    // proses memanggil fungsi updateData di class produks_model dengan 2 parameter id data & array data yang akan di update
                    $result = $this->Realisasi_Mengajar_Model->updateData($idRealisasi,$data); 
                }

                $this->index();
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function hapus_data($id){       
            if($this->session->userdata('kodepengajar')!=""){
                $this->Realisasi_Mengajar_Model->deleteData($id);

                echo "<script>alert('Data Berhasil di Hapus'); window.location = '".base_url()."realisasiKbm';</script>";
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function show_report_realisasi($bulan,$tahun){
            if($this->session->userdata('kodepengajar')!=""){
                $bulanSlc = isset($bulan)?$bulan:date("m");
                $tahunSlc = isset($tahun)?$tahun:date("Y");
                $data['rpt_realisasi'] = $this->Realisasi_Mengajar_Model->rptRealisasiKbm($bulanSlc,$tahunSlc)->result();
                $data['blnNo'] = $bulanSlc;
                $data['thnNo'] = $tahunSlc;

                $this->load->view('laporan/realisasi_mengajar',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
    }
?>
