<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['no_pasien', 'nama_depan', 'nama_belakang', 'no_ktp', 'alamat', 'no_hp', 'village_id'];
}
