<?php

namespace App\Http\Controllers;

use App\Models\PerfilClinicoMotociclista;
use Illuminate\Http\Request;

class PerfilClinicoMotociclistaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perfilesClinicos = PerfilClinicoMotociclista::all();
        return response()->json($perfilesClinicos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tipoSangre' => 'required|string|max:5',
                'enfermedadesCronicas' => 'required|string|max:255',
                'alergias' => 'required|string|max:255',
                'medicamentosHabituales' => 'required|string|max:255',
                'contactoEmergencia' => 'required|string|max:45',
                'telefonoEmergencia' => 'required|string|max:15',
                'motociclistasIdMotociclistas' => 'required|exists:motociclistas,idMotociclistas',
            ]);

            $perfilClinico = PerfilClinicoMotociclista::create($validatedData);
            return response()->json($perfilClinico, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear el perfil clínico',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perfilClinico = PerfilClinicoMotociclista::findOrFail($id);
        return response()->json($perfilClinico);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'tipoSangre' => 'sometimes|required|string|max:5',
                'enfermedadesCronicas' => 'sometimes|required|string|max:255',
                'alergias' => 'sometimes|required|string|max:255',
                'medicamentosHabituales' => 'sometimes|required|string|max:255',
                'contactoEmergencia' => 'sometimes|required|string|max:45',
                'telefonoEmergencia' => 'sometimes|required|string|max:15',
                'motociclistasIdMotociclistas' => 'sometimes|required|exists:motociclistas,idMotociclistas',
            ]);

            $perfilClinico = PerfilClinicoMotociclista::findOrFail($id);
            $perfilClinico->update($validatedData);
            return response()->json($perfilClinico);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar el perfil clínico',
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
            $perfilClinico = PerfilClinicoMotociclista::findOrFail($id);
            $perfilClinico->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar el perfil clínico',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}