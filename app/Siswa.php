<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $id='id';
    protected $table='siswa';
    protected $fillable=[
        'id',
        'user_id',
        'nama_depan',
        'nama_belakang',
        'jenis_kelamin',
        'agama',
        'alamat',
        'avatar'
    ];

    public function getAvatar(){
        if(!$this->avatar){
            return asset('images/avatar.png');
        }
        return asset('images/'.$this->avatar);
    }
}
