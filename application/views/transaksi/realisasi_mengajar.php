<?php ini_set('display_errors','off'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("_partials/head.php") ?>      
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
                            <h6 class="m-0 font-weight-bold text-primary">REALISASI MENGAJAR</h6>
                        </div>                        
                        <form class="user" name="frmRealisasi" id="frmRealisasi" method="post" action="<?php echo base_url();?>realisasiKbm/simpan_data">
                            <div class="card-body p-4" style="margin-top:-35px">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="p-4">                                        
                                            <input type="hidden" name="id" id="id" value="<?php echo ($realisasi[0]->id != "") ? $realisasi[0]->id : 0;?>">
                                            <div class="form-group">
                                                <label>Tanggal Mengajar</label>
                                                <div class="input-group">
                                                    <div class="input-group date" id="datepicker" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datepicker" name="tgl_realisasi" value="<?php echo $realisasi[0]->tgl_kbm;?>" />
                                                        <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select name="kelas" id="kelas" class="form-control form-control-sm select1">  
                                                    <option value="">Pilih Kelas</option> 
                                                    <?php
                                                        foreach($kelas as $kelasList){
                                                            $selected = ($kelasList->id == $realisasi[0]->kelas) ? "selected" : "";
                                                    ?>
                                                    <option value="<?php echo $kelasList->id;?>"<?php echo $selected;?>><?php echo strtoupper($kelasList->nama_kelas);?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Pengajar</label>
                                                <select name="pengajar" id="pengajar" class="form-control form-control-sm select1">  
                                                    <option value="">Pilih Pengajar</option> 
                                                    <?php
                                                        foreach($pengajar as $pengajarList){
                                                            $selected = ($pengajarList->kode_pengajar == $realisasi[0]->kode_pengajar) ? "selected" : "";
                                                    ?>
                                                    <option value="<?php echo $pengajarList->kode_pengajar."#".$pengajarList->nama_pengajar;?>" <?php echo $selected;?>><?php echo strtoupper($pengajarList->nama_pengajar);?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Mata Pelajaran</label>
                                                <select name="mata_pelajaran" id="mata_pelajaran" class="form-control form-control-sm select1">  
                                                    <option value="">Pilih Mata Pelajaran</option> 
                                                    <?php
                                                        foreach($mata_pelajaran as $pelajaranList){
                                                            $selected = ($pelajaranList->kode_mapel == $realisasi[0]->kode_mapel) ? "selected" : "";
                                                    ?>
                                                    <option value="<?php echo $pelajaranList->kode_mapel."#".$pelajaranList->nama_mapel;?>" <?php echo $selected;?>><?php echo strtoupper($pelajaranList->nama_mapel);?></option>
                                                    <?php
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                            
                                    <div class="col-lg-6">
                                        <div class="p-4">
                                            <div class="form-group">
                                                <label>Jam Mulai Pelajaran</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <select name="jam_mulai" id="jam_mulai" class="form-control form-control-sm">
                                                            <option value="">Jam Mulai</option>
                                                            <?php
                                                                for($hour=7;$hour<=22;$hour++){
                                                                    $jam = (strlen($hour) < 2) ? "0".$hour : $hour;
                                                                    $selected = ($jam == date("H",strtotime($realisasi[0]->jam_masuk_kbm))) ? "selected" : ""; 
                                                            ?>
                                                            <option value="<?php echo $jam;?>" <?php echo $selected;?>><?php echo $jam;?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select name="menit_mulai" id="menit_mulai" class="form-control form-control-sm">
                                                            <option value="">Menit Mulai</option>
                                                            <?php
                                                                for($minute=0;$minute<=59;$minute++){
                                                                    $menit = (strlen($minute) < 2) ? "0".$minute : $minute;
                                                                    $selected = ($menit == date("i",strtotime($realisasi[0]->jam_masuk_kbm))) ? "selected" : ""; 
                                                            ?>
                                                            <option value="<?php echo $menit;?>" <?php echo $selected;?>><?php echo $menit;?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Jam Selesai Pelajaran</label>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <select name="jam_selesai" id="jam_selesai" class="form-control form-control-sm">
                                                            <option value="">Jam Selesai</option>
                                                            <?php
                                                                for($hour=7;$hour<=22;$hour++){
                                                                    $jam = (strlen($hour) < 2) ? "0".$hour : $hour;
                                                                    $selected = ($jam == date("H",strtotime($realisasi[0]->jam_keluar_kbm))) ? "selected" : ""; 
                                                            ?>
                                                            <option value="<?php echo $jam;?>"<?php echo $selected;?>><?php echo $jam;?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <select name="menit_selesai" id="menit_selesai" class="form-control form-control-sm">
                                                            <option value="">Menit Selesai</option>
                                                            <?php
                                                                for($minute=0;$minute<=59;$minute++){
                                                                    $menit = (strlen($minute) < 2) ? "0".$minute : $minute;
                                                                    $selected = ($menit == date("i",strtotime($realisasi[0]->jam_keluar_kbm))) ? "selected" : ""; 
                                                            ?>
                                                            <option value="<?php echo $menit;?>" <?php echo $selected;?>><?php echo $menit;?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Materi Pembelajaran</label>
                                                <textarea class="form-control form-control-sm" name="materi_pembelajaran" id="materi_pembelajaran" rows="4"><?php echo $realisasi[0]->isi_kbm;?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <input type="submit" value="Simpan Data" name="btn_submit" id="btn_submit" class="btn btn-sm btn-primary">
                                                <input type="button" value="Kembali" name="btn_back" id="btn_back" class="btn btn-sm btn-warning" onclick="backPage()">
                                            </div>     
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </form>
                    </div>                        
                </div>
                
                <!-- Sticky Footer -->
                <?php $this->load->view("_partials/footer.php") ?>
            </div>
        </div>
    </div>
    
    <?php $this->load->view("_partials/scrolltop.php") ?>
    <?php $this->load->view("_partials/modal.php") ?>
    <?php $this->load->view("_partials/js.php") ?>
    <script>
        function backPage(){
            window.location = '<?php echo base_url();?>realisasiKbm';
        }
        
        $(document).ready(function () {

            $("#btn_submit").click(function (event) {
                
                if(document.getElementById('kelas').value == ""){
                    alert("Kelas Harus Dipilih");
                    return false;
                }
                if(document.getElementById('pengajar').value == ""){
                    alert("Pengajar Harus Dipilih");
                    return false;
                }
                if(document.getElementById('mata_pelajaran').value == ""){
                    alert("Mata Pelajaran Harus Dipilih");
                    return false;
                }
                if(document.getElementById('jam_mulai').value == ""){
                    alert("Jam Mulai Harus Dipilih");
                    return false;
                }
                if(document.getElementById('menit_mulai').value == ""){
                    alert("Menit Mulai Harus Dipilih");
                    return false;
                }
                if(document.getElementById('jam_selesai').value == ""){
                    alert("Jam Selesai Harus Dipilih");
                    return false;
                }
                if(document.getElementById('menit_selesai').value == ""){
                    alert("Menit selesai Harus Dipilih");
                    return false;
                }
                if(document.getElementById('materi_pembelajaran').value == ""){
                    alert("Materi Pembelajaran Harus Diisi");
                    return false;
                }
                var form = $('#frmRealisasi')[0];
                var data = new FormData(form);

                document.getElementById("btn_submit").disabled = true;
                document.getElementById("btn_submit").value = "Sedang Menyimpan...";

                $.ajax({                
                    type: "POST",
                    enctype: 'multipart/form-data',
                    url: '<?php echo base_url();?>realisasiKbm/simpan_data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    timeout: 600000,
                    success : function(x){
                        alert("Proses Menyimpan Data Berhasil");
                        document.getElementById("btn_submit").disabled = false;
                        document.getElementById("btn_submit").value = "Simpan Data";                         
                        window.location = '<?php echo base_url();?>realisasiKbm';
                     }, 
                     error : function(){
                        alert("Error");
                     }
                });
             });
        });
    </script>
</body>
</html>