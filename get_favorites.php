<?php
require_once 'config.php';
session_start();

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $favoriteProducts = [];
    
    $query = "SELECT ID_Prodotto FROM preferiti WHERE ID_User = '$id_user'";
    $result = $connessione->query($query);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $favoriteProducts[] = $row['ID_Prodotto'];
        }
    }
    header('Content-Type: application/json');
    echo json_encode(['favoriteProducts' => $favoriteProducts]);
} else {
    echo json_encode(['favoriteProducts' => []]);
}

$connessione->close();
?>
