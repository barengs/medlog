<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HasilDiagnosa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['checkup_id', 'diagnosa'];

    public function checkup()
    {
        return $this->belongsTo(Checkup::class);
    }
}
