<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);
    
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422); // jika gagal, kembalikan error
        }
    
        // Buat pengguna baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    
        // Membuat token akses
        $token = $user->createToken('auth_token')->plainTextToken;
    
        // Mengembalikan response yang lebih mudah dibaca
        return response()->json([
            'data' => $user, // Mengirim data user
            'access_token' => $token, // Token akses
            'token_type' => 'Bearer' // Tipe token
        ], 201); // Menggunakan status code 201 Created
    }

    // Login
    public function login(Request $request)
    {
        // Validasi input login
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422); // Status 422 jika validasi gagal
        }

        // Cek kredensial
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401); // Unauthorized jika login gagal
        }

        // Ambil user dan buat token
        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200); // Status code 200 untuk OK
    }

    // Logout
    public function logout(Request $request)
    {
        // Hapus semua token user yang sedang aktif
        $user = Auth::user();
        $user->tokens->each(function ($token) {
            $token->delete();
        });

        return response()->json([
            'message' => 'Logout successful',
        ], 200); // Status code 200 untuk OK
    }
}
