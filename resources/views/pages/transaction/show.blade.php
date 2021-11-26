<table class="table table-bordered">

    <tr>
        <th>Nama</th>
        <td>{{ $items->name }}</td>
    </tr>
    <tr>
        <th>Number</th>
        <td>{{ $items->number }}</td>
    </tr>
    <tr>
        <th>Address</th>
        <td>{{ $items->address }}</td>
    </tr>
    <tr>
        <th>Total</th>
        <td>{{ $items->transaction_total }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $items->transaction_status }}</td>
    </tr>
    <tr>
        <th style="white-space:nowrap">Pembelian Product</th>
        <td>
            <table class="table table-bordered w-100 nowrap" style="white-space:nowrap">
                <tr>
                    <th>Nama</th>
                    <th>Type</th>
                    <th>Harga</th>
                </tr>
                @foreach ($items->detail as $detail)
                    <tr>
                        <td class="nowrap">{{ $detail->product->name }}</td>
                        <td>{{ $detail->product->type }}</td>
                        <td>@indo_currency($detail->price)</td>
                    </tr>
                @endforeach
            </table>
        </td>
    </tr>
    
</table>

<div class="row">
    <div class="col-4">
        <a href="{{ route('transaction.status',$items->id) }}?status=SUCCESS" class="btn btn-success btn-block">
            <i class="fa fa-check"></i>Set Sukses
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status',$items->id) }}?status=PENDING" class="btn btn-warning btn-block">
            <i class="fa fa-spinner"></i>Set Pending
        </a>
    </div>
    <div class="col-4">
        <a href="{{ route('transaction.status',$items->id) }}?status=FAILED" class="btn btn-danger btn-block">
            <i class="fa fa-times"></i>Set Gagal
        </a>
    </div>
</div>

