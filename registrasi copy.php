<?php
session_start();
include 'koneksi.php';
if (isset($_POST['registrasi'])) {
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Hash password sebelum disimpan
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO masyarakat (nik, nama, username, telp, password) VALUES ('$nik', '$nama', '$username', '$telp', '$hashedPassword')";
    
    if (mysqli_query($koneksi, $query)) {
        // Registrasi sukses, beri pemberitahuan dan arahkan ke halaman login
        echo "<script>alert('Registrasi berhasil! Silakan login.')</script>";
        echo "<script>window.location.href = '?p=login';</script>";
        exit();
    } else {
        echo "<script>alert('Registrasi gagal! Silahkan coba lagi.')</script>";
    }
}
?>
