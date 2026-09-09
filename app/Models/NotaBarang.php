<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NotaBarang extends Model
{
    protected $table = 'nota_barangs';

    protected $fillable = [
        'barang_id',
        'nota_id',
        'jumlah',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    public function nota()
    {
        return $this->belongsTo(Nota::class);
    }
}