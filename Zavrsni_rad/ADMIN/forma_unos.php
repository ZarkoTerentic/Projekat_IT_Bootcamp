<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .grupe{
            border: black solid 2px;
            margin-bottom: 10px;
        }
        .podaci{
            border: 1px solid gray;
            margin: 5px;
        }
        td{
            border: 1px solid black;
        }
    </style>
<body>
    <?php
    
        require "../BAZA/baza.php";
        $baza = new Baza();
        $baza->connect();   

        $podaci = $baza->upit('SELECT id, pisac_id, knjiga, cena, slika, opis FROM knjige');
        $podaci2 = $baza->upit('SELECT id, ime, prezime FROM pisci');
        $prikaz = $podaci->fetch_all(MYSQLI_NUM);
        $pisci = $podaci2->fetch_all(MYSQLI_NUM);

        $pisac_id = ($_GET['pisac_promena'])?? '';
        $knjiga_id = ($_GET['knjiga_promena'])?? '';

        echo "<div class='grupe'> <h3>PISCI</H3>";
        echo "<div class='podaci'><table><label>Podaci o piscima</label><tr><th>ID</th><th>Ime pisca</th><th>Prezime</th></tr>";
        foreach($pisci as $podatak){
                echo "<tr><td>$podatak[0]</td><td>$podatak[1]</td><td>$podatak[2]</td><td><a href='brisanje.php?id_pisac=".$podatak[0]."'>BRISANJE</a></td><td><a href='forma_unos.php?pisac_promena=".$podatak[0]."'>PROMENI</a></td></tr>";
        }
        echo "</table></div>";
        if($pisac_id == ''){
            echo "<div class='podaci'>
                <form method='post' action='unos_pisac.php' target='id_pisca'>
                    <label>IZMENE</label><br>
                    <input type='hidden' name='koje' value='1'>
                    <input type='text' name='id_pisca' placeholder='ID pisca'><br>
                    <input type='text' name='ime' placeholder='Ime pisca'><br>
                    <input type='text' name='prezime' placeholder='Prezime pisca'><br>
                    <input type='submit' value='Unesi pisca'><br>
                </form>
                <iframe name='id_pisca'>ID pisca</iframe>
            </div>";
        }else{
            $podaci2 = $baza->upit("SELECT ime, prezime FROM pisci WHERE id='$pisac_id'");
            $podaci2->data_seek(0);
            $pod = $podaci2->fetch_assoc();
            echo "<div class='podaci'>
                <form method='post' action='unos_pisac.php' target='id_pisca'>
                    <label>IZMENE</label><br>
                    <input type='hidden' name='koje' value='2'>
                    <input type='text' name='id_pisaca1' value='$pisac_id'><br>
                    <input type='text' name='ime1' value='".$pod['ime']."'><br>
                    <input type'text' name='prezime1' value='".$pod['prezime']."'><br>
                    <input type='submit' value='Unesi pisca'><br>
                </form>
                <iframe name='id_pisca'>ID pisca</iframe>
            </div>";
        }
        echo "</div>";

        echo "<div class='grupe'> <h3>KNJIGE</H3>";
        echo "<div class='podaci'><table><label>Podaci o knjigama</label><tr><th>ID</th><th>ID pisca</th><th>Knjiga</th><th>Cena</th><th>Slika</th><th>Opis</th></tr>";
        foreach($prikaz as $knjiga){
        echo "<tr><td>$knjiga[0]</td><td>$knjiga[1]</td><td>$knjiga[2]</td><td>$knjiga[3]</td><td>$knjiga[4]</td><td>$knjiga[5]</td><td><a href='brisanje.php?id_knjiga=".$knjiga[0]."'>BRISANJE</a></td><td><a href='forma_unos.php?knjiga_promena=".$knjiga[0]."'>PROMENI</a></td></tr>";
        }
        echo "</table></div>";

        if($knjiga_id == ''){
            echo "<div class='podaci'>
                <form method='post' action='unos_knjiga.php' target='id_knjige'>
                    <label >IZMENE</label><br>
                    <input type='hidden' name='koje' value='3'>
                    <input type='text' name='id'><br>
                    <input type='text' name='pisac' placeholder='ID pisca'><br>
                    <input type='text' name='knjiga' placeholder='Naziv knjige'><br>
                    <input type='text' name='cena' placeholder='Cena'><br>
                    <input type='text' name='slika' placeholder='Ime slike'><br>
                    <textarea name='opis' id='' cols='70' rows='20'>Opis</textarea><br>
                    <input type='submit' value='Unesi knjigu'><br>
                </form>
                <iframe name='id_knjige'>ID knjige</iframe>
            </div>";
        }else{
            $podaci = $baza->upit("SELECT pisac_id, knjiga, cena, slika, opis FROM knjige WHERE id='$knjiga_id'");
            $podaci->data_seek(0);
            $pod1 = $podaci->fetch_assoc();
            echo "<div class='podaci'>
                <form method='post' action='unos_knjiga.php' target='id_knjige'>
                    <label >Unos knjige</label><br>
                    <input type='hidden' name='koje' value='4'>
                    <input type='text' name='id1' value='$knjiga_id'><br>
                    <input type='text' name='pisac1' value='".$pod1['pisac_id']."'><br>
                    <input type='text' name='knjiga1' value='".$pod1['knjiga']."'><br>
                    <input type='text' name='cena1' value='".$pod1['cena']."'><br>
                    <input type='text' name='slika1' value='".$pod1['slika']."'><br>
                    <textarea name='opis1' id='' cols='70' rows='20'value=''>".$pod1['opis']."</textarea><br>
                    <input type='submit' value='Unesi knjigu'><br>
                </form>
                <iframe name='id_knjige'>ID knjige</iframe>
            </div>";
        }
        echo "</div>";
    ?>   
    
</body>
</html>