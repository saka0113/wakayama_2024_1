<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article; // モデルのインポート

class SearchController extends Controller
{
    public function show(Request $request)
    {
        // フォームからの入力データを取得
        $genre = $request->input('genre');
        $ninzu = $request->input('ninzu');
        $price = $request->input('price');
        $feature = $request->input('feature');

        // 検索クエリを構築
        $query = Article::query();

        if ($genre) {
            $query->where('genre', $genre);
        }
        if ($ninzu) {
            $query->where('ninzu', $ninzu);
        }
        if ($price) {
            $query->where('price', $price);
        }
        if ($feature) {
            $query->where('feature', $feature);
        }

        // 検索結果を取得
        $results = $query->get();

        // ビューに結果を渡して表示
        return view('search.results', compact('results'));
    }
}
