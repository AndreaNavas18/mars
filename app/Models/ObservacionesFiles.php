<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Observation;


class Observacionesfiles extends Model
{
    use HasFactory;
    protected $table = 'observaciones_files';
    protected $fillable = 
    [
        'slug',
        'path',
        'name',
        'observacion_id',
    ];

    public function observacion()
    {
        return $this->belongsTo(Observation::class);
    }
}
