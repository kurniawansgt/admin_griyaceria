<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-2 static-top shadow">
        
    <div class="sidebar-brand-text mx-4 lg">
        Administrasi Griya Ceria<br>(<?php echo $this->session->userdata("hariini");?>)
    </div>
    
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">        
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 text-gray-600 small text-center">
                    <?php echo $this->session->userdata("namapengajar")."<br>(".$this->session->userdata("userpengajar").")";?>
                </span>                
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url('pengajar/ubah_sandi_frm');?>">
                <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>Ubah Sandi</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->