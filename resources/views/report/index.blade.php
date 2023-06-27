@extends('_layouts.master')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Laporan</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Pemesan</th>
                                <th>Konser</th>
                                <th>Tiket ID</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->guest_name }}</td>
                                    <td>{{ $item->concert->concert_name }}</td>
                                    <td>{{ $item->ticket_id }}</td>
                                    <td><span class="badge {{ $item->status == 0 ? 'badge-secondary' : 'badge-success' }}">{{ $item->status == 0 ? 'Belum Dipakai' : 'Sudah Dipakai' }}</span></td>
                                    <td>
                                        <form action="{{ route('staff.guest.delete', $item->id) }}" method="POST">
                                            <a href="{{ route('staff.guest.edit', $item->id) }}" class="btn btn-sm btn-warning text-white"><i class="fas fa-pencil-alt"></i></a>

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="6" align="center">Tidak ada data</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{  $data->links()  }}
                    </ul>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection