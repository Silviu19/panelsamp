<?php
    $db_link = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    $db_link->set_charset("utf8");

    if($db_link->connect_error){
        echo "Eroare la conectarea cu baza de date: ";
        echo $db_link->connect_errno;
        echo $db_link->connect_error;
    }
?>