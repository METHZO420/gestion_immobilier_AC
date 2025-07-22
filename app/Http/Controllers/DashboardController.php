<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $annonces = Annonce::with('images')->latest()->take(6)->get(); // 6 annonces récentes avec leurs images
        return view('dashboard', compact('annonces'));
    }
}
