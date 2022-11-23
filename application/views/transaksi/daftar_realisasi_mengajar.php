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
                            <h6 class="m-0 font-weight-bold text-primary">DAFTAR REALISASI MENGAJAR</h6>
                        </div>
                        <?php
                            $setAdd = ($this->session->userdata('kodepengajar')=="GC-ADMIN") ? "all" : "mandiri";
                        ?>
                        <div class="card-body">
                            <div style="margin-bottom:10px;"><button type="button" class="btn btn-sm btn-primary" onclick="addData('<?php echo $setAdd;?>')">Tambah Data</button></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-sm" id="dataTable" style="font-size: 15px;" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="th-sm text-center">NO</th>
                                            <th class="th-sm text-center">PENGAJAR</th>
                                            <th class="th-sm text-center">MATA PELAJARAN</th>
                                            <th class="th-sm text-center">KELAS</th>
                                            <th class="th-sm text-center">TANGGAL</th>
                                            <th class="th-sm text-center">JAM MULAI</th>
                                            <th class="th-sm text-center">JAM SELESAI</th>
                                            <th class="th-sm text-center">STATUS</th>
                                            <th class="th-sm text-center">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            if(count($realisasi)>0){
                                                foreach($realisasi as $realisasiList){
                                                    $status = ($realisasiList->status==0) ? "Input" : "Checked";
                                                    
                                                    $kelas = $this->Kelas_Model->showDataById($realisasiList->kelas)->result();
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $no;?></td>
                                            <td align="left"><?php echo $realisasiList->nama_pengajar;?></td>
                                            <td align="left"><?php echo $realisasiList->nama_mapel;?></td>
                                            <td align="center"><?php echo $kelas[0]->nama_kelas;?></td>
                                            <td align="center"><?php echo format_indo(date("Y-m-d",strtotime($realisasiList->tgl_kbm)));?></td>
                                            <td align="center"><?php echo date("H:i",strtotime($realisasiList->jam_masuk_kbm));?></td>
                                            <td align="center"><?php echo date("H:i",strtotime($realisasiList->jam_keluar_kbm));?></td>
                                            <td align="center"><?php echo $status;?></td>
                                            <td align="center">
                                                <?php                                                    
                                                    if($realisasiList->status==0){
                                                        if($setubah == 1){
                                                ?>
                                                            <a href="<?php echo base_url();?>realisasiKbm/form_ubah/<?php echo $realisasiList->id;?>">[Ubah]</a> | 
                                                            <a href="#" onclick="hapusData('<?php echo $realisasiList->id;?>')">[Hapus]</a>
                                                <?php
                                                        } else {
                                                ?>
                                                            <a href="<?php echo base_url();?>realisasiKbm/form_ubah/<?php echo $realisasiList->id;?>">[Ubah]</a>                                                            
                                                <?php

                                                        }
                                                    }                                                    
                                                ?>                                                
                                            </td>
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
        function addData(tipe){
            var page = (tipe == "all") ? "form_input" : "form_input_mandiri";
            window.location = "<?php echo base_url();?>realisasiKbm/"+page;
        }
        
        function hapusData(id){
            var tny = confirm("Yakin Akan Menghapus Data Ini ?");
            if(tny == 1){
                window.location = '<?php echo base_url();?>realisasiKbm/hapus_data/'+id;
            }
        }
    </script>
</body>
</html>