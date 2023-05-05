<?php

namespace App\Http\Controllers;

use App\DataTables\ObatDataTable;
use App\Models\Obat;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ObatDataTable $dataTable)
    {
        $data = Obat::all();
        return $dataTable->render('pages.obat.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.obat.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = Obat::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'stok' => $request->stok,
            'kadaluwarsa' => Carbon::parse($request->kadaluwarsa)->format('Y/m/d'),
        ]);
        if ($input) {
            return redirect()->route('obat.semua');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        return view('pages.obat.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat, $id)
    {
        $data = Obat::find($id);
        // dd($data);
        return view('pages.obat.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Obat::findOrFail($id);
        // dd($data);

        $data->kode = $request->kode;
        $data->nama = $request->nama;
        $data->kadaluwarsa = Carbon::parse($request->kadaluwarsa)->format('Y/m/d');
        $data->stok = $request->stok;
        $data->keterangan = $request->keterangan;

        $data->update();

        if ($data) {
            return redirect()->route('obat.semua');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        //
    }
}
