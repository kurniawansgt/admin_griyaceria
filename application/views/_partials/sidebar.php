<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url();?>dashboard">
        <div class="sidebar-brand-icon" style="margin-top:10px">
            <i class="fas"><img src="<?php echo base_url();?>assets/img/Logo_GC_3_Transparan_Big.png" width="150" height="50"></i>
        </div>
    </a>    
    <div class="sidebar-brand-text" style="text-align: center; color: white; font-size: 12px; margin-top: 10px; margin-left: 40px; padding-bottom: 5px"></div>    
    <hr class="sidebar-divider my-0">    
    <?php
        if($this->session->userdata('kodepengajar')=="GC-ADMIN"){
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'pengajar';?>">
            <i class="fas fa-folder nav-icon"></i>
            <span>DATA PENGAJAR</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">    
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'santri';?>">
            <i class="fas fa-folder nav-icon"></i>
            <span>DATA SANTRI</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">    
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'pelajaran';?>">
            <i class="fas fa-book nav-icon "></i>
            <span>DATA MATA PELAJARAN</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">    
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'kelas';?>">
            <i class="fas fa-building nav-icon"></i>
            <span>DATA KELAS</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <?php
        }
        
        if($this->session->userdata('kodepengajar')!="GC-GUEST"){
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'realisasiKbm';?>">
            <i class="fas fa-calendar nav-icon"></i>
            <span>REALISASI MENGAJAR</span>
        </a>
    </li>   
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'santri/presensi_list/'.date("Y-m-d").'/0/0';?>">
            <i class="fas fa-calendar nav-icon"></i>
            <span>DAFTAR HADIR SANTRI</span>
        </a>
    </li>   
    <hr class="sidebar-divider my-0">
    <?php
        }
        if($this->session->userdata('kodepengajar')=="GC-ADMIN"){
    ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'realisasiKbm/show_report_realisasi/'.date("n").'/'.date("Y");?>">
            <i class="fas fa-archive nav-icon"></i>
            <span>LAPORAN REALISASI MENGAJAR</span>
        </a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">    
    <?php
        }
    ?>
</ul>
<!-- End of Sidebar -->