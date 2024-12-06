<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // CREATE mahasiswa
    public function create(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json($mahasiswa, 201);
    }

    // READ all mahasiswa
    public function read()
    {
        $mahasiswa = Mahasiswa::all();
        return response()->json($mahasiswa);
    }

    // UPDATE mahasiswa
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return response()->json($mahasiswa);
    }

    // DELETE mahasiswa
    public function delete($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return response()->json(null, 204);
    }
}
