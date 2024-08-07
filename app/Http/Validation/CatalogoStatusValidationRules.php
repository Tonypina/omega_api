<?php

namespace App\Http\Validation;

trait CatalogoStatusValidationRules
{
    protected function catalogoStatusStoreValidationRules(): array
    {
        return [
            'descripcion' => ['required', 'string', 'max:100'],
        ];
    }

    protected function catalogoStatusUpdateValidationRules(): array
    {
        return [
            'descripcion' => ['string', 'max:100'],
        ];
    }
}