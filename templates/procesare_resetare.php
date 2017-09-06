<?php
include_once '../config/config.php';
include_once '../config/database.php';
include_once '../functions.php';

session_start();
if(isset($_POST['reset_user']) && isset($_POST['reset_email']))
{
    $utilizator = filter_input(INPUT_POST, 'reset_user', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'reset_email', FILTER_SANITIZE_EMAIL);

    $query = "SELECT * FROM `users` WHERE `username` = '$utilizator' AND `Email` = '$email' LIMIT 1";
    $result = $db_link->query($query);

    $succes = FALSE;
    while($row=$result->fetch_assoc())
    {
        if(!empty($row))
        {
            echo "Ai introdus corect detaliile, iti trimitem acum un email!";
            $succes = TRUE;

            // 1 - 100
            $numarAleatoriu = rand(1, 100);
            $numarAleatoriu_hashuit = hash('whirlpool', $numarAleatoriu);

            $query = "UPDATE `users` SET `KeyResetMail` = '$numarAleatoriu_hashuit' WHERE `username` = '$utilizator'";
            $result2 = $db_link->query($query);

            $linkEmail = "http://" . $_SERVER["HTTP_HOST"] . "/resetareparola.php?uniqueKey=$numarAleatoriu_hashuit";

            $subject = "Restearea parolei tale";

            $message = "
            <html>
            <head>
            <title>Resetarea parolei</title>
            </head>
            <body>
            <p>Salutare, ai primit acest e-mail deoarece doresti sa iti resetezi parola.</p>
            <p>Pentru a continua, te rugam sa dai click pe urmatorul link <a href=\"$linkEmail\">Link</a>
            </body>
            </html>
            ";

            echo $message;

            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <adminTutoriale@tutoriale-pe.net>' . "\r\n";

            mail($email,$subject,$message,$headers);
        }
    }
    if($succes == FALSE)
    {
        echo "Eroare";
    }
}
?>