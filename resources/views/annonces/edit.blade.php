@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-2xl font-bold text-gray-700">Modifier l'annonce</h2>

    <form action="{{ route('annonces.update', $annonce) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')

        @include('annonces.form', ['annonce' => $annonce])

        <button type="submit" class="px-6 py-3 mt-4 text-white bg-gradient-to-r from-indigo-500 to-purple-600 rounded-lg hover:from-indigo-600 hover:to-purple-700">
            Mettre à jour
        </button>
    </form>
</div>
@endsection