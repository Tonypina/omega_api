<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class VendedorPoliza extends Pivot
{
    protected $fillable = [
        'vendedor_id',
        'poliza_id',
        'comision',
    ];

    protected $table = 'vendedor_poliza';
}
