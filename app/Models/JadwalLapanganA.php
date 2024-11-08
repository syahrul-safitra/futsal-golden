<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLapanganA extends Model
{
    use HasFactory;

    protected $fillable = [
        'waktu_mulai',
        'waktu_akhir',
        'status_booking',
        'status_pembayaran',
        'member_id',
        'keterangan',
        'kode_booking',
        'bukti_pembayaran',
        'harga'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
