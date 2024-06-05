<?php
require_once 'config.php';
session_start();

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $cartProducts = [];

    $query = "SELECT prodotto, quantità FROM carrello WHERE proprietario = '$id_user'";
    $result = $connessione->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cartProducts[] = [
                'ID_Prodotto' => $row['prodotto'],
                'quantità' => $row['quantità']
            ];
        }
    }
    header('Content-Type: application/json');
    echo json_encode(['cartProducts' => $cartProducts]);
} else {
    echo json_encode(['cartProducts' => []]);
}

$connessione->close();
?>
