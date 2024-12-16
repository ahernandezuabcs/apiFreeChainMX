<?php

namespace App\Http\Controllers;

use App\Models\MesaDirectivaMotoclub;
use Illuminate\Http\Request;

class MesaDirectivaMotoclubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mesas = MesaDirectivaMotoclub::all();
        return response()->json($mesas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nombrePresidente' => 'required|string|max:45',
                'idPresidente' => 'required|string|max:10',
                'nombreVicePresidente' => 'required|string|max:45',
                'idVicePresidente' => 'required|string|max:10',
                'nombreSecretario' => 'required|string|max:45',
                'idSecretario' => 'required|string|max:10',
                'nombreSgtoArms' => 'required|string|max:45',
                'idSgtoArms' => 'required|string|max:10',
                'nombreCapitanRuta' => 'required|string|max:45',
                'idCapitanRuta' => 'required|string|max:10',
                'nombreRelacionesPublicas' => 'required|string|max:45',
                'idRelacionesPublicas' => 'required|string|max:10'
            ]);

            $mesa = MesaDirectivaMotoclub::create($validatedData);
            return response()->json($mesa, 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Error de validación',
                'message' => $e->errors()
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear la mesa directiva',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mesa = MesaDirectivaMotoclub::findOrFail($id);
        return response()->json($mesa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'nombrePresidente' => 'sometimes|required|string|max:45',
                'idPresidente' => 'sometimes|required|string|max:10',
                'nombreVicePresidente' => 'sometimes|required|string|max:45',
                'idVicePresidente' => 'sometimes|required|string|max:10',
                'nombreSecretario' => 'sometimes|required|string|max:45',
                'idSecretario' => 'sometimes|required|string|max:10',
                'nombreSgtoArms' => 'sometimes|required|string|max:45',
                'idSgtoArms' => 'sometimes|required|string|max:10',
                'nombreCapitanRuta' => 'sometimes|required|string|max:45',
                'idCapitanRuta' => 'sometimes|required|string|max:10',
                'nombreRelacionesPublicas' => 'sometimes|required|string|max:45',
                'idRelacionesPublicas' => 'sometimes|required|string|max:10'
            ]);

            $mesa = MesaDirectivaMotoclub::findOrFail($id);
            $mesa->update($validatedData);
            return response()->json($mesa);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'error' => 'Error de validación',
                'message' => $e->errors()
            ], 400);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar la mesa directiva',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $mesa = MesaDirectivaMotoclub::findOrFail($id);
            $mesa->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la mesa directiva',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}