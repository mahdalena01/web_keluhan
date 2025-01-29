<?php
// Include file koneksi ke database (koneksi.php

if (isset($_POST['registrasi'])) {
    // Tangkap data yang di-submit dari formulir registrasi
    $koneksi=mysqli_connect("localhost","root","","pengaduan_masyarakat");
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
        // Registrasi berhasil, beri pesan umum kepada pengguna dan redirect ke halaman login
        echo "<script>alert('Registrasi berhasil! Silakan login.')</script>";
        echo "<script>window.location.href = 'index.php?p=login';</script>";
        
    } else {
        // Registrasi gagal, log pesan kesalahan
        echo "<script>window.location.href = 'index.php?p=registrasi';</script>";

        echo "<script>window.location.href = 'index.php?p=registrasi';</script>";
    }
}
?>
