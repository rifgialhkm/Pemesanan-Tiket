@extends('_layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Konser</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12 col-sm-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <form action="{{ route('staff.concert.update', $data->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                    <div class="form-group">
                                        <label>Nama Konser</label>
                                        <input type="text" name="concert_name" class="form-control" value="{{ $data->concert_name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat</label>
                                        <input type="text" name="place" class="form-control" value="{{ $data->place }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="datetime-local" name="date" class="form-control" value="{{ $data->date }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Tiket</label>
                                        <input type="number" name="stock" class="form-control" value="{{ $data->stock }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="price" class="form-control" value="{{ $data->price }}" required>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <a href="{{ route('staff.concert.index') }}" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection