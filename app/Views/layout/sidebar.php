<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon ">
            <img class="img-profile rounded-circle" src="/img/logounib.png" alt="" width="80" height="80">
        </div>
        <div class="sidebar-brand-text mx-3">SIPENMAKO</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/beranda">
            <!-- <i class="fas fa-fw fa-tachometer-alt"></i> -->
            <span>Beranda</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Kelola Data
    </div>


    <!-- Nav Item - Progress Proyek -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData" aria-expanded="true" aria-controls="collapseData">
            <!-- <i class="fas fa-fw fa-cog"></i> -->
            <span>Data Proyek</span>
        </a>
        <div id="collapseData" class="collapse" aria-labelledby="headingData" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Pilihan</h6>
                <?php if (session()->get('role_id') == 1) { ?>
                    <a class="collapse-item" href="/datum">Data Umum Proyek</a>
                <?php } ?>
                <a class="collapse-item" href="/timeline">Timeline Projek</a>
                <a class="collapse-item" href="/progres">Progres Proyek</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Kecelakaan Kerja -->
    <li class="nav-item">
        <a class="nav-link" href="/kecelakaan">
            <!-- <i class="fas fa-fw fa-chart-area"></i> -->
            <span>Kecelakaan Kerja</span>
        </a>
    </li>
    <?php if (session()->get('role_id') == 1) { ?>
        <!-- Nav Item - Laporan -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseData2" aria-expanded="true" aria-controls="collapseData2">
                <!-- <i class="fas fa-fw fa-cog"></i> -->
                <span>Cetak Laporan</span>
            </a>
            <div id="collapseData2" class="collapse" aria-labelledby="headingData2" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Pilihan</h6>\
                    <a class="collapse-item" href="/laporan-tahunan">Laporan Tahunan</a>
                    <a class="collapse-item" href="/laporan-proyek">Laporan Proyek</a>
                </div>
            </div>
        </li>
    <?php } ?>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <?php if (session()->get('role_id') == 1) { ?>



        <!-- Heading -->
        <div class="sidebar-heading">
            Master Data
        </div>

        <!-- Nav Item - Akun -->
        <li class="nav-item">
            <a class="nav-link" href="/akun">
                <!-- <i class="fas fa-fw fa-chart-area"></i> -->
                <span>Akun</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    <?php } ?>
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->