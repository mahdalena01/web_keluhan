<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Registrasi</title>

 
    <style>
        .registration-container {
            padding: 55px;
            width: 35%;
            margin: 0 auto;
            margin-top: 2%;
            text-align: center; /* Agar teks dan tombol berada di tengah */
        }

        .registration-container .input-field {
            margin-bottom: 15px; /* Jarak antara input fields */
        }

        .registration-container .btn-registration {
            width: 100%;
            background-color: black !important; /* Warna tombol registrasi */
        }

        .login-link {
            margin-top: 15px; /* Jarak antara tombol login dan teks "Sudah punya akun" */
        }
    </style>
</head>
<body style="background: url(img/masuk.jpg); background-size: cover;">


<div class=" card registration-container">
<div class="logo-container">
        <img src="img/humas.png" alt="Logo" width="85">
    </div>
    <h2 class="black-text login-title">Registrasi</h2>
  
    <form method="POST" action="proses_registrasi.php">
        <div class="input-field">
            <label for="nik">NIK</label>
            <input id="nik" type="text" name="nik" required>
        </div>
        <div class="input-field">
            <label for="nama">Nama</label>
            <input id="nama" type="text" name="nama" required>
        </div>
        <div class="input-field">
            <label for="username">Username</label>
            <input id="username" type="text" name="username" required>
        </div>
        <div class="input-field">
            <label for="telp">Nomor Telepon</label>
            <input id="telp" type="text" name="telp" required>
        </div>
        <div class="input-field">
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required>
        </div>
        <button type="submit" name="registrasi" class="btn btn-registration">Registrasi</button>
    </form>
    </div>
</div>

</body>
</html>
