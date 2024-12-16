<?php
namespace App\Http\Controllers;

use App\Models\PuntoInteres;
use Illuminate\Http\Request;

class PuntoInteresController extends Controller
{
    public function index()
    {
        return response()->json(PuntoInteres::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ubicacionPuntoInteres' => 'required|string|max:45',
            'imagenPuntoInteres' => 'required|binary',
        ]);

        $puntoInteres = PuntoInteres::create($validatedData);

        return response()->json($puntoInteres, 201);
    }

    public function show($id)
    {
        return response()->json(PuntoInteres::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'ubicacionPuntoInteres' => 'sometimes|required|string|max:45',
            'imagenPuntoInteres' => 'sometimes|required|binary',
        ]);

        $puntoInteres = PuntoInteres::findOrFail($id);
        $puntoInteres->update($validatedData);

        return response()->json($puntoInteres);
    }

    public function destroy($id)
    {
        $puntoInteres = PuntoInteres::findOrFail($id);
        $puntoInteres->delete();

        return response()->json(null, 204);
    }
}