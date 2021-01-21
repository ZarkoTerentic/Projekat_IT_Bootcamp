<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    if( !isset($_SESSION['korisnik']) ){
        $_SESSION['korisnik'] = [];
        echo "Molimo Vas ulogujte se.";
    }else{
        echo "Logovani ste za ovu sesiju. <a href='forma_unos.php'>UNOS</a>";
    }
    echo json_encode($_SESSION['korisnik']);
?>
    <form action="logovanje_fcj.php" method="POST">
        <input type="text" name="ime" placeholder="korisnicko ime">
        <input type="password" name="sifra" placeholder="sifra">
        <input type="password" name="sifra2">
        <input type="submit" value="LOGUJ SE">
    </form>
</body>
</html>