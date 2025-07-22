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
        if (auth()->user()->role === 'admin') {
            $annonces = Annonce::latest()->get();
        } else {
            $annonces = Annonce::where('id_utilisateur', auth()->id())->latest()->get();
        }

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
            'date_ajout' => date('d-m-Y'),
            'status'=>'en attente'
        ]);

        return redirect()->route('annonces.index')->with('success', 'Annonce créée avec succès.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {

        $annonce->load('images');
        return view('annonces.show', compact('annonce'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user, Annonce $annonce)
    {


        // Vérification d'autorisation : l'utilisateur doit être le propriétaire ou un admin
        if (auth()->user()->id !== $annonce->id_utilisateur && auth()->user()->role !== 'admin') {
            abort(403, 'Accès non autorisé');
        }

        return view('annonces.edit', compact('annonce'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annonce $annonce)
    {
        if (auth()->user()->id !== $annonce->id_utilisateur && auth()->user()->role !== 'admin') {
            abort(403, 'Accès non autorisé');
        }

        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'type_bien' => 'required|string',
            'prix' => 'required|numeric',
            'adresse' => 'required|string',
            'nombre_pieces' => 'required|integer|min:1',
            'surface' => 'required|integer|min:1',

        ]);

        $annonce->update($request->all());

        return redirect()->route('annonces.index')->with('success', 'Annonce mise à jour.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        if (auth()->user()->id !== $annonce->id_utilisateur && auth()->user()->role !== 'admin') {
            abort(403, 'Accès non autorisé');
        }

        $annonce->delete();

        return redirect()->route('annonces.index')->with('success', 'Annonce supprimée.');
    }
    public function updateStatus(Request $request, Annonce $annonce)
    {

        $validated = $request->validate([
            'status' => 'required|in:valide,rejete,en attente'
        ]);

        $annonce->status = $validated['status'];
        $annonce->save();

        return redirect()->back()->with('success', 'Statut mis à jour avec succès.');
    }
}

