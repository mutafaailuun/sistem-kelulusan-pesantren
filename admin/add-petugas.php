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
				$.post('simpanpetugas.php', $("#frm").serialize(), function(data) {
					$('#hasil').html(data);
					document.frm.nama.value = "";
					document.frm.username.value = "";
					document.frm.pass.value = "";
				});
			}
		});
	});
</script>

<div id="rightPan">
	<div class="well">
		<div class="cleaner_h5"></div>
		<div id="hasil"></div>
		<div class="cleaner_h5"></div>
		<fieldset>
			<div class=" alert alert-dismissable alert-success">
				<h4 align="center"><b>SISTEM INFORMASI KELULUSAN<br>TAMBAH PENGGUNA</b></h4>
			</div>
			<form class="form-horizontal" method="post" action="" name="frm" id="frm">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1" style="min-width: 120px; text-align: left;"><b>NAMA LENGKAP</b></span>
					<input type="text" class="form-control" name="nama" placeholder="NAMA LENGKAP" size="50" style="text-align: left;">
				</div>
				</br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1" style="min-width: 120px; text-align: left;"><b>USERNAME</b></span>
					<input type="text" class="form-control" name="username" placeholder="USERNAME" size="50" style="text-align: left;">
				</div>
				</br>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1" style="min-width: 120px; text-align: left;"><b>PASSWORD</b></span>
					<input type="password" class="form-control" name="pass" placeholder="PASSWORD" size="50" style="text-align: left;">
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