<?php
session_start();

require_once 'config.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    var_dump('ciao');
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $connessione->real_escape_string($_POST['email']);
        $password = $connessione->real_escape_string($_POST['password']);
        $sql_select = "SELECT * FROM user WHERE email = '$email'";
        if ($result = $connessione->query($sql_select)) {
            if ($result->num_rows == 1) {
                $row = $result->fetch_array(MYSQLI_ASSOC);
                if (password_verify($password, $row['password'])) {
                    $_SESSION["loggato"] = true;
                    $_SESSION['id_user'] = $row['id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['nome'] = $row['nome'];
                    header("Location: index.php");
                    exit(); 
                } else {
                    echo "La password non è corretta";
                }
            } else {
                echo "Non ci sono account con questa e-mail";
            }
        } else {
            echo "Errore in fase di login. Riprova più tardi."; 
        }
    } else {
        echo "Per favore, inserisci sia email che password.";
    }
}

$connessione->close();
?>
