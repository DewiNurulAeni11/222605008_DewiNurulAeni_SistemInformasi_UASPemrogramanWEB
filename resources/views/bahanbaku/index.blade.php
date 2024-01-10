@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Daftar Bahan Baku</h2>
                <a href="{{ route('bahanbaku.create') }}" class="btn btn-success">
                    Tambah Bahan Baku
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
                <th>Id Bahan</th>
                <th>Nama</th>
                <th>Stock Min</th>
                <th>Stock</th>
            </tr>
            @foreach ($data_bb as $key => $bahanbaku)
                <tr>
                    <td>
                        <form action="{{ route('bahanbaku.destroy', $bahanbaku->id_bb) }}" method="post">
                            <a href="{{ route('bahanbaku.edit', $bahanbaku->id_bb) }}" class="btn btn-primary">
                                Edit
                            </a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data Bahan Baku dengan Id : {{ $bahanbaku->id_bb }} ? ')">Delete</button>
                        </form>
                    </td>
                    <td>{{ $bahanbaku->id_bb }}</td>
                    <td>{{ $bahanbaku->nama }}</td>
                    <td>{{ $bahanbaku->stock_min }}</td>
                    <td>{{ $bahanbaku->stock }}</td>
                </tr>
            @endforeach
        </table>

        Halaman : {{ $data_bb->currentPage() }} <br>
        Jumlah Data : {{ $data_bb->total() }} <br>
        Daftar Per Halaman : {{ $data_bb->perPage() }} <br>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $data_bb->links() !!}
        </div>
    </div>
@endsection