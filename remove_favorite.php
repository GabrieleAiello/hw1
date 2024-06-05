<?php
require_once 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    if (!isset($_SESSION['id_user'])) {
        echo "Sessione utente non valida";
        exit; 
    }
    
    $id_user = $_SESSION['id_user'];
    $id_prodotto = $_POST['ID_Prodotto'];

    if (!$id_prodotto) {
        echo "ID prodotto non definito";
        exit; 
    }

    $id_user = $connessione->real_escape_string($id_user);
    $id_prodotto = $connessione->real_escape_string($id_prodotto);
    $user_check_query = "SELECT id FROM user WHERE id = '$id_user'";
    $user_check_result = $connessione->query($user_check_query);

    if ($user_check_result->num_rows == 0) {
        echo "Errore: L'ID utente non esiste.";
        exit;
    }

    $product_check_query = "SELECT id_prodotto FROM prodotto WHERE id_prodotto = '$id_prodotto'";
    $product_check_result = $connessione->query($product_check_query);

    if ($product_check_result->num_rows == 0) {
        echo "Errore: L'ID prodotto non esiste.";
        exit;
    }

    $sql = "DELETE FROM preferiti WHERE ID_User = '$id_user' AND ID_Prodotto = '$id_prodotto'";
    
    if ($connessione->query($sql) === TRUE) {
        echo "Prodotto rimosso dai preferiti!";
    } else {
        echo "Errore: " . $sql . "<br>" . $connessione->error;
    }
} 

$connessione->close();
?>
