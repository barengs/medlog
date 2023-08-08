<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Checkup;
use Illuminate\Http\Request;
use App\Models\KeluhanPasien;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PasienFrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landing.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('landing.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'no_ktp' => 'required',
            'nama_depan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        /** CEK APA ADA DATA untuk membuat nomor anggota */
        $lastData = DB::table('pasiens')->latest()->first();
        if ($lastData->no_pasien) {
            $noPasien = $this->createNumber($lastData->no_pasien);
        } else {
            $noPasien = 'P001' . date('mY', strtotime(Carbon::now()));
        }
        /** cek nomor ktp dulu */
        $cekKTP = Pasien::where('no_ktp', $request->no_ktp)->get();
        // dd($cekKTP);
        if (!$cekKTP) {
            toastr()->warning('Perigatan', 'Nomor KTP sudah terdaftar');
            return back()->withInput();
        } else {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            if ($user) {
                $save = Pasien::create([
                    'user_id' => $user->id,
                    'no_pasien' => $noPasien,
                    'nama_depan' => $request->nama_depan,
                    'nama_belakang' => $request->nama_belakang,
                    'no_ktp' => $request->no_ktp,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'alamat' => $request->alamat,
                    'tempat_lahir' => $request->tempat_lahir,
                    'tanggal_lahir' => Carbon::parse($request->tanggal_lahir)->format('Y/m/d'),
                    'no_hp' => $request->no_hp,
                    'nama_kerabat' => $request->nama_kerabat,
                    'jenis_kelamin_kerabat' => $request->jenis_kelamin_kerabat,
                    'no_kontak_kerabat' => $request->no_kontak_kerabat,
                ]);
                /**
                 * atur user sebagai pengguna biasa
                 */
                $user->assignRole('user');
    
                if ($save) {
                    toastr()->success('Info', "Pendaftaran peserta berhasil, lanjut masuk");
                    return redirect()->route('user.login');
                }
            } else {
                toastr()->warning('Peringatan', 'Gagal mendaftar, pastikan isian benar dan terhubung ke internet');
                return back()->withInput();
            }

        }

    }

    /**
     * user login
     */

    /**
     * Display the specified resource.
     */
    public function show()
    {
        if (!Auth::user())
        {
            return redirect()->route('user.login');
        } else {
            $data = Pasien::where('user_id',auth()->user()->id)->first();
        }

        $checkup = Checkup::where('pasien_id', $data->id)->first();
        // dd($data);
        return view('landing.profil', compact(['data', 'checkup']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('user.login');
    }

    /**
     * Panggil form antrian
     */
    public function ticket()
    {
        $pasien = Pasien::where('user_id', auth()->user()->id)->first();
        // ambil data antrian yang di buat hari ini.
        $checkup = Checkup::where('pasien_id', $pasien->id)->whereDate('created_at', Carbon::today())->first();
        // dd($checkup);
        return view('landing.ticket', compact(['pasien', 'checkup']));
    }

    public function cetakTicket()
    {
        $pasien = Pasien::where('user_id', auth()->user()->id)->first();
        // ambil data antrian yang di buat hari ini.
        $data = Checkup::where('pasien_id', $pasien->id)->whereDate('created_at', Carbon::today())->first();
        Pdf::setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        $pdf = PDF::loadView('landing.cetak_ticket', ['data' => $data, 'pasien' => $pasien]);

        return $pdf->download('ticket-' . $data->antrian . '.pdf');
    }

    /**
     * Buat antrian baru
     */
    public function antrian(Request $request)
    {
        if (!Auth::check()){
            return redirect()->route('user.login');
        }
        // buat nomor antrian baru
        $lastDate = Checkup::select('antrian', 'created_at')->latest()->first();
        // dd($lastDate);
        $dateNow = Carbon::now();
        if (!$lastDate) {
            $docnum = '001';
        }
        else if (date('dm', strtotime($lastDate->created_at)) === date('dm', strtotime($dateNow))){
            $docnum = $this->createAntrian($lastDate->antrian);
        }
        else {
            $docnum = '001';
        }

        // dd($docnum);
        // simpan data
        $save = Checkup::create([
            'antrian' => $docnum,
            'user_id' => auth()->user()->id,
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
            return redirect()->route('user.ticket');
        }
    }

    /**
     * Membuat nomor dokumen
     */
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

    public function createAntrian($oldnum)
    {
        $newNumber = $oldnum + 1;
        return sprintf("%03d", $newNumber);
    }
}
