<?php
    session_start();
    require_once("config/config.php");
    require_once("config/database.php");
    require_once("functions.php");

    global $db_link;

    $pagina = "acasa";
    if(isset($_GET["pagina"]) && !empty($_GET["pagina"])){
        $pagina = $db_link->real_escape_string($_GET["pagina"]);
    }

    switch($pagina){
        case "acasa":
        {
            $pagina = "acasa";
            $pagina_titlu = "Pagina principala";

            afiseaza_template("acasa");

            break;
        }
        case "afisare":
        {
            if(!isset($_SESSION['este_logat']))
                echo "Nu esti logat";
            else {
                $pagina = "afisare";
                $pagina_titlu = "Pagina protejata";

                afiseaza_template("afisare");
            }

            break;
        }
        case "resetareparola":
        {
            if(isset($_SESSION['este_logat']))
                echo "Esti logat, nu poti sa iti resetezi parola!";
            else
            {
                $pagina = "resetareparola";
                $pagina_titlu = "Resetarea parolei";

                afiseaza_template("resetareparola");
            }

            break;
        }
        default:
        {
            $pagina = "acasa";
        }
    }
?>