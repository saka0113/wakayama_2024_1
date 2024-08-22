<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('list', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($image = $request->file('image')) {
            $file_name = basename($image->store('public'));

            Article::create([
                'content' => $request->input('content'),
                'image_path' => $file_name,
            ]);

            return redirect()->route('articles.list')->with('success', 'Article created successfully!');
        }

        return back()->withErrors(['image' => 'Image upload failed.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id, Article $article)
    {
        $article = Article::find($id);
        return view('detail', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
