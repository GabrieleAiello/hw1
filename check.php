<?php
session_start();
header('Content-Type: application/json');

$response = [];

if (isset($_SESSION['loggato']) && $_SESSION['loggato'] === true) {
    $response['loggato'] = true;
    $response['id_user'] = $_SESSION['id_user'];
    $response['email'] = $_SESSION['email'];
    $response['nome'] = $_SESSION['nome'];
    echo '<pre>';
print_r($response);
echo '</pre>';
    
} else {
    $response['loggato'] = false;
}

error_log(json_encode($response));
echo json_encode($response);
?>
