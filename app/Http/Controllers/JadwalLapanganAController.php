<?php

namespace App\Http\Controllers;

use App\Models\JadwalLapanganA;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use Codedge\Fpdf\Fpdf\Fpdf;
class JadwalLapanganAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return JadwalLapanganA::latest()->get();
        return view('admin.sewa.index', [
            'data' => JadwalLapanganA::with('member')->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = [
            'member_id' => $request->member_id,
            'waktu_mulai' => $request->waktu_awal,
            'waktu_akhir' => $request->waktu_akhir,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga
        ];


        $file = $request->file('bukti_pembayaran');

        $rename = uniqid() . '_' . $file->getClientOriginalName();

        $data['bukti_pembayaran'] = $rename;

        JadwalLapanganA::create($data);

        $file->move('bukti_pembayaran', $rename);

        return redirect('/field_a')->with('success', 'Berhasil booking lapangan, silahkan tunggu beberapa saat karena admin sedang memverifikasi data!');


    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalLapanganA $jadwalLapanganA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalLapanganA $jadwalLapanganA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JadwalLapanganA $jadwalLapanganA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalLapanganA $data)
    {
        if ($data->kode_booking) {
            JadwalLapanganA::where('kode_booking', '=', $data->kode_booking)->delete();

            File::delete('bukti_pembayaran/' . $data->bukti_pembayaran);
            $data->delete();

            return back()->with('success', 'Berhasil menghapus data!');
        }

        File::delete('bukti_pembayaran/' . $data->bukti_pembayaran);
        $data->delete();

        return back()->with('success', 'Berhasil menghapus data!');
    }

    public function bayar($tanggal, $jam, $akunId)
    {
        $dataMember = Member::find($akunId);

        $mergeTime = date('Y-m-d', strtotime($tanggal)) . ' ' . $jam;
        $checkData = JadwalLapanganA::where('waktu_mulai', '=', $mergeTime)->first();

        if ($checkData) {
            return redirect('field_a')->with('error', 'Maaf lapangan telah di pesan oleh orang lain!');
        }

        $satuJamKedepan = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($mergeTime)));


        return view('member.pembayaran', [
            'dataCostumer' => $dataMember,
            'waktuAwal' => $mergeTime,
            'waktuAkhir' => $satuJamKedepan
        ]);
    }

    public function lihatJadwal()
    {

        // x = Ambil tanggal hari ini hingga 6 hari kedepan : 
        // Setelah mendapatkan x, maka kita akan kalkulasikan secara kotor : {
        // - kita akan looping tanggalX[0] = jamMulai - jamSelesai; 
        // }

        $tanggal1 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));

        $tanggal2 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal2->modify('+1 day');

        $tanggal3 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal3->modify('+2 day');

        $tanggal4 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal4->modify('+3 day');

        $tanggal5 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal5->modify('+4 day');

        $tanggal6 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal6->modify('+5 day');

        $dataTanggal1 = JadwalLapanganA::whereDate('waktu_mulai', '=', $tanggal1->format('Y-m-d'))->get();
        $dataTanggal2 = JadwalLapanganA::whereDate('waktu_mulai', '=', $tanggal2->format('Y-m-d'))->get();
        $dataTanggal3 = JadwalLapanganA::whereDate('waktu_mulai', '=', $tanggal3->format('Y-m-d'))->get();
        $dataTanggal4 = JadwalLapanganA::whereDate('waktu_mulai', '=', $tanggal4->format('Y-m-d'))->get();
        $dataTanggal5 = JadwalLapanganA::whereDate('waktu_mulai', '=', $tanggal5->format('Y-m-d'))->get();
        $dataTanggal6 = JadwalLapanganA::whereDate('waktu_mulai', '=', $tanggal6->format('Y-m-d'))->get();

        $jamMain = ['09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00', '19:00:00', '20:00:00', '21:00:00', '22:00:00'];


        // return $dataTanggal1;
        // $allTanggal =  

        // return date('H', strtotime($jamMain[0]));

        // return $jamMain[8];

        // return $dataTanggal1->where('waktu_mulai', '=', $tanggal1->format('Y-m-d' . ' ' . $jamMain[8]));
        return view('member.lapanganA', [
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
            'tanggal3' => $tanggal3,
            'tanggal4' => $tanggal4,
            'tanggal5' => $tanggal5,
            'tanggal6' => $tanggal6,
            'dataTanggal1' => $dataTanggal1,
            'dataTanggal2' => $dataTanggal2,
            'dataTanggal3' => $dataTanggal3,
            'dataTanggal4' => $dataTanggal4,
            'dataTanggal5' => $dataTanggal5,
            'dataTanggal6' => $dataTanggal6,
            'jamMain' => $jamMain
        ]);
    }

    public function konfirmasi(JadwalLapanganA $data)
    {
        $data->status_booking = 'booked';
        $data->status_pembayaran = 'sudah_dikonfirmasi';
        $data->save();

        return back()->with('success', 'Berhasil mengkonfirmasi pembayaran!');
    }

    public function bayarEvent($tanggal, $akun)
    {
        $dataMember = Member::find($akun);


        $checkTimeTomorow1 = date('Y-m-d', strtotime('+1 day', strtotime($tanggal))) . ' ' . '09:00:00';
        $checkTimeTomorow2 = date('Y-m-d', strtotime('+1 day', strtotime($tanggal))) . ' ' . '19:00:00';

        $tanggalAwal = date('Y-m-d', strtotime($tanggal));
        $tangalAkhir = date('Y-m-d', strtotime('+1 day', strtotime($tanggal)));

        $checkAvailibe = JadwalLapanganA::whereBetween('waktu_mulai', [$checkTimeTomorow1, $checkTimeTomorow2])->get();

        if ($checkAvailibe->isNotEmpty()) {
            return back()->with('error', 'Maaf untuk tanggal yang dipilih sudah ada jadwal orang lain!');
        }
        return view('member.pembayaranAEvent', [
            'waktuAwal' => $tanggalAwal,
            'waktuAkhir' => $tangalAkhir,
            'dataCostumer' => $dataMember,
            'harga' => 2500000
        ]);
    }

    public function changeBukti(JadwalLapanganA $data, Request $request)
    {

        $request->validate([
            'bukti_pembayaran' => 'required|max:1200'
        ]);

        if ($data->kode_booking) {
            $kode = $data->kode_booking;

            $file = $request->file('bukti_pembayaran');

            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $namaFileLama = $data->bukti_pembayaran;

            JadwalLapanganA::where('kode_booking', '=', $kode)->update([
                'bukti_pembayaran' => $rename
            ]);

            $file->move('bukti_pembayaran', $rename);

            File::delete('bukti_pembayaran/' . $namaFileLama);

            return back()->with('success', 'Berhasil mengedit bukti pembayaran.');
        }

        $file = $request->file('bukti_pembayaran');

        $rename = uniqid() . '_' . $file->getClientOriginalName();

        $namaFileLama = $data->bukti_pembayaran;

        $data->bukti_pembayaran = $rename;

        $data->save();

        $file->move('bukti_pembayaran', $rename);

        File::delete('bukti_pembayaran/' . $namaFileLama);

        return back()->with('success', 'Berhasil mengedit bukti pembayaran.');

    }

    public function jadwalEvent()
    {

        $tanggal1 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));

        $tanggal2 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal2->modify('+1 day');

        $tanggal3 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal3->modify('+2 day');

        $tanggal4 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal4->modify('+3 day');

        $tanggal5 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal5->modify('+4 day');

        $tanggal6 = new \DateTime('NOW', new \DateTimeZone('Asia/Jakarta'));
        $tanggal6->modify('+5 day');

        $dataTanggal1 = JadwalLapanganA::whereBetween('waktu_mulai', [$tanggal1->format('Y-m-d 09:00:00'), $tanggal1->format('Y-m-d 19:00:00')])->get();
        $dataTanggal2 = JadwalLapanganA::whereBetween('waktu_mulai', [$tanggal2->format('Y-m-d 09:00:00'), $tanggal2->format('Y-m-d 19:00:00')])->get();
        $dataTanggal3 = JadwalLapanganA::whereBetween('waktu_mulai', [$tanggal3->format('Y-m-d 09:00:00'), $tanggal3->format('Y-m-d 19:00:00')])->get();
        $dataTanggal4 = JadwalLapanganA::whereBetween('waktu_mulai', [$tanggal4->format('Y-m-d 09:00:00'), $tanggal4->format('Y-m-d 19:00:00')])->get();
        $dataTanggal5 = JadwalLapanganA::whereBetween('waktu_mulai', [$tanggal5->format('Y-m-d 09:00:00'), $tanggal5->format('Y-m-d 19:00:00')])->get();
        $dataTanggal6 = JadwalLapanganA::whereBetween('waktu_mulai', [$tanggal6->format('Y-m-d 09:00:00'), $tanggal6->format('Y-m-d 19:00:00')])->get();

        return view('member.lapanganAEvent', [
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
            'tanggal3' => $tanggal3,
            'tanggal4' => $tanggal4,
            'tanggal5' => $tanggal5,
            'tanggal6' => $tanggal6,
            'dataTanggal1' => $dataTanggal1,
            'dataTanggal2' => $dataTanggal2,
            'dataTanggal3' => $dataTanggal3,
            'dataTanggal4' => $dataTanggal4,
            'dataTanggal5' => $dataTanggal5,
            'dataTanggal6' => $dataTanggal6,
        ]);
    }

    public function storeEvent(Request $request)
    {
        $jamMain = ['09:00:00', '10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00', '18:00:00',];

        $validated = $request->validate([
            'member_id' => 'required',
            'waktu_mulai' => 'required',
            'waktu_akhir' => 'required',
            'keterangan' => 'max:150',
            'harga' => 'required',
            'bukti_pembayaran' => 'required|max:1200'
        ]);

        $validated['kode_booking'] = uniqid();

        $file = $request->file('bukti_pembayaran');

        $rename = uniqid() . '_' . $file->getClientOriginalName();

        $validated['bukti_pembayaran'] = $rename;

        $file->move('bukti_pembayaran', $rename);

        DB::beginTransaction();
        try {
            foreach ($jamMain as $waktu) {

                // Data untuk tanggal 1
                $data = [
                    'member_id' => $validated['member_id'],
                    'keterangan' => 'TOURNAMENT: ' . $validated['keterangan'],
                    'harga' => $validated['harga'],
                    'bukti_pembayaran' => $validated['bukti_pembayaran'],
                    'kode_booking' => $validated['kode_booking']
                ];

                $data['waktu_mulai'] = $validated['waktu_mulai'] . ' ' . $waktu;
                $data['waktu_akhir'] = date('Y-m-d H:i:s', strtotime('+1 hour', strtotime($data['waktu_mulai'])));

                // Tanggal 1
                JadwalLapanganA::create($data);

                // Tanggal 2
                $tanggal2Awal = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($data['waktu_mulai'])));
                $tanggal2Akhir = date('Y-m-d H:i:s', strtotime('+1 day', strtotime($data['waktu_akhir'])));

                $data['waktu_mulai'] = $tanggal2Awal;
                $data['waktu_akhir'] = $tanggal2Akhir;

                // Tanggal 2
                JadwalLapanganA::create($data);

            }
        } catch (\Exception $e) {
            DB::rollBack();
            // return $e;
            return redirect('sewa-for-event-a')->with('error', 'Boking jadwal untuk turnament failed!, Silahkan hubungi admin untuk informasi lebih lanjut');

        }
        DB::commit();

        return redirect('sewa-for-event-a')->with('success', 'Berhasil booking lapangan untuk turnament, tunggu beberapa saat untuk konformasi booking dari admin.');
    }

    public function laporan(Request $request)
    {
        $data = JadwalLapanganA::with('member')->whereBetween('waktu_mulai', [$request->tanggal_awal, $request->tanggal_akhir])->get();

        // Buat instance PDF
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('Arial', 'B', 12);

        // Header
        $pdf->Cell(0, 5, 'LAPANGAN FUTSAL GOLDEN', 0, 1, 'C');
        $pdf->Cell(0, 5, 'JAMBI', 0, 1, 'C');

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(0, 5, 'Kenali Besar, Kec. Kota Baru, Kota Jambi, Jambi 36361', 0, 1, 'C');
        $pdf->Line(10, $pdf->GetY() + 2, 200, $pdf->GetY() + 2);
        $pdf->Ln(5);
        // Header tabel
        $pdf->Cell(10, 10, 'No', 1);
        $pdf->Cell(30, 10, 'Nama Customer', 1);
        $pdf->Cell(25, 10, 'Nomor WA', 1);
        $pdf->Cell(25, 10, 'Waktu Mulai', 1);
        $pdf->Cell(25, 10, 'Waktu Akhir', 1);
        $pdf->Cell(25, 10, 'Status', 1);
        $pdf->Cell(25, 10, 'Tipe Lapangan', 1);
        $pdf->Cell(25, 10, 'Harga', 1);
        $pdf->Ln();

        // Data tabel
        $pdf->SetFont('Arial', '', 7);

        // Contoh data
        // $data = [
        //     ['id' => 1, 'nama_customer' => 'cahyo pujo suwoko', 'email' => 'cahyops@gmail.com', 'nomor_wa' => '08123456789', 'waktu_mulai' => '12-12-2024', 'waktu_akhir' => '12-12-2024', 'status' => '12-12-2024', 'tipe_lapangan' => 'sahrul', 'harga' => '100,000'],
        // ];


        // Loop melalui data dan tambahkan ke tabel
        foreach ($data as $index => $row) {
            $nama = $row->member->nama_lengkap;
            $no_wa = $row->member->no_wa;
            $tanggalAwal = date('d-m-Y H:i', strtotime($row['waktu_mulai']));
            $tanggalAkhir = date('d-m-Y H:i', strtotime($row['waktu_akhir']));
            $no = $index + 1;
            $pdf->Cell(10, 10, $no, 1);
            $pdf->Cell(30, 10, $nama, 1);
            $pdf->Cell(25, 10, $no_wa, 1);
            $pdf->Cell(25, 10, $tanggalAwal, 1);
            $pdf->Cell(25, 10, $tanggalAkhir, 1);
            $pdf->Cell(25, 10, $row['status_booking'], 1);
            $pdf->Cell(25, 10, "Lapangan Matras", 1);
            $pdf->Cell(25, 10, $row['harga'], 1);
            $pdf->Ln();
        }

        $pdf->Output();
        exit;
        // Output PDF
    }

}
