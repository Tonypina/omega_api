<?php

namespace App\Http\Controllers;

use App\Models\Vendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Validation\VendedorValidationRules;

class VendedorController
{
    use VendedorValidationRules;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Vendedor::all()->withTrashed(false);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->vendedorStoreValidationRules());

        try {
            
            $vendedor = Vendedor::create([
                'nombre' => $request->nombre,
                'contacto' => $request->contacto,
                'correo' => $request->correo,
            ]);

            $vendedor->save();

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
        return Vendedor::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate($this->vendedorUpdateValidationRules());

        try {
            
            $old_vendedor = Vendedor::find($id);

            foreach ($$request as $vendedor_column => $vendedor_update) {
                $old_vendedor->$vendedor_column = $vendedor_update;
            }

            $old_vendedor->save();

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
            $vendedor = Vendedor::find($id);

            $vendedor->delete();

            return response()->json('Eliminado con éxito', 200);

        } catch (\Throwable $th) {
            Log::error($th);

            return response()->json('Ocurrió un problema', 500);
        }
    }
}
