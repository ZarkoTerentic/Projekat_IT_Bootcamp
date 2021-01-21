<?php

    require "../BAZA/baza.php";
    $baza = new Baza();
    $baza->connect();   

    $podaci = $baza->upit('SELECT id, pisac_id, knjiga, cena, slika, opis FROM knjige');
    $podaci2 = $baza->upit('SELECT id, ime, prezime FROM pisci');
    $prikaz = $podaci->fetch_all(MYSQLI_NUM);
    $pisci = $podaci2->fetch_all(MYSQLI_NUM);

    
    $promena_knjige = ($_GET['promena_knjiga'])?? '';
    $promena_pisca = ($_GET['id_pisac'])?? '';

    if($promena_knjige !== ''){
        $promeni_knjigu = $baza->upit("");
        echo "Promenili ste podatke" .$baza->affected_rows(). " knjige. Vratite se na ADMIN stranicu i osvežite je radi provere.";
    }else{
        if($promena_pisca !== ''){
            $obriši_knjigu = $baza->upit("");
            echo "Promenili ste podatke" .$baza->affected_rows(). " knjige. Vratite se na ADMIN stranicu i osvežite je radi provere.";
        }
    }

?>