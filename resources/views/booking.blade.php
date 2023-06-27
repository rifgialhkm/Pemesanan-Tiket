<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agen X - Pemesanan Tiket</title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">

    <style>
        .form-section {
            display: none;
        }
        .form-section.current {
            display: inherit;
        }
        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>
</head>
<body class="hold-transition layout-top-nav">
<section>

	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
		<div class="container">
			<a href="../../index3.html" class="navbar-brand">
				<!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
				<span class="brand-text font-weight-bold">Agen X</span>
			</a>

			<!-- <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse order-3 ml-auto" id="navbarCollapse">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="index3.html" class="nav-link">Booking</a>
					</li>
				</ul>
			</div> -->
		</div>
	</nav>
	<!-- /.navbar -->

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Main content -->
		<div class="content pt-5">
			<div class="container">
				<div class="row">
                    <div class="col-6 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mb-3">
                                    <h3 class="font-weight-bold">Form Pemesanan Tiket</h3>
                                </div>
                                @if (session()->has('success'))    
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{ session('success') }}
                                    </div>
                                @endif
                                @if (session()->has('habis'))    
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        {{ session('habis') }}
                                    </div>
                                @endif
                                <form class="ticket-form" action="{{ route('booking.post') }}" method="POST">
                                    @csrf

                                    <div class="form-section">
                                        <div class="form-group">
                                            <label for="">Nama Lengkap</label>
                                            <input type="text" name="guest_name" id="" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nomor Telepon</label>
                                            <input type="text" name="phone_number" id="" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Alamat</label>
                                            <input type="text" name="address" id="" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-section">
                                        <div class="form-group">
                                            <label for="">Pilih Konser</label>
                                            <select name="concert_id" id="" class="form-control" required>
                                                <option selected disabled> </option>
                                                @foreach ($concert as $item)
                                                    <option value="{{ $item->id }}">{{ $item->concert_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mt-3 d-none" id="detail_pesanan">
                                            <h4>Detail Pesanan</h4>
                                            <div class="d-flex justify-content-between">
                                                <h5>Total Harga</h5>
                                                <p id="price">Rp 100.000</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-navigation">
                                        <button type="button" class="previous btn btn-primary float-left">Kembali</button>
                                        <button type="button" class="next btn btn-primary float-right">Lanjut</button>
                                        <button type="submit" class="previous btn btn-success float-right">Pesan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
				<!-- /.row -->
			</div><!-- /.container-fluid -->
		</div>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
</section>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
<!-- Autonumeric -->
<script src="https://cdn.jsdelivr.net/npm/autonumeric@4.2.0/dist/autoNumeric.min.js"></script>
<!-- Parsle -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function() {
        var $sections = $('.form-section');

        function navigateTo(index){
            $sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigation .previous').toggle(index>0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type=submit]').toggle(atTheEnd);
        }

        function curIndex() {
            return $sections.index($sections.filter('.current'));
        }

        $('.form-navigation .previous').click(function () {
            navigateTo(curIndex()-1);
        });

        $('.form-navigation .next').click(function () {
            $('.ticket-form').parsley().whenValidate({
                group: 'block-' + curIndex()
            }).done(function () {
                navigateTo(curIndex()+1);
            });
        });

        $sections.each(function(index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block-'+index);
        });

        navigateTo(0);
        
    })

    $(document).ready(function() {
        $('select[name="concert_id"]').on('change', function() {
            var concertId = $(this).val();
            var url = "{{ route('getConcertDetails', ':id') }}";
            url = url.replace(':id', concertId);
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#detail_pesanan').removeClass('d-none');
                    $('#price').text(data.price);
                }
            });
        });
    });
</script>
</body>
</html>
