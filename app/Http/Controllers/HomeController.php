<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $latestBooks = Book::with('category')->latest()->take(4)->get();
        $totalBooks  = Book::count();
        $categories  = Category::withCount('books')->get();

        return view('home', compact('latestBooks', 'totalBooks', 'categories'));
    }
}