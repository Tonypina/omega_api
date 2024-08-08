<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PolizaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'vigencia' => $this->vigencia,
            'periodicidad' => $this->periodicidad,
            'eventualidades' => $this->eventualidades,
            'numero_poliza' => $this->numero_poliza,
            'costo' => $this->costo,
        ];
    }
}
