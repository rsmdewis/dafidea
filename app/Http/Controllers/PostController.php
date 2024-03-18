<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function dashboard()
    {
        
        $totalPosts = Post::count();
        return view('posts.dashboard')->with('totalPosts', $totalPosts);
    }
    // public function post()
    // {
    //     // $posts = Post::all();
    //     return view('posts.post');
    // }
    public function create()
    {
        return view('posts.create');
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments()->latest()->get();
        return view('posts.show', compact('post', 'comments'));
    }
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Simpan post baru ke database
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id(); // Mengambil ID user yang sedang login
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Temukan post berdasarkan ID
        $post = Post::findOrFail($id);

        // Pastikan user yang sedang login adalah penulis post
        if ($post->user_id != Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki izin untuk mengedit post ini.');
        }

        // Perbarui data post
        $post->title = $request->title;
        $post->content = $request->content;
        $post->save();

        return redirect()->route('posts.index')->with('success', 'Post berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Temukan post berdasarkan ID
        $post = Post::findOrFail($id);

        // Pastikan user yang sedang login adalah penulis post
        if ($post->user_id != Auth::id()) {
            return redirect()->route('posts.index')->with('error', 'Anda tidak memiliki izin untuk menghapus post ini.');
        }

        // Hapus post
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus.');
    }
}
