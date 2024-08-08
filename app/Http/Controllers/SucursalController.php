<?php

namespace App\Http\Controllers;

use App\Http\Resources\SucursalResource;
use App\Models\Cliente;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Validation\SucursalValidationRules;
use App\Models\Equipo;

class SucursalController
{
    use SucursalValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SucursalResource::collection(Sucursal::all()->withTrashed(false));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->sucursalStoreValidationRules());

        try {

            $cliente_asociado = Cliente::find($request->cliente_id);

            if ($cliente_asociado) {
                
                $sucursal = Sucursal::create([
                    'direccion' => $request->direccion,
                    'correo' => $request->correo,
                    'contacto' => $request->contacto,
                    'fecha_alta_contrato' => $request->fecha_alta_contrato,
                ]);
    
                $sucursal->associate($cliente_asociado);
    
                $sucursal->save();

            } else {
                return response()->json('ERROR: No existe el Cliente', 400);
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
        return new SucursalResource(Sucursal::find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->sucursalUpdateValidationRules());

        try {

            $old_sucursal = Sucursal::find($id);
    
            foreach ($request as $sucursal_column => $sucursal_update) {
                $old_sucursal->$sucursal_column = $sucursal_update;
            }
    
            $old_sucursal->save();
    
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
            $sucursal = Sucursal::find($id);

            $equipos_asociados = Equipo::where('sucursal_id', $id)->get();
            
            if ($equipos_asociados) {
                foreach ($equipos_asociados as $equipo) {
                    (new Equipo)->destroy($equipo->id);
                }
            }

            $sucursal->delete();
    
            return response()->json('Eliminado con éxito', 200);

        } catch (\Throwable $th) {

            Log::error($th);

            return response()->json('Ocurrió un error, vuélvelo a intentar', 500);
        }
    }
}
