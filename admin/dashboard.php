
<h3 class="red-text"style="text-align:center"><b>Dashboard</h3></b>

	<div class="row">
		<div class="col s12">
		  <div class="card black">
		    <div class="card-content white-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM pengaduan");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
		      <span class="card-title"><i class="material-icons">report </i><b>Laporan Masuk</b><b class="right"><?php echo $jlmmember; ?></b></span>
		      <p></p>
		    </div>
		  </div>
		</div>	

		<div class="col s12">
		    <div class="card orange">
		    <div class="card-content black-text">
			<?php 
				$query = mysqli_query($koneksi,"SELECT * FROM pengaduan WHERE status='selesai'");
				$jlmmember = mysqli_num_rows($query);
				if($jlmmember<1){
					$jlmmember=0;
				}
			 ?>
		      <b><span class="card-title"><i class="material-icons">done </i><b>Laporan Selesai </b><b class="right"><?php echo $jlmmember; ?></b></span></b>
		      <p></p>
		    </div>
		  </div>
		</div>
	</div>