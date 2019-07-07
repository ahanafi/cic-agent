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
            <form action="<?php echo base_url("program-studi/create") ?>" method="POST">
                <div class="row">
                    <div class="offset-3 col-md-6">
                        <label for="kode_prodi" class="form-control-label">Kode Program Studi</label>
                        <input type="text" name="kode_prodi" class="form-control" required>
                        <br>

                        <label for="jenjang" class="form-control-label">Jenjang</label>
                        <select name="jenjang" id="" class="form-control" required>
                            <option>-- Pilih Jenjang --</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                        <br>

                        <label for="nama_jurusan" class="form-control-label">Nama Jurusan</label>
                        <input type="text" name="nama_jurusan" class="form-control" required>
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

        $cek_kode = select("*", "prodi", "kode = '$kode_prodi'");
        if(cekRow($cek_kode)) {
            alert("Kode Program Studi telah terpakai!.", "back");
        } else {
            $insert= insert("prodi", "kode, jenjang, nama_jurusan", "'$kode_prodi', '$jenjang', '$nama_jurusan'");

            if($insert) {
                alert("Data program studi baru berhasil disimpan!", base_url("program-studi"));
            } else {
                alert("Data program studi baru gagal disimpan!", "back");
            }
        }
    } else {
        alert("Form tidak boleh ada yang kosong!", "back");
    }
}
?>