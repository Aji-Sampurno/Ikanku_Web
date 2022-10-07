<?php
$getUser = $this->session->userdata('session_user');
$getGrup = $this->session->userdata('session_grup');
?>
 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('Ikanku/dashboard');?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-fish"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Ikanku</sup></div>
            </a>

            <!-- Divider -->
                    <hr class="sidebar-divider my-0">
        
                    <!-- Dashboard -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Ikanku/dashboard');?>">
                            <i class="fas fa-fw fa-home"></i>
                            <span>Dashboard</span></a>
                    </li>
        
                    <!-- Divider -->
                    <hr class="sidebar-divider">
        
                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Menu
                    </div>
                    
                    <!-- Penjual -->
                    <!--<li class="nav-item">-->
                    <!--    <a class="nav-link" href="<?php echo base_url('Ikanku/penjual');?>">-->
                    <!--        <i class="fas fa-fw fa-clipboard"></i>-->
                    <!--        <span>penjual</span></a>-->
                    <!--</li>-->
        
                    <!-- Laporan -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('Ikanku/produk');?>">
                            <i class="fas fa-fw fa-book"></i>
                            <span>Laporan</span></a>
                    </li>
        
                    <!-- Edukasi -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="<?php echo base_url('Ikanku/edukasi');?>" data-toggle="collapse" data-target="#collapseEdukasi" aria-expanded="true" aria-controls="collapseEdukasi">
                            <i class="fas fa-fw fa-book"></i>
                            <span>Edukasi</span>
                        </a>
                        <div id="collapseEdukasi" class="collapse" aria-labelledby="headingEdukasi"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <a class="collapse-item" href="<?php echo base_url('Ikanku/artikel');?>">Artikel</a>
                                <a class="collapse-item" href="<?php echo base_url('Ikanku/video');?>">Video</a>
                            </div>
                        </div>
                    </li>'

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->
