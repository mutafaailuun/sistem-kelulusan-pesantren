<script type="text/javascript">
	$(document).ready(function() {
		$(".delbutton").click(function() {
			var element = $(this);
			var del_id = element.attr("id");
			var info = 'id=' + del_id;
			if (confirm("ANDA YAKIN MENGHAPUS DATA!")) {
				$.ajax({
					type: "POST",
					url: "hapuspetugas.php",
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
				<h4 align="center"><b>SISTEM INFORMASI KELULUSAN </br>PENGELOLA APLIKASI</b></h4>
			</div>
			<p align="left"><a href="index.php?page=add-petugas" class="btn btn-success"><span class="glyphicon glyphicon-random" aria-hidden="true"></span><b>&nbsp; TAMBAH PENGGUNA</b></a></p>
			<thead class="bg-danger text-white">
				<th>NO.</th>
				<th>NAMA PETUGAS</th>
				<th>USERNAME</th>
				<th>HAK AKSES</th>
				<th>AKSI</th>
			</thead>
			<?php
			include('../controller/config.php');
			$q = mysqli_query($koneksi, "SELECT * from tbl_user");
			$n = 1;
			while ($r = mysqli_fetch_array($q)) {
				echo '
					<tr class="content">
						<td style="text-transform: capitalize;">' . $n . '</td>
						<td style="text-transform: capitalize;">' . $r["nama"] . '</td>
						<td style="text-transform: capitalize;">' . $r["username"] . '</td>
						<td style="text-transform: capitalize;">Super Root</td>
						<td align="center">
						<a href="#" class="delbutton" id="' . $r['id_user'] . '"><div class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>&nbsp;Delete</div></a>
						</td>
					</tr>';
				$n++;
			}
			?>
		</table>
	</fieldset>
</div>
<br />