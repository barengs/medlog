<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Carbon\Carbon;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('profile')->get();
        // $data = DB::table('user_profiles as us')
        //     ->join('users as u', 'u.id', '=', 'us.user_id')
        //     ->select('us.id', 'us.nama_depan', 'us.nama_belakang', 'us.jenis_kelamin', 'us.tempat_lahir', 'us.tanggal_lahir')
        //     ->get();
        return view('pages.karyawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jabatan = Position::all();
        return view('pages.karyawan.add', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // membuat akun baru
        $user = User::create([
            'name' => 'karyawan',
            'password' => bcrypt('password'),
            'email' => $request->email,
        ]);
        // membuat profil baru
        if ($user) {
            $profil = UserProfile::create([
                'user_id' => $user->id,
                'nama_depan' => $request->nama_depan,
                'nama_belakang' => $request->nama_belakang,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => Carbon::parse($request->tanggal_lahir)->format('Y/m/d'),
                'jenis_kelamin' => $request->jenis_kelamin,
                'no_handphone' => $request->no_handphone,
                'alamat' => $request->alamat,
                'no_ktp' => $request->no_ktp,
            ]);

            if ($profil) {
                return redirect()->route('karyawan.semua');
            } else {
                return back()->withInput();
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = User::with('profile')->where('id', $id)->first();
        if ($data) {
            return view('pages.karyawan.show', compact('data'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = User::with('profile')->where('id', $id)->first();
        if ($data) {
            return view('pages.karyawan.edit', compact('data'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $profil = UserProfile::findOrFail($id);
        $delUser = User::where('id', $profil->user_id)->delete();
        if ($delUser) {
            return response()->json([
                'success' => true,
                'message' => 'Hapus data Obat berhasil!',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Hapus data Obat Gagal!',
            ]);
        }
    }
}
