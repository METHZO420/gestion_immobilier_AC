@extends('layouts.app')

@section('content')

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

    <!-- DETAILS ANNONCE -->
    <div class="container py-5" style="margin-top: 100px;">
        <div class="mb-4 text-center">
            <h1 class="fw-bold text-primary">Détails de l'annonce</h1>
            <p class="text-muted">Toutes les informations sur le bien sélectionné</p>
        </div>
        <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">

            <div class="row g-5 align-items-start">

                <!-- SECTION IMAGE OU CARROUSEL -->
                <div class="col-md-6">
                    @if($annonce->images->count() > 0)
                        <div id="annonceCarousel" class="carousel slide shadow rounded-4 overflow-hidden" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($annonce->images as $key => $image)
                                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                                        <img src="{{ asset('storage/' . $image->url_image) }}"
                                             class="d-block w-100"
                                             alt="Image {{ $key + 1 }}">
                                    </div>
                                @endforeach
                            </div>
                            @if($annonce->images->count() > 1)
                                <button class="carousel-control-prev" type="button" data-bs-target="#annonceCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Précédent</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#annonceCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Suivant</span>
                                </button>
                            @endif
                        </div>
                    @else
                        <img src="https://via.placeholder.com/600x400?text=Aucune+image"
                             alt="Aucune image disponible"
                             class="img-fluid rounded-4 w-100 shadow">
                    @endif
                </div>

                <!-- INFOS BIEN -->
                <div class="col-md-6">
                    <span class="badge bg-primary px-3 py-2 fs-6 mb-2">{{ ucfirst($annonce->type_bien) }}</span>
                    <h2 class="fw-bold text-dark mb-3">{{ $annonce->titre }}</h2>
                    <p class="text-muted mb-2"><i class="fas fa-map-marker-alt me-2"></i>{{ $annonce->adresse }}</p>
                    <h3 class="text-success fw-bold mt-3">{{ number_format($annonce->prix, 0, ',', ' ') }} FCFA</h3>

                    <ul class="list-unstyled mt-4">
                        <li class="mb-2"><i class="fas fa-door-open me-2 text-primary"></i><strong>{{ $annonce->nombre_pieces }}</strong> pièce(s)</li>
                        <li class="mb-2"><i class="fas fa-ruler-combined me-2 text-primary"></i><strong>{{ $annonce->surface }}</strong> m²</li>
                        <li class="mb-2"><i class="fas fa-calendar-alt me-2 text-primary"></i>Ajoutée le : {{ $annonce->created_at->format('d/m/Y') }}</li>
                    </ul>

                    <a href="{{ route('annonces.index') }}" class="btn btn-outline-secondary mt-3">
                        <i class="fas fa-arrow-left me-2"></i>Retour aux annonces
                    </a>
                    @if(auth()->user()->role == 'admin' and  $annonce->status=='en attente')
                        <form action="{{ route('annonces.updateStatus', $annonce->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="valide">
                            <button type="submit" class="btn btn-outline-success mt-3">Valider l'annonce</button>
                        </form>

                        <form action="{{ route('annonces.updateStatus', $annonce->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="rejete">
                            <button type="submit" class="btn btn-outline-danger mt-3">Rejeter l'annonce</button>
                        </form>
                    @endif
                </div>
            </div>

            <!-- DESCRIPTION -->
            <hr class="my-5">
            <div>
                <h4 class="fw-semibold text-dark">Description détaillée</h4>
                <p class="mt-3 fs-6 lh-lg text-justify text-muted">{{ $annonce->description }}</p>
            </div>
        </div>
    </div>
    <!-- SECTION CONTACT -->
    <div class="container py-5">
        <div class="bg-white rounded-4 shadow-sm p-4 p-md-5">
            <h4 class="fw-bold text-primary mb-4"><i class="fas fa-envelope me-2"></i>Contactez le propriétaire</h4>

            <form action="" method="POST">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="nom" class="form-label">Votre nom</label>
                        <input type="text" name="nom" id="nom" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Votre email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" rows="5" class="form-control" required placeholder="Je suis intéressé(e) par votre bien..."></textarea>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="fas fa-paper-plane me-2"></i>Envoyer le message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
