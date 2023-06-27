<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agen X</title>
    
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar  sidebar-light-primary elevation-4">
            <a href="#" class="brand-link bg-primary">
                <i class="fas fa-ticket-alt ml-3 pl-1 mr-2"></i>
                <span class="brand-text font-weight-light font-weight-bold">Agen X</span>
            </a>
            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('assets/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('staff.concert.index') }}" class="nav-link {{ Route::is('staff.concert.index', 'staff.concert.create', 'staff.concert.edit') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-chart-line"></i>
                                <p>Data Konser</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('staff.guest.index') }}" class="nav-link {{ Route::is('staff.guest.index', 'staff.guest.edit') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Data Pemesan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('staff.check-in') }}" class="nav-link {{ Route::is('staff.check-in', 'staff.check-in.search') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Check In Tiket</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('staff.report') }}" class="nav-link {{ Route::is('staff.report') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>Laporan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        @yield('content')
    </div>

	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <!-- Autonumeric -->
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.2.0/dist/autoNumeric.min.js"></script>
    @yield('scripts')
</body>
</html>