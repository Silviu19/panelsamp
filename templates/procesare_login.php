<?php
include_once '../config/config.php';
include_once '../config/database.php';
include_once '../functions.php';

session_start();
if(isset($_POST['login_user']) && isset($_POST['login_parola']))
{
    $utilizator = filter_input(INPUT_POST, 'login_user', FILTER_SANITIZE_STRING);
    $parola = filter_input(INPUT_POST, 'login_parola', FILTER_SANITIZE_STRING);

    $parola_hashuita = hash('whirlpool', $parola);
    $parola_hashuita = strtoupper($parola_hashuita);

    //echo $utilizator . " parola: " . $parola_hashuita;

    $query = "SELECT * FROM `users` WHERE `username` = '$utilizator' AND `Password` = '$parola_hashuita' LIMIT 1";
    $result = $db_link->query($query);

    $succes = FALSE;
    while($row=$result->fetch_assoc())
    {
        if(!empty($row))
        {
            $_SESSION['este_logat'] = 1;
            echo "SALUT!!!!!";
            $succes = TRUE;
        }
    }
    if($succes == FALSE)
    {
        echo "Eroare";
    }
}
?>