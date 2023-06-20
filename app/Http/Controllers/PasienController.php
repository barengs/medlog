<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use App\DataTables\PasienDataTable;
use App\Models\Checkup;
use App\Models\KeluhanPasien;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Pasien::all();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('nama_lengkap', function ($q) {
                    return $q->nama_depan . ' ' . $q->nama_belakang;
                })
                ->addColumn('action', function ($data) {
                    $show = '<a class="btn btn-sm btn-info icon-left" href="lihat/' . $data->id . '"><i class="ti-eye"></i> Riwayat Medis</a>';
                    $edit = '<a class="btn btn-sm btn-warning icon-left" href="ubah/' . $data->id . '"><i class="ti-pencil-alt"></i> Ubah</a>';

                    return '<div class="btn-group">' . $show . $edit . '</div>';
                })
                ->rawColumns(['nama_lengkap', 'action'])
                ->make(true);
        }
        return view('pages.pasien.index');
        // $data = Pasien::all();
        // return $dataTable->render('pages.pasien.index');
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

        // dd($noPasien);

        $save = Pasien::create([
            'no_pasien' => $noPasien,
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_ktp' => $request->no_ktp,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => Carbon::parse($request->tanggal_lahir)->format('Y/m/d'),
            'nama_kerabat' => $request->nama_kerabat,
            'jenis_kelamin_kerabat' => $request->jenis_kelamin_kerabat,
            'no_kontak_kerabat' => $request->no_kontak_kerabat,
        ]);

        if ($save) {
            toastr()->success('Info', 'Data berhasil disimpan!');
            return redirect()->route('pasien.semua');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Pasien::findOrFail($id);
        $riwayat = DB::table('keluhan_pasiens as kp')
            ->join('checkups as c', 'c.id', '=', 'kp.checkup_id')
            // ->join('hasil_diagnosas as hd', 'hd.checkup_id', '=', 'c.id')
            ->select('kp.checkup_id', 'kp.keluhan', 'kp.lama_keluhan', 'kp.satuan', 'kp.created_at')
            ->where('c.pasien_id', $data->id)
            ->get();
        return view('pages.pasien.show', compact(['data', 'riwayat']));
    }

    /**
     * Cari pasien berdasarkan nomor KTP atau Anggota
     */
    public function cari($id)
    {
        $data = Pasien::where('no_ktp', $id)->orWhere('no_pasien', $id)->first();
        if ($data) {
            $check = Checkup::where('pasien_id', $data->id)->first();
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
    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        if ($pasien) {
            $pasien->nama_depan = $request->nama_depan;
            $pasien->nama_belakang = $request->nama_belakang;
            $pasien->tempat_lahir = $request->tempat_lahir;
            $pasien->tanggal_lahir = Carbon::parse($request->tanggal_lahir)->format('Y/m/d');
            $pasien->jenis_kelamin = $request->jenis_kelamin;
            $pasien->alamat = $request->alamat;
            $pasien->no_hp = $request->no_handphone;
            $pasien->email = $request->email;
            $pasien->nama_kerabat = $request->nama_famili;
            $pasien->jenis_kelamin_kerabat = $request->jenis_kelamin_famili;
            $pasien->no_kontak_kerabat = $request->kontak_famili;

            if ($pasien->update()) {
                toastr()->success('Data berhasil ubah!');
                return redirect()->route('pasien.semua');
            } else {
                toastr()->error('Gagal!', 'Data gagal diubah!');
                return redirect()->route('pasien.semua');
            }
        }
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

        $newNum = $oldnum + 1;
        $docnum = 'P' . sprintf("%03d", $newNum);

        // ambil tanggal sekarang
        $monthYear = date('mY', strtotime(Carbon::now()));
        $newDocNum = $docnum . $monthYear;
        return $newDocNum;
    }
}
