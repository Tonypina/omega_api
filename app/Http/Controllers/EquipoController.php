<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use App\Models\CatalogoTipoEquipo;
use Illuminate\Support\Facades\Log;
use App\Http\Validation\EquipoValidationRules;

class EquipoController
{
    use EquipoValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Equipo::all()->withTrashed(false);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->equipoStoreValidationRules());

        try {
            
            $sucursal_asociada = Sucursal::find($request->sucursal_id);

            if ($sucursal_asociada) {

                $equipo = Equipo::create([
                    'serie' => $request->serie,
                    'marca' => $request->marca,
                    'modelo' => $request->modelo,
                    'costo_poliza' => $request->costo_poliza,
                ]);

                $equipo->associate(CatalogoTipoEquipo::find($request->catalogo_tipo_equipo_id));

                $equipo->associate($sucursal_asociada);

                $equipo->save();

            } else {
                return response()->json('ERROR: No existe la Sucursal', 400);
            }

            return response()->json('Insertado con éxito', 201);

        } catch (\Throwable $th) {

            Log::error($th);
            
            return response()->json('Ocurrió un problema', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Equipo::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
