<?php

namespace App\Models;

use App\Models\Equipo;
use App\Models\Poliza;
use App\Models\Sucursal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
       'nombre', 
       'contacto', 
       'tipo', 
       'datos_fiscales', 
       'correo', 
    ];

    protected $table = 'cliente';
    
    /**
     * Get all of the sucursales for the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sucursales(): HasMany
    {
        return $this->hasMany(Sucursal::class, 'cliente_id', 'id');
    }
    
    /**
     * Get all of the polizas for the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function polizas(): HasMany
    {
        return $this->hasMany(Poliza::class, 'cliente_id', 'id');
    }

    /**
     * Get all of the equipos for the Cliente
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class, 'cliente_id', 'id');
    }
}
