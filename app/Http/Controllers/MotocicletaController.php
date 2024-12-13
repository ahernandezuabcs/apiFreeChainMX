<?php

namespace App\Http\Controllers;

use App\Models\Motocicleta;
use Illuminate\Http\Request;

class MotocicletaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $motocicletas = Motocicleta::all();
        return response()->json($motocicletas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'marcaMotocicleta' => 'required|string|max:15',
                'modeloMotocicleta' => 'required|string|max:45',
                'imagenMotocicleta' => 'nullable|image|max:2048',
                'anio' => 'required|integer|min:1900|max:' . date('Y'),
                'cilindrada' => 'required|integer',
                'placas' => 'required|string|max:10',
                'motociclistasIdMotociclistas' => 'required|exists:motociclistas,idMotociclistas',
            ]);

            if ($request->hasFile('imagenMotocicleta')) {
                $validatedData['imagenMotocicleta'] = file_get_contents($request->file('imagenMotocicleta')->getRealPath());
            }

            $motocicleta = Motocicleta::create($validatedData);
            return response()->json($motocicleta, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear la motocicleta',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $motocicleta = Motocicleta::findOrFail($id);
        return response()->json($motocicleta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'marcaMotocicleta' => 'sometimes|required|string|max:15',
                'modeloMotocicleta' => 'sometimes|required|string|max:45',
                'imagenMotocicleta' => 'nullable|image|max:2048',
                'anio' => 'sometimes|required|integer|min:1900|max:' . date('Y'),
                'cilindrada' => 'sometimes|required|integer',
                'placas' => 'sometimes|required|string|max:10',
                'motociclistasIdMotociclistas' => 'sometimes|required|exists:motociclistas,idMotociclistas',
            ]);

            if ($request->hasFile('imagenMotocicleta')) {
                $validatedData['imagenMotocicleta'] = file_get_contents($request->file('imagenMotocicleta')->getRealPath());
            }

            $motocicleta = Motocicleta::findOrFail($id);
            $motocicleta->update($validatedData);
            return response()->json($motocicleta);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar la motocicleta',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $motocicleta = Motocicleta::findOrFail($id);
            $motocicleta->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la motocicleta',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}