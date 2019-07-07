<?php
$action = getFrom('action');
$id = getFrom('id');
if($action == "edit" && $id != 0) {
    $agent = select("*", "agent", "id = '$id'");
    $agen   = result($agent);
}

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">CIC Agent</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Data</h6>
        </div>
        <div class="card-body mb-4">
            <form action="<?php echo base_url("cic-agent/edit/".$id) ?>" method="POST">
                <div class="row">
                    <div class="offset-3 col-md-6">
                        <label for="jenis_keagenan" class="form-control-label">Jenis Agen</label>
                        <select name="jenis_keagenan" class="form-control" required>
                            <option>-- Pilih Jenis --</option>
                            <?php if($agen->jenis == "internal"): ?>
                                <option value="internal" selected>Internal</option>
                                <option value="external">External</option>
                            <?php else: ?>
                                <option value="internal">Internal</option>
                                <option value="external" selected>External</option>
                            <?php endif; ?>
                        </select>
                        <br>

                        <label for="kode" class="form-control-label">Kode Agent</label>
                        <input type="text" name="kode_agent" class="form-control" required autocomplete="off" value="<?= $agen->kode ?>">
                        <br>

                        <label for="nama_agent" class="form-control-label">Nama Agent</label>
                        <input type="text" name="nama_agent" class="form-control" required autocomplete="off" value="<?= $agen->nama ?>">
                        <br>

                        <label for="keagenan" class="form-control-label">Keagenan</label>
                        <input type="text" name="keagenan" value="<?= $agen->keagenan ?>" class="form-control" required>
                        <br>

                        <label for="handphone" class="form-control-label">Handphone</label>
                        <input type="text" name="handphone" value="<?= $agen->handphone ?>" class="form-control" required>
                        <br>

                        <label for="handphone" class="form-control-label">Grade</label>
                        <select name="grade" id="" class="form-control">
                            <option>-- Pilih Grade --</option>
                            <?php if($agen->grade == "A"): ?>
                                <option value="A" selected>A</option>
                                <option value="B">B</option>
                                <option value="NON">NON</option>
                            <?php elseif($agen->grade == "B"): ?>
                                <option value="A">A</option>
                                <option value="B" selected>B</option>
                                <option value="NON">NON</option>
                            <?php else: ?>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="NON" selected>NON</option>
                            <?php endif; ?>
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
        $update= update("agent", "kode = '$kode', nama = '$nama', jenis = '$jenis', keagenan = '$keagenan', handphone = '$handphone', grade = '$grade'", $id);

        if($update) {
            alert("Data agent berhasil diperbarui!", base_url("cic-agent"));
        } else {
            alert("Data agent gagal diperbarui!", base_url("cic-agent"));
        }
    } else {
        alert("Form tidak boleh ada yang kosong!", base_url("cic-agent"));
    }
}


?>