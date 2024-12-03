<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        // mendapatkan semua data dari model Category
        $categories = Category::all();

        
        $posts = Post::when(request('category_id'), function ($query) {
            $query->where('category_id', request('category_id'));
        })->latest()->get();

        /* compact digunakan hanya kalau nama argumen yang ingin 
        di-return sama dengan nama variabel penyimpanan data */
        return view('home', compact('categories', 'posts'));
    }
}
