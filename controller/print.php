<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>ctk_print_skl</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <style type="text/css">
        @import "style.css";

        .tab1 td {
            border: 1px solid darkgray;
            border-collapse: collapse;
            padding: 0 10px;
            margin-left: auto;
            margin-right: auto;
        }

        .tab2 {
            border: none;
        }
    </style>
    </style>

</head>

<body style="background: url('../images/bg.png') repeat;">
    <div class="container">
        <div class="row" style="margin-top: 5px;">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="wellprint">
                    <table width='100%' class="tab2">
                        <tr>
                            <!-- Awal pengaturan KOP Surat Kelulusan Siswa -->
                            <td width='20%'>
                                <p align='left'><img src='../images/logo.png' height='90' /></p>
                            </td>
                            <td>
                                <h4 align='center'><b>KEMENTERIAN AGAMA</br>MADRASAH ALIYAH NEGERI 2 SITUBONDO</b></h4>
                                <p align='center'>Jalan Argopuro No. 55 (0338) 671983 Situbondo 68322</p>
                                <p align='center' style="margin-top: -10px;">E-mail : office@man2situbondo.sch.id</p>
                            </td>
                            <td width='20%'>
                                <p align='right'><img src='../images/logo_sekolah.png' height='90' /></p>
                            </td>
                            <!-- Akhir pengaturan KOP Surat Kelulusan Siswa -->
                        </tr>
                    </table>
                    <hr style="margin-top: -5px;">
                    <?php
                    function tgl_indo($tanggal)
                    {
                        $bulan = array(
                            1 =>   'Januari',
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
                        return $pecahkan[0] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[2];
                    }
                    include('config.php');
                    $no = $_GET['no'];
                    $q = mysqli_query($koneksi, "SELECT * FROM tbl_siswa INNER JOIN tbl_jurusan ON tbl_siswa.kd_jurusan = tbl_jurusan.kd_jurusan WHERE no = '$no'");
                    $arr = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27);
                    $aa = mysqli_query($koneksi, "SELECT * FROM tbl_mapel WHERE no_urut IN ('" . implode("','", $arr) . "') ORDER BY no_urut ASC");
                    while ($data = mysqli_fetch_array($q)) {
                        echo "  <table width='100%' class='tab2'>";
                        echo "  <tr class='success'>
                                    <td colspan='4' align='center'><font color='#000000' size='3' style='font-weight: bold;';><b>IDENTITAS PESERTA DIDIK</b></td>
                                </tr>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td colspan='3'><font style='text-transform: capitalize;'><strong>:  " . $data['name'] . "</strong></font></td>
                                </tr>
                                <tr class='secondary'><td width='150'>NISN </td>
                                    <td><strong>:  " . $data['nisn'] . "</strong></td>
                                </tr>
                                <tr><td>Kelas</td>
                                    <td colspan='3'><strong>:  " . $data['kelas'] . "</strong></td>
                                </tr>
                                <tr class='secondary'><td>Tempat/ Tgl. Lahir</td>
                                    <td colspan='3'><font style='text-transform: uppercase;'><strong>:  " . $data['addresse'] . ", " . tgl_indo($data['tgllhr']) . "</strong></font></td>
                                </tr>
                                <tr><td>Asal Sekolah</td>
                                    <td colspan='3'><font style='text-transform: capitalize;'><strong>: " . $data['sekolah'] . "</strong></font></td>
                                </tr>
                                <tr class='success'>
                                    <td colspan='4' align='center'><font color='#000000' size='3' style='font-weight: bold;';><br>STATUS KELULUSAN DINYATAKAN</td>
                                </tr>
                                <tr class='warning'>
                                    <td colspan='4' align='center'><font color='#0066FF' size='5' style='text-transform: uppercase;'><b>" . $data['ket'] . "</b></td>
                                </tr>
                                <tr class='danger'>
                                    <td colspan='4' align='left'>
                                        <p style='text-indent: 40px;'><b>Catatan:</b> Jika ada perbedaan data pengumuman online dan manual, maka yang menjadi acuan 
                                        adalah dokumen asli Kelulusan yang telah disahkan, ditandatangani oleh Kepala Sekolah <b>" . $data['sekolah'] . "</b> dan 
                                        diberi cap basah sekolah</p>.
                                    </td>
                                </tr>
                                </table>";
                        // echo "<div class='page_break_after'></div>";
                        echo "  <table width='100%' class='tab1'>
                                <tr class='success'>
                                    <td colspan='3' align='center'><font color='#000000' size='4' style='font-weight: bold;'>DAFTAR NILAI MADRASAH</td>
                                </tr>
                                <tr class='danger'>
                                    <td width='480'><strong>Nama Mata Pelajaran</strong></td>
                                    <td width='100' align='center'><strong> Nilai </strong></td>
                                </tr>
                                <tr class='warning'>
                                    <td colspan='3' align='center'><b>Kelompok A (Umum)</b></td>
                                </tr> 
                                <tr>
                                    <td colspan='3'>1. Pendidikan Agama Islam</td>
                                </tr>";
                        while ($data1 = mysqli_fetch_array($aa)) {
                            if ($data1['no_urut'] == 1) {
                                echo "  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp; a. $data1[nm_mapel]</td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai1'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 2) {
                                echo "  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp; b. $data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai2'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 3) {
                                echo "  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp; c. $data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai3'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 4) {
                                echo "  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp; d. $data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai4'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 5) {
                                echo "  <tr><td>2.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai5'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 6) {
                                echo "  <tr><td>3.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai6'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 7) {
                                echo "  <tr><td>4.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai7'] . "</strong></td>
                                        </tr>";;
                            }
                            if ($data1['no_urut'] == 8) {
                                echo "  <tr><td>5.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai8'] . "</strong></td>
                                        </tr>";;
                            }
                            if ($data1['no_urut'] == 9) {
                                echo "  <tr><td>6.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai9'] . "</strong></td>
                                        </tr>";;
                            }
                            if ($data1['no_urut'] == 10) {
                                echo "  <tr><td>7.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai10'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 11) {
                                echo "  <tr class='warning'>
                                            <td colspan='3' align='center'><b>Kelompok B (Umum)</b></td>
                                        </tr>";
                                echo "  <tr><td>1.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai11'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 12) {
                                echo "  <tr><td>2.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai12'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 13) {
                                echo "  <tr><td>3.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai13'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data1['no_urut'] == 14) {
                                echo "  <tr><td>4. Mulok:&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai14'] . "</strong></td>
                                        </tr>";
                            }
                            if ($data['nm_jurusan'] == "IPA") {
                                if ($data1['no_urut'] == 15) {
                                    echo "  <tr class='warning'>
                                                <td colspan='3' align='center'><b>Kelompok C (Peminatan)</b></td>
                                            </tr>";
                                    echo "  <tr><td>1.&nbsp;$data1[nm_mapel] </td>
                                                    <td colspan='3' align='center'><strong> " . $data['nilai15'] . "</strong></td>
                                            </tr>";
                                }
                                if ($data1['no_urut'] == 16) {
                                    echo "  <tr><td>2.&nbsp;$data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai16'] . "</strong></td>
                                            </tr>";
                                }
                                if ($data1['no_urut'] == 17) {
                                    echo "  <tr><td>3.&nbsp;$data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai17'] . "</strong></td>
                                            </tr>";
                                }
                                if ($data1['no_urut'] == 18) {
                                    echo "  <tr><td>4.&nbsp;$data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai18'] . "</strong></td>
                                            </tr>";
                                }
                                if ($data1['no_urut'] == 23) {
                                    echo "  <tr class='warning'>
                                                <td colspan='3'>5. Pilihan Lintas Minat/Pendalaman Minat</td>
                                            </tr>";
                                    echo "  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp; a. $data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai23'] . "</strong></td>
                                            </tr>";
                                }
                                if ($data1['no_urut'] == 24) {
                                    echo "  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp; b. $data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai24'] . "</strong></td>
                                            </tr>";
                                }
                            } else {
                                if ($data1['no_urut'] == 19) {
                                    echo "  <tr class='warning'>
                                            <td colspan='3' align='center'><b>Kelompok C (Peminatan)</b></td>
                                        </tr>";
                                    echo "  <tr><td>1.&nbsp;$data1[nm_mapel] </td>
                                            <td colspan='3' align='center'><strong> " . $data['nilai19'] . "</strong></td>
                                        </tr>";
                                }
                                if ($data1['no_urut'] == 20) {
                                    echo "  <tr><td>2.&nbsp;$data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai20'] . "</strong></td>
                                            </tr>";
                                }
                                if ($data1['no_urut'] == 21) {
                                    echo "  <tr><td>3.&nbsp;$data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai21'] . "</strong></td>
                                            </tr>";
                                }
                                if ($data1['no_urut'] == 22) {
                                    echo "  <tr><td>4.&nbsp;$data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai22'] . "</strong></td>
                                            </tr>";
                                }
                                if ($data1['no_urut'] == 25) {
                                    echo "  <tr class='warning'>
                                                <td colspan='3'>5. Pilihan Lintas Minat/Pendalaman Minat</td>
                                            </tr>";
                                    echo "  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp; a. $data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai25'] . "</strong></td>
                                            </tr>";
                                }
                                if ($data1['no_urut'] == 26) {
                                    echo "  <tr><td>&nbsp;&nbsp;&nbsp;&nbsp; b. $data1[nm_mapel] </td>
                                                <td colspan='3' align='center'><strong> " . $data['nilai26'] . "</strong></td>
                                            </tr>";
                                }
                            }
                        }
                        echo "</table>";
                    }
                    ?>
                </div>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>