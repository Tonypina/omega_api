<?php

namespace App\Models;

use App\Models\Equipo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CatalogoTipoEquipo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion'
    ];

    protected $table = 'catalogo_tipo_equipo';

    /**
     * Get all of the equipos for the CatalogoTipoEquipo
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class, 'catalogo_tipo_equipo_id', 'id');
    }
}
