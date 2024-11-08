<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.member.index', [
            'members' => Member::latest()->get()
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
        $validated = $request->validate([
            'nama_lengkap' => 'required|max:30',
            'alamat' => 'required|max:100',
            'no_wa' => 'required|max:15|min:10|unique:members',
            'foto' => 'required|max:1200',
            'status' => 'required',
            'email' => 'required|max:20|unique:members|unique:users',
            'password' => 'required|max:10'
        ]);

        $file = $request->file('foto');

        $rename = uniqid() . '_' . $file->getClientOriginalName();

        $location = 'foto_member';

        $file->move($location, $rename);

        $validated['foto'] = $rename;
        $validated['password'] = bcrypt($request->password);

        Member::create($validated);

        return back()->with('success', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Member $member)
    {
        return view('admin.member.edit', [
            'member' => $member
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
    {
        $rules = [
            'nama_lengkap' => 'required|max:30',
            'alamat' => 'required|max:100',
            'password' => 'required|max:10',
            'foto' => 'max:1200',
            'status' => 'required'
        ];

        if ($request->email != $member->email) {
            $rules['email'] = 'required|max:20|unique:members|unique:users';
        }

        if ($request->no_wa != $member->no_wa) {
            $rules['no_wa'] = 'required|max:15|min:10|unique:members';
        }


        $validated = $request->validate($rules);

        if ($request->file('foto')) {
            $file = $request->file('foto');

            $rename = uniqid() . '_' . $file->getClientOriginalName();

            $validated['foto'] = $rename;
            File::delete('foto_member/' . $member->foto);
            $file->move('foto_member', $rename);
        }

        $validated['password'] = bcrypt($request->password);

        $member->update($validated);

        return redirect('members')->with('success', 'Berhasil merubah data member!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        File::delete('foto_member/' . $member->foto);

        $member->delete();

        return back()->with('success', 'Berhasil menghapus data member');
    }

    public function history(Member $data)
    {

        return view('member.history', [
            'data' => $data->load(['historyA', 'historyB'])
        ]);
        // return $data->load(['historyA', 'historyB']);
    }

    public function changePwAdmin(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|max:10'
        ]);

        $admin = User::first();
        $admin->password = bcrypt($validated['password']);
        $admin->save();
        return back()->with('success', 'Berhasil merubah password admin!');
    }
}
