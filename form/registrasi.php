<?php

$hostname = "localhost";
$user = "root";
$password = "";
$db_name = "administrasi1";

$koneksi = mysqli_connect($hostname,$user,$password,$db_name) or die(mysqli_error($koneksi));

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
	$tanggallahir = $_POST['tanggallahir'];
	$jeniskelamin = $_POST['jeniskelamin'];
	$alamat = $_POST['alamat'];
	$email = $_POST['email'];
	$telepon = $_POST['telepon'];
    $username = $_POST['username'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    $cek_user = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$username'");
    $cek_login = mysqli_num_rows($cek_user);

    if ($cek_login > 0){
		echo "<script>
			alert('Username telah terdaftar!');
			window.location = 'registrasi.php';
		</script>";
	}else {
		if($password1 != $password2){
			echo "<script>
				alert('Konfirmasi password tidak sesuai!');
				window.location = 'registrasi.php';
			</script>";
		}else {
			mysqli_query($koneksi,"INSERT INTO user VALUES('','$nama','$tanggallahir','$jeniskelamin','$alamat','$email','$telepon','$username','$password1')");
			echo "<script>
				alert('Data berhasil dikirim!');
				window.location = 'index.php';
		</script>";
	}
}

}

?>


<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/register.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>REGISTRATION</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form action="" method="POST">
					<input class="text" type="text" name="nama" placeholder="Nama Lengkap" required="yes">
					<input class="text" type="text" name="tanggallahir" placeholder="Tempat, Tanggal Lahir" required="yes">
					<input class="text" type="text" name="jeniskelamin" placeholder="Jenis Kelamin" required="yes">
					<input class="text" type="text" name="alamat" placeholder="Alamat" required="yes">
					<input class="text" type="text" name="email" placeholder="Email" required="yes">
					<input class="text" type="text" name="telepon" placeholder="Telepon" required="yes">
					<input class="text email" type="text" name="username" placeholder="Username" required="yes">
					<input class="text" type="password" name="password1" placeholder="Password" required="">
					<input class="text w3lpass" type="password" name="password2" placeholder="Confirm Password" required="">
					<input type="submit" value="SIGNUP" name="submit">
				</form>
				<p>Don't have an Account? <a href="index.php"> Login Now!</a></p>
			</div>
		</div>
		<!-- copyright -->
		<div class="colorlibcopy-agile">
			<p>© 2023 ITS Fun Bike. All rights reserved | Design by <a href="https://itsfunbike.com/" target="_blank">Sistem Informasi ITS</a></p>
		</div>
		<!-- //copyright -->
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
	<!-- //main -->
</body>
</html>