<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">CIC Agent</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data</h6>
        </div>
        <div class="card-body mb-4">
            <form action="<?php echo base_url("cic-agent/create") ?>" method="POST">
                <div class="row">
                    <div class="offset-3 col-md-6">
                        <label for="jenis_keagenan" class="form-control-label">Jenis Agen</label>
                        <select name="jenis_keagenan" class="form-control" required>
                            <option>-- Pilih Jenis --</option>
                            <option value="internal">Internal</option>
                            <option value="external">External</option>
                        </select>
                        <br>

                        <label for="kode" class="form-control-label">Kode Agent</label>
                        <input type="text" name="kode_agent" class="form-control" required autocomplete="off" readonly>
                        <br>

                        <label for="nama_agent" class="form-control-label">Nama Agent</label>
                        <input type="text" name="nama_agent" class="form-control" required autocomplete="off">
                        <br>

                        <label for="keagenan" class="form-control-label">Keagenan</label>
                        <input type="text" name="keagenan" class="form-control" required>
                        <br>

                        <label for="handphone" class="form-control-label">Handphone</label>
                        <input type="text" name="handphone" class="form-control" required>
                        <br>

                        <label for="handphone" class="form-control-label">Grade</label>
                        <select name="grade" id="" class="form-control">
                            <option>-- Pilih Grade --</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="NON">NON</option>
                        </select>
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block" type="submit" name="submit">
                                    <span>Simpan</span>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url("cic-agent") ?>" class="btn btn-secondary btn-block">
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
    $kode = getPost('kode_agent');
    $nama = getPost('nama_agent');
    $jenis = getPost('jenis_keagenan');
    $keagenan = getPost('keagenan');
    $handphone = getPost('handphone');
    $grade = getPost('grade');

    if(!empty(trim($kode)) && !empty(trim($nama)) && !empty(trim($jenis)) && !empty(trim($keagenan))) {
        $insert= insert("agent", "kode, nama, jenis, keagenan, handphone, grade", "'$kode', '$nama', '$jenis', '$keagenan', '$handphone', '$grade'");

        if($insert) {
            alert("Data agent berhasil disimpan!", base_url("cic-agent"));
        } else {
            alert("Data agent gagal disimpan!", "back");
        }
    } else {
        alert("Form tidak boleh ada yang kosong!", "back");
    }
}


?>