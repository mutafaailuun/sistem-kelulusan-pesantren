<?php
function tgl_indo($tanggal)
{
  $bulan = array(
    1 => 'Januari',
    'Februari',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agustus',
    'September',
    'Oktober',
    'November',
    'Desember'
  );
  $pecahkan = explode('/', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[0] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[2];
}

include "../config.php";
$nisn = $_POST['nisn']; //get the nama value from form
$q = "SELECT * from tbl_camaba where nisn = '$nisn' "; //query to get the search result
$result = mysqli_query($koneksi, $q); //execute the query $q
$num_rows = mysqli_num_rows($result);

if ($num_rows == 0)
  include "no-result.php";
else
  echo "
    <div class='well' style='margin-bottom: 50px; display: flex; flex-direction: column;'>";
echo "<img src='images/logo-mdu.png' width='200' style='margin-left: auto; margin-right:auto'> ";
echo "<table min-width='100' class='table table-striped table-bordered'>";
while ($data = mysqli_fetch_array($result)) { //fetch the result from query into an array
  echo "
  <tr class='success'>
    <td colspan='4' align='center'><font color='#000000' size='4' style='font-weight: bold;';><b>IDENTITAS PESERTA DIDIK</b></td>
  </tr>
  <tr><td>Nama Lengkap</td>
    <td colspan='3'><font style='text-transform: capitalize;'><strong>:  " . $data['name'] . "</strong></font></td>
  </tr>

  <tr class='secondary'><td width='250'>Nomor Peserta </td>
    <td width='480'><strong>:  " . $data['nisn'] . "</strong></td>
  </tr>
  
  <tr class='secondary'><td>Tempat/ Tgl. Lahir</td>
    <td colspan='3'><font style='text-transform: uppercase;'><strong>:  " . $data['addresse'] . ", " . tgl_indo($data['tgl_lhr']) . "</strong></font></td>
  </tr>
  
  <tr><td>Asal Sekolah</td>
    <td colspan='3'><font style='text-transform: capitalize;'><strong>: " . $data['asal_sekolah'] . "</strong></font></td>
  </tr>

  <tr class='success'>
    <td colspan='4' align='center'><font color='#000000' size='4' style='font-weight: bold;';>STATUS KELULUSAN DINYATAKAN</td>
  </tr>
  <tr>
    <td colspan='4' align='center'><font color='#0066FF' size='6' style='text-transform: uppercase;'><b>" . $data['ket'] . "</b></td>
  </tr>
  <tr class='success'>
    <td colspan='4' align='center'><b>Apapun hasil yang didapat, semoga ini adalah yang terbaik, tetap semangat dan optimis.</b></td>
  </tr>
  <tr class='danger'>
    <td colspan='4' align='center'>
    <b>Catatan:</b> Jika ada perbedaan data pengumuman online dan manual,<br>maka yang menjadi acuan adalah dokumen asli Kelulusan yang telah disahkan,<br>ditandatangani oleh Kepala Sekolah <b>$data[sekolah] dan 
    diberi cap basah sekolah.
    </td>
  </tr>
  </table>";

  echo "
    <div class='form-group' style='margin-bottom: -10px;'>
      <p align='center'>
        <a href='caridata' class='btn btn-xs btn-info'><span class='glyphicon glyphicon-home' aria-hidden='true'></span><b>&nbsp; KEMBALI HOME</b></a>
      </p>
    </div>";
}