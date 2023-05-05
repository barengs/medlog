<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriObatDataTable;
use App\Models\KategoriObat;
use Illuminate\Http\Request;

class KategoriObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KategoriObatDataTable $dataTable)
    {
        return $dataTable->render('pages.kategori.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kategori.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = KategoriObat::create([
            'nama' => $request->nama,
        ]);
        if ($save) {
            return redirect()->route('kategori.semua');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriObat $kategoriObat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriObat $kategoriObat, $id)
    {
        $data = KategoriObat::find($id);
        return view('pages.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = KategoriObat::findOrFail($id);

        $data->nama = $request->nama;
        $data->update();

        if ($data) {
            return redirect()->route('ketegori.semua');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoriObat $kategoriObat)
    {
        //
    }
}
