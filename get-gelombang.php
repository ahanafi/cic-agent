<?php
require_once("core/init.php");

if ( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && ( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest' ) ) {

    // Set header type konten.
    header("Content-Type: application/json; charset=UTF-8");

	if (isset($_POST['tanggal']) && $_POST['tanggal'] != "") {
		
		$tanggal = $_POST['tanggal'];
		$gelombang = 0;

		$sql_gelombang = select("*", "gelombang");
		while ($gel = result($sql_gelombang)):
			if($tanggal > $gel->tanggal_awal && $tanggal < $gel->tanggal_akhir) {
				$gelombang = $gel->gelombang;
				break;
			}
		endwhile;

		echo json_encode(['gelombang' => $gelombang]);
	}
} else {
	die("Halaman tidak ditemukan!");
}
?>