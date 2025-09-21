<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Votre Panier - Ma Boutique</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; font-family: 'Poppins', sans-serif; }
    .navbar { background-color: #000 !important; }
    .navbar-brand { font-weight: 700; color: #ffe600 !important; }
    .btn-outline-light { border-color: #ffe600; color: #ffe600; }
    .btn-outline-light:hover { background-color: #ffe600; color: #000; }
    .cart-item, .summary-item { display: flex; align-items: center; padding: 15px; border-bottom: 1px solid #ddd; background-color: #fff; border-radius: 8px; margin-bottom: 10px; }
    .cart-item img, .summary-item img { width: 80px; height: 80px; object-fit: cover; border-radius: 10px; margin-right: 15px; border: 2px solid #ffe600; }
    .cart-summary { background-color: #000; padding: 20px; border-radius: 10px; color: #fff; }
    .cart-summary h4 { color: #ffe600; border-bottom: 2px solid #ffe600; padding-bottom: 10px; }
    .btn-checkout, .btn-clear { background-color: #ffe600; color: #000; border: none; padding: 12px 20px; border-radius: 5px; width: 100%; font-weight: 600; margin-top: 10px; }
    .btn-checkout:hover, .btn-clear:hover { background-color: #000; color: #ffe600; }
    .notification { position: fixed; top: 20px; right: 20px; background-color: #ffe600; color: #000; padding: 15px 25px; border-radius: 5px; z-index: 1000; display: none; }
    .payment-modal { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.8); z-index: 2000; align-items: center; justify-content: center; }
    .payment-form { background-color: white; padding: 30px; border-radius: 10px; width: 90%; max-width: 500px; }
    .form-group { margin-bottom: 15px; }
    .form-group label { display: block; margin-bottom: 5px; font-weight: 500; }
    .form-group input, .form-group select { width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
    .btn-confirm { background-color: #28a745; color: white; border: none; padding: 12px 20px; border-radius: 5px; width: 100%; font-weight: 600; margin-top: 20px; }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="produits.html">MA BOUTIQUE</a>
      <div class="d-flex ms-auto">
        <a class="btn btn-outline-light me-3" href="{{ route('home') }}">🏠 Accueil</a>
      </div>
    </div>
  </nav>

  <div class="notification" id="notification"></div>

  <div class="container mt-5">
    <h1 class="text-center mb-4">VOTRE PANIER</h1>
    <div class="row">
      <div class="col-md-8">
        <div id="cart-items" class="bg-white p-3 rounded shadow-sm"></div>
      </div>
      <div class="col-md-4">
        <div class="cart-summary">
          <h4>RÉSUMÉ DU PANIER</h4>
          <div id="cart-summary-items"></div>
          <p id="cart-total-items" class="fw-bold">0 Articles</p>
          <p id="cart-subtotal" class="fw-bold">Sous-total : 0 DT</p>
          <button id="clear-cart" class="btn btn-clear">🗑️ Vider le panier</button>
          <button id="checkout-button" class="btn btn-checkout">💳 Passer la commande</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de paiement -->
  <div id="payment-modal" class="payment-modal">
    <div class="payment-form">
      <h3 class="text-center mb-4">Informations de paiement</h3>
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
      setTimeout(() => { notification.style.display = "none"; }, 3000);
    }

    function displayCartItems() {
      const cartItems = document.getElementById("cart-items");
      cartItems.innerHTML = "";
      if (cart.length === 0) {
        cartItems.innerHTML = '<p class="text-center">Votre panier est vide.</p>';
        document.getElementById("cart-summary-items").innerHTML = "";
        document.getElementById("cart-total-items").textContent = "0 Articles";
        document.getElementById("cart-subtotal").textContent = "Sous-total : 0 DT";
        return;
      }

      let grouped = {}, totalItems = 0, subtotal = 0, summaryHTML = "";
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
          <div class="cart-item">
            <img src="${p.image}" alt="${name}">
            <div class="flex-grow-1">
              <h5 class="fw-bold">${name}</h5>
              <p>${p.price.toFixed(2)} DT</p>
              <div class="d-flex align-items-center gap-2">
                <span><strong>Quantité :</strong> ${p.quantity}</span>
                <button class="btn btn-sm btn-outline-secondary" onclick="changeQuantity('${name}', 1)">+</button>
                <button class="btn btn-sm btn-outline-secondary" onclick="changeQuantity('${name}', -1)">−</button>
              </div>
            </div>
            <button class="btn btn-danger btn-sm" onclick="removeFromCart('${name}')">Supprimer</button>
          </div>`;
        summaryHTML += `
          <div class="summary-item">
            <img src="${p.image}" alt="${name}">
            <div><h6 class="fw-bold">${name}</h6><p>Quantité : ${p.quantity}</p><p>Total : ${p.totalPrice.toFixed(2)} DT</p></div>
          </div>`;
      }

      document.getElementById("cart-summary-items").innerHTML = summaryHTML;
      document.getElementById("cart-total-items").textContent = `${totalItems} Articles`;
      document.getElementById("cart-subtotal").textContent = `Sous-total : ${subtotal.toFixed(2)} DT`;
    }

    function changeQuantity(name, delta) {
      if (delta > 0) {
        let item = cart.find(i => i.name === name);
        if (item) cart.push(item);
      } else {
        let index = cart.findIndex(i => i.name === name);
        if (index !== -1) cart.splice(index, 1);
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
      const modal = document.getElementById("payment-modal");
      modal.style.display = "flex";
    }

    function hidePaymentModal() {
      const modal = document.getElementById("payment-modal");
      modal.style.display = "none";
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
      
      // Simulation de traitement de paiement
      setTimeout(() => {
        hidePaymentModal();
        showNotification("Paiement effectué avec succès !");
        
        // Vider le panier après paiement réussi
        cart = [];
        localStorage.removeItem("cart");
        displayCartItems();
      }, 1500);
    });

    document.getElementById("clear-cart").addEventListener("click", () => {
      cart = [];
      localStorage.removeItem("cart");
      displayCartItems();
      showNotification("Panier vidé !");
    });

    // Fermer le modal si on clique en dehors
    document.getElementById("payment-modal").addEventListener("click", (e) => {
      if (e.target === document.getElementById("payment-modal")) {
        hidePaymentModal();
      }
    });

    // Afficher les articles au chargement de la page
    displayCartItems();
  </script>
</body>
</html>