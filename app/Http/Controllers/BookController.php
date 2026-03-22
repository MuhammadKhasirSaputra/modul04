<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $query = Book::with('category');

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $books = $query->get();
        $totalBooks = Book::count();
        $totalPerCategory = Category::withCount('books')->get();

        return view('books.index', compact('books', 'categories', 'totalBooks', 'totalPerCategory'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id'  => 'required|numeric',
            'judul'        => 'required',
            'penulis'      => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok'         => 'required|numeric',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['category_id', 'judul', 'penulis', 'tahun_terbit', 'stok']);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('books', $filename, 'public');
            $data['gambar'] = 'books/' . $filename;
        }

        Book::create($data);

        return redirect()->route('books.index')
                ->with('success', 'Data berhasil ditambahkan');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id'  => 'required|numeric',
            'judul'        => 'required',
            'penulis'      => 'required',
            'tahun_terbit' => 'required|numeric',
            'stok'         => 'required|numeric',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $data = $request->only(['category_id', 'judul', 'penulis', 'tahun_terbit', 'stok']);

        if ($request->hasFile('gambar')) {
            if ($book->gambar) {
                Storage::disk('public')->delete($book->gambar);
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('books', $filename, 'public');
            $data['gambar'] = 'books/' . $filename;
        }

        $book->update($data);

        return redirect()->route('books.index')
                ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Book $book)
    {
        if ($book->gambar) {
            Storage::disk('public')->delete($book->gambar);
        }

        $book->delete();

        return redirect()->route('books.index')
                ->with('success', 'Data berhasil dihapus');
    }
}