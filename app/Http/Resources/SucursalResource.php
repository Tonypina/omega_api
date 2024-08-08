<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\EquipoResource;
use App\Http\Resources\PolizaResource;
use Illuminate\Http\Resources\Json\JsonResource;

class SucursalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'direccion' => $this->direccion,
            'correo' => $this->correo,
            'contacto' => $this->contacto,
            'fecha_alta_contrato' => $this->fecha_alta_contrato,
            'equipos' => EquipoResource::collection($this->equipos()),
            'polizas' => PolizaResource::collection($this->polizas()),
        ];
    }
}
