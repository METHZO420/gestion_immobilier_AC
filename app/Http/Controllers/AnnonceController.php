<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $annonces = Annonce::where('id_utilisateur', Auth::id())->get();
        return view('annonces.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type_bien' => 'required|string',
            'prix' => 'required|numeric',
            'adresse' => 'required|string',
            'nombre_pieces' => 'required|integer|min:1',
            'surface' => 'required|integer|min:1',
            'date_ajout' => 'required|date',
        ]);
        Annonce::create([
            'id_utilisateur' => Auth::id(),
            'titre' => $request->titre,
            'description' => $request->description,
            'type_bien' => $request->type_bien,
            'prix' => $request->prix,
            'adresse' => $request->adresse,
            'nombre_pieces' => $request->nombre_pieces,
            'surface' => $request->surface,
            'date_ajout' => $request->date_ajout,
        ]);

        return redirect()->route('annonces.index')->with('success', 'Annonce créée avec succès.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
         if ($annonce->id_utilisateur !== Auth::id()) {
            abort(403);
        }

        return view('annonces.show', compact('annonce'));
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Annonce $annonce)
    {
         if ($annonce->id_utilisateur !== Auth::id()) {
            abort(403);
        }

        return view('annonces.edit', compact('annonce'));
    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annonce $annonce)
    {
        if ($annonce->id_utilisateur !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type_bien' => 'required|string',
            'prix' => 'required|numeric',
            'adresse' => 'required|string',
            'nombre_pieces' => 'required|integer|min:1',
            'surface' => 'required|integer|min:1',
            'date_ajout' => 'required|date',
        ]);

        $annonce->update($request->all());

        return redirect()->route('annonces.index')->with('success', 'Annonce mise à jour.');
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        if ($annonce->id_utilisateur !== Auth::id()) {
            abort(403);
        }

        $annonce->delete();

        return redirect()->route('annonces.index')->with('success', 'Annonce supprimée.');
    }
}

