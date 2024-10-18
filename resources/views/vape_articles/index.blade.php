
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Vape Articles</h1>
    <a href="{{ route('vape_articles.create') }}" class="btn btn-primary mb-3">Add New Article</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach ($articles as $article)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($article->image)
                        <img src="{{ asset('images/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ Str::limit($article->content, 100) }}</p>
                        <p><strong>Category:</strong> {{ $article->category }}</p>
                        @if ($article->brand)
                            <p><strong>Brand:</strong> {{ $article->brand }}</p>
                        @endif
                        @if ($article->price)
                            <p><strong>Price:</strong> ${{ number_format($article->price, 2) }}</p>
                        @endif
                        @if ($article->stock !== null)
                            <p><strong>Stock:</strong> {{ $article->stock }}</p>
                        @endif
                        <a href="{{ route('vape_articles.show', $article) }}" class="btn btn-info">View</a>
                        <a href="{{ route('vape_articles.edit', $article) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('vape_articles.destroy', $article) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{ $articles->links() }}
</div>
@endsection
