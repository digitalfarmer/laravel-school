@extends('layouts.master')
@section('content')
    @if(session('sukses'))
        <div class="alert alert-success" role="alert">
            {{session('sukses')}}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{session('error')}}
        </div>
    @endif
    <div class="panel panel-profile">
        <div class="clearfix">
            <!-- LEFT COLUMN -->
            <div class="profile-left">

                <!-- PROFILE HEADER -->
                <div class="profile-header">
                    <div class="overlay"></div>
                    <div class="profile-main">
                        <img src="{{$siswa->getAvatar()}}" class="img-circle" alt="Avatar">
                        <h3 class="name">{{$siswa->nama_depan}} {{$siswa->nama_belakang}}</h3>
                        <span class="online-status status-available">Available</span>
                    </div>
                    <div class="profile-stat">
                        <div class="row">
                            <div class="col-md-4 stat-item">
                                {{$siswa->mapel->count()}} <span>Mata Pelajaran</span>
                            </div>
                            <div class="col-md-4 stat-item">
                                15 <span>Awards</span>
                            </div>
                            <div class="col-md-4 stat-item">
                                2174 <span>Points</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PROFILE HEADER -->

                <!-- PROFILE DETAIL -->
                <div class="profile-detail">
                    <div class="profile-info">
                        <h4 class="heading">Biodata :</h4>
                        <ul class="list-unstyled list-justify">
                            <li>Jenis Kelamin <span>{{$siswa->jenis_kelamin}}</span></li>
                            <li>Agama <span>{{$siswa->agama}}</span></li>
                            <li>Alamat <span>{{$siswa->alamat}}</span></li>

                        </ul>
                    </div>

                    <div class="text-center"><a href="/siswa/{{$siswa->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
                </div>
                <!-- END PROFILE DETAIL -->
            </div>
            <!-- END LEFT COLUMN -->

            <!-- RIGHT COLUMN -->
            <div class="profile-right">

                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputNilai"><i class="fa fa-plus-circle"></i> Tambah Nilai </button>
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">Mata Pelajaran</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped">
                            <thead>
                            <tr><th>KODE</th><th>Nama</th><th>Semester</th><th>Nilai</th></tr>
                            </thead>
                            <tbody>
                            @foreach($siswa->mapel as $mapel)
                                <tr>
                                    <td>{{$mapel->kode}}</td>
                                    <td>{{$mapel->nama}}</td>
                                    <td>{{$mapel->semester}}</td>
                                    <td>{{$mapel->pivot->nilai}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- END RIGHT COLUMN -->
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="inputNilai" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/siswa/{{$siswa->id}}/addnilai" method="POST" >
                        {{csrf_field()}}

                        <div class="form-grou">
                            <label for="mapel">Mata Pelajaran</label>
                            <select name="mapel" class="form-control" id="mapel">
                                @foreach($matapelajaran as $mp)
                                    <option value="{{$mp->id}}">{{$mp->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nilai</label>
                            <input name="nilai" id="nilai" class="form-control"  placeholder="Nilai 1-100"/>
                        </div>

                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop
