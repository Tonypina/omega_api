<?php

namespace App\Http\Validation;

trait EquipoValidationRules
{
    protected function equipoStoreValidationRules(): array
    {
        return [
            'serie' => ['required', 'string', 'max:50'],
            'marca' => ['required', 'string', 'max:50'],
            'modelo' => ['required', 'string', 'max:50'],
            'costo_de_poliza' => ['required', 'decimal:2'],
            'sucursal_id' => ['required'],
        ];
    }

    protected function equipoUpdateValidationRules(): array
    {
        return [
            'serie' => ['string', 'max:50'],
            'marca' => ['string', 'max:50'],
            'modelo' => ['string', 'max:50'],
            'costo_de_poliza' => ['decimal:2'],            
        ];
    }
}