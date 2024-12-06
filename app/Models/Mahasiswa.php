<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Pastikan nama tabel sesuai dengan yang ada di database
    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'jurusan',
    ];
}
