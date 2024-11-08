<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GaleryController;
use App\Http\Controllers\JadwalLapanganAController;
use App\Http\Controllers\JadwalLapanganBController;
use App\Http\Controllers\MemberController;
use App\Models\Galery;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('member.index', [
        'data' => Galery::first()
    ]);
})->middleware('member_guest');

Route::get('admin', function () {
    return view('admin.layouts.main');
});

// Route::middleware(['auth', 'second'])->group(function () {

// });

Route::post('register', [MemberController::class, 'store'])->middleware('guest');

Route::post('logout', [AuthenticationController::class, 'logout']);
Route::get('login', [AuthenticationController::class, 'login'])->name('login')->middleware('guestt');
Route::post('login', [AuthenticationController::class, 'authenticate'])->middleware('guestt');
Route::get('register', [AuthenticationController::class, 'register'])->middleware('guestt');

Route::resource('members', MemberController::class)->middleware('auth:user');

Route::resource('jadwal-lapangan-a', JadwalLapanganAController::class)->middleware('auth:user');
Route::resource('jadwal-lapangan-b', JadwalLapanganBController::class)->middleware('auth:user');

Route::get('admin', function () {
    return Auth::guard('user')->check();
});

Route::get('member', function () {
    return Auth::guard('member')->check();
});

Route::get('anggota', function () {
    return Auth::guard('member')->user();
});

// Route::resource('lapangan_a', JadwalLapanganAController::class)->middleware('auth:user');

Route::get('field_a', [JadwalLapanganAController::class, 'lihatJadwal'])->middleware('auth:member');
Route::post('field_a', [JadwalLapanganAController::class, 'store'])->middleware('member_guest');

Route::get('field_b', [JadwalLapanganBController::class, 'lihatJadwal'])->middleware('auth:member');
Route::post('field_b', [JadwalLapanganBController::class, 'store'])->middleware('member_guest');

// Route::get('pembayaran/{tanggal}/{jam}/{akunId}', function ($tanggal, $jam, $akunId) {

//     // return $tanggal;
//     $dataMember = Member::find($akunId);

//     $mergeTime = date('Y-m-d', strtotime($tanggal)) . ' ' . $jam;
//     $checkData = JadwalLapanganA::where('waktu_mulai', '=', $mergeTime)->first();

//     if ($checkData) {
//         return redirect('field_a')->with('error', 'Maaf lapangan telah di pesan oleh orang lain!');
//     }

//     $satuJamKedepan = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($mergeTime)));


//     return view('member.pembayaran', [
//         'dataCostumer' => $dataMember,
//         'waktuAwal' => $mergeTime,
//         'waktuAkhir' => $satuJamKedepan
//     ]);
// });
Route::get('pembayaran/{tanggal}/{jam}/{akunId}', [JadwalLapanganAController::class, 'bayar'])->middleware('auth:member');



// Route::get('pembayaran2/{tanggal}/{jam}/{akunId}', function ($tanggal, $jam, $akunId) {

//     // return $tanggal;
//     $dataMember = Member::find($akunId);

//     $mergeTime = date('Y-m-d', strtotime($tanggal)) . ' ' . $jam;
//     $checkData = JadwalLapanganB::where('waktu_mulai', '=', $mergeTime)->first();

//     if ($checkData) {
//         return redirect('field_a')->with('error', 'Maaf lapangan telah di pesan oleh orang lain!');
//     }

//     $satuJamKedepan = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($mergeTime)));

//     return view('member.pembayaran2', [
//         'dataCostumer' => $dataMember,
//         'waktuAwal' => $mergeTime,
//         'waktuAkhir' => $satuJamKedepan
//     ]);
// });

Route::get('pembayaran2/{tanggal}/{jam}/{akunId}', [JadwalLapanganBController::class, 'bayar'])->middleware('auth:member');

Route::post('konfirmasi-pembayaran/{data}', [JadwalLapanganAController::class, 'konfirmasi'])->middleware('auth:user');
Route::post('change-bukti/{data}', [JadwalLapanganAController::class, 'changeBukti'])->middleware('auth:user');
Route::post('delete-data-jadwal/{data}', [JadwalLapanganAController::class, 'destroy'])->middleware('auth:user');
Route::post('delete-data-jadwalb/{data}', [JadwalLapanganBController::class, 'destroy'])->middleware('auth:user');

Route::get('sewa-for-event-a', [JadwalLapanganAController::class, 'jadwalEvent'])->middleware('auth:member');
Route::get('sewa-for-event-b', [JadwalLapanganBController::class, 'jadwalEvent'])->middleware('auth:member');

Route::post('konfirmasi-pembayaran2/{data}', [JadwalLapanganBController::class, 'konfirmasi'])->middleware('auth:user');
Route::post('change-bukti2/{data}', [JadwalLapanganBController::class, 'changeBukti'])->middleware('auth:user');



// Route::get('event-pembayaran-a/{tanggal}/{akun}', function ($tanggal, $akun) {

//     $dataMember = Member::find($akun);


//     $checkTimeTomorow1 = date('Y-m-d', strtotime('+1 day', strtotime($tanggal))) . ' ' . '09:00:00';
//     $checkTimeTomorow2 = date('Y-m-d', strtotime('+1 day', strtotime($tanggal))) . ' ' . '19:00:00';

//     $tanggalAwal = date('Y-m-d', strtotime($tanggal));
//     $tangalAkhir = date('Y-m-d', strtotime('+1 day', strtotime($tanggal)));

//     $checkAvailibe = JadwalLapanganA::whereBetween('waktu_mulai', [$checkTimeTomorow1, $checkTimeTomorow2])->get();

//     if ($checkAvailibe->isNotEmpty()) {
//         return back()->with('error', 'Maaf untuk tanggal yang dipilih sudah ada jadwal orang lain!');
//     }
//     return view('member.pembayaranAEvent', [
//         'waktuAwal' => $tanggalAwal,
//         'waktuAkhir' => $tangalAkhir,
//         'dataCostumer' => $dataMember,
//         'harga' => 2500000
//     ]);
// });

// Event Pembayaran B
// Route::get('event-pembayaran-b/{tanggal}/{akun}', function ($tanggal, $akun) {

//     $dataMember = Member::find($akun);

//     $checkTimeTomorow1 = date('Y-m-d', strtotime('+1 day', strtotime($tanggal))) . ' ' . '09:00:00';
//     $checkTimeTomorow2 = date('Y-m-d', strtotime('+1 day', strtotime($tanggal))) . ' ' . '19:00:00';

//     $tanggalAwal = date('Y-m-d', strtotime($tanggal));
//     $tangalAkhir = date('Y-m-d', strtotime('+1 day', strtotime($tanggal)));

//     $checkAvailibe = JadwalLapanganB::whereBetween('waktu_mulai', [$checkTimeTomorow1, $checkTimeTomorow2])->get();

//     if ($checkAvailibe->isNotEmpty()) {
//         return back()->with('error', 'Maaf untuk tanggal yang dipilih sudah ada jadwal orang lain!');
//     }

//     return view('member.pembayaranBEvent', [
//         'waktuAwal' => $tanggalAwal,
//         'waktuAkhir' => $tangalAkhir,
//         'dataCostumer' => $dataMember,
//         'harga' => 2500000
//     ]);
// });
// Event Pembayaran B
Route::get('event-pembayaran-a/{tanggal}/{akun}', [JadwalLapanganAController::class, 'bayarEvent'])->middleware('auth:member');
Route::get('event-pembayaran-b/{tanggal}/{akun}', [JadwalLapanganBController::class, 'bayarEvent'])->middleware('auth:member');



Route::post('field_a-event', [JadwalLapanganAController::class, 'storeEvent'])->middleware('auth:member');
Route::post('field_b-event', [JadwalLapanganBController::class, 'storeEvent'])->middleware('auth:member');

Route::get('history/{data}', [MemberController::class, 'history'])->middleware('auth:member');

Route::post('laporan-a', [JadwalLapanganAController::class, 'laporan'])->middleware('auth:user');
Route::post('laporan-b', [JadwalLapanganBController::class, 'laporan'])->middleware('auth:user');

Route::post('change-pw-admin', [MemberController::class, 'changePwAdmin'])->middleware('auth:user');

Route::get('galery', [GaleryController::class, 'index'])->middleware('auth:user');

Route::post('change-gambar/{data}', [GaleryController::class, 'change'])->middleware('auth:user');

Route::get('profile', function () {
    return view('profile');
});

Route::get('contact', function () {
    return view('contact');
});

Route::get('lihat-galeri', function () {

    return view('galery', [
        'data' => Galery::first()
    ]);
});