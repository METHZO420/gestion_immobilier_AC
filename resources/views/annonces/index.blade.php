<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes annonces - ImmoConnect</title>
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
    <h2 class="fw-bold mb-4 text-primary">Mes Annonces</h2>

    <a href="{{ route('annonces.create') }}" class="btn btn-primary mb-4">
        <i class="fas fa-plus me-2"></i>Nouvelle annonce
    </a>


    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive bg-white rounded shadow-sm">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
            <tr>
                <th>Titre</th>
                <th>Type</th>
                <th>Prix</th>
                <th>Adresse</th>
                <th>Statut</th>
                <th class="col-5"> Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($annonces as $annonce)
                <tr>
                    <td>{{ $annonce->titre }}</td>
                    <td>{{ ucfirst($annonce->type_bien) }}</td>
                    <td>{{ number_format($annonce->prix, 0, ',', ' ') }} FCFA</td>
                    <td>{{ $annonce->adresse }}</td>
                    @if($annonce->status == 'en attente')
                        <td class="text-warning">{{ ucfirst($annonce->status) }}</td>
                    @elseif($annonce->status == 'valide')
                        <td class="text-success">{{ ucfirst($annonce->status) }}</td>
                    @else
                        <td class="text-danger">{{ ucfirst($annonce->status) }}</td>
                    @endif

                    <td>
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{ route('annonces.edit', $annonce) }}" class="btn btn-sm btn-outline-primary">✏️ Modifier</a>

                            <form action="{{ route('annonces.destroy', $annonce) }}" method="POST" onsubmit="return confirm('Supprimer cette annonce ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Supprimer</button>
                            </form>

                            <a href="{{ route('annonces.show', $annonce) }}" class="btn btn-info text-white btn-sm">
                                <i class="fas fa-eye me-1"></i> Détails
                            </a>

                            <a href="{{ route('annonces.images.create', $annonce->id) }}" class="btn btn-outline-primary btn-sm">
                                <i class="fas fa-upload me-1"></i> Ajouter des Photos
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
