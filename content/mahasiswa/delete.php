<?php
$action = getFrom('action');
$id = getFrom('id');
if ($action == "delete" && $id != 0) {
    $delete = delete("calon_mahasiswa", $id);
    if ($delete) {
        alert("Data calon mahasiswa berhasil dihapus!", base_url("calon-mahasiswa"));
    } else {
        alert("Data calon mahasiswa gagal dihapus!", "back");
    }
}
?>