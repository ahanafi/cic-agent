<?php
require_once("core/init.php");

if (!cekSessionUser()) {
    redirect(base_url("login"));
}

$page = getFrom('page');
$action = getFrom('action');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url("assets/vendor/fontawesome-free/css/all.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/vendor/select2/select2.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/vendor/select2/select2-bootstrap4.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url("assets/css/sb-admin-2.min.css") ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php require_once("templates/sidebar.php"); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column" style="margin-left: 14rem;">

            <!-- Main Content -->
            <div id="content">

                <?php require_once("templates/navbar.php") ?>

                <?php
                    if($page == ""):
                        //DATA FOR PIE CHART
                        require_once("content/main-page.php");

                    # Agent
                    elseif ($page == "cic-agent"):
                        if($action == ""):
                            call_content("agent","index");
                        elseif($action == "create" || $action == "tambah"):
                            call_content("agent", "form-create");
                        elseif($action == "edit"):
                            call_content("agent", "form-edit");
                        elseif($action == "delete"):
                            call_content("agent", "delete");
                        endif;

                    # Calon Mahasiswa
                    elseif ($page == "calon-mahasiswa"):
                        if($action == ""):
                            call_content("mahasiswa","index");
                        elseif($action == "create" || $action == "tambah"):
                            call_content("mahasiswa", "form-create");
                        elseif($action == "edit"):
                            call_content("mahasiswa", "form-edit");
                        elseif($action == "delete"):
                            call_content("mahasiswa", "delete");
                        endif;

                    # Program Studi
                    elseif ($page == "program-studi"):
                        if($action == ""):
                            call_content("prodi","index");
                        elseif($action == "create" || $action == "tambah"):
                            call_content("prodi", "form-create");
                        elseif($action == "edit"):
                            call_content("prodi", "form-edit");
                        elseif($action == "delete"):
                            call_content("prodi", "delete");
                        endif;

                    # Insentf Registrasi
                    elseif ($page == "insentif-registrasi"):
                        if($action == ""):
                            call_content("insentif-reg","index");
                        elseif($action == "create" || $action == "tambah"):
                            call_content("insentif-reg", "form-create");
                        elseif($action == "edit"):
                            call_content("insentif-reg", "form-edit");
                        elseif($action == "delete"):
                            call_content("insentif-reg", "delete");
                        endif;

                    # Insentif Agent
                    elseif ($page == "insentif-agent"):
                        if($action == ""):
                            call_content("insentif-agent","index");
                        elseif($action == "detail"):
                            call_content("insentif-agent", "detail");
                        endif;

                    else:
                        require_once("content/404.php");
                    endif;

                ?>

            </div>
            <!-- End of Main Content -->

            <?php require_once("templates/footer.php"); ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout.</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda yakin akan keluar dari Aplikasi ini. ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?php echo base_url("admin/logout") ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url("assets/vendor/jquery/jquery.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url("assets/vendor/jquery-easing/jquery.easing.min.js") ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url("assets/js/sb-admin-2.min.js") ?>"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url("assets/vendor/chart.js/Chart.min.js") ?>"></script>

    <script src="<?php echo base_url("assets/vendor/datatables/jquery.dataTables.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/vendor/datatables/dataTables.bootstrap4.min.js") ?>"></script>
    <script src="<?php echo base_url("assets/vendor/select2/select2.min.js") ?>"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url("assets/vendor/chart.js/chartjs-plugin-labels.js") ?>"></script>
    <script src="<?php echo base_url("assets/js/demo/datatables-demo.js") ?>"></script>
    <script>
        $(document).ready(function() {
            $("a[data-toggle=tooltip]").tooltip();
            $("#list-kelas").select2({
                theme: 'bootstrap4'
            });
            $('#data').DataTable({
                "ordering": false,
                "info":     false,
                "pageLength": 5
            });
            $("#data2").DataTable();
            $("#data_wrapper > .row:first-child").remove();
            $(".paging_simple_numbers").addClass('float-right');
        });
        function confirmDelete() {
            let ask = confirm("Apakah Anda yakin akan menghapus data ini?");
            return ask;
        }
    </script>
    <?php if($page == "cic-agent"): ?>
        <script type="text/javascript">
            $("select[name=jenis_keagenan]").on('change', function() {
                let jenis = $("select[name=jenis_keagenan] > option:selected").val();
                let URL = '<?= base_url(); ?>/get-kode.php';
                $.ajax({
                    url: URL,
                    method:'POST',
                    data:{'jenis':jenis},
                    success:function(response) {
                        $("input[name=kode_agent]").val(response);
                    }
                });
            });
        </script>
    <?php endif; ?>
</body>

</html>
