<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\SucursalController;
use App\Http\Validation\ClienteValidationRules;

class ClienteController extends Controller
{
    use ClienteValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Cliente::all()->withTrashed(false);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->clienteStoreValidationRules());
    
        try {

            $nuevoCliente = Cliente::create([
                'nombre' => $request->nombre,
                'contacto' => $request->contacto,
                'tipo' => $request->tipo,
                'rfc' => $request->rfc,
                'regimen_fiscal' => $request->regimen_fiscal,
                'cfdi' => $request->cfdi,
                'codigo_postal' => $request->codigo_postal,
                'correo' => $request->correo,
            ]);

            $nuevoCliente->save();

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
        return Cliente::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->clienteUpdateValidationRules());

        try {

            $old_cliente = Cliente::find($id);
    
            foreach ($request as $cliente_column => $cliente_update) {
                $old_cliente->$cliente_column = $cliente_update;
            }
    
            $old_cliente->save();
    
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
            $cliente = Cliente::find($id);

            $sucursales_asociadas = Sucursal::where('cliente_id', $id)->get();

            if ($sucursales_asociadas) {
                foreach ($sucursales_asociadas as $sucursal) {
                    (new SucursalController)->destroy($sucursal->id);
                }
            }

            $cliente->delete();
    
            return response()->json('Eliminado con éxito', 200);

        } catch (\Throwable $th) {

            Log::error($th);

            return response()->json('Ocurrió un error, vuélvelo a intentar', 500);
        }
    }
}
