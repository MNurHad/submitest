<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ url('assets/images/favicon.ico') }}">

    <title>Login | Sistem Kepegawaian</title>
  
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="{{ url('assets/vendor_components/bootstrap/dist/css/bootstrap.min.css') }}">
	
	<!-- Bootstrap extend-->
	<link rel="stylesheet" href="{{ url('assets/css/bootstrap-extend.css') }}">
	
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ url('assets/css/master_style.css') }}">

	<!-- Superieur Admin skins -->
	<link rel="stylesheet" href="{{ url('assets/css/skins/_all-skins.css') }}">	

</head>
<body class="hold-transition bg-img" style="background-image: url(assets/singin-bg.jpg)" data-overlay="4">
	
	<div class="auth-2-outer row align-items-center h-p100 m-0">
		<div class="auth-2">
		  <div class="auth-logo font-size-40">
			<a href="../index.html" class="text-white"><b>Sistem</b>Kepegawaian</a>
		  </div>
		  <!-- /.login-logo -->
		  <div class="auth-body">
			<p class="auth-msg">Sign in to start your session</p>

			<form action="{{ route('action.login') }}" method="post" class="form-element">
              @csrf
			  <div class="form-group has-feedback">
				<input type="email" name="email" required class="form-control" placeholder="Email">
				<span class="ion ion-email form-control-feedback"></span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			  </div>
			  <div class="form-group has-feedback">
				<input type="password" name="password" required class="form-control" placeholder="Password">
				<span class="ion ion-locked form-control-feedback"></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
			  </div>
			  <div class="row">
				<div class="col-6">
				  <div class="checkbox">
					<input type="checkbox" id="basic_checkbox_1">
					<label for="basic_checkbox_1">Remember Me</label>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-6">
				 <div class="fog-pwd">
					<!-- <a href="javascript:void(0)" class="text-white"><i class="ion ion-locked"></i> Forgot pwd?</a><br> -->
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}" class="text-white"><i class="ion ion-locked"></i>
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-12 text-center">
				  <button type="submit" class="btn btn-block mt-10 btn-success">SIGN IN</button>
				</div>
				<!-- /.col -->
			  </div>
			</form>
			<div class="margin-top-30 text-center">
				<p>Don't have an account? <a href="auth_register2.html" class="text-info m-l-5">Sign Up</a></p>
			</div>
		  </div>
		</div>
	
	</div>
	

	<!-- jQuery 3 -->
	<script src="{{ url('assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js') }}"></script>
	
	<!-- popper -->
	<script src="{{ url('assets/vendor_components/popper/dist/popper.min.js') }}"></script>
	
	<!-- Bootstrap 4.0-->
	<script src="{{ url('assets/vendor_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

</body>
</html>
