
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
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
</head>

<body>
    <nav class="navbarr">
        <div class="logoo">
            <a href="http://proyek-1.test/Login">
                <img src="https://127.0.0.1/proyek_1/public/images/Logo.png" alt="UKM ESSENSIAL Logo">
                <span>UKM ESSENSIAL</span>
            </a>
        </div>

        <div class="mt-3">

            <ul class="nav-linkss">
                <li><a href="#">Beranda</a></li>
                <li><a href="http://proyek-1.test/program">Program</a></li>
                <li><a href="http://proyek-1.test/about">Tentang Kami</a></li>
                <li><a href="http://proyek-1.test/kontak">Kontak</a></li>
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

    <div class="mx-0 d-flex justify-content-center align-items-center" style="z-index: -1;">
        <img src="https://127.0.0.1/proyek_1/public/images/hijau.png" alt="Jagalah Kebersihan Lingkungan" class="img-fluid px-0"
            style="z-index: 0;" />
    </div>

    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-4 program-title">Program UKM Kesehatan Lingkungan</h2>
            <div class="row justify-content-center">
                <div class="col-md-2 col-sm-4 mb-3">
                    <div class="feature-box">
                        <a href="http://proyek-1.test/program">Perilaku Penghuni</a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 mb-3">
                    <div class="feature-box">
                        <a href="http://proyek-1.test/program">Pemeriksaan Kualitas Air Secara Fisik</a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 mb-3">
                    <div class="feature-box">
                        <a href="http://proyek-1.test/program">Sanitasi Sarana Jamban Keluarga</a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 mb-3">
                    <div class="feature-box">
                        <a href="http://proyek-1.test/program">Sanitasi Sarana Air Bersih</a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-4 mb-3">
                    <div class="feature-box">
                        <a href="http://proyek-1.test/program">Rumah Sehat</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer Section -->
    <footer class="z-index-0 bg-light text-center py-4" style="z-index: -999;">
        <p class="mb-0">© 2024 Kelompok-1. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>