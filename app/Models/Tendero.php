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
    'direccion', 
    'telefono', 
    'puntos',
    'cedula',
    'user_id',
    'producto',
    'canal',
    'subcanal',
    'region_nielsen',
    'codigo_pdv',
    'drop_size',
    'frecuencia',
    'prob_compra',
    'cuota_mes'
    ];

   public function user()
   {
       return $this->belongsTo(User::class);
   }
}
