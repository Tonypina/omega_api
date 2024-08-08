<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Afinidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tecnico_id',
        'catalogo_tipo_equipo_id',
        'porcentaje',
    ];

    protected $table = 'afinidad';
}
