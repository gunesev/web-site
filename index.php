<?php

    define('güvenlik',true);

    $kvm=$_GET['kvm'];

    switch ($kvm){

        case 'anasayfa':
            include 'header.php';
            include 'main.php';
            include 'footer.php';

            break;
        case 'hakkımızda':
            include 'header.php';
            include 'hak.php';
            include 'footer.php';
            break;
        case 'iletisim':
            include 'header.php';
            include 'iletisim.php';
            include 'footer.php';
            break;
        case 'öneri':
            include 'header.php';
            include 'oneri.php';
            include 'footer.php';

            break;
        case 'üyelik':
            include 'io.php';
            break;
        case 'Kategori':
            include 'header.php';
            include 'kategori.php';
            include 'footer.php';
            break;
        default:
            include 'header.php';
            include 'main.php';
            include 'footer.php';

    }


?>