@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Data Book</h3>
    <a href="{{ route('books.create') }}" class="btn btn-primary">+ Tambah</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

{{-- Informasi Jumlah Data --}}
<div class="row mb-3">

    {{-- Total Semua Buku --}}
    <div class="col-md-3 mb-2">
        <div class="card text-white bg-primary h-100">
            <div class="card-body d-flex align-items-center">
                <div>
                    <div class="small opacity-75">Total Semua Buku</div>
                    <div class="fs-4 fw-bold">{{ $totalBooks }}</div>
                </div>
            </div>
        </div>
    </div>

    {{-- Per Kategori --}}
    <div class="col-md-9 mb-2">
        <div class="card h-100">
            <div class="card-body">
                <div class="small text-muted fw-semibold mb-2">Jumlah Buku per Kategori</div>
                <div class="row g-2">
                    @foreach($totalPerCategory as $cat)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="border rounded px-2 py-1 d-flex justify-content-between align-items-center">
                            <span class="small text-truncate me-1">{{ $cat->nama_kategori }}</span>
                            <span class="badge bg-primary rounded-pill">{{ $cat->books_count }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Form Pencarian & Filter Kategori --}}
<div class="card mb-3">
    <div class="card-body">
        <form action="{{ route('books.index') }}" method="GET" class="row g-2 align-items-end">
            <div class="col-md-5">
                <label class="form-label mb-1">Cari Judul</label>
                <input type="text" name="search" class="form-control"
                       placeholder="Masukkan judul buku..."
                       value="{{ request('search') }}">
            </div>
            <div class="col-md-4">
                <label class="form-label mb-1">Filter Kategori</label>
                <select name="category_id" class="form-select">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-info w-100">Cari / Filter</button>
            </div>
        </form>
    </div>
</div>

{{-- Tabel Data Buku --}}
<div class="card">
    <div class="card-body">

        <p class="text-muted">Menampilkan <strong>{{ $books->count() }}</strong> data buku
            @if(request('search') || request('category_id'))
                (hasil pencarian/filter)
            @endif
        </p>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Stok</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $key => $book)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $book->judul }}</td>
                    <td>{{ $book->category->nama_kategori ?? '-' }}</td>
                    <td>{{ $book->penulis }}</td>
                    <td>{{ $book->tahun_terbit }}</td>
                    <td>
                        <span class="badge bg-info">{{ $book->stok }}</span>
                    </td>
                    <td>
                        <a href="{{ route('books.edit',$book->id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('books.destroy',$book->id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Tidak ada data buku ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        @if(request('search') || request('category_id'))
            <a href="{{ route('books.index') }}" class="btn btn-secondary btn-sm">Reset Pencarian</a>
        @endif

    </div>
</div>

@endsection