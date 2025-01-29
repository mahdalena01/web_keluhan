<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
	<style>
	
	body {
            background: url(img/masuk.jpg) no-repeat center center fixed;
            background-size: cover;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }	
	.login-container {
		padding: 55px;
		width: 30%;
		margin: 0 auto;
		margin-top: 5%;
		text-align: center;
		/* Agar teks dan tombol berada di tengah */
	}

	.login-container .input-field {
		margin-bottom: 15px;
		/* Jarak antara input fields */
	}

	.login-container .btn-login,
	.login-container .btn-registration {
		width: 100%;
	}

	.registration-link {
		margin-top: 15px;
		/* Jarak antara tombol registrasi dan teks "Silahkan Login" */
	}

	.btn-registration {
		background-color: black !important;
		/* Warna tombol registrasi */
	}

	.login-title {
		font-weight: bold;
		/* Membuat teks tebal (bold) */
		font-size: 45px;
	}
</style>


<div class="card login-container">
	<div class="logo-container">
		<img src="img/humas.png" alt="Logo" width="85">
	</div>
	<h2 class="black-text login-title">Login</h2>
	<form method="POST">
		<div class="input-field">
			<label for="username">Username</label>
			<input id="username" type="text" name="username" required>
		</div>
		<div class="input-field">
			<label for="password">Password</label>
			<input id="password" type="password" name="password" required>
		</div>
		<input type="submit" name="login" value="Login" class="btn orange" style="width: 100%;">
	</form>
	<div class="registration-link">
		<a class="btn btn-registration" href="registrasi.php">Registrasi</a>
	</div>
</div>


<?php
if (isset($_POST['login'])) {
	$koneksi = mysqli_connect("localhost", "root", "", "pelayanan_keluhan");
	$username = mysqli_real_escape_string($koneksi, $_POST['username']);
	$password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

	$sql = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username='$username' AND password='$password' ");
	$cek = mysqli_num_rows($sql);
	$data = mysqli_fetch_assoc($sql);

	$sql2 = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username' AND password='$password' ");
	$cek2 = mysqli_num_rows($sql2);
	$data2 = mysqli_fetch_assoc($sql2);

	if ($cek > 0) {
		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['data'] = $data;
		$_SESSION['level'] = 'masyarakat';
		header('location:masyarakat/index.php?p=dashboard');
	} elseif ($cek2 > 0) {
		if ($data2['level'] == "admin") {
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['data'] = $data2;
			header('location:admin/');
		} elseif ($data2['level'] == "petugas") {
			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['data'] = $data2;
			header('location:petugas/');
		}
	} else {
		echo "<script>alert('Gagal Login! Silahkan login kembali')</script>";
	}
}
?>