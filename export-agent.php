<?php
require_once('vendor/autoload.php');
require_once('core/init.php');

use Dompdf\Dompdf;

if (!cekSessionUser()) {
	redirect(base_url("login"));
} else {

	$kode = escape(getFrom('kode'));
	$agent = select("*", "agent", "kode = '$kode'");
	$cek_agent = cekRow($agent);
	if (isset($_GET['kode']) && $kode != "" && $cek_agent > 0) {

		$sql_agent = select("*", "agent", "kode = '$kode'");
		$agent = result($sql_agent);
		
		$calon_mahasiswa = query("SELECT calon_mahasiswa.*, prodi.nama_jurusan, prodi.jenjang, agent.kode AS kode_agent, agent.nama AS nama_agent FROM calon_mahasiswa JOIN prodi ON calon_mahasiswa.id_jurusan = prodi.id JOIN agent ON calon_mahasiswa.id_agent = agent.id WHERE id_agent = '$agent->id'");
		$total_reward = 0;

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
			<h2>Laporan hasil perolehan Agen CIC</h2><hr>
			<h3 style='margin-top:0px !important;'>1. Data Agent</h3>
			<table border='1' id='dataTable' width='50%' cellspacing='0' cellpadding='5'>
			    <tr>
			        <td>Kode Agent</td>
			        <td>:</td>
			        <td>".$agent->kode."</td>
			    </tr>
			    <tr>
			        <td>Nama Agent</td>
			        <td>:</td>
			        <td>".$agent->nama."</td>
			    </tr>
			    <tr>
			        <td>Jenis Agent</td>
			        <td>:</td>
			        <td>".ucfirst($agent->jenis)."</td>
			    </tr>
			    <tr>
			        <td>Keagenan</td>
			        <td>:</td>
			        <td>".$agent->keagenan."</td>
			    </tr>
			    <tr>
			        <td>Handphone</td>
			        <td>:</td>
			        <td>".$agent->handphone."</td>
			    </tr>
			    <tr>
			        <td>Grade</td>
			        <td>:</td>
			        <td>".$agent->grade."</td>
			    </tr>
			    <tr>
			        <td>Bonus</td>
			        <td>:</td>
			        <td>";
			            
		                $sql_hitung = select('*', 'calon_mahasiswa', "id_agent = '$agent->id'");
		                $sql_bonus = select('*', 'bonus', 'id = 1');
		                $bonus = result($sql_bonus);

		                if(cekRow($sql_hitung) > $bonus->jumlah_minimal) {
		                    $html .= "Rp. " . number_format($bonus->reward);
		                } else {
		                    $html .= "Rp. 0";
		                }

$html   		.= "</td>
			    </tr>
			</table>
			<br>
			<h3>2. Daftar Calon Mahasiswa</h3>
			<table border='1' id='dataTable' width='100%' cellspacing='0' cellpadding='5'>
			    <thead>
			        <tr>
			            <th>No.</th>
			            <th>No. Registrasi</th>
			            <th>Nama</th>
			            <th>Prodi</th>
			            <th>Agent</th>
			            <th>Gelombang</th>
			            <th>Tgl. Registrasi</th>
			            <th>Insentif Agent</th>
			        </tr>
			    </thead>
			    <tbody>";
			    	$no = 1;
			        while($mhs = result($calon_mahasiswa)):
$html 			.= 	"<tr>
			            <td>".$no."</td>
			            <td>".$mhs->nomor_registrasi."</td>
			            <td>".$mhs->nama."</td>
			            <td>".$mhs->jenjang.' - '.singkatanProdi($mhs->nama_jurusan)."</td>
			            <td class='text-center'>".$mhs->kode_agent.' - '.$mhs->nama_agent."</td>
			            <td class='text-center'>".$mhs->gelombang."</td>
			            <td>".$mhs->tanggal_registrasi."</td>
			            <td class='text-right'>";

			                    if($agent->grade == 'NON') {
			                        $gelombang = '';
			                    } else {
			                        $gelombang = "gelombang = '$mhs->gelombang' AND ";
			                    }

			                    $sql_insentif = select('reward', 'insentif',  "$gelombang jenjang = '$mhs->jenjang' AND grade = '$agent->grade'");

			                    $insentif = result($sql_insentif);
			                    $html .= "Rp. " .number_format($insentif->reward);
			                    $total_reward = $total_reward + $insentif->reward;
$html .= 				"</td>
			        </tr>";
			        $no++;
			        endwhile;

$html .= 			"<tr class='font-weight-bold'>
			            <td colspan='7' class='text-center'>TOTAL REWARD</td>
			            <td class='text-right'>Rp. ".number_format($total_reward)."</td>
			        </tr>
			    </tbody>
			</table>
		</body>
	</html>";

	$dompdf = new Dompdf();
	$dompdf->set_option('defaultFont', 'Courier');
	$dompdf->loadHtml($html);

	// (Optional) Setup the paper size and orientation
	$dompdf->setPaper('A4', 'landscape');

	// Render the HTML as PDF
	$dompdf->render();

	// // Output the generated PDF to Browser
	$dompdf->stream("Laporan hasil Agen $agent->nama.pdf", ['Attachment' => FALSE]);

	} else {
		die("Failed to Export Data!");
	}
}
?>