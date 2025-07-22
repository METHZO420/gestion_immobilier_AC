<?php

use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/annonces',AnnonceController::class);

});
Route::get('detailsAnnonce', function () {
    return view('details_Annonce');
});
// Changer le statut d'une annonce (valider ou rejeter)
Route::patch('/annonces/{annonce}/status', [AnnonceController::class, 'updateStatus'])->name('annonces.updateStatus');
    Route::get('{annonce}/images', [ImageController::class, 'create'])->name('annonces.images.create');
    Route::post('{annonce}/images', [ImageController::class, 'store'])->name('annonces.images.store');
    Route::delete('images/{image}', [ImageController::class, 'destroy'])->name('annonces.images.destroy');


require __DIR__.'/auth.php';


