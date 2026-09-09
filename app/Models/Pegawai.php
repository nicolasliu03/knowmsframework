<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';

    protected $fillable = [
        'nama',
        'usia',
        'email',
        'telepon',
        'alamat',
    ];

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}