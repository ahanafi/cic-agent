<?php
$action = getFrom('action');
$id = getFrom('id');
$prodi = select("*", "prodi", "id = $id");
$pro   = result($prodi);

$list_jenjang = ["D1", "D2", "D3", "D4", "S1", "S2", "S3"];
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Program Studi</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Program Studi</h6>
        </div>
        <div class="card-body mb-4">
            <form action="<?php echo base_url("program-studi/edit/".$id) ?>" method="POST">
                <div class="row">
                    <div class="offset-3 col-md-6">
                        <label for="kode_prodi" class="form-control-label">Kode Program Studi</label>
                        <input type="text" name="kode_prodi" class="form-control" required value="<?= $pro->kode ?>" readonly>
                        <br>

                        <label for="jenjang" class="form-control-label">Jenjang</label>
                        <select name="jenjang" id="" class="form-control" required>
                            <option>-- Pilih Jenjang --</option>
                            <?php foreach ($list_jenjang as $jenjang): ?>
                                <?php if ($pro->jenjang == $jenjang): ?>
                                    <option value="<?= $jenjang ?>" selected><?= $jenjang; ?></option>
                                <?php else: ?>
                                    <option value="<?= $jenjang ?>"><?= $jenjang; ?></option>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </select>
                        <br>

                        <label for="nama_jurusan" class="form-control-label">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" class="form-control" required value="<?= $pro->nama_jurusan ?>">
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block" type="submit" name="submit">
                                    <span>Simpan</span>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url("program-studi") ?>" class="btn btn-secondary btn-block">
                                    <span>Kembali</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php

if (isset($_POST['submit'])) {
    $kode_prodi = getPost('kode_prodi');
    $jenjang = getPost('jenjang');
    $nama_jurusan = getPost('nama_jurusan');

    if(!empty(trim($kode_prodi)) && !empty(trim($jenjang)) && !empty(trim($nama_jurusan))) {
        $update = update("prodi", "kode = '$kode_prodi', jenjang = '$jenjang', nama_jurusan = '$nama_jurusan'", $id);

        if($update) {
            alert("Data program studi baru berhasil diperbarui!", base_url("program-studi"));
        } else {
            alert("Data program studi baru gagal diperbarui!", "back");
        }
    } else {
        alert("Form tidak boleh ada yang kosong!", "back");
    }
}
?>