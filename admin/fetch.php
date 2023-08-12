<?php

$connect = new PDO("mysql:host=localhost; dbname=db_sik", "root", "");
$limit = '5';
$page = 1;
if ($_POST['page'] > 1) {
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
} else {
  $start = 0;
}

$query = '
SELECT * FROM tbl_camaba';

if ($_POST['query'] != '') {
  $query .= '
  WHERE name LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" OR nisn LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%" OR ket LIKE "%' . str_replace(' ', '%', $_POST['query']) . '%"
  ';
}

$query .= 'ORDER BY name ASC ';

$filter_query = $query . 'LIMIT ' . $start . ', ' . $limit . '';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<table class="table table-striped table-bordered">
<thead class="bg-danger text-white">
            <th>NO</th>
            <th>NISN</th>
            <th>NAMA SISWA</th>
            <th>TEMPAT TANGGAL LAHIR</th>
            <th>KELAS</th>
            <th>JURUSAN</th>
            <th>KELULUSAN</th>
            <th>AKSI</th>
        </thead>
';

if ($total_data > 0) {
  $i = 1;
  foreach ($result as $row) {
    $output .= '
    <tr class="content">
      <td style="text-transform: uppercase;">' . $i++ . '</td>
      <td style="text-transform: uppercase;">' . $row["nisn"] . '</td>
      <td style="text-transform: uppercase;">' . $row["name"] . '</td>
      <td style="text-transform: uppercase;">' . $row["addresse"] . ", " . $row["tgl_lhr"] . '</td>
      <td style="text-transform: uppercase;">' . $row["ket"] . '</td>
      <td>' .
      '<div class="btn-group" role="group" aria-label="...">
      <a href="addnilai.php?no=' . $row["no"] . '"class="btn btn-xs btn-warning" title="Nilai"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;Nilai</a>
      <a href="editsiswa.php?no=' . $row["no"] . '"class="btn btn-xs btn-info" title="Edit"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp;Edit</a>
      <a href="adm-delete.php?no=' . $row["no"] . '" class="btn btn-xs btn-danger" title="Hapus"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Del</a>
      </div>' . '</td>
    </tr>
    ';
  }
} else {
  $output .= '
  <tr>
    <td colspan="7" align="center">Tidak Menemukan Data</td>
  </tr>
  ';
}

$output .= '
</table>
<nav style="margin: -2px 0px;">
<ul class="pagination pagination-sm justify-content-end">
<li class="page-item disabled">
    <a href="hapussiswa" class="page-link">TOTAL DATA - ' . $total_data . '</a>
</li>
</ul>
  <ul class="pagination pagination-sm justify-content-end">
';

$total_links = ceil($total_data / $limit);
$previous_link = '';
$next_link = '';
$page_link = '';

if ($total_links > 4) {
  if ($page < 5) {
    for ($count = 1; $count < 5; $count++) {
      $page_array[] = $count;
    }
    // $page_array[] = '...';
    // $page_array[] = $total_links;
  } else {
    $end_limit = $total_links - 5;
    if ($page > $end_limit) {
      $page_array[] = 1;
      // $page_array[] = '...';
      for ($count = $end_limit; $count < $total_links; $count++) {
        $page_array[] = $count;
      }
    } else {
      $page_array[] = 1;
      // $page_array[] = '...';
      for ($count = $page - 1; $count < $page + 1; $count++) {
        $page_array[] = $count;
      }
      // $page_array[] = '...';
      // $page_array[] = $total_links;
    }
  }
} else {
  for ($count = 1; $count < $total_links; $count++) {
    $page_array[] = $count;
  }
}
// if (!$total_data == 0) {
$page_array[] = $count;
for ($count = 0; $count < count($page_array); $count++) {
  if ($page == $page_array[$count]) {
    $page_link .= '
    <li class="page-item disabled">
      <a class="page-link" href="">' . $page_array[$count] . ' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if ($previous_id > 0) {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $previous_id . '">&laquo;</a></li>';
    } else {
      $previous_link = '
      <li class="page-item disabled">
      <a class="page-link" href="">&laquo;</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if ($next_id > $total_links) {
      $next_link = '
      <li class="page-item disabled">
      <a class="page-link" href="">&raquo;</a>
      </li>
        ';
    } else {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $next_id . '">&raquo;</a></li>';
    }
  } else {
    if ($page_array[$count] == '...') {
      $page_link .= '
      <li class="page-item disabled">
      <a class="page-link" href="javascript:void(0)">...</a>
      </li>
      ';
    } else {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="' . $page_array[$count] . '">' . $page_array[$count] . '</a></li>
      ';
    }
  }
}
// }

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>
  <ul class="pagination pagination-sm justify-content-end">
    <li class="page-item">
      <a href="hapussiswa" class="page-link"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span><b>&nbsp; DELETE SEMUA SISWA</b></a>
    </li>
  </ul>
  <ul class="pagination pagination-sm justify-content-end">
  <li class="page-item">
    <a href="add-siswa" class="page-link"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span><b>&nbsp; TAMBAH DATA SISWA</b></a>
  </li>
</ul>
</nav>
';
echo $output;