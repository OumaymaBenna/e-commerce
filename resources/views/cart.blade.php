<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Votre Panier - Ma Boutique</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    :root {
      --primary-blue: #2a6fdb;
      --dark-blue: #1a4b9b;
      --light-blue: #e6f0ff;
      --white: #ffffff;
      --gray: #f5f7fa;
      --dark-gray: #6c757d;
    }
    
    body { 
      background-color: var(--gray); 
      font-family: 'Poppins', sans-serif;
    }
    
    .navbar { 
      background-color: var(--primary-blue) !important; 
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
      transition: all 0.3s ease;
    }
    
    .navbar-brand { 
      font-weight: 700; 
      color: var(--white) !important;
      letter-spacing: 1px;
    }
    
    .btn-outline-light { 
      border-color: var(--white); 
      color: var(--white); 
      transition: all 0.3s ease;
    }
    
    .btn-outline-light:hover { 
      background-color: var(--white); 
      color: var(--primary-blue); 
      transform: translateY(-2px);
    }
    
    .cart-item, .summary-item { 
      display: flex; 
      align-items: center; 
      padding: 20px; 
      border-bottom: 1px solid #ddd; 
      background-color: var(--white); 
      border-radius: 12px; 
      margin-bottom: 15px; 
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
    }
    
    .cart-item:hover, .summary-item:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.1);
    }
    
    .cart-item img, .summary-item img { 
      width: 90px; 
      height: 90px; 
      object-fit: cover; 
      border-radius: 12px; 
      margin-right: 20px; 
      border: 2px solid var(--primary-blue);
      transition: all 0.3s ease;
    }
    
    .cart-summary { 
      background-color: var(--white); 
      padding: 25px; 
      border-radius: 12px; 
      color: var(--dark-gray);
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
      border: 1px solid rgba(42, 111, 219, 0.2);
    }
    
    .cart-summary h4 { 
      color: var(--primary-blue); 
      border-bottom: 2px solid var(--primary-blue); 
      padding-bottom: 12px; 
      font-weight: 600;
    }
    
    .btn-checkout { 
      background-color: var(--primary-blue); 
      color: var(--white); 
      border: none; 
      padding: 14px 20px; 
      border-radius: 8px; 
      width: 100%; 
      font-weight: 600; 
      margin-top: 15px;
      transition: all 0.3s ease;
      box-shadow: 0 4px 8px rgba(42, 111, 219, 0.2);
    }
    
    .btn-checkout:hover { 
      background-color: var(--dark-blue); 
      color: var(--white);
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(42, 111, 219, 0.3);
    }
    
    .btn-clear { 
      background-color: var(--white); 
      color: var(--primary-blue); 
      border: 2px solid var(--primary-blue); 
      padding: 14px 20px; 
      border-radius: 8px; 
      width: 100%; 
      font-weight: 600; 
      margin-top: 15px;
      transition: all 0.3s ease;
    }
    
    .btn-clear:hover { 
      background-color: var(--light-blue); 
      color: var(--dark-blue);
      transform: translateY(-2px);
    }
    
    .notification { 
      position: fixed; 
      top: 20px; 
      right: 20px; 
      background-color: var(--primary-blue); 
      color: var(--white); 
      padding: 15px 25px; 
      border-radius: 8px; 
      z-index: 1000; 
      display: none;
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
      animation: fadeInDown 0.5s, fadeOutUp 0.5s 2.5s;
    }
    
    .payment-modal { 
      display: none; 
      position: fixed; 
      top: 0; 
      left: 0; 
      width: 100%; 
      height: 100%; 
      background-color: rgba(0,0,0,0.5); 
      z-index: 2000; 
      align-items: center; 
      justify-content: center;
      backdrop-filter: blur(5px);
      animation: fadeIn 0.3s;
    }
    
    .payment-form { 
      background-color: var(--white); 
      padding: 30px; 
      border-radius: 12px; 
      width: 90%; 
      max-width: 500px; 
      box-shadow: 0 8px 24px rgba(0,0,0,0.15);
      transform: scale(0.9);
      opacity: 0;
      animation: modalIn 0.4s forwards 0.1s;
    }
    
    .form-group { 
      margin-bottom: 20px; 
    }
    
    .form-group label { 
      display: block; 
      margin-bottom: 8px; 
      font-weight: 500; 
      color: var(--dark-blue);
    }
    
    .form-group input, .form-group select { 
      width: 100%; 
      padding: 12px; 
      border: 1px solid #ddd; 
      border-radius: 8px; 
      transition: all 0.3s ease;
      background-color: var(--gray);
    }
    
    .form-group input:focus, .form-group select:focus {
      border-color: var(--primary-blue);
      box-shadow: 0 0 0 3px rgba(42, 111, 219, 0.2);
      outline: none;
    }
    
    .btn-confirm { 
      background-color: var(--primary-blue); 
      color: var(--white); 
      border: none; 
      padding: 14px 20px; 
      border-radius: 8px; 
      width: 100%; 
      font-weight: 600; 
      margin-top: 20px;
      transition: all 0.3s ease;
    }
    
    .btn-confirm:hover {
      background-color: var(--dark-blue);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(42, 111, 219, 0.3);
    }
    
    .quantity-btn {
      background-color: var(--light-blue);
      color: var(--primary-blue);
      border: none;
      width: 30px;
      height: 30px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      transition: all 0.2s ease;
    }
    
    .quantity-btn:hover {
      background-color: var(--primary-blue);
      color: white;
      transform: scale(1.1);
    }
    
    @keyframes modalIn {
      to {
        transform: scale(1);
        opacity: 1;
      }
    }
    
    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
    
    @keyframes fadeOutUp {
      from {
        opacity: 1;
        transform: translateY(0);
      }
      to {
        opacity: 0;
        transform: translateY(-20px);
      }
    }
    
    .animate__fadeIn {
      animation-duration: 0.6s;
    }
    
    .animate__zoomIn {
      animation-duration: 0.5s;
    }
    
    h1 {
      color: var(--primary-blue);
      position: relative;
      display: inline-block;
    }
    
    h1:after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 0;
      width: 60px;
      height: 3px;
      background: var(--primary-blue);
      border-radius: 3px;
    }
  </style>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mon Panier - BLUE SHOP</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark animate__animated animate__fadeIn">
    <div class="container">
      <a class="navbar-brand" href="produits.html">BLUE SHOP</a>
      <div class="d-flex ms-auto">
        <a class="btn btn-outline-light me-3" href="{{ route('home') }}">🏠 Accueil</a>
      </div>
    </div>
  </nav>

  <div class="notification animate__animated" id="notification"></div>

  <div class="container mt-5 animate__animated animate__fadeIn">
    <h1 class="text-center mb-5">VOTRE PANIER</h1>
    <div class="row">
      <div class="col-lg-8">
        <div id="cart-items" class="bg-white p-4 rounded shadow-sm"></div>
      </div>
      <div class="col-lg-4">
        <div class="cart-summary animate__animated animate__zoomIn">
          <h4 class="mb-4">RÉSUMÉ DU PANIER</h4>
          <p id="cart-total-items" class="fw-bold mt-3">0 Articles</p>
          <p id="cart-subtotal" class="fw-bold mb-4">Sous-total : 0 DT</p>
          <button id="clear-cart" class="btn btn-clear">🗑️ Vider le panier</button>
          <button id="checkout-button" class="btn btn-checkout">💳 Passer la commande</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de paiement -->
  <div id="payment-modal" class="payment-modal">
    <div class="payment-form">
      <h3 class="text-center mb-4" style="color: var(--primary-blue);">Informations de paiement</h3>
      <form id="payment-form">
        <div class="form-group">
          <label for="card-name">Nom sur la carte</label>
          <input type="text" id="card-name" required>
        </div>
        <div class="form-group">
          <label for="card-number">Numéro de carte</label>
          <input type="text" id="card-number" placeholder="1234 5678 9012 3456" required>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="card-expiry">Date d'expiration</label>
              <input type="text" id="card-expiry" placeholder="MM/AA" required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="card-cvc">Code CVC</label>
              <input type="text" id="card-cvc" placeholder="123" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="card-address">Adresse de facturation</label>
          <input type="text" id="card-address" required>
        </div>
        <button type="submit" class="btn-confirm">Confirmer le paiement</button>
      </form>
    </div>
  </div>

  <script>
    let cart = JSON.parse(localStorage.getItem("cart")) || [];

    function showNotification(message) {
      const notification = document.getElementById("notification");
      notification.textContent = message;
      notification.style.display = "block";
      notification.classList.add("animate__fadeInDown");
      
      setTimeout(() => {
        notification.classList.remove("animate__fadeInDown");
        notification.classList.add("animate__fadeOutUp");
        setTimeout(() => {
          notification.style.display = "none";
          notification.classList.remove("animate__fadeOutUp");
        }, 500);
      }, 2500);
    }

    function displayCartItems() {
      const cartItems = document.getElementById("cart-items");
      cartItems.innerHTML = "";
      
      if (cart.length === 0) {
        cartItems.innerHTML = `
          <div class="text-center py-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="var(--dark-gray)" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <h5 class="mt-3" style="color: var(--dark-gray);">Votre panier est vide</h5>
            <p>Explorez nos produits et trouvez ce qui vous plaît</p>
          </div>`;
        document.getElementById("cart-total-items").textContent = "0 Articles";
        document.getElementById("cart-subtotal").textContent = "Sous-total : 0 DT";
        return;
      }

      let grouped = {}, totalItems = 0, subtotal = 0;
      cart.forEach(product => {
        grouped[product.name] = grouped[product.name] || { ...product, quantity: 0, totalPrice: 0 };
        grouped[product.name].quantity++;
        grouped[product.name].totalPrice += parseFloat(product.price);
      });

      for (let name in grouped) {
        let p = grouped[name];
        totalItems += p.quantity;
        subtotal += p.totalPrice;
        cartItems.innerHTML += `
          <div class="cart-item animate__animated animate__fadeIn">
            <img src="${p.image}" alt="${name}" class="animate__animated animate__zoomIn">
            <div class="flex-grow-1">
              <h5 class="fw-bold" style="color: var(--primary-blue);">${name}</h5>
              <p style="color: var(--dark-blue); font-weight: 500;">${p.price.toFixed(2)} DT</p>
              <div class="d-flex align-items-center gap-3">
                <span style="color: var(--dark-gray);">Quantité : ${p.quantity}</span>
                <button class="quantity-btn" onclick="changeQuantity('${name}', 1)">+</button>
                <button class="quantity-btn" onclick="changeQuantity('${name}', -1)">−</button>
              </div>
            </div>
            <button class="btn btn-sm btn-danger animate__animated animate__pulse" onclick="removeFromCart('${name}')">Supprimer</button>
          </div>`;
      }

      document.getElementById("cart-total-items").textContent = `${totalItems} Articles`;
      document.getElementById("cart-subtotal").textContent = `Sous-total : ${subtotal.toFixed(2)} DT`;
    }

    function changeQuantity(name, delta) {
      if (delta > 0) {
        let item = cart.find(i => i.name === name);
        if (item) {
          cart.push(item);
          showNotification(`Quantité de ${name} augmentée`);
        }
      } else {
        let index = cart.findIndex(i => i.name === name);
        if (index !== -1) {
          cart.splice(index, 1);
          showNotification(`Quantité de ${name} diminuée`);
        }
      }
      localStorage.setItem("cart", JSON.stringify(cart));
      displayCartItems();
    }

    function removeFromCart(name) {
      cart = cart.filter(item => item.name !== name);
      localStorage.setItem("cart", JSON.stringify(cart));
      displayCartItems();
      showNotification(`${name} supprimé du panier`);
    }

    function showPaymentModal() {
      document.getElementById("payment-modal").style.display = "flex";
    }

    function hidePaymentModal() {
      const modal = document.getElementById("payment-modal");
      modal.style.animation = "fadeOut 0.3s forwards";
      setTimeout(() => { modal.style.display = "none"; }, 300);
    }

    document.getElementById("checkout-button").addEventListener("click", () => {
      let subtotal = cart.reduce((sum, p) => sum + parseFloat(p.price), 0);
      if (subtotal === 0) {
        showNotification("Votre panier est vide.");
      } else {
        showPaymentModal();
      }
    });

    document.getElementById("payment-form").addEventListener("submit", (e) => {
      e.preventDefault();
      setTimeout(() => {
        hidePaymentModal();
        showNotification("Paiement effectué avec succès !");
        cart = [];
        localStorage.removeItem("cart");
        displayCartItems();
      }, 1500);
    });

    document.getElementById("clear-cart").addEventListener("click", () => {
      if (cart.length === 0) {
        showNotification("Le panier est déjà vide");
        return;
      }
      if (confirm("Êtes-vous sûr de vouloir vider votre panier ?")) {
        cart = [];
        localStorage.removeItem("cart");
        displayCartItems();
        showNotification("Panier vidé !");
      }
    });

    document.getElementById("payment-modal").addEventListener("click", (e) => {
      if (e.target === document.getElementById("payment-modal")) {
        hidePaymentModal();
      }
    });

    displayCartItems();
  </script>
</body>
</html>
