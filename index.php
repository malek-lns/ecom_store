<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Votre boutique en ligne pour des produits uniques">
    <title>Boutique en ligne | Produits exceptionnels</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <!-- Préchargement des polices -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- HEADER -->
    <header>
        <div class="logo">
            <h1>BoutiqueChic</h1>
        </div>
        
        <button class="mobile-menu-toggle" aria-label="Menu">
            <span class="hamburger"></span>
        </button>
        
        <nav class="main-nav">
            <ul>
                <li><a href="#" class="active">Accueil</a></li>
                <li><a href="#">Événements</a></li>
                <li><a href="#">Accessoires</a></li>
                <li><a href="#">Vêtements</a></li>
                <li><a href="#">Articles vedettes</a></li>
            </ul>
        </nav>
        
        <div class="header-actions">
            <div class="search-container">
                <input type="text" id="header-search" placeholder="Rechercher...">
                <button aria-label="Rechercher"><i class="fas fa-search"></i></button>
            </div>
            <a href="#" class="account-link"><i class="fas fa-user"></i><span>Mon compte</span></a>
            <a href="#" class="cart-link"><i class="fas fa-shopping-cart"></i><span class="cart-count">0</span></a>
        </div>
    </header>

    <main>
        <!-- HERO SECTION -->
        <section class="hero">
            <div class="slider">
                <div class="slide active">
                    <img src="images\3252941.jpg" alt="Collection tendance">
                    <div class="slide-content">
                        <h2>Collection Été 2025</h2>
                        <p>Découvrez nos nouveautés exclusives</p>
                        <a href="#" class="btn">Voir la collection</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="images\973.jpg" alt="Promotion spéciale">
                    <div class="slide-content">
                        <h2>Offre spéciale</h2>
                        <p>-20% sur toute la collection printemps</p>
                        <a href="#" class="btn">En profiter</a>
                    </div>
                </div>
                <div class="slide">
                    <img src="images\730.jpg" alt="Nouveaux arrivages">
                    <div class="slide-content">
                        <h2>Nouveaux arrivages</h2>
                        <p>Découvrez nos pièces exclusives</p>
                        <a href="#" class="btn">Explorer</a>
                    </div>
                </div>
                <button class="slider-arrow prev" aria-label="Précédent"><i class="fas fa-chevron-left"></i></button>
                <button class="slider-arrow next" aria-label="Suivant"><i class="fas fa-chevron-right"></i></button>
                <div class="slider-dots"></div>
            </div>
        </section>

        <!-- INTRO SECTION -->
        <section class="intro container">
            <h2>Découvrez notre sélection exclusive</h2>
            <p><strong>Bienvenue dans notre boutique en ligne</strong>, où style et qualité se rencontrent pour vous offrir une expérience shopping incomparable. <strong>Notre collection soigneusement sélectionnée</strong> vous propose les dernières tendances et des pièces intemporelles qui s'adapteront parfaitement à votre style.</p>
        </section>
        
        <!-- SEARCH SECTION -->
        <section class="product-search container">
            <div class="search-bar">
                <input type="text" id="search" placeholder="Rechercher un produit..." aria-label="Rechercher un produit">
                <button aria-label="Rechercher"><i class="fas fa-search"></i></button>
            </div>
            <div class="filter-options">
                <select aria-label="Trier par">
                    <option value="">Trier par</option>
                    <option value="price-asc">Prix croissant</option>
                    <option value="price-desc">Prix décroissant</option>
                    <option value="new">Nouveautés</option>
                </select>
                <div class="category-filter">
                    <button class="filter-btn active" data-category="all">Tous</button>
                    <button class="filter-btn" data-category="accessoires">Boissons</button>
                    <button class="filter-btn" data-category="vetements">Yaoughts</button>
                </div>
            </div>
        </section>

        <!-- FEATURED PRODUCTS -->
        <!-- FEATURED PRODUCTS -->
<section class="featured-products container">
    <h2>Produits populaires</h2>
    <div class="products-grid">
        <?php
        require 'connexion.php';
        $stmt = $pdo->query("SELECT * FROM produits");
        while ($produit = $stmt->fetch()) {
            echo "
            <article class='product' data-category='{$produit['categorie']}'>
                <div class='product-image'>
                    <img src='{$produit['image']}' alt='{$produit['nom']}'>
                </div>
                <div class='product-info'>
                    <h3>{$produit['nom']}</h3>
                    <p class='product-category'>{$produit['categorie']}</p>
                    <div class='product-price'>
                        <span class='current-price'>{$produit['prix']} €</span>
                    </div>
                    <button class='add-to-cart'>Ajouter au panier</button>
                </div>
            </article>
            ";
        }
        ?>
    </div>
</section>


        <!-- FEATURES SECTION -->
        <section class="features">
            <div class="container">
                <div class="feature">
                    <i class="fas fa-truck"></i>
                    <h3>Livraison gratuite</h3>
                    <p>Pour toute commande supérieure à 50€</p>
                </div>
                <div class="feature">
                    <i class="fas fa-undo"></i>
                    <h3>Retours faciles</h3>
                    <p>30 jours pour changer d'avis</p>
                </div>
                <div class="feature">
                    <i class="fas fa-shield-alt"></i>
                    <h3>Paiement sécurisé</h3>
                    <p>Transactions 100% sécurisées</p>
                </div>
                <div class="feature">
                    <i class="fas fa-headset"></i>
                    <h3>Support client</h3>
                    <p>Assistance 7j/7</p>
                </div>
            </div>
        </section>

        <!-- NEWSLETTER -->
        <section class="newsletter">
            <div class="container">
                <h2>Restez informé</h2>
                <p>Inscrivez-vous à notre newsletter pour recevoir nos offres exclusives et les dernières tendances</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Votre adresse email" required>
                    <button type="submit" class="btn">S'inscrire</button>
                </form>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="footer-columns">
                <div class="footer-column">
                    <h3>BoutiqueChic</h3>
                    <p>Votre destination shopping en ligne pour des produits de qualité et des prix compétitifs.</p>
                    <div class="social-links">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Liens rapides</h3>
                    <ul>
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">Événements</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">À propos de nous</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Mon compte</h3>
                    <ul>
                        <li><a href="#">Se connecter</a></li>
                        <li><a href="#">Panier</a></li>
                        <li><a href="#">Liste de souhaits</a></li>
                        <li><a href="#">Suivi de commande</a></li>
                        <li><a href="#">Aide</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Bientôt disponible</h3>
                    <div class="coming-soon-preview">
                        <img src="images\373621-PBLENQ-17.jpg" alt="Produit à venir">
                        <div class="preview-info">
                            <h4>Collection Exclusive</h4>
                            <p>Nouvelle collection disponible en avril</p>
                            <a href="#" class="btn btn-sm">En savoir plus</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2025 BoutiqueChic. Tous droits réservés.</p>
                <div class="payment-methods">
                    <i class="fab fa-cc-visa"></i>
                    <i class="fab fa-cc-mastercard"></i>
                    <i class="fab fa-cc-amex"></i>
                    <i class="fab fa-cc-paypal"></i>
                </div>
            </div>
        </div>
    </footer>

    <!-- PANIER MODAL -->
<!-- PANIER MODAL -->
<div id="cart-modal" class="cart-modal">
    <h3>Votre panier</h3>
    <ul id="cart-items"></ul>
    <div id="cart-total" class="cart-total">Total : 0,00 €</div>
    <button id="close-cart" class="btn btn-outline">Fermer</button>
  </div>
  

    <!-- Scripts -->
    <script src="script.js"></script>
</body>
</html>