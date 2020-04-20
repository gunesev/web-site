
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,700,700i&display=swap&subset=latin-ext" rel="stylesheet">
    <link rel="stylesheet" href="main.css">

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

    </div>

</header>


<bodytwo>

    <div class="containertwo" id="container">
        <div class="form-container sign-up-container">
            <form action="uyelik.php?do=Register" method="post">
                <h1>Hesap Oluştur</h1>

                <input type="text"  name="nick" placeholder="Kullanıcı Adı" />
                <input type="email" name="mail" placeholder="Mail" />
                <input type="password" name="sifre" placeholder="Şifre" />
                <button>KAYDOL</button>
            </form>

        </div>
        <div class="form-container sign-in-container">
            <form action="uyelik.php?do=Login" method="post">
                <h1>Oturum Aç</h1>

                <input type="text" name="giris" placeholder="Mail veya Kullanıcı Adı" />
                <input type="password" name="girisSifre" placeholder="Şifre" />
                <a1 href="#">Parolanızı mı unuttunuz?</a1>
                <button type="submit">GİRİŞ</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Tekrar hoşgeldiniz!</h1>
                    <p>Bizimle bağlantıda kalmak için lütfen kişisel bilgilerinizle giriş yapın.</p>
                    <button class="ghost" id="signIn">Oturum Aç</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Merhaba</h1>
                    <p>Kişisel bilgilerinizi girin ve bize katılın</p>
                    <button class="ghost" id="signUp">Kaydol</button>
                </div>
            </div>
        </div>
    </div>
    <script src="js/io.js"></script>
</bodytwo>