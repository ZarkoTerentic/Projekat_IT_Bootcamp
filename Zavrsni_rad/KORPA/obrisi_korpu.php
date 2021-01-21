<?php
    session_start();


    require "../BAZA/baza.php";
    require "Korpa.php";
    $baza = new Baza();
    $baza->connect();
    $korpa = new Korpa();
    
    $i = $_GET['informacija'];

    $korpa->obrisi_korpu();
    header("Location: ../korpa_prikaz.php");
    
?>