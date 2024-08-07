<?php

namespace App\Models;

use App\Models\Equipo;
use App\Models\Tecnico;
use App\Models\Sucursal;
use App\Models\CatalogoStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'folio',
        'monto_ticket',
        'monto_servicio',
        'fecha_asignacion',
        'fecha_inicio',
        'fecha_check_in',
        'fecha_fin',
        'comentario',
        'criticidad',
        'orden_servicio',
        // 'status_id',
        // 'equipo_id',
        // 'ticket_padre_id',
        // 'tecnico_id',
    ];

    protected $table = 'ticket';

    /**
     * Get the status that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(CatalogoStatus::class, 'status_id');
    }

    /**
     * Get the equipo that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function equipo(): BelongsTo
    {
        return $this->belongsTo(Equipo::class, 'equipo_id');
    }

    /**
     * Get the ticket_padre that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ticket_padre(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'ticket_padre_id');
    }

    /**
     * Get the ticket_hijo associated with the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function ticket_hijo(): HasOne
    {
        return $this->hasOne(Ticket::class, 'ticket_padre_id', 'id');
    }

    /**
     * Get the tecnico that owns the Ticket
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tecnico(): BelongsTo
    {
        return $this->belongsTo(Tecnico::class, 'tecnico_id');
    }
}
