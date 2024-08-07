<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Sucursal;
use App\Models\CatalogoTipoEquipo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Equipo extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'serie',
        'marca',
        'modelo',
        'costo_de_poliza',
        // 'catalogo_tipo_equipo_id',
        // 'sucursal_id',
    ];

    protected $table = 'equipo';

    /**
     * Get the sucursal that owns the Equipo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sucursal(): BelongsTo
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }

    /**
     * Get the tipo_equipo that owns the Equipo
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipo_equipo(): BelongsTo
    {
        return $this->belongsTo(CatalogoTipoEquipo::class, 'catalogo_tipo_equipo_id');
    }


}
