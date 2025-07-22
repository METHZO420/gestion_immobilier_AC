<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une annonce - ImmoConnect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & FontAwesome -->
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

<!-- Navbar -->
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
                        <a class="nav-link" href="#favoris">Mes Favoris</a>
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

<!-- CONTENU -->
<div class="container py-5" style="margin-top: 100px;">
    <h2 class="fw-bold text-primary mb-4">{{ isset($annonce) ? "Modifier l'annonce" : 'Ajouter une annonce' }}</h2>

    @php $annonce = $annonce ?? null; @endphp

    <form method="POST" action="{{ isset($annonce) ? route('annonces.update', $annonce) : route('annonces.store') }}">
        @csrf
        @if(isset($annonce)) @method('PUT') @endif

        <div class="bg-light p-4 p-md-5 rounded-4 shadow-sm">
            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold text-dark">Titre</label>
                    <input type="text" name="titre" value="{{ old('titre', $annonce?->titre) }}" required class="form-control rounded-3">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-dark">Type de bien</label>
                    <select name="type_bien" required class="form-select rounded-3">
                        <option value="">Choisir</option>
                        <option value="vente" {{ old('type_bien', $annonce?->type_bien) === 'vente' ? 'selected' : '' }}>Vente</option>
                        <option value="location" {{ old('type_bien', $annonce?->type_bien) === 'location' ? 'selected' : '' }}>Location</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-dark">Prix</label>
                    <input type="number" name="prix" value="{{ old('prix', $annonce?->prix) }}" required class="form-control rounded-3">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-dark">Adresse</label>
                    <input type="text" name="adresse" value="{{ old('adresse', $annonce?->adresse) }}" required class="form-control rounded-3">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-dark">Nombre de pièces</label>
                    <input type="number" name="nombre_pieces" value="{{ old('nombre_pieces', $annonce?->nombre_pieces) }}" required class="form-control rounded-3">
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold text-dark">Surface (m²)</label>
                    <input type="number" name="surface" value="{{ old('surface', $annonce?->surface) }}" required class="form-control rounded-3">
                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold text-dark">Description</label>
                    <textarea name="description" rows="4" required class="form-control rounded-3">{{ old('description', $annonce?->description) }}</textarea>
                </div>



                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save me-2"></i>{{ isset($annonce) ? 'Mettre à jour' : 'Enregistrer' }}
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
