<?php
$no = 1;
$page = getFrom('page');
$action = getFrom('action');
$kode = getFrom('kode');

$sql_agent = select("*", "agent", "kode = '$kode'");
$agent = result($sql_agent);
if(cekRow($sql_agent) <= 0) {
    redirect(base_url("insentif-agent"));
}

$calon_mahasiswa = query("SELECT calon_mahasiswa.*, prodi.nama_jurusan, prodi.jenjang, agent.kode AS kode_agent, agent.nama AS nama_agent FROM calon_mahasiswa JOIN prodi ON calon_mahasiswa.id_jurusan = prodi.id JOIN agent ON calon_mahasiswa.id_agent = agent.id WHERE id_agent = '$agent->id'");

$total_reward = 0;
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-2 text-gray-800">Insentif Agent</h1>
    </div>
    
    <?php call_content("insentif-agent", "form-pencarian"); ?>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Agent</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <td>Kode Agent</td>
                        <td>:</td>
                        <td><?= $agent->kode ?></td>
                    </tr>
                    <tr>
                        <td>Nama Agent</td>
                        <td>:</td>
                        <td><?= $agent->nama ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Agent</td>
                        <td>:</td>
                        <td><?= ucfirst($agent->jenis) ?></td>
                    </tr>
                    <tr>
                        <td>Keagenan</td>
                        <td>:</td>
                        <td><?= $agent->keagenan ?></td>
                    </tr>
                    <tr>
                        <td>Handphone</td>
                        <td>:</td>
                        <td><?= $agent->handphone ?></td>
                    </tr>
                    <tr>
                        <td>Grade</td>
                        <td>:</td>
                        <td><?= $agent->grade ?></td>
                    </tr>
                </table>
            </div>
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
                            <th>Tgl. Registrasi</th>
                            <th>Insentif Agent</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($mhs = result($calon_mahasiswa)): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $mhs->nomor_registrasi ?></td>
                            <td><?= $mhs->nama ?></td>
                            <td><?= $mhs->jenjang." - ".singkatanProdi($mhs->nama_jurusan) ?></td>
                            <td class="text-center"><?= $mhs->kode_agent." - ".$mhs->nama_agent ?></td>
                            <td class="text-center"><?= $mhs->gelombang ?></td>
                            <td><?= $mhs->tanggal_registrasi ?></td>
                            <td class="text-right">
                                <?php
                                    if($agent->grade == "NON") {
                                        $gelombang = "";
                                    } else {
                                        $gelombang = "gelombang = '$mhs->gelombang' AND ";
                                    }

                                    $sql_insentif = select("reward", "insentif", " $gelombang jenjang = '$mhs->jenjang' AND grade = '$agent->grade'");

                                    $insentif = result($sql_insentif);
                                    echo "Rp. " .number_format($insentif->reward);
                                    $total_reward += $insentif->reward;
                                ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        <tr class="font-weight-bold">
                            <td colspan="7" class="text-center">TOTAL REWARD</td>
                            <td class="text-right"><?= "Rp. ". number_format($total_reward); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->