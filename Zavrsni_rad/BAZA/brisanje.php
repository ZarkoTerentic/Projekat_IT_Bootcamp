<?php

    require "baza.php";
    $baza = new Baza();
    $baza->connect();   

    $podaci = $baza->upit('SELECT id, pisac_id, knjiga, cena, slika, opis FROM knjige');
    $podaci2 = $baza->upit('SELECT id, ime, prezime FROM pisci');
    $prikaz = $podaci->fetch_all(MYSQLI_NUM);
    $pisci = $podaci2->fetch_all(MYSQLI_NUM);

    $brisanje_knjige = ($_GET['id_knjiga'])?? '';
    $brisanje_pisca = ($_GET['id_pisac'])?? '';

    if($brisanje_knjige !== ''){
        $obriši_knjigu = $baza->upit("DELETE FROM knjige WHERE id = '$brisanje_knjige'");
        echo "Izbrisali ste" .$baza->affected_rows(). " knjigu. Vratite se na <a href='forma_unos.php'>ADMIN</a> stranicu i osvežite je radi provere.";
    }else{
        if($brisanje_pisca !== ''){
            $obriši_pisca = $baza->upit("DELETE FROM pisci WHERE id = '$brisanje_pisca'");
            echo "Izbrisali ste" .$baza->affected_rows(). " pisca. Vratite se na <a href='forma_unos.php'>ADMIN</a> stranicu i osvežite je radi provere.";
        }
    }

    

?>