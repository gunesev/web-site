
<?php !defined('güvenlik')?die('Bu Şekilde Girilemez!'):null;
$random=rand(2,14);
$film=$db->prepare("Select*From film Where film_id='$random' ");
$film->execute(array());
$f=$film->fetchAll(PDO::FETCH_ASSOC);
foreach ($f as $m) {?>
    <link rel="stylesheet" href="my.css">


    <section class="Film">
        <div class="container">
            <div class="künye">
                <table>
                    <tr>
                        <td><img src="img/afis/<?php echo $m["film_afisi"]?>"></td>
                    </tr>
                    <tr class="tür">
                        <td><h3>Tür:</h3><?php echo $m["film_türü"]?></td>
                    </tr>
                    <tr>
                        <td><h3>Yapım Yılı:</h3><?php echo $m["film_yil"]?></td>
                    </tr>
                    <tr>
                        <td><h3>IMDB:</h3><?php echo $m["film_imdb"]?></td>
                    </tr>
                    <tr>
                        <td><h3>Yönetmen:</h3><?php echo $m["film_yönetmen"]?></td>
                    </tr>
                    <tr>
                        <td><h3>Oyuncular:</h3><?php echo $m["film_oyuncular"]?></td>
                    </tr>
                </table>
            </div>
            <h4><?php echo $m["film_adi"]?></h4>

            <div class="fragman">
                <iframe width="560" height="315" src="<?php echo $m["film_fragman"]?>" frameborder="0"
                        allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
            </div>

            <div class="info">
               <h6>Özet ve Detaylar</h6>
                <p><?php echo $m["film_konu"] ?></p>
            </div>

            <div class="otoriter">
                <h6>Otoriter Yorumu</h6>
                <p><?php echo $m["film_otoriter"] ?></p>
            </div>
            <?php
            if($_POST){
                $film=$_POST['film_id'];
                $ekleyen=$_POST['ekleyen'];
                $yorum=$_POST['yorum'];
                $spoiler=$_POST['check'];

                $y=$db->prepare("Insert into yorumlar set 
                                    yorum_film_id=?,
                                    yorum_ekleyen=?,
                                    yorum=?,
                                    yorum_spoiler=?    
                ");
                $e=$y->execute(array($film,$ekleyen,$yorum,$spoiler));
                if($e){
                    echo "Yorum eklendi";
                }else{echo "Yorum eklenemedi";}
            }else {

                if ($_SESSION) {
                    ?>
                    <form class="yorumlar" action="" method="post">
                        <div class="yorum">
                            <h6>Sen de Yorum Yap</h6>
                            <div class="yorum-yap">
                                <textarea name="yorum" id="" cols="60" rows="10" maxlength="500"></textarea>
                                <input type="hidden" name="film_id" value="<?php echo $m["film_id"] ?>">
                                <input type="hidden" name="ekleyen" value="vehbi">

                            </div>
                            <div class="squaredThree">
                                <input type="hidden" name="check" value="0" />
                                <input type="checkbox" value="1" id="squaredThree" name="check"/>
                                <label for="squaredThree"></label>
                            </div>
                            <div class="spoilerY">
                                <h><b>Spoiler Yorum</b></h>
                            </div>

                            <button class="ekle">Yorum Ekle</button>

                            <div class="açıklama">Spoiler, bir eserin konusu veya detayları hakkında bilgi veren; eser
                                okunmadan, dinlenmeden veya izlenmeden önce öğrenilmesi durumunda alıcının eser ile
                                ilgili düşüncelerini veya alacağı hazzı etkileyebilecek açıklama veya ipucu.
                            </div>
                        </div>
                    </form>
                    <?php
                } else {
                    ?>
                    <form class="yorumlar" action="" method="post">
                        <div class="yorum">
                            <h6>Sen de Yorum Yap</h6>
                            <div class="yorum-yap">
                                <textarea name="yorum" id="" cols="60" rows="10" maxlength="500"></textarea>
                                <input type="hidden" name="film_id" value="">
                            </div>

                            <div class="spoilerY">
                                <h><b>Yorum yapmak için üye girişi yap</b></h>
                            </div>
                        </div>
                    </form>
                    <?php

                }
            }
            ?>  <div class="comments">
                <?php
                $com=$db->prepare("Select*From yorumlar Where yorum_film_id=?");
                $com->execute(array($random));
                $c=$com->fetchAll();
                $sayı=$com->rowCount();

                if($sayı){
                    foreach ($c as $p){
                        if($p["yorum_spoiler"]==1){
                            ?>
                            <div class="spocomment">
                                <h3><?php echo $p["yorum_ekleyen"] ?></h3>
                                <p style="font-size: 9pt; color: #800d1c">Spoiler Yorum</p>
                                <p class="spo"><?php echo $p["yorum"] ?></p>
                            </div>
                            <?php
                        }else{
                            ?>
                            <div class="comment">
                                <h3><?php echo $p["yorum_ekleyen"] ?></h3>
                                <p><?php echo $p["yorum"] ?></p>
                            </div>
                            <?php
                        }

                    }

                }else{
                    ?>
                    <div class="comment"><h3>Henüz Yorum Eklenmemiş İlk Ekleyen Sen Ol!</h3></div>
                    <?php
                }
                ?>

            </div>


        </div>
    </section>
    <?php
}
?>