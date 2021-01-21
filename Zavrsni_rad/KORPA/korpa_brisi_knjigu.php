<?php

    require "../BAZA/baza.php";
    require "Korpa.php";
    $baza = new Baza();
    $baza->connect();
    $korpa = new Korpa();

    $brisi = $_GET['brisi'];

    $korpa->obrisi_knjigu($brisi);

    header("Location: ../korpa_prikaz.php");
?>