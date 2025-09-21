<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique en ligne - Votre destination shopping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 100px 0;
            margin-bottom: 50px;
        }
        .product-card {
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .discount-badge {
            position: absolute;
            top: 10px;
            right: 10px;
        }
        .category-card {
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
        }
        .category-card:hover {
            transform: scale(1.03);
        }
        #notification {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 15px;
            border-radius: 5px;
            display: none;
            z-index: 1000;
        }
    </style>
</head>
<body>
    @include('partials.navbar')

    <!-- Notification -->
    <div id="notification"></div>

    <!-- Hero Section -->
    <section class="hero-section text-center">
        <div class="container">
            <h1 class="display-4 fw-bold mb-4">Nouvelle Collection 2025</h1>
            <p class="lead mb-5">Découvrez nos produits exclusifs à prix réduits</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg px-4 me-2">
                <i class="fas fa-shopping-bag me-2"></i> Boutique
            </a>
            <a href="#featured" class="btn btn-outline-light btn-lg px-4">
                <i class="fas fa-fire me-2"></i> Promotions
            </a>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="featured" class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Produits populaires</h2>
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">
                Voir tout <i class="fas fa-arrow-right ms-2"></i>
            </a>
        </div>
        
        <div class="row">
            <!-- Produit 1 -->
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <span class="badge bg-danger discount-badge">-20%</span>
                    <img src="https://th.bing.com/th/id/OIP.PvrCuHuOTrfdng9DGOV54QHaHa?rs=1&pid=ImgDetMain" class="card-img-top" alt="Montre connectée">
                    <div class="card-body">
                        <h5 class="card-title" data-product-name="Montre Connectée Pro">Montre Connectée Pro</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted text-decoration-line-through">199.99€</span>
                                <span class="text-danger fw-bold ms-2" data-product-price="159.99">159.99€</span>
                            </div>
                            <button class="btn btn-sm btn-outline-primary add-to-cart" 
                                    data-product-id="1"
                                    data-product-name="Montre Connectée Pro"
                                    data-product-price="159.99"
                                    data-product-image="https://th.bing.com/th/id/OIP.PvrCuHuOTrfdng9DGOV54QHaHa?rs=1&pid=ImgDetMain">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Produit 2 -->
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e" class="card-img-top" alt="Casque audio">
                    <div class="card-body">
                        <h5 class="card-title" data-product-name="Casque Audio Premium">Casque Audio Premium</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold" data-product-price="129.99">129.99€</span>
                            </div>
                            <button class="btn btn-sm btn-outline-primary add-to-cart"
                                    data-product-id="2"
                                    data-product-name="Casque Audio Premium"
                                    data-product-price="129.99"
                                    data-product-image="https://images.unsplash.com/photo-1505740420928-5e560c06d30e">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Produit 3 -->
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <span class="badge bg-danger discount-badge">-15%</span>
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30" class="card-img-top" alt="Smartphone">
                    <div class="card-body">
                        <h5 class="card-title" data-product-name="Smartphone Ultra">Smartphone Ultra</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="text-muted text-decoration-line-through">899.99€</span>
                                <span class="text-danger fw-bold ms-2" data-product-price="764.99">764.99€</span>
                            </div>
                            <button class="btn btn-sm btn-outline-primary add-to-cart"
                                    data-product-id="3"
                                    data-product-name="Smartphone Ultra"
                                    data-product-price="764.99"
                                    data-product-image="https://images.unsplash.com/photo-1523275335684-37898b6baf30">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Produit 4 -->
            <div class="col-md-3 mb-4">
                <div class="card product-card h-100">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" class="card-img-top" alt="Chaussures de sport">
                    <div class="card-body">
                        <h5 class="card-title" data-product-name="Chaussures Running Pro">Chaussures Running Pro</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold" data-product-price="89.99">89.99€</span>
                            </div>
                            <button class="btn btn-sm btn-outline-primary add-to-cart"
                                    data-product-id="4"
                                    data-product-name="Chaussures Running Pro"
                                    data-product-price="89.99"
                                    data-product-image="https://images.unsplash.com/photo-1542291026-7eec264c27ff">
                                <i class="fas fa-cart-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="bg-light py-5 mb-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Nos Catégories</h2>
            <div class="row">
                <!-- Catégorie Électronique -->
                <div class="col-md-4 mb-4">
                    <div class="category-card shadow">
                        <a href="#" class="text-decoration-none">
                            <div class="card bg-dark text-white">
                                <img src="https://images.unsplash.com/photo-1518770660439-4636190af475" class="card-img" alt="Électronique" style="height: 200px; object-fit: cover;">
                                <div class="card-img-overlay d-flex align-items-center justify-content-center" style="background: rgba(0, 0, 0, 0.5)">
                                    <h3 class="card-title text-center">Électronique</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-3">
                        <h5>Produits populaires:</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Smartphones
                                <span class="badge bg-primary rounded-pill">24</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Ordinateurs portables
                                <span class="badge bg-primary rounded-pill">15</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Accessoires tech
                                <span class="badge bg-primary rounded-pill">42</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Catégorie Mode -->
                <div class="col-md-4 mb-4">
                    <div class="category-card shadow">
                        <a href="#" class="text-decoration-none">
                            <div class="card bg-dark text-white">
                                <img src="https://images.unsplash.com/photo-1489987707025-afc232f7ea0f" class="card-img" alt="Mode" style="height: 200px; object-fit: cover;">
                                <div class="card-img-overlay d-flex align-items-center justify-content-center" style="background: rgba(0, 0, 0, 0.5)">
                                    <h3 class="card-title text-center">Mode</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-3">
                        <h5>Produits populaires:</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Vêtements homme
                                <span class="badge bg-primary rounded-pill">36</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Vêtements femme
                                <span class="badge bg-primary rounded-pill">45</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Chaussures
                                <span class="badge bg-primary rounded-pill">28</span>
                            </li>
                        </ul>
                    </div>
                </div>
                
                <!-- Catégorie Maison -->
                <div class="col-md-4 mb-4">
                    <div class="category-card shadow">
                        <a href="#" class="text-decoration-none">
                            <div class="card bg-dark text-white">
                                <img src="https://images.unsplash.com/photo-1556911220-bff31c812dba" class="card-img" alt="Maison" style="height: 200px; object-fit: cover;">
                                <div class="card-img-overlay d-flex align-items-center justify-content-center" style="background: rgba(0, 0, 0, 0.5)">
                                    <h3 class="card-title text-center">Maison</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="mt-3">
                        <h5>Produits populaires:</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Décoration
                                <span class="badge bg-primary rounded-pill">19</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Meubles
                                <span class="badge bg-primary rounded-pill">12</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Électroménager
                                <span class="badge bg-primary rounded-pill">23</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Promotions -->
    <section class="container mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="fw-bold">Promotions du moment</h2>
            <div class="badge bg-danger rounded-pill">Fin dans 3 jours</div>
        </div>
        
        <div class="row">
            <!-- Promotion 1 -->
            <div class="col-md-4 mb-4">
                <div class="card border-danger h-100">
                    <div class="card-header bg-danger text-white">
                        <strong>-30%</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="https://images.unsplash.com/photo-1505740420928-5e560c06d30e" class="img-fluid rounded" alt="Casque audio">
                            </div>
                            <div class="col-md-7">
                                <h5 data-product-name="Casque Audio Sans Fil">Casque Audio Sans Fil</h5>
                                <div class="mb-2">
                                    <span class="text-muted text-decoration-line-through">149.99€</span>
                                    <span class="text-danger fw-bold fs-4 ms-2" data-product-price="104.99">104.99€</span>
                                </div>
                                <button class="btn btn-sm btn-danger w-100 add-to-cart"
                                        data-product-id="5"
                                        data-product-name="Casque Audio Sans Fil"
                                        data-product-price="104.99"
                                        data-product-image="https://images.unsplash.com/photo-1505740420928-5e560c06d30e">
                                    <i class="fas fa-cart-plus me-2"></i> Ajouter au panier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Promotion 2 -->
            <div class="col-md-4 mb-4">
                <div class="card border-danger h-100">
                    <div class="card-header bg-danger text-white">
                        <strong>-25%</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" class="img-fluid rounded" alt="Chaussures de sport">
                            </div>
                            <div class="col-md-7">
                                <h5 data-product-name="Chaussures de Sport">Chaussures de Sport</h5>
                                <div class="mb-2">
                                    <span class="text-muted text-decoration-line-through">119.99€</span>
                                    <span class="text-danger fw-bold fs-4 ms-2" data-product-price="89.99">89.99€</span>
                                </div>
                                <button class="btn btn-sm btn-danger w-100 add-to-cart"
                                        data-product-id="6"
                                        data-product-name="Chaussures de Sport"
                                        data-product-price="89.99"
                                        data-product-image="https://images.unsplash.com/photo-1542291026-7eec264c27ff">
                                    <i class="fas fa-cart-plus me-2"></i> Ajouter au panier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Promotion 3 -->
            <div class="col-md-4 mb-4">
                <div class="card border-danger h-100">
                    <div class="card-header bg-danger text-white">
                        <strong>-40%</strong>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="https://images.unsplash.com/photo-1520390138845-fd2d229dd553" class="img-fluid rounded" alt="Montre intelligente">
                            </div>
                            <div class="col-md-7">
                                <h5 data-product-name="Montre Intelligente">Montre Intelligente</h5>
                                <div class="mb-2">
                                    <span class="text-muted text-decoration-line-through">249.99€</span>
                                    <span class="text-danger fw-bold fs-4 ms-2" data-product-price="149.99">149.99€</span>
                                </div>
                                <button class="btn btn-sm btn-danger w-100 add-to-cart"
                                        data-product-id="7"
                                        data-product-name="Montre Intelligente"
                                        data-product-price="149.99"
                                        data-product-image="https://images.unsplash.com/photo-1520390138845-fd2d229dd553">
                                    <i class="fas fa-cart-plus me-2"></i> Ajouter au panier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="bg-primary text-white py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Abonnez-vous à notre newsletter</h2>
            <p class="lead mb-4">Recevez 10% de réduction sur votre première commande</p>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Votre email" required>
                        <button class="btn btn-dark" type="submit">S'abonner</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Boutique en ligne</h5>
                    <p>Votre destination shopping préférée depuis 2020.</p>
                </div>
                <div class="col-md-2 mb-4">
                    <h5>Liens rapides</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('home') }}" class="text-white">Accueil</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Contact</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i> 123 Rue du Commerce, Paris</p>
                    <p><i class="fas fa-phone me-2"></i> +33 1 23 45 67 89</p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">© 2023 Boutique en ligne. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fonction pour afficher une notification
            function showNotification(message) {
                const notification = document.getElementById('notification');
                notification.textContent = message;
                notification.style.display = 'block';
                setTimeout(() => {
                    notification.style.display = 'none';
                }, 3000);
            }

            // Gestion de l'ajout au panier
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const product = {
                        id: this.dataset.productId,
                        name: this.dataset.productName,
                        price: parseFloat(this.dataset.productPrice),
                        quantity: 1,
                        image: this.dataset.productImage
                    };

                    let cart = JSON.parse(localStorage.getItem('cart')) || [];

                    // Vérifier si le produit existe déjà
                    const existingProduct = cart.find(item => item.id === product.id);
                    if (existingProduct) {
                        existingProduct.quantity += 1;
                    } else {
                        cart.push(product);
                    }

                    localStorage.setItem('cart', JSON.stringify(cart));
                    
                    // Afficher une notification
                    showNotification(`${product.name} a été ajouté au panier !`);
                    
                    // Mettre à jour le compteur du panier dans la navbar
                    updateCartCount();
                });
            });

            // Fonction pour mettre à jour le compteur du panier
            function updateCartCount() {
                const cart = JSON.parse(localStorage.getItem('cart')) || [];
                const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
                
                const cartCountElements = document.querySelectorAll('.cart-count');
                cartCountElements.forEach(element => {
                    element.textContent = totalItems;
                });
            }

            // Initialiser le compteur du panier au chargement
            updateCartCount();
        });
    </script>
</body>
</html>