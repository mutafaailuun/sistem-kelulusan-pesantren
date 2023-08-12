<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>SIK ONLINE &copy SISTEM INFORMASI KELULUSAN ONLINE</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="../images/logo.png">
    <style type="text/css">
        @import "style.css";
    </style>
</head>

<body style="background: url('../images/bg.png') repeat;">
    <div class="container" style="height: 100%; display: flex; justify-content: center;">
        <table>
            <tr>
                <td style="padding: 10px;">
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
                    // $no = $_GET['no'];
                    // $q = mysqli_query($koneksi, "SELECT * FROM tb_student WHERE no = '$no'");

                    $arr = array(1, 2, 3, 4, 5, 6, 7);
                    // $in = implode("','", $nomor_urut);
                    $aa = mysqli_query($koneksi, "SELECT * FROM tbl_mapel WHERE no_urut IN ('" . implode("','", $arr) . "') ORDER BY no_urut ASC");
                    // $data1 = mysqli_fetch_array($aa);
                    while ($data1 = mysqli_fetch_array($aa)) {
                        if ($data1['no_urut'] == 3) {
                            echo $data1['nm_mapel'];
                        }
                    }



                    ?>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>