@extends('layouts.default')

@section('content')

    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi</h4>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Nomor</th>
                                        <th>Total Transaksi</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @forelse ($transactions as $transaction)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $transaction->name }}</td>
                                            <td>{{ $transaction->email }}</td>
                                            <td>{{ $transaction->number }}</td>
                                            <td>@indo_currency($transaction->transaction_total)</td>
                                            <td>
                                                @if($transaction->status == 'PENDING')
                                                    <span class="badge bg-primary">
                                                @elseif($transaction->status == 'SUCCESS')
                                                    <span class="badge bg-success">
                                                @elseif($transaction->status == 'FAILED')
                                                    <span class="badge bg-danger">
                                                @else
                                                    <span>
                                                @endif
                                                {{ $transaction->transaction_status }} </span>
                                            </td>
                                            <td>
                                                {{-- @if($transaction->transaction_status == 'PENDING')
                                                    <a href="{{ route('transaction.status',$transaction->id) }}?status=success" class="btn btn-warning"></a>
                                                    <i class="fa fa-check"></i>
                                                     <a href="{{ route('transaction.status',$transaction->id) }}" class="btn btn-warning"></a>
                                                    <i class="fa fa-times"></i>
                                                @endif --}}
                                                <a href="#modal" data-toggle="modal" data-target="#myModal" data-title="Data Transaksi {{ $transaction->uuid }}" data-remote="{{ route('transaction.edit', $transaction->id) }}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-info"></i>
                                                </a>
                                                <form action="{{ route('transaction.destroy', $transaction->id) }}" method="post" class="d-inline">
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
                                            <td colspan="6" class="text-center p-5">Data tidak tersedia</td>
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