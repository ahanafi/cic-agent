<?php $kode = getFrom('kode'); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Form Pencarian</h6>
    </div>
    <div class="card-body mb-4">
        <form action="<?php echo base_url("insentif-agent") ?>" method="POST">
            <div class="form-group row">
                <label for="kode_agent" class="font-weight-bold col-form-label col-sm-2 offset-1">Kode Agent</label>
                <div class="col-md-6">
                    <input type="number" value="<?= $kode; ?>" min="100" max="600" name="kode" class="form-control" required placeholder="Masukkan kode Agent" autocomplete="off">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary btn-block" type="submit" name="cari">
                        <span>CARI</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>