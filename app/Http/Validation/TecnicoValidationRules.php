<?php

namespace App\Http\Validation;

trait TecnicoValidationRules
{
    protected function tecnicoStoreValidationRules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:50'],
            'contacto' => ['required', 'string', 'max:10'],
            'correo' => ['required', 'email'],
        ];
    }
    
    protected function tecnicoUpdateValidationRules(): array
    {
        return [
            'nombre' => ['string', 'max:50'],
            'contacto' => ['string', 'max:10'],
            'correo' => ['email'],
        ];
    }
}