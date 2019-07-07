<?php
$no = 1;
$page = getFrom('page');
$agent = select("*", "agent");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">CIC Agent</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Data CIC Agent</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Agent</th>
                            <th>Nama Agent</th>
                            <th>Jenis</th>
                            <th>Keagenan</th>
                            <th>Handphone</th>
                            <th>Grade</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($agen = result($agent)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $agen->kode ?></td>
                            <td><?= $agen->nama ?></td>
                            <td><?= $agen->jenis ?></td>
                            <td><?= $agen->keagenan ?></td>
                            <td><?= $agen->handphone ?></td>
                            <td><?= $agen->grade ?></td>
                            <td>
                                <a href="<?php echo base_url("cic-agent/edit/".$agen->id) ?>" class="btn btn-primary btn-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a onclick="return confirmDelete()" href="<?php echo base_url("cic-agent/delete/".$agen->id) ?>" class="btn btn-danger btn-circle">
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