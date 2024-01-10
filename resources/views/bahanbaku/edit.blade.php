@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Edit Bahan Baku</h2>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('bahanbaku.update', $bahanbaku->id_bb) }}" class="border border-default col-md-6 p-2" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label> Id Bahan Baku : </label>
                <input type="text" name="id_bb" id="id_bb" class="form-control" value="{{ old('id_bb', $bahanbaku->id_bb) }}" readonly>
                @error('id_bb')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label> Nama : </label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $bahanbaku->nama) }}">
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label> Stock Min : </label>
                <input type="text" name="stock_min" id="stock_min" class="form-control" value="{{ old('stock_min', $bahanbaku->stock_min) }}">
                @error('stock_min')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label> Stock : </label>
                <input type="text" name="stock" id="stock" class="form-control" value="{{ old('stock', $bahanbaku->stock) }}">
                @error('stock')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
            <a href="{{ route('bahanbaku.index') }}" class="btn-secondary">Kembali</a>
        </form>
    </div>
@endsection