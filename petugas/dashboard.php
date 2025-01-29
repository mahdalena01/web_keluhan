<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Admin</title>
	<!-- Link Bootstrap CSS -->

	<!-- Link Font Awesome CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofGJopfMzLbLUn9a6U/rfgUJ5trF5FaHsz" crossorigin="anonymous">
	<!-- Your additional styles -->
	<style>
		/* Add your custom styles here */
		.card-header {
			background-color: #343a40;
			/* Dark color for the card header */
			padding-top: 4px;
			padding-bottom: 8px;
			color: white;
		}

		.card-header h4 {
			font-weight: bold;
			font-family: 'Roboto', sans-serif;
			/* Pilih font Roboto atau fallback sans-serif */
			text-align: center;
			/* Teks di tengah */
		}
	</style>
</head>

<body>

	<?php
	// Set zona waktu ke "Asia/Jakarta" (WIB)
	date_default_timezone_set('Asia/Jakarta');
	?>

	<h3 class="black-text" style="text-align:center"><b>Dashboard Petugas</b></h3>

	<div class="row">
		<div class="col s6">
			<div class="card black">
				<div class="card-content white-text">
					<?php
					$query_pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan WHERE status='proses'");
					$jlmmember_pengaduan = mysqli_num_rows($query_pengaduan);
					?>
					<span class="card-title">
						<i class="material-icons">list</i>
						<b>Laporan Status Proses</b>
						<b class="right"><?php echo $jlmmember_pengaduan; ?></b>
					</span>
				</div>
			</div>
		</div>

		<div class="col s6">
    <div class="card orange">
        <div class="card-content black-text">
            <?php
            $query_masyarakat = mysqli_query($koneksi, "SELECT COUNT(*) as jumlah FROM masyarakat");
            $data_masyarakat = mysqli_fetch_assoc($query_masyarakat);
            $jlmmember_masyarakat = $data_masyarakat['jumlah'];
            ?>
            <span class="card-title">
                <i class="material-icons">person</i>
                <b>User</b>
                <b class="right"><?php echo $jlmmember_masyarakat; ?></b>
            </span>
        </div>
    </div>
</div>

		<div class="col s6">
			<div class="card red">
				<div class="card-content black-text">
					<?php
					$query_tanggapan = mysqli_query($koneksi, "SELECT * FROM tanggapan WHERE id_petugas='" . $_SESSION['data']['id_petugas'] . "'");
					$jlmmember_tanggapan = mysqli_num_rows($query_tanggapan);
					?>
					<span class="card-title">
						<i class="material-icons">question_answer</i>
						<b>Laporan Ditanggapi</b>
						<b class="right"><?php echo $jlmmember_tanggapan; ?></b>
					</span>
				</div>
			</div>
		</div>

		<div class="col s6">
			<div class="card grey">
				<div class="card-content white-text">
					<span class="card-title">
						<i class="material-icons">access_time</i>
						<b><?php echo date("Y-m-d H:i:s"); ?></b>
					</span>

				</div>
			</div>
		</div>
	</div>

	<!-- tabel -->
	<div class="row">
		<div class="col s12 m12">
			<div class="card">
				<div class="card-header text-white text-center">
					<h4 class="font-weight-bold">Pengaduan</h4>
				</div>

				<div class="card-body">
					<table id="example" class="display responsive-table" style="width:100%">
						<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Tanggal Masuk</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							$query = mysqli_query($koneksi, "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik WHERE pengaduan.status='proses' ORDER BY pengaduan.id_pengaduan DESC");
							while ($r = mysqli_fetch_assoc($query)) { ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $r['nik']; ?></td>
									<td><?php echo $r['nama']; ?></td>
									<td><?php echo $r['tgl_pengaduan']; ?></td>
									<td><?php echo $r['status']; ?></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</body>

</html>