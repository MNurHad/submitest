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
							<li class="breadcrumb-item" aria-current="page">Master Data</li>
							<li class="breadcrumb-item active" aria-current="page">Ubah Data Pegawai</li>
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
				<h4 class="box-title">Ubah Data Pegawai Nomor Induk {{ $employeeId->nip }}</h4>
				<h6 class="box-subtitle">Perubahan Data Pegawai</h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col">
						<form novalidate method="POST" action="{{ route('employee.update', $employeeId->id) }}">
							@csrf
                            @method('PUT')
							<div class="row">
								<div class="col-6">						
									<div class="form-group">
										<h5>Nomor Induk <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="nomor" value="{{ $employeeId->nip }}" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
									</div>
									<div class="form-group">
										<h5>Nama Pegawai <span class="text-danger">*</span></h5>
										<div class="controls">
                                            <input type="text" name="nama" value="{{ $employeeId->nama_employee }}" class="form-control" required data-validation-required-message="This field is required"> 
										</div>
									</div>
                                    <div class="form-group">
										<h5>Alamat <span class="text-danger">*</span></h5>
										<div class="controls">
                                            <textarea name="address" class="form-control" required data-validation-required-message="This field is required">
                                            {{ $employeeId->address }}
                                            </textarea>
										</div>
									</div>
								</div>
                                <div class="col-6">
                                    <div class="form-group">
										<h5>Tanggal Lahir <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="birthdate" value="{{ $employeeId->birthdate }}" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
									</div>
                                    <div class="form-group">
										<h5>Tanggal Masuk <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="join" value="{{ $employeeId->join_date }}" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
									</div>
                                    <div class="form-group">
                                        <h5>Status <span class="text-danger">*</span></h5>
                                        <select name="status"  id="" class="form-control" required data-validation-required-message="This field is required">
                                            <option value="">- Pilih Status -</option>
                                            <option value="AKTIF" @if($employeeId->status == "AKTIF") selected @endif>Aktif</option>
                                            <option value="DEAKTIF" @if($employeeId->status != "AKTIF") selected @endif>Tidak AKtif</option>
                                        </select>
                                    </div>
                                </div>
								<div class="col-12">
									<div class="text-xs-right">
										<input type="submit" name=simpan" class="btn btn-primary" value="Ubah Data">
                                        <a href="{{ route('employee.index') }}" class="btn btn-danger">Kembali</a>
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