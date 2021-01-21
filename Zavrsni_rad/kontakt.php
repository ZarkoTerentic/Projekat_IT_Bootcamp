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
    ?>
    <div class='glavni'>
        <h1>KONTAKT</h1>
        <div><p>BIBLIOTEKA SVETOVA</p> <p>Svetosavska 11</p> <p>11000 Beograd</p> <p>Srbija</p></div>
        <div><p>Kontakt telefon:</p> <p>011/11223365</p></div>
        <div><p>e-mail:</p> </p>biblioteka_svetova@gmail.com</p></div>  
        <a href="ADMIN/logovanje.php">ADMIN</a>
    </div>
    
    <?php
        echo $html->footer();
    ?>
</body>
</html>