<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($city_id)
    {
        $cityIdMap = [
            1 => "和歌山市",
            2 => "海南市",
            3 => "紀の川市",
            4 => "岩出市",
            5 => "橋本市",
            6 => "かつらぎ町",
            7 => "九度山町",
            8 => "高野町",
            9 => "紀美野町",
            10 => "有田市",
            11 => "御坊市",
            12 => "田辺市",
            13 => "有田川町",
            14 => "湯浅町",
            15 => "広川町",
            16 => "由良町",
            17 => "日高町",
            18 => "美浜町",
            19 => "日高川町",
            20 => "印南町",
            21 => "みなべ町",
            22 => "上富田町",
            23 => "白浜町",
            24 => "すさみ町",
            25 => "新宮市",
            26 => "古座川町",
            27 => "串本町",
            28 => "那智勝浦町",
            29 => "太地町",
            30 => "北山村",
        ];

        $message = $cityIdMap[$city_id] ?? "Unknown city";
        $articles = Article::where('city_id', $city_id)->get();
        return view('list', ['articles' => $articles, 'message' => $message]);
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
            'content' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'city_id' => 'required|integer',
            'genre' => 'nullable|string',
            'ninzu' => 'nullable|string',
            'price' => 'nullable|string',
            'feature' => 'nullable|string',
            'comment' => 'nullable|string|max:255',
        ]);

        if ($image = $request->file('image')) {
            $city_id = $request->input('city_id');
            $file_name = basename($image->store('public'));

            Article::create([
                'content' => $request->input('content'),
                'image_path' => $file_name,
                'city_id' => $city_id,
                'genre' => $request->input('genre'),
                'ninzu' => $request->input('ninzu'),
                'price' => $request->input('price'),
                'feature' => $request->input('feature'),
                'comment' => $request['comment'],
            ]);

            return redirect()->route('article.list', ["id" => $city_id])->with('success', 'Article created successfully!');
        }

        return back()->withErrors(['image' => 'Image upload failed.']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Article $article)
    {
        $article = Article::with('comments')->find($id);
        
        return view('detail', ['article' => $article]);
    }

    public function search(Request $request)
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
    public function showmap()
{
    $articles = Article::all(); // 必要なデータを取得
    return response()->json($articles); // JSONレスポンスを返す
}
}
