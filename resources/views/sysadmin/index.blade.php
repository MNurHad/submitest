@extends('layouts.app')
@section('content')
<div class="content-header">
    <div class="d-flex align-items-center">
        <div class="mr-auto w-p50">
            <h3 class="page-title">Dashboard</h3>
            <div class="d-inline-block align-items-center">
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a> Dashboard</li>
                        <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

    <!-- Main content -->
<section class="content">		
    <div class="row">
        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
            <div class="box bg-info pull-up">
                <div class="box-body text-center">
                    <span>
                    <i class="fa fa-heartbeat pb-10 font-size-50"></i>
                    </span><br>
                    <h1>{{ $empAktif->count() }}</h1>
                    <span>Karyawan AKtif</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
            <div class="box bg-danger pull-up">
                <div class="box-body text-center">
                    <span>
                    <i class="fa fa-file-text pb-10 font-size-50"></i>
                    </span><br>
                    <h1>{{ $empDeaktif->count() }}</h1>
                    <span>Karyawan Tidak Aktif</span>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-4 col-xl-4">
            <div class="box bg-dark pull-up">
                <div class="box-body text-center">
                    <span>
                    <i class="fa fa-share pb-10 font-size-50"></i>
                    </span><br>
                    <h1>{{ $cuti->count() }}</h1>
                    <span>Cuti Karyawan</span>
                </div>
            </div>
        </div>	
    </div>			      
</section>
@endsection