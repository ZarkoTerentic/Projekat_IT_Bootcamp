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
        require "KORPA/Korpa.php";
        require "HTML.php";
        $baza = new Baza();
        $baza->connect();
        $html = new Html();
        echo $html->header();

        $prikaz = new Korpa();

        echo "<div class='glavni'><a href='proizvodi.php'><h1>BIBLIOTEKA SVETOVA</h1></a>
            <table><caption>NARUČILI STE</caption><thead><tr><th>Knjiga</th><th>Cena</th><th>Količina</th><th>Ukupno</th><th></th><th></th></tr></thead>";
                $ukupno = 0;
                foreach($_SESSION['stavke_korpe'] as $prikaz){
                    echo "<tr>
                            <td>".$prikaz['naziv']."</td>
                            <td>".$prikaz['cena']."</td>
                            <td>".$prikaz['kolicina']."</td>
                            <td>".$prikaz['kolicina']*$prikaz['cena']."</td>
                            <td><a href='KORPA/korpa_dodaj_kolicinu.php?id=".$prikaz['id_knjige']."'>DODAJ KOLICINU</a></td>
                            <td><a href='KORPA/korpa_brisi_knjigu.php?brisi=".$prikaz['id_knjige']."'>OBRIŠI STAVKU</a></td>
                        </tr>";
                    $ukupno += $prikaz['kolicina']*$prikaz['cena'];
                }
                echo "</table>
                    <p>Ukupna cena: ".$ukupno." dinara.</p>
                    <a href='proizvodi.php'>POVRATAK NA DRUGE KNJIGE</a>
                    <form action='KORPA/kupovina.php' method='get'>
                        <input type='hidden' name='kupi' value=$ukupno>
                        <input type='submit' value='   KUPI    '>
                    </form>
                    <form action='KORPA/obrisi_korpu.php' method='GET'>
                        <input type='hidden' value='1' name='informacija'>
                        <input type='submit' value='  Obrisi korpu  '>
                    </form>
            </div>";

        echo $html->footer();

    ?>
</body>
</html>