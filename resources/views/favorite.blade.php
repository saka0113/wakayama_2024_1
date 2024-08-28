<div style="display: flex;">
    @if (Auth::user()->is_favorite($article->id))
        <form id="unfavorite-form-{{ $article->id }}" action="{{ route('favorites.unfavorite', $article->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        <img class="icon_size" src="{{ asset('images/iconmonstr-2-1.svg') }}" alt="Unfavorite" style="cursor: pointer;" onclick="document.getElementById('unfavorite-form-{{ $article->id }}').submit();">
    @else
        <form id="favorite-form-{{ $article->id }}" action="{{ route('favorites.favorite', $article->id) }}" method="POST" style="display: none;">
            @csrf
        </form>
        <img class="icon_size" src="{{ asset('images/iconmonstr-2-2.svg') }}" alt="Favorite" style="cursor: pointer;" onclick="document.getElementById('favorite-form-{{ $article->id }}').submit();">
    @endif

    <p style="margin: 0%;">{{ $article->favorite_users()->count() }}</p>
</div>
