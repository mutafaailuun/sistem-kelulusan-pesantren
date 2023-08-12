<script type="text/javascript">
	$(document).ready(function() {
		$(".delbutton").click(function() {
			var element = $(this);
			var del_id = element.attr("id");
			var info = 'id=' + del_id;
			if (confirm("ANDA YAKIN MENGHAPUS DATA!")) {
				$.ajax({
					type: "POST",
					url: "adm-del-mapel.php",
					data: info,
					success: function() {}
				});
				$(this).parents(".content").animate({
					opacity: "hide"
				}, "slow");
			}
			return false;
		});
	})
</script>

<link href="../css/thickbox.css" rel="stylesheet" type="text/css" />
<script src="../js/thickbox.js" type="text/javascript"></script>
<div class="cleaner_h5"></div>
<div class="well">

	<fieldset>
		<table class="table table-striped table-bordered">
			<div class="alert alert-dismissable alert-success">
				<h4 align="center"><b>SISTEM INFORMASI KELULUSAN </br>MATA PELAJARAN</b></h4>
			</div>
			<thead class="bg-danger text-white">
				<th>NO.</th>
				<th>MATA PELAJARAN</th>
				<th>JURUSAN</th>
				<th>NO URUT</th>
				<th>AKSI</th>
			</thead>

			<?php
			$batas = 7;
			$halaman = isset($_GET['hal']) ? (int)$_GET['hal'] : 1;
			$halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

			$previous = $halaman - 1;
			$next = $halaman + 1;
			include "../controller/config.php";
			$data = mysqli_query($koneksi, "SELECT * FROM tbl_mapel");
			$jumlah_data = mysqli_num_rows($data);
			$total_halaman = ceil($jumlah_data / $batas);
			$data_mapel = mysqli_query($koneksi, "SELECT * FROM tbl_mapel INNER JOIN tbl_jurusan ON tbl_mapel.kd_jurusan=tbl_jurusan.kd_jurusan ORDER BY no_urut ASC LIMIT $halaman_awal, $batas");
			$nomor = $halaman_awal + 1;
			while ($r = mysqli_fetch_array($data_mapel)) {
			?>

				<tr class="content">
					<td><?php echo $nomor++; ?></td>
					<td><?php echo $r['nm_mapel'] ?></td>
					<td><?php echo $r['nm_jurusan'] ?></td>
					<td><?php echo $r['no_urut']; ?>
					<td>
						<a href="#" class="delbutton" id=<?php echo $r['id_mapel'] ?>>
							<div class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Delete</div>
						</a>
					</td>
				</tr>
			<?php
			}
			?>
		</table>
		<?php include "adm-pag.php"; ?>
	</fieldset>
</div>
<br />