<?php

namespace App\Http\Validation;

trait PolizaValidationRules
{
    protected function polizaStoreValidationRules(): array
    {
        return [
            'vigencia' => ['required', 'date_format:Y-m-d H:i:s'],
            'periodicidad' => ['required', 'numeric', 'integer'],
            'eventualidades' => ['required', 'numeric', 'integer'],
            'numero_poliza' => ['required', 'string', 'max:100'],
            'costo' => ['required', 'decimal:2'],
            'sucursal_id' => ['required'],
            'vendedor_id' => ['required'],
            'comision' => ['required', 'decimal:2'],
        ];
    }
    
    protected function polizaUpdateValidationRules(): array
    {
        return [
            'vigencia' => ['date_format:Y-m-d H:i:s'],
            'periodicidad' => ['numeric', 'integer'],
            'eventualidades' => ['numeric', 'integer'],
            'numero_poliza' => ['string', 'max:100'],
            'costo' => ['decimal:2'],
        ];
    }
}