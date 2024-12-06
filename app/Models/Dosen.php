<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'dosen';

    // Menentukan kolom yang bisa diisi
    protected $fillable = [
        'nidn',
        'name',
        'fakultas',
    ];
}
