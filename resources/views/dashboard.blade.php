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
            <a class="navbar-brand d-flex align-items-center fw-bold fs-4" href="{{route('dashboard')}}">
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
                        <a class="nav-link" href="{{route('dashboard')}}">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#acheter">Mes Favoris</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('annonces.index') }}"> Mes annonces</a>
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
                <h1 class="display-3 fw-bold mb-4">Trouvez votre bien immobilier idéal</h1>
                <p class="lead mb-5">Découvrez des milliers d'annonces de qualité, des appartements aux maisons, en passant par les locaux commerciaux. Votre nouveau chez-vous vous attend.</p>
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
            @forelse($annonces as $annonce)
                @if($annonce->status=='valide')
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        @php $image = $annonce->images->first(); @endphp
                        <div class="overflow-hidden rounded-top" style="height: 200px;">
                            @if($image)
                                <img src="{{ asset('storage/' . $image->url_image) }}" class="w-100 h-100 object-fit-cover" alt="Image de l'annonce">
                            @else
                                <div class="bg-gradient-primary text-white d-flex align-items-center justify-content-center h-100">
                                    <i class="fas fa-camera fa-2x"></i>
                                    <div class="ms-2">Pas d'image</div>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="fs-5 fw-bold text-primary mb-2">
                                {{ number_format($annonce->prix, 0, ',', ' ') }} FCFA
                            </div>
                            <h5 class="card-title">{{ $annonce->titre }}</h5>
                            <p class="text-muted mb-2">
                                <i class="fas fa-map-marker-alt me-1"></i> {{ $annonce->adresse }}
                            </p>
                            <div class="mb-3 small text-muted">
                                <span class="me-3">
                                    <i class="fas fa-door-open me-1"></i> {{ $annonce->nombre_pieces }} pièces
                                </span>
                                <span>
                                    <i class="fas fa-ruler-combined me-1"></i> {{ $annonce->surface }} m²
                                </span>
                            </div>
                            <a href="{{ route('annonces.show', $annonce->id) }}" class="btn btn-outline-primary w-100">
                                <i class="fas fa-eye me-2"></i>Voir les détails
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            @empty
                <p class="text-center text-muted">Aucune annonce disponible pour le moment.</p>
            @endforelse
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('annonces.index') }}" class="btn btn-primary btn-lg">
                <i class="fas fa-search me-2"></i>Voir toutes les annonces
            </a>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h5>ImmoConnect</h5>
                <p>Votre partenaire de confiance pour tous vos projets immobiliers. Trouvez, vendez, louez en toute simplicité.</p>
            </div>
            <div class="col-md-6 text-end">
                <p>&copy; 2024 ImmoConnect. Tous droits réservés.</p>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
