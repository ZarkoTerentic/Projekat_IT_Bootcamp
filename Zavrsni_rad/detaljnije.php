<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0; padding:0;
        }

        header{
            background-image: url(pozadina2.jpg);
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            margin-left: 60px;
            margin-right: 60px;
            height: 20ex;
            background-color: whitesmoke;
            border-bottom: 2px solid goldenrod;
        }
        p:first-child{
            padding: 10px 5px;
            font-size: x-large;
            margin: 5px 5px 20px 10px;
            color: rgb(77, 66, 37);
        }
        .linkovi{
            display: inline-block;
            height: 30px;
            padding: 5px 5px 0px 5px;
            border: solid 2px goldenrod;
            margin-left: 10px;
        }
        form{
            text-align: center;
            height: 20px;
            float: right;
            margin: 50px 50px 0px 0px;
        }
        .glavni{
            height: 70ex;
            margin-left: 60px;
            margin-right: 60px;
            text-align: center;
            background-color: whitesmoke;
            border-bottom: 2px solid gold;
            
        }
        h1{
            font-size: 50px;
            padding-top: 30px;
            color: rgb(77, 66, 37);
            margin-bottom: 50px;
        }
        
        footer{
            height: 5ex;
            margin-left: 60px;
            margin-right: 60px;
            border: 3px solid whitesmoke;
            background-color: whitesmoke;
            font-size: x-large;
            text-align: center;
            padding-top: 30px;
            color: rgb(77, 66, 37);
        }
        .knjiga_detaljno{
            float: left;
            height:300px; width:200px;
            padding:1em; border:2px solid gold;
            background-color: blanchedalmond;
            margin-left: 10px;
        }
        .knjiga_detaljno .slika_detaljno{
            width:100%; height:250px; 
            background-size:cover;
            background-position: center center;
            background-repeat: no-repeat;
        }
        .opis{
            text-align: left;
            position: relative;
            width: 50%;
            float: left;
            border: 2px solid gold;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <?php
        

        require "BAZA/baza.php";
        require "HTML.php";
        $baza = new Baza();
        $baza->connect();
        $html = new Html();
        echo $html->header();

        $ime = $baza->real_escape_string($ime = $_GET['ime']);

        $prk = $baza->daj_knjigu($ime);
        
        echo "<div class='glavni'>
                <a href='proizvodi.php'><h1>BIBLIOTEKA SVETOVA</h1></a>";
                foreach($prk as $prikaz)
                    echo "<div class='knjiga_detaljno'>
                            <img src='slike/".$prikaz['slika']."' class='slika_detaljno'>
                            <div class='ime'>
                                <h3>".$prikaz['knjiga']."</h3>
                                <p>Cena: ".$prikaz['cena']." din.</p>
                            </div>
                    </div>
                    <div class='opis'>Opis:  ".$prikaz['opis']."</div>";
        echo "<form method='get' action='KORPA/korpa_dodaj_knjigu.php'>
                <input type='hidden' name='id' value='".$prikaz['id']."'>
                <input type='hidden' name='ime' value='".$prikaz['knjiga']."'>
                <input type='hidden' name='cena' value='".$prikaz['cena']."'>
                <input type='submit' value='  korpa  ' name='za_korpu'>
            </form></div>";

        echo $html->footer();
    ?>
        
        
        
    </div>
    
</body>
</html>

