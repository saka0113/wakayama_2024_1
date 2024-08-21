<x-app-layout>
  @push('styles')
  <link rel="stylesheet" href="{{ asset('css/create.css') }}">
  @endpush

  <div>
    <h1>paiza bbs</h1>
    <p>{{ $message }}</p>
    @foreach ($articles as $article)
      <img src="{{ asset('storage/' . $article->image_path) }}" alt="Article Image">
    @endforeach
  </div>
</x-app-layout>