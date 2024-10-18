@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $vapeArticle->title }}</h1>

    @if ($vapeArticle->image)
        <img src="{{ asset('images/' . $vapeArticle->image) }}" alt="{{ $vapeArticle->title }}" class="img-fluid mb-3">
    @endif

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Product Details</h5>
            <p><strong>Category:</strong> {{ $vapeArticle->category }}</p>
            @if ($vapeArticle->brand)
                <p><strong>Brand:</strong> {{ $vapeArticle->brand }}</p>
            @endif
            @if ($vapeArticle->price)
                <p><strong>Price:</strong> ${{ number_format($vapeArticle->price, 2) }}</p>
            @endif
            @if ($vapeArticle->stock !== null)
                <p><strong>Stock:</strong> {{ $vapeArticle->stock }}</p>
            @endif
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Product Description</h5>
            <p class="card-text">{!! nl2br(e($vapeArticle->content)) !!}</p>
        </div>
    </div>

    <div class="mb-3">
        <a href="{{ route('vape_articles.edit', $vapeArticle) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('vape_articles.destroy', $vapeArticle) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
        </form>
        <a href="{{ route('vape_articles.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection