<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['id_pengguna', 'id_kursus', 'status_pembayaran', 'jumlah'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }

    public function course()
    {
        return $this->belongsTo(Course::class, 'id_kursus');
    }
}

