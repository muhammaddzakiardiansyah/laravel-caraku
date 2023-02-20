<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students',
              $fillable = ['image', 'nama', 'kelas', 'jurusan', 'alamat_rumah', 'email'];
}
