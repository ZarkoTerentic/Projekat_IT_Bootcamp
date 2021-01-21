<?php
    session_start();

    require "../BAZA/baza.php";

    $baza = new Baza();
    $baza->connect();

    $ime = $baza->real_escape_string($_POST['ime']);
    $pass = $baza->real_escape_string($_POST['sifra']);
    $pass2 = $baza->real_escape_string($_POST['sifra2']);

    if($pass == $pass2){
        $podaci = $baza->logovanje($ime, $pass);
        if($podaci == true){
            echo "Uspešno logovanje! <a href='forma_unos.php'>UNOS</a>";
            echo $id = $podaci[0]['id'];
            array_push($_SESSION['korisnik'], ['id'=>$id]);
            echo json_encode($_SESSION['korisnik']);
        }else{
            echo "Greška! <a href='logovanje.php'>Pokušajte ponovo.</a>";
        }
    }else{
        echo "Greška! <a href='logovanje.php'>Pokušajte ponovo.</a>";   
    }





?>