@extends('layouts.layoutsuser')
@section('contentuser')
    <section class="inner-page">
        <div class="container table-responsive">
            <a href="/pengaduanku" class="btn btn-warning btn-md"> Kembali</a>
            <hr>
            <p>
            <div class="row">
                <form action="/pengaduanku" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="masyarakat_id" id="" value="{{ auth()->user()->id }}">

                    <div class="col-md-8">
                        <div class="form form-group">
                            <label for="judul">Judul Pengaduan</label>
                            <input type="text" name="judul" class="form form-control" id="judul">
                        </div>
                        <div class="form form-group mt-3">
                            <label for="kategori_id">Kategori Pengaduan</label>
                            <select type="text" name="kategori_id" class="form form-control" id="kategori_id">
                                @foreach ($dataKategori as $kategori)
                                <option value="">-- Pilih Kategori Pengaduan --</option>
                                <option value="{{ $kategori->id }}">{{ $kategori->namacategory }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form form-group mt-3">
                            <label for="isipengaduan">Isi Pengaduan</label>
                            <textarea name="isipengaduan" name="isipengaduan" class="form form-control" id="" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form form-group mt-3">
                            <label for="tanggalpengaduan">Tanggal Pengaduan</label>
                            <input type="date" name="tanggalpengaduan" id="" class="form-control mt-3">
                        </div>
                        <div class="form form-group mt-3">
                            <label for="gambar">Lampiran Foto Pengaduan</label> <br>
                            <input type="file" name="gambar[]" multiple="" id="gambar" class="form form-control"
                                accept="image">
                        </div>
                        <div class="form form-group mt-3">
                            <button type="submit" class="btn btn-success btn-md"> Simpan</button>
                        </div>
                    </input>
                </form>
            </div>
            </p>
        </div>
    </section>
@endsection
