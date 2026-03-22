@extends('layouts.app')

@section('content')
<div class="container mt-4">

<h3>Tambah Book</h3>
<div class="card">
    <div class="card-body">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="category_id" class="form-select @error('category_id') is-invalid @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="judul" value="{{ old('judul') }}"
                       class="form-control @error('judul') is-invalid @enderror">
                @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" value="{{ old('penulis') }}"
                       class="form-control @error('penulis') is-invalid @enderror">
                @error('penulis') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Terbit</label>
                <input type="number" name="tahun_terbit" value="{{ old('tahun_terbit') }}"
                       class="form-control @error('tahun_terbit') is-invalid @enderror">
                @error('tahun_terbit') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" name="stok" value="{{ old('stok') }}"
                       class="form-control @error('stok') is-invalid @enderror">
                @error('stok') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Gambar <span class="text-muted">(opsional, maks 2MB)</span></label>
                <input type="file" name="gambar" accept="image/*"
                       class="form-control @error('gambar') is-invalid @enderror"
                       onchange="previewGambar(this)">
                @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                <div class="mt-2" id="preview" style="display:none;">
                    <img id="previewImg" src="" alt="Preview"
                         style="width:100px; height:130px; object-fit:cover; border-radius:6px; border:1px solid #ddd;">
                </div>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('books.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>

</div>

<script>
function previewGambar(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('previewImg').src = e.target.result;
            document.getElementById('preview').style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>

@endsection