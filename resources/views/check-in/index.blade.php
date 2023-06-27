@extends('_layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Check In Tiket</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-12">
                @if (session()->has('success'))    
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('message'))    
                    <div class="alert alert-primary alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('staff.check-in.search') }}" method="POST">
                    @csrf

                    <div class="form-group d-flex">
                        <input type="search" name="q" class="form-control mr-3" placeholder="Cari id tiket">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
                </form>
            </div>
            @if (isset($details))    
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="card-title">Detail Pemesan</h1>
                        </div>
                        <div class="card-body">
                            <table>
                                <tr>
                                    <th>Tiket ID</th>
                                    <td>:</td>
                                    <td>{{ $details->ticket_id }}</td>
                                </tr>
                                <tr>
                                    <th>Konser</th>
                                    <td>:</td>
                                    <td>{{ $details->concert->concert_name }}</td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td>:</td>
                                    <td>{{ $details->guest_name }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>:</td>
                                    <td>{{ $details->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>:</td>
                                    <td>{{ $details->email }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>:</td>
                                    <td>{{ $details->address }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>:</td>
                                    <td>{{ $details->status == 0 ? 'Belum Dipakai' : 'Sudah Dipakai' }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <form action="{{ route('staff.check-in.post', $details->id) }}" method="POST">
                                            @csrf

                                            <button type="submit" class="btn btn-sm btn-primary" {{ $details->status == 1 ? 'disabled' : '' }}>Check In</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            @endif

        </section>
        <!-- /.content -->
    </div>
@endsection