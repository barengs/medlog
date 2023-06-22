<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Role::all();

        return view('pages.jabatan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.jabatan.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = Role::create([
            'name' => strtolower($request->nama),
        ]);

        if ($save) {
            toastr()->success('Data berhasil di simpan', 'Sukses');
            return redirect()->route('jabatan.semua');
        } else {
            toastr()->error('Data gagal di simpan', 'Info');
            return redirect()->route('jabatan.semua');
        }
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
        $data = Role::findOrFail($id);
        return view('pages.jabatan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Role::findOrFail($id);

        $data->nama = $request->nama;
        $data->update();

        if ($data) {
            toastr()->success('Data berhasil di ubah!');
            return redirect()->route('jabatan.semua');
        } else {
            toastr()->error('Gagal!', 'Perubahan data gagal, periksa kembali.');
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
