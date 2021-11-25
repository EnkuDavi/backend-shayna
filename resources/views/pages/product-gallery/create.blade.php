@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('gallery.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-group">
                    <label for="name">Nama Barang</label>
                    <select name="product_id" class="form-control @error('product_id') is-invalid @enderror">
                        @forelse ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @empty
                            <option value=""></option>
                        @endforelse
                    </select>
                    @error('product_id')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
               
                <div class="form-group">
                    <label for="photo">Photo Barang</label>
                    <input type="file" name="photo" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror" accept="image/*">
                    @error('photo')
                        <span class="text-muted">{{ $message }}</span>
                    @enderror
                </div>
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-left pt-0">Jadikan default ?</legend>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_default" value="1">
                        <label class="form-check-label" >
                          Ya
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="is_default" value="0">
                        <label class="form-check-label">
                          Tidak
                        </label>
                      </div>
                    </div>
                </fieldset>
                <div class="form-group">
                    <button class="btn btn-primary btn-sm btn-block" type="submit"><i class="fa fa-paper-plan"></i>Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
