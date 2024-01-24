@extends('layouts.layoutsadmin')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pegawai</h3>
                        <a href="/pegawai/create" class="btn float-right btn-outline-secondary btn-md">
                            <li class="fa fa-plus"></li> Add Data Pegawai
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIK</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataPegawai as $pegawai)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pegawai->nik }}</td>
                                    <td>{{ $pegawai->name }}</td>
                                    <td>{{ $pegawai->role }}</td>
                                    <td>
                                        <a href="/pegawai/{{ $pegawai->id }}/edit" class="btn btn-warning btn-xs"
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
    <!-- /.content -->

@endsection
