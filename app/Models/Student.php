<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    //

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tanggal_lahir',
        'tempat_lahir',
        'nis',
        'alamat',
        'angkatan',
        'foto'
    ];
}