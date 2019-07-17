<?php
$no = 1;
$page = getFrom('page');
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <h1 class="h3 mb-2 text-gray-800">Laporan</h1>
    </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Laporan</h6>
            </div>
            <div class="card-body mb-4">
                <form action="<?php echo base_url("laporan/export") ?>" method="POST" target="_blank">
                    
                    <div class="form-group row">
                        <label for="kode_agent" class="font-weight-bold col-form-label col-sm-2 offset-1">Tanggal Awal</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="awal" placeholder="Format Tanggal : YYYY-MM-DD">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="kode_agent" class="font-weight-bold col-form-label col-sm-2 offset-1">Tanggal Akhir</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="akhir" placeholder="Format Tanggal : YYYY-MM-DD">
                            <input type="hidden" name="action" value="export">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2 offset-3">
                            <button class="btn btn-primary btn-block" type="submit" name="export">
                                <span>Export</span>
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>    
</div>
<!-- /.container-fluid -->
