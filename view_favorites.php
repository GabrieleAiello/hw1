<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preferiti</title>
    <link rel="stylesheet" href="favorites.css">
    <script src="favorites.js"></script>
</head>
<body>


    <h1>I tuoi preferiti</h1>
    
    <div class="favorites-container">

        <?php
        session_start();
        require_once ('config.php');

        if (isset($_SESSION['id_user'])) {
            $ID_User = $_SESSION['id_user'];
            $sql = "SELECT prodotto.* FROM preferiti 
                    JOIN prodotto ON preferiti.ID_Prodotto = prodotto.id_prodotto 
                    WHERE preferiti.ID_User = '$ID_User'";
            $result = $connessione->query($sql);
            if ($result->num_rows > 0) {
                echo "<div class='favorites-container'>";
            
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="favorite">
                    <img class="scarpa" src="' . $row["immagine"] . '" alt="Immagine">
                    <div class="info-pref">
                        <h2>' . $row["nome"] . '</h2>
                        <p class="pPrice"> prezzo: ' . $row["prezzo"] . '€ </p>
                        <p class="pDesc">' . $row["descrizione"] . '</p>
                    </div>
                    <div>
                    <img src="immagini/preferiti.png" class="cuore img-preferito" data-productid="' . $row["id_prodotto"] . '" data-isfavorite="0">
                    </div>
                    
                  </div>';
                }
            
                echo "</div>";
            } else {
                echo "Non hai ancora aggiunto nessun preferito!";
            }
        } else {
            echo "Devi essere loggato per vedere i tuoi preferiti.";
        }

        $connessione->close();
        ?>
        <a href="index.php" id="HomePage"> Torna alla tua HomePage </a>
        
    </div>
</body>
</html>
