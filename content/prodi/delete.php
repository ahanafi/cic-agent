<?php
$action = getFrom('action');
$id = getFrom('id');
if ($action == "delete" && $id != 0) {
    $delete = delete("prodi", $id);
    if ($delete) {
        alert("Data program studi berhasil dihapus!", base_url("program-studi"));
    } else {
        alert("Data program studi gagal dihapus!", "back");
    }
}
?>