<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use App\Http\Resources\TicketResource;
use App\Http\Resources\AfinidadResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TecnicoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'contacto' => $this->contacto,
            'correo' => $this->correo,
            'afinidades' => AfinidadResource::collection($this->afinidades()),
            'tickets' => TicketResource::collection($this->tickets()),
        ];
    }
}
