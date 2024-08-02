<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = 'tb_surat_masuk';
    protected $fillable = [
        'nomor_surat',
        'pengirim',
        'perihal',
        'tujuan_surat',
        'lampiran',
        'tanggal_surat'
    ];
}
