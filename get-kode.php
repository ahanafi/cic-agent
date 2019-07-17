<?php
require_once("core/init.php");
if (isset($_POST['jenis']) && $_POST['jenis'] != "") {
	$jenis = $_POST['jenis'];
	$sql = query("SELECT MAX(kode) AS kode FROM agent WHERE jenis = '$jenis'");
	$kode_db = result($sql);
	$kode_db = (int) $kode_db->kode;
	$kode_real = "";
	if($kode_db == 0) {
		if($jenis == "external") {
			$kode_real = 101;
		} else {
			$kode_real = 301;
		}
	} else {
		$kode_real = ($kode_db + 1);
	}
	echo $kode_real;
}
?>