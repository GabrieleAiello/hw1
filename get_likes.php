<?php
require_once 'config.php';
session_start();

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $likedProducts = [];

    $query = "SELECT product_id FROM likes WHERE user_id = '$id_user'";
    $result = $connessione->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $likedProducts[$row['product_id']] = true;  
        }
    }

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'likes' => $likedProducts]);
} else {
    echo json_encode(['success' => false, 'error' => 'utente non loggato']);
}

$connessione->close();
?>
