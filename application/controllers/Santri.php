<?php
    ini_set("display_errors",1);
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Santri extends CI_Controller {        
        
        function __construct()
        {
            parent::__construct();
            
            $this->load->helper(array('form', 'url'));
            $this->load->model('Santri_Model');
            $this->load->model('Kelas_Model');
            $this->load->model('Mata_Pelajaran_Model');
        }
        
        function index(){                        
            if($this->session->userdata('kodepengajar')!=""){
                $data['setubah'] = ($this->session->userdata('kodepengajar')=="GC-ADMIN") ? 1 : 0;
                $data['santriList'] = $this->Santri_Model->showDataAllOrderBy('kelassantri','ASC')->result();                        
                $this->load->view('master/santri',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function nourut(){
            $tahunajar = isset($_REQUEST['thnajar']) ? $_REQUEST['thnajar'] : "Juli 2021";
            $gethurufKode = $this->Santri_Model->getCode($tahunajar)->result();
            $hurufKode = $gethurufKode[0]->kode;            
            $getlastNo = $this->Santri_Model->getlastnis($hurufKode)->result();
            $lastNo = (int) (count($getlastNo) > 0) ? $getlastNo[0]->nis : 0;
            $lastNo++;            
            $nisGC = $hurufKode . sprintf("%03s", $lastNo);
            //return $nisGC;
            echo "<input type=\"text\" class=\"form-control\" name=\"nis\" id=\"nis\" value=\"".$nisGC."\" readonly placeholder=\"Auto Number\" />";
        }
        
        function form_input(){
            if($this->session->userdata('kodepengajar')!=""){
                $data['tahunAjaran'] = $this->Santri_Model->showTahunAjaran()->result();
                $data['kelasList'] = $this->Kelas_Model->showDataAll()->result();
                $this->load->view('master/santri_frm',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function form_ubah($id){
            if($this->session->userdata('kodepengajar')!=""){
                $data['tahunAjaran'] = $this->Santri_Model->showTahunAjaran()->result();
                $data['santri'] = $this->Santri_Model->showDataById($id)->result();
                $data['kelasList'] = $this->Kelas_Model->showDataAll()->result();
                $this->load->view('master/santri_frm',$data);
            } else {
                redirect(base_url('login/logout'));
            }    
        }
        
        function presensi_list($param1,$param2,$param3){         
            if($this->session->userdata('kodepengajar')!=""){
                $data['kode_pelajaran'] = $this->session->userdata('kodemapel');
                $kdpel = $this->session->userdata('kodemapel');
                $arrkodepel = array();
                foreach($kdpel as $kodepel){
                    $arrkodepel[] = $kodepel->kodepelajaran;
                }
                $data['kelasList'] = $this->Kelas_Model->showDataAll()->result();
                $data['pelajaranList'] = $this->Mata_Pelajaran_Model->showDataByKode($arrkodepel)->result();
                $data['presensi'] = $this->Santri_Model->showPresensi($param1,$param2,$param3)->result();
                $data['tglpresensi'] = $param1;
                $data['kelaspresensi'] = $param2;
                $data['mapelpresensi'] = $param3;
                $this->load->view('transaksi/presensi_santri',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function presensi_form_input($param1,$param2,$param3){     
            if($this->session->userdata('kodepengajar')!=""){
                $data['santriList'] = $this->Santri_Model->showDataByKelas($param2)->result();
                $data['tglpresensi'] = $param1;
                $data['kelaspresensi'] = $param2;
                $data['mapelpresensi'] = $param3;
                $this->load->view('transaksi/presensi_santri_form',$data);
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function simpan_presensi(){
            if($this->session->userdata('kodepengajar')!=""){
                $nis = $_REQUEST['nissantri'];
                $kelas = $_REQUEST['kelassantri'];
                $mapel = $_REQUEST['mapelsantri'];
                $tgl = $_REQUEST['tglpresensi'];
                $jmlSantri = $_REQUEST['jmlsantri'];
                $presensiSantri = $_REQUEST['presensists'];

                $cekData = $this->Santri_Model->cekPresensi($kelas[0],$mapel,$tgl)->result();

                $rsDelete = 0;
                if($cekData[0]->jml > 0){
                    $rsDelete = $this->Santri_Model->deletePresensi($kelas[0],$mapel,$tgl);
                }

                $cekData2 = $this->Santri_Model->cekPresensi($kelas[0],$mapel,$tgl)->result();

                if($cekData2[0]->jml == 0){
                    for($a=0;$a<$jmlSantri;$a++){                

                        $data = array(
                            "presensi_date" => $tgl." ".date("H:i:s"),
                            "nis" => $nis[$a],
                            "kode_kelas" => $kelas[$a],
                            "kode_mapel" => $mapel,
                            "presensi_sts" => $presensiSantri[$a],
                            "inserted_date" => date("Y-m-d H:i:s"),
                            "inserted_by" => $this->session->userdata('namapengajar'),
                            "ip_last" => $this->input->ip_address()
                        );

                        $result = $this->Santri_Model->saveDataPresensi($data);
                    }
                    redirect(base_url('santri/presensi_list/'.date("Y-m-d").'/0/0'));
                }
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function simpan_data(){
            if($this->session->userdata('kodepengajar')!=""){
                $idSantri = $_REQUEST['id'];
                $nisGC = $_REQUEST['nis'];
                $nisn = $_REQUEST['nisn'];
                $nikkk = $_REQUEST['nikkk'];
                $noakte = strtoupper($_REQUEST['noakte']);
                $namaSantri = strtoupper($_REQUEST['namalengkap']);
                $tmptlahir = strtoupper($_REQUEST['tempatlahir']);
                $tgllahir = $_REQUEST['tgllahir'];
                $namaayah = strtoupper($_REQUEST['namaayah']);
                $namaibu = strtoupper($_REQUEST['namaibu']);
                $almttinggal = $_REQUEST['alamttinggal'];
                $nohp = $_REQUEST['nohp'];
                $stssantri = $_REQUEST['statussantri'];
                $kelassantri = $_REQUEST['kelas'];
                $ip_client = $this->input->ip_address();

                $fotodiri = $_FILES["fotodiri"]["name"];
                $fotodiriold = $_REQUEST["fotodiricurr"];
                $fileExt = pathinfo($_FILES["fotodiri"]["name"], PATHINFO_EXTENSION);            

                if($fotodiri != ""){                
                    $file_name = str_replace(' ','_',strtolower($namaSantri));
                    if($fotodiriold != ""){
                        $path = './uploads/foto/'.$fotodiriold;
                        unlink($path);
                    }
                    $config['upload_path']          = './uploads/foto/';
                    $config['allowed_types']        = 'gif|jpg|jpeg|png';                
                    $config['overwrite']            = true;
                    $config['file_name']             = $file_name;
                    $config['max_size']             = 2048;

                    $this->load->library('upload', $config);   
                    $this->upload->do_upload('fotodiri');

                    /*if (!$this->upload->do_upload('fotodiri')){
                        echo "<script>alert(\"Gagal Upload Foto Diri\");window.location=\"".base_url()."santri\";</script>";
                    }else{
                        echo "<script>alert(\"Berhasil Upload Foto Diri\");window.location=\"".base_url()."santri/form_ubah/".$idSantri."\";</script>";
                    }*/
                }

                $fileNameFoto = ($fotodiri != "") ? $file_name.".".$fileExt : $fotodiriold;            

                $config = array(
                    'upload_path'   => './uploads/dokumen/',
                    'allowed_types' => 'pdf',
                    'overwrite'     => 1,                       
                );

                $this->load->library('upload', $config);

                $files = $_FILES['ijazah'];

                $level = array("sd","smp","sma");
                $ijazahs = array();
                $fieldsTable = array();
                $no = 0;

                foreach ($files['name'] as $key => $ijazah) {
                    $_FILES['ijazah[]']['name']= $files['name'][$key];
                    $_FILES['ijazah[]']['type']= $files['type'][$key];
                    $_FILES['ijazah[]']['tmp_name']= $files['tmp_name'][$key];
                    $_FILES['ijazah[]']['error']= $files['error'][$key];
                    $_FILES['ijazah[]']['size']= $files['size'][$key];

                    $fileName = $level[$no].'_'.str_replace(" ","_",strtolower($namaSantri));

                    $ijazahs[] = $fileName;
                    $fieldsTable["ijazah_".$level[$no]] = $fileName.".pdf";

                    $config['file_name'] = $fileName;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('ijazah[]')) {                    
                        echo "<script>alert(\"Berhasil Upload Ijazah\");window.location=\"".base_url()."santri/form_ubah/".$idSantri."\";</script>";
                    } else {
                        return false;
                    }
                    $no++;
                }

                $dataAwal = array (
                    "id" => $idSantri,
                    "nis" => $nisGC,
                    "nisn" => $nisn,
                    "nikkk" => $nikkk,
                    "noaktelahir" => $noakte,
                    "namasantri" => $namaSantri,
                    "tmptlahir" => $tmptlahir,
                    "tgllahir" => $tgllahir,
                    "namaayah" => $namaayah,
                    "namaibu" => $namaibu,
                    "almttinggal" => $almttinggal,
                    "nohandphone" => $nohp,
                    "statussantri" => $stssantri,
                    "kelassantri" => $kelassantri,
                    "fotodiri" => $fileNameFoto,                
                    "insertedDate" => date("Y-m-d H:i:s"),
                    "insertedBy" => 'Admin',                
                    "lastIP" => $ip_client
                );

                $data = array_merge($dataAwal,$fieldsTable);

                var_dump($data);

                if($idSantri == 0 || $idSantri == ""){
                    // proses memanggil fungsi saveData di class produks_model dengan 1 parameter data array yang akan di simpan
                    $result = $this->Santri_Model->saveData($data); 
                } else {
                    // proses memanggil fungsi updateData di class produks_model dengan 2 parameter id data & array data yang akan di update
                    $result = $this->Santri_Model->updateData($idSantri,$data); 
                }

                $this->index();
            } else {
                redirect(base_url('login/logout'));
            }
        }
        
        function hapus_data($id){            
            if($this->session->userdata('kodepengajar')!=""){
                $this->Santri_Model->deleteData($id);

                echo "<script>alert('Data Berhasil di Hapus'); window.location = '".base_url()."santri';</script>";
            } else {
                redirect(base_url('login/logout'));
            }
        }
                
    }
?>
