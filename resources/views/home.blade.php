@extends('layouts.app')

@section('title', 'Welcome to Thoms Vape Shop')

@section('content')
<div class="jumbotron">
    <h1 class="display-4">Welcome to Thoms Vape Shop</h1>
    <p class="lead">Temukan beragam produk vape berkualitas tinggi kami.</p>
    <hr class="my-4">
    <p>Dari e-liquid hingga perangkat dan aksesori, kami memiliki semua yang Anda butuhkan untuk pengalaman vape yang sempurna.</p>
    <a class="btn btn-primary btn-lg" href="{{ route('vape_articles.index') }}" role="button">Browse Products</a>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <h2>E-Liquids</h2>
        <p>Jelajahi beragam koleksi rasa kami.</p>
    </div>
    <div class="col-md-4">
        <h2>Devices</h2>
        <p>Temukan device yang sempurna untuk kebutuhan vaping Anda.</p>
    </div>
    <div class="col-md-4">
        <h2>Accessories</h2>
        <p>Tingkatkan pengalaman vaping Anda dengan aksesoris kami.</p>
    </div>
</div>
@endsection