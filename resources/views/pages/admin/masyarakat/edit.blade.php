@extends('layouts.layoutsadmin')
@section('content')
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Form Edit Data Masyarakat</h3>
                                <a href="/masyarakat" class="btn float-right btn-outline-warning btn-md">
                                    <li class="fa fa-undo"></li> Kembali
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/masyarakat/{{ $dataMasyarakat->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form form-group">
                                            <label for="textNik">NIK</label>
                                            <input type="text" name="textNik" id="textNik" class="form form-control"
                                                placeholder="Contoh : 320717XXXXXXX" value="{{ $dataMasyarakat->nik }}" autocomplete="off">
                                                @error('textNik')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="form form-group">
                                            <label for="textNama">Nama</label>
                                            <input type="text" name="textNama" id="textNama" class="form form-control"
                                                placeholder="Nama Lengkap" value="{{ $dataMasyarakat->name }}" autocomplete="off">
                                                @error('textNama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="form form-group">
                                            <label for="selectJenisKelamin">Jenis Kelamin</label>
                                            <select name="selectJenisKelamin" id="selectJenisKelamin"
                                                class="form form-control">
                                                <option value="">-- Pilih Jenis Kelamin --</option>
                                                <option value="Laki-laki"{{ $dataMasyarakat->jenis_kelamin == 'Laki-laki' ? 'selected':'' }}>Laki-laki</option>
                                                <option value="Perempuan"{{ $dataMasyarakat->jenis_kelamin == 'Perempuan' ? 'selected':'' }}>Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form form-group">
                                            <label for="textNoTelepon">No Telepon</label>
                                            <input type="text" name="textNoTelepon" autocomplete="off" class="form form-control" id="textNoTelepon" value="{{ $dataMasyarakat->notelepon }}" autocomplete="off">
                                                @error('textNoTelepon')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form form-group">
                                            <label for="textAlamat">Alamat</label>
                                            <textarea name="textAlamat" id="textAlamat" cols="30" rows="1"
                                                class="form form-control" autocomplete="off">{{ $dataMasyarakat->alamat }}</textarea>
                                                @error('textNama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="form form-group">
                                            <label for="textEmail">Email</label>
                                            <input type="email" name="textEmail" class="form form-control"
                                                id="textEmail" autocomplete="off" value="{{ $dataMasyarakat->email }}">
                                                @error('textNama')
                                                <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                        <div class="form form-group">
                                            <label for="textPassword">Password</label>
                                            <input type="password" name="textPassword" class="form form-control"
                                                id="textPassword" autocomplete="off">
                                                @error('textNama')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12">
                                        <button type="submit" class="btn btn-success btn-md float-right"><li class="fa fa-save"></li> Simpan</button>
                                    </div>
                                </div>
                            </form>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
@endsection
