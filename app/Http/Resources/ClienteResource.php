<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\SucursalResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nombre' => $this->nombre, 
            'contacto' => $this->contacto, 
            'tipo' => $this->tipo, 
            'rfc' => $this->rfc, 
            'regimen_fiscal' => $this->regimen_fiscal, 
            'cfdi' => $this->cfdi, 
            'codigo_postal' => $this->codigo_postal, 
            'correo' => $this->correo, 
            'sucursales' => SucursalResource::collection($this->sucursales()),
        ];
    }
}
