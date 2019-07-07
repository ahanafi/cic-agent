<?php
$id = getFrom('id');
$insentif_sql = select("*", "insentif", "id = '$id'");
$ins = result($insentif_sql);
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Insentif Registrasi</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Insentif Registrasi</h6>
        </div>
        <div class="card-body mb-4">
            <form action="<?php echo base_url("insentif-registrasi/edit/".$ins->id) ?>" method="POST">
                <div class="row">
                    <div class="offset-3 col-md-6">
                        <label for="jenjang" class="form-control-label">Gelombang Pendaftaran</label>
                        <select name="gelombang" class="form-control">
                            <option value="0">-- Pilih Gelombang --</option>
                            <?php if ($ins->gelombang == 1): ?>
                                <option value="1" selected>Gelombang 1</option>
                                <option value="2">Gelombang 2</option>
                                <option value="3">Gelombang 3</option>
                            <?php elseif ($calon->gelombang == 2): ?>
                                <option value="1">Gelombang 1</option>
                                <option value="2" selected>Gelombang 2</option>
                                <option value="3">Gelombang 3</option>
                            <?php elseif ($calon->gelombang == 3): ?>
                                <option value="1">Gelombang 1</option>
                                <option value="2">Gelombang 2</option>
                                <option value="3" selected>Gelombang 3</option>
                            <?php else: ?>
                                <option value="1">Gelombang 1</option>
                                <option value="2">Gelombang 2</option>
                                <option value="3">Gelombang 3</option>
                            <?php endif ?>
                        </select>
                        <br>

                        <label for="jenjang" class="form-control-label">Jenjang</label>
                        <select name="jenjang" id="" class="form-control" required>
                            <option>-- Pilih Jenjang --</option>
                            <?php if ($ins->jenjang == "S1"): ?>
                                <option value="D3">D3</option>
                                <option value="S1" selected>S1</option>
                            <?php else: ?>
                                <option value="D3" selected>D3</option>
                                <option value="S1">S1</option>
                            <?php endif ?>
                        </select>
                        <br>

                        <label for="grade" class="form-control-label">Grade</label>
                        <select name="grade" id="" class="form-control" required>
                            <option>-- Pilih Grade --</option>
                            <?php if ($ins->grade == "A"): ?>
                                <option value="A" selected>A</option>
                                <option value="B">B</option>
                                <option value="NON">NON</option>
                            <?php elseif ($inst->grade == "B"): ?>
                                <option value="A">A</option>
                                <option value="B" selected>B</option>
                                <option value="NON">NON</option>
                            <?php else: ?>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="NON" selected>NON</option>
                            <?php endif ?>
                        </select>
                        <br>

                        <label for="reward" class="form-control-label">Reward (Rp.)</label>
                        <input type="text" name="reward" class="form-control" required value="<?= $ins->reward; ?>">
                        <br>

                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block" type="submit" name="submit">
                                    <span>Simpan</span>
                                </button>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php echo base_url("insentif-registrasi") ?>" class="btn btn-secondary btn-block">
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
    $gelombang = getPost('gelombang');
    $jenjang = getPost('jenjang');
    $grade = getPost('grade');
    $reward = getPost('reward');

    if(!empty(trim($jenjang)) && !empty(trim($grade)) && !empty(trim($reward))) {
        $update = update("insentif", "gelombang = '$gelombang', jenjang = '$jenjang', grade = '$grade', reward = '$reward'", $id);

        if($update) {
            alert("Data insentif registrasi berhasil disimpan!", base_url("insentif-registrasi"));
        } else {
            alert("Data insentif registrasi gagal disimpan!", "back");
        }
    } else {
        alert("Form tidak boleh ada yang kosong!", "back");
    }
}
?>