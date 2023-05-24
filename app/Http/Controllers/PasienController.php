<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\DataTables\PasienDataTable;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PasienDataTable $dataTable)
    {
        $data = Pasien::all();
        return $dataTable->render('pages.pasien.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pasien.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'no_ktp' => 'required',
            'nama_depan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ]);

        $lastData = DB::table('pasiens')->latest()->first();
        $noPasien = $lastData->no_pasien;

        $save = Pasien::create([
            'no_pasien' => $this->createNumber($noPasien),
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_ktp' => $request->no_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
        ]);

        if ($save) {
            return redirect()->route('pasien.semua');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pasien $pasien)
    {
        return view('pages.pasien.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pasien $pasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pasien $pasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pasien $pasien)
    {
        //
    }

    public function createNumber($lastNumber)
    {
        //potong 4 karakter pertama
        $startNum = substr($lastNumber, 4);
        //ambil 3 karakter setelah karakter pertama
        $codeStr = substr($startNum, 1, 3);

        function getNumber($val)
        {
            if (is_numeric($val)) {
                return $val + 0;
            }
            return 0;
        }

        // buat nomor baru
        $newNum = getNumber($codeStr) + 1;

        // ambil tanggal sekarang
        $monthYear = date('mY', strtotime(Carbon::now()));
        $newDocNum = 'P' . $newNum . $monthYear;
        return $newDocNum;
    }
}
