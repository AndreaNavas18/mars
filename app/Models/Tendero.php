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
    'telefono',
    'cedula',
    'user_id',
    'producto',
    'canal',
    'subcanal',
    'region_nielsen',
    'drop_size',
    'frecuencia',
    'prob_compra',
    'cuota_mes',
    'puntos',
    ];

   public function user()
   {
       return $this->belongsTo(User::class);
   }

   public function observations()
   {
       return $this->hasMany(Observation::class);
   }
}
