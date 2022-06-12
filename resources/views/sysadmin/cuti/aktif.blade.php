@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Data Cuti Pegawai</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Administrator</a></li>
                        <li class="breadcrumb-item" aria-current="page">Master Data</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Cuti Aktif Pegawai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-12">
        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List Data Cuti Aktif Pegawai</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Induk</th>
                        <th>Nama</th>
                        <th>Tanggal Cuti</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($aktifs as $cuti)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $cuti->nip }}</td>
                        <td>{{ $cuti->nama }}</td>
                        <td>{{ date('d-M-Y', strtotime($cuti->tglCuti)) }}</td>
                        <td>{{ $cuti->note }}</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->         
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection