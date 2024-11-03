<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?> </title>
    <link rel="stylesheet" href="<?= BASEURL; ?> /css/style.css">       
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <img src="<?= BASEURL; ?> /img/Logo-removebg-preview.png" alt="UKM ESSENSIAL Logo"> 
            <span>UKM ESSENSIAL</span>
        </div>


        <ul class="nav-links">
            <li><a href="#">Beranda</a></li>
            <li><a href="#">Program</a></li>
            <li><a href="#">Tentang Kami</a></li>
            <li><a href="#">Kontak</a></li>
        </ul>


        <div class="menu-toggle">
            <input type="checkbox" />
            <span></span> 
            <span></span>
            <span></span>
        </div>
    </nav>
    <script>
        const menuToggle = document.querySelector('.menu-toggle input');
        const nav = document.querySelector('nav ul');
        
        menuToggle.addEventListener('click', function() {
            nav.classList.toggle('slide');
        })
    </script>
    