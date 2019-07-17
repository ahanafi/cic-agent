<?php
require_once('vendor/autoload.php');
require_once('core/init.php');

use Dompdf\Dompdf;

if (!cekSessionUser()) {
	redirect(base_url("login"));
} else {

	$action = strtolower(getPost('action'));

	if (isset($_POST['export'], $_POST['awal'], $_POST['akhir']) && $action == "export") {

		$awal = getPost('awal');
		$akhir = getPost('akhir');

	$html = "
	<html>
		<head>
			<title>Hasil Penilaian</title>
		</head>
		<style type='text/css'>
			.center{
				text-align:center;
				vertical-align:middle;
			}
			th{
				vertical-align:middle;
				text-align:center;
			}
			table{
				font-size:12px !important;
			}
		</style>
			<body>
			<h3>Data Perolehan Seluruh Agen PMB CIC 208/2019</h3>
			<table border='1' cellspacing='0' cellpadding='2' style='border-collapse: collapse;width:100%;'>
				<thead>
					<tr>
						<th class='center'>No.</th>
						<th>Jenis Agen</th>
						<th>Jumlah</th>
						<th>Grade</th>
						<th>Kode Agen</th>
						<th>Nama Agen</th>
						<th>Calon Mahasiswa</th>
						<th>Asal Sekolah</th>
						<th>No. Reg.</th>
						<th>Prodi</th>
						<th>Tgl. Reg.</th>
						<th>Reward</th>
						<th>Bonus</th>
						<th>Total</th>
					</tr>
				</thead>
				<tbody>";

				$sql_join = query("
					SELECT agent.*, agent.id AS id_agen, agent.nama as nama_agen, agent.kode as kode_agent,
						calon_mahasiswa.nama as nama_mahasiswa, calon_mahasiswa.*, prodi.*
						FROM calon_mahasiswa JOIN agent ON agent.id = calon_mahasiswa.id_agent
					JOIN prodi ON prodi.id = calon_mahasiswa.id_jurusan
						WHERE calon_mahasiswa.tanggal_registrasi BETWEEN '$awal' AND '$akhir'
					ORDER BY id_agen");
				$nomor = 1;

				$prevID = 0;
				$total_insentif = 0;

				if(cekRow($sql_join) > 0):
					while($data = result($sql_join)):
						$sql_count = select("COUNT(*) AS jumlah", "calon_mahasiswa", "id_agent = '$data->id_agen' AND tanggal_registrasi BETWEEN '$awal' AND '$akhir'");
						$jumlah = result($sql_count)->jumlah;

						if($data->grade == "NON") {
	                        $gelombang = "";
	                    } else {
	                        $gelombang = "gelombang = '$data->gelombang' AND ";
	                    }

	                    $sql_insentif = select("reward", "insentif", " $gelombang jenjang = '$data->jenjang' AND grade = '$data->grade'");
	                    $insentif = result($sql_insentif);

						if($prevID != $data->id_agen) {
							$jumlah = $jumlah;
							$prevID = $data->id_agen;
							$total_insentif = $insentif->reward + 0;
						} else {
							$jumlah = "";
							$total_insentif = $insentif->reward + $total_insentif;							
						}


	$html .=			"<tr>
							<td class='center'>".$nomor++."</td>
							<td>".ucfirst($data->jenis)."</td>
							<td>$jumlah</td>
							<td>$data->grade</td>
							<td>$data->kode_agent</td>
							<td>$data->nama_agen</td>
							<td>$data->nama_mahasiswa</td>
							<td>$data->asal_sekolah</td>
							<td>$data->nomor_registrasi</td>
							<td>$data->jenjang-".singkatanProdi($data->nama_jurusan)."</td>
							<td>$data->tanggal_registrasi</td>
							<td>".number_format($insentif->reward)."</td>
							<td>0</td>
							<td>".number_format($total_insentif)."</td>
						</tr>";					
					endwhile;
				else:
$html .=               "<tr>
							<td colspan='14' style='text-align:center;vertical-align:middle;font-weight:bold;'>
								Tidak ada data.
							</td>
						</tr>";					
				endif;

$html .=       "</tbody>
			</table>
		</body>
	</html>";

/*	echo $html;
	die();*/

	$dompdf = new Dompdf();
	$dompdf->set_option('defaultFont', 'Courier');
	$dompdf->loadHtml($html);

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'landscape');

	// Render the HTML as PDF
	$dompdf->render();

	// // Output the generated PDF to Browser
	$dompdf->stream('Hasil Penilaian.pdf', ['Attachment' => FALSE]);

	} else {
		die("Failed to Export Data!");
	}
}
?>