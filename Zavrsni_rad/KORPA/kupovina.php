<?php

    require "../BAZA/baza.php";
    require "Korpa.php";
    $baza = new Baza();
    $baza->connect();
    $korpa = new Korpa();

    $kupi = $_GET['kupi'];

    $a = $baza->kupovina($kupi);

    echo "Hvala na kupovini! <a href='../korpa_prikaz.php'> KNJIGE </a>";
   
?>