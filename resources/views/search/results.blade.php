<x-app-layout>
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/list.css') }}">
    @endpush
    <div class="search-results">
        <h2>検索結果</h2>
        
        @if ($results->isEmpty())
            <p>該当する結果が見つかりませんでした。</p>
        @else
            <div class="square_contents">
                @foreach ($results as $result)
                    <div class="square_content">
                        <a href='{{ route("article.show", ["id" => $result->id]) }}'>
                            <img class="square_image" src="{{ asset('storage/' . $result->image_path) }}" alt="画像">
                        </a>
                        <div class="icon_box ">
                            <img class="icon_size" alt="" src="{{ asset('images/icon.svg') }}">
                            <!-- クリック時に'いいね'のカウントが増えるようにする -->
                            <img class="icon_size" alt="" src="{{ asset('images/icon-11.svg') }}">
                            <!-- キープも同様 -->
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>