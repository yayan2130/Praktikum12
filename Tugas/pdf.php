<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$sql = mysqli_query($koneksi,"select * from form");
$html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
<tr>
<th> No. </th>
<th> Nama </th>
<th> gender </th>
<th> nisn </th>
<th> nik </th>
<th> tmpt_lahir </th>
<th> tgl_lahir </th>
<th> no_akta </th>
<th> agama </th>
<th> kwn </th>
<th> khusus </th>
<th> alamat </th>
<th> RT </th>
<th> RW </th>
<th> dusun </th>
<th> kelurahan </th>
<th> kecamatan </th>
<th> kode_pos </th>
<th> tempat_tinggal </th>
<th> transportasi </th>
<th> kks </th>
<th> anake </th>
<th> kps </th>
<th> no_kps </th>
</tr>';

$no = 1;
while($row=mysqli_fetch_array($sql)){
	$html .= "<tr>
	<td>".$no."</td>
	<td>".$row['nama']."</td>
	<td>".$row['gender']."</td>
	<td>".$row['nisn']."</td>
	<td>".$row['nik']."</td>
	<td>".$row['tmpt_lahir']."</td>
	<td>".$row['tgl_lahir']."</td>
	<td>".$row['no_akta']."</td>
	<td>".$row['agama']."</td>
	<td>".$row['kwn']."</td>
	<td>".$row['khusus']."</td>
	<td>".$row['alamat']."</td>
	<td>".$row['RT']."</td>
	<td>".$row['RW']."</td>
	<td>".$row['dusun']."</td>
	<td>".$row['kelurahan']."</td>
	<td>".$row['kecamatan']."</td>
	<td>".$row['kode_pos']."</td>
	<td>".$row['tempat_tinggal']."</td>
	<td>".$row['transportasi']."</td>
	<td>".$row['kks']."</td>
	<td>".$row['anake']."</td>
	<td>".$row['kps']."</td>
	<td>".$row['no_kps']."</td>
	</tr>";
	$no++;
}

$html .= "</html>";
$dompdf -> loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf -> setPaper('A2','landscape');
// rendering dari html ke pdf
$dompdf -> render();
// melakukan output file pdf
$dompdf -> stream('laporan_siswa.pdf');

?>