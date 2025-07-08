<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - ImmoConnect</title>
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

        .login-container {
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

        .login-container::before {
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
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 25px;
        }

        .checkbox {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            accent-color: #667eea;
        }

        .checkbox-label {
            color: #4a5568;
            font-size: 14px;
            cursor: pointer;
        }

        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 25px;
        }

        .forgot-password {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .forgot-password:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .login-btn {
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

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .login-btn:active {
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

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .login-container {
                margin: 10px;
                padding: 30px 25px;
            }

            .form-footer {
                flex-direction: column;
                gap: 15px;
            }

            .login-btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="login-container">
    <!-- Logo et titre -->
    <div class="logo">
        <div class="logo-icon">
            <svg viewBox="0 0 24 24">
                <path d="M10,20V14H14V20H19V12H22L12,3L2,12H5V20H10Z" />
            </svg>
        </div>
        <h1>ImmoConnect</h1>
        <p>Votre portail immobilier de confiance</p>
    </div>



    <form method="POST" action={{route('login')}}>
        @csrf
        <div class="form-group">
            <label for="email" class="form-label">Adresse email</label>
            <input
                id="email"
                class="form-input"
                type="email"
                name="email"
                placeholder="votre@email.com"
                required
                autofocus
                autocomplete="username"
            />
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Mot de passe</label>
            <input
                id="password"
                class="form-input"
                type="password"
                name="password"
                placeholder="Votre mot de passe"
                required
                autocomplete="current-password"
            />
        </div>

        <div class="checkbox-container">
            <input id="remember_me" type="checkbox" class="checkbox" name="remember">
            <label for="remember_me" class="checkbox-label">Se souvenir de moi</label>
        </div>

        <div class="form-footer">
            <a href="/forgot-password" class="forgot-password">
                Mot de passe oublié ?
            </a>
            <button type="submit" class="login-btn">
                Se connecter
            </button>
        </div>
    </form>

    <div class="divider">
        <span>ou</span>
    </div>

    <div class="register-link">
        <p>Pas encore de compte ? <a href="/register">Créer un compte</a></p>
    </div>
</div>

<script>
    // Animation d'entrée
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.login-container');
        container.style.opacity = '0';
        container.style.transform = 'translateY(20px)';

        setTimeout(() => {
            container.style.transition = 'all 0.6s ease';
            container.style.opacity = '1';
            container.style.transform = 'translateY(0)';
        }, 100);
    });

    // Gestion des erreurs (simulation)
    function showError(inputId, message) {
        const input = document.getElementById(inputId);
        const errorDiv = input.parentNode.querySelector('.error-message');
        if (errorDiv) {
            errorDiv.style.display = 'block';
            errorDiv.textContent = message;
            input.style.borderColor = '#e53e3e';
        }
    }

    // Validation du formulaire
    document.querySelector('form').addEventListener('submit', function(e) {
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;

        // Réinitialiser les erreurs
        document.querySelectorAll('.error-message').forEach(el => el.style.display = 'none');
        document.querySelectorAll('.form-input').forEach(el => el.style.borderColor = '#e2e8f0');

        let hasError = false;

        if (!email) {
            showError('email', 'L\'adresse email est requise.');
            hasError = true;
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            showError('email', 'Veuillez entrer une adresse email valide.');
            hasError = true;
        }

        if (!password) {
            showError('password', 'Le mot de passe est requis.');
            hasError = true;
        } else if (password.length < 6) {
            showError('password', 'Le mot de passe doit contenir au moins 6 caractères.');
            hasError = true;
        }

        if (hasError) {
            e.preventDefault();
        }
    });
</script>
</body>
</html>
