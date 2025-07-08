<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('favoris', function (Blueprint $table) {
            $table->id();
            // Clé étrangère vers l'utilisateur
            $table->foreignId('id_utilisateur')->constrained('users')->onDelete('cascade');

            // Clé étrangère vers l'annonce
            $table->foreignId('id_annonce')->constrained('annonces')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_favoris');
    }
};
