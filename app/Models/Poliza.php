<?php

namespace App\Models;

use App\Models\Cliente;
use App\Models\Sucursal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Poliza extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vigencia',
        'periodicidad',
        'eventualidades',
        'numero_poliza',
        'costo',
        // 'sucursal_id',
    ];
    
    protected $table = 'poliza';

    /**
     * Get the sucursal that owns the Poliza
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sucursal(): BelongsTo
    {
        return $this->belongsTo(Sucursal::class, 'sucursal_id');
    }

    /**
     * The vendedores that belong to the Poliza
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function vendedores(): BelongsToMany
    {
        return $this->belongsToMany(Vendedor::class, 'vendedor_poliza', 'vendedor_id', 'poliza_id');
    }
}
