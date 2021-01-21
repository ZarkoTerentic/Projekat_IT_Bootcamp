<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-ostalo.css">
</head>
<body>
    <?php
        require "baza.php";
        $baza = new Baza();
        $baza->connect();
        $html = new Html();
        echo $html->header();

        $pisac = $baza->upit('SELECT * FROM pisci');
        $knjiga = $baza->upit('SELECT * FROM knjige');

        if($_POST['pr'] == 1){
            $pretraga = $baza->real_escape_string($_POST['pretraga1']);
            $dobijene_knjige = $baza->pronadji_knjigu($pretraga);
            $dob = $dobijene_knjige->fetch_all(MYSQLI_NUM);
            echo "<div class='glavni'>
            <a href='proizvodi.php'><h1>BIBLIOTEKA SVETOVA</h1></a>";
            foreach($pronadjene_knjige as $knjiga){
                
                echo "<div class='knjiga'>
                    <a href='detaljnije.php?ime=$knjiga[1]'>
                        <img src='slike/$knjiga[3]' class='slika'>
                        <div class='ime'>
                            <h3>$knjiga[1]</h3>
                            <p>Cena: $knjiga[2] din.</p>
                        </div>
                    </a>
                </div>";
            }
            echo "</div>";
        }else{
            if($_POST['pr'] == 2){
                $pretraga = $baza->real_escape_string($_POST['pretraga1']);
            }
        }


    ?>
</body>
</html>