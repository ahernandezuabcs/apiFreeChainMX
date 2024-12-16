<?php

namespace App\Http\Controllers;

use App\Models\Organizacion;
use Illuminate\Http\Request;

class OrganizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Index method called',
            'data' => Organizacion::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $debugMessages = [];
        $debugMessages[] = "Store method called";

        try {
            $debugMessages[] = "Validating request";
            $validatedData = $request->validate([
                'nombreOrganizacion' => 'required|string|max:255',
                'tipoOrganizacion' => 'required|string|max:255',
                'sedeOrganizacion' => 'required|string|max:255',
                'mesaDirectiva' => 'required|boolean',
                'mesaDirectivaMotoclubId' => 'required|exists:mesa_directiva_motoclubs,id'
            ]);

            $debugMessages[] = "Validation passed";

            $organizacion = Organizacion::create($validatedData);
            $debugMessages[] = "Organization created";
            return response()->json([
                'message' => 'Organization created successfully',
                'data' => $organizacion,
                'debug' => $debugMessages
            ], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $debugMessages[] = "Validation error: " . json_encode($e->errors());
            return response()->json([
                'error' => 'Error de validación',
                'message' => $e->errors(),
                'debug' => $debugMessages
            ], 400);
        } catch (\Exception $e) {
            $debugMessages[] = "Exception: " . $e->getMessage();
            return response()->json([
                'error' => 'Error al crear la organización',
                'message' => $e->getMessage(),
                'debug' => $debugMessages
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return response()->json([
            'message' => 'Show method called',
            'data' => Organizacion::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $debugMessages = [];
        $debugMessages[] = "Update method called";

        try {
            $debugMessages[] = "Validating request";
            $validatedData = $request->validate([
                'nombreOrganizacion' => 'sometimes|required|string|max:255',
                'tipoOrganizacion' => 'sometimes|required|string|max:255',
                'sedeOrganizacion' => 'sometimes|required|string|max:255',
                'mesaDirectiva' => 'sometimes|required|boolean',
                'mesaDirectivaMotoclubId' => 'sometimes|required|exists:mesa_directiva_motoclubs,id'
            ]);

            $debugMessages[] = "Validation passed";

            $organizacion = Organizacion::findOrFail($id);
            $organizacion->update($validatedData);
            $debugMessages[] = "Organization updated";
            return response()->json([
                'message' => 'Organization updated successfully',
                'data' => $organizacion,
                'debug' => $debugMessages
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $debugMessages[] = "Validation error: " . json_encode($e->errors());
            return response()->json([
                'error' => 'Error de validación',
                'message' => $e->errors(),
                'debug' => $debugMessages
            ], 400);
        } catch (\Exception $e) {
            $debugMessages[] = "Exception: " . $e->getMessage();
            return response()->json([
                'error' => 'Error al actualizar la organización',
                'message' => $e->getMessage(),
                'debug' => $debugMessages
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $debugMessages = [];
        $debugMessages[] = "Destroy method called";

        try {
            $organizacion = Organizacion::findOrFail($id);
            $organizacion->delete();
            $debugMessages[] = "Organization deleted";
            return response()->json([
                'message' => 'Organization deleted successfully',
                'debug' => $debugMessages
            ], 204);
        } catch (\Exception $e) {
            $debugMessages[] = "Exception: " . $e->getMessage();
            return response()->json([
                'error' => 'Error al eliminar la organización',
                'message' => $e->getMessage(),
                'debug' => $debugMessages
            ], 500);
        }
    }
}