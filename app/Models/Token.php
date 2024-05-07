<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tendero;

class Token extends Model
{
    use HasFactory;
    protected $table = 'tokens';
    protected $fillable = 
    [
        'token',
        'status',
        'tendero_id',

    ];

    public function tendero()
    {
        return $this->belongsTo(Tendero::class);
    }
}
