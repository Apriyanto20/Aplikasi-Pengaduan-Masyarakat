@extends('layouts.layoutsadmin')
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Masyarakat</span>
                        <a href="/masyarakat">
                        <span class="info-box-number">
                            {{ $Masyarakat }}
                        </span>
                        </a>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Kategori Pengaduan</span>
                        <span class="info-box-number">
                            {{ $Kategori }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-red elevation-1"><i class="fa fa-retweet"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Laporan Pengaduan</span>
                        <span class="info-box-number">
                            {{ $LaporanMasuk }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-green elevation-1"><i class="fa fa-envelope"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Laporan Baru</span>
                        <span class="info-box-number">
                            {{ $Terbaru }}
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Laporan Masuk
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tgl Pengaduan</th>
                                    <th>Judul Pengaduan</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</section>
@endsection
@section('js')
<script type="text/javascript">
const table = $('#example1').DataTable({
    "pageLength"    : 10,
    "lengthMenu"    : [
        [10, 25, 50, 100],
        [10, 25, 50, 100]
    ],
    "bLengthChange" : true,
    "bFilter"       : true,
    "bInfo"         : true,
    "processing"    : true,
    "bServerSide"   : true,
    ajax :{
        url : "{{ url('') }}/dataTableLaporan",
        type : "POST",
    },
    columnDefs: [{
        targets : "_all",
        visible : true,
    },
    {
        "targets"   : 0, //Untuk urutan data di dalam kolom
        "class"     : "text-nowrap",
        "render"    : function(data, type, row, meta){
            return row.id
        }
    },
    {
        "targets"   : 1, //Untuk urutan data di dalam kolom
        "class"     : "text-nowrap",
        "render"    : function(data, type, row, meta){
            return row.tanggalpengaduan
        }
    },
    {
        "targets"   : 2, //Untuk urutan data di dalam kolom
        "class"     : "text-nowrap",
        "render"    : function(data, type, row, meta){
            return row.judul
        }
    },
    {
        "targets"   : 3, //Untuk urutan data di dalam kolom
        "class"     : "text-nowrap",
        "render"    : function(data, type, row, meta){
            return row.name
        }
    },
    {
        "targets"   : 4, //Untuk urutan data di dalam kolom
        "class"     : "text-nowrap",
        "render"    : function(data, type, row, meta){
            return row.namacategory
        }
    },
]
})
</script>
@endsection


