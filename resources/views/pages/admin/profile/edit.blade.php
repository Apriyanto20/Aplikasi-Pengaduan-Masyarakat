@extends('layouts.layoutsadmin')
@section('content')
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Data Pegawai</h3>
                                <a href="pegawai.html" class="btn float-right btn-outline-warning btn-md">
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
                                                <form action="/profile{{ $dataAdmin->id }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                                    <div class="tab-pane fade show active" id="custom-tabs-three-home"
                                                        role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                                        <div class="col-md-6 col-sm-6">
                                                            <div class="form form-group">
                                                                <label for="textNik">NIK</label>
                                                                <input type="text" name="textNik" value="{{ $dataAdmin->nik }}" id="textNik"
                                                                    class="form form-control"
                                                                    placeholder="Contoh : 320717XXXXXXX">
                                                                    @error('textNik')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                            </div>
                                                            <div class="form form-group">
                                                                <label for="textNama">Nama</label>
                                                                <input type="text" name="textNama" value="{{ $dataAdmin->name }}" id="textNama"
                                                                    class="form form-control"
                                                                    placeholder="Nama Lengkap">
                                                                    @error('textNik')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                            </div>
                                                            <div class="form form-group">
                                                                <label for="selectJenisKelamin">Jenis Kelamin</label>
                                                                <select name="selectJenisKelamin" id="selectJenisKelamin"
                                                                    class="form form-control">
                                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                                    <option value="Laki-laki"{{ $dataAdmin->jenis_kelamin == 'Laki-laki' ? 'selected':'' }}>Laki-laki</option>
                                                                    <option value="Perempuan"{{ $dataAdmin->jenis_kelamin == 'Perempuan' ? 'selected':'' }}>Perempuan</option>
                                                                </select>
                                                            </div>
                                                            <div class="form form-group">
                                                                <label for="textNoTelepon">No Telepon</label>
                                                                <input type="text" name="textNoTelepon" value="{{ $dataAdmin->notelepon }}" class="form form-control"
                                                                    id="textNoTelepon"
                                                                    placeholder="contoh : +627788788787">
                                                                    @error('textNik')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                            <div class="form form-group">
                                                                <label for="textAlamat">Alamat</label>
                                                                <input name="textAlamat" value="{{ $dataAdmin->alamat }}" id="textAlamat" cols="30"
                                                                    rows="1" class="form form-control"
                                                                    placeholder="Alamat Lengkap">
                                                                    @error('textNik')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                            </div>

                                                            {{-- <div class="form form-group">
                                                                <label for="selectJabatan">Jabatan</label>
                                                                <select name="selectJabatan" id="selectJabatan"
                                                                    class="form form-control">
                                                                    <option value="">-- Pilih Jabatan --</option>
                                                                    <option value="Admin">Admin</option>
                                                                    <option value="Petugas">Petugas</option>
                                                                </select>
                                                            </div> --}}
                                                            <div class="form form-group">
                                                                <label for="textEmail">Email</label>
                                                                <input type="email" name="textEmail" value="{{ $dataAdmin->email }}"
                                                                    class="form form-control" id="textEmail"
                                                                    placeholder="contoh : apm@gmail.com">
                                                                    @error('textNik')
                                                                    <small class="text-danger">{{ $message }}</small>
                                                                    @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 col-sm-12">
                                                            <button type="submit" class="btn btn-success btn-md">
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
                                                                <a href="pegawai.html" class="btn btn-success btn-md">
                                                                    <li class="fa fa-save"></li> Ubah Password
                                                                </a>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </form>
                                                </div>
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
@endsection
