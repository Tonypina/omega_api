<?php

namespace App\Http\Validation;

trait TicketValidationRules
{
    protected function ticketStoreValidationRules(): array
    {
        return [
            'folio' => ['required', 'string', 'max:50'],
            'monto_ticket' => ['decimal:2'],
            'monto_servicio' => ['decimal:2'],
            'fecha_asignacion' => ['date_format:Y-m-d H:i:s'],
            'fecha_inicio' => ['nullable', 'date_format:Y-m-d H:i:s'],
            'fecha_check_in' => ['date_format:Y-m-d H:i:s'],
            'fecha_fin' => ['date_format:Y-m-d H:i:s'],
            'comentario' => ['string', 'max:250'],
            'criticidad' => ['string', 'max:1'],
            'orden_servicio' => ['string'],
            'status_id' => ['required'],
            'equipo_id' => ['required'],
            'tecnico_id' => ['required'],
        ];
    }
    
    protected function ticketUpdateValidationRules(): array
    {
        return [
            'folio' => ['required', 'string', 'max:50'],
            'monto_ticket' => ['decimal:2'],
            'monto_servicio' => ['decimal:2'],
            'fecha_asignacion' => ['date_format:Y-m-d H:i:s'],
            'fecha_inicio' => ['nullable', 'date_format:Y-m-d H:i:s'],
            'fecha_check_in' => ['date_format:Y-m-d H:i:s'],
            'fecha_fin' => ['date_format:Y-m-d H:i:s'],
            'comentario' => ['string', 'max:250'],
            'criticidad' => ['string', 'max:1'],
            'orden_servicio' => ['string'],
            'status_id' => ['required'],
            'equipo_id' => ['required'],
            'tecnico_id' => ['required'],
        ];
    }
}