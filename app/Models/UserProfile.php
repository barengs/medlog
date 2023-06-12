<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'nama_depan', 'nama_belakang', 'tempat_lahir', 'alamat', 'tanggal_lahir', 'no_ktp', 'no_handphone', 'foto'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
