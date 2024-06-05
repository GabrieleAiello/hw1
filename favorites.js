document.addEventListener('DOMContentLoaded', async function() {
    const response = await fetch('get_favorites.php');
    const data = await response.json();
    const favoriteProducts = data.favoriteProducts;
    const hearts = document.querySelectorAll('.img-preferito');
    hearts.forEach(function(heart) {
        const productID = heart.dataset.productid;
        if (favoriteProducts.includes(productID)) {
            heart.src = 'immagini/preferito-pieno.png';
        }
    });

    hearts.forEach(function(heart) {
        heart.addEventListener('click', async function() {
            const ID_Prodotto = heart.dataset.productid;

            if (heart.src.includes('immagini/preferiti.png')) {
                const response = await fetch('add_favorite.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `ID_Prodotto=${encodeURIComponent(ID_Prodotto)}`,
                });
                const data = await response.text();
                console.log(data);
                heart.src = 'immagini/preferito-pieno.png';
            } else {
                const response = await fetch('remove_favorite.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `ID_Prodotto=${encodeURIComponent(ID_Prodotto)}`,
                });
                const data = await response.text();
                console.log(data);
                heart.src = 'immagini/preferiti.png';
            }
        });
    });
});