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
							<li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
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
				<h4 class="box-title">Tambah Data Pegawai</h4>
				<h6 class="box-subtitle">Penambahan Data Pegawai</h6>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<div class="col">
						<form novalidate method="POST" action="{{ route('employee.store') }}">
							@csrf
							<div class="row">
								<div class="col-6">						
									<div class="form-group">
										<h5>Nomor Induk <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="text" name="nomor" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
									</div>
									<div class="form-group">
										<h5>Nama Pegawai <span class="text-danger">*</span></h5>
										<div class="controls">
                                            <input type="text" name="nama" class="form-control" required data-validation-required-message="This field is required"> 
										</div>
									</div>
                                    <div class="form-group">
										<h5>Alamat <span class="text-danger">*</span></h5>
										<div class="controls">
                                            <textarea name="address" class="form-control" required data-validation-required-message="This field is required"></textarea>
										</div>
									</div>
								</div>
                                <div class="col-6">
                                    <div class="form-group">
										<h5>Tanggal Lahir <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="birthdate" class="form-control" required data-validation-required-message="This field is required"> 
                                        </div>
									</div>
                                    <div class="form-group">
										<h5>Tanggal Masuk <span class="text-danger">*</span></h5>
										<div class="controls">
											<input type="date" name="join" class="form-control" required data-validation-required-message="This field is required"> 
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
              <h3 class="box-title">List Data Pegawai</h3>
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
							<th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Tanggal Join</th>
                            <th>Status</th>
							<th align="center">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; ?>
						@foreach ($employees as $employee)
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
							<td width="20%">
								<form action="{{ route('employee.destroy', [$employee->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
									<a href="{{ url('sysadmin/employee/'.$employee->id.'/edit') }}" class="btn btn-warning">Edit</a>
									<input type="submit"  onclick="return confirm('Anda yakin akan menghapus data Pegawai?');" class="btn btn-danger" value="Delete">
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