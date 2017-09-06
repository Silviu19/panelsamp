<?php
session_start();
require_once("config/config.php");
require_once("config/database.php");
require_once("functions.php");

global $db_link;

$uniqueKey = "uniqueKey";
if(isset($_GET["uniqueKey"]) && !empty($_GET["uniqueKey"])){
    $uniqueKey = $db_link->real_escape_string($_GET["uniqueKey"]);
}

$query = "SELECT * FROM `users` WHERE `KeyResetMail` = '$uniqueKey' LIMIT 1";
$result = $db_link->query($query);

$succes = FALSE;
while($row=$result->fetch_assoc())
{
    if (!empty($row))
    {
        echo "Keya ta a fost buna, reseteaza parola:";
        echo "<form action=\"templates/procesare_resetare2.php\" id=\"formLogin\" method=\"post\">

                    <div class=\"form-group\">
                        <label>Noua parola: </label>
                        <input class=\"form-control\" name=\"noua_parola\" type=\"text\">
                        <input name=\"key_secret\" type=\"hidden\" value=\"$uniqueKey\">
                        <p class=\"help-block\">Introdu aici noua ta parola</p>
                    </div>

                    <button type=\"submit\" class=\"btn btn-default\">Resetare</button>

                </form>";
        $succes = TRUE;
    }
}
if($succes == FALSE)
{
    echo "Eroare";
}

?>