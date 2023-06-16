<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Checkup extends Model
{
    use HasFactory;

    protected $fillable = ['antrian', 'user_id', 'pasien_id', 'penanganan', 'keterangan', 'status'];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function keluhan()
    {
        return $this->hasMany(KeluhanPasien::class);
    }

    public function diagnosa()
    {
        return $this->hasOne(HasilDiagnosa::class);
    }
}
