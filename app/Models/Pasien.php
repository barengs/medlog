<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id','no_pasien', 'nama_depan', 'nama_belakang', 'jenis_kelamin', 'no_ktp', 'alamat', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'village_id', 'nama_kerabat', 'jenis_kelamin_kerabat', 'no_kontak_kerabat'];

    public function checkup()
    {
        return $this->hasOne(Checkup::class);
    }
}
