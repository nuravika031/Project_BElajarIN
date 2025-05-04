<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama',
        'email',
        'password',
        'peran',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi: satu user bisa mengajar banyak kursus
    public function courses()
    {
        return $this->hasMany(Course::class, 'id_pengajar');
    }

    // Relasi: satu user bisa punya banyak pendaftaran
    public function registrations()
    {
        return $this->hasMany(Registration::class, 'id_pengguna');
    }

    // Relasi: satu user bisa punya banyak transaksi
    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_pengguna');
    }
}
