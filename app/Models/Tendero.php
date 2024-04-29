<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tendero extends Model
{
    use HasFactory;
    protected $table = 'tenderos';
    protected $fillable = 
    ['nombre', 
    'apellido', 
    'direccion', 
    'telefono', 
    'puntos'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
