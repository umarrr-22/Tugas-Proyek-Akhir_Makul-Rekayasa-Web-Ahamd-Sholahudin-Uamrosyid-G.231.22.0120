<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    // CREATE makul
    public function create(Request $request)
    {
        $request->validate([
            'kode_makul' => 'required|unique:makul',
            'name' => 'required',
            'sks' => 'required|integer',
        ]);

        $makul = Makul::create($request->all());
        return response()->json($makul, 201);
    }

    // READ all makul
    public function read()
    {
        $makul = Makul::all();
        return response()->json($makul);
    }

    // UPDATE makul
    public function update(Request $request, $id)
    {
        $makul = Makul::findOrFail($id);
        $makul->update($request->all());
        return response()->json($makul);
    }

    // DELETE makul
    public function delete($id)
    {
        $makul = Makul::findOrFail($id);
        $makul->delete();
        return response()->json(null, 204);
    }
}
