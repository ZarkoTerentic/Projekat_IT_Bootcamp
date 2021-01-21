<?php

    require "../BAZA/baza.php";
    require "Korpa.php";
    $baza = new Baza();
    $baza->connect();
    $korpa = new Korpa();
    
    $id = $_GET['id'];

    $korpa->dodaj_kolicinu($id, 1);
    header("Location: ../korpa_prikaz.php");
    
?>