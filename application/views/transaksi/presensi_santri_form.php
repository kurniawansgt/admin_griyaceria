<?php
    $kelas = $this->Kelas_Model->showDataByKode($kelaspresensi)->result();
    $mapel = $this->Mata_Pelajaran_Model->showDataByKode($mapelpresensi)->result();    
?>
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
                            <h6 class="m-0 font-weight-bold text-primary">DAFTAR KEHADIRAN BELAJAR SANTRI</h6>
                        </div>    
                        <div class="row">
                            <div class="col-12">
                                <div class="container" style="margin-top: 10px;">
                                    <label>Tanggal : <?php echo $tglpresensi;?></label>&nbsp;&nbsp;||&nbsp;&nbsp; 
                                    <label>Kelas : <?php echo $kelaspresensi != "0" ? $kelas[0]->nama_kelas : "Semua Kelas";?></label>&nbsp;&nbsp;||&nbsp;&nbsp;
                                    <label>Pelajaran : <?php echo $mapel[0]->nama_mapel;?></label>
                                </div>
                            </div>
                        </div>
                        <form name="frmpresensi" id="frmpresensi" method="post" action="<?php echo base_url('santri/simpan_presensi');?>">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-sm" style="font-size: 14px;" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="th-sm text-center">NO</th>
                                            <th class="th-sm text-center">NIS</th>
                                            <th class="th-sm text-center">KELAS</th>
                                            <th class="th-sm text-center">NAMA SANTRI</th>
                                            <th class="th-sm text-center">STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $a = 0;
                                            if(count($santriList)>0){
                                                foreach($santriList as $santri){
                                                    $kelas = $this->Kelas_Model->showDataByKode($santri->kelassantri)->result();
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $no;?></td>
                                            <td class="text-center"><?php echo $santri->nis;?></td>
                                            <td class="text-center"><?php echo $kelas[0]->nama_kelas;?></td>
                                            <td class="text-left"><?php echo $santri->namasantri;?></td>
                                            <td class="text-center">
                                                <select name="presensists[<?php echo $a;?>]" id="presensists" class="form-control">
                                                    <option value="H">Hadir</option>
                                                    <option value="I">Ijin</option>
                                                    <option value="S">Sakit</option>
                                                    <option value="A">Tanpa Keterangan</option>
                                                </select>
                                            </td>
                                            <input type="hidden" name="nissantri[<?php echo $a;?>]" id="nissantri" value="<?php echo $santri->nis;?>">
                                            <input type="hidden" name="kelassantri[<?php echo $a;?>]" id="kelassantri" value="<?php echo $santri->kelassantri;?>">
                                        </tr>             
                                        <?php
                                                    $no++;
                                                    $a++;
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
                        <div class="row">
                            <div class="container col-12" style="margin-bottom: 15px;text-align: center">
                                <input type="hidden" name="jmlsantri" id="jmlsantri" value="<?php echo count($santriList);?>">                                
                                <input type="hidden" name="mapelsantri" id="mapelsantri" value="<?php echo $mapelpresensi;?>">
                                <input type="hidden" name="tglpresensi" id="tglpresensi" value="<?php echo $tglpresensi;?>">
                                <input type="submit" value="Simpan Data" class="btn btn-warning" style="margin-top: -110px;">
                            </div>
                        </div>
                        </form>
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
            var tgl = document.getElementById('tgl_$presensi').value;
            var kelas = document.getElementById('kelas').value;
            var pelajaran = document.getElementById('mapel').value;
                        
            window.location = '<?php echo base_url();?>santri/presensi_list/'+tgl+'/'+kelas+'/'+pelajaran;
        }
        
        function presensiInput(){
            var tgl = document.getElementById('tgl_$presensi').value;
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
