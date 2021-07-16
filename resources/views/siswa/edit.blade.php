@extends('layouts.master')
@section('content')

    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
            <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
<div class="panel">
        <div class="panel-heading">
            <h1>Edit Data Siswa</h1>
        </div>
        <div class="panel-body">
            <form action="/siswa/{{$siswa->id}}/update" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="nama_depan" class="form-label">Nama Depan</label>
                    <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="emailHelp" value="{{$siswa->nama_depan}}" placeholder="Nama Depan">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                </div>

                <div class="mb-3">
                    <label for="nama_belakang" class="form-label">Nama Blekang</label>
                    <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="emailHelp" value="{{$siswa->nama_belakang}}">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                </div>

                <div class="mb-3 ">
                    <label for="jenis_kelamin" class="form-label">Pilih Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select form-control" aria-label="Default select example">
                        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki-Laki</option>
                        <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>

                    </select>
                </div>

                <div class="mb-3">
                    <label for="agama" class="form-label">Agama</label>
                    <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" value="{{$siswa->agama}}" >
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat"  class="form-control" rows="3" id="alamat" >{{$siswa->alamat}}</textarea>
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                </div>

                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
</div>

@stop
