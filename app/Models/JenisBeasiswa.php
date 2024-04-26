<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBeasiswa extends Model
{
    use HasFactory;
    protected $table = "jenis_beasiswa";
    protected $primaryKey = "jenis_beasiswa_id";
    protected $fillable = [
        "jenis_beasiswa",
        "keterangan",
        "openAt",
        "endAt",
    ];
}
