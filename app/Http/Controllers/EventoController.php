<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::all();
        return response()->json($eventos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nombreEvento' => 'required|string|max:255',
                'fechaEvento' => 'required|date',
                'descripcionEvento' => 'required|string',
                'organizacionId' => 'required|exists:organizaciones,id'
            ]);

            $evento = Evento::create($validatedData);
            return response()->json($evento, 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al crear el evento',
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $evento = Evento::findOrFail($id);
        return response()->json($evento);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'nombreEvento' => 'sometimes|required|string|max:255',
                'fechaEvento' => 'sometimes|required|date',
                'descripcionEvento' => 'sometimes|required|string',
                'organizacionId' => 'sometimes|required|exists:organizaciones,id'
            ]);

            $evento = Evento::findOrFail($id);
            $evento->update($validatedData);
            return response()->json($evento);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al actualizar el evento',
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
            $evento = Evento::findOrFail($id);
            $evento->delete();
            return response()->json(null, 204);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar el evento',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}