<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi', 'id_pengajar'];

    public function pengajar()
    {
        return $this->belongsTo(User::class, 'id_pengajar');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'id_kursus');
    }

    public function registrations()
    {
        return $this->hasMany(Registration::class, 'id_kursus');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_kursus');
    }
}
