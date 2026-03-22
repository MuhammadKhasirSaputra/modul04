@extends('layouts.app')

@section('content')
<div class="container mt-4">

<h3>Edit Kategori</h3>
<div class="card">
    <div class="card-body">
        <form action="{{ route('categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Kategori</label>
                <input type="text" name="nama_kategori"
                       class="form-control @error('nama_kategori') is-invalid @enderror"
                       value="{{ old('nama_kategori', $category->nama_kategori) }}"
                       placeholder="Contoh: Fiksi, Sains, Teknologi...">
                @error('nama_kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Deskripsi <span class="text-muted">(opsional)</span></label>
                <textarea name="deskripsi" rows="3"
                          class="form-control @error('deskripsi') is-invalid @enderror"
                          placeholder="Masukkan deskripsi kategori...">{{ old('deskripsi', $category->deskripsi) }}</textarea>
                @error('deskripsi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</div>
@endsection