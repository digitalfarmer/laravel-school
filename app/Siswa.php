<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $id='id';
    protected $table='siswa';
    protected $fillable=[
        'id',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'agama',
        'alamat'
    ];
}
