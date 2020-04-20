<?php

/*
	Mysql Ayar Dosyası
*/
require_once 'db.php';
$do = @$_GET['do'];
Switch($do) {

    case'Register';

        if ($_POST) {
            // Formdaki Bilgiler
            $username = $_POST['nick'];
            $password = $_POST['sifre'];
            $user_email = $_POST['mail'];
            // Aynı Kullanıcı varmı Kontrolü
            $user_kontrol = $db->prepare("Select * from uyeler where uye_nick = ? or uye_mail = ? ");
            $user_kontrol->execute(array($username, $user_email));

            if ($user_kontrol->rowCount()) {
                echo '<div style="color:green;font-weight:bold;line-height:23px;padding:5px 5px 5px 5px">
			<strong style="color:red;">Hata !</strong><br />
			Bu Bilgiler İle Daha Önce Kayıt Olmuşsunuz.Yönlendiriliyorsunuz.
			</div>';
                // header("refresh:2; url=index.php");
            }elseif(!$username||!$password||!$user_email){
                echo '<div style="color:#800d1c;font-weight:bold;line-height:23px;padding:5px 5px 5px 5px">
				<strong style="color:red;">Hata!</strong><br />
				Boşluk Bırakılamaz.
				</div>';
                header("refresh:2; url=io.php");

            }
            else {
                // Kullanıcıyı Veritabanına Ekle
                $kaydet = $db->prepare("INSERT INTO uyeler set uye_nick = ? , uye_mail = ? , uye_pw = ? ");
                $kaydet->execute(array($username, $user_email, $password));
                if ($kaydet->rowCount()) {
                    echo '<div style="color:green;font-weight:bold;line-height:23px;padding:5px 5px 5px 5px">
				<strong style="color:red;">Tebrikler !</strong><br />
				Başarılı Bir Şekilde Kayıt Oldunuz. Yönlendiriliyorsunuz.
				</div>';
                    header("refresh:2; url=index.php?kvm=anasayfa");
                } else {
                    echo '<div style="color:green;font-weight:bold;line-height:23px;padding:5px 5px 5px 5px">
				<strong style="color:red;">Hata !</strong><br />
				Lütfen Daha Sonra Tekrar Deneyiniz.Yönlendiriliyorsunuz.
				</div>';
                    header("refresh:2; url=index.php?kvm=anasayfa");
                }
            }
        } else {
             header("Location:index.php?kvm=anasayfa");
        }
        break;

    /*
        Üye Giriş Alanı
        Üye Bilgileri SESSİONDA tutulur.
        Beni Hatırla Sistemi
    */
    case'Login';
        if ($_POST) {
            // Formdan gelen bilgiler
            $username = $_POST['giris'];
            $password = $_POST['girisSifre'];

            // Üye Giriş İşlemi

            if(!$password||!$username){
                echo "<span>boş bırakma</span>";
            }else{
                $login = $db->prepare("Select * from uyeler where uye_mail = ? and uye_pw = ? ");
                $login->execute(array($username, $password));
                $row = $login->fetch(PDO::FETCH_ASSOC);
                if ($login->rowCount()) {
                    // Bilgileri Doğru ise Sesisona ata ve giriş yap

                    $_SESSION['uye'] = $row['uye_nick'];
                    $_SESSION['durum']=$row['uye_durum'];

                    echo '<div style="color:green;font-weight:bold;line-height:23px;padding:5px 5px 5px 5px">
				<strong style="color:red;">Tebrikler !</strong><br />
				Başarılı Bir Şekilde Giriş Yaptınız. Yönlendiriliyorsunuz.
				</div>';

                    header("refresh:1; url=index.php?kvm=anasayfa");



                }else {
                    echo "hatalı";
                }
            }
        }
}
        ?>