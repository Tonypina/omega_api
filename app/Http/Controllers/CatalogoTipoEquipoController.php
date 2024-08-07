<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CatalogoTipoEquipo;
use Illuminate\Support\Facades\Log;
use App\Http\Validation\CatalogoTipoEquipoValidationRules;

class CatalogoTipoEquipoController extends Controller
{
    use CatalogoTipoEquipoValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        CatalogoTipoEquipo::all()->withTrashed(false);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->catalogoTipoEquipoStoreValidationRules());

        try {

            $nuevoTipoEquipo = CatalogoTipoEquipo::create([
                'descripcion' => $request->descripcion,
            ]);

            $nuevoTipoEquipo->save();

            return response()->json('Insertado con éxito', 201);
        
        } catch (\Throwable $th) {
            Log::error($th);
            
            return response()->json('Ocurrió un problema, vuélvelo a intentar', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return CatalogoTipoEquipo::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->catalogoTipoEquipoUpdateValidationRules());

        try {

            $old_tipo_equipo = CatalogoTipoEquipo::find($id);
    
            foreach ($request as $tipo_equipo_column => $tipo_equipo_update) {
                $old_tipo_equipo->$tipo_equipo_column = $tipo_equipo_update;
            }
    
            $old_tipo_equipo->save();
    
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
            $tipo_equipo = CatalogoTipoEquipo::find($id);
            $tipo_equipo->delete();
    
            return response()->json('Eliminado con éxito', 200);

        } catch (\Throwable $th) {

            Log::error($th);

            return response()->json('Ocurrió un error, vuélvelo a intentar', 500);
        }
    }
}
