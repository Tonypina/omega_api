<?php

namespace App\Http\Validation;

trait SucursalValidationRules
{
    protected function sucursalStoreValidationRules(): array
    {
        return [
            'direccion' => ['required', 'string', 'max:100'],
            'correo' => ['required', 'email'],
            'contacto' => ['required', 'string', 'max:10'],
            'fecha_alta_contrato' => ['required', 'date_format:Y-m-d'],
        ];
    }
    
    protected function sucursalUpdateValidationRules(): array
    {
        return [
            'direccion' => ['string', 'max:100'],
            'correo' => ['email'],
            'contacto' => ['string', 'max:10'],
            'fecha_alta_contrato' => ['date_format:Y-m-d'],
        ];
    }
}