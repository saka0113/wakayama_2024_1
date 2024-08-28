<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
{
    logger(__LINE__);
    

    $request->validate([
        'article_id' => 'required|exists:articles,id',
        'content' => 'required|string|max:255',
    ]);
    logger(__LINE__);

    Comment::create([
        'article_id' => $request->article_id,
        'content' => $request->input('content'),
        'user_id' => auth()->id(),
    ]);
    logger(__LINE__);

    return back()->with('success', 'コメントが投稿されました。');
}
}
