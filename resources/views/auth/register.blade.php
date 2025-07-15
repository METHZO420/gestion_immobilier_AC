<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - ImmoConnect</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 450px;
            position: relative;
            overflow: hidden;
        }

        .register-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2, #f093fb);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 15px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .logo-icon svg {
            width: 30px;
            height: 30px;
            fill: white;
        }

        .logo h1 {
            color: #2d3748;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .logo p {
            color: #718096;
            font-size: 14px;
        }

        .status-message {
            background: #c6f6d5;
            color: #2f855a;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            border-left: 4px solid #38a169;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: #2d3748;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 16px;
            background: #f7fafc;
            transition: all 0.3s ease;
            color: #2d3748;
        }

        .form-input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .error-message {
            color: #e53e3e;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }

        .already-registered {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .already-registered:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .register-btn {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 14px 32px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }

        .register-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .register-btn:active {
            transform: translateY(0);
        }

        .divider {
            text-align: center;
            margin: 30px 0;
            position: relative;
            color: #a0aec0;
            font-size: 14px;
        }

        .divider::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background: #e2e8f0;
            z-index: 1;
        }

        .divider span {
            background: rgba(255, 255, 255, 0.95);
            padding: 0 20px;
            position: relative;
            z-index: 2;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .register-container {
                margin: 10px;
                padding: 30px 25px;
            }

            .form-footer {
                flex-direction: column;
                gap: 15px;
            }

            .register-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="register-container">
    <div class="logo">
        <div class="logo-icon">
            <svg viewBox="0 0 24 24">
                <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
            </svg>
        </div>
        <h1>ImmoConnect</h1>
        <p>Rejoignez notre communauté</p>
    </div>



    <form method="POST" action="/register">
            @csrf

        <div class="form-group">
            <label for="name" class="form-label">Nom complet</label>
            <input
                id="name"
                class="form-input"
                type="text"
                name="name"
                placeholder="Votre nom complet"
                required
                autofocus
                autocomplete="name"
            />
            <div class="error-message">Le nom est requis.</div>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Adresse email</label>
            <input
                id="email"
                class="form-input"
                type="email"
                name="email"
                placeholder="votre@email.com"
                required
                autocomplete="username"
            />
            <div class="error-message">L'adresse email est requise.</div>
        </div>

        <!-- Mot de passe -->
        <div class="form-group">
            <label for="password" class="form-label">Mot de passe</label>
            <input
                id="password"
                class="form-input"
                type="password"
                name="password"
                placeholder="Votre mot de passe"
                required
                autocomplete="new-password"
            />
            <div class="error-message">Le mot de passe est requis.</div>
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirmer le mot de passe</label>
            <input
                id="password_confirmation"
                class="form-input"
                type="password"
                name="password_confirmation"
                placeholder="Confirmez votre mot de passe"
                required
                autocomplete="new-password"
            />
            <div class="error-message">La confirmation du mot de passe est requise.</div>
        </div>

        <div class="form-footer">
            <a href="/login" class="already-registered">
                Déjà inscrit ?
            </a>
            <button type="submit" class="register-btn">
                S'inscrire
            </button>
        </div>
    </form>

    <div class="divider">
        <span>ou</span>
    </div>

    <div class="login-link">
        <p>Vous avez déjà un compte ? <a href="/login">Se connecter</a></p>
    </div>
</div>

<script>
    // Animation d'entrée
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.register-container');
        container.style.opacity = '0';
        container.style.transform = 'translateY(20px)';

        setTimeout(() => {
            container.style.transition = 'all 0.6s ease';
            container.style.opacity = '1';
            container.style.transform = 'translateY(0)';
        }, 100);
    });

    // Gestion des erreurs
    function showError(inputId, message) {
        const input = document.getElementById(inputId);
        const errorDiv = input.parentNode.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.style.display = 'block';
            errorDiv.textContent = message;
            input.style.borderColor = '#e53e3e';
        }
    }

    function hideError(inputId) {
        const input = document.getElementById(inputId);
        const errorDiv = input.parentNode.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.style.display = 'none';
            input.style.borderColor = '#e2e8f0';
        }
    }

    // Validation du formulaire
    document.querySelector('form').addEventListener('submit', function(e) {
        const name = document.getElementById('name').value.trim();
        const email = document.getElementById('email').value.trim();
        const password = document.getElementById('password').value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        // Réinitialiser les erreurs
        document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.form-input').forEach(el => el.style.borderColor = '#e2e8f0');

        let hasError = false;

        // Validation du nom
        if (!name) {
            showError('name', 'Le nom est requis.');
            hasError = true;
        } else if (name.length < 2) {
            showError('name', 'Le nom doit contenir au moins 2 caractères.');
            hasError = true;
        }

        // Validation de l'email
        if (!email) {
            showError('email', 'L\'adresse email est requise.');
            hasError = true;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showError('email', 'Veuillez entrer une adresse email valide.');
            hasError = true;
        }

        // Validation du mot de passe
        if (!password) {
            showError('password', 'Le mot de passe est requis.');
            hasError = true;
        } else if (password.length < 8) {
            showError('password', 'Le mot de passe doit contenir au moins 8 caractères.');
            hasError = true;
        } else if (!/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(password)) {
            showError('password', 'Le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre.');
            hasError = true;
        }

        // Validation de la confirmation du mot de passe
        if (!passwordConfirmation) {
            showError('password_confirmation', 'La confirmation du mot de passe est requise.');
            hasError = true;
        } else if (password !== passwordConfirmation) {
            showError('password_confirmation', 'Les mots de passe ne correspondent pas.');
            hasError = true;
        }

        if (hasError) {
            e.preventDefault();
        }
    });

    // Validation en temps réel pour la confirmation du mot de passe
    document.getElementById('password_confirmation').addEventListener('input', function() {
        const password = document.getElementById('password').value;
        const passwordConfirmation = this.value;

        if (passwordConfirmation && password !== passwordConfirmation) {
            showError('password_confirmation', 'Les mots de passe ne correspondent pas.');
        } else if (passwordConfirmation && password === passwordConfirmation) {
            hideError('password_confirmation');
        }
    });

    // Validation en temps réel pour le mot de passe
    document.getElementById('password').addEventListener('input', function() {
        const password = this.value;
        const passwordConfirmation = document.getElementById('password_confirmation').value;

        if (password.length > 0 && password.length < 8) {
            showError('password', 'Le mot de passe doit contenir au moins 8 caractères.');
        } else if (password.length >= 8 && !/(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(password)) {
            showError('password', 'Le mot de passe doit contenir au moins une minuscule, une majuscule et un chiffre.');
        } else if (password.length >= 8 && /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)/.test(password)) {
            hideError('password');
        }

        // Révérifier la confirmation si elle existe
        if (passwordConfirmation) {
            if (password === passwordConfirmation) {
                hideError('password_confirmation');
            } else {
                showError('password_confirmation', 'Les mots de passe ne correspondent pas.');
            }
        }
    });
</script>
</body>
</html>
