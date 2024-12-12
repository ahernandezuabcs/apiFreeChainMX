<?php

namespace App\Http\Controllers;

use App\Models\Motociclista;
use Illuminate\Http\Request;

class MotociclistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motociclistas = Motociclista::all();
        return response()->json($motociclistas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'nombreMotociclista' => 'required|string|max:45',
            'primerApellidoMotociclista' => 'required|string|max:45',
            'segundoApellidoMotociclista' => 'max:45',
            'fechaNacimientoMotociclista' => 'required|date',
            'direccionMotociclista' => 'required|string|max:45',
            'colonia' => 'string|max:45',
                            
        ]);

        $motociclista = Motociclista::create($validatedData);
        return response()->json($motociclista, 201);
    } catch (\Exception $e) {
        return response()->json([
            'error' => 'Error al crear el motociclista',
            'message' => $e->getMessage()
        ], 400);
    }
}

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $motociclista = Motociclista::findOrFail($id);
        return response()->json($motociclista);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombreMotociclista' => 'sometimes|required|string|max:45',
            'primerApellidoMotociclista' => 'sometimes|required|string|max:45',
            'segundoApellidoMotociclista' => 'sometimes|required|string|max:45',
            'fechaNacimientoMotociclista' => 'sometimes|required|date',
            'direccionMotociclista' => 'sometimes|required|string|max:45',
            'colonia' => 'sometimes|required|string|max:45',
            'motocicletasIdMotocicleta' => 'sometimes|required|exists:motocicletas,idMotocicleta',
            'puntosDeInteresIdPuntoInteres' => 'sometimes|required|exists:puntos_interes,idPuntoInteres',
        ]);

        $motociclista = Motociclista::findOrFail($id);
        $motociclista->update($validatedData);
        return response()->json($motociclista);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $motociclista = Motociclista::findOrFail($id);
        $motociclista->delete();
        return response()->json(null, 204);
    }
}