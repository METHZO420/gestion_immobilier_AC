<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImmoConnect - Trouvez votre bien immobilier idéal</title>
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
    </style>
</head>
<body>
<!-- Navigation -->
@if(auth()->user()==null)
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="#">
                <div class="bg-gradient-primary text-white rounded p-2 me-2">
                    <i class="fas fa-home"></i>
                </div>
                ImmoConnect
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav-buttons">
                <a href="/login" class="btn btn-outline">Connexion</a>
                <a href="/register" class="btn btn-primary">Inscription</a>
            </div>
        </div>
    </nav>
@endif
@if(auth()->user()!=null)
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="#">
                <div class="bg-gradient-primary text-white rounded p-2 me-2">
                    <i class="fas fa-home"></i>
                </div>
                ImmoConnect
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#accueil">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#acheter">Acheter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#louer">Louer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#vendre">Vendre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
                <div>
                    <a> </a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger">Se Déconnecter</button>
                </form>
            </div>
        </div>
    </nav>
@endif


<!-- Hero Section -->
<section class="bg-gradient-primary text-white" style="margin-top: 76px; min-height: 100vh;">
    <div class="container h-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-lg-8 text-center">
                <h1 class="display-3 fw-bold mb-4">
                    Trouvez votre bien immobilier idéal
                </h1>
                <p class="lead mb-5">
                    Découvrez des milliers d'annonces de qualité, des appartements aux maisons,
                    en passant par les locaux commerciaux. Votre nouveau chez-vous vous attend.
                </p>

                <!-- Search Form -->
                <div class="bg-white rounded-4 p-4 shadow-lg">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6 col-lg-3">
                                <label for="type" class="form-label text-dark fw-semibold">Type de bien</label>
                                <select class="form-select" id="type">
                                    <option selected>Tous types</option>
                                    <option value="appartement">Appartement</option>
                                    <option value="maison">Maison</option>
                                    <option value="terrain">Terrain</option>
                                    <option value="commerce">Local commercial</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-lg-2">
                                <label for="transaction" class="form-label text-dark fw-semibold">Transaction</label>
                                <select class="form-select" id="transaction">
                                    <option selected>Achat/Location</option>
                                    <option value="vente">Achat</option>
                                    <option value="location">Location</option>
                                </select>
                            </div>

                            <div class="col-md-6 col-lg-3">
                                <label for="location" class="form-label text-dark fw-semibold">Localisation</label>
                                <input type="text" class="form-control" id="location" placeholder="Ville, quartier...">
                            </div>

                            <div class="col-md-6 col-lg-2">
                                <label for="budget" class="form-label text-dark fw-semibold">Budget max</label>
                                <input type="number" class="form-control" id="budget" placeholder="Prix max">
                            </div>

                            <div class="col-lg-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-search me-2"></i>Rechercher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Pourquoi choisir ImmoConnect ?</h2>
                <p class="lead text-muted">Une expérience immobilière simplifiée et personnalisée</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 text-center p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="bg-gradient-primary text-white rounded-4 p-3 d-inline-flex mb-4">
                            <i class="fas fa-user-tie fa-2x"></i>
                        </div>
                        <h4 class="card-title">Accompagnement personnalisé</h4>
                        <p class="card-text">
                            Nos conseillers experts vous accompagnent à chaque étape de votre projet
                            immobilier, de la recherche à la signature.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 text-center p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="bg-gradient-primary text-white rounded-4 p-3 d-inline-flex mb-4">
                            <i class="fas fa-search-plus fa-2x"></i>
                        </div>
                        <h4 class="card-title">Recherche intelligente</h4>
                        <p class="card-text">
                            Notre algorithme avancé vous propose des biens correspondant parfaitement
                            à vos critères et à votre budget.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="card h-100 text-center p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <div class="bg-gradient-primary text-white rounded-4 p-3 d-inline-flex mb-4">
                            <i class="fas fa-shield-alt fa-2x"></i>
                        </div>
                        <h4 class="card-title">Sécurité garantie</h4>
                        <p class="card-text">
                            Toutes nos annonces sont vérifiées et nos transactions sont sécurisées
                            pour votre tranquillité d'esprit.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Properties Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center mb-5">
                <h2 class="display-5 fw-bold mb-3">Biens en vedette</h2>
                <p class="lead text-muted">Découvrez notre sélection de biens d'exception</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="bg-gradient-primary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <div class="text-center">
                            <i class="fas fa-camera fa-2x mb-2"></i>
                            <div>Photo de l'appartement moderne</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fs-4 fw-bold text-primary mb-2">250 000 FCFA</div>
                        <h5 class="card-title">Appartement moderne T3</h5>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i> Centre-ville, Dakar
                        </p>
                        <div class="mb-3 small text-muted">
                            <span class="me-3">
                                <i class="fas fa-door-open me-1"></i> 3 pièces
                            </span>
                            <span class="me-3">
                                <i class="fas fa-bed me-1"></i> 2 ch.
                            </span>
                            <span>
                                <i class="fas fa-ruler-combined me-1"></i> 100 m²
                            </span>
                        </div>
                        <button class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-2"></i>Voir les détails
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="bg-gradient-primary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <div class="text-center">
                            <i class="fas fa-camera fa-2x mb-2"></i>
                            <div>Photo de la maison familiale</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fs-4 fw-bold text-primary mb-2">60 000 000 FCFA</div>
                        <h5 class="card-title">Maison familiale avec jardin</h5>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i>
                        </p>
                        <div class="mb-3 small text-muted">
                            <span class="me-3">
                                <i class="fas fa-door-open me-1"></i> 5 pièces
                            </span>
                            <span class="me-3">
                                <i class="fas fa-bed me-1"></i> 4 ch.
                            </span>
                            <span>
                                <i class="fas fa-ruler-combined me-1"></i> 300 m²
                            </span>
                        </div>
                        <button class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-2"></i>Voir les détails
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="bg-gradient-primary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <div class="text-center">
                            <i class="fas fa-camera fa-2x mb-2"></i>
                            <div>Photo du studio étudiant</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fs-4 fw-bold text-primary mb-2">80 000 FCFA/mois</div>
                        <h5 class="card-title">Studio étudiant meublé</h5>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i> Liberte 6, Dakar
                        </p>
                        <div class="mb-3 small text-muted">
                            <span class="me-3">
                                <i class="fas fa-door-open me-1"></i> 1 pièce
                            </span>
                            <span class="me-3">
                                <i class="fas fa-bed me-1"></i> 1 ch.
                            </span>
                            <span>
                                <i class="fas fa-ruler-combined me-1"></i> 25 m²
                            </span>
                        </div>
                        <button class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-2"></i>Voir les détails
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="bg-gradient-primary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <div class="text-center">
                            <i class="fas fa-camera fa-2x mb-2"></i>
                            <div>Photo de la villa de luxe</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fs-4 fw-bold text-primary mb-2">72 000 000 FCFA</div>
                        <h5 class="card-title">Villa de luxe avec piscine</h5>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i>Mbour
                        </p>
                        <div class="mb-3 small text-muted">
                            <span class="me-3">
                                <i class="fas fa-door-open me-1"></i> 7 pièces
                            </span>
                            <span class="me-3">
                                <i class="fas fa-bed me-1"></i> 5 ch.
                            </span>
                            <span>
                                <i class="fas fa-ruler-combined me-1"></i> 200 m²
                            </span>
                        </div>
                        <button class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-2"></i>Voir les détails
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="bg-gradient-primary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <div class="text-center">
                            <i class="fas fa-camera fa-2x mb-2"></i>
                            <div>Photo Appartement</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fs-4 fw-bold text-primary mb-2">180 000 FCFA/ mois</div>
                        <h5 class="card-title">Appartement 2 chambres</h5>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i> HLM,RUFISQUE
                        </p>
                        <div class="mb-3 small text-muted">
                            <span class="me-3">
                                <i class="fas fa-door-open me-1"></i> 3 pièces
                            </span>
                            <span class="me-3">
                                <i class="fas fa-bed me-1"></i> 2 ch.
                            </span>
                            <span>
                                <i class="fas fa-ruler-combined me-1"></i> 95 m²
                            </span>
                        </div>
                        <button class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-2"></i>Voir les détails
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="bg-gradient-primary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <div class="text-center">
                            <i class="fas fa-camera fa-2x mb-2"></i>
                            <div>Photo du local commercial</div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="fs-4 fw-bold text-primary mb-2">250.000 FCFA/mois</div>
                        <h5 class="card-title">Local commercial centre-ville</h5>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt me-1"></i> Centre commercial, Dakar
                        </p>
                        <div class="mb-3 small text-muted">
                            <span class="me-3">
                                <i class="fas fa-store me-1"></i> Commerce
                            </span>
                            <span class="me-3">
                                <i class="fas fa-car me-1"></i> Parking
                            </span>
                            <span>
                                <i class="fas fa-ruler-combined me-1"></i> 80 m²
                            </span>
                        </div>
                        <button class="btn btn-outline-primary w-100">
                            <i class="fas fa-eye me-2"></i>Voir les détails
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mt-5">
            <a href="#" class="btn btn-primary btn-lg">
                <i class="fas fa-search me-2"></i>Voir toutes les annonces
            </a>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="bg-gradient-primary text-white py-5">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-4">Prêt à trouver votre bien idéal ?</h2>
                <p class="lead mb-4">
                    Rejoignez des milliers de clients satisfaits qui ont trouvé leur bonheur avec ImmoConnect.
                    Commencez votre recherche dès aujourd'hui !
                </p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="#" class="btn btn-light btn-lg">
                        <i class="fas fa-search me-2"></i>Commencer ma recherche
                    </a>
                    <a href="#" class="btn btn-outline-light btn-lg">
                        <i class="fas fa-plus me-2"></i>Publier une annonce
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-gradient-primary rounded p-2 me-2">
                        <i class="fas fa-home text-white"></i>
                    </div>
                    <h5 class="mb-0">ImmoConnect</h5>
                </div>
                <p class="text-muted">
                    Votre partenaire de confiance pour tous vos projets immobiliers.
                    Trouvez, vendez, louez en toute simplicité.
                </p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-light">
                        <i class="fab fa-facebook fa-lg"></i>
                    </a>
                    <a href="#" class="text-light">
                        <i class="fab fa-twitter fa-lg"></i>
                    </a>
                    <a href="#" class="text-light">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                    <a href="#" class="text-light">
                        <i class="fab fa-linkedin fa-lg"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Services</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Acheter</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Vendre</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Louer</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Estimation gratuite</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Financement</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Support</h5>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Centre d'aide</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Contact</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">FAQ</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Guide de l'acheteur</a></li>
                    <li class="mb-2"><a href="#" class="text-muted text-decoration-none">Guide du vendeur</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h5 class="mb-3">Contact</h5>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-phone me-2"></i>
                        +221 77 123 45 67
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-envelope me-2"></i>
                        contact@immoconnect.fr
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        Sud Foire , Dakar
                    </li>
                </ul>
            </div>
        </div>

        <hr class="my-4">

        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-muted">
                    &copy; 2024 ImmoConnect. Tous droits réservés.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="#" class="text-muted text-decoration-none me-3">Mentions légales</a>
                <a href="#" class="text-muted text-decoration-none me-3">Confidentialité</a>
                <a href="#" class="text-muted text-decoration-none">Cookies</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
