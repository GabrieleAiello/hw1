<?php
require_once ("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $connessione->real_escape_string($_POST['email']);
    $nome = $connessione->real_escape_string($_POST['nome']);
    $cognome = $connessione->real_escape_string($_POST['cognome']);
    $password = $connessione->real_escape_string($_POST['password']);
    $confermaPassword = $connessione->real_escape_string($_POST['confermaPassword']);
    $PreferenzaAcquisto = $connessione->real_escape_string($_POST['PreferenzaAcquisto']);
    $dataNascita = $connessione->real_escape_string($_POST['dataNascita']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $hashed_confermapassword = password_hash($confermaPassword, PASSWORD_DEFAULT);

    $duplicate_query = mysqli_query($connessione, "SELECT * FROM user WHERE email = '$email'");

    if($duplicate_query) {
        if(mysqli_num_rows($duplicate_query)>0){
            echo "<script> alert('email già utilizzato');  window.location.href = 'signup.php'; </script>";
        } else {
            if($password === $confermaPassword){
                $sql = "INSERT INTO user (email, nome, cognome, password, confermaPassword, PreferenzaAcquisto, dataNascita) VALUES ('$email','$nome','$cognome','$hashed_password','$hashed_confermapassword','$PreferenzaAcquisto', '$dataNascita')";
                if($connessione->query($sql) === TRUE) {
                    echo "Registrazione effettuata con successo";
                    header("location: index.php");
                } else {
                    echo "Errore durante la registrazione utente";
                }
            } else {
                echo "<script> alert('Le password non corrispondono') </script>";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign up</title>
    <link rel="stylesheet" href="signup.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="signup.js" defer></script>
</head>
<body>
    <form action="signup.php" method="POST" autocomplete="off">
        <div class="SignUp" id="signup-div">
            <div class="signup-wrapper">
                    <h1>Stai per diventare un Member Nike</h1>
                    <div class="input-box">
                        <label for="email"></label>
                        <input type="email" name="email" id="email" placeholder="E-mail" required>
                    </div>
                    <div class="input-box">
                        <label for="nome"></label>
                        <input type="text" name="nome" id="nome" placeholder="Nome" required>
                    </div>
                    <div class="input-box">
                        <label for="Cognome"></label>
                        <input type="text" name="cognome" id="cognome" placeholder="Cognome" required>
                    </div>
                    <div class="input-box">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <img src="immagini/password_nascosta.png" id="pass_nascosta">
                    </div>
                    <div class="input-box">
                        <label for="confermaPassword"></label>
                        <input type="password" name="confermaPassword" id="confermaPassword" placeholder="Conferma Password" required>
                    </div>
                    <div class="input-box">
                        <label for="PreferenzaAcquisto">Preferenza di acquisto:</label>
                        <select name="PreferenzaAcquisto" id="PreferenzaAcquisto" required>
                            <option value="" disabled selected>Seleziona</option>
                            <option value="Uomo">Uomo</option>
                            <option value="Donna">Donna</option>
                            <option value="Bambino">Bambino</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="dataNascita">Inserisci la tua data di nascita:</label>
                        <input type="date" name="dataNascita" id="dataNascita" required>
                    </div>

                    <div class="input-checkbox">
                        <input type="checkbox" name="news" id="news">
                        <label for="news">Desidero ricevere notizie</label>
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" name="terms" id="terms" required>
                        <label for="terms">Accetto tutti i termini</label>
                    </div>
                    <input type="submit" value="invia">
                <p> Hai già un account? <a href="index.php">Torna alla Home</a><p>
                
            </div>
        </div>
    </form>    
</body>
</html>