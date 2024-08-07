<?php

namespace App\Http\Validation;

trait CatalogoTipoEquipoValidationRules
{
    protected function catalogoTipoEquipoStoreValidationRules(): array
    {
        return [
            'descripcion' => ['required', 'string', 'max:100'],
        ];
    }

    protected function catalogoTipoEquipoUpdateValidationRules(): array
    {
        return [
            'descripcion' => ['string', 'max:100'],
        ];
    }
}