

<?php

session_start();

$host="127.0.0.1";
$dbName="portfolio";
$kullanici_adi="root";
$passwd="";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8",$kullanici_adi,$passwd);
    // echo "Bağlanti Başarili";
} catch (Throwable $th) {
    // echo "Bağlanti Başarisiz";
    echo $th->getMessage();
}




$sorgu = $db->prepare("SELECT * FROM ayarlar WHERE id = :id");
$sorgu->execute(['id' => 1]);
$ayar = $sorgu->fetch(PDO::FETCH_ASSOC);

?>