<?php

namespace App\Http\Resources;

use App\Models\CatalogoTipoEquipo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EquipoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'serie' => $this->serie,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'costo_de_poliza' => $this->costo_de_poliza,
            'tipo_de_equipo' => $this->tipo_equipo()->descripcion,
        ];
    }
}
