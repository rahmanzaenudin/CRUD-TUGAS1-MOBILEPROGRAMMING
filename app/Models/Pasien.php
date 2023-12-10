<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = "Pasien";
    protected $fillable = ['nomor_rm', 'nama', 'tanggal_lahir', 'nomor_telepon', 'alamat'];
}
