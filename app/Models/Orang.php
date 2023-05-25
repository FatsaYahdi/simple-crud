<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'kelas',
        'jenis_kelamin',
    ];
}
