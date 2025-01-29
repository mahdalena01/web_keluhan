<?php
// Include file koneksi ke database (koneksi.php)
include '../conn/koneksi.php';

if (isset($_POST['register'])) {
    // Tangkap data yang di-submit dari formulir registrasi
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $telp = mysqli_real_escape_string($koneksi, $_POST['telp']);
    $password = mysqli_real_escape_string($koneksi, md5($_POST['password']));

    // Query SQL untuk menambahkan data ke tabel masyarakat (sesuaikan dengan struktur tabel Anda)
    $insert_query = "INSERT INTO masyarakat (nik, nama, username, telp, password) VALUES ('$nik', '$nama', '$username', '$telp', '$password')";
    
    // Eksekusi query
    $result = mysqli_query($koneksi, $insert_query);

    if ($result) {
        // Registrasi berhasil, bisa tambahkan pesan sukses atau redirect ke halaman login
        echo "<script>alert('Registrasi berhasil! Silahkan login.')</script>";
        header('location: login.php');
    } else {
        // Registrasi gagal, tampilkan pesan error atau sesuaikan dengan kebutuhan
        echo "<script>alert('Registrasi gagal! Silahkan coba lagi.')</script>";
    }
}
?>