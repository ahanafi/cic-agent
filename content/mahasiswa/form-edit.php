<?php
$id = getFrom('id');

$prodi = select("*", "prodi");
$agent = select("*", "agent");
$page = getFrom('page');

$calon_mahasiswa = query("SELECT * FROM calon_mahasiswa WHERE id = '$id'");
$calon = result($calon_mahasiswa);

?>

<style>
    .select2-container--bootstrap4 .select2-dropdown .select2-results__option[aria-selected=true] {
        background-color: #4f85bb !important;
        color: #fff !important;
    }
</style>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Calon Mahasiswa</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Calon Mahasiswa</h6>
        </div>
        <div class="card-body mb-4">
            <form action="<?php echo base_url("calon-mahasiswa/edit/".$id) ?>" method="POST">
                <div class="row">
                    <div class="col-md-5 offset-1">
                        <label for="nomor_registrasi" class="form-control-label">Nomor Registrasi</label>
                        <input type="text" name="nomor_registrasi" class="form-control" required value="<?= $calon->nomor_registrasi ?>">
                        <br>

                        <label for="nama" class="form-control-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" required value="<?= $calon->nama ?>">
                        <br>

                        <label for="asal_sekolah" class="form-control-label">Asal Sekolah</label>
                        <input type="text" name="asal_sekolah" class="form-control" required value="<?= $calon->asal_sekolah ?>">
                        <br>

                        <label for="prodi" class="form-control-label">Program Studi</label>
                        <select name="prodi" id="list-prodi" class="form-control" required>
                            <option>-- Pilih Program Studi --</option>
                            <?php while($pro = result($prodi)): ?>
                                <?php if ($calon->id_jurusan == $pro->id): ?>
                                    <option value="<?php echo $pro->id ?>" selected><?php echo $pro->jenjang." - ". $pro->nama_jurusan; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $pro->id ?>"><?php echo $pro->jenjang." - ". $pro->nama_jurusan; ?></option>
                                <?php endif ?>
                            <?php endwhile; ?> 
                        </select>
                        <br>
                    
                    </div>

                    <div class="col-md-5">
                        <label for="kelas" class="form-control-label">Agent</label>
                        <select name="agent" id="list-kelas" class="form-control" required>
                            <option>-- Pilih Agent --</option>
                            <?php while($agen = result($agent)): ?>
                                <?php if ($calon->id_agent == $agen->id): ?>
                                    <option value="<?php echo $agen->id ?>" selected><?php echo $agen->kode." - ". $agen->nama; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $agen->id ?>"><?php echo $agen->kode." - ". $agen->nama; ?></option>
                                <?php endif ?>
                            <?php endwhile; ?> 
                        </select>
                        <br><br>

                        <label for="tanggal" class="form-control-label">Tanggal Registrasi</label>
                        <input type="text" name="tanggal" class="form-control" required placeholder="Format tanggal : YYYY-MM-DD" value="<?= $calon->tanggal_registrasi ?>">
                        <br>

                        <label for="gelombang" class="form-control-label">Gelombang Pendaftaran</label>
                        <input type="text" name="gelombang" class="form-control" value="<?= "Gelombang $calon->gelombang"; ?>" readonly>
                        <br><br>
                            
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <button class="btn btn-block btn-primary" type="submit" name="submit">
                                    <span>Simpan</span>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url($page) ?>" class="btn btn-block btn-secondary">
                                    <span>Kembali</span>
                                </a>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php

if (isset($_POST['submit'])) {
    $nomor_registrasi = getPost('nomor_registrasi');
    $nama = getPost('nama');
    $asal_sekolah   = getPost('asal_sekolah');
    $prodi = getPost('prodi');
    $agent = getPost('agent');
    $gelombang = getPost('gelombang');
    $tanggal = getPost('tanggal');

    $gelombang = explode(" ", $gelombang);
    $gelombang = $gelombang[1];

    if((empty(trim($nomor_registrasi))) || (empty(trim($nama))) || (empty(trim($asal_sekolah))) || (empty(trim($prodi))) || (empty(trim($agent))) || (empty(trim($gelombang))) || (empty(trim($tanggal)))) {
        alert("Form tidak boleh ada yang kosong!", "back");
    } else {
        $nama = addslashes($nama);
        $update = update("calon_mahasiswa", "nomor_registrasi = '$nomor_registrasi', nama = '$nama', asal_sekolah = '$asal_sekolah', id_jurusan = '$prodi', id_agent = '$agent', gelombang = '$gelombang', tanggal_registrasi = '$tanggal'", $id);

        if($update) {
            alert("Data calon mahasiswa berhasil diperbarui!", base_url("calon-mahasiswa"));
        } else {
            alert("Data calon mahasiswa gagal diperbarui!", base_url("calon-mahasiswa"));
        }
    }
}


?>