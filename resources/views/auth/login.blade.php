<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agen X</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
	<div class="card card-outline card-primary">
		<div class="card-header text-center">
			<span class="h3"><b>Agen X</b></span>
		</div>
		<div class="card-body">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error') }}
                </div>
            @endif
			<form action="{{ route('authenticate') }}" method="post">
                @csrf
				<div class="input-group mb-3">
					<input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" autofocus>
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
                    @error('username')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
				</div>
				<div class="input-group mb-3">
					<input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
                    @error('password')
                        <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
				</div>
				<div class="row">
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
</body>
</html>
