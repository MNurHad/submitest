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
            <h4 class="box-title">Ubah Data Cuti Pegawai</h4>
            <h6 class="box-subtitle">Perubahan Data Cuti Pegawai</h6>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col">
                    <form novalidate method="POST" action="{{ route('cuti.update', $cutiId->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">						
                                <div class="form-group">
                                    <h5>Nomor Induk Pegawai <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="nomor" class="form-control" required data-validation-required-message="This field is required">
                                            <option value="">- Pilih Pegawai -</option>
                                            @foreach($employee as $emp)
                                            <option value="{{ $emp->id }}" @if($cutiId->employeeId == $emp->id) selected @endif>{{ $emp->nip.' - '.$emp->nama_employee }}</option>
                                            @endforeach
                                        </select> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Tanggal Cuti <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="date" name="tglCuti" value="{{ $cutiId->date_cuti }}" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Lama Cuti <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="number" name="lama" value="{{ $cutiId->cuti_long }}" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Keterangan <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="note" class="form-control" required data-validation-required-message="This field is required">
                                        {{ $cutiId->note }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-xs-right">
                                    <input type="submit" name=simpan" class="btn btn-primary" value="SImpan Data">
                                    <a href="{{ route('cuti.index') }}" class="btn btn-danger"> Kembali</a>
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
@endsection