<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'alamat',
        'no_wa',
        'foto',
        'status',
        'email',
        'password'
    ];

    protected $hidden = [
        'password'
    ];

    public function historyA()
    {
        return $this->hasMany(JadwalLapanganA::class);
    }
    public function historyB()
    {
        return $this->hasMany(JadwalLapanganB::class);
    }
}
