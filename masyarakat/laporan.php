<?php
session_start();
error_reporting(0);
include '../conn/koneksi.php';

if (!isset($_SESSION['username'])) {
    header('location:../index.php');
} elseif ($_SESSION['level'] != "masyarakat") {
    header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pengaduan Masyarakat</title>
    <!-- ... (head section) ... -->
</head>
<body style="background:url(../img/bg.jpg); background-size: cover;">


    <div class="col s3 m9">
    <td><h4 class="black-text hide-on-med-and-down"style="center-align : center"> <b>Daftar Laporan</h4></td></b>
    <br>
        <div class="center-align">
            <table border="3" class="responsive-table striped highlight">
                <tr>
                    <td><b>No</td></b>
                    <td><b>NIK</td></b>
                    <td><b>Nama</td></b>
                    <td><b>Tanggal Masuk</td>
                    <td><b>Status</td></b>
                    <td><b>Opsi</td></b>
                </tr>
                <!-- Menambahkan tombol "Lihat" dan modal untuk setiap baris dalam tabel -->
<?php
    $pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan WHERE pengaduan.nik='" . $_SESSION['data']['nik'] . "' ORDER BY pengaduan.id_pengaduan DESC");
    while ($r = mysqli_fetch_assoc($pengaduan)) {
        $id_pengaduan = $r['id_pengaduan'];
?>
    <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $r['nik']; ?></td>
        <td><?php echo $r['nama']; ?></td>
        <td><?php echo $r['tgl_pengaduan']; ?></td>
        <td><?php echo $r['status']; ?></td>
        <td>
            <a class="btn black modal-trigger" href="#tanggapan_<?php echo $id_pengaduan; ?>"><b>Lihat</a></b>
            <a class="btn red" onclick="return confirm('Anda Yakin Ingin Menghapus Ya/Tidak')" href="index.php?p=pengaduan_hapus&id_pengaduan=<?php echo $id_pengaduan; ?>"><b>Hapus</a></td></b>
        </td>
    </tr>

    <!-- Modal tanggapan untuk setiap baris -->
   
    <div id="tanggapan_<?php echo $id_pengaduan; ?>" class="modal">
    <div class="modal-content">
        <h4 class="blue-text" style="text-align: center;"><b>Detail</h4></b>
        <div class="col s12">
            <!-- Menampilkan informasi pengaduan -->
            <p>NIK : <?php echo $r['nik']; ?></p>
            <p>Dari : <?php echo $r['nama']; ?></p>
            <p>Tanggal Masuk : <?php echo $r['tgl_pengaduan']; ?></p>
            <!-- Menampilkan tanggapan -->
            <br><b>Tanggapan</b>
            <p><?php echo $r['tanggapan']; ?></p>
        </div>
    </div>
    <div class="modal-footer col s12">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat"><b>Tutup</a></b>
    </div>
</div>
    </div>
<?php } ?>

<!-- ... (JavaScript) ... -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var modalElems = document.querySelectorAll('.modal');
        var modalInstances = M.Modal.init(modalElems);

        // Fungsi untuk membuka modal berdasarkan ID
        function openModal(id) {
            var modalInstance = M.Modal.getInstance(document.getElementById(id));
            modalInstance.open();
        }

        // Menambahkan event listener untuk setiap tombol "Lihat"
        <?php
            $pengaduan = mysqli_query($koneksi, "SELECT * FROM pengaduan INNER JOIN masyarakat ON pengaduan.nik=masyarakat.nik INNER JOIN tanggapan ON pengaduan.id_pengaduan=tanggapan.id_pengaduan WHERE pengaduan.nik='" . $_SESSION['data']['nik'] . "' ORDER BY pengaduan.id_pengaduan DESC");
            while ($r = mysqli_fetch_assoc($pengaduan)) {
        ?>
            document.getElementById('lihatBtn_<?php echo $r['id_pengaduan']; ?>').addEventListener('click', function () {
                openModal('tanggapan_<?php echo $r['id_pengaduan']; ?>');
            });
        <?php
            }
        ?>
    });
</script>
</body>
</html>
