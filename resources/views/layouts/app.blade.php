<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ url('assets/images/favicon.ico') }}">

    <title>Dashboard - Sistem Kepegawaian</title>
    
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ url('assets/vendor_components/bootstrap/dist/css/bootstrap.css') }}">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap-extend.css') }}">
	
	<!-- theme style -->
	<link rel="stylesheet" href="{{ url('assets/css/master_style.css') }}">
	
	<!-- Superieur Admin skins -->
	<link rel="stylesheet" href="{{ url('assets/css/skins/_all-skins.css') }}">
	
	<!-- fullCalendar -->
	<link rel="stylesheet" href="{{ url('assets/vendor_components/fullcalendar/fullcalendar.min.css') }}">
	<link rel="stylesheet" href="{{ url('assets/vendor_components/fullcalendar/fullcalendar.print.min.css') }}" media="print">
	
	<!-- Bootstrap switch-->
	<link rel="stylesheet" href="{{ url('assets/vendor_components/bootstrap-switch/switch.css') }}">
	
	<!-- Morris charts -->
	<link rel="stylesheet" href="{{ url('assets/vendor_components/morris.js/morris.css') }}">  
    <!-- Data Table-->
	<link rel="stylesheet" type="text/css" href="{{ url('assets/vendor_components/datatable/datatables.min.css') 
    }}"/>   
  </head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.html" class="logo">
      <!-- mini logo -->
	  <div class="logo-mini">
		  <span class="light-logo"><img src="{{ url('assets/images/logo-light.png') }}" alt="logo"></span>
		  <span class="dark-logo"><img src="{{ url('assets/images/logo-dark.png') }}" alt="logo"></span>
	  </div>
      <!-- logo-->
      <div class="logo-lg">
		  <span class="light-logo"><img src="{{ url('assets/images/logo-light-text.png') }}" alt="logo"></span>
	  	  <span class="dark-logo"><img src="{{ url('assets/images/logo-dark-text.png') }}" alt="logo"></span>
	  </div>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
	  <div>
		  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
			<span class="sr-only">Toggle navigation</span>
		  </a>
	  </div>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  <!-- User Account-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ url('assets/admin-logos.png') }}" class="user-image rounded-circle" alt="User Image">
            </a>
            <ul class="dropdown-menu animated flipInY">
              <!-- User image -->
              <li class="user-header bg-img" style="background-image: url(assets/images/user-info.jpg)" data-overlay="3">
                <div class="flexbox align-self-center">					  
                  <img src="{{ url('assets/admin-logos.png') }}" class="float-left rounded-circle" alt="User Image">					  
					<h4 class="user-name align-self-center">
                        <span>{{ Auth::user()->name }}</span>
                        <small>{{ Auth::user()->email }}</small>
					</h4>
				</div>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <a class="dropdown-item" href="{{ url('logout') }}" onclick="return confirm('Anda yakin akan Keluar?');"><i class="ion-log-out"></i> Logout</a>
                <div class="dropdown-divider"></div>
                <div class="p-10"><a href="{{ url('profil') }}" class="btn btn-sm btn-rounded btn-success">View Profile</a></div>
              </li>
            </ul>
          </li>		
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="user-profile treeview">
          <a href="#">
			<img src="{{ url('assets/admin-logos.png') }}" alt="user">
              <span>
				<span class="d-block font-weight-600 font-size-16">{{ Auth::user()->name }}</span>
				<span class="email-id">{{ Auth::user()->email }}</span>
			  </span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
        </li>
        <li class="header nav-small-cap"><i class="mdi mdi-drag-horizontal mr-5"></i>PERSONAL</li>
		    <li class="active">
            <a href="{{ route('dashboard') }}">
                <i class="mdi mdi-view-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>
		    <li class="treeview">
          <a href="#">
            <i class="mdi mdi-format-list-bulleted-type"></i>
            <span>Data Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('sysadmin/employee') }}"><i class="mdi mdi-toggle-switch-off"></i>Data Karyawan</a></li>
            <li><a href="{{ url('sysadmin/cuti') }}"><i class="mdi mdi-toggle-switch-off"></i>Data Cuti Karyawan</a></li>
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i class="mdi mdi-format-list-bulleted-type"></i>
            <span>List Persentase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('employee.member') }}"><i class="mdi mdi-toggle-switch-off"></i>Karyawan Terbaru</a></li>
            <li><a href="{{ route('cuti.aktif') }}"><i class="mdi mdi-toggle-switch-off"></i>Data Cuti Karyawan Aktif</a></li>
            <li><a href="{{ route('cuti.lebih') }}"><i class="mdi mdi-toggle-switch-off"></i>Cuti Karyawan Lebih</a></li>
            <li><a href="{{ route('cuti.sisa') }}"><i class="mdi mdi-toggle-switch-off"></i>Data Cuti Karyawan Sisa</a></li>
          </ul>
        </li> 
      </ul>
    </section>
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->	  
	@yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
	
  <footer class="main-footer">
	  &copy; 2022 <a href="https://www.multipurposethemes.com/">PT. Otto Menara Globalindo</a>. All Rights Reserved.
  </footer>
  
  <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
  
</div>
<!-- ./wrapper -->
  	
	 
	  
	<!-- jQuery 3 -->
	<script src="{{ url('assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js') }}"></script>
	
	<!-- popper -->
	<script src="{{ url('assets/vendor_components/popper/dist/popper.min.js') }}"></script>
	
	<!-- date-range-picker -->
	<script src="{{ url('assets/vendor_components/moment/min/moment.min.js') }}"></script>
	<script src="{{ url('assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="{{ url('assets/vendor_components/bootstrap/dist/js/bootstrap.js') }}"></script>
	
	<!-- Slimscroll -->
	<script src="{{ url('assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
	
	<!-- FastClick -->
	<script src="{{ url('assets/vendor_components/fastclick/lib/fastclick.js') }}"></script>
	
	<!-- Sparkline -->
	<script src="{{ url('assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>

	<!-- fullCalendar -->
	<script src="{{ url('assets/vendor_components/fullcalendar/fullcalendar.js') }}"></script>
	<script src="{{ url('assets/js/pages/calendar.js') }}"></script>

	<!-- e-chart -->
	<script src="{{ url('assets/vendor_components/echarts/dist/echarts-en.min.js') }}"></script>
	<script src="{{ url('assets/vendor_components/echarts/echarts-liquidfill.min.js') }}"></script>
	<script src="{{ url('assets/vendor_components/echarts/ecStat.min.js') }}"></script>
	
	<!-- Morris.js') }} charts -->
	<script src="{{ url('assets/vendor_components/raphael/raphael.min.js') }}"></script>
	<script src="{{ url('assets/vendor_components/morris.js/morris.min.js') }}"></script>		
	
	<!-- Superieur Admin App -->
	<script src="{{ url('assets/js/template.js') }}"></script>
	
	<!-- Superieur Admin for demo purposes -->
	<script src="{{ url('assets/js/demo.js') }}"></script>	
	
	<!-- Superieur Admin dashboard demo-->
	<script src="{{ url('assets/js/pages/dashboard5.js') }}"></script>
	<script src="{{ url('assets/js/pages/dashboard5-chart.js') }}"></script>


	<!-- This is data table -->
    <script src="{{ url('assets/vendor_components/datatable/datatables.min.js') }}"></script>

    <!-- Superieur Admin for Data Table -->
    <script src="{{ url('assets/js/pages/data-table.js') }}"></script>
    <!-- Form validator JavaScript -->
    <script src="{{ url('assets/js/pages/validation.js') }}"></script>
    <script src="{{ url('assets/js/pages/form-validation.js') }}"></script>
</body>
</html>

