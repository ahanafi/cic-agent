<?php
$action = getFrom('action');
$id = getFrom('id');
if ($action == "delete" && $id != 0) {
    $delete = delete("insentif", $id);
    if ($delete) {
        alert("Data insentif registrasi berhasil dihapus!", "back");
    } else {
        alert("Data insentif registrasi gagal dihapus!", "back");
    }
}
?>