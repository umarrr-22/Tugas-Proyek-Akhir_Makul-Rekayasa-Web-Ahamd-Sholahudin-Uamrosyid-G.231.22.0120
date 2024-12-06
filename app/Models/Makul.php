<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makul extends Model
{
    use HasFactory;

    // Menentukan nama tabel
    protected $table = 'makul';

    // Menentukan kolom yang bisa diisi
    protected $fillable = [
        'kode_makul',
        'name',
        'sks',
    ];
}
