@extends('layouts.app')

@section('content')
<div class="container mt-4">

<div class="d-flex justify-content-between mb-3">
    <h3>Detail Buku</h3>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">← Kembali</a>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center mb-3">
                @if($book->gambar)
                    <img src="{{ asset('storage/' . $book->gambar) }}"
                         alt="{{ $book->judul }}"
                         class="img-fluid rounded shadow"
                         style="max-height:300px; object-fit:cover;">
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center rounded"
                         style="height:250px; border: 2px dashed #ccc;">
                        <span class="text-muted">Tidak ada gambar</span>
                    </div>
                @endif
            </div>
            <div class="col-md-9">
                <table class="table table-borderless">
                    <tr>
                        <th width="150">Judul</th>
                        <td>: {{ $book->judul }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: {{ $book->category->nama_kategori ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Penulis</th>
                        <td>: {{ $book->penulis }}</td>
                    </tr>
                    <tr>
                        <th>Tahun Terbit</th>
                        <td>: {{ $book->tahun_terbit }}</td>
                    </tr>
                    <tr>
                        <th>Stok</th>
                        <td>: <span class="badge bg-info">{{ $book->stok }}</span></td>
                    </tr>
                </table>
                <div class="mt-3">
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"
                            onclick="return confirm('Yakin hapus data?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection