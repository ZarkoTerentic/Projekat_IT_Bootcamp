<?php
    require "../BAZA/baza.php";

    $baza = new Baza();
    if(!$baza->connect()) die($baza->greska);

    $pisac = $baza->upit('SELECT * FROM pisci');

    if($_POST['koje'] == 1){
        $id = $baza->real_escape_string($_POST['id_pisca']);
        $ime = $baza->real_escape_string($_POST['ime']);
        $prezime = $baza->real_escape_string($_POST['prezime']);

        $ins = $baza->insert_pisac($id, $ime, $prezime);
        if($baza->insert_pisac($id, $ime, $prezime) === false)
            echo "GREŠKA";
        else
            $id = $baza->insert_id();
        echo "Uneli ste podatke sa ID-em: ".$id;
    }else{
        if($_POST['koje'] == 2){
            $id1 = $baza->real_escape_string($_POST['id_pisca1']);
            $ime1 = $baza->real_escape_string($_POST['ime1']);
            $prezime1 = $baza->real_escape_string($_POST['prezime1']);

            $ins = $baza->update_pisac($id1, $ime1, $prezime1);
            if($baza->update_pisac($id, $ime, $prezime) === false)
                echo "GREŠKA";
            else
                $id = $baza->insert_id();
            echo "Uneli ste podatke sa ID-em: ".$id;
        }
    }

    

?>