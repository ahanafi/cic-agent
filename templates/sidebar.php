<?php
$index = "";
$data_guru = "";
$data_siswa = "";
$data_kelas = "";
$responden = "";
$aspek_penilaian = "";
$hasil_penilaian = "";
$detail_penilaian = "";
$grafik = "";

if($page == "") {
    $index = "active";
} elseif($page == "data-guru") {
    $data_guru = "active";
} elseif($page == "data-siswa") {
    $data_siswa = "active";
} elseif ($page == "data-kelas") {
    $data_kelas = "active";
} elseif ($page == "aspek-penilaian") {
    $aspek_penilaian = "active";
} elseif ($page == "responden") {
    $responden = "active";
} elseif ($page == "hasil-penilaian") {
    $hasil_penilaian = "active";
} elseif ($page == "detail-penilaian") {
    $detail_penilaian = "active";
} elseif ($page == "grafik") {
    $grafik = "active";
}

?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="position: fixed;">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <!-- <div class="sidebar-brand-icon rotate-n-15">
        </div> -->
        <div class="sidebar-brand-icon" style="text-align: left;">
            <img src="<?php echo base_url("assets/img/logo3.png") ?>" alt="" style="width:60%;">
        </div>
        <div class="sidebar-brand-text mx-3">CIC Agent</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?= $index; ?>">
        <a class="nav-link" href="<?php echo base_url("index.php") ?>">
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php echo $data_guru; ?>">
            <a class="nav-link" href="<?php echo base_url("cic-agent") ?>">
                <span>CIC Agent</span>
            </a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php echo $data_siswa; ?>">
            <a class="nav-link" href="<?php echo base_url("calon-mahasiswa") ?>">
                <span>Calon Mahasiswa</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?php echo $data_kelas; ?>">
            <a class="nav-link" href="<?php echo base_url("program-studi") ?>">
                <span>Program Studi</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?php echo $data_kelas; ?>">
            <a class="nav-link" href="<?php echo base_url("insentif-registrasi") ?>">
                <span>Insentif Registrasi</span>
            </a>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item <?php echo $data_kelas; ?>">
            <a class="nav-link" href="<?php echo base_url("insentif-agent") ?>">
                <span>Insentif Agent</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            LAPORAN
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item <?php echo $data_siswa; ?>">
            <a class="nav-link" href="<?php echo base_url("laporan") ?>">
                <span>Laporan</span>
            </a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
<!-- End of Sidebar -->