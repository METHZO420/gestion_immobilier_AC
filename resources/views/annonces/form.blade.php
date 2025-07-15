@php $annonce = $annonce ?? null; @endphp

<div class="grid grid-cols-1 gap-4 md:grid-cols-2">
    <div>
        <label class="block mb-2 font-medium">Titre</label>
        <input type="text" name="titre" value="{{ old('titre', $annonce?->titre) }}" required class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-400">
    </div>
    <div>
        <label class="block mb-2 font-medium">Type de bien</label>
        <select name="type_bien" required class="w-full px-4 py-2 border rounded-lg">
            <option value="">Choisir</option>
            <option value="vente" {{ old('type_bien', $annonce?->type_bien) === 'vente' ? 'selected' : '' }}>Vente</option>
            <option value="location" {{ old('type_bien', $annonce?->type_bien) === 'location' ? 'selected' : '' }}>Location</option>
        </select>
    </div>
    <div>
        <label class="block mb-2 font-medium">Prix</label>
        <input type="number" name="prix" value="{{ old('prix', $annonce?->prix) }}" required class="w-full px-4 py-2 border rounded-lg">
    </div>
    <div>
        <label class="block mb-2 font-medium">Adresse</label>
        <input type="text" name="adresse" value="{{ old('adresse', $annonce?->adresse) }}" required class="w-full px-4 py-2 border rounded-lg">
    </div>
    <div>
        <label class="block mb-2 font-medium">Nombre de pièces</label>
        <input type="number" name="nombre_pieces" value="{{ old('nombre_pieces', $annonce?->nombre_pieces) }}" required class="w-full px-4 py-2 border rounded-lg">
    </div>
    <div>
        <label class="block mb-2 font-medium">Surface (m²)</label>
        <input type="number" name="surface" value="{{ old('surface', $annonce?->surface) }}" required class="w-full px-4 py-2 border rounded-lg">
    </div>
    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Description</label>
        <textarea name="description" rows="4" required class="w-full px-4 py-2 border rounded-lg">{{ old('description', $annonce?->description) }}</textarea>
    </div>
    <div class="md:col-span-2">
        <label class="block mb-2 font-medium">Date d'ajout</label>
        <input type="date" name="date_ajout" value="{{ old('date_ajout', $annonce?->date_ajout) }}" required class="w-full px-4 py-2 border rounded-lg">
    </div>
</div>

