@extends('layouts.app')

@section('content')
<div class="auth-container">
    <div class="auth-card animate__animated animate__fadeIn">
        <div class="auth-header">
            <div class="auth-logo">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
                </svg>
                <h2>Mon Application</h2>
            </div>
            <h1 class="auth-title">Connexion</h1>
            <p class="auth-subtitle">Entrez vos identifiants pour accéder à votre compte</p>
        </div>

        <form action="{{ route('login') }}" method="POST" class="auth-form">
            @csrf

            <div class="form-group">
                <label for="email" class="form-label">Adresse Email</label>
                <div class="input-group">
                       
                    <input type="email" id="email" name="email" class="form-control" placeholder="exemple@email.com" required>
                </div>
                @error('email')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password" class="form-label">Mot de passe</label>
                <div class="input-group">
                    
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                    <button type="button" class="password-toggle" aria-label="Afficher le mot de passe">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </button>
                </div>
                @error('password')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-options">
                <div class="form-check">
                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Se souvenir de moi</label>
                </div>
                <a href="{{ route('password.request') }}" class="forgot-password">Mot de passe oublié ?</a>
            </div>

            <button type="submit" class="auth-button">
                <span class="button-text">Se connecter</span>
                <span class="button-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </span>
            </button>

            <div class="auth-footer">
                <p>Pas encore de compte ? <a href="{{ route('register') }}" class="auth-link">S'inscrire</a></p>
            </div>
        </form>
    </div>
</div>
@endsection

<style>
    :root {
        --primary-color: #4361ee;
        --primary-light: #e6f0ff;
        --text-color: #2d3748;
        --text-light: #718096;
        --border-color: #e2e8f0;
        --error-color: #e53e3e;
        --success-color: #38a169;
    }

    body {
        background-color: #f8fafc;
        color: var(--text-color);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    .auth-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 2rem;
    }

    .auth-card {
        background-color: white;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        width: 100%;
        max-width: 420px;
        padding: 2.5rem;
        transition: all 0.3s ease;
    }

    .auth-card:hover {
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
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
        margin-right: 0.75rem;
    }

    .auth-logo h2 {
        font-size: 1.5rem;
        font-weight: 700;
        margin: 0;
    }

    .auth-title {
        font-size: 1.75rem;
        font-weight: 700;
        margin: 0.5rem 0;
        color: var(--text-color);
    }

    .auth-subtitle {
        color: var(--text-light);
        font-size: 0.875rem;
        margin: 0;
    }

    .auth-form {
        margin-top: 1.5rem;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
        font-weight: 500;
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
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 0.75rem 0.75rem 2.5rem;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        font-size: 0.875rem;
        transition: all 0.2s ease;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
    }

    .password-toggle {
        position: absolute;
        right: 0.75rem;
        background: none;
        border: none;
        color: var(--text-light);
        cursor: pointer;
        padding: 0.25rem;
    }

    .password-toggle:hover {
        color: var(--primary-color);
    }

    .error-message {
        display: block;
        margin-top: 0.25rem;
        font-size: 0.75rem;
        color: var(--error-color);
    }

    .form-options {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 1.5rem 0;
    }

    .form-check {
        display: flex;
        align-items: center;
    }

    .form-check-input {
        margin-right: 0.5rem;
        width: 1rem;
        height: 1rem;
        border: 1px solid var(--border-color);
        border-radius: 4px;
        appearance: none;
        position: relative;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .form-check-input:checked::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        width: 4px;
        height: 8px;
        border: solid white;
        border-width: 0 2px 2px 0;
        transform: translate(-50%, -60%) rotate(45deg);
    }

    .form-check-label {
        font-size: 0.875rem;
        color: var(--text-light);
        cursor: pointer;
    }

    .forgot-password {
        font-size: 0.875rem;
        color: var(--primary-color);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .forgot-password:hover {
        text-decoration: underline;
    }

    .auth-button {
        width: 100%;
        padding: 0.875rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.2s ease;
    }

    .auth-button:hover {
        background-color: #3a56d4;
        transform: translateY(-1px);
    }

    .button-text {
        margin-right: 0.5rem;
    }

    .button-icon {
        display: flex;
        align-items: center;
    }

    .auth-footer {
        text-align: center;
        margin-top: 1.5rem;
        font-size: 0.875rem;
        color: var(--text-light);
    }

    .auth-link {
        color: var(--primary-color);
        text-decoration: none;
        font-weight: 500;
    }

    .auth-link:hover {
        text-decoration: underline;
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .animate__animated {
        animation-duration: 0.5s;
    }

    /* Responsive */
    @media (max-width: 480px) {
        .auth-card {
            padding: 1.5rem;
        }
        
        .auth-container {
            padding: 1rem;
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

        // Add focus effects
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            // Focus effect
            input.addEventListener('focus', function() {
                this.parentElement.querySelector('.input-icon').style.color = 'var(--primary-color)';
                this.style.borderColor = 'var(--primary-color)';
            });
            
            // Blur effect
            input.addEventListener('blur', function() {
                this.parentElement.querySelector('.input-icon').style.color = 'var(--text-light)';
                this.style.borderColor = 'var(--border-color)';
            });

            // Input validation effect
            input.addEventListener('input', function() {
                if (this.value.trim() !== '') {
                    this.style.backgroundColor = 'var(--primary-light)';
                } else {
                    this.style.backgroundColor = 'white';
                }
            });
        });

        // Button hover and active effects
        const authButton = document.querySelector('.auth-button');
        if (authButton) {
            // Hover effect
            authButton.addEventListener('mouseenter', function() {
                this.querySelector('.button-icon').style.transform = 'translateX(3px)';
                this.style.boxShadow = '0 4px 12px rgba(67, 97, 238, 0.3)';
            });
            
            // Mouse leave effect
            authButton.addEventListener('mouseleave', function() {
                this.querySelector('.button-icon').style.transform = 'translateX(0)';
                this.style.boxShadow = 'none';
            });

            // Click effect
            authButton.addEventListener('mousedown', function() {
                this.style.transform = 'translateY(1px)';
            });
            
            authButton.addEventListener('mouseup', function() {
                this.style.transform = 'translateY(0)';
            });
        }

        // Form submission animation
        const loginForm = document.querySelector('.auth-form');
        if (loginForm) {
            loginForm.addEventListener('submit', function(e) {
                const button = this.querySelector('.auth-button');
                if (button) {
                    // Disable button during submission
                    button.disabled = true;
                    button.innerHTML = `
                        <span class="button-text">Connexion en cours...</span>
                        <span class="button-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 12a9 9 0 1 1-6.219-8.56"></path>
                            </svg>
                        </span>
                    `;
                    
                    // Add loading animation
                    const spinner = button.querySelector('.button-icon svg');
                    spinner.style.animation = 'spin 1s linear infinite';
                    
                    // Re-enable button after 3 seconds (simulation)
                    setTimeout(() => {
                        button.disabled = false;
                        button.innerHTML = `
                            <span class="button-text">Se connecter</span>
                            <span class="button-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                                </svg>
                            </span>
                        `;
                        spinner.style.animation = 'none';
                    }, 3000);
                }
            });
        }

        // Add spin animation for loading
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