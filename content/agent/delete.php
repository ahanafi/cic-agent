<?php
$action = getFrom('action');
$id = getFrom('id');
if ($action == "delete" && $id != 0) {
    $delete = delete("agent", $id);
    if ($delete) {
        alert("Data agent berhasil dihapus!", base_url("cic-agent"));
    } else {
        alert("Data agent gagal dihapus!", "back");
    }
}
?>