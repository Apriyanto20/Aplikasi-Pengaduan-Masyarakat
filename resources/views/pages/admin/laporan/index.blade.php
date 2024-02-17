@extends('layouts.layoutsadmin')
@section('content')
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Laporan Masuk</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3 float-right">
                                        <label for="selectFilter">Filter Berdasarkan status</label>
                                        <select name="selectFilter" id="select Filter" class="form form-control">
                                            <option value="">-- Filter Status --</option>
                                            @foreach ($dataMasuk as $item)
                                            <option value="{{ $item->id }}">{{ $item->status }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3 float-right">
                                        <label for="selectFilter">Filter Berdasarkan Kategori</label>
                                        <select name="selectFilter" id="select Filter" class="form form-control">
                                            <option value="">-- Filter Kategori --</option>
                                            @foreach ($dataKategori as $item)
                                            <option value="{{ $item->id }}">{{ $item->namacategory }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <table id="example5" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tanggal Pengaduan</th>
                                                    <th>Judul Pengaduan</th>
                                                    <th>Nama Pengadu</th>
                                                    <th>Kategori</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataMasuk as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->tanggalpengaduan }}</td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>{{ $item->user->name }}</td>
                                                    <td>{{ $item->kategoripengaduan->namacategory }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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

