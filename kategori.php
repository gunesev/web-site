<?php !defined('güvenlik')?die('Bu Şekilde Girilemez!'):null;
$kid=$_GET['kid'];
$film=$db->prepare("Select*From film Where film_türü='$kid'");
$film->execute(array());
$f=$film->fetchAll(PDO::FETCH_ASSOC);



?>

<nav class="Navigation">
    <div class="container">
        <ul class="dropdownmenu">
            <li><a href="#">Kategoriler</a>
                <ul id="submenu">
                    <li><a href="?kvm=Kategori&kid=Aksiyon">Aksiyon</a></li>
                    <li><a href="?kvm=Kategori&kid=Bilimkurgu">Bilimkurgu</a></li>
                    <li><a href="?kvm=Kategori&kid=Dram">Dram</a></li>
                    <li><a href="?kvm=Kategori&kid=Savaş">Savaş</a></li>
                    <li><a href="?kvm=Kategori&kid=Korku">Korku</a></li>
                    <li><a href="?kvm=Kategori&kid=Gerilim">Gerilim</a></li>


                </ul>
            </li>
        </ul>
        <a class="Navigation-item" href="">Popüler Filmler</a>
        <a class="Navigation-item" href="">IMDB 7+</a>
        <a class="Navigation-item" href="">Seri Filmler</a>
        <a class="Navigation-item" href="">Editör Seçimleri</a>

        <div class="claim">
            <a class="button" href="?kvm=öneri">Bana Film Öner</a>
        </div>

    </div>
    <div class="fp">
        <img src="img/fp.png">
    </div>
</nav>


<main class="Main">
    <div class="main">

        <div class="container">

            <?php    foreach ($f as $l) {?>

                <div class="view view-seventh">
                    <input type="image" src="img/afis/<?php echo $l["film_afisi"]?>" />

                    <div class="mask">

                        <a href="film?id=<?php echo $l["film_id"]?>" type="submit" class="info"><?php echo $l["film_adi"]?></a>

                    </div>

                </div>

                <?php
            }
            ?>
            

        </div>

    </div>


</main>
