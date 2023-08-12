<script src="../js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#frm").validate({
			debug: false,
			rules: {
				nama: "required",
				username: "required",
				pass: "required",
			},
			messages: {
				nama: "* Nama Tidak Boleh Kosong",
				username: "* Username Tidak Boleh Kosong",
				pass: "* Password Tidak Boleh Kosong"
			},
			submitHandler: function(form) {
				// do other stuff for a valid form
				$.post('simpanmapel.php', $("#frm").serialize(), function(data) {
					$('#hasil').html(data);
					document.frm.nama.value = "";
					document.frm.username.value = "";
					document.frm.pass.value = "";
				});
			}
		});
	});
</script>
<link href="../css/thickbox.css" rel="stylesheet" type="text/css" />
<script src="../js/thickbox.js" type="text/javascript"></script>
<div id="rightPan">
	<div class="well">
		<div class="cleaner_h5"></div>
		<div id="hasil"></div>
		<div class="cleaner_h5"></div>
		<fieldset>
			<div class=" alert alert-dismissable alert-success">
				<h4 align="center"><b>SISTEM INFORMASI KELULUSAN<br>TAMBAH MATA PELAJARAN</b></h4>
			</div>
			<form class="form-horizontal" method="post" action="" name="frm" id="frm">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1" style="min-width: 120px; text-align: left;"><b>MATA PELAJARAN</b></span>
					<input type="text" class="form-control" name="mapel" placeholder="MATA PELAJARAN" size="50" required="yes" style="text-align: left;">
				</div>
				</br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1" style="min-width: 120px; text-align: left;"><b>JENJANG</b></span>
					<select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="jurusan" required="yes">
						<option selected>PILIH JURUSAN</option>
						<?php
						include('config.php');
						$q = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan ORDER BY kd_jurusan ASC");
						while ($data = mysqli_fetch_array($q)) {
						?>
							<option value="<?php echo $data['kd_jurusan'] ?>"><?php echo $data['nm_jurusan'] ?></option>
						<?php
						}
						?>
					</select>
				</div>
				</br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1" style="min-width: 120px; text-align: left;"><b>URUTAN</b></span>
					<input type="number" class="form-control" name="urutan" placeholder="URUTAN" size="50" required="yes" style="text-align: left;">
				</div>
				</br>
				<div class="form-group">
					<p align="right">
						<button type="submit" name="submit" id="submit" value="SIMPAN" class="btn btn-danger" onclick="tb_remove()"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span>
							<b>&nbsp;SIMPAN DATA</b></button>
					</p>
				</div>
			</form>
		</fieldset>
	</div>