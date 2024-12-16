<?php
namespace App\Http\Controllers;

use App\Models\ComercioLocal;
use Illuminate\Http\Request;

class ComercioLocalController extends Controller
{
    public function index()
    {
        return response()->json(ComercioLocal::all());
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'localidadComercio' => 'required|string|max:15',
            'tipoComercio' => 'required|string|max:45',
            'ubicacionComercio' => 'required|string|max:45',
            'imagenComercio' => 'required|binary',
        ]);

        $comercioLocal = ComercioLocal::create($validatedData);

        return response()->json($comercioLocal, 201);
    }

    public function show($id)
    {
        return response()->json(ComercioLocal::findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'localidadComercio' => 'sometimes|required|string|max:15',
            'tipoComercio' => 'sometimes|required|string|max:45',
            'ubicacionComercio' => 'sometimes|required|string|max:45',
            'imagenComercio' => 'sometimes|required|binary',
        ]);

        $comercioLocal = ComercioLocal::findOrFail($id);
        $comercioLocal->update($validatedData);

        return response()->json($comercioLocal);
    }

    public function destroy($id)
    {
        $comercioLocal = ComercioLocal::findOrFail($id);
        $comercioLocal->delete();

        return response()->json(null, 204);
    }
}