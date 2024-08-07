<?php

namespace App\Http\Controllers;

use App\Http\Validation\CatalogoStatusValidationRules;
use Illuminate\Http\Request;
use App\Models\CatalogoStatus;
use Illuminate\Support\Facades\Log;

class CatalogoStatusController extends Controller
{
    use CatalogoStatusValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return CatalogoStatus::all()->withTrashed(false);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->catalogoStatusStoreValidationRules());
        
        try {

            $nuevoStatus = CatalogoStatus::create([
                'descripcion' => $request->descripcion,
            ]);

            $nuevoStatus->save();

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
        return CatalogoStatus::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->catalogoStatusUpdateValidationRules());

        try {

            $old_status = CatalogoStatus::find($id);
    
            foreach ($request as $status_column => $status_update) {
                $old_status->$status_column = $status_update;
            }
    
            $old_status->save();
    
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
            $status = CatalogoStatus::find($id);
            $status->delete();
    
            return response()->json('Eliminado con éxito', 200);

        } catch (\Throwable $th) {

            Log::error($th);

            return response()->json('Ocurrió un error, vuélvelo a intentar', 500);
        }
    }
}
