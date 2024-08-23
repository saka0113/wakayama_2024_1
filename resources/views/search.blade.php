<x-app-layout>
    @push('styles')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}" />
    @endpush

    <div class="search">
        <div class="frame">
            <a class="a4">カテゴリの検索</a>
        </div>
        <main class="main-category">
         <form action="{{ route('search.results') }}" method="GET">
            <!-- ジャンル -->
            <div class="category-section">
                <div class="category-title">ジャンル</div>
                <div class="category-items">
                    <label><input type="radio" name="genre" value="中華"> 中華</label>
                    <label><input type="radio" name="genre" value="和食"> 和食</label>
                    <label><input type="radio" name="genre" value="麺類"> 麺類</label>
                    <label><input type="radio" name="genre" value="焼肉"> 焼肉</label>
                    <label><input type="radio" name="genre" value="その他"> その他</label>
                    <label><input type="radio" name="genre" value="カフェ"> カフェ</label>
                    <label><input type="radio" name="genre" value="モーニング"> モーニング</label>
                    <label><input type="radio" name="genre" value="ランチ"> ランチ</label>
                    <label><input type="radio" name="genre" value="ディナー"> ディナー</label>
                </div>
            </div>

            <!-- 人数 -->
            <div class="category-section">
                <div class="category-title">人数</div>
                <div class="category-items">
                    <label><input type="radio" name="ninzu" value="1人"> 1人</label>
                    <label><input type="radio" name="ninzu" value="2人"> 2人</label>
                    <label><input type="radio" name="ninzu" value="4人以下"> 4人以下</label>
                    <label><input type="radio" name="ninzu" value="5人以上"> 5人以上</label>
                </div>
            </div>

            <!-- 価格 -->
            <div class="category-section">
                <div class="category-title">価格</div>
                <div class="category-items">
                    <label><input type="radio" name="price" value="0-1000円"> 0~1000円</label>
                    <label><input type="radio" name="price" value="1000-2000円"> 1000~2000円</label>
                    <label><input type="radio" name="price" value="2000-3000円"> 2000~3000円</label>
                    <label><input type="radio" name="price" value="4000円以上"> 4000円~</label>
                </div>
            </div>

            <!-- 特徴 -->
            <div class="category-section">
                <div class="category-title">特徴</div>
                <div class="category-items">
                    <label><input type="radio" name="feature" value="店主"> 店主</label>
                    <label><input type="radio" name="feature" value="店員が優しい"> 店員が優しい</label>
                    <label><input type="radio" name="feature" value="料理の提供が早い"> 料理の提供が早い</label>
                    <label><input type="radio" name="feature" value="人が少なく静か"> 人が少なく静か</label>
                    <button type="submit">検索</button>
                </div>
            </div>
            <!-- 検索ボタン -->
            
         </form>
        </main>
    </div>
</x-app-layout>
