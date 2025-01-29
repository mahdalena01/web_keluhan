<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pengaduan Masyarakat - Dashboard</title>
    <!--Import Google Icon Font-->

    <!--Import materialize.css--
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=0.5"/>
    <style>
        /* Add your custom styles here */

        .dashboard-card {
            background: #FFEBCD;
            padding: 20px; /* Adjust the padding as needed */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 200px;
            margin-top: 50px;
            float: left;
            min-height: 200px;
         
        
        }
        .dashboard-card img {
            width: 250px; /* Adjust the width as needed */
            margin-top: 20px; /* Add some space below the image */
            margin-left: 390px;
            height: auto;
        }
        
        .dashboard-card h4 {
            font-weight: bold; /* Make h4 element bold */
            z-index: 1; /* Ensure the text is above the image */
        }

        .dashboard-card p {
           font-size: 15px;
        }

        .news-card {
            background: #87CEEB; /* Light blue background for news cards */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 5px;
            margin-top: 55px;
            margin-right: 10px; 
            margin-left: 200px;/* Adjust the spacing between news cards */
            width: 300px;
            float: left;
        }

        .news-card h5 {
            font-weight: bold;
            color :azure;
        }

        .news-card p {
            margin-top: 10px;
            color:azure
        }
    </style>
</head>
<body style="background:url(../img/bg.jpg); background-size: cover;">

    <div class="dashboard-card">
        <h4>Selamat datang, <?php echo ucwords($_SESSION['data']['nama']); ?>!</h4>
        <p>Laporkan setiap peristiwa atau kejadian yang memerlukan 
            <br>perhatian khusus melalui sistem pengaduan ini. Dengan bersatu padu,<br> kita dapat menciptakan lingkungan yang aman, nyaman, dan berkeadilan. <br>Terima kasih atas kerjasama dan kontribusi Anda dalam menciptakan <br>Aceh Tengah yang lebih baik</p>
        
        <img src="img/pol.png" alt="User Image">
    </div>

    <!-- First News Card -->
    <a href="https://humas.polri.go.id/2024/02/02/kapolri-komitmen-kawal-pembangunan-ikn-tepat-waktu/" class="news-card orange">
        <h5>Kapolri Komitmen Kawal Pembangunan IKN Tepat Waktu</h5>
        <p>Jakarta – Kepala Kepolisian Republik Indonesia (Kapolri) Listyo Sigit Prabowo menyampaikan komitmen Polri untuk...</p>
    </a>

    <!-- Second News Card -->
    <a href="https://humas.polri.go.id/2024/02/04/antisipasi-kriminalitas-dan-balap-liar-satlantas-polres-malinau-intensifkan-patroli-blue-light-di-malam-akhir-pekan/" class="news-card black">
        <h5>Antisipasi Kriminalitas dan Balap Liar,</h5>
        <p>MALINAU, Polres Malinau – Malam minggu atau malam akhir pekan banyak aktifitas...</p>
    </a>

    <a href="https://humas.polri.go.id/2024/02/03/supervisi-personel-dan-perlengkapan-sabhara-polda-jateng-kabaharkam-siap-amankan-tahapan-inti-pemilu-4/" class="news-card red">
        <h5>Supervisi Personel dan Perlengkapan</h5>
        <p>SEMARANG – Polda Jateng|Menjelang tahapan inti Pemilu 2024, ...</p>
    </a>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.sidenav');
            var instances = M.Sidenav.init(elems);
        });

        document.addEventListener('DOMContentLoaded', function () {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>

</body>
</html>
