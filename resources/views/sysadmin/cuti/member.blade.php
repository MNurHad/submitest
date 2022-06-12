@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="page-title">Data Pegawai</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i> Administrator</a></li>
                        <li class="breadcrumb-item" aria-current="page">Data Pegawai</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pegawai Terlama</li>
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
            <h3 class="box-title">List Pegawai Terlama</h3>
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
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Join</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($members as $employee)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $employee->nip }}</td>
                            <td>{{ $employee->nama_employee }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ date('d-M-Y', strtotime($employee->birthdate)) }}</td>
                            <td>{{ date('d-M-Y', strtotime($employee->join_date)) }}</td>
                            @if ( $employee->status == "AKTIF")
                            <td><span class="badge badge-success">AKTIF</span></td>
                            @else
                            <td><span class="badge badge-danger">TIDAK AKTIF</span></td>
                            @endif
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