<?php 
	session_start();
	error_reporting(0);
	include '../conn/koneksi.php';
	if(!isset($_SESSION['username'])){
		header('location:../index.php');
	}
	elseif($_SESSION['level'] != "masyarakat"){
		header('location:../index.php');
	}
  include_once 'header.php';
 ?>
  <!DOCTYPE html>
  <html>
    <head>
    	<title>Pengaduan Masyarakat</title>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
     

      <!-- Compiled and minified CSS -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

      <!-- Compiled and minified JavaScript -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
      
      
      <script type="text/javascript">
        $(document).ready( function () {
          $('#example').DataTable();
          $('select').formSelect();
        } );
      
      </script>
<style>
    body {
      background-color: white;
      background-size: cover;
    }

    .navbar {
      background-color: #8B0000;
      /* Dark color for the navbar */
      padding-left: 340px;
    }

    .main-content {
      padding-top: 20px;
    }

    .logo {
      width: 50px;
      /* Sesuaikan lebar sesuai kebutuhan */
      height: auto;
      /* Biarkan tinggi mengikuti proporsi asli gambar */
      margin-top: 10px;
      /* Sesuaikan margin atas sesuai kebutuhan */
    }
    .logo1 {
      width: 60px;
      /* Sesuaikan lebar sesuai kebutuhan */
      height: auto;
      /* Biarkan tinggi mengikuti proporsi asli gambar */
      margin-top: 15px;
      /* Sesuaikan margin atas sesuai kebutuhan */
    }
    
    .navbar img {
        margin-right: -20px; /* Jarak antara logo-logo */
    }
        .nav-wrapper {
        /* ... kode CSS yang ada sebelumnya ... */
        display: flex;
        align-items: center;
        
    
    }
    .navbar b {
        font-size: 20px; /* Sesuaikan ukuran teks sesuai kebutuhan */
        margin-left: 30px; /* Sesuaikan margin kiri teks sesuai kebutuhan */
   

    }
    
  /* CSS untuk mengubah warna sidebar */
  .sidenav {
    background-color: #000000; /* Warna merah */
  }

  /* CSS untuk mengubah warna teks pada sidebar */
  .sidenav a {
    color: #ffffff !important; ; /* Warna teks putih */
  }

  /* CSS untuk mengubah warna ikon pada sidebar */
  .sidenav i {
    color: #ffffff !important; ; /* Warna ikon putih */
  }
    
  </style>
    </head>

    <body style="background-color:white; background-size: cover;">
    <nav class="navbar">
    <div class="nav-wrapper">
      <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <a href ="https://humas.polri.go.id/" style="padding-top: 20px;"><img src="img/humas.png" width="50" height="50"></a>
      <img src="img/polri.png" width="80" height="50">
      <img src="img/polres.png" width="50" height="50">
      <b>Kepolisian Resor Aceh Tengah</b>
      <!-- You can add more navbar elements if needed -->
    </div>
  </nav>
   
  <div class="row">
    <div class="col s12 m3">
      <ul id="slide-out" class="sidenav sidenav-fixed">
        <li>
          <div class="user-view">
            <div class="background">

            </div>
            <div style="display: flex; justify-content: center; align-items: center; height: 5vh;">
    <a href=""> <img src="https://www.tenforums.com/attachments/user-accounts-family-safety/322690d1615743307t-user-account-image-log-user.png" alt="Logo" class="circle logo"></a>
</div>
                      <a href="" style="text-align: center;"> <span class="orange-text name"><?php echo ucwords($_SESSION['data']['nama']); ?></span></a>
                  </div>
              </li>
              <li><a href="index.php?p=dashboard"><i class="material-icons">dashboard</i>Dashboard</a></li>
              <li><a href="index.php?p=form"><i class="material-icons">description</i>Form</a></li>
              <li><a href="index.php?p=laporan"><i class="material-icons">list</i>Laporan</a></li>
              <li>
                  <div class="divider"></div>
              </li>
              <li><a class="waves-effect" href="../index.php?p=logout"><i class="material-icons">logout</i>Logout</a></li>
          </ul>

          <a href="#" data-target="slide-out" class="btn sidenav-trigger"><i class="material-icons">menu</i></a>
      </div>

      <div class="col s12 m9">
        
	<?php 
		if(@$_GET['p']==""){
			include_once 'dashboard.php';
		}
		elseif(@$_GET['p']=="dashboard"){
			include_once 'dashboard.php';
		}
    if(@$_GET['p']==""){
			include_once 'form.php';
		}
		elseif(@$_GET['p']=="form"){
			include_once 'form.php';
    }
    if(@$_GET['p']==""){
			include_once 'laporan.php';
		}
		elseif(@$_GET['p']=="laporan"){
			include_once 'laporan.php';
    }
		elseif(@$_GET['p']=="pengaduan_hapus"){
			$query=mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
			$data=mysqli_fetch_assoc($query);
			unlink('../img/'.$data['foto']);
			if($data['status']=="proses"){
				$delete=mysqli_query($koneksi,"DELETE FROM pengaduan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
				header('location:index.php?p=dashboard');
			}
			elseif($data['status']=="selesai"){
				$delete=mysqli_query($koneksi,"DELETE FROM pengaduan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
				if($delete){
					$delete2=mysqli_query($koneksi,"DELETE FROM tanggapan WHERE id_pengaduan='".$_GET['id_pengaduan']."'");
					header('location:index.php?p=dashboard');
				}	
			}

		}
		elseif(@$_GET['p']=="more"){
			include_once 'more.php';
		}
	 ?>
      </div>


    </div>




      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="../js/materialize.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

      <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.sidenav');
          var instances = M.Sidenav.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function() {
          var elems = document.querySelectorAll('.modal');
          var instances = M.Modal.init(elems);
        });

      </script>

    </body>
  </html>