document.addEventListener('DOMContentLoaded', async function() {
    const response = await fetch('get_cart.php');
    const data = await response.json();
    const cartProducts = data.cartProducts;
    const cart = document.querySelectorAll('.img-carrello');
   
    cart.forEach(function(cart) {
        cart.addEventListener('click', async function() {
            const ID_Prodotto = cart.dataset.productid;

            if (cart.src.includes('immagini/imgcarrello.png')) { 
                const response = await fetch('add_cart.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: `ID_Prodotto=${encodeURIComponent(ID_Prodotto)}`,
                });
                const data = await response.text();
                console.log(data);

            } 
        });
    });
});



let totalPrice = 0; 

document.addEventListener('DOMContentLoaded', function() {
    const totalPriceElement = document.getElementById('costo-totale');
    const removeButtons = document.querySelectorAll('.remove-cart-button');

removeButtons.forEach(function(button) {
    button.addEventListener('click', async function() {
        const ID_Prodotto = button.dataset.id;

        const response = await fetch('remove_cart.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: `ID_Prodotto=${encodeURIComponent(ID_Prodotto)}`,
        });
        
        const data = await response.text();
        console.log(data);

        if (data.includes('Prodotto rimosso dal carrello!')) {
            const cartItem = button.closest('.cart-item');
            const qtyElement = cartItem.querySelector('.pQty');
            const currentQty = parseInt(qtyElement.textContent.split(': ')[1]);

            if (currentQty > 1) {
                qtyElement.textContent = `quantità: ${currentQty - 1}`;
            } else {
                qtyElement.textContent = `quantità: ${currentQty - 1}`;
                cartItem.style.display = 'none';
                
            }
            updateCartTotal();
        }
        
    });
    updateCartTotal();
});

function updateCartTotal() {
    var cartItems = document.querySelectorAll('.cart-item');
    totalPrice = 0; 
    cartItems.forEach(function(item) {
        var priceElement = item.querySelector('.pPrice');
        var quantityElement = item.querySelector('.pQty');
        var price = parseFloat(priceElement.textContent.split(':')[1].trim().replace('€', ''));
        var quantity = parseInt(quantityElement.textContent.split(':')[1].trim());
        totalPrice += price * quantity;
    });
        
    totalPriceElement.textContent = 'Costo totale: ' + totalPrice.toFixed(2) + '€'; 
}
    
});


/**** API PayPal *******/

const client_id = "AWQqIPnv5A3FSZE-j6qeX7SusV4AUEQpak5sL0Kl3_4AKvkbLGozR262riZMDu-puxpTlxbeFcqBtXfS";
const client_secret = "EMFhsrWsonZQT5Q1FgRYJIL2iv6Rwagu80rGnpcD43xbJjP2VN-VsZg3HZ9-v6tpgBbHOUpsTusFOKMx";
const environment = 'sandbox';
const endpoint_url = environment === 'sandbox' ? 'https://api-m.sandbox.paypal.com' : 'https://api-m.paypal.com';

const generateAccessToken = async () => {
    try {
        const response = await fetch(`${endpoint_url}/v1/oauth2/token`, {
            method: "POST",
            body: "grant_type=client_credentials",
            headers: {
                "Authorization": `Basic ${btoa(client_id + ":" + client_secret)}`
            },
        });
        const data = await response.json();
        return data.access_token;
    } catch (error) {
        console.error("Failed to generate Access Token:", error);
    }
};

const createOrder = async () => {
    try {
        const accessToken = await generateAccessToken();
        const url = `${endpoint_url}/v2/checkout/orders`;
        const payload = {
            intent: "CAPTURE",
            purchase_units: [
                {
                    amount: {
                        currency_code: "EUR",
                        value: totalPrice,
                    },
                },
            ],
        };

        const response = await fetch(url, {
            headers: {
                "Content-Type": "application/json",
                "Authorization": `Bearer ${accessToken}`,
            },
            method: "POST",
            body: JSON.stringify(payload),
        });

        const jsonResponse = await response.json();
        console.log(jsonResponse);
        
        window.location.href = `https://www.sandbox.paypal.com/checkoutnow?token=${jsonResponse.id}`;
    } catch (error) {
        console.error("Failed to create order:", error);
    }
};

document.addEventListener("DOMContentLoaded", function() {
    const payButton = document.querySelector('#Acquista-btn');
    if (payButton) {
        payButton.addEventListener('click', createOrder);
    }
});

/** Cambio Valuta API**/

document.addEventListener("DOMContentLoaded", function() {
    const exchangeSelect = document.querySelectorAll(".CurrencyExchangeContainer .currency");
    const exchangeBtn = document.getElementById("CurrencyExchange-btn");
    const exchangeInput = document.getElementById("currencyInput");
    const exchangeOutput = document.getElementById("currencyOutput");

    fetch("https://api.frankfurter.app/currencies")
        .then((data) => data.json())
        .then((data) => {
            displayExchange(data);
        });

    function displayExchange(data) {
        const entries = Object.entries(data);
        if (exchangeSelect.length >= 2) {
            for (var i = 0; i < entries.length; i++) {
                exchangeSelect[0].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
                exchangeSelect[1].innerHTML += `<option value="${entries[i][0]}">${entries[i][0]}</option>`;
            }
        }
    }

    if (exchangeBtn) {
        exchangeBtn.addEventListener("click", () => {
            let currency1 = exchangeSelect[0].value;
            let currency2 = exchangeSelect[1].value;
            let value = exchangeInput.value;

            if (currency1 !== currency2) {
                convertExchange(currency1, currency2, value);
            } else {
                alert("Stai provando a convertire il valore nella stessa valuta!");
            }
        });
    }

    function convertExchange(currency1, currency2, value) {
        const host = "api.frankfurter.app";
        fetch(`https://${host}/latest?amount=${value}&from=${currency1}&to=${currency2}`)
            .then((val) => val.json())
            .then((val) => {
                if (exchangeOutput) {
                    exchangeOutput.value = Object.values(val.rates)[0];
                }
            });
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const currencyExchangeImg = document.getElementById("CurrencyExchange");
    const currencyExchangeContainer = document.querySelector(".CurrencyExchangeContainer");

    if (currencyExchangeImg) {
        currencyExchangeImg.addEventListener("click", function() {
            if (currencyExchangeContainer) {
                currencyExchangeContainer.style.display = "block";
            }
        });
    }

    const exit = document.getElementById('ExchangeExit');
    if (exit) {
        exit.addEventListener("click", function() {
            if (currencyExchangeContainer) {
                currencyExchangeContainer.style.display = 'none';
            }
        });
    }
});