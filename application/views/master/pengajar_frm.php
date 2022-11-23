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
                            <h6 class="m-0 font-weight-bold text-primary">INPUT DATA PENGAJAR</h6>
                        </div>                        
                        <form class="user" name="frmPengajar" id="frmPengajar" method="post" action="<?php echo base_url();?>pengajar/simpan_data">
                            <input type="hidden" name="id" id="id" value="<?php echo ($pengajar[0]->id != "") ? $pengajar[0]->id : 0;?>">
                            <div class="card-body p-4" style="margin-top:-35px">
                                <div class="row">                                      
                                    <div class="col-lg-6">
                                        <div class="p-4">
                                            <div class="form-group">
                                                <label>KODE PENGAJAR</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="kodepengajar" id="kodepengajar" value="<?php echo ($pengajar[0]->id != "") ? $pengajar[0]->kode_pengajar : "";?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>NAMA PENGAJAR</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="namapengajar" id="namapengajar" value="<?php echo ($pengajar[0]->id != "") ? $pengajar[0]->nama_pengajar : "";?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>TAHUN MASUK</label>
                                                <div class="input-group">
                                                    <select name="tahunmasuk" id="tahunmasuk" class="form-control form-control-static">
                                                        <?php
                                                            $thnAwal = 2019;
                                                            for($tahun = $thnAwal;$tahun <= ($thnAwal+3);$tahun++){
                                                                $selected = ($tahun == $pengajar[0]->tahun_masuk) ? "selected" : "";
                                                        ?>
                                                        <option value="<?php echo $tahun;?>" <?php echo $selected;?>><?php echo $tahun;?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>TIPE</label>
                                                <div class="input-group">
                                                    <select name="tipepengajar" id="tipepengajar" class="form-control form-control-static">
                                                        <option value="">PILIH TIPE PENGAJAR</option>
                                                        <?php
                                                            foreach($tipeList as $tipe){
                                                                $selected = ($tipe->peruntukan == $pengajar[0]->tipe_honor) ? "selected" : "";
                                                        ?>
                                                        <option value="<?php echo $tipe->peruntukan;?>" <?php echo $selected;?>><?php echo $tipe->peruntukan;?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>USERNAME PENGAJAR</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="userpengajar" id="userpengajar" value="<?php echo ($pengajar[0]->id != "") ? $pengajar[0]->user_pengajar : "";?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>SANDI PENGAJAR</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="passpengajar" id="passpengajar" value="<?php echo ($pengajar[0]->id != "") ? $pengajar[0]->pass_pengajar : "";?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>STATUS AKTIF</label>
                                                <div class="input-group">
                                                    <select name="statuspengajar" id="statuspengajar" class="form-control form-control-static">
                                                        <option value="1" <?php echo ($pengajar[0]->status_aktif== 1) ? "selected" : "";?>>AKTIF</option>
                                                        <option value="0" <?php echo ($pengajar[0]->status_aktif== 0) ? "selected" : "";?>>TIDAK AKTIF</option>
                                                    </select>
                                                </div>
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
            window.location = '<?php echo base_url();?>pengajar';
        }        
    </script>
</body>
</html>