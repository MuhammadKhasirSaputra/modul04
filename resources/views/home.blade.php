@extends('layouts.app')

@section('content')

{{-- Carousel Bootstrap 5.3 --}}
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
    </div>

    <div class="carousel-inner">

        {{-- Slide 1 --}}
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?w=1400&q=80"
                 class="d-block w-100" alt="Slide 1"
                 style="height:500px; object-fit:cover; filter:brightness(0.55);">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="fw-bold fs-1">📚 Selamat Datang di Perpustakaan</h2>
                <p class="lead">Temukan koleksi buku terbaik untuk kamu</p>
                <a href="{{ route('books.index') }}" class="btn btn-primary btn-lg px-5 rounded-pill">
                    Lihat Semua Buku
                </a>
            </div>
        </div>

        {{-- Slide 2 --}}
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1521587760476-6c12a4b040da?w=1400&q=80"
                 class="d-block w-100" alt="Slide 2"
                 style="height:500px; object-fit:cover; filter:brightness(0.55);">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="fw-bold fs-1">📖 Koleksi Buku Lengkap</h2>
                <p class="lead">Dari teknologi, sains, sastra hingga bisnis</p>
                <a href="{{ route('categories.index') }}" class="btn btn-primary btn-lg px-5 rounded-pill">
                    Lihat Kategori
                </a>
            </div>
        </div>

        {{-- Slide 3 --}}
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1524995997946-a1c2e315a42f?w=1400&q=80"
                 class="d-block w-100" alt="Slide 3"
                 style="height:500px; object-fit:cover; filter:brightness(0.55);">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="fw-bold fs-1">➕ Tambah Koleksi Baru</h2>
                <p class="lead">Daftarkan buku baru ke perpustakaan kamu</p>
                <a href="{{ route('books.create') }}" class="btn btn-primary btn-lg px-5 rounded-pill">
                    + Tambah Buku
                </a>
            </div>
        </div>

    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>

{{-- Section 4 Buku Terbaru --}}
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">📖 Koleksi Buku Terbaru</h3>
        <a href="{{ route('books.index') }}" class="btn btn-outline-primary btn-sm">
            Lihat Semua →
        </a>
    </div>

    <div class="row g-4">
        @forelse($latestBooks as $book)
        <div class="col-md-3 col-sm-6">
            <div class="card h-100 shadow-sm border-0"
                 style="border-radius:12px; overflow:hidden; transition: transform 0.2s;"
                 onmouseover="this.style.transform='translateY(-5px)'"
                 onmouseout="this.style.transform='translateY(0)'">

                @if($book->gambar)
                    <img src="{{ asset('storage/' . $book->gambar) }}"
                         class="card-img-top"
                         alt="{{ $book->judul }}"
                         style="height:230px; object-fit:cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center"
                         style="height:230px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <span style="font-size:70px;">📖</span>
                    </div>
                @endif

                <div class="card-body">
                    <span class="badge bg-primary mb-2">
                        {{ $book->category->nama_kategori ?? '-' }}
                    </span>
                    <h6 class="card-title fw-bold mb-1">{{ $book->judul }}</h6>
                    <p class="card-text text-muted small mb-1">✍️ {{ $book->penulis }}</p>
                    <p class="card-text text-muted small">📅 {{ $book->tahun_terbit }}</p>
                </div>

                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center pb-3">
                    <span class="badge bg-info text-dark">Stok: {{ $book->stok }}</span>
                    <a href="{{ route('books.show', $book->id) }}"
                       class="btn btn-outline-primary btn-sm rounded-pill">
                        Detail
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div style="font-size:80px;">📭</div>
            <h5 class="text-muted mt-3">Belum ada buku tersedia</h5>
            <a href="{{ route('books.create') }}" class="btn btn-primary mt-2">+ Tambah Buku Sekarang</a>
        </div>
        @endforelse
    </div>
</div>

@endsection