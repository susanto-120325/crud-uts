@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Vape Article</h1>

    <form action="{{ route('vape_articles.update', $vapeArticle) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $vapeArticle->title) }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5" required>{{ old('content', $vapeArticle->content) }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control @error('category') is-invalid @enderror" id="category" name="category" required>
                <option value="">Select a category</option>
                <option value="e-liquid" {{ old('category', $vapeArticle->category) == 'e-liquid' ? 'selected' : '' }}>E-liquid</option>
                <option value="device" {{ old('category', $vapeArticle->category) == 'device' ? 'selected' : '' }}>Device</option>
                <option value="accessory" {{ old('category', $vapeArticle->category) == 'accessory' ? 'selected' : '' }}>Accessory</option>
            </select>
            @error('category')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="brand">Brand (optional)</label>
            <input type="text" class="form-control @error('brand') is-invalid @enderror" id="brand" name="brand" value="{{ old('brand', $vapeArticle->brand) }}">
            @error('brand')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Price (optional)</label>
            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $vapeArticle->price) }}">
            @error('price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="stock">Stock (optional)</label>
            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $vapeArticle->stock) }}">
            @error('stock')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Image (optional)</label>
            <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        @if ($vapeArticle->image)
            <div class="form-group">
                <label>Current Image:</label>
                <img src="{{ asset('images/' . $vapeArticle->image) }}" alt="{{ $vapeArticle->title }}" class="img-thumbnail" style="max-width: 200px;">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>
</div>
@endsection