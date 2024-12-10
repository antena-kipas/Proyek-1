<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            /* overflow-x: hidden; */
        }

        .custom-card {
            background-color: #b6e4da;
            border: none;
            margin-bottom: 20px;
        }

        .custom-card-header {
            background-color: #77c3a1;
            color: white;
            font-weight: bold;
        }

        .custom-card-body {
            color: #333333;
        }


        .feature-box {
            padding: 20px;
            background-color: #4CAF50;
            /* Warna hijau pekat pada kotak */
            color: white;
            /* Warna teks putih */
            font-weight: bold;
            font-size: 16px;
            text-align: center;
            border-radius: 10px;
            /* Membulatkan sudut */
            text-decoration: none;
            /* Menghilangkan garis bawah */
            height: 100px;
            /* Tinggi tetap untuk semua kotak */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .feature-box a {
            color: white;
            /* Warna teks putih pada tautan */
            text-decoration: none;
            /* Menghilangkan garis bawah */
        }

        .feature-box a:hover {
            color: #E8E8E8;
            /* Warna sedikit lebih terang saat hover */
        }

        .program-title {
            color: #4CAF50;
            /* Warna hijau pada judul */
            font-weight: bold;
        }

        .z-index-0 {
            z-index: 0;
        }

        .navbarr {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #66B4A7;
            padding: 10px 20px;
            z-index: 10;
        }

        .navbarr ul {
            display: flex;
            list-style: none;
            justify-content: space-between;
            padding-right: 45px;
        }

        .logoo {
            display: flex;
            align-items: center;
        }

        .logoo img {
            width: 40px;
            /* Sesuaikan dengan ukuran logo Anda */
            margin-right: 10px;
        }

        .logoo span {
            color: white;
            font-weight: bold;
        }

        .nav-linkss a {
            color: #ffffff;
            background-color: #ffffff;
            padding: 8px 15px;
            border-radius: 8px;
            margin-left: 10px;
            text-decoration: none;
            font-weight: bold;
            color: #6DB7A7;
            transition: 0.3s;
        }

        .nav-linkss a:hover {
            background-color: #4d8b7b;
            color: white;
        }

        .menu-togglee {
            display: none;
            flex-direction: column;
            height: 20px;
            justify-content: space-between;
            position: relative;
        }

        /* responsive breakpoint tablet */

        @media screen and (max-width: 768px) {

            .menu-togglee {
                display: flex;
            }

            .navbarr ul {
                position: absolute;
                right: 0;
                height: 100vh;
                right: 0;
                top: 0;
                flex-direction: column;
                justify-content: space-evenly;
                z-index: 2;
                background-color: #6DB7A7;
                width: 80%;
                transform: translateX(100%);
                transition: all 1s;
            }

            nav ul.slide {
                transform: translateX(0)
            }
        }


        /* responsive breakpoint mobile */

        @media screen and (max-width: 576px) {
            .menu-togglee {
                display: flex;
            }

            .navbarr ul {
                position: absolute;
                right: 0;
                height: 100vh;
                right: 0;
                top: 0;
                flex-direction: column;
                justify-content: space-evenly;
                z-index: 2;
                background-color: #6DB7A7;
                width: 80%;
                transform: translateX(100%);
                transition: all 1s;
            }

            nav ul.slide {
                transform: translateX(0)
            }
        }

        /* navbar hamburger */



        .menu-togglee input {
            position: absolute;
            width: 40px;
            height: 28px;
            left: -6px;
            top: -2px;
            opacity: 0;
            cursor: pointer;
            z-index: 5;
        }

        .menu-togglee span {
            display: block;
            width: 28px;
            height: 3px;
            background-color: white;
            border-radius: 3px;
            transition: all 0.5s;
            z-index: 5;
        }

        /* hamburger menu animasi */
        .menu-togglee span:nth-child(2) {
            transform-origin: 0 0;
        }

        .menu-togglee span:nth-child(4) {
            transform-origin: 0 100%;
        }

        .menu-togglee input:checked~span:nth-child(2) {
            background-color: white;
            transform: rotate(45deg) translate(-1px, -1px);
        }

        .menu-togglee input:checked~span:nth-child(4) {
            background-color: white;
            transform: rotate(-45deg) translate(-1px, 0);
        }


        .menu-togglee input:checked~span:nth-child(3) {
            opacity: 0;
            transform: scale(0);
        }

        /* css halaman about */

        .container {
            max-width: 700px;
            /* Lebar kontainer disesuaikan */
            margin: 0 auto;
            text-align: center;
        }

        .header {
            background-color: #67A979;
            color: white;
            padding: 10px 15px;
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
            font-size: 22px;
            display: inline-block;
            margin: 0 auto;
            text-align: center;
            /* Ukuran font lebih besar */
        }

        .content {
            margin-top: 20px;
            line-height: 1.8;
            /* Spasi antar baris sedikit diperbesar */
            color: #67A979;
            /* Warna teks */
            font-size: 16px;
            text-align: left;
            /* Sesuaikan ukuran font */
        }

        .ukm-essensial {
            background-color: #67a979;
            color: white;
            padding: 8px 15px;
            font-weight: bold;
            border-radius: 5px;
            display: inline-block;
            font-size: 18px;
            /* Ukuran font lebih besar */
        }

        ul {
            margin-top: 10px;
            padding-left: 20px;
            color: #67a979;
            /* Warna teks di dalam list */
        }

        ul li {
            margin-bottom: 5px;
        }


        /* css buat kontak */

        .form-section {
            margin-top: 30px;
            padding: 20px;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }

        .form-title {
            font-size: 24px;
            font-weight: bold;
            color: white;
            background-color: #67A979;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
        }

        .form-description {
            background-color: #67A979;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            margin-top: 10px;
            font-size: 1em;
        }

        .form-label {
            font-weight: bold;
            color: #67A979;
            text-align: left;
            display: block;
        }

        .form-divider {
            border-top: 2px solid #67A979;
            margin: 20px 0;
        }

        .btn-submit {
            background-color: #67A979 !important;
            color: white !important;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #579a69 !important;
        }
    </style>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <nav class="navbarr">
        <div class="logoo">
            <img src="https://127.0.0.1/proyek_1/public/images/Logo.png" alt="UKM ESSENSIAL Logo">
            <span>UKM ESSENSIAL</span>
        </div>

        <div class="mt-3">

            <ul class="nav-linkss">
                <li><a href="#">Beranda</a></li>
                <li><a href="#">Program</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>


        <div class="menu-togglee">
            <input type="checkbox" />
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <script>
        const menuToggle = document.querySelector('.menu-togglee input');
        const nav = document.querySelector('nav ul');

        menuToggle.addEventListener('click', function () {
            nav.classList.toggle('slide');
        })
    </script>

    <div class="container mt-4 font-weight-bold" style="font-family: sans-serif; font-size: 16px; text-align: justify; ">
        <!-- Program UKM Kesehatan Lingkungan -->
        <div class="d-inline-block"style="background-color: #67A979; color: white; font-weight: bold; padding: 8px 20px; border-radius: 5px; margin-bottom: 10px;">
                Program UKM Kesehatan Lingkungan
        </div>
        <div class="card d-inline-block" style="background-color: #66B4A7; border: none; margin-bottom: 20px; padding: 20px;">
            
            <div class="card-body d-inline-block" style="color: white;">
                <p>&nbsp; Program UKM Kesehatan Lingkungan adalah salah satu kegiatan UKM (Upaya Kesehatan Masyarakat) yang berfokus pada masalah lingkungan. Program ini bertujuan untuk menyimbangkan kondisi ekologi antara manusia dan lingkungannya, sehingga kualitas hidup manusia dapat menjadi lebih sehat dan bahagia.</p>
            </div>
        </div>


        <div class="d-inline-block"style="background-color: #67A979; color: white; font-weight: bold; padding: 8px 20px; border-radius: 5px; margin-bottom: 10px;">
                Perilaku penghuni
        </div>
        <!-- Perilaku penghuni -->
        <div class="card d-inline-block" style="background-color: #66B4A7; border: none; margin-bottom: 20px; padding: 20px;">
            <div class="card-body" style="color: white;">
                <p>&nbsp; Perilaku penghuni rumah atau masyarakat sangat berpengaruh terhadap keberhasilan program kesehatan lingkungan yang dijalankan oleh pemerintah atau tim puskesmas. Edukasi berkelanjutan serta pengawasan oleh tim kesehatan lingkungan dapat membantu menciptakan perilaku yang lebih baik untuk menjaga kebersihan dan kesehatan lingkungan.</p>
            </div>
        </div>

        <div class="d-inline-block"style="background-color: #67A979; color: white; font-weight: bold; padding: 8px 20px; border-radius: 5px; margin-bottom: 10px;">
                Pemeriksaan Kualitas Air Secara Fisik
        </div>
        <!-- Pemeriksaan Kualitas Air Secara Fisik -->
        <div class="card" style="background-color: #66B4A7; border: none; margin-bottom: 20px; padding: 20px;">
            <div class="card-body" style="color: white;">
                <p>&nbsp; Pemeriksaan kualitas air secara fisik merupakan langkah awal dalam memastikan bahwa air yang digunakan oleh masyarakat aman dan layak untuk berbagai keperluan seperti minum, mandi, mencuci, dan memasak. Pemeriksaan fisik ini tidak memerlukan peralatan laboratorium yang canggih dan biasanya dapat dilakukan secara langsung oleh petugas di lapangan atau masyarakat.</p>
            </div>
        </div>
        
        <div class="d-inline-block"style="background-color: #67A979; color: white; font-weight: bold; padding: 8px 20px; border-radius: 5px; margin-bottom: 10px;">
            Sanitasi Sarana Jamban Keluarga
        </div>
        <!-- Sanitasi Sarana Jamban Keluarga -->
        <div class="card" style="background-color: #66B4A7; border: none; margin-bottom: 20px; padding: 20px;">
            <div class="card-body" style="color: white;">
                <p>&nbsp; Sanitasi sarana jamban keluarga merupakan salah satu komponen penting dalam menjaga kesehatan lingkungan dan mencegah penyakit yang disebabkan oleh sanitasi yang tidak sehat, diare, kolera, dan disentri. Jamban keluarga yang memenuhi persyaratan sanitasi dapat membantu mengurangi risiko penyebaran dan meminimalkan risiko pencemaran air tanah dan lingkungan sekitar.</p>
            </div>
        </div>

        <div class="d-inline-block"style="background-color: #67A979; color: white; font-weight: bold; padding: 8px 20px; border-radius: 5px; margin-bottom: 10px;">
            Sanitasi Sarana Air Bersih
        </div>
        <!-- Sanitasi Sarana Air Bersih -->
        <div class="card" style="background-color: #66B4A7; border: none; margin-bottom: 20px; padding: 20px;">
            <div class="card-body" style="color: white;">
                <p>&nbsp; Sanitasi sarana air bersih adalah salah satu elemen paling penting dalam menjaga kesehatan masyarakat, karena akses terhadap air bersih adalah kebutuhan dasar yang wajib terpenuhi bagi masyarakat. Air bersih yang tidak tercemar sangat diperlukan untuk berbagai keperluan sehari-hari, seperti air minum, pencucian, distribusi, serta penyiraman air bersih ke tempat layak untuk dikonsumsi dan dibutuhkan oleh masyarakat.</p>
            </div>
        </div>


        <div class="d-inline-block"style="background-color: #67A979; color: white; font-weight: bold; padding: 8px 20px; border-radius: 5px; margin-bottom: 10px;">
            Rumah Sehat
        </div>
        <!-- Rumah Sehat -->
        <div class="card" style="background-color: #66B4A7; border: none; margin-bottom: 20px; padding: 20px;">
            <div class="card-body" style="color: white;">
                <p>&nbsp; Rumah sehat adalah tempat tinggal yang dirancang dan dibangun untuk mendukung kesehatan dan kesejahteraan penghuninya. Konsep ini meliputi aspek kebersihan, ventilasi, pencahayaan, serta pengelolaan sampah yang baik. Rumah sehat juga dapat mengurangi risiko penyakit menular antara anggota keluarga. Rumah yang bersih dan sehat merupakan upaya perlindungan utama bagi lingkungan dari berbagai ancaman kesehatan, termasuk penyakit menular dan lingkungan yang tidak sehat.</p>
            </div>
        </div>
    </div>

    
<!-- Footer Section -->
    <footer class="z-index-0 bg-light text-center py-4" style="z-index: -999;">
      <p class="mb-0">© 2024 Kelompok-1. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

