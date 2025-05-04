<?php

namespace App\Models;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = ['id_pengguna', 'id_kursus', 'tanggal_daftar'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_kursus');
    }
}

