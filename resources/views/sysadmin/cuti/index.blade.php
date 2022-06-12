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
                        <li class="breadcrumb-item active" aria-current="page">Data Cuti Pegawai</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
	  
<section class="content">
    <!-- Basic Forms -->
    <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Tambah Data Cuti Pegawai</h4>
            <h6 class="box-subtitle">Penambahan Data Cuti Pegawai</h6>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form novalidate method="POST" action="{{ route('cuti.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-6">						
                                <div class="form-group">
                                    <h5>Nomor Induk Pegawai <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="nomor" class="form-control" required data-validation-required-message="This field is required">
                                            <option value="">- Pilih Pegawai -</option>
                                            @foreach($employee as $emp)
                                            <option value="{{ $emp->id }}">{{ $emp->nip.' - '.$emp->nama_employee }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tanggal Cuti <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="tglCuti" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Lama Cuti <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="lama" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Keterangan <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="note" class="form-control" required data-validation-required-message="This field is required"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-xs-right">
                                    <input type="submit" name=simpan" class="btn btn-primary" value="SImpan Data">
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
    <div class="col-12">
        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">List Data Cuti Pegawai</h3>
            <br><br>
            @include('layouts.partials.messages')
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
                        <th>Lama Cuti</th>
                        <th>Keterangan</th>
                        <th align="center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($cutis as $cuti)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $cuti->nip }}</td>
                        <td>{{ $cuti->nama }}</td>
                        <td>{{ date('d-M-Y', strtotime($cuti->tglCuti)) }}</td>
                        <td>{{ $cuti->lamaCuti }} Hari</td>
                        <td>{{ $cuti->note }}</td>
                        <td width="20%">
                            <form action="{{ route('cuti.destroy', [$cuti->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ url('sysadmin/cuti/'.$cuti->id.'/edit') }}" class="btn btn-warning">Edit</a>
                                <input type="submit"  onclick="return confirm('Anda yakin akan menghapus data Cuti Pegawai?');" class="btn btn-danger" value="Delete">
                            </form>
                        </td>
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