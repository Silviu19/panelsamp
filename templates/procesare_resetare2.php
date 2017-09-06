<?php
include_once '../config/config.php';
include_once '../config/database.php';
include_once '../functions.php';

session_start();
if(isset($_POST['noua_parola']))
{
    $noua_parola = filter_input(INPUT_POST, 'noua_parola', FILTER_SANITIZE_STRING);
    $keye_secreta = filter_input(INPUT_POST, 'key_secret', FILTER_SANITIZE_STRING);

    $parola_hashuita = hash('whirlpool', $noua_parola);
    $parola_hashuita = strtoupper($parola_hashuita);

    $query = "SELECT * FROM `users` WHERE `KeyResetMail` = '$keye_secreta'";
    $result = $db_link->query($query);

    $succes = FALSE;
    while($row=$result->fetch_assoc())
    {
        if(!empty($row))
        {
            $succes = TRUE;
            $query = "UPDATE `users` SET `Password` = '$parola_hashuita' WHERE `KeyResetMail` = '$keye_secreta'";
            echo "Parola ta a fost resetata cu succes! Felicitari ai o noua parola!";
        }
    }
    if($succes == FALSE)
    {
        echo "Eroare";
    }
}
?>