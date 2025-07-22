<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Formulaire pour ajouter des images à une annonce.
     */
    public function create($annonceId)
    {
        $annonce = Annonce::findOrFail($annonceId);
        return view('annonces.add-images', compact('annonce'));
    }

    /**
     * Enregistrement des images.
     */
    public function store(Request $request, $annonceId)
    {
        $annonce = Annonce::findOrFail($annonceId);

        $request->validate([
            'images.*' => 'image|max:2048', // 2 Mo max par image
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('annonces', 'public');
                Image::create([
                    'id_annonce' => $annonce->id,
                    'url_image' => $path,
                ]);
            }
        }

        return redirect()
            ->route('annonces.images.create', $annonce->id)
            ->with('success', 'Images ajoutées avec succès.');
    }

    /**
     * Supprimer une image.
     */
    public function destroy(int $id)
    {
        $image = Image::findOrFail($id);

        // Vérifie si un chemin existe et supprime le fichier si présent
        if ($image->path && Storage::exists($image->path)) {
            Storage::delete($image->path);
        }

        // Supprimer le modèle de la base de données
        $image->delete();

        return redirect()->back()->with('success', 'Image supprimée avec succès.');
    }
}
