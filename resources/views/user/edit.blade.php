@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Edit User</h2>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('user.update', $user->id) }}" class="border border-default col-md-6 p-2" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label> Id User : </label>
                <input type="text" name="id" id="id" class="form-control" value="{{ old('id', $user->id) }}" readonly>
                @error('id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label> Nama : </label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $user->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label> Email : </label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label> Password : </label>
                <input type="password" name="password" id="password" class="form-control" value="{{ old('password', $user->password) }}">
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary ml-3">Submit</button>
            <a href="{{ route('user.index') }}" class="btn-secondary">Kembali</a>
        </form>
    </div>
@endsection