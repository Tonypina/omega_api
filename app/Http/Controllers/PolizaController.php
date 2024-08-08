<?php

namespace App\Http\Controllers;

use App\Models\Poliza;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Resources\PolizaResource;
use App\Http\Validation\PolizaValidationRules;
use App\Models\Vendedor;

class PolizaController
{
    use PolizaValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return PolizaResource::collection(Poliza::all()->withTrashed(false));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->polizaStoreValidationRules());

        try {
            
            $sucursal_asociada = Sucursal::find($request->sucursal_id);

            $vendedor_asociado = Vendedor::find($request->vendedor_id);

            if ($sucursal_asociada && $vendedor_asociado) {

                $poliza = Poliza::create([
                    'vigencia' => $request->vigencia,
                    'periodicidad' => $request->periodicidad,
                    'eventualidades' => $request->eventualidades,
                    'numero_poliza' => $request->numero_poliza,
                    'costo' => $request->costo,
                ]);

                $poliza->associate($sucursal_asociada);
                
                $poliza->vendedores()->attach(
                    $request->vendedor_id,
                    ['comision' => $request->comision]
                );

                $poliza->save();
            
            } else {
                return response()->json('ERROR: No existe la Sucursal', 400);
            }

            return response()->json('Insertado con éxito', 201);

        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json('Ocurrió un errorr', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new PolizaResource(Poliza::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->polizaUpdateValidationRules());

        try {

            $old_poliza = Poliza::find($id);
    
            foreach ($request as $poliza_column => $poliza_update) {
                
                if ($poliza_column === "vendedores") {
                    foreach ($poliza_update as $vendedor) {
                        $old_poliza->vendedores()->updateExistingPivot(
                            $vendedor->vendedor_id,
                            ['comision' => $vendedor->comision]
                        );
                    }
                }
                $old_poliza->$poliza_column = $poliza_update;
            }
    
            $old_poliza->save();
    
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
            $poliza = Poliza::find($id);

            $poliza->delete();
    
            return response()->json('Eliminado con éxito', 200);

        } catch (\Throwable $th) {

            Log::error($th);

            return response()->json('Ocurrió un error, vuélvelo a intentar', 500);
        }
    }
}
