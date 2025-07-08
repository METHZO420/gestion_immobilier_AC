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
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            // Clé étrangère vers la table users
            $table->unsignedBigInteger('id_utilisateur');
            $table->foreign('id_utilisateur')->references('id')->on('users')->onDelete('cascade');
            $table->string('titre');
            $table->string('description');
            $table->string('type_bien'); //vente ou location
            $table->string('prix');
            $table->string('adresse');
            $table->integer('nombre_pieces');
            $table->integer('surface'); //m2
            $table->date('date_ajout');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_annonces');
    }
};
