<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="STYLE/style-ostalo.css">
</head>
<body>
    <?php
        require "BAZA/baza.php";
        require "HTML.php";
        $baza = new Baza();
        $baza->connect();
        $html = new Html();
        echo $html->header();

        $pr = $baza->real_escape_string(($_GET['pretraga'])?? '');

        $prikaz = $baza->daj_knjige($pr);
        
        echo "<div class='glavni'><a href='proizvodi.php'><h1>BIBLIOTEKA SVETOVA</h1></a>";
        if($pr == ''){
            foreach($prikaz as $knjiga){
                echo "<div class='knjiga'>
                    <a href='detaljnije.php?ime=".$knjiga['knjiga']."'>
                        <img src='slike/".$knjiga['slika']."' class='slika'>
                        <div class='ime'>
                            <h3>".$knjiga['knjiga']."</h3>
                            <p>Cena: ".$knjiga['cena']." din.</p>
                        </div>
                    </a>
                </div>";
            }
        }else{
            foreach($pretraga as $knjiga){
                echo "<div class='knjiga'>
                    <a href='detaljnije.php?ime=".$knjiga['knjiga']."'>
                        <img src='slike/".$knjiga['slika']."' class='slika'>
                        <div class='ime'>
                            <h3>".$knjiga['knjiga']."</h3>
                            <p>Cena: ".$knjiga['cena']." din.</p>
                        </div>
                    </a>
                </div>";
            }
        }
        echo "</div>";
        echo $html->footer();
    ?>
</body>
</html>


