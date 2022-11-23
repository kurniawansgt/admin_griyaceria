<?php ini_set('display_errors','on'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view("_partials/head.php") ?>    
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view("_partials/sidebar.php") ?>                
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view("_partials/navbar.php") ?>
                <div class="container-fluid">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">LAPORAN REALISASI MENGAJAR</h6>
                        </div>
                        <div style="margin-bottom:-10px;margin-top:15px;margin-left:15px">
                            <div class="form-group">
                                <label>Bulan Ke-</label>
                                <select name="bulan" id="bulan" class="form-control-sm">
                                    <?php
                                        $blnSlc = ($blnNo=="") ? date("n"):$blnNo;
                                        for($bln=1;$bln<=12;$bln++){
                                            $selected = ($bln==$blnSlc) ? "selected" : "";											
                                    ?>
                                    <option value="<?php echo $bln;?>" <?php echo $selected;?>><?php echo $bln;?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                                &nbsp;
                                <label>Tahun</label>
                                <input type="text" name="tahun" id="tahun" class="form-control-sm" style="width:60px" value="<?php echo date("Y");?>">
                                &nbsp;
                                <input type="button" value="Lihat Data" class="btn btn-sm btn-primary" onclick="showData()">
                            </div>
                        </div>
                        <div class="card-body">                            
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-sm" id="dataTable" style="font-size: 15px;" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="th-sm text-center">NO</th>
                                            <th class="th-sm text-center">PENGAJAR</th>
                                            <th class="th-sm text-center">MATA PELAJARAN</th>
                                            <th class="th-sm text-center">BULAN/TAHUN</th>
                                            <th class="th-sm text-center">JUMLAH JAM</th>
                                            <th class="th-sm text-center">HONOR</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 0;
                                            $total_honor = 0;
                                            foreach($rpt_realisasi as $rpt_kbm){
                                        ?>
                                        <tr>
                                            <td align="center"><?php echo $no+1;?></td>
                                            <td align="left"><?php echo $rpt_kbm->nama_pengajar;?></td>
                                            <td align="left"><?php echo $rpt_kbm->nama_mapel;?></td>
                                            <td align="center"><?php echo $rpt_kbm->bulan."/".$rpt_kbm->tahun;?></td>
                                            <td align="center"><?php echo number_format($rpt_kbm->total_jam);?></td>
                                            <td align="right"><?php echo number_format($rpt_kbm->total_honor);?></td>
                                        </tr>
                                        <?php
                                                $no++;
                                                
                                                $total_honor += $rpt_kbm->total_honor;
                                            }
                                        ?>
                                        <tr>
                                            <td align="center" colspan="5">TOTAL HONOR</td>
                                            <td align="right"><?php echo number_format($total_honor);?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                        
                </div>
                <?php $this->load->view("_partials/footer.php") ?>
                <?php $this->load->view("_partials/scrolltop.php") ?>
                <?php $this->load->view("_partials/modal.php") ?>
                <?php $this->load->view("_partials/js.php") ?>
            </div>
        </div>
    </div>
    <script>
        function showData(){
            var bulan = document.getElementById('bulan').value;
            var tahun = document.getElementById('tahun').value;
			
            window.location = "<?php echo base_url();?>realisasiKbm/show_report_realisasi/"+bulan+"/"+tahun;
        }        
    </script>
</body>
</html>
        