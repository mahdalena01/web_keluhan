
<?php include 'registrasi.php'; 

?>

<head>
    <!-- Libraries -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>
<style>
    .login-container {
        padding: 55px;
        width: 45%;
        margin: 0 auto;
        margin-top: 10%;
        text-align: center; /* Agar teks dan tombol berada di tengah */
    }

    .login-container .input-field {
        margin-bottom: 15px; /* Jarak antara input fields */
    }

    .login-container .btn-login,
    .login-container .btn-registration {
        width: 100%;
    }

    .registration-link {
        margin-top: 15px; /* Jarak antara tombol registrasi dan teks "Silahkan Login" */
    }

    .btn-registration {
        background-color: black !important; /* Warna tombol registrasi */
    }
	.login-title {
        font-weight: bold; /* Membuat teks tebal (bold) */
		font-size: 45px; 
    }
</style>


<!-- Tambahkan modal di login.php atau registrasi_modal.php -->
<div id="modalRegistrasi" class="modal">
    <div class="modal-content">
        <!-- Tambahkan formulir registrasi sesuai kebutuhan -->
        <h4>Silahkan Registrasi</h4>
        <form method="post" action="?p=registrasi">
            <div class="input-field">
                <input type="text" name="nik" id="nik" required>
                <label for="nik">NIK</label>
            </div>
            <div class="input-field">
                <input type="text" name="nama" id="nama" required>
                <label for="nama">Nama</label>
            </div>
            <div class="input-field">
                <input type="text" name="username" id="username" required>
                <label for="username">Username</label>
            </div>
			<div class="input-field">
                <input type="text" name="telp" id="telp" required>
                <label for="telp">Nomor Telepon</label>
            </div>
            <div class="input-field">
                <input type="password" name="password" id="password" required>
                <label for="password">Password</label>
            </div>
			
			<button type="submit" name="registrasi" class="btn black waves-effect waves-light">Registrasi</button>

        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Tutup</a>
    </div>
</div>

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
        <input type="submit" name="login" class="btn orange btn-login">Login</button>

        <div class="row registration-link">
            <div class="col s12">
                <a class=" btn modal-trigger btn-registration" href="#modalRegistrasi">Registrasi</a>
            </div>
        </div>
    </form>
</div>
<?php 


if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    $sql = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE username='$username'");
    $cek = mysqli_num_rows($sql);
    $data = mysqli_fetch_assoc($sql);

    $sql2 = mysqli_query($koneksi, "SELECT * FROM petugas WHERE username='$username'");
    $cek2 = mysqli_num_rows($sql2);
    $data2 = mysqli_fetch_assoc($sql2);

    if ($cek > 0) {
        if (password_verify($password, $data['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['data'] = $data;
            $_SESSION['level'] = 'masyarakat';

            // Redirect ke halaman masyarakat
            header('location:masyarakat/');
            exit();
        } else {
            echo "<script>alert('Gagal Login! Silahkan login kembali')</script>";
        }
    } elseif ($cek2 > 0) {
        if (password_verify($password, $data2['password'])) {
            if ($data2['level'] == "admin") {
                $_SESSION['username'] = $username;
                $_SESSION['data'] = $data2;

                // Redirect ke halaman admin
                header('location:admin/');
                exit();
            } elseif ($data2['level'] == "petugas") {
                $_SESSION['username'] = $username;
                $_SESSION['data'] = $data2;

                // Redirect ke halaman petugas
                header('location:petugas/');
                exit();
            }
        } else {
            echo "<script>alert('Gagal Login! Silahkan login kembali')</script>";
        }
    } else {
        echo "<script>alert('Gagal Login! Silahkan login kembali')</script>";
    }
}
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('.modal');
        var instances = M.Modal.init(elems);

        // Untuk menampilkan modal secara manual
        //var modal = M.Modal.getInstance(document.getElementById('modalRegistrasi'));
        //modal.open();
    });
</script>
