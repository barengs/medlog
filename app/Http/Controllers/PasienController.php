<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\DataTables\PasienDataTable;
use App\Models\Checkup;
use App\Models\KeluhanPasien;
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
        if ($lastData->no_pasien) {
            $noPasien = $this->createNumber($lastData->no_pasien);
        } else {
            $noPasien = 'P001' . date('mY', strtotime(Carbon::now()));
        }

        // dd($request->all());

        $save = Pasien::create([
            'no_pasien' => $noPasien,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_ktp' => $request->no_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'nama_kerabat' => $request->nama_kerabat,
            'jenis_kelamin_kerabat' => $request->jenis_kelamin_kerabat,
            'no_kontak_kerabat' => $request->no_kontak_kerabat,
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
     * Cari pasien berdasarkan nomor KTP atau Anggota
     */
    public function cari($id)
    {
        $data = Pasien::where('no_ktp', $id)->orWhere('no_pasien', $id)->first();
        $check = Checkup::where('pasien_id', $data->id)->first();
        if ($data) {
            $riwayat = DB::table('keluhan_pasiens as kp')
                ->join('checkups as c', 'c.id', '=', 'kp.checkup_id')
                // ->join('hasil_diagnosas as hd', 'hd.checkup_id', '=', 'c.id')
                ->select('kp.checkup_id', 'kp.keluhan', 'kp.lama_keluhan', 'kp.satuan', 'kp.created_at')
                ->where('c.pasien_id', $data->id)
                ->get();

            if ($riwayat) {
                return response()->json(['status' => true, 'pasien' => $data, 'checkup' => $check, 'riwayat' => $riwayat]);
            }
        } else {
            return response()->json([
                'status' => false,
                'message' => 'data tidak ditemukan'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Pasien::findOrFail($id);

        if ($data) {
            return view('pages.pasien.edit', compact('data'));
        }
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
        // $startNum = substr($lastNumber, 4);
        //ambil 3 karakter setelah karakter pertama
        $oldnum = substr($lastNumber, 1, 3);

        $newNum = substr($oldnum, 1, 3);
        $docnum = 'P' . sprintf("%03d", $newNum + 1);

        // ambil tanggal sekarang
        $monthYear = date('mY', strtotime(Carbon::now()));
        $newDocNum = $docnum . $monthYear;
        return $newDocNum;
    }
}
