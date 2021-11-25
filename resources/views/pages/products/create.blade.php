@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('product.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Barang</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="type">Type Barang</label>
                    <input type="text" name="type" value="{{ old('type') }}" class="form-control @error('type') is-invalid @enderror">
                    @error('type')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="decription">Description</label>
                    <textarea name="description" id="description" class="form-control @error('description') @enderror" cols="30" rows="10">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price">Harga Barang</label>
                    <input type="number" name="price" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror">
                    @error('price')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror">
                    @error('quantity')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm btn-block" type="submit"><i class="fa fa-paper-plan"></i>Submit</button>
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