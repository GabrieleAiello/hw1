<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrello</title>
    <link rel="stylesheet" href="cart.css">
    <script src="cart.js"></script>
</head>
<body>



<h1>Il tuo carrello</h1>

<div class="cart-container">

<?php
session_start();
require_once ('config.php');

if (isset($_SESSION['id_user'])) {
    $ID_User = $_SESSION['id_user'];
    $sql = "SELECT prodotto.*, carrello.quantità FROM carrello 
            JOIN prodotto ON carrello.prodotto = prodotto.id_prodotto 
            WHERE carrello.proprietario = '$ID_User'";
    $result = $connessione->query($sql);
    if ($result->num_rows > 0) {
        echo "<div class='cart-container'>";

        $costo_totale = 0;

        while ($row = $result->fetch_assoc()) {
            echo '<div class="cart-item" id="cart-item-' . $row['id_prodotto'] . '">
            <img class="scarpa" src="' . $row["immagine"] . '" alt="Immagine">
            <div class="info-cart">
                <h2>' . $row["nome"] . '</h2>
                <p class="pPrice"> prezzo: ' . $row["prezzo"] . '€ </p>
                <p class="pDesc">' . $row["descrizione"] . '</p>
                <p class="pQty"> quantità: ' . $row["quantità"] . '</p>
            </div>
            <div>
                <button class="remove-cart-button" data-id="' . $row['id_prodotto'] . '">Rimuovi dal carrello</button>
            </div>
            </div>';

            $costo_prodotto = $row["prezzo"] * $row["quantità"];
            $costo_totale += $costo_prodotto;
        }

        echo "<p id='costo-totale'>Costo totale: " . number_format($costo_totale, 2) . "€</p>";
        echo "</div>";
        
    } else {
        echo "Il tuo carrello è vuoto!";
    }
} else {
    echo "Devi essere loggato per vedere il tuo carrello.";
}

$connessione->close();
?>


    

</div>
<p>Se non devi effettuare il pagamento in euro puoi utilizzare il nostro converitore di valuta, lo trovi qui sotto!</p> 
<img id="CurrencyExchange"  src="immagini/cambioValuta.png">
    
      
<button id="Acquista-btn"> Vai al pagamento </button>

<a href="index.php" id="HomePage"> Torna alla tua HomePage </a>



<!-- api cambio valuta -->
<div class="CurrencyExchangeContainer">
        <div id="topExchangeContainer">
            <p>CurrencyExchange</p>
            <img id="ExchangeExit" src="immagini/esci.png">
        </div>
                
        <div class="ContainerPrincipale">
            <div class="First_box">
                <select name="currency" class="currency"></select>
                <input type="number" name="" id="currencyInput">
            </div>
            <div class="Second_box">
                <select name="currency" class="currency"></select>
                <input type="text" name="" id="currencyOutput" disabled>
            </div>
        </div>
    <button class="Exchange-btn" id="CurrencyExchange-btn">Convert</button>
</div>

</body>
</html>
