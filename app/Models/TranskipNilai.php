<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranskipNilai extends Model
{
    use HasFactory;

    protected $table = "transkip_nilai";
    protected $primaryKey = "transkip_nilai_id";
    protected $fillable = [
        "mahasiswa_id",
        "nilai_semester1",
        "nilai_semester2",
        "nilai_semester3",
        "nilai_semester4",
        "nilai_semester5",
        "nilai_semester6",
        "nilai_semester7",
        "nilai_semester8",
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}
