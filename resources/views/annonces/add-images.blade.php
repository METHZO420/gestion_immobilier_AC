<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter des images - ImmoConnect</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap & FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --bs-primary: #667eea;
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
            background: linear-gradient(135deg, #667eea, #764ba2);
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
                        <a class="nav-link" href="#acheter">Mes Favoris</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('annonces.index') }}">  Mes annonces</a>
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
    <div class="bg-white p-5 rounded shadow-sm">
        <h2 class="fw-bold mb-4 text-primary">Ajouter des images à : {{ $annonce->titre }}</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire d'ajout -->
        <form action="{{ route('annonces.images.store', $annonce->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="images" class="form-label">Ajouter des images</label>
                <input type="file" name="images[]" id="images" class="form-control" multiple required>
            </div>

            <!-- Aperçu avant envoi -->
            <div id="preview" class="row mt-4"></div>

            <button type="submit" class="btn btn-primary mt-3">Téléverser</button>
            <a href="{{ route('annonces.show', $annonce->id) }}" class="btn btn-outline-secondary mt-3 ms-2">
                <i class="fas fa-arrow-left me-1"></i> Retour à l'annonce
            </a>
        </form>

        <!-- Images déjà enregistrées -->
        @if($annonce->images->count() > 0)
            <hr class="my-4">
            <h4 class="mb-3">Images existantes</h4>
            <div class="row">
                @foreach($annonce->images as $image)
                    <div class="col-md-3 mb-3 text-center">
                        <img src="{{ asset('storage/' . $image->url_image) }}" class="img-thumbnail w-100" style="height: 160px; object-fit: cover;">
                        <form action="{{ route('annonces.images.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Supprimer cette image ?')" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger w-100">
                                🗑️ Supprimer
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('images').addEventListener('change', function (event) {
        const previewContainer = document.getElementById('preview');
        previewContainer.innerHTML = '';
        const files = event.target.files;

        Array.from(files).forEach(file => {
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const col = document.createElement('div');
                    col.className = 'col-md-3 mb-3';
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'img-thumbnail w-100';
                    img.style.height = '160px';
                    img.style.objectFit = 'cover';
                    col.appendChild(img);
                    previewContainer.appendChild(col);
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>
</body>
</html>
