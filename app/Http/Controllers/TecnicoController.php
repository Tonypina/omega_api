<?php

namespace App\Http\Controllers;

use App\Http\Resources\TecnicoResource;
use App\Models\Tecnico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Validation\TecnicoValidationRules;

class TecnicoController
{
    use TecnicoValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TecnicoResource::collection(Tecnico::all()->withTrashed(false));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->tecnicoStoreValidationRules());

        try {
            
            $tecnico = Tecnico::create([
                'nombre' => $request->nombre,
                'contacto' => $request->contacto,
                'correo' => $request->correo,
            ]);

            foreach ($request->afinidades as $afinidad) {

                $tecnico->afinidades()->attach(
                    $afinidad->catalogo_tipo_equipo_id,
                    ['porcentaje' => $afinidad->porcentaje]
                );
            }

            $tecnico->save();
            
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
        return Tecnico::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->tecnicoUpdateValidationRules());
        
        try {
            
            $old_tecnico = Tecnico::find($id);

            foreach ($request as $tecnico_column => $tecnico_update) {
                if ($tecnico_column === "afinidades") {

                    foreach ($tecnico_update as $afinidad) {
                        $old_tecnico->afinidades()->updateExistingPivot(
                            $afinidad->catalogo_tipo_equipo_id,
                            ['porcentaje' => $afinidad->porcentaje]
                        );
                    }

                } else {
                    $old_tecnico->$tecnico_column = $tecnico_update;
                }
            }

            $old_tecnico->save();

            return response()->json('Actualizado con éxito', 200);
            
        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json('Ocurrió un problema', 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $tecnico = Tecnico::find($id);

            $tecnico->delete();

            return response()->json('Eliminado con éxito', 200);

        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json('Ocurrió un problema', 500);
        }
    }
}
