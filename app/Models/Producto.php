<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario', 'titulo', 'descripcion', 'imagen', 'precio'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
