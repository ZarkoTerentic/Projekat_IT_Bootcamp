<?php

    class Baza{
        private $conn;
        public $greska;
        function connect(){
            $this->conn = new mysqli('localhost', 'root', '', 'biblioteka_svetova');
            if($this->conn->connect_error){
                $this->greska = $this->conn->connect_error;
                return false;
            }else 
                $this->conn->set_charset('utf8');
                return true;
        }
        function upit($sql){
            return $this->conn->query($sql);
        }
        function daj_knjige($pr){
            $sql = "SELECT * FROM knjige";
            if($pr !== ''){
                $sql .= " WHERE naziv LIKE '%$pr%'";
            }else{
                $podaci_baze = $this->upit($sql);
            }  
            $pb = $podaci_baze->fetch_all(MYSQLI_ASSOC); 
            return $pb;
        }
        function daj_knjigu($ime){
            $sql= "SELECT * FROM knjige WHERE knjiga='$ime'";
            $podaci = $this->upit($sql); 
            $pod = $podaci->fetch_all(MYSQLI_ASSOC);
            return $pod;
        }
        function real_escape_string($str){
            return $this->conn->real_escape_string($str);
        }
        function affected_rows(){
            return $this->conn->affected_rows;
        }
        function insert_id(){
            return $this->conn->insert_id;
        }
        function logovanje($ime, $pass){
            $sql = "SELECT * FROM `admin` WHERE ime = '$ime' AND sifra = '$pass'";
            $podaci = $this->upit($sql);
            $p = $podaci->fetch_all(MYSQLI_ASSOC);
            return $p;
        }
        function insert_knjiga($pisac_id, $knjiga, $cena, $slika, $opis){
            $this->upit("INSERT INTO knjige(pisac_id, knjiga, cena, slika, opis) VALUES ('$pisac_id', '$knjiga', '$cena', '$slika', '$opis')");
        }
        function update_knjiga($id, $pisac_id, $knjiga, $cena, $slika, $opis){
            $this->upit("UPDATE knjige SET pisac_id='$pisac_id', knjiga='$knjiga', cena='$cena', slika='$slika', opis='$opis' WHERE id='$id'");
        }
        function insert_pisac($id, $ime, $prezime){
            $this->upit("INSERT INTO pisci(id, ime, prezime) VALUES ('$id', '$ime', '$prezime')");
        }
        function update_pisac($id, $ime, $prezime){
            $this->upit("UPDATE pisci SET ime='$ime',prezime='$prezime' WHERE id='$id'");
        }
        function pronadji_knjigu($pr){
            $sql = "SELECT id, pisac_id, knjiga, cena, slika, opis FROM knjige WHERE knjiga LIKE '%$pr%'";
            $podaci = $this->upit($sql);
            return $podaci->fetch_all(MYSQLI_BOTH);
        }
        function kupovina($uku){
            $sql = "INSERT INTO `korpa`(`datum_vreme`, `ukupno`) VALUES (now(), '$uku')";
            $this->upit($sql);
            $id = $this->conn->insert_id;
        
            for($i=0; $i<count($_SESSION['stavke_korpe']); $i++){
                $t = $this->upit("INSERT INTO `stavke_korpe`
                (`id`, `id_korpa`, `proizvod_id`, `cena`, `kolicina`) VALUES 
                (null, $id, ".
                $_SESSION['stavke_korpe'][$i]['id_knjige'].", ".
                $_SESSION['stavke_korpe'][$i]['cena'].", ".
                $_SESSION['stavke_korpe'][$i]['kolicina']." ) "
                );
                if(!$t){
                    $this->conn->rollback();
                    die("NEUSPESNO: $i".$this->conn->error);
                }
            }
        }
    }


?>