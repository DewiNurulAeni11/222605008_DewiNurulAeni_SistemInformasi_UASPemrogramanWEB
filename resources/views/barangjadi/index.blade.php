@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <h2>Daftar Barang Jadi</h2>
                <a href="{{ route('barangjadi.create') }}" class="btn btn-success">
                    Tambah Barang Jadi
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
                <th>Id Barang Jadi</th>
                <th>Nama</th>
                <th>Stock Min</th>
                <th>Stock</th>
            </tr>
            @foreach ($data_bj as $key => $barangjadi)
                <tr>
                    <td>
                        <form action="{{ route('barangjadi.destroy', $barangjadi->id_bj) }}" method="post">
                            <a href="{{ route('barangjadi.edit', $barangjadi->id_bj) }}" class="btn btn-primary">
                                Edit
                            </a>
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus data Barang Jadi dengan Id : {{ $barangjadi->id_bj }} ? ')">Delete</button>
                        </form>
                    </td>
                    <td>{{ $barangjadi->id_bj }}</td>
                    <td>{{ $barangjadi->nama }}</td>
                    <td>{{ $barangjadi->stock_min }}</td>
                    <td>{{ $barangjadi->stock }}</td>
                </tr>
            @endforeach
        </table>

        Halaman : {{ $data_bj->currentPage() }} <br>
        Jumlah Data : {{ $data_bj->total() }} <br>
        Daftar Per Halaman : {{ $data_bj->perPage() }} <br>
        {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $data_bj->links() !!}
        </div>
    </div>
@endsection