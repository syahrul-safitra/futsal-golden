<?php

namespace App\Http\Controllers;

use App\Models\Galery;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index()
    {
        return view('admin.galery.index', [
            'data' => Galery::first()->get()
        ]);
    }

    public function change(Request $request, Galery $data)
    {
        $request->validate([
            'gambar' => 'required',
            'file' => 'required|max:1200'
        ]);


        $file = $request->file('file');

        if ($request->gambar == 'gambar1') {
            $fileLama = $data->gambar1;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar1 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar2') {
            $fileLama = $data->gambar2;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar2 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar3') {
            $fileLama = $data->gambar3;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar3 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar4') {
            $fileLama = $data->gambar4;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar4 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar5') {
            $fileLama = $data->gambar5;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar5 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar6') {
            $fileLama = $data->gambar6;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar6 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar7') {
            $fileLama = $data->gambar7;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar7 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar7') {
            $fileLama = $data->gambar7;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar7 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar8') {
            $fileLama = $data->gambar8;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar8 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar10') {
            $fileLama = $data->gambar9;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar9 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar10') {
            $fileLama = $data->gambar10;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar10 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar11') {
            $fileLama = $data->gambar11;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar11 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar12') {
            $fileLama = $data->gambar12;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar12 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar13') {
            $fileLama = $data->gambar13;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar13 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar14') {
            $fileLama = $data->gambar14;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar14 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        if ($request->gambar == 'gambar15') {
            $fileLama = $data->gambar15;
            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $data->gambar15 = $rename;
            $data->save();

            $file->move('img', $rename);
            File::delete('img/' . $fileLama);
        }

        return back()->with('success', 'Berhasil merubah gambar');


    }
}
