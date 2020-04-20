<?php !defined('güvenlik')?die('Bu Şekilde Girilemez!'):null;

$sayfa=intval(@$_GET['sayfa']);
if(!$sayfa)
    $sayfa=1;

$film=$db->prepare("Select*From film");
$film->execute(array());
$toplam=$film->rowCount();
$limit=10;
$show=$sayfa*$limit-$limit;
$sayfa_sayisi=ceil($toplam/$limit);
$forlimit=5;
$film=$db->prepare("Select*From film limit $show,$limit");
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
    <div class="container">
        <div class="fp">
            <img src="img/fp.png">
        </div>
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
        <div class="sayfalama">
            <?php
            for($i=$sayfa - $forlimit;$i<$sayfa + $forlimit +1;$i++){
                if($i>0 && $i<=$sayfa_sayisi){
                    if($i==$sayfa){
                        echo "<span class='aktif'>".$i."</span>";
                    }else{
                        echo "<span class='sayfa'><a href='?kvm=anasayfa&sayfa=".$i."'type='submit'>".$i."</a></span>";
                    }
                }

            }
            ?>
        </div>

        </div>

    </div>


</main>
