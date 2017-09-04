<?php
    function afiseaza_template($pagina) {
        global $pagina;

        require_once("templates/header.php");
        require_once("templates/".$pagina.".php");
        require_once("templates/footer.php");
    }
?>