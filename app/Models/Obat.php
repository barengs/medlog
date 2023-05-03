<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Obat extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['kode', 'nama', 'kadaluwarsa', 'keterangan', 'stok', 'kategori_obat_id'];

    public function kategori()
    {
        return $this->belongsTo(KategoriObat::class);
    }
}
