<?php

namespace App\Models;

use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tecnico extends Model
{
    use HasFactory;

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
}
