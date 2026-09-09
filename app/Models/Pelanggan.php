<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';

    protected $fillable = [
        'nama',
        'usia',
        'alamat',
        'email',
        'telepon',
    ];

    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
}
