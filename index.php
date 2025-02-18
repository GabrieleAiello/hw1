<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title> Nike. Just Do It. Nike IT </title>
    <link rel="stylesheet" href="index.css">
    <script src="index.js"></script>
    <script src="cart.js"></script>
    <script src="favorites.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body> 
<input type="hidden" id="user-id" value="<?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : ''; ?>">
    <header>
    <!--Section1-->
    <nav>
        <div id="navbar1" class="padding">
            <div id="navbar1-Sx">
                <a href="#"><img src="immagini/Jordan.png" class="img-nav-1"/></a> 
                <a href="#"><img src="immagini/Converse1.png" class="img-nav-1"/></a>
            </div>

            <div id="navbar1-Dx">
                <a href="#"><span>Trova un negozio</span></a>
                |
                <a href="#"><span>Aiuto</span></a>
                |
                <a href="#"><span>Unisciti a noi</span></a>
                |
                <span id="accedi-container">
                    <a href="#" id="userPanelToggle" ><span><?php echo isset($_SESSION['nome']) ? 'Ciao, ' . $_SESSION['nome'] : 'Accedi'; ?></span></a>
                        
                    <div id="user-panel" style="display: none;"> 
                        <button id="userInfo_button"> <a href="info_utente.php"> Dati utente</a></button>
                        <button id="logout_button">Logout</button>
                    </div>
                </span>
            </div>  
        </div>




        <div class="Accesso" id="accesso-div">
            <div class="wrapper"> 
                <form action="Login.php" method="POST"> 
                    <h1>Login</h1>
                    <div class="input-box">
                        <label for="email"></label>
                        <input type="email" name="email" id="email" placeholder="E-mail" required>
                        <img src="immagini/people.png" class="img-people">
                    </div>
                    <div class="input-box">
                        <label for="password"></label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <img src="immagini/password_nascosta.png" id="pass_nascosta">
                    </div>
            
                    <div class="remember-forgot">
                        <label><input type="checkbox"> Ricorda utente </label>
                        <a href="#"> Password dimenticata</a>
                    </div>
            
                    <button type="submit" class="btn"> Login </button>
                    <div class="register-link">
                        <p>Non hai un account? <a href="http://localhost/signup.php">Registrati</a></p>
                    </div>
                </form>
            </div>
        </div>
            
    </nav>

 

 

    <!--Section2 Navbar-Desktop | Ricerca-->

    <nav>
        <div id="navbar2" class="padding">
            <div id="navbar2-Sx">
                <a href="#"><img src="immagini/Nike.png" id="Nike" data-text="Esplora Nike"></a>
            </div>
    
            <div id="navbar2-C">
                <a href="#">Novità e in evidenza</a>   
                <a href="#">Uomo</a>   
                <a href="#">Donna</a>    
                <a href="#">Kids</a>   
                <a href="#">Outlet</a>   
            </div>
    
            <div id="navbar2-Dx-desktop">
                <div id="boxRicerca">
                    <img src="immagini/cerca.png" class="icon">
                    <input type="text" name="ricercaDx" placeholder="Cerca"  id="ricercaDx">    
                </div>
    
                <a href="view_favorites.php"><img src="immagini/preferiti.png" class="icon"></a>
       
                <a href="view_cart.php"><img id="img-cart" src="immagini/Screenshot_7-removebg-preview.png" class="icon"></a>
            </div>
    
            <div id="searchResults"></div>
        </div>
    </nav>


                <!-- Elenco novitá ed in evidenza-->
<section id="elenco-pannello1" class="elenco-pannello">
    <div id="links-box-Pannello">
        <div>
            <a>In evidenza</a>
            <div class="dettagli">
                <a href="#">Tutti i nuovi arrivi</a>
                <a href="#">Best seller</a>
                <a href="#">Member Shop</a>
                <a href="#">Calendario dei lanci SNKRS</a>
                <a href="#">Divise delle nazionali 2024</a>
            </div>
        </div>

        <div>
            <a>Scopri le icone</a>
            <div class="dettagli">
                <a href="#">Air Force 1</a>
                <a href="#">Air Jordan 1</a>
                <a href="#">Air Max</a>
                <a href="#">Dunk</a>
                <a href="#">Blazer</a>
                <a href="#">Pegasus</a>
                <a href="#">Mercurial</a>
            </div>
        </div>

        <div>
            <a>Scopri lo sport</a>
            <div class="dettagli">
                <a href="#">Calcio</a>
                <a href="#">Running</a>
                <a href="#">Basket</a>
                <a href="#">Fitness</a>
                <a href="#">Golf</a>
                <a href="#">Tennis</a>
                <a href="#">Yoga</a>
                <a href="#">Danza</a>
                <a href="#">Skateboard</a>
            </div>
        </div>

        <div>
            <a>Di tendenza</a>
            <div class="dettagli">
                <a href="#">Air Max Home</a>
                <a href="#">Sneakers Y2K</a>
                <a href="#">Fleece Shop</a>
                <a href="#">Nike Style By</a>
                <a href="#">Teenager</a>
                <a href="#">Facile da indossare</a>
                <a href="#">Idee regalo Nike</a>
                <a href="#">Sostenibilità</a>
            </div>
        </div>
    </div>

</section>

<!-- Elenco Uomo-->

<section id="elenco-pannello2" class="elenco-pannello">
    <div id="links-box-Pannello">
        <div>
            <a>In evidenza</a>
            <div class="dettagli">
                <a href="#">Novità</a>
                <a href="#">Best seller</a>
                <a href="#">Air Max Home</a>
                <a href="#">Sneakers Y2K</a>
                <a href="#">Divise delle nazionali 2024</a>
            </div>
        </div>

        <div>
            <a>Scarpe</a>
            <div class="dettagli">
                <a href="#">Tutte le scarpe</a>
                <a href="#">Lifestyle</a>
                <a href="#">Jordan</a>
                <a href="#">Running</a>
                <a href="#">Calcio</a>
                <a href="#">Basket</a>
                <a href="#">Fitness e training</a>
                <a href="#">Skateboard</a>
                <a href="#">Nike By You</a>
            </div>
        </div>

        <div>
            <a>Abbigliamento</a>
            <div class="dettagli">
                <a href="#">Tutto l'abbigliamento</a>
                <a href="#">Maglie e t-shirt</a>
                <a href="#">Felpe</a>
                <a href="#">Shorts</a>
                <a href="#">Pantaloni e tights</a>
                <a href="#">Tute</a>
                <a href="#">Giacche</a>
                <a href="#">Divise e maglie</a>
            </div>
        </div>

        <div>
            <a>Scopri lo sport</a>
            <div class="dettagli">
                <a href="#">Running</a>
                <a href="#">Calcio</a>
                <a href="#">Basket</a>
                <a href="#">Fitness e training</a>
                <a href="#">Tennis</a>
                <a href="#">Golf</a>
            </div>
        </div>

        <div>
            <a>Accessori</a>
            <div class="dettagli">
                <a href="#">Tutti gli accessori</a>
                <a href="#">Borse e zaini</a>
                <a href="#">Calze</a>
            </div>
        </div>
    </div>

</section>

<!-- Elenco Donna-->

<section id="elenco-pannello3" class="elenco-pannello">
    <div id="links-box-Pannello">
        <div>
            <a>In evidenza</a>
            <div class="dettagli">
                <a href="#">Novità</a>
                <a href="#">Best seller</a>
                <a href="#">Nike Style By</a>
                <a href="#">Air Max Home</a>
                <a href="#">Sneakers Y2K</a>
                <a href="#">Teenager</a>
                <a href="#">Divise delle nazionali 2024</a>
            </div>
        </div>

        <div>
            <a>Scarpe</a>
            <div class="dettagli">
                <a href="#">Tutte le scarpe</a>
                <a href="#">Lifestyle</a>
                <a href="#">Jordan</a>
                <a href="#">Running</a>
                <a href="#">Fitness e training</a>
                <a href="#">Calcio</a>
                <a href="#">Nike By You</a>
            </div>
        </div>

        <div>
            <a>Abbigliamento</a>
            <div class="dettagli">
                <a href="#">Tutto l'abbigliamento</a>
                <a href="#">top e t-shirt</a>
                <a href="#">Felpe</a>
                <a href="#">Shorts</a>
                <a href="#">Pantaloni</a>
                <a href="#">Set coordinati</a>
                <a href="#">Giacche</a>
                <a href="#">Reggiseni sportivi</a>
                <a href="#">Gonne e abiti</a>
            </div>
        </div>

        <div>
            <a>Scopri lo sport</a>
            <div class="dettagli">
                <a href="#">Fitness</a>
                <a href="#">Running</a>
                <a href="#">Calcio</a>
                <a href="#">Basket</a>
                <a href="#">Tennis</a>
                <a href="#">Danza</a>
                <a href="#">Yoga</a>
                <a href="#">Golf</a>
            </div>
        </div>

        <div>
            <a>Accessori</a>
            <div class="dettagli">
                <a href="#">Tutti gli accessori</a>
                <a href="#">Borse e zaini</a>
                <a href="#">Calze</a>
            </div>
        </div>
    </div>

</section>

<!-- Elenco Kids-->

<section id="elenco-pannello4" class="elenco-pannello">
    <div id="links-box-Pannello">
        <div>
            <a>In evidenza</a>
            <div class="dettagli">
                <a href="#">Novità</a>
                <a href="#">Best seller</a>
                <a href="#">Teenager</a>
                <a href="#">Air Max Home</a>
                <a href="#">EasyOn</a>
                <a href="#">Divise delle nazionali 2024</a>
            </div>
        </div>

        <div>
            <a>Scarpe</a>
            <div class="dettagli">
                <a href="#">Tutte le scarpe</a>
                <a href="#">Lifestyle</a>
                <a href="#">Jordan</a>
                <a href="#">Calcio</a>
                <a href="#">Running</a>
                <a href="#">Basket</a>
            </div>
        </div>

        <div>
            <a>Abbigliamento</a>
            <div class="dettagli">
                <a href="#">Tutto l'abbigliamento</a>
                <a href="#">maglie e t-shirt</a>
                <a href="#">Felpe</a>
                <a href="#">Tute</a>
                <a href="#">Shorts</a>
                <a href="#">Abbigliamento sportivo</a>
                <a href="#">Pantaloni e leggins</a>
                <a href="#">Giacche</a>
                <a href="#">Divise e maglie</a>
                <a href="#">Reggiseni sportivi</a>
                <a href="#">Gonne e abiti</a>
            </div>
        </div>

        <div>
            <a>Kids per età</a>
            <div class="dettagli">
                <a href="#">Ragazzo/a(7-15anni)</a>
                <a href="#">Bambino/a(3-7 anni)</a>
                <a href="#">Bebè e bimbo/a(0-3 anni)</a>
            </div>
        </div>

        <div>
            <a>Accessori</a>
            <div class="dettagli">
                <a href="#">Tutti gli accessori</a>
                <a href="#">Borse e zaini</a>
                <a href="#">Capplli</a>
                <a href="#">Calze</a>
            </div>
        </div>
    </div>

</section>

<!-- Elenco Outlet-->

<section id="elenco-pannello5" class="elenco-pannello">
    <div id="links-box-Pannello">
        <div>
            <a>Sconti e offerte</a>
            <div class="dettagli">
                <a href="#">Tutti gli articoli in sconto</a>
                <a href="#">Best seller</a>
                <a href="#">Ultima occasione</a>
            </div>
        </div>

        <div>
            <a>Sconti per lui</a>
            <div class="dettagli">
                <a href="#">Articoli in sconto</a>
                <a href="#">Scarpe</a>
                <a href="#">Abbiglimaneto</a>
                <a href="#">Accessori</a>
            </div>
        </div>

        <div>
            <a>Sconti per lei</a>
            <div class="dettagli">
                <a href="#">Articoli in sconto</a>
                <a href="#">Scarpe</a>
                <a href="#">Abbiglimaneto</a>
                <a href="#">Accessori</a>
            </div>
        </div>

        <div>
            <a>Sconti per bambini</a>
            <div class="dettagli">
                <a href="#">Scarpe</a>
                <a href="#">Abbiglimaneto</a>
                <a href="#">Accessori</a>
            </div>
        </div>

        <div>
            <a>Sconti per sport</a>
            <div class="dettagli">
                <a href="#">Running</a>
                <a href="#">Calcio</a>
                <a href="#">Fitness e training</a>
                <a href="#">Basket</a>
                <a href="#">Tennis</a>
                <a href="#">Golf</a>
                <a href="#">Yoga</a>
            </div>
        </div>
    </div>

</section>


    <!--Section2 Navbar-Mobile-->
        <nav id="nav-mobile">
            <div id="menu-mobile">
                <div id="logo-sito">
                    <a href="#"><img src="immagini/Nike.png" id="Nike"></a>
                </div>


                <div id="navbar2-Dx">
                        <a href="#"><img id="cerca-mobile" src="immagini/cerca.png" class="icon"></a>
                        <a href="view_cart.php"><img id="img-cart-mobile" src="immagini/Screenshot_7-removebg-preview.png" class="icon"></a>
                        <a href="#"><img id="people" src="immagini/people.png" class="img-people"></a>
                </div>
                    
                <div id="Hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>   
            </div>
        </nav>

        <div id="boxRicerca-mobile">
                    <img src="immagini/cerca.png" class="icon">
                    <input type="text" name="ricercaDx" placeholder="Cerca"  id="ricercaDx-mobile">    
                </div>
            <div id="searchResults-mobile"></div>


        <div>
            <ul class="header_menu_mobile">
                <li><a href="#">Novità</a></li>   
                <li><a href="#">Uomo</a></li>   
                <li><a href="#">Donna</a></li>    
                <li><a href="#">Kids</a></li>   
                <li><a href="#">Outlet</a></li> 
                <li><a href="view_cart.php">Carrello</a></li>   
                <li><a href="view_favorites.php">Preferiti</a></li>
                <?php if (isset($_SESSION['id_user'])): ?>
                    <li><a href="info_utente.php">Dati utente</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <?php endif; ?>
                
                <li><a href="#"><img src="immagini/Nike.png" id="Nike"> </a></li> 
            </ul>
        </div>
    </header>

    <!-- Container1 -->
    <section>
        <div id="container1" class="padding">   
            <h3>Tutti i nuovi arrivi</h3>
            <h5><a href="#">Acquista</a></h5>
        </div>
    </section>

    <!-- Video loop -->
    <div id="video-container">
        <video width="auto" autoplay muted loop>
            <source src="immagini/2024-03-16-17-59-53.mp4" type="video/mp4">
        </video>
    </div>
      

    <!-- Container-Novità -->
    <div id="Novità" class="padding">   
        <h5>Novità</h5>
        <h1>AIR MAX PLUS DRIFT</h1>
        <h3>La nuova generazione di Air Max: strati resistenti, trazione extra e protezione per i lacci.</h3>
        <a href="#">Acquista</a>
    </div>


    <!-- Container migliori novità -->
    <section id="news">
        <div class="Container-Multiplo padding" >
        
            <div>
                <p>Tutte le migliori novità</p>
            </div>
        
            <div>
                <a href="#"><img src="immagini/indietro_chiaro .png" class="scorrimento"></a>
                <a href="#"><img src="immagini/avanti_colorato.png" class="scorrimento"></a>
            </div>

        </div>


        <div class="BoxEsterno">
            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Screenshot_8.png">
                    <p>Presto disponibile: Air Max Dn</p>
                </a>
            </div>

            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Screenshot_9.png">
                    <p>Outfit da running</p>
                </a>
            </div>

            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Screenshot_10.png">
                    <p>Must-have per il fitness</p>
                </a>
            </div>
        </div>

    </section>

    <!-- Container catalogo -->

    <div class="Container-Multiplo padding">
        <div id="Trend">
            <p>Trend della settimana </p>
        </div>
        <div>
            <a href="#"><img src="immagini/indietro_chiaro .png" class="scorrimento"></a>
            <a href="#"><img src="immagini/avanti_colorato.png" class="scorrimento"></a>
        </div>
    </div>
    <div class="BoxEsterno">
        <div class="BoxInterno2">
            <a href="#" class="scarpa-link" data-name="Nike Air Force 1 '07" data-price="119.00">
                <img id="img-scarpa" src="immagini/Scarpa1.png">
                <div class="info-scarpa">
                    <div>
                        <div id="scarpa">
                            <p> Nike Air Force 1 '07</p>
                        </div>
                        <p class="font-Grey"> Scarpa - Uomo </p>
                        <div id="prezzo">
                            <p> 119,00 € </p>
                        </div>
                    </div> 
            </a>
                    <div class="catalog-actions">
                        <img src="immagini/imgcarrello.png" class="img-carrello" data-productid="8">
                        <img src="immagini/preferiti.png" class="cuore img-preferito" data-productid="8" data-isfavorite="0">
                    </div>

                </div>
        </div>
        
        <div class="BoxInterno2">
            <a href="#" class="scarpa-link" data-name="Nike Air Force 1 LE" data-price="94.00">
                <img id="img-scarpa" src="immagini/Scarpa2.png">
                <div class="info-scarpa">
                    <div>
                        <div id="scarpa">
                            <p> Nike Air Force 1 LE</p>
                        </div>
                        <p class="font-Grey"> Scarpa - Ragazzi </p>
                        <div id="prezzo">
                            <p> 94,00 € </p>
                        </div>
                    </div> 
            </a>
                    <div class="catalog-actions">
                        <img src="immagini/imgcarrello.png" class="img-carrello" data-productid="9">
                        <img src="immagini/preferiti.png" class="cuore img-preferito" data-productid="9" data-isfavorite="0">
                    </div>

                </div>
            
        </div>


        <div class="BoxInterno2">
            <a href="#" class="scarpa-link" data-name="Nike Dunk Low" data-price="69.00">
                <img id="img-scarpa" src="immagini/Scarpa3.png">
                <div class="info-scarpa">
                    <div>
                        <div id="scarpa">
                            <p> Nike Dunk Low</p>
                        </div>
                        <p class="font-Grey"> Scarpa - Bambini </p>
                        <div id="prezzo">
                            <p> 69,00 € </p>
                        </div>
                    </div> 
            </a>
            <div class="catalog-actions">
                        <img src="immagini/imgcarrello.png" class="img-carrello" data-productid="10">
                        <img src="immagini/preferiti.png" class="cuore img-preferito" data-productid="10" data-isfavorite="0">
                    </div>

                </div>
        </div>
    </div>
</section> 


<!-- Container-Sport -->

    <section id="Container-Sport">
        <div class="Container-Multiplo padding">
            <div>
                <p>Acquista per sport</p>
            </div>

            <div>
                <a href="#"><img src="immagini/indietro_chiaro .png" class="scorrimento"></a>
                <a href="#"><img src="immagini/avanti_colorato.png" class="scorrimento"></a>
            </div>

        </div>

        <div class="BoxEsterno">
            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/1.png">
                    <div class="button">
                        <span> Running </span>
                    </div>
                </a>           
            </div>

            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/2.png">
                    <div class="button">
                        <span> Calcio </span>
                    </div>
                </a>  
            </div>

            <div class="BoxInternoGenerale">
                <a href="#">
                <img src="immagini/3.png">
                    <div class="button">
                        <span> Basket </span>
                    </div>
                </a>  
            </div>
        </div>

    </section>

    <!-- Container icone nike -->

    <section id="icone-nike">
        <div class="Container-Multiplo padding">
            <div>
                <p>Acquista le nostre icone </p>
            </div>
        </div>

        <div class="BoxEsterno">

            <div>
                <img src="immagini/indietro_chiaro .png" class="scorrimento-Sx">
            </div>

            
            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/AirJordan1.png">
                    <div class="nome-scarpa">
                        <p>Air Jordan 1</p>
                    </div>                
                </a>
            </div>

    
            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Dunk.png">
                    <div class="nome-scarpa">
                        <p>Dunk</p>
                    </div>                
                </a>
            </div>

            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/AirMaxPlus.png">
                    <div class="nome-scarpa">
                        <p>Air Max Plus</p>
                    </div>                
                </a>
            </div>

            <div >
                <img src="immagini/avanti_colorato.png" class="scorrimento-Dx">
            </div>
        </div>

        
    </section>


    <!-- Container Genere -->

    <section id="Container-Genere">
        <div class="padding">
            <div id="scopri">
                <p>Scopri di più</p>
            </div>

        </div>

        <div class="BoxEsterno">
            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Donna.png" >
                    <div class="button">
                        <span> Donna </span>
                    </div>
                </a>      
            </div>

            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Uomo.png" >
                    <div class="button">
                        <span> Uomo </span>
                    </div>
                </a>    
            </div>

            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Kids.png" >
                    <div class="button">
                        <span> Kids </span>
                    </div>
                    <div class="button2">
                        <span> Teenager </span>
                    </div>
                </a>    
            </div>
        </div>

    </section>



    <!-- Container Membership -->

    <section id="Membership-Container">
        <div class="Container-Multiplo padding">
            <div>
                <p>Membership Nike</p>
            </div>

            <div>
                <a href="#"><img src="immagini/indietro_chiaro .png" class="scorrimento"></a>
                <a href="#"><img src="immagini/avanti_colorato.png" class="scorrimento"></a>
            </div>

        </div>

        <div class="BoxEsterno">
            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Member1.png">
                    <div class="button">
                        <span> Acquista </span>
                    </div>
                    <div class="Box8-desc">
                        <p>Prodotti per i member</p>
                        <span>Il tuo accesso in esclusiva</span>
                    </div>
                </a>  
            </div>

            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Member2.png">
                    <div class="button">
                        <span>Scopri</span>
                    </div>
                    <div class="Box8-desc">
                        <p>Ricompense per i member</p>
                        <span>Il nostro modo di ringraziarti</span>
                    </div>
                </a>  
            </div>

            <div class="BoxInternoGenerale">
                <a href="#">
                    <img src="immagini/Member3.png">
                    <div class="button">
                        <span>Inizia a muoverti</span>
                    </div>
                    <div class="Box8-desc">
                        <p>Sport e benessere</p>
                        <span>Muoviti al tuo ritmo</span>
                    </div>
                </a>  
            </div>
        </div>

    </section>


    <!--Links box -->

    <section id="elenco">
        <div id="links-box">
            <div>
                <a>Scarpe</a>
                <div class="dettagli">
                    <a href="#">Scarpe da golf</a>
                    <a href="#">Sneakers invernali</a>
                    <a href="#">Scarpe Gore-Tex</a>
                    <a href="#">Scarpe per camminare</a>
                </div>
            </div>

            <div>
                <a>Abbigliamento</a>
                <div class="dettagli">
                    <a href="#">Tutto l'abbigliamento</a>
                    <a href="#">Pantaloni da yoga</a>
                    <a href="#">Joggers Tech Fleece</a>
                    <a href="#">Pantaloni Tech Fleece</a>
                </div>
            </div>

            <div>
                <a>Bambini</a>
                <div class="dettagli">
                    <a href="#">Slider per bambini</a>
                    <a href="#">Tuta per bambini in saldo</a>
                    <a href="#">Giubbotto imbottito per bambini</a>
                </div>
            </div>

            <div>
                <a>In evidenza</a>
                <div class="dettagli">
                    <a href="#">Squadre di calcio</a>
                    <a href="#">Calcio</a>
                    <a href="#">Nike Run Club</a>
                    <a href="#">Nike Training Club</a>
                </div>
            </div>
        </div>

    </section>


    <!-- Footer1--> 
    <footer>
        <div id="footer1">
            <div id="footer1-Box-Sx" >
                <div class="white-color">
                    <a href="#">GIFT CARD</a> 
                    <a href="#" id="trovaNegozio">TROVA UN NEGOZIO</a>
                    <a href="#">NIKE JOURNAL</a>
                    <a href="#">DIVENTA MEMBER</a>
                    <a href="#">SCONTO STUDENTI</a>
                    <a href="#">feedback</a>
                    <a href="#">CODICI PROMOZIONALI</a>
                </div>

                
                
                <div class="colonna-footer">
                    <a href="#" class="white-color">ASSISTENZA</a> 
                    <div class="colonna-footer-grey">
                        <a href="#">Hai bisogno di aiuto</a>
                        <a href="#">Stato ordine</a>
                        <a href="#">Spedizione e consegna</a>
                        <a href="#">Resi</a>
                        <a href="#">Opzioni di pagamento</a>
                        <a href="#">Contattaci</a>
                        <a href="#">Recensioni</a>
                        <a href="#">Assistenza codici promozionali <br> nike</a>
                    </div>
                </div>    


                <div class="colonna-footer">
                    <a href="#" class="white-color"> AZIENDA</a>
                    <div class="colonna-footer-grey">
                        <a href="#">Informazioni su Nike</a>
                        <a href="#">News</a>
                        <a href="#">Lavora con noi</a>
                        <a href="#">Investitori</a>
                        <a href="#">Sostenibilità</a>
                        <a href="#">Obiettivo</a>
                    </div>
                </div>

            </div>

            <div id="footer1-Box-Dx">
                <a href="#"><img src="immagini/twitter.png" alt="LogoSocial" class="footer1-Social"></a>
                <a href="#"><img src="immagini/facebook.png" alt="LogoSocial" class="footer1-Social"></a>
                <a href="#"><img src="immagini/yt.png" alt="LogoSocial" class="footer1-Social"></a>
                <a href="#"><img src="immagini/instagram.png" alt="LogoSocial" class="footer1-Social"></a>
            </div>
        </div>

        <div id="footer2">
            <div id="footer2-Sx">
                <a href="#"><img src="immagini/location.png" id="icon-position">
                    <span>Italia</span>
                </a>
                <p> 2023 Nike</p>     
            </div>
            
            <div id="footer2-Dx">
                <div id="footer2-Dx-small"> 
                    <a href="#"> Guide </a>
                    <a href="#"> Condizioni d'uso</a>
                    <a href="#"> Condizioni di vendita</a>
                    <a href="#"> Info legali e Societarie</a>
                </div>

                <div id="footer2-Dx-small">
                    <a href="#"> Informativa sulla privacy e sui cookie </a>
                    <a href="#"> Impostazioni dei cookie </a>
                </div>

            </div>

        </div>

    </footer>

</html>
</body>


