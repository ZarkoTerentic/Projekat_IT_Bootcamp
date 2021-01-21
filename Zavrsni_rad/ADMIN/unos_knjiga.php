<?php
    require "../BAZA/baza.php";

    $baza = new Baza();
    if(!$baza->connect()) die($baza->greska);

    $knjiga = $baza->upit('SELECT * FROM knjige');

    if($_POST['koje'] == 3){
        $id = $baza->real_escape_string($_POST['id']);
        $pisac_id = $baza->real_escape_string($_POST['pisac']);
        $knjiga = $baza->real_escape_string($_POST['knjiga']);
        $cena = $baza->real_escape_string($_POST['cena']);
        $slika = $baza->real_escape_string($_POST['slika']);
        $opis = $baza->real_escape_string($_POST['opis']);

        $ins = $baza->insert_knjiga($pisac_id, $knjiga, $cena, $slika, $opis);

        if($baza->insert_knjiga($pisac_id, $knjiga, $cena, $slika, $opis) === false){
            echo "GREŠKA";
        }else{
            $id2 = $baza->insert_id();
            echo "Uneli ste podatke sa ID-em: ".$id2;
        }
    }else{
        if($_POST['koje'] == 4){
            $id1 =$baza->real_escape_string($_POST['id1']);
            $pisac_id1 =$baza->real_escape_string($_POST['pisac1']);
            $knjiga1 = $baza->real_escape_string($_POST['knjiga1']);
            $cena1 = $baza->real_escape_string($_POST['cena1']);
            $slika1 = $baza->real_escape_string($_POST['slika1']);
            $opis1 = $baza->real_escape_string($_POST['opis1']);
    
            $ins = $baza->update_knjiga($id1, $pisac_id1, $knjiga1, $cena1, $slika1, $opis1);

            if($baza->update_knjiga($id1, $pisac_id1, $knjiga1, $cena1, $slika1, $opis1) === false)
                echo "GREŠKA";
            else
                $id3 = $baza->insert_id();
            echo "Uneli ste podatke sa ID-em: ".$id1;
        }
    }

?>