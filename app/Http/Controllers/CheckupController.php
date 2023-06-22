<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Obat;
use App\Models\Checkup;
use Illuminate\Http\Request;
use App\Models\KeluhanPasien;
use App\DataTables\CheckupsDataTable;
use App\Models\HasilDiagnosa;
use App\Models\Resep;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Checkup::with('pasien')->with('diagnosa')->get();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('no_pasien', function ($data) {
                    return $data->pasien->no_pasien;
                })
                ->addColumn('nama', function ($data) {
                    $nama_lengkap = $data->pasien->nama_depan . ' ' . $data->pasien->nama_belakang;
                    return $nama_lengkap;
                })
                ->addColumn('no_ktp', function ($data) {
                    return $data->pasien->no_ktp;
                })
                ->addColumn('diagnosa', function($data) {
                    return $data->diagnosa ? $data->diagnosa->diagnosa : '-';
                })
                ->addColumn('status', function ($data) {
                    $open = '<span class="badge bg-success">' . $data->status . '</span>';
                    $proses = '<span class="badge bg-warning">' . $data->status . '</span>';
                    $selesai = '<span class="badge bg-danger">' . $data->status . '</span>';
                    if ($data->status == 'open') {
                        return $open;
                    } else if ($data->status == 'proses') {
                        return $proses;
                    } else if ($data->status == 'selesai') {
                        return $selesai;
                    }
                })
                ->addColumn('action', function ($data) {
                    $show = '<a class="btn btn-sm btn-info icon-left" href="cetak/' . $data->id . '"><i class="ti-print"></i> Cetak Resep</a>';
                    if ($data->status === 'proses') {
                        return '<div class="btn-group">' . $show . '</div>';
                    }
                })
                ->rawColumns(['no_pasien', 'nama', 'no_ktp', 'status', 'action'])
                ->make(true);
        }
        return view('pages.checkup.index');
    }

    /**
     * listing the resource where status is open
     */
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $query = Checkup::with('pasien')->where('status', 'open')->get();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('no_pasien', function ($data) {
                    return $data->pasien->no_pasien;
                })
                ->addColumn('nama', function ($data) {
                    $nama_lengkap = $data->pasien->nama_depan . ' ' . $data->pasien->nama_belakang;
                    return $nama_lengkap;
                })
                ->addColumn('no_ktp', function ($data) {
                    return $data->pasien->no_ktp;
                })
                ->addColumn('status', function ($data) {
                    $open = '<span class="badge bg-primary">' . $data->status . '</span>';
                    $proses = '<span class="badge bg-warning">' . $data->status . '</span>';
                    if ($data->status == 'open') {
                        return $open;
                    } else if ($data->status == 'proses') {
                        return $proses;
                    }
                })
                ->addColumn('action', function ($data) {
                    $show = '<a class="btn btn-sm btn-info icon-left" href="proses/' . $data->id . '"><i class="ti-eye"></i> Proses</a>';

                    return '<div class="btn-group">' . $show . '</div>';
                })
                ->rawColumns(['no_pasien', 'nama', 'no_ktp', 'status', 'action'])
                ->make(true);
        }
        return view('pages.checkup.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('pages.checkup.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // buat nomor antrian baru
        $lastDate = Checkup::select('antrian', 'created_at')->latest()->first();
        // dd($lastDate);
        $dateNow = Carbon::now();
        if (!$lastDate) {
            $docnum = '001';
        }
        else if (date('dm', strtotime($lastDate->created_at)) === date('dm', strtotime($dateNow))){
            $docnum = $this->createNumber($lastDate->antrian);
        }
        else {
            $docnum = '001';
        }

        // dd($docnum);
        // simpan data
        $save = Checkup::create([
            'antrian' => $docnum,
            'user_id' => 1,
            'pasien_id' => $request->pasien_id,
        ]);

        if ($save) {
            if (count($request->keluhan) > 0) {
                foreach ($request->keluhan as $key => $value) {
                    $keluhan = array(
                        'checkup_id' => $save->id,
                        'keluhan' => $value,
                        'lama_keluhan' => $request->lama_keluhan[$key],
                        'satuan' => $request->satuan[$key],
                    );
                    KeluhanPasien::create($keluhan);
                }
            }
            toastr()->success('Data berhasil disimpan!');
            return redirect()->route('checkup.semua');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Checkup $checkup)
    {
        return view('pages.checkup.show');
    }

    public function resep($id)
    {
        $data = Resep::join('obats', 'obats.id', '=', 'reseps.obat_id')
            ->select('obats.nama', 'reseps.satuan', 'reseps.aturan')
            ->where('checkup_id', $id)
            ->get();
        // dd($data);
        return view('pages.checkup.resep', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Checkup::where('id', $id)->with('pasien')->with('keluhan')->with('diagnosa')->first();
        // $riwayat = Checkup::where('pasien_id', $data->pasien->id)->with('keluhan')->with('diagnosa')->get();
        // dd($data);
        // $riwayat = DB::table('keluhan_pasiens as kp')
        //     ->join('checkups as c', 'c.id', '=', 'kp.checkup_id')
        //     // ->join('hasil_diagnosas as hd', 'hd.checkup_id', '=', 'c.id')
        //     ->select('kp.checkup_id', 'kp.keluhan', 'kp.lama_keluhan', 'kp.satuan', 'kp.created_at')
        //     ->where('kp.checkup_id', $data->id)
        //     ->get();
        $obat = Obat::all();
        // dd($riwayat);
        return view('pages.checkup.antrian', compact(['data', 'obat']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $checkup = Checkup::findOrFail($id);
        $checkup->status = 'proses';
        $checkup->penanganan = $request->penanganan;
        $checkup->keterangan = $request->keterangan;

        if ($checkup->update() && count($request->obat) > 0) {
            foreach ($request->obat as $key => $value) {
                $dataResep = array(
                    'obat_id' => $value,
                    'checkup_id' => $id,
                    'aturan' => $request->dosis_obat[$key],
                    'satuan' => $request->satuan_obat[$key],
                );
                Resep::create($dataResep);
            }

            $diagnosa = HasilDiagnosa::create([
                'checkup_id' => $id,
                'diagnosa' => $request->diagnosa,
            ]);

            if ($diagnosa) {
                toastr()->success('Data berhasil disimpan!');
                return redirect()->route('periksa.semua');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkup $checkup)
    {
        //
    }

    public function createNumber($oldnum)
    {
        $newNumber = $oldnum + 1;
        return sprintf("%03d", $newNumber);
    }
}
