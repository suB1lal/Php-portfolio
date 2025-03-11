<?php

function oturumKontrol(){

    if (!isset($_SESSION['kul_mail']) OR !isset($_SESSION['kul_mail']) OR !isset($_SESSION['kul_mail']) ){
        session_destroy();
        header("location:login.php");
        exit();
    }
}

?>