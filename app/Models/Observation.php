<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tendero;
use App\Models\User;


class Observation extends Model
{
    use HasFactory;
    protected $table = 'observations';
    protected $fillable = 
    ['observacion', 
    'user_id', 
    'tendero_id',
    ];

    public function tendero()
    {
        return $this->belongsTo(Tendero::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
