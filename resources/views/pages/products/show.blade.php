@extends('layouts.default')

@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang <b>{{ $product->name }}</b> </h4>
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
                                    @forelse ($items as $item)                                        
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->product->name }}</td>
                                            <td>
                                                <img src="{{ url('storage/'.$item->photo) }}" alt="">
                                            </td>
                                            <td>{{ $item->is_default ? 'Ya' : 'Tidak' }}</td>
                                            <td>
                                                <form action="{{ route('gallery.destroy', $item->id) }}" method="post" class="d-inline">
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