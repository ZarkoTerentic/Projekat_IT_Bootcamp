<?php

    class Html{
        function header(){
            return "<header>
                <div class='hederdiv'>
                    <p><a href='../index.php'>BIBLIOTEKA SVETOVA</a></p>
                </div>
                    <form method='GET' action='../proizvodi.php'>
                    <input type='text' placeholder='Pronađi svoj svet.' name='pretraga' class='unos'>
                    <input type='submit' value=' PRONAĐI ''>
                    </form>
                <div>
                    <a href='kontakt.php' class='linkovi'>KONTAKT</a>
                    <a href='korpa_prikaz.php' class='linkovi'>KORPA</a>
                    <a href='proizvodi.php' class='linkovi'>SVE KNJIGE</a>
                </div>
            </header>";
        }
        function footer(){
            return "<footer>NAJVEĆA BIBLIOTEKA EPSKE FANTASTIKE</footer>";
        }
    }

?>