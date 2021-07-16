@extends('layouts.master')
@section('content')
    @if(session('sukses'))
    <div class="alert alert-success" role="alert">
       {{session('sukses')}}
        <button type="button" class="btn-close " data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="row">
    <div class="col-6">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm my-5" data-bs-toggle="modal" data-bs-target="#inputSiswa">
            Add
        </button>

    </div>
    <div class="col-6">
        <h1>Daftar Siswa</h1>
    </div>

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
                <td> {{$siswa->nama_depan}}</td>
                <td>{{$siswa->nama_belakang}}</td>
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
                    <div class="mb-3">
                        <label for="nama_depan" class="form-label">Nama Depan</label>
                        <input name="nama_depan" type="text" class="form-control" id="nama_depan" aria-describedby="emailHelp" placeholder="Nama Depan">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    </div>

                    <div class="mb-3">
                        <label for="nama_belakang" class="form-label">Nama Blekang</label>
                        <input name="nama_belakang" type="text" class="form-control" id="nama_belakang" aria-describedby="emailHelp" placeholder="Nama Belakang">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    </div>

                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Pilih Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>

                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="agama" class="form-label">Agama</label>
                        <input name="agama" type="text" class="form-control" id="agama" aria-describedby="emailHelp" placeholder="Agama / Kepercayaan">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3" id="alamat"></textarea>
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>--}}
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

