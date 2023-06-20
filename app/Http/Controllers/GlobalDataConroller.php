<?php

namespace App\Http\Controllers;

use App\Models\Checkup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GlobalDataConroller extends Controller
{
    /**
     * ambil jumlah data pasien berdasarkan bulan
     */
    public function pasien()
    {
        $data = Checkup::select(DB::raw("COUNT(id) as total"), DB::raw("(DATE_FORMAT(created_at, '%m')) as bulan"))
            ->orderBy('created_at')
            ->groupBy('bulan')
            ->get();

        return response()->json($data);
    }
}
