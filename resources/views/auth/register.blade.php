@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card animate__animated animate__fadeInUp">
        <div class="auth-header">
            <div class="auth-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <h2>Mon Application</h2>
            </div>
            <h1 class="auth-title">Créer un compte</h1>
            <p class="auth-subtitle">Rejoignez notre communauté dès maintenant</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="auth-form" id="registerForm">
            @csrf
<div class="form-group">
    <label for="name" class="form-label">Nom complet</label>
    <div class="input-group">
        <input type="text" id="name" name="name" class="form-control" placeholder="Votre nom complet" required>
    </div>
    @error('name')
        <span class="error-message">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="email" class="form-label">Adresse Email</label>
    <div class="input-group">
        <input type="email" id="email" name="email" class="form-control" required>
    </div>
    @error('email')
        <span class="error-message">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="password" class="form-label">Mot de passe</label>
    <div class="input-group">
        <input type="password" id="password" name="password" class="form-control" required>
        <button type="button" class="password-toggle" aria-label="Afficher le mot de passe">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
            </svg>
        </button>
    </div>
    @error('password')
        <span class="error-message">{{ $message }}</span>
    @enderror
</div>

<div class="form-group">
    <label for="password_confirmation" class="form-label">Confirmation mot de passe</label>
    <div class="input-group">
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
    </div>
</div>

            <div class="form-check mb-4">
                <input type="checkbox" id="terms" name="terms" class="form-check-input" required>
                <label for="terms" class="form-check-label">J'accepte les <a href="#" class="text-link">conditions d'utilisation</a></label>
            </div>

            <button type="submit" class="auth-button" id="registerButton">
                <span class="button-text">S'inscrire</span>
                <span class="button-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </span>
            </button>

            <div class="auth-footer">
                <p>Déjà inscrit ? <a href="{{ route('login') }}" class="auth-link">Se connecter</a></p>
            </div>
        </form>
    </div>
</div>

<style>
    :root {
        --primary-color: #4f46e5;
        --primary-hover: #4338ca;
        --background-color: #f3f4f6;
        --text-color: #111827;
        --text-light: #6b7280;
        --border-color: #d1d5db;
        --error-color: #ef4444;
    }

    .auth-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 2rem;
        background: linear-gradient(135deg, #eef2ff, #e0e7ff);
    }

    .auth-card {
        background-color: #fff;
        border-radius: 16px;
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        width: 100%;
        max-width: 440px;
        padding: 2.5rem;
        transition: all 0.3s ease;
    }

    .auth-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .auth-logo {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }

    .auth-logo svg {
        color: var(--primary-color);
        margin-right: 0.5rem;
    }

    .auth-logo h2 {
        font-size: 1.4rem;
        font-weight: 700;
        margin: 0;
        color: var(--primary-color);
    }

    .auth-title {
        font-size: 1.6rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: var(--text-color);
    }

    .auth-subtitle {
        font-size: 0.9rem;
        color: var(--text-light);
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--text-color);
    }

    .input-group {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 0.75rem;
        color: var(--text-light);
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 0.75rem 0.75rem 2.5rem;
        border: 1px solid var(--border-color);
        border-radius: 10px;
        font-size: 0.9rem;
        background-color: #fafafa;
        transition: all 0.25s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        background-color: #fff;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
    }

    .password-toggle {
        position: absolute;
        right: 0.75rem;
        background: none;
        border: none;
        cursor: pointer;
        color: var(--text-light);
        transition: color 0.2s;
    }

    .password-toggle:hover {
        color: var(--primary-color);
    }

    .form-check {
        display: flex;
        align-items: center;
        margin-top: 1rem;
    }

    .form-check-input {
        margin-right: 0.5rem;
        width: 1rem;
        height: 1rem;
        border: 1.5px solid var(--border-color);
        border-radius: 5px;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .form-check-label {
        font-size: 0.85rem;
        color: var(--text-light);
    }

    .text-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 600;
    }

    .text-link:hover {
        text-decoration: underline;
    }

    .auth-button {
        width: 100%;
        padding: 0.9rem;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 0.95rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        margin-top: 1rem;
        transition: all 0.3s ease;
    }

    .auth-button:hover {
        background: var(--primary-hover);
        transform: translateY(-2px);
        box-shadow: 0 6px 18px rgba(79, 70, 229, 0.3);
    }

    .button-text {
        margin-right: 0.5rem;
    }

    .auth-footer {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.85rem;
        color: var(--text-light);
    }

    .error-message {
        display: block;
        margin-top: 0.25rem;
        font-size: 0.8rem;
        color: var(--error-color);
    }

    @media (max-width: 480px) {
        .auth-card {
            padding: 1.5rem;
        }
    }
</style>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Toggle password visibility
        const passwordToggle = document.querySelector('.password-toggle');
        if (passwordToggle) {
            passwordToggle.addEventListener('click', function() {
                const passwordInput = document.getElementById('password');
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                
                // Change icon
                const icon = this.querySelector('svg');
                if (type === 'text') {
                    icon.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path><line x1="1" y1="1" x2="23" y2="23"></line>';
                } else {
                    icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
                }
            });
        }

        // Form submission
        const registerForm = document.getElementById('registerForm');
        const registerButton = document.getElementById('registerButton');
        
        if (registerForm) {
            registerForm.addEventListener('submit', function(e) {
                // Check if terms are accepted
                if (!document.getElementById('terms').checked) {
                    e.preventDefault();
                    document.getElementById('terms').focus();
                    return;
                }
                
                // Animation during submission
                registerButton.disabled = true;
                registerButton.innerHTML = `
                    <span class="button-text">Création du compte...</span>
                    <span class="button-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12a9 9 0 1 1-6.219-8.56"></path>
                        </svg>
                    </span>
                `;
                
                // Add spin animation
                const spinner = registerButton.querySelector('.button-icon svg');
                spinner.style.animation = 'spin 1s linear infinite';
            });
        }

        // Add spin animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes spin {
                from { transform: rotate(0deg); }
                to { transform: rotate(360deg); }
            }
        `;
        document.head.appendChild(style);
    });
</script>