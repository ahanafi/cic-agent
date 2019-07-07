<?php
require_once('../vendor/autoload.php');
require_once('../core/init.php');

use Dompdf\Dompdf;

$guru_sql = select('*', 'guru');
$no = 1;

$idx = 0;
$guru_arr = [];
while ($gr = result($guru_sql)) {
    $guru_arr[$idx]['nama'] = $gr->nama; 
    $guru_arr[$idx]['kode'] = $gr->kode; 
    $guru_arr[$idx]['id'] = $gr->id; 
    $idx++;
}

$aspek_sql = select('*', 'aspek_penilaian');

?>
<html>
	<head>
		<title></title>
	</head>
	<style type='text/css'>
		.align-middle{
			text-align: center;
			vertical-align: middle;
		}
		#header {margin-bottom: 30px;}
		.text-center{text-align: center;}
		.logo > img{width: 8%;position: fixed;}
		.kop-text{
			display: block;
			text-align: center;
		}
		h1,h2, h3, h4,h5,h6,p{margin:0;}
		.sub-header{margin-bottom: 10px;}
		.sub-header > h2{text-align:center;}
	</style>
	<body>
		<div id='header'>
			<div class='logo'>
				<img src='<?php echo base_url('assets/img/logo-prov-jabar.png') ?>'>
			</div>
			<div class='kop-text'>
				<h3>PEMERINTAH DAERAH PROVINSI JAWA BARAT</h3>
				<h2>DINAS PENDIDIKAN</h2>
				<h1>SMK NEGERI 1 KEDAWUNG</h1>
				<p>
					Jl. Tuparev No. 12 Telp. (0231) 203795 Fax. (0231) 203795, 200653 <br>
					http://smkn1-kedawung.sch.id -- E-mail : kampus@smkn1-kedawung.sch.id <br>
					<b>KABUPATEN CIREBON</b>
				</p>
			</div>
		</div>
		<div class='sub-header'>
			<h2>KEPUASAN PESERTA DIDIK TERHADAP LAYANAN GURU</h2>
			<h2>SMK NEGERI 1 KEDAWUNG KABUPATEN CIREBON</h2>
		<h3 class='nama_kelas'>KELAS : X UPW 1</h3>
		</div>
		<table width='100%' cellspacing='0' border='1' cellpadding='5'>
		    <thead class='bg-dark text-white'>
		        <tr>
		            <th rowspan='2' class='align-middle'>No.</th>
		            <th rowspan='2' class='align-middle text-center' width='280'>Nama Guru</th>
		            <th colspan='9' class='text-center'>Aspek Penilaian</th>
		            <th rowspan='2' class='align-middle' width='70'>Total</th>
		        </tr>
		        <tr>
		            <?php
		                $aspek_arr = [];
		                $index = 0;
		                while($ap = result($aspek_sql)): ?>
		                <th>
		                    <?php
		                        echo $ap->nama_indikator;
		                        $aspek_arr[$index]['id'] = $ap->id;
		                        $index++;
		                    ?>
		                </th>
		            <?php
		                endwhile;
		                $total_nilai = 0;
		            ?>
		        </tr>
		    </thead>
		    <tbody>
		        <?php foreach($guru_arr as $g): ?>
		        <tr>
		            <td class='text-center'><?= $no++; ?></td>
		            <td><?= $g['nama'] ?></td>
		            <?php foreach($aspek_arr as $as): ?>
		                <td class='text-center'>
		                    <?php
		                        $sql_cek = select('SUM(nilai) as nilai', 'penilaian', "kode_guru = '$g[kode]' AND id_aspek_pn = '$as[id]'");

		                        $nilai = result($sql_cek);
		                        $nilai_aspek = 0;
		                        if($nilai->nilai) {
		                            $total_nilai = $total_nilai + $nilai->nilai;
		                            $nilai_aspek = $nilai->nilai;
		                        } else {
		                            $nilai_aspek = 0;
		                        }

		                        echo $nilai_aspek;
		                    ?>
		                </td>
		            <?php endforeach; ?>
		            <td class='text-center font-weight-bold'>
		                <?php echo isset($nilai->nilai) ? $total_nilai : 0; ?>
		            </td>
		        </tr>
		        <?php endforeach; ?>
		    </tbody>
		</table>
	</body>
</html>