
@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-2xl font-bold text-gray-700">Mes Annonces</h2>

    <a href="{{ route('annonces.create') }}" class="inline-block px-6 py-3 mb-5 text-white bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg shadow-md hover:from-indigo-600 hover:to-purple-700">
        + Nouvelle annonce
    </a>

    @if(session('success'))
        <div class="p-4 mb-4 text-green-700 bg-green-100 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3">Titre</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Prix</th>
                    <th class="px-6 py-3">Adresse</th>
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($annonces as $annonce)
                    <tr class="border-t">
                        <td class="px-6 py-4">{{ $annonce->titre }}</td>
                        <td class="px-6 py-4">{{ ucfirst($annonce->type_bien) }}</td>
                        <td class="px-6 py-4">{{ $annonce->prix }} FCFA</td>
                        <td class="px-6 py-4">{{ $annonce->adresse }}</td>
                        <td class="px-6 py-4 space-x-2">
                            <div class="flex space-x-2">
    <a href="{{ route('annonces.edit', $annonce) }}"
   class="inline-flex items-center gap-2 px-5 py-2 text-sm font-medium text-indigo-600 border border-indigo-500 rounded-md hover:bg-indigo-50 focus:outline-none focus:ring-2 focus:ring-indigo-300 transition">
    ✏️
    Modifier
</a>


    <!-- Bouton Supprimer -->
    <form action="{{ route('annonces.destroy', $annonce) }}" method="POST" onsubmit="return confirm('Supprimer cette annonce ?')">
        @csrf
        @method('DELETE')
        <button type="submit"
                class="inline-block px-4 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700 transition">
            🗑️ Supprimer
        </button>
    </form>
</div>
 </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection