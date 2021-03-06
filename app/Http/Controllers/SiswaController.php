<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\User;
use App\Mapel;

class SiswaController extends Controller
{
    //fungsi get all siswa
    public function index(Request $request){
        if($request->has('cari')){
            $data_siswa= Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_siswa =Siswa::all();
        }
        return view('siswa.index',['data_siswa'=>$data_siswa]);
    }
    //fungsi create siswa
    public function create(Request $request){
        $this->validate($request,[
            'nama_depan'=>'required|min:4',
            'email'=>'required|email|unique:users'
        ]);

        //create user
        $user = new User();
        $user->role='siswa';
        $user->name=$request->nama_depan;
        $user->email=$request->email;
        $user->password= bcrypt('password');
        $user->remember_token= str_random(60);
        $user->save();

        //create siswa
        $request->request->add(['user_id'=>$user->id]);
        $siswa =Siswa::create($request->all());

        return redirect('/siswa')->with('sukses','Data Berhasil di inpur');
    }
    //fungsi edit siswa
    public function edit($id){
        $siswa= Siswa::find($id);
        return view('siswa.edit',['siswa'=>$siswa]);
    }
    //fungsi update siswa after edit
    public function update(Request $request , $id){
        $siswa= Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar=$request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data Berhasil di Update');
    }
    //function delete
    public function delete($id){
        $siswa= Siswa::find($id);
        $siswa->delete($siswa);
        return redirect('/siswa')->with('sukses','Data Berhasil di Hapus');

    }
    //create profile siswa
    public function profile($id){
        $siswa= Siswa::find($id);
        $matapelajaran = Mapel::all();
        return view('siswa.profile',['siswa'=>$siswa,'matapelajaran'=>$matapelajaran]);
    }

    //add nilai
    public function addnilai(Request $request, $idsiswa){
        $siswa= Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id', $request->mapel)->exists()){

            return redirect('siswa/'.$idsiswa.'/profile')->with('error','Mata Pelajaran Sudah ada');
        }
        $siswa->mapel()->attach($request->mapel,['nilai'=>$request->nilai]);
        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','nilai berhasil di masukan');
    }
}
