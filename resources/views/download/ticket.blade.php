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
    <div class="container">
        <div class="text-center mt-3">
            <h3 class="font-weight bold">SkyBand Concert</h3>
        </div>
        <table>
            <tr>
                <th>Tiket ID</th>
                <td>:</td>
                <td>{{ $data->ticket_id }}</td>
            </tr>
            <tr>
                <th>Konser</th>
                <td>:</td>
                <td>{{ $data->concert->concert_name }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>:</td>
                <td>{{ $data->guest_name }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon</th>
                <td>:</td>
                <td>{{ $data->phone_number }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $data->email }}</td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td>:</td>
                <td>{{ $data->address }}</td>
            </tr>
        </table>
    </div>
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
	<!-- AdminLTE App -->
	<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
</body>
</html>