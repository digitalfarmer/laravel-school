<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table ='mapel';
    protected $fillable = [
        'kode',
        'nama',
        'semeter'
    ];


    public function siswa(){
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai']);
    }
}
