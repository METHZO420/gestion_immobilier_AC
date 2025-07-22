<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ImmoConnect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS & FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --bs-primary: #667eea;
            --bs-primary-rgb: 102, 126, 234;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-color: #667eea;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #5a67d8, #6b46c1);
            border-color: #5a67d8;
        }

        .bg-gradient-primary {
            background: linear-gradient(135deg, #667eea, #764ba2) !important;
        }

        .text-primary {
            color: #667eea !important;
        }

        body {
            padding-top: 80px; /* to avoid overlap with fixed navbar */
            background-color: #f8f9fa;
        }
    </style>

    @stack('styles')
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="/">
            <div class="bg-gradient-primary text-white rounded p-2 me-2">
                <i class="fas fa-home"></i>
            </div>
            ImmoConnect
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                @guest
                    <li class="nav-item me-2">
                        <a href="{{ route('login') }}" class="btn btn-outline">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-primary">Inscription</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="{{ route('annonces.index') }}" class="nav-link">Mes Annonces</a>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="ms-2">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">Déconnexion</button>
                        </form>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

<!-- Contenu de la page -->
<main class="container">
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-dark text-white py-4 mt-5">
    <div class="container d-flex justify-content-between flex-wrap">
        <div>
            <p class="mb-0">&copy; {{ date('Y') }} ImmoConnect. Tous droits réservés.</p>
        </div>
        <div class="d-flex gap-3">
            <a href="#" class="text-light text-decoration-none">Mentions légales</a>
            <a href="#" class="text-light text-decoration-none">Confidentialité</a>
            <a href="#" class="text-light text-decoration-none">Cookies</a>
        </div>
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
