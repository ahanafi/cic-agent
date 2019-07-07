<?php
$calon_mahasiswa = query("SELECT calon_mahasiswa.*, prodi.nama_jurusan, prodi.jenjang, agent.kode AS kode_agent, agent.nama AS nama_agent FROM calon_mahasiswa JOIN prodi ON calon_mahasiswa.id_jurusan = prodi.id JOIN agent ON calon_mahasiswa.id_agent = agent.id");
$no = 1;
$page = getFrom('page');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-0 text-gray-800">Calon Mahasiswa</h1>
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
            <h6 class="m-0 font-weight-bold text-primary">Daftar Calon Mahasiswa</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>No. Registrasi</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Agent</th>
                            <th>Gelombang</th>
                            <th>Tgl. Reg</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($mhs = result($calon_mahasiswa)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $mhs->nomor_registrasi ?></td>
                            <td><?= $mhs->nama ?></td>
                            <td><?= $mhs->jenjang." - ".singkatanProdi($mhs->nama_jurusan) ?></td>
                            <td><?= $mhs->kode_agent." - ".$mhs->nama_agent ?></td>
                            <td><?= $mhs->gelombang ?></td>
                            <td><?= $mhs->tanggal_registrasi ?></td>
                            <td>
                                <a href="<?php echo base_url($page."/edit/".$mhs->id) ?>" class="btn btn-primary btn-circle">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <a onclick="return confirmDelete()" href="<?php echo base_url($page."/delete/".$mhs->id) ?>" class="btn btn-danger btn-circle">
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