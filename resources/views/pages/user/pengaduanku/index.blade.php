@extends('layouts.layoutsuser')
@section('contentuser')
<section class="inner-page">
    <div class="container table-responsive">
      <a href="/pengaduanmasuk/create" class="btn btn-success btn-md"> Buat Pengaduan</a>
      <hr>
      <p>
        <table class="table table-responsive table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul Pengaduan</th>
              <th>Kategori</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($dataPengaduanku as $pengaduan)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pengaduan->judul }}</td>
              <td>{{ $pengaduan->kategoripengaduan->namacategory }}</td>
              <td>{{ $pengaduan->status }}</td>
              <td><a href="user-detail-pengaduanku.html" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </p>
    </div>
  </section>
@endsection
