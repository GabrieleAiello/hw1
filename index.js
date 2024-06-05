document.addEventListener("DOMContentLoaded", function() {
    sezioneNovitaEInEvidenza = document.querySelector('#elenco-pannello1');
    sezioneUomo = document.querySelector('#elenco-pannello2');
    sezioneDonna = document.querySelector('#elenco-pannello3');
    sezioneKids = document.querySelector('#elenco-pannello4');
    sezioneOutlet = document.querySelector('#elenco-pannello5');

    const novitaEInEvidenzaLink = document.querySelector('#navbar2-C a:first-child');
    novitaEInEvidenzaLink.addEventListener('mouseenter', function() {
        closePanels();
        sezioneNovitaEInEvidenza.style.display = 'block';
    });
    sezioneNovitaEInEvidenza.addEventListener('mouseleave', function() {
        sezioneNovitaEInEvidenza.style.display = 'none';
    });

    const uomoLink = document.querySelector('#navbar2-C a:nth-child(2)');
    uomoLink.addEventListener('mouseenter', function() {
        closePanels();
        sezioneUomo.style.display = 'block';
    });
    sezioneUomo.addEventListener('mouseleave', function() {
        sezioneUomo.style.display = 'none';
    });

    const donnaLink = document.querySelector('#navbar2-C a:nth-child(3)');
    donnaLink.addEventListener('mouseenter', function() {
        closePanels();
        sezioneDonna.style.display = 'block';
    });
    sezioneDonna.addEventListener('mouseleave', function() {
        sezioneDonna.style.display = 'none';
    });

    const kidsLink = document.querySelector('#navbar2-C a:nth-child(4)');
    kidsLink.addEventListener('mouseenter', function() {
        closePanels();
        sezioneKids.style.display = 'block';
    });
    sezioneKids.addEventListener('mouseleave', function() {
        sezioneKids.style.display = 'none';
    });

    const outletLink = document.querySelector('#navbar2-C a:nth-child(5)');
    outletLink.addEventListener('mouseenter', function() {
        closePanels();
        sezioneOutlet.style.display = 'block';
    });
    sezioneOutlet.addEventListener('mouseleave', function() {
        sezioneOutlet.style.display = 'none';
    });
}); 

function closePanels() {
    sezioneNovitaEInEvidenza.style.display = 'none';
    sezioneUomo.style.display = 'none';
    sezioneDonna.style.display = 'none';
    sezioneKids.style.display = 'none';
    sezioneOutlet.style.display = 'none';
}


/** RICERCA **/

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = ['ricercaDx', 'ricercaDx-mobile'];
    const searchResultsIds = ['searchResults', 'searchResults-mobile'];

    searchInput.forEach((input, index) => {
        const searchInput = document.getElementById(input);
        const searchResults = document.getElementById(searchResultsIds[index]);

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();
            if (query.length > 0) {
                fetch(`https://api.escuelajs.co/api/v1/products`)
                    .then(response => response.json())
                    .then(data => {
                        const filteredProducts = data.filter(product => 
                            product.title.toLowerCase().includes(query)
                        );
                        displayResults(filteredProducts, searchResults);
                    })
                    .catch(error => console.error('Errore'));
            } else {
                searchResults.innerHTML = '';
                searchResults.style.display = 'none';
            }
        });
    });

    function displayResults(products, searchResults) {
        searchResults.innerHTML = '';
        if (products.length > 0) {
            products.forEach(product => {
                const productElement = document.createElement('div');
                productElement.className = 'search-result';
                productElement.innerHTML = `
                    <a href="${product.id}">
                        <h3>${product.title}</h3>
                    </a>
                    <img src="immagini/like-vuoto.png" class="like-icon" data-productid="${product.id}" data-title="${product.title}">
                `;
                searchResults.appendChild(productElement);
            });
            searchResults.style.display = 'block';

            document.querySelectorAll('.like-icon').forEach(icon => {
                icon.addEventListener('click', function() {
                    toggleLike(this);
                });
            });

            loadLikes();
        } else {
            searchResults.innerHTML = '<p> nessun risultato</p>';
            searchResults.style.display = 'block';
        }
    }

    function toggleLike(icon) {
        const productId = icon.getAttribute('data-productid');
        const productTitle = icon.getAttribute('data-title');
        const id_user = document.getElementById('user-id').value;
        const isLiked = icon.getAttribute('src') === 'immagini/like-vuoto.png';
        const newSrc = isLiked ? 'immagini/like-pieno.png' : 'immagini/like-vuoto.png';

        fetch('update_likes.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id_user: id_user,
                product_id: productId,
                product_title: productTitle,
                action: isLiked ? 'add' : 'remove'
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                icon.setAttribute('src', newSrc);
            } else {
                console.error('Errore');
            }
        })
        .catch(error => console.error('Errore'));
    }

    function loadLikes() {
        const id_user = document.getElementById('user-id').value;

        fetch('get_likes.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id_user: id_user })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                for (const productId in data.likes) {
                    const icon = document.querySelector(`[data-productid="${productId}"]`);
                    if (icon) {
                        const isLiked = data.likes[productId];
                        const newSrc = isLiked ? 'immagini/like-pieno.png' : 'immagini/like-vuoto.png';
                        icon.setAttribute('src', newSrc);
                    }
                }
            } else {
                console.error('Errore');
            }
        })
        .catch(error => console.error('Errore'));
    }
});


/******* Menù laterale mobile ******/
document.addEventListener("DOMContentLoaded", function() {
    let item = document.querySelector('#Hamburger-icon');
    item.addEventListener("click", function() {
        document.body.classList.toggle('menu-open');
    });
});

/* ricerca mobile */
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("cerca-mobile").addEventListener("click", function() {
        var cercaDiv = document.getElementById("boxRicerca-mobile");
        var likesDiv = document.getElementById("searchResults-mobile");
        if (cercaDiv.style.display === "flex") {
            cercaDiv.style.display = "none";
            likesDiv.style.display = "none";
        } else {
            cercaDiv.style.display = "flex";
        }
    });
});



/****** Tooltip Nike ******/
document.addEventListener("DOMContentLoaded", function() {
    const image = document.querySelector('#Nike');
    const tooltipText = image.getAttribute('data-text');
    const tooltip = document.createElement('div');
    tooltip.classList.add('tooltip');
    tooltip.textContent = tooltipText;
    document.body.appendChild(tooltip);

    image.addEventListener('mouseenter', function() {
        tooltip.style.display = 'block';
    });

    image.addEventListener('mousemove', function(e) {
        updateTooltipPosition(e);
    });

    image.addEventListener('mouseleave', function() {
        tooltip.style.display = 'none';
    });

    function updateTooltipPosition(e) {
        const xOffset = 20;
        const yOffset = 10;

        let x = e.clientX + xOffset;
        let y = e.clientY + yOffset;


        tooltip.style.left = x + 'px';
        tooltip.style.top = y + 'px';
    }
});




/***** Login *******/
document.addEventListener("DOMContentLoaded", function() {
    var accessoDiv = document.getElementById('accesso-div');
    var userPanel = document.getElementById('user-panel');
    accessoDiv.style.display = 'none';
       document.getElementById('userPanelToggle').addEventListener('click', function(event) {
        event.preventDefault();
        var userName = document.getElementById('userPanelToggle').innerText;

        if(userName.includes('Accedi')) {
            if(accessoDiv.style.display === 'none') {
                accessoDiv.style.display = 'block';
            } else {
                accessoDiv.style.display = 'none';
            }
        } else {
            if(userPanel.style.display === 'none') {
                userPanel.style.display = 'block';
            } else {
                userPanel.style.display = 'none';
            }
        }
    });
});


document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("people").addEventListener("click", function() {
        var accessoDiv = document.getElementById("accesso-div");
        if (accessoDiv.style.display === "block") {
            accessoDiv.style.display = "none";
        } else {
            accessoDiv.style.display = "block";
        }
    });
});


document.addEventListener("DOMContentLoaded", function() {
    let eyeicon = document.getElementById("pass_nascosta");
    let password = document.getElementById("password");
    eyeicon.onclick = function(){
        if(password.type == 'password'){
            password.type = "text";
            eyeicon.src = "immagini/mostra_password.png";
        }else{
            password.type = "password";
            eyeicon.src = "immagini/password_nascosta.png";
        }
    }
});

/*logout */
document.addEventListener("DOMContentLoaded", function() {
    const logoutButton = document.getElementById("logout_button");
    const userPanelToggle = document.getElementById("userPanelToggle");
    if (logoutButton) {
        logoutButton.addEventListener("click", async function(event) {
            event.preventDefault();
            const response = await fetch('logout.php');

            if (response.ok) {
                document.getElementById('user-panel').style.display = 'none';
                userPanelToggle.innerText = 'Accedi';
                sessionStorage.clear();
                const favoriteImages = document.querySelectorAll('.img-preferito');
                favoriteImages.forEach(img => img.src = 'immagini/preferiti.png');
            }
        });
    } 
});

