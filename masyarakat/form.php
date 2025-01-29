<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tulis Laporan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #343a40;
            color: white;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
            margin-top: 10px;
        }

        textarea, input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
        }

        button {
            background-color: #FF8C00;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card-header">
        <h4 class="font-weight-bold">Tulis Laporan</h4>
    </div>
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="laporan">Tulis Laporan</label>
                <textarea name="laporan" id="laporan" placeholder="Tulis Laporan" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="foto">Silahkan Upload Gambar</label>
                <input type="file" name="foto" id="foto">
            </div>
            <button type="submit" name="kirim">Kirim</button>
        </form>
    </div>
</div>
                

<?php 
    if(isset($_POST['kirim'])){
        $nik = $_SESSION['data']['nik'];
        $tgl = date('Y-m-d');

        $foto = $_FILES['foto']['name'];
        $source = $_FILES['foto']['tmp_name'];
        $folder = './../img/';
        $listeks = array('jpg','png','jpeg');
        $pecah = explode('.', $foto);
        $eks = $pecah['1'];
        $size = $_FILES['foto']['size'];
        $nama = date('dmYis').$foto;

        if($foto !=""){
            if(in_array($eks, $listeks)){
                if($size<=100000){
                    move_uploaded_file($source, $folder.$nama);
                    $query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','$nama','proses')");

                    if($query){
                        echo "<script>alert('Pengaduan Akan Segera di Proses')</script>";
                        echo "<script>location='index.php?p=form';</script>";
                    }

                }
                else{
                    echo "<script>alert('Ukuran Gambar Tidak Lebih Dari 100KB')</script>";
                }
            }
            else{
                echo "<script>alert('Maaf Format File Tidak Di Dukung')</script>";
            }
        }
        else{
            $query = mysqli_query($koneksi,"INSERT INTO pengaduan VALUES (NULL,'$tgl','$nik','".$_POST['laporan']."','noImage.png','proses')");
            if($query){
                if($query){
                    echo "<script>alert('Pengaduan Akan Segera di Proses')</script>";
                    echo "<script>location='index.php?p=form';</script>";
                    exit; // tambahkan exit di sini
                }
                
            }
        }
    }
?>

<script>
    function validateForm() {
        var laporan = document.getElementById('laporan').value;
        var foto = document.getElementById('foto').value;

        if (laporan.trim() === "") {
            alert("Laporan tidak boleh kosong");
            return false;
        }

        if (foto.trim() === "") {
            alert("Silahkan upload gambar");
            return false;
        }

        return true;
    }
</script>
</body>
</html>
