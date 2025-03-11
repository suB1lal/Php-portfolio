<?php

require 'db.php';

if (isset($_POST['settings'])) {
    try {
        $sorgu = $db->prepare("UPDATE ayarlar SET 
            site_baslik=:site_baslik,
            site_aciklama=:site_aciklama,
            home_aciklama=:home_aciklama,
            site_link=:site_link,
            site__sahip_mail=:site__sahip_mail,
            site_mail_host=:site_mail_host,
            site_mail=:site_mail,
            site_mail_port=:site_mail_port,
            site_mail_sifre=:site_mail_sifre,
            x=:x, 
            github=:github 
            WHERE id=1
        ");
        $sonuc = $sorgu->execute([
            'site_baslik' => $_POST['site_baslik'],
            'site_aciklama' => $_POST['site_aciklama'],
            'home_aciklama' => $_POST['home_aciklama'],
            'site_link' => $_POST['site_link'],
            'site__sahip_mail' => $_POST['site__sahip_mail'],
            'site_mail_host' => $_POST['site_mail_host'],
            'site_mail' => $_POST['site_mail'],
            'site_mail_port' => $_POST['site_mail_port'],
            'site_mail_sifre' => $_POST['site_mail_sifre'],
            'x' => $_POST['x'],
            'github' => $_POST['github']
        ]);

        if ($_FILES['site_logo']['error'] == "0") {
            $gecici_isim = $_FILES['site_logo']['tmp_name'];
            $dosya_ismi = rand(100000, 999999) . $_FILES['site_logo']['name'];
            if (move_uploaded_file($gecici_isim, "../dosyalar/$dosya_ismi")) {
                $sorgu = $db->prepare("UPDATE ayarlar SET site_logo=:site_logo WHERE id=1");
                $sonuc = $sorgu->execute(['site_logo' => $dosya_ismi]);
            }
        }

        if ($sonuc) {
            header("location:../settings.php?durum=ok");
        } else {
            header("location:../settings.php?durum=no&error=" . implode(", ", $sorgu->errorInfo()));
        }
    } catch (PDOException $e) {
        die("Hata: " . $e->getMessage());
    }
    exit;
}
if (isset($_POST['pages'])) {
    try {
        $sorgu = $db->prepare("UPDATE sayfalar SET 
            tanitim_sayfasi=:tanitim_sayfasi,
            calismalarim_sayfasi=:calismalarim_sayfasi,
            hakkimda_sayfasi=:hakkimda_sayfasi

            WHERE id=1
        ");
        $sonuc = $sorgu->execute([
            'tanitim_sayfasi' => $_POST['tanitim_sayfasi'],
            'calismalarim_sayfasi' => $_POST['calismalarim_sayfasi'],
           'hakkimda_sayfasi' => $_POST['hakkimda_sayfasi'],
        ]);


        if ($sonuc) {
            header("location:../pages.php?durum=ok");
        } else {
            header("location:../pages.php?durum=no&error=" . implode(", ", $sorgu->errorInfo()));
        }
    } catch (PDOException $e) {
        die("Hata: " . $e->getMessage());
    }
    exit;
}
if (isset($_POST['oturumacma'])) {
    $sorgu = $db->prepare("SELECT * FROM kullanicilar WHERE kul_mail=:kul_mail AND kul_sifre=:kul_sifre");
    $sorgu->execute(array(
        'kul_mail' => $_POST['kul_mail'],
        'kul_sifre' => md5($_POST['kul_sifre'])
    ));
    $sonuc = $sorgu->rowCount();
    $kullanici = $sorgu->fetch(PDO::FETCH_ASSOC);

    if ($sonuc == 0) {
        header("location:../login.php?durum=no");
    } else {

        $_SESSION['kul_isim'] = $kullanici['kul_isim'];
        $_SESSION['kul_mail'] = $kullanici['kul_mail'];
        $_SESSION['kul_id'] = $kullanici['kul_id'];
        header("location:../index.php?durum=ok");
    }
}

if (isset($_POST['profilKaydet'])) {
    $sorgu = $db->prepare("UPDATE  kullanicilar SET
    kul_isim=:kul_isim,
    kul_mail=:kul_mail,
    kyl_telefon=:kyl_telefon WHERE kul_id=:kul_id
    ");

    $sonuc = $sorgu->execute(array(
        'kul_isim' => $_POST['kul_isim'],
        'kul_mail' => $_POST['kul_mail'],
        'kyl_telefon' => $_POST['kyl_telefon'],
        'kul_id' => $_SESSION['kul_id']
    ));



    if (strlen($_POST['kul_sifre']) > 0) {
        $sorgu = $db->prepare("UPDATE  kullanicilar SET
    kul_sifre =:kul_sifre WHERE kul_id=:kul_id
    ");

        $sonuc = $sorgu->execute(array(
            'kul_sifre' => md5($_POST['kul_sifre']),
            'kul_id' => $_SESSION['kul_id']

        ));
    }


    if ($sonuc) {
        header("location:../profil.php?durum=ok");
    } else {
        header("location:../profil.php?durum=no");
    }
}
