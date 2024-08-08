<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Afinidad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tecnico extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'contacto',
        'correo',
    ];

    protected $table = 'tecnico';

    /**
     * Get all of the tickets for the Tecnico
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, 'tecnico_id', 'id');
    }

    /**
     * The afinidades that belong to the Tecnico
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function afinidades(): BelongsToMany
    {
        return $this->belongsToMany(Afinidad::class, 'afinidad', 'tecnico_id', 'catalogo_tipo_equipo_id')->withPivot('afinidad');
    }
}
