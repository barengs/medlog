<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resep extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['obat_id', 'checkup_id', 'aturan', 'satuan'];

    public function obat()
    {
        return $this->hasMany(Obat::class);
    }

    public function checkup()
    {
        return $this->hasMany(Checkup::class);
    }
}
