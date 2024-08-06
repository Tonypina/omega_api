<?php

namespace App\Models;

use App\Models\Equipo;
use App\Models\Poliza;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sucursal extends Model
{
    use HasFactory;

    protected $fillable = [
        'direccion',
        'correo',
        'contacto',
        'fecha_alta_contrato',
        // 'cliente_id'
    ];

    protected $table = 'sucursal';

    /**
     * Get the cliente that owns the Sucursal
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');
    }

    /**
     * Get all of the polizas for the Sucursal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function polizas(): HasMany
    {
        return $this->hasMany(Poliza::class, 'sucursal_id', 'id');
    }

    /**
     * Get all of the equipos for the Sucursal
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class, 'sucursal_id', 'id');
    }
}
