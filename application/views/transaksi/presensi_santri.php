<?php ini_set('display_errors','off'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("_partials/head.php") ?>    
    <script>
        alert("Silahkan Mengisi Kehadiran Santri Sebelum Mengajar");
    </script>
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view("_partials/sidebar.php") ?>
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            
            <!-- Main Content -->
            <div id="content">
                <?php $this->load->view("_partials/navbar.php") ?>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DAFTAR KEHADIRAN BELAJAR SANTRI <?php var_dump($kdpel[0]);?></h6>
                        </div>
                        <div class="row"> 
                            <div class="col-lg-5">
                                <div style="margin-bottom:-10px;margin-top:15px;margin-left:15px">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text col-lg-5">Tanggal</span>
                                            <div class="input-group date" id="datepicker" data-target-input="nearest">
                                                <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">                                                    
                                                    <input type="text" class="form-control datetimepicker-input" data-target="#datepicker" name="tgl_$presensi" id="tgl_presensi" value="<?php echo $tglpresensi;?>" />
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group" style="margin-top: 5px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px;">Kelas</span>
                                        </div>
                                        <div class="col-6" style="margin-left: -12px">
                                        <select name="kelas" id="kelas" class="form-control">
                                                <option value="0">Semua Kelas</option>
                                                <?php
                                                    foreach($kelasList as $kelas){
                                                        $selected = ($kelas->kode_kelas == $kelaspresensi) ? "selected" : "";
                                                ?>
                                                <option value="<?php echo $kelas->kode_kelas;?>" <?php echo $selected;?>><?php echo $kelas->nama_kelas;?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="input-group" style="margin-top: 5px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" style="width: 145px;">Pelajaran</span>
                                        </div>
                                        <div class="col-6" style="margin-left: -12px">
                                            <select name="mapel" id="mapel" class="form-control">
                                                <!--<option value="0">Semua Pelajaran</option>-->
                                                <?php
                                                    foreach($pelajaranList as $pelajaran){
                                                        $selected = ($pelajaran->kode_mapel==$mapelpresensi) ? "selected" : "";
                                                ?>
                                                <option value="<?php echo $pelajaran->kode_mapel;?>" <?php echo $selected;?>><?php echo $pelajaran->nama_mapel;?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>                                            
                                        </div>                                        
                                    </div>
                                    <div class="input-group">                                        
                                        <div class="col-12" style="margin-left: 135px;margin-top: 8px;">
                                            <input type="button" value="Lihat Data" class="btn btn-sm btn-primary" onclick="showData()">
                                            <input type="button" value="Isi Kehadiran" class="btn btn-sm btn-success" onclick="presensiInput()">
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">                           
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-sm" style="font-size: 14px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="th-sm text-center">NO</th>
                                            <th class="th-sm text-center">NIS</th>
                                            <th class="th-sm text-center">NAMA SANTRI</th>
                                            <th class="th-sm text-center">KELAS</th>
                                            <th class="th-sm text-center">PELAJARAN</th>
                                            <th class="th-sm text-center">TANGGAL</th>
                                            <th class="th-sm text-center">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            if(count($presensi)>0){
                                                foreach($presensi as $presensi){
                                                    if($presensi->presensi_sts == "H"){
                                                        $status = "HADIR";
                                                    } elseif($presensi->presensi_sts == "I"){
                                                        $status = "IJIN";
                                                    } elseif($presensi->presensi_sts == "S"){
                                                        $status = "SAKIT";
                                                    } elseif($presensi->presensi_sts == "A"){
                                                        $status = "TANPA KETERANGAN";
                                                    }
                                                    
                                                    $santri = $this->Santri_Model->showDataByKode($presensi->nis)->result();
                                                    $kelas = $this->Kelas_Model->showDataByKode($presensi->kode_kelas)->result();
                                                    $mapel = $this->Mata_Pelajaran_Model->showDataByKode($presensi->kode_mapel)->result();
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no;?></td>
                                            <td class="text-center"><?php echo $presensi->nis;?></td>
                                            <td class="text-left"><?php echo $santri[0]->namasantri;?></td>
                                            <td class="text-center"><?php echo $kelas[0]->nama_kelas;?></td>
                                            <td class="text-center"><?php echo $mapel[0]->nama_mapel;?></td>
                                            <td class="text-center"><?php echo date("d/m/Y",strtotime($presensi->presensi_date));?></td>
                                            <td class="text-center"><?php echo $status;?></td>                                            
                                        </tr>             
                                        <?php
                                                    $no++;
                                                }
                                            } else {
                                        ?>
                                        <tr><td colspan="8" align="center">Data Tidak Ditemukan</td></tr>                                        
                                        <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                        
                </div>
                <?php $this->load->view("_partials/footer.php") ?>
            </div>
        </div>
    </div>
    
    <?php $this->load->view("_partials/scrolltop.php") ?>
    <?php $this->load->view("_partials/modal.php") ?>
    <?php $this->load->view("_partials/js.php") ?>
    <?php $this->load->view("_partials/js_table.php") ?>
    <script>
        function addData(){
            window.location = "<?php echo base_url();?>santri/form_input";
        }
        
        function showData(){
            var tgl = document.getElementById('tgl_presensi').value;
            var kelas = document.getElementById('kelas').value;
            var pelajaran = document.getElementById('mapel').value;
                        
            window.location = '<?php echo base_url();?>santri/presensi_list/'+tgl+'/'+kelas+'/'+pelajaran;
        }
        
        function presensiInput(){
            var tgl = document.getElementById('tgl_presensi').value;
            var kelas = document.getElementById('kelas').value;
            var pelajaran = document.getElementById('mapel').value;
                        
            window.location = '<?php echo base_url();?>santri/presensi_form_input/'+tgl+'/'+kelas+'/'+pelajaran;
        }
        
        function hapusData(id){
            var tny = confirm("Yakin Akan Menghapus Data Ini ?");
            if(tny == 1){
                window.location = '<?php echo base_url();?>santri/hapus_data/'+id;
            }
        }
    </script>
</body>
</html>