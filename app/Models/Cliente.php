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
       'rfc', 
       'regimen_fiscal', 
       'cfdi', 
       'codigo_postal', 
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
}
