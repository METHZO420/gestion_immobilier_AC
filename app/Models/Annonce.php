<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
        use HasFactory;
        protected $guarded = [];

    public function images()
    {
        return $this->hasMany(Image::class, 'id_annonce'); // champ de la table images
    }
}
