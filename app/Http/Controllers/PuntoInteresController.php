<?php
namespace App\Http\Controllers;

use App\Models\PuntoInteres;
use Illuminate\Http\Request;

class PuntoInteresController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Index method called',
            'data' => PuntoInteres::all()
        ]);
    }

    public function store(Request $request)
    {
        $debugMessages = [];
        $debugMessages[] = "Store method called";

        try {
            $debugMessages[] = "Validating request";
            $validatedData = $request->validate([
                'ubicacionPuntoInteres' => 'required|string|max:45',
                'imagenPuntoInteres' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $debugMessages[] = "Validation passed";

            // Manejar la carga del archivo
            if ($request->hasFile('imagenPuntoInteres')) {
                $file = $request->file('imagenPuntoInteres');
                $path = $file->store('public/puntos_interes');
                $validatedData['imagenPuntoInteres'] = $path;
            } else {
                $validatedData['imagenPuntoInteres'] = null;
            }

            $puntoInteres = PuntoInteres::create($validatedData);
            $debugMessages[] = "PuntoInteres created";
            return response()->json([
                'message' => 'PuntoInteres created successfully',
                'data' => $puntoInteres,
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
                'error' => 'Error al crear el punto de interés',
                'message' => $e->getMessage(),
                'debug' => $debugMessages
            ], 500);
        }
    }

    public function show($id)
    {
        return response()->json([
            'message' => 'Show method called',
            'data' => PuntoInteres::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $debugMessages = [];
        $debugMessages[] = "Update method called";

        try {
            $debugMessages[] = "Validating request";
            $validatedData = $request->validate([
                'ubicacionPuntoInteres' => 'sometimes|required|string|max:45',
                'imagenPuntoInteres' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $debugMessages[] = "Validation passed";

            // Manejar la carga del archivo
            if ($request->hasFile('imagenPuntoInteres')) {
                $file = $request->file('imagenPuntoInteres');
                $path = $file->store('public/puntos_interes');
                $validatedData['imagenPuntoInteres'] = $path;
            } else {
                $validatedData['imagenPuntoInteres'] = null;
            }

            $puntoInteres = PuntoInteres::findOrFail($id);
            $puntoInteres->update($validatedData);
            $debugMessages[] = "PuntoInteres updated";
            return response()->json([
                'message' => 'PuntoInteres updated successfully',
                'data' => $puntoInteres,
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
                'error' => 'Error al actualizar el punto de interés',
                'message' => $e->getMessage(),
                'debug' => $debugMessages
            ], 500);
        }
    }

    public function destroy($id)
    {
        $debugMessages = [];
        $debugMessages[] = "Destroy method called";

        try {
            $puntoInteres = PuntoInteres::findOrFail($id);
            $puntoInteres->delete();
            $debugMessages[] = "PuntoInteres deleted";
            return response()->json([
                'message' => 'PuntoInteres deleted successfully',
                'debug' => $debugMessages
            ], 204);
        } catch (\Exception $e) {
            $debugMessages[] = "Exception: " . $e->getMessage();
            return response()->json([
                'error' => 'Error al eliminar el punto de interés',
                'message' => $e->getMessage(),
                'debug' => $debugMessages
            ], 500);
        }
    }
}