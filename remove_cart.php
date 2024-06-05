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
    $id_user = $connessione->real_escape_string($id_user);
    $id_prodotto = $connessione->real_escape_string($id_prodotto);
    $user_check_query = "SELECT id FROM user WHERE id = '$id_user'";
    $user_check_result = $connessione->query($user_check_query);

    if ($user_check_result->num_rows == 0) {
        echo "Errore: L'ID utente non esiste.";
        exit;
    }

    $cart_check_query = "SELECT quantità FROM carrello WHERE prodotto = '$id_prodotto' AND proprietario = '$id_user'";
    $cart_check_result = $connessione->query($cart_check_query);

    if ($cart_check_result->num_rows == 0) {
        echo "Errore: L'ID prodotto non esiste nel carrello.";
        exit;
    }

    $row = $cart_check_result->fetch_assoc();
    $quantità_attuale = $row['quantità'];

    if ($quantità_attuale > 1) {
        $nuova_quantità = $quantità_attuale - 1;
        $update_query = "UPDATE carrello SET quantità = '$nuova_quantità' WHERE proprietario = '$id_user' AND prodotto = '$id_prodotto'";
        if ($connessione->query($update_query) === TRUE) {
            echo "Quantità aggiornata!";
        } else {
            echo "Errore nell'aggiornamento della quantità.";
        }
    } else {
        $delete_query = "DELETE FROM carrello WHERE proprietario = '$id_user' AND prodotto = '$id_prodotto'";
        if ($connessione->query($delete_query) === TRUE) {
            echo "Prodotto rimosso dal carrello!";
        } else {
            echo "Errore nella rimozione del prodotto dal carrello.";
        }
    }
}
$connessione->close();
?>





<!-- 
    $delete_query = "DELETE FROM carrello WHERE proprietario = '$id_user' AND prodotto = '$id_prodotto'";
    if ($connessione->query($delete_query) === TRUE) {
        echo "Prodotto rimosso dal carrello!";
    } 
--> 


