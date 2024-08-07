<?php

namespace App\Http\Validation;

trait ClienteValidationRules
{
    protected function clienteStoreValidationRules(): array
    {
        return [
            'nombre' => ['required', 'string', 'max:100'],
            'contacto' => ['required', 'string', 'max:10', 'min:10'],
            'tipo' => ['required', 'string', 'max:1'],
            'rfc' => ['required', 'string'],
            'regimen_fiscal' => ['required', 'string', 'max:100'],
            'cfdi' => ['required', 'string', 'max:100'],
            'codigo_postal' => ['required', 'numeric', 'integer'],
            'correo' => ['required', 'email'],
        ];
    }

    protected function clienteUpdateValidationRules(): array
    {
        return [
            'nombre' => ['string', 'max:100'],
            'contacto' => ['string', 'max:10', 'min:10'],
            'tipo' => ['string', 'max:1'],
            'rfc' => ['string'],
            'regimen_fiscal' => ['string', 'max:100'],
            'cfdi' => ['string', 'max:100'],
            'codigo_postal' => ['numeric', 'integer'],
            'correo' => ['email'],
        ];
    }
}