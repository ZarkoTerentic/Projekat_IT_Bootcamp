<?php
    session_start();
    //unset($_SESSION['stavke_korpe']);

    class Korpa{
        public $niz;
        function __construct(){
            if(!isset($_SESSION['stavke_korpe']))
                $_SESSION['stavke_korpe'] = [];
        }
        function dodaj_knjigu_u_korpu($id, $naziv, $cena, $kol){
            array_push($_SESSION['stavke_korpe'], 
                ['id_knjige'=>$id, 'naziv'=>$naziv, 'cena'=>$cena, 'kolicina'=>$kol]);
        }
        function provera_stavki_korpe(){
            return json_encode($_SESSION['stavke_korpe']);
        }
        function dodaj_kolicinu($id, $kol){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++)
                if($_SESSION['stavke_korpe'][$i]['id_knjige'] === $id)
                   $_SESSION['stavke_korpe'][$i]['kolicina'] += $kol; 
        }
        function provera_korpe($id){
            foreach($_SESSION['stavke_korpe'] as $knjiga)
                if($knjiga['id_knjige'] == $id)
                    return true;
        }
        function obrisi_knjigu($id){
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++)
                if($_SESSION['stavke_korpe'][$i]['id_knjige'] === $id){
                    //unset($_SESSION['stavke_korpe'][$i]);
                    array_splice($_SESSION['stavke_korpe'], $i, 1);
                    return;
                }
        }
        function obrisi_korpu(){
            $_SESSION['stavke_korpe'] = [];
        }
        
    }



?>