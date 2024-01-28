@extends('layouts.layoutsadmin')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Kategori</h3>
                        <a href="/kategori/create" class="btn float-right btn-outline-secondary btn-md">
                            <li class="fa fa-plus"></li> Add Data Kategori
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataKategori as $kategori)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kategori->namacategory }}</td>
                                    <td>{{ $kategori->deskripsi }}</td>
                                    <td>
                                        <a href="/kategori/1/edit" class="btn btn-warning btn-xs"
                                            title="Edit Masyarakat">
                                            <li class="fa fa-edit"></li>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
