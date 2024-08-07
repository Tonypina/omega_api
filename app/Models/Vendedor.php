<?php

namespace App\Models;

use App\Models\Poliza;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendedor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre',
        'contacto',
        'correo',
    ];

    protected $table = 'vendedor';

    /**
     * The polizas that belong to the Vendedor
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function polizas(): BelongsToMany
    {
        return $this->belongsToMany(Poliza::class, 'vendedor_poliza', 'vendedor_id', 'poliza_id');
    }
}
