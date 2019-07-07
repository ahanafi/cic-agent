<?php
$no = 1;
$page = getFrom('page');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-2 text-gray-800">Insentif Agent</h1>
    </div>
    <?php call_content("insentif-agent", "form-pencarian") ?>
</div>
<!-- /.container-fluid -->

<?php
if (isset($_POST['cari']) && isset($_POST['kode']) && $_POST['kode'] != "") {
    $kode = getPost('kode');

    $sql_cek_kode = select("*", "agent", "kode = '$kode'");
    if(cekRow($sql_cek_kode) > 0) {
        redirect(base_url("insentif-agent/".$kode));
    } else {
        alert("Data agent dengan kode ".$kode." tidak ditemukan!", "back");
    }
}

?>