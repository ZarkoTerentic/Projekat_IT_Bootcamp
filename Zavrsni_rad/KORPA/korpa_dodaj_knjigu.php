<?php

    require "../BAZA/baza.php";
    require "Korpa.php";
    $baza = new Baza();
    $baza->connect();
    $korpa = new Korpa();

    $id = $_GET['id'];
    $ime = $_GET['ime'];
    $cena = $_GET['cena'];

    $a = $korpa->provera_korpe($id);

    if($a == true)
        $korpa->dodaj_kolicinu($id, 1);
    else
        $korpa->dodaj_knjigu_u_korpu($id, $ime, $cena, 1);
    
    echo $korpa->provera_stavki_korpe();
    header("Location: ../korpa_prikaz.php");
    
?>
