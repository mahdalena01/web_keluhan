        <div class="row">
          <div class="col s12 m9">
            <h3 class="black-text"style="text-align:center"><b> Registrasi Masyarakat</h3></b>
          </div>  
          <div class="col s12 m3">
            <div class="section"></div>
            <a class=" btn modal-trigger orange" href="#modal1"><i class="material-icons">add </i> Daftar</a>
          </div>
        </div>

        <table id="example" class="display responsive-table" style="width:100%">
          <thead>
              <tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Username</th>
					<th>NO HP</th>
                	<th>Opsi</th>
              </tr>
          </thead>
          <tbody>
            
	<?php 
		$no=1;
		$query = mysqli_query($koneksi,"SELECT * FROM masyarakat ORDER BY nik ASC");
		while ($r=mysqli_fetch_assoc($query)) { ?>
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $r['nik']; ?></td>
			<td><?php echo $r['nama']; ?></td>
			<td><?php echo $r['username']; ?></td>
			<td><?php echo $r['telp']; ?></td>
			<td><a class="btn teal modal-trigger black" href="#regis_edit?nik=<?php echo $r['nik'] ?>"><b>Edit</a></b> <a onclick="return confirm('Anda Yakin Ingin Menghapus Ya/Tidak')" class="btn red" href="index.php?p=regis_hapus&nik=<?php echo $r['nik'] ?>"><b>Hapus</a></b></td>

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
        <!-- Modal Structure -->
        <div id="regis_edit?nik=<?php echo $r['nik'] ?>" class="modal">
          <div class="modal-content">
            <h4 style="text-align:center"><b>Edit Data</h4></b>
			<form method="POST">
				<div class="col s12 input-field">
					<label for="nik">NIK</label>
					<input id="nik" type="number" name="nik" value="<?php echo $r['nik']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="nama">Nama</label>
					<input id="nama" type="text" name="nama" value="<?php echo $r['nama']; ?>">
				</div>
				<div class="col s12 input-field">
					<label for="username">Username</label>		
					<input id="username" type="text" name="username" value="<?php echo $r['username']; ?>"><br><br>
				</div>
				<div class="col s12 input-field">
					<label for="telp">Telp</label>
					<input id="telp" type="number" name="telp" value="<?php echo $r['telp']; ?>"><br><br>
				</div>
				<div class="col s12 input-field">
					<input type="submit" name="Update" value="Simpan" class="btn right">
				</div>
			</form>

			<?php 
				if(isset($_POST['Update'])){
					$update=mysqli_query($koneksi,"UPDATE masyarakat SET nik='".$_POST['nik']."',nama='".$_POST['nama']."',username='".$_POST['username']."',telp='".$_POST['telp']."' WHERE nik='".$r['nik']."' ");
					if($update){
						echo "<script>alert('Data Tersimpan')</script>";
						echo "<script>location='location:index.php?p=registrasi';</script>";
					}
				}
			 ?>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"><b>Tutup</a></b>
          </div>
        </div>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

		</tr>
            <?php  }
             ?>

          </tbody>
        </table>        

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
          <div class="modal-content">
            <h4 style="text-align :center"><b>Tambah Data Masyarakat</h4></b>
			<form method="POST">
				<div class="col s12 input-field">
					<label for="nik">NIK</label>
					<input id="nik" type="number" name="nik">
				</div>
				<div class="col s12 input-field">
					<label for="nama">Nama</label>
					<input id="nama" type="text" name="nama">
				</div>
				<div class="col s12 input-field">
					<label for="username">Username</label>		
					<input id="username" type="text" name="username"><br><br>
				</div>
				<div class="col s12 input-field">
					<label for="password">Password</label>
					<input id="password" type="password" name="password"><br><br>
				</div>
				<div class="col s12 input-field">
					<label for="telp">No HP</label>
					<input id="telp" type="number" name="telp"><br><br>
				</div>
				<div class="col s12 input-field">
					<input type="submit" name="simpan" value="Simpan" class="btn right orange">
				</div>
			</form>

			<?php 
				if(isset($_POST['simpan'])){
					$password = md5($_POST['password']);

					$query=mysqli_query($koneksi,"INSERT INTO masyarakat VALUES ('".$_POST['nik']."','".$_POST['nama']."','".$_POST['username']."','".$password."','".$_POST['telp']."')");
					if($query){
						echo "<script>alert('Data Tesimpan')</script>";
						echo "<script>location='location:index.php?p=registrasi';</script>";
					}
				}
			 ?>
          </div>
          <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat"><b>Tutup</a></b>
          </div>
        </div>