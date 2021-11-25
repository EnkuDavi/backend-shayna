@extends('layouts.default')

@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang</h4>
                    </div>
                    <div class="card-body--">
                        @if (session()->has('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <div class="table-stats order-table">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name Barang</th>
                                        <th>Foto</th>
                                        <th>Default</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @forelse ($galleries as $gallery)                                        
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $gallery->product->name }}</td>
                                            <td>
                                                <img src="{{ url('storage/'.$gallery->photo) }}" alt="">
                                            </td>
                                            <td>{{ $gallery->is_default ? 'Ya' : 'Tidak' }}</td>
                                            <td>
                                                <form action="{{ route('gallery.destroy', $gallery->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>Data tidak tersedia</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection