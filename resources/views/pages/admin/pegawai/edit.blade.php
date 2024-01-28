@extends('layouts.layoutsadmin')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Data Pegawai</h3>
                        <a href="/pegawai" class="btn float-right btn-outline-warning btn-md">
                            <li class="fa fa-undo"></li> Kembali
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                                <div class="card-tabs">
                                    <div class="card-header p-0 pt-1 border-bottom-0">
                                        <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="custom-tabs-three-home-tab"
                                                    data-toggle="pill" href="#custom-tabs-three-home" role="tab"
                                                    aria-controls="custom-tabs-three-home"
                                                    aria-selected="true">Detail Pegawai</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="custom-tabs-three-profile-tab"
                                                    data-toggle="pill" href="#custom-tabs-three-profile"
                                                    role="tab" aria-controls="custom-tabs-three-profile"
                                                    aria-selected="false">Ganti Password</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <form action="/pegawai/{{ $dataPegawai->id }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                        <div class="tab-content" id="custom-tabs-three-tabContent">
                                            <div class="tab-pane fade show active" id="custom-tabs-three-home"
                                                role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form form-group">
                                                        <label for="textNik">NIK</label>
                                                        <input type="text" name="textNik" id="textNik"
                                                            class="form form-control"
                                                            placeholder="Contoh : 320717XXXXXXX"  value="{{ $dataPegawai->nik }}" autocomplete="off">
                                                            @error('textNik')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                    </div>
                                                    <div class="form form-group">
                                                        <label for="textNama">Nama</label>
                                                        <input type="text" name="textNama" id="textNama"
                                                            class="form form-control"
                                                            placeholder="Nama Lengkap" value="{{ $dataPegawai->name }}" autocomplete="off">
                                                            @error('textNama')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                    </div>
                                                    <div class="form form-group">
                                                        <label for="selectJenisKelamin">Jenis Kelamin</label>
                                                        <select name="selectJenisKelamin"
                                                            id="selectJenisKelamin" class="form form-control">
                                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                                            <option value="Laki-laki" {{ $dataPegawai->jenis_kelamin == 'Laki-laki' ? 'selected':'' }}>Laki-laki</option>
                                                            <option value="Perempuan" {{ $dataPegawai->jenis_kelamin == 'Perempuan' ? 'selected':'' }}>Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="form form-group">
                                                        <label for="textNoTelepon">No Telepon</label>
                                                        <input type="text" class="form form-control"
                                                            id="textNoTelepon" placeholder="contoh : +627788788787" value="{{ $dataPegawai->notelepon }}" autocomplete="off">
                                                            @error('textNoTelepon')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="form form-group">
                                                        <label for="textAlamat">Alamat</label>
                                                        <textarea name="textAlamat" id="textAlamat" cols="30"
                                                            rows="1" class="form form-control" placeholder="Alamat Lengkap" autocomplete="off">{{ $dataPegawai->alamat }}</textarea>
                                                            @error('textAlamat')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                    </div>

                                                    <div class="form form-group">
                                                        <label for="selectJabatan">Jabatan</label>
                                                        <select name="selectJabatan" id="selectJabatan"
                                                            class="form form-control">
                                                            <option value="">-- Pilih Jabatan --</option>
                                                            <option value="Petugas" {{ $dataPegawai->role == 'Petugas' ? 'selected':'' }}>Petugas</option>
                                                        </select>
                                                    </div>
                                                    <div class="form form-group">
                                                        <label for="textEmail">Email</label>
                                                        <input type="email" name="textEmail"
                                                            class="form form-control" id="textEmail" placeholder="contoh : apm@gmail.com" value="{{ $dataPegawai->email }}" autocomplete="off">
                                                            @error('textEmail')
                                                                <small class="text-danger">{{ $message }}</small>
                                                            @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-sm-12">
                                                    <button type="submit"
                                                        class="btn btn-success btn-md">
                                                        <li class="fa fa-save"></li> Simpan
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="custom-tabs-three-profile"
                                                role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                                <div class="col-md-6 col-xs-6">
                                                    <div class="form form-group">
                                                        <label for="textPassword">New Password</label>
                                                        <input type="password" name="textPassword"
                                                            class="form form-control" id="textPassword">
                                                    </div>
                                                    <div class="form form-group">
                                                        <label for="textNewPassword">Confirm Password</label>
                                                        <input type="password" name="textNewPassword"
                                                            class="form form-control" id="textNewPassword">
                                                    </div>
                                                    <div class="form form-group">
                                                        <a href="pegawai.html" class="btn btn-success btn-md"><li class="fa fa-save"></li> Ubah Password</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.card -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection
