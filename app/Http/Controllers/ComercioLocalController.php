<?php
namespace App\Http\Controllers;

use App\Models\ComercioLocal;
use Illuminate\Http\Request;

class ComercioLocalController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Index method called',
            'data' => ComercioLocal::all()
        ]);
    }

    public function store(Request $request)
    {
        $debugMessages = [];
        $debugMessages[] = "Store method called";

        try {
            $debugMessages[] = "Validating request";
            $validatedData = $request->validate([
                'localidadComercio' => 'required|string|max:15',
                'tipoComercio' => 'required|string|max:45',
                'ubicacionComercio' => 'required|string|max:45',
                'imagenComercio' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $debugMessages[] = "Validation passed";

            // Manejar la carga del archivo
            if ($request->hasFile('imagenComercio')) {
                $file = $request->file('imagenComercio');
                $path = $file->store('public/comercios');
                $validatedData['imagenComercio'] = $path;
            } else {
                $validatedData['imagenComercio'] = null;
            }

            $comercioLocal = ComercioLocal::create($validatedData);
            $debugMessages[] = "ComercioLocal created";
            return response()->json([
                'message' => 'ComercioLocal created successfully',
                'data' => $comercioLocal,
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
                'error' => 'Error al crear el comercio local',
                'message' => $e->getMessage(),
                'debug' => $debugMessages
            ], 500);
        }
    }

    public function show($id)
    {
        return response()->json([
            'message' => 'Show method called',
            'data' => ComercioLocal::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $debugMessages = [];
        $debugMessages[] = "Update method called";

        try {
            $debugMessages[] = "Validating request";
            $validatedData = $request->validate([
                'localidadComercio' => 'sometimes|required|string|max:15',
                'tipoComercio' => 'sometimes|required|string|max:45',
                'ubicacionComercio' => 'sometimes|required|string|max:45',
                'imagenComercio' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $debugMessages[] = "Validation passed";

            // Manejar la carga del archivo
            if ($request->hasFile('imagenComercio')) {
                $file = $request->file('imagenComercio');
                $path = $file->store('public/comercios');
                $validatedData['imagenComercio'] = $path;
            } else {
                $validatedData['imagenComercio'] = null;
            }

            $comercioLocal = ComercioLocal::findOrFail($id);
            $comercioLocal->update($validatedData);
            $debugMessages[] = "ComercioLocal updated";
            return response()->json([
                'message' => 'ComercioLocal updated successfully',
                'data' => $comercioLocal,
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
                'error' => 'Error al actualizar el comercio local',
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
            $comercioLocal = ComercioLocal::findOrFail($id);
            $comercioLocal->delete();
            $debugMessages[] = "ComercioLocal deleted";
            return response()->json([
                'message' => 'ComercioLocal deleted successfully',
                'debug' => $debugMessages
            ], 204);
        } catch (\Exception $e) {
            $debugMessages[] = "Exception: " . $e->getMessage();
            return response()->json([
                'error' => 'Error al eliminar el comercio local',
                'message' => $e->getMessage(),
                'debug' => $debugMessages
            ], 500);
        }
    }
}