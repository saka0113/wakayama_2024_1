<x-app-layout>
    <div class="search-results">
        <h2>検索結果</h2>
        @if ($results->isEmpty())
            <p>該当する結果が見つかりませんでした。</p>
        @else
            <div class="results-list">
                @foreach ($results as $result)
                    <div class="result-item">
                        <img src="{{ asset('storage/' . $result->image_path) }}" alt="画像">
                        <p>{{ $result->genre }} - {{ $result->ninzu }} - {{ $result->price }}</p>
                        <p>{{ $result->feature }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>