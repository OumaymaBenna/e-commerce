<nav class="navbar navbar-expand-lg navbar-dark bg-gradient shadow-sm fixed-top" style="background: linear-gradient(135deg, #6e8efb, #a777e3);">
    <div class="container">
        <!-- Logo avec animation -->
        <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('home') }}" 
           style="transition: all 0.3s ease; font-size: 1.25rem;">
           <i class="fas fa-store-alt me-2"></i> Ma Boutique
        </a>

        <!-- Bouton mobile animé -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
                aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"
                style="border: none; box-shadow: none !important;">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Contenu de la navigation -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto align-items-lg-center">
               
                
                <!-- Lien Panier avec badge animé -->
                <div class="nav-item mx-lg-1 my-1 my-lg-0">
                    <a href="{{ route('cart') }}" class="nav-link position-relative">
                      <i class="fas fa-shopping-cart"></i>
                      <span id="cart-count" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-count">
                        0
                      </span>
                    </a>
                </div>

                @auth
                    <!-- Nom du compte visible en permanence -->
                    <li class="nav-item mx-lg-2 my-1 my-lg-0 d-none d-lg-block">
                        <span class="nav-link text-white fw-bold">
                            <i class="fas fa-user-circle me-1"></i>
                            {{ Auth::user()->name }}
                        </span>
                    </li>

                    <!-- Menu utilisateur avec dropdown animé -->
                    <li class="nav-item dropdown mx-lg-1 my-1 my-lg-0">
                        <a class="nav-link dropdown-toggle d-flex align-items-center px-3 py-2 rounded" 
                           href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" 
                           aria-expanded="false" style="transition: all 0.3s ease;">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-cog me-1"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end animate__animated animate__fadeIn shadow" 
                            aria-labelledby="userDropdown"
                            style="border: none; border-radius: 10px; overflow: hidden;">
                            <li class="dropdown-header text-center py-2 bg-light">
                                <i class="fas fa-user-circle me-1"></i>
                                {{ Auth::user()->name }}
                            </li>
                            
                            <li><hr class="dropdown-divider mx-3 my-1"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item py-2" style="cursor: pointer;">
                                        <i class="fas fa-sign-out-alt me-2 text-danger"></i> Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <!-- Liens Connexion/Inscription animés -->
                    <li class="nav-item mx-lg-1 my-1 my-lg-0">
                        <a class="nav-link btn btn-outline-light px-3 py-2 mx-1" 
                           href="{{ route('login') }}"
                           style="transition: all 0.3s ease; border-radius: 20px;">
                           <i class="fas fa-sign-in-alt me-1"></i> Connexion
                        </a>
                    </li>
                    <li class="nav-item mx-lg-1 my-1 my-lg-0">
                        <a class="nav-link btn btn-light text-primary px-3 py-2 mx-1" 
                           href="{{ route('register') }}"
                           style="transition: all 0.3s ease; border-radius: 20px;">
                           <i class="fas fa-user-plus me-1"></i> Inscription
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Style de base */
    .navbar {
        background-color: #ffffff;
        background-color: #2c3e50;
        transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .navbar-brand {
        font-weight: 700;
        color: #2c3e50;
        transition: transform 0.3s ease;
    }
    
    .navbar-brand:hover {
        transform: scale(1.05);
    }
    
    /* Animation des liens */
    .nav-link {
        position: relative;
        color: #34495e !important;
        font-weight: 500;
        padding: 0.5rem 1rem !important;
        margin: 0 0.25rem;
        transition: all 0.3s ease;
    }
    
    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 0;
        height: 2px;
        background-color: #3498db;
        transition: all 0.3s ease;
    }
    
    .nav-link:hover::before {
        width: 80%;
    }
    
    .nav-link:hover {
        color: #3498db !important;
    }
    
    /* Style pour le nom du compte */
    .nav-link.text-white {
        color: white !important;
    }
    
    .nav-link.text-white:hover {
        color: #f8f9fa !important;
    }
    
    /* Bouton panier */
    .cart-badge {
        transition: all 0.3s ease;
        transform: scale(1);
    }
    
    .nav-link:hover .cart-badge {
        transform: scale(1.1);
        background-color: #e74c3c !important;
    }
    
    /* Menu dropdown */
    .dropdown-menu {
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transform-origin: top;
        display: none;
    }
    
    .dropdown-menu.show {
        display: block;
        animation: slideDown 0.3s ease-out;
    }
    
    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .dropdown-item {
        transition: all 0.2s ease;
        padding: 0.5rem 1.5rem;
    }
    
    .dropdown-item:hover {
        background-color: #f8f9fa;
        padding-left: 1.75rem;
    }
    
    .dropdown-header {
        font-weight: 600;
        color: #2c3e50;
    }
    
    /* Boutons connexion/inscription */
    .auth-btn {
        border-radius: 20px;
        padding: 0.375rem 1.25rem !important;
        transition: all 0.3s ease;
        margin-left: 0.5rem;
    }
    
    .login-btn {
        border: 1px solid #3498db;
        color: #3498db !important;
    }
    
    .login-btn:hover {
        background-color: #3498db;
        color: white !important;
    }
    
    .register-btn {
        background-color: #3498db;
        color: white !important;
    }
    
    .register-btn:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
    }
    
    /* Effet au scroll */
    .navbar.scrolled {
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(5px);
    }
    
    /* Version mobile */
    @media (max-width: 991.98px) {
        .navbar-collapse {
            background-color: white;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 1rem;
            margin-top: 0.5rem;
        }
        
        .nav-item {
            margin: 0.5rem 0;
        }
        
        .auth-btns {
            margin-top: 1rem;
        }
        
        /* Afficher le nom du compte en mobile */
        .d-none.d-lg-block {
            display: block !important;
        }
    }
    
    /* Animation du bouton burger */
    .navbar-toggler {
        border: none;
        padding: 0.5rem;
    }
    
    .navbar-toggler:focus {
        box-shadow: none;
    }
    
    .navbar-toggler-icon {
        transition: all 0.3s ease;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.55%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
    
    .navbar-toggler:hover .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%2852, 152, 219, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
</style>

<script>
    // Animation au scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if(window.scrollY > 10) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
    
    // Initialisation des animations de survol
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                const underline = this.querySelector('.hover-underline');
                if(underline) underline.style.width = '70%';
            });
            link.addEventListener('mouseleave', function() {
                const underline = this.querySelector('.hover-underline');
                if(underline) underline.style.width = '0';
            });
        });
    });
</script>