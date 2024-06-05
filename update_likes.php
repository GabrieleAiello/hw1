<?php
session_start();
require_once ('config.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!isset($_SESSION['id_user'])) {
        echo "Sessione utente non valida";
        exit;
 }

    $id_user = $_SESSION['id_user'];
    $input = json_decode(file_get_contents('php://input'), true);
    $id_user = $connessione->real_escape_string($_SESSION['id_user']);
    $product_id = $connessione->real_escape_string($input['product_id']);
    $product_title = $connessione->real_escape_string($input['product_title']);
    $action = $connessione->real_escape_string($input['action']);

    if ($action === 'add') {
        $query = "INSERT INTO likes (user_id, product_id, product_title) VALUES ('$id_user', '$product_id', '$product_title')";
        $result = $connessione->query($query);
    } else {
        $query = "DELETE FROM likes WHERE user_id = '$id_user' AND product_id = '$product_id'";
        $result = $connessione->query($query);
    }

    if ($result) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }

    $connessione->close();
}
?>