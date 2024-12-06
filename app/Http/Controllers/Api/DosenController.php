<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // CREATE dosen
    public function create(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen',
            'name' => 'required',
            'fakultas' => 'required',
        ]);

        $dosen = Dosen::create($request->all());
        return response()->json($dosen, 201);
    }

    // READ all dosen
    public function read()
    {
        $dosen = Dosen::all();
        return response()->json($dosen);
    }

    // UPDATE dosen
    public function update(Request $request, $id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->update($request->all());
        return response()->json($dosen);
    }

    // DELETE dosen
    public function delete($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();
        return response()->json(null, 204);
    }
}
