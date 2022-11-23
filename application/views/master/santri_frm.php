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
                            <h6 class="m-0 font-weight-bold text-primary">INPUT DATA SANTRI</h6>
                        </div>                        
                        <form class="user" name="frmSantri" id="frmSantri" method="post" enctype="multipart/form-data" action="<?php echo base_url();?>santri/simpan_data">
                            <input type="hidden" name="id" id="id" value="<?php echo ($santri[0]->id != "") ? $santri[0]->id : 0;?>">
                            <div class="card-body p-4" style="margin-top:-35px">
                                <div class="row" style="font-size: 14px;">
                                    <div class="col-lg-6">
                                        <div class="p-4">
                                            <div class="form-group">
                                                <label>TAHUN AJARAN</label>
                                                <div class="input-group">
                                                    <select name="tahunajaran" id="tahunajaran" class="form-control form-control-static">
                                                        <?php
                                                            foreach($tahunAjaran as $thnAjar){
                                                                $selected = ($thnAjar->tahun_ajaran == $santri[0]->tahunajaran) ? "selected" : "";
                                                        ?>
                                                        <option value="<?php echo $thnAjar->periode_start;?>" <?php echo $selected;?>><?php echo $thnAjar->tahun_ajaran;?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>NIS GC</label>
                                                <div class="input-group">
                                                    <div class="input-group" id="nisQ"><input type="text" class="form-control" name="nis" id="nis" readonly placeholder="Auto Number" value="<?php echo ($santri[0]->id != "") ? $santri[0]->nis : $nisSantri;?>" /></div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">
                                                <label>NISN</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="nisn" id="nisn" value="<?php echo ($santri[0]->id != "") ? $santri[0]->nisn : "";?>" /></div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">
                                                <label>NIK KK</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="nikkk" id="nikkk" value="<?php echo ($santri[0]->id != "") ? $santri[0]->nikkk : "";?>" /></div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">
                                                <label>NO. AKTE</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="noakte" id="noakte" value="<?php echo ($santri[0]->id != "") ? $santri[0]->noaktelahir : "";?>" /></div>
                                                </div>                                                
                                            </div>
                                            <div class="form-group">
                                                <label>NAMA LENGKAP</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="namalengkap" id="namalengkap" value="<?php echo ($santri[0]->id != "") ? $santri[0]->namasantri : "";?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>TEMPAT LAHIR</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="tempatlahir" id="tempatlahir" value="<?php echo ($santri[0]->id != "") ? $santri[0]->tmptlahir : "";?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>TANGGAL LAHIR</label>
                                                <div class="input-group">
                                                    <div class="input-group date" id="datepicker" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" data-target="#datepicker" name="tgllahir" value="<?php echo ($santri[0]->id != "") ? date("Y-m-d",strtotime($santri[0]->tgllahir)) : "";?>" />
                                                        <div class="input-group-append" data-target="#datepicker" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>NAMA AYAH</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="namaayah" id="namaayah" value="<?php echo ($santri[0]->id != "") ? $santri[0]->namaayah : "";?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>NAMA IBU</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="namaibu" id="namaibu" value="<?php echo ($santri[0]->id != "") ? $santri[0]->namaibu : "";?>" /></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>  
                                    <div class="col-lg-6">
                                        <div class="p-4">
                                            
                                            <div class="form-group">
                                                <label>ALAMAT TEMPAT TINGGAL</label>
                                                <textarea class="form-control form-control-sm" name="alamttinggal" id="alamttinggal" rows="3"><?php echo ($santri[0]->id != "") ? $santri[0]->almttinggal : "";?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>NO. HANDPHONE</label>
                                                <div class="input-group">
                                                    <div class="input-group"><input type="text" class="form-control" name="nohp" id="nohp" value="<?php echo ($santri[0]->id != "") ? $santri[0]->nohandphone : "";?>" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>STATUS SANTRI</label>
                                                <div class="input-group">
                                                    <select name="statussantri" id="statussantri" class="form-control form-control-static" style="font-size: 14px;">
                                                        <option value="1" <?php echo ($santri[0]->statussantri== 1) ? "selected" : "";?>>AKTIF</option>
                                                        <option value="0" <?php echo ($santri[0]->statussantri== 0) ? "selected" : "";?>>TIDAK AKTIF</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>KELAS SANTRI</label>
                                                <div class="input-group">
                                                    <select name="kelas" id="kelas" class="form-control form-control-static" style="font-size: 14px;">
                                                        <option value="">PILIH KELAS</option> 
                                                        <?php
                                                            foreach($kelasList as $kelas){
                                                                $selected = ($kelas->kode_kelas == $santri[0]->kelassantri) ? "selected" : "";
                                                        ?>
                                                        <option value="<?php echo $kelas->kode_kelas;?>" <?php echo $selected;?>><?php echo strtoupper($kelas->nama_kelas);?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>FOTO DIRI</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" style="font-size: 14px;" accept="image/jpeg,image/png" name="fotodiri" id="fotodiri" />
                                                    <input type="hidden" name="fotodiricurr" id="fotodiricurr" value="<?php echo $santri[0]->fotodiri;?>">
                                                </div>
                                                <?php
                                                    $filePhoto = ($santri[0]->fotodiri != "" || $santri[0]->fotodiri != null) ? "foto/".$santri[0]->fotodiri : "santri_no_photo.png";
                                                ?>
                                                <div class="input-group" style="margin-top: 12px">
                                                    <img src="<?php echo base_url().'uploads/'.$filePhoto;?>" height="150">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>IJAZAH SD</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" style="font-size: 14px;" accept="application/pdf" name="ijazah[]" id="ijazahsd" />
                                                    <input type="hidden" name="ijazahcurr[0]" id="ijazahsdcurr" value="<?php echo $santri[0]->ijazah_sd;?>">
                                                </div>
                                                <label>IJAZAH SMP</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" style="font-size: 14px;" accept="application/pdf" name="ijazah[]" id="ijazahsmp" />
                                                    <input type="hidden" name="ijazahcurr[1]" id="ijazahsmpcurr" value="<?php echo $santri[0]->ijazah_smp;?>">
                                                </div>
                                                <label>IJAZAH SMA</label>
                                                <div class="input-group">
                                                    <input type="file" class="form-control" style="font-size: 14px;" accept="application/pdf" name="ijazah[]" id="ijazahsma" />
                                                    <input type="hidden" name="ijazahcurr[2]" id="ijazahsmacurr" value="<?php echo $santri[0]->ijazah_sma;?>">
                                                </div>
                                                <div class="input-group" style="margin-top: 12px">
                                                    <?php
                                                        if($santri[0]->ijazah_sd != "" || $santri[0]->ijazah_sd != null){
                                                    ?>
                                                    <a href="<?php echo base_url()."uploads/dokumen/".$santri[0]->ijazah_sd;?>" target="_blank"><img src="<?php echo base_url('uploads/PDF_icon.png');?>" height="50"></a>&nbsp;Ijazah SD
                                                    &nbsp;
                                                    <?php
                                                        }
                                                        if($santri[0]->ijazah_smp != "" || $santri[0]->ijazah_smp != null){
                                                    ?>
                                                    <a href="<?php echo base_url()."uploads/dokumen/".$santri[0]->ijazah_smp;?>" target="_blank"><img src="<?php echo base_url('uploads/PDF_icon.png');?>" height="50"></a>&nbsp;Ijazah SMP                                                    
                                                    &nbsp;
                                                    <?php
                                                        }
                                                        if($santri[0]->ijazah_sma != "" || $santri[0]->ijazah_sma != null){
                                                    ?>
                                                    <a href="<?php echo base_url()."uploads/dokumen/".$santri[0]->ijazah_sma;?>" target="_blank"><img src="<?php echo base_url('uploads/PDF_icon.png');?>" height="50"></a>&nbsp;Ijazah SMA
                                                    <?php
                                                        }
                                                    ?>
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
            window.location = '<?php echo base_url();?>santri';
        }                
        
        $(document).ready(function() {
            $("#tahunajaran").change(function() {            
                var postForm = {
                    'thnajar': document.getElementById("tahunajaran").value
                };                
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url();?>santri/nourut",
                    data: postForm,
                    success: function(data) {
                         $("#nisQ").html(data);
                    }
                });                
            });
        });
    </script>
</body>
</html>