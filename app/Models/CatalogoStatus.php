<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogoStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion'
    ];

    protected $table = 'catalogo_status';
}
