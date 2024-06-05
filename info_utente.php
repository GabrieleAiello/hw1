<?php
session_start();

if (!isset($_SESSION['id_user'])) {
    echo "Per favore, effettua il login per vedere questa pagina.";
    exit;
}

require_once("config.php");

$user_id = mysqli_real_escape_string($connessione, $_SESSION['id_user']);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $field = mysqli_real_escape_string($connessione, $_POST['field']);
    $value = mysqli_real_escape_string($connessione, $_POST['value']);

    $sql_update = "UPDATE user SET $field='$value' WHERE id=$user_id";
    if ($connessione->query($sql_update) === TRUE) {
        echo "Dati aggiornati con successo.";
    } else {
        echo "Errore durante l'aggiornamento dei dati: " . $connessione->error;
    }
}

$sql = "SELECT * FROM user WHERE id = $user_id";
$result = $connessione->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Nessun utente trovato.";
    exit;
}

$connessione->close();
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Informazioni Utente</title>
    <link rel="stylesheet" href="info_utente.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>
        function enableEdit(field) {
            document.getElementById(field + '_text').style.display = 'none';
            document.getElementById(field + '_input').style.display = 'inline';
            document.getElementById(field + '_edit').style.display = 'none';
            document.getElementById(field + '_save').style.display = 'inline';
        }

        function saveEdit(field) {
            var value = document.getElementById(field + '_input').value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById(field + '_text').innerText = value;
                    document.getElementById(field + '_text').style.display = 'inline';
                    document.getElementById(field + '_input').style.display = 'none';
                    document.getElementById(field + '_edit').style.display = 'inline';
                    document.getElementById(field + '_save').style.display = 'none';
                }
            };
            xhr.send("field=" + field + "&value=" + encodeURIComponent(value));
        }
    </script>
</head>
<body>
    <h1>Informazioni Utente</h1><br>
    <table>
        <tr>
            <th>ID: </th>
            <td><?php echo htmlspecialchars($user['id']); ?></td>
        </tr>

        <tr>
            <th>Email: </th>
            <td>
                <span class="text" id="email_text"><?php echo htmlspecialchars($user['email']); ?></span>
                <input type="email" id="email_input" value="<?php echo htmlspecialchars($user['email']); ?>" style="display:none;">
                <button id="email_edit" onclick="enableEdit('email')">Modifica</button>
                <button id="email_save" onclick="saveEdit('email')" style="display:none;">Salva</button>
            </td>
        </tr>

        <tr>
            <th>Nome: </th>
            <td>
                <span class="text" id="nome_text"><?php echo htmlspecialchars($user['nome']); ?></span>
                <input type="text" id="nome_input" value="<?php echo htmlspecialchars($user['nome']); ?>" style="display:none;">
                <button id="nome_edit" onclick="enableEdit('nome')">Modifica</button>
                <button id="nome_save" onclick="saveEdit('nome')" style="display:none;">Salva</button>
            </td>
        </tr>

        <tr>
            <th>Cognome: </th>
            <td>
                <span class="text" id="cognome_text"><?php echo htmlspecialchars($user['cognome']); ?></span>
                <input type="text" id="cognome_input" value="<?php echo htmlspecialchars($user['cognome']); ?>" style="display:none;">
                <button id="cognome_edit" onclick="enableEdit('cognome')">Modifica</button>
                <button id="cognome_save" onclick="saveEdit('cognome')" style="display:none;">Salva</button>
            </td>
        </tr>
        
        <tr>
            <th>Data di Nascita: </th>
            <td>
                <span class="text" id="DataNascita_text"><?php echo date("d-m-Y", strtotime($user['DataNascita'])); ?></span>
                <input type="date" id="DataNascita_input" value="<?php echo htmlspecialchars($user['DataNascita']); ?>" style="display:none;">
                <button id="DataNascita_edit" onclick="enableEdit('DataNascita')">Modifica</button>
                <button id="DataNascita_save" onclick="saveEdit('DataNascita')" style="display:none;">Salva</button>
            </td>
        </tr>
    </table>

    <a href="index.php" id="HomePage"> Torna alla tua HomePage </a>
</body>
</html>
