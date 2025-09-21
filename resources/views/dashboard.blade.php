<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #6c63ff;
            --secondary-color: #4d44db;
            --dark-color: #2a2a72;
            --light-color: #f8f9fa;
            --success-color: #28a745;
            --info-color: #17a2b8;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
        }
        
        body {
            background-color: #f5f7fb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        #sidebar {
            background: linear-gradient(135deg, var(--dark-color), var(--secondary-color));
            min-height: 100vh;
            transition: all 0.3s;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }
        
        #sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }
        
        #sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }
        
        #sidebar .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: all 0.3s;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        
        .card-title {
            color: var(--dark-color);
            font-weight: 600;
        }
        
        .display-4 {
            font-weight: 700;
            color: var(--primary-color);
        }
        
        .stat-card {
            border-left: 4px solid;
        }
        
        .stat-card.users {
            border-left-color: var(--primary-color);
        }
        
        .stat-card.products {
            border-left-color: var(--success-color);
        }
        
        .stat-card.orders {
            border-left-color: var(--info-color);
        }
        
        .stat-card.revenue {
            border-left-color: var(--warning-color);
        }
        
        .table {
            background-color: white;
        }
        
        .table th {
            background-color: var(--light-color);
            color: var(--dark-color);
            font-weight: 600;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding: 10px 15px;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(108, 99, 255, 0.25);
        }
        
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease-out;
        }
        
        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .logo {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: 1px;
            color: white;
            padding: 15px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .logo span {
            color: var(--primary-color);
        }
        
        .admin-header {
            background-color: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        
        .admin-header h1 {
            color: var(--dark-color);
            font-weight: 700;
            margin: 0;
        }
        
        .section-title {
            color: var(--dark-color);
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 3px;
        }
        
        .badge-success {
            background-color: rgba(40, 167, 69, 0.2);
            color: var(--success-color);
        }
        
        @media (max-width: 768px) {
            #sidebar {
                min-height: auto;
                width: 100%;
            }
            
            #page-content-wrapper {
                padding-top: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Sidebar -->
    <div class="d-flex" id="wrapper">
        <div class="bg-dark p-4" id="sidebar">
            <div class="logo animate__animated animate__fadeIn">
                <i class="fas fa-shield-alt"></i> Admin<span>Panel</span>
            </div>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i> Tableau de Bord
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i> Utilisateurs
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-box-open"></i> Produits
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-shopping-cart"></i> Commandes
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cog"></i> Paramètres
                    </a>
                </li>
            </ul>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper" class="w-100">
            <div class="container-fluid p-4">
                <div class="admin-header animate__animated animate__fadeInDown">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1>Tableau de Bord Administrateur</h1>
                        <div>
                            <span class="badge bg-light text-dark me-2">
                                <i class="fas fa-bell"></i>
                            </span>
                            <span class="badge bg-light text-dark">
                                <i class="fas fa-user-circle me-1"></i> Admin
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="row mb-4">
                    <div class="col-md-3 animate-on-scroll">
                        <div class="card shadow-sm stat-card users">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-muted">Utilisateurs</h5>
                                        <p id="userCount" class="card-text display-4">1,254</p>
                                    </div>
                                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-users text-primary fs-4"></i>
                                    </div>
                                </div>
                                <small class="text-success"><i class="fas fa-arrow-up me-1"></i>12% ce mois</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 animate-on-scroll" style="transition-delay: 0.1s">
                        <div class="card shadow-sm stat-card products">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-muted">Produits</h5>
                                        <p id="productCount" class="card-text display-4">586</p>
                                    </div>
                                    <div class="bg-success bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-box-open text-success fs-4"></i>
                                    </div>
                                </div>
                                <small class="text-success"><i class="fas fa-arrow-up me-1"></i>8% ce mois</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 animate-on-scroll" style="transition-delay: 0.2s">
                        <div class="card shadow-sm stat-card orders">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-muted">Commandes</h5>
                                        <p class="card-text display-4">324</p>
                                    </div>
                                    <div class="bg-info bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-shopping-cart text-info fs-4"></i>
                                    </div>
                                </div>
                                <small class="text-success"><i class="fas fa-arrow-up me-1"></i>3% ce mois</small>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 animate-on-scroll" style="transition-delay: 0.3s">
                        <div class="card shadow-sm stat-card revenue">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="card-title text-muted">Revenue Total</h5>
                                        <p class="card-text display-4">24,586€</p>
                                    </div>
                                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                                        <i class="fas fa-euro-sign text-warning fs-4"></i>
                                    </div>
                                </div>
                                <small class="text-success"><i class="fas fa-arrow-up me-1"></i>15% ce mois</small>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Graphiques -->
                <div class="row mb-4">
                    <div class="col-md-6 animate-on-scroll">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Ventes Hebdomadaires</h5>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="weeklyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            Cette semaine
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="weeklyDropdown">
                                            <li><a class="dropdown-item" href="#">Cette semaine</a></li>
                                            <li><a class="dropdown-item" href="#">Semaine dernière</a></li>
                                            <li><a class="dropdown-item" href="#">Il y a 2 semaines</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <canvas id="weeklySalesChart"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 animate-on-scroll" style="transition-delay: 0.1s">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title mb-0">Ventes Mensuelles</h5>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="monthlyDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                            Ce mois
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="monthlyDropdown">
                                            <li><a class="dropdown-item" href="#">Ce mois</a></li>
                                            <li><a class="dropdown-item" href="#">Mois dernier</a></li>
                                            <li><a class="dropdown-item" href="#">Il y a 2 mois</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <canvas id="monthlySalesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Formulaire Ajouter un Produit -->
                <div class="row mb-4 animate-on-scroll">
                    <div class="col-md-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h4 class="section-title">Ajouter un Nouveau Produit</h4>
                                <form id="addProductForm">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="productName" class="form-label">Nom du Produit</label>
                                            <input type="text" class="form-control" id="productName" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="productPrice" class="form-label">Prix</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="productPrice" required>
                                                <span class="input-group-text">€</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productCategory" class="form-label">Catégorie</label>
                                        <select class="form-select" id="productCategory" required>
                                            <option value="" selected disabled>Choisir une catégorie</option>
                                            <option value="electronics">Électronique</option>
                                            <option value="clothing">Vêtements</option>
                                            <option value="food">Alimentation</option>
                                            <option value="books">Livres</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="productDescription" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productImage" class="form-label">Image du Produit</label>
                                        <input class="form-control" type="file" id="productImage">
                                    </div>
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="fas fa-plus-circle me-2"></i>Ajouter le Produit
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Liste des Produits -->
                <div class="row animate-on-scroll" style="transition-delay: 0.1s">
                    <div class="col-md-12">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4 class="section-title mb-0">Liste des Produits</h4>
                                    <div class="input-group" style="width: 300px;">
                                        <input type="text" class="form-control" placeholder="Rechercher un produit...">
                                        <button class="btn btn-outline-secondary" type="button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nom</th>
                                                <th>Catégorie</th>
                                                <th>Prix</th>
                                                <th>Description</th>
                                                <th>Statut</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody id="productList">
                                            <tr>
                                                <td>#1001</td>
                                                <td>Ordinateur Portable Pro</td>
                                                <td>Électronique</td>
                                                <td>899€</td>
                                                <td>Ordinateur portable haute performance</td>
                                                <td><span class="badge badge-success">En stock</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>#1002</td>
                                                <td>Smartphone Premium</td>
                                                <td>Électronique</td>
                                                <td>699€</td>
                                                <td>Dernier modèle avec caméra haute résolution</td>
                                                <td><span class="badge badge-success">En stock</span></td>
                                                <td>
                                                    <button class="btn btn-sm btn-outline-primary me-1">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-sm btn-outline-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <!-- Les produits seront ajoutés ici via JavaScript -->
                                        </tbody>
                                    </table>
                                </div>
                                <nav aria-label="Page navigation">
                                    <ul class="pagination justify-content-center mt-3">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Suivant</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script>
        // Initial counts for users and products
        let userCount = 1254;
        let productCount = 586;
        let products = [
            {id: '#1001', name: 'Ordinateur Portable Pro', category: 'Électronique', price: '899', description: 'Ordinateur portable haute performance', status: 'En stock'},
            {id: '#1002', name: 'Smartphone Premium', category: 'Électronique', price: '699', description: 'Dernier modèle avec caméra haute résolution', status: 'En stock'}
        ];

        // Update UI with current counts
        document.getElementById('userCount').innerText = userCount.toLocaleString();
        document.getElementById('productCount').innerText = productCount.toLocaleString();

        // Handle Add Product Form Submission
        document.getElementById('addProductForm').addEventListener('submit', function(event) {
            event.preventDefault();

            // Get form values
            var productName = document.getElementById('productName').value;
            var productPrice = document.getElementById('productPrice').value;
            var productCategory = document.getElementById('productCategory').value;
            var productDescription = document.getElementById('productDescription').value;
            
            // Create product ID
            var productId = '#' + (1000 + products.length + 1);
            
            // Add to products array
            products.push({
                id: productId,
                name: productName,
                category: document.getElementById('productCategory').options[document.getElementById('productCategory').selectedIndex].text,
                price: productPrice,
                description: productDescription,
                status: 'En stock'
            });

            // Create a new product row in the table
            var productRow = `
                <tr class="animate__animated animate__fadeIn">
                    <td>${productId}</td>
                    <td>${productName}</td>
                    <td>${document.getElementById('productCategory').options[document.getElementById('productCategory').selectedIndex].text}</td>
                    <td>${productPrice}€</td>
                    <td>${productDescription}</td>
                    <td><span class="badge badge-success">En stock</span></td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary me-1">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            `;

            // Add product to table
            document.getElementById('productList').insertAdjacentHTML('beforeend', productRow);

            // Increment the product count and update the UI
            productCount++;
            document.getElementById('productCount').innerText = productCount.toLocaleString();

            // Show success message
            showAlert('Produit ajouté avec succès!', 'success');

            // Clear form fields
            document.getElementById('addProductForm').reset();
        });

        // Show alert function
        function showAlert(message, type) {
            const alert = document.createElement('div');
            alert.className = `alert alert-${type} alert-dismissible fade show position-fixed top-0 end-0 m-3`;
            alert.style.zIndex = '9999';
            alert.style.minWidth = '300px';
            alert.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;
            
            document.body.appendChild(alert);
            
            // Remove alert after 3 seconds
            setTimeout(() => {
                alert.classList.remove('show');
                setTimeout(() => alert.remove(), 150);
            }, 3000);
        }

        // Initialize charts
        function initCharts() {
            // Weekly Sales Chart
            const weeklyCtx = document.getElementById('weeklySalesChart').getContext('2d');
            const weeklyChart = new Chart(weeklyCtx, {
                type: 'line',
                data: {
                    labels: ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'],
                    datasets: [{
                        label: 'Ventes',
                        data: [1200, 1900, 1700, 2100, 2400, 1800, 2500],
                        backgroundColor: 'rgba(108, 99, 255, 0.1)',
                        borderColor: 'rgba(108, 99, 255, 1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });

            // Monthly Sales Chart
            const monthlyCtx = document.getElementById('monthlySalesChart').getContext('2d');
            const monthlyChart = new Chart(monthlyCtx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Jun', 'Jul', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
                    datasets: [{
                        label: 'Ventes',
                        data: [45000, 39000, 42000, 51000, 59000, 62000, 65000, 59000, 68000, 72000, 75000, 82000],
                        backgroundColor: 'rgba(77, 68, 219, 0.7)',
                        borderColor: 'rgba(77, 68, 219, 1)',
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                drawBorder: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Animate on scroll
        function animateOnScroll() {
            const elements = document.querySelectorAll('.animate-on-scroll');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.2;
                
                if(elementPosition < screenPosition) {
                    element.classList.add('visible');
                }
            });
        }

        // Initialize when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initCharts();
            
            // Add scroll event listener for animations
            window.addEventListener('scroll', animateOnScroll);
            animateOnScroll(); // Run once on load
            
            // Add click event for delete buttons
            document.getElementById('productList').addEventListener('click', function(e) {
                if(e.target.closest('.btn-outline-danger')) {
                    const row = e.target.closest('tr');
                    row.classList.add('animate__animated', 'animate__fadeOut');
                    setTimeout(() => {
                        row.remove();
                        productCount--;
                        document.getElementById('productCount').innerText = productCount.toLocaleString();
                        showAlert('Produit supprimé avec succès!', 'danger');
                    }, 500);
                }
            });
        });
    </script>
</body>
</html>