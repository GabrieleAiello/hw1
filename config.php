<?php
$host = "localhost";
$user = "root";
$password = "";
$db_name = "homework";

$connessione = new mysqli($host, $user, $password, $db_name);

if($connessione === false){
    die("Errore di connessione");
}
?>
