<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $table = 'notas';

    protected $fillable = [
        'tanggal',
        'total',
        'pegawai_id',
        'pelanggan_id',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function notaBarangs()
    {
        return $this->hasMany(NotaBarang::class);
    }
}