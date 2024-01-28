@extends('layouts.layoutsadmin')
@section('content')
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Kategori</h3>
                                <a href="kategori-add.html" class="btn float-right btn-outline-secondary btn-md">
                                    <li class="fa fa-plus"></li> Add Data Kategori
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form action="/kategori/{{ $dataKategori->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                <div class="col-md-6">
                                    <div class="form form-group">
                                        <label for="textNamaKategori">Nama Kategori</label>
                                        <input type="text" name="textNamaKategori" id="textNamaKategori" class="form form-control" value="{{ $dataKategori->namacategory }}" autofocus autocomplete="off">
                                        @error('textNamaKategori')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form form-group">
                                        <label for="textDeskripsi">Deskripsi</label>
                                        <input type="text" name="textDeskripsi" id="textDeskripsi" class="form form-control"  value="{{ $dataKategori->deskripsi }}" autocomplete="off">
                                        @error('textDeskripsi')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="form form-group">
                                        <button type="submit" class="btn btn-success btn-md"><li class="fa fa-save"></li> Simpan</button>
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
