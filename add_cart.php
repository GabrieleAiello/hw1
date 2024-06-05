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

    if (isset($_POST['quantità'])) {
        $quantità = (int)$_POST['quantità'];
    } else {
        $quantità = 1;
        echo "Quantità non specificata, impostata a 1";
    }
    
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

    $carrello_check_query = "SELECT quantità FROM carrello WHERE proprietario = '$id_user' AND prodotto = '$id_prodotto'";
    $carrello_check_result = $connessione->query($carrello_check_query);
    
    if ($carrello_check_result->num_rows > 0) {
        $row = $carrello_check_result->fetch_assoc();
        $nuova_quantità = $row['quantità'] + $quantità;
        $update_query = "UPDATE carrello SET quantità = '$nuova_quantità' WHERE proprietario = '$id_user' AND prodotto = '$id_prodotto'";
        if ($connessione->query($update_query) === TRUE) {
            echo "Quantità del prodotto aggiornata nel carrello!";
        } else {
            echo "Errore";
        }
    } else {
        $sql = "INSERT INTO carrello (proprietario, prodotto, quantità) VALUES ('$id_user', '$id_prodotto', '$quantità')";
        if ($connessione->query($sql) === TRUE) {
            echo "Prodotto aggiunto al carrello!";
        } else {
            echo "Errore";
        }
    }
}
$connessione->close();
?>
