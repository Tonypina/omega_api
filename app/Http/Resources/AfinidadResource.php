<?php

namespace App\Http\Resources;

use App\Models\CatalogoTipoEquipo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AfinidadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'tipo_equipo' => CatalogoTipoEquipo::find($this->catalogo_tipo_equipo_id)->descripcion,
            'porcentaje' => $this->porcentaje,
        ];
    }
}
