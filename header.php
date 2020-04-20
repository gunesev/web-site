<?php !defined('güvenlik')?die('Bu Şekilde Girilemez!'):null;
include 'db.php';
@session_start();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>KAVİM</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="main.css?v=">

</head>
<body>

<header class ="Header">
    <div class ="container">

        <a class="Header-logo" href="?kvm=anasayfa">
            <img src="img/logo.png">
        </a>

        <div class="Header-menu">
            <a href="?kvm=anasayfa">ANASAYFA</a>
            <a href="?kvm=iletisim">İLETİŞİM</a>
            <a href="?kvm=hakkımızda">HAKKIMIZDA</a>
        </div>
        <div class="Header-user">
            <?php

            if($_SESSION){

                ?><?php
                if($_SESSION["durum"] == 1){
                    echo '<a href="">Admin</a>';
                }
                ?>
                <a href="">Profil</a>
                <a href="exit.php">Çıkış Yap</a>
                <?php
            }else{
                ?>
                <a href="?kvm=üyelik">Üyelik İşlemleri</a>
                <?php
            }
            ?>
        </div>
    </div>

</header>