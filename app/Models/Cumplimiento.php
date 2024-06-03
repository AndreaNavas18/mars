<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tendero;

class Cumplimiento extends Model
{
    use HasFactory;
    protected $table = 'cumplimiento';
    protected $fillable = 
    [
        'tendero_id',
        'mes_1',
        'mes_2',
        'mes_3',
        'mes_4',
        'mes_5',
        'mes_6',

    ];

   public function tendero()
   {
       return $this->belongsTo(Tendero::class);
   }
}
