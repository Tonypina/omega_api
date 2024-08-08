<?php

namespace App\Http\Validation;

trait VendedorValidationRules
{
    protected function vendedorStoreValidationRules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:50'],
            'contacto' => ['required', 'string', 'max:10'],
            'correo' => ['required', 'email'],
        ];
    }
    
    protected function vendedorUpdateValidationRules(): array
    {
        return [
            'nombre' => ['string', 'max:50'],
            'contacto' => ['string', 'max:10'],
            'correo' => ['email'],
        ];
    }
}