@extends('layouts.master')
@section('content')
    <div class="row">
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
       {{session('sukses')}}
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="panel">

    <div class="panel-heading">
        <h1 class="panel-title">Daftar Siswa</h1>
        <div class="right">
            <!-- Button trigger modal -->
            <button type="button" class="btn" data-toggle="modal" data-target="#inputSiswa"><i class="fa fa-plus-circle"></i> Input </button>
        </div>
    </div>
        <div class="panel-body">
            <table class="table table-hover table-striped">
                <thead>
                <tr>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Agama</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data_siswa as $siswa)
                    <tr>
                        <td><a href="/siswa/{{$siswa->id}}/profile">
                            {{$siswa->nama_depan}}</a></td>
                        <td><a href="/siswa/{{$siswa->id}}/profile">
                            {{$siswa->nama_belakang}}</a></td>
                        <td>{{$siswa->agama}}</td>
                        <td>{{$siswa->jenis_kelamin}}</td>
                        <td>{{$siswa->alamat}}</td>
                        <td>
                            <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">
                                <i class="bi-pencil"></i>
                            </a>
                            <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Mau di hapus ? ')">
                                <i class="bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>




<!-- Modal -->
<div class="modal fade" id="inputSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/siswa/create" method="POST">
                    {{ csrf_field() }}
                    <div class="mb-3 form-group {{$errors->has('nama_depan') ? 'has-error':''}}">
                        <label for="nama_depan" class="form-label">Nama Depan</label>
                        <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('nama_depan')}}">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        @if($errors->has('nama_depan'))
                            <span class="help-block">{{$errors->first('nama_depan')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="nama_belakang" class="form-label">Nama Blekang</label>
                        <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('nama_belakang')}}">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    </div>

                    <div class="mb-3 form-group {{$errors->has('email') ? 'has-error':''}}">
                        <label for="email" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="user@gmail.com" value="{{old('email')}}">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                        @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Pilih Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select form-control" aria-label="Default select example">
                            <option value="L" {{(old('jenis_kelamin')== 'L') ? 'selected' : ''}}>Laki-Laki</option>
                            <option value="P" {{(old('jenis_kelamin')== 'P') ? 'selected' : ''}}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama / Kepercayaan" value="{{old('agama')}}">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" id="alamat">{{old('alamat')}}</textarea>
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    </div>

                    <div class="form-group mb-3">
                        <label for="avatar">Avatar</label>
                        <input type="file" name="avatar" class="form-control"/>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@stop

