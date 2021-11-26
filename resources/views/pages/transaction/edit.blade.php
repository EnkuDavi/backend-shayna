@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Transaksi</strong>
            <small>{{ $item->name }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('transaction.update',$item->id) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name">Nama Pemesan</label>
                    <input type="text" name="name" value="{{ old('name') ? old('name') : $item->name }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type">Email</label>
                    <input type="text" name="email" value="{{ old('email') ? old('email') : $item->email }}" class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="price">Nomor Hp</label>
                    <input type="number" name="number" value="{{ old('number') ? old('number') : $item->number }}" class="form-control @error('number') is-invalid @enderror">
                    @error('number')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="decription">Alamat Pemesan</label>
                    <textarea name="alamat" id="alamat" class="form-control @error('alamat') @enderror" cols="30" rows="10">{{ old('alamat') ? old('alamat') : $item->address }}</textarea>
                    @error('alamat')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm btn-block" type="submit"><i class="fa fa-paper-plan"></i>Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('after-script')
    <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
        });
    </script>
@endpush