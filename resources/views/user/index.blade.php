@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Daftar User</h2>
                <a href="{{ route('user.create') }}" class="btn btn-success">
                    Tambah User
                </a>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>#</th>
                <th>Id</th>
                <th>Nama</th>
                <th>Email</th>
            </tr>
            @foreach ($data_user as $key => $user)
                <tr>
                    <td>
                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-primary">
                                Edit
                            </a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus Data User dengan Id : {{ $user->id }} ? ')">Delete</button>
                        </form>
                    </td>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </table>

        Halaman : {{ $data_user->currentPage() }} <br>
        Jumlah Data : {{ $data_user->total() }} <br>
        Daftar Per Halaman : {{ $data_user->perPage() }} <br>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $data_user->links() !!}
        </div>
    </div>
@endsection