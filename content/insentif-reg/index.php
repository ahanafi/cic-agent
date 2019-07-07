<?php
$insentif = select('*', "insentif");
$no = 1;
$page = getFrom('page');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Insentif Registrasi</h1>
        <div class="btn-group-sm">
            <a href="<?php echo base_url($page."/create") ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="tooltip" title="Tambah <?= ucwords(str_replace("-", " ", $page)) ?>">
                <i class="fas fa-plus text-white-50"></i>
                <span class="text">Tambah Data</span>
            </a>
        </div>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Insentif Registrasi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gelombang</th>
                            <th>Jenjang</th>
                            <th>Grade</th>
                            <th>Reward</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($ins = result($insentif)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?= ($ins->gelombang == 0) ? "All Gelombang" : "Gelombang ".$ins->gelombang; ?>
                            </td>
                            <td><?= $ins->jenjang ?></td>
                            <td><?= $ins->grade ?></td>
                            <td>Rp. <?= number_format($ins->reward) ?></td>
                            <td>
                                <a href="<?php echo base_url($page."/edit/".$ins->id) ?>" class="btn btn-primary btn-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a onclick="return confirmDelete()" href="<?php echo base_url($page."/delete/".$ins->id) ?>" class="btn btn-danger btn-circle">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->