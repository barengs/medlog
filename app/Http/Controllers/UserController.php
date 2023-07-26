<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Auth::user();
        $data = User::where('id', auth()->user()->id)->with('roles')->first();
        $profil = UserProfile::where('id', $data->id)->with('user')->first();
        // dd($profil);
        return view('pages.profile.show', compact(['data', 'profil']));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $user = Auth::user();
        $data = UserProfile::where('user_id', $id)->with('user')->first();
        // dd($data);
        return view('pages.profile.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $profile = UserProfile::where('id', $id)->first();

        $profile->nama_depan = $request->nama_depan;
        $profile->nama_belakang = $request->nama_belakang;
        $profile->tempat_lahir = $request->tempat_lahir;
        $profile->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y/m/d');
        $profile->jenis_kelamin = $request->jenis_kelamin;
        $profile->no_handphone = $request->no_handphone;
        $profile->alamat = $request->alamat;
        $profile->no_ktp = $request->no_ktp;

        if ($profile->update())
        {
            toastr()->success('Data berhasil diubah!');

            return redirect()->route('user.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function reset($id)
    {
        $data = User::findOrFail($id);
        return view('pages.profile.reset', compact('data'));
    }
}
