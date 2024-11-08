<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalLapanganB extends Model
{
    use HasFactory;

    protected $fillable = [
        'waktu_mulai',
        'waktu_akhir',
        'status_booking',
        'kode_booking',
        'status_pembayaran',
        'member_id',
        'keterangan',
        'bukti_pembayaran',
        'harga'
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }

}
