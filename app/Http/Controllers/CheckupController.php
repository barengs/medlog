<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use Illuminate\Http\Request;

class CheckupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.checkup.index');
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
    public function show(Checkup $checkup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Checkup $checkup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Checkup $checkup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Checkup $checkup)
    {
        //
    }
}
