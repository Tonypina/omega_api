<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class VendedorPoliza extends Pivot
{
    use SoftDeletes;

    protected $fillable = [
        'vendedor_id',
        'poliza_id',
        'comision',
    ];

    protected $table = 'vendedor_poliza';
}
