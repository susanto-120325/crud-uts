<?php

namespace App\Http\Controllers;

use App\Models\VapeArticle;
use Illuminate\Http\Request;

class VapeArticleController extends Controller
{
    public function index()
    {
        $articles = VapeArticle::latest()->paginate(10);
        return view('vape_articles.index', compact('articles'));
    }

    public function create()
    {
        return view('vape_articles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand' => 'nullable|string',
            'price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
        ]);

        $article = new VapeArticle;
        $article->title = $request->title;
        $article->content = $request->content;
        $article->category = $request->category;
        $article->brand = $request->brand;
        $article->price = $request->price;
        $article->stock = $request->stock;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $article->image = $imageName;
        }

        $article->save();

        return redirect()->route('vape_articles.index')->with('success', 'Vape article created successfully.');
    }

    public function show(VapeArticle $vapeArticle)
    {
        return view('vape_articles.show', compact('vapeArticle'));
    }

    public function edit(VapeArticle $vapeArticle)
    {
        return view('vape_articles.edit', compact('vapeArticle'));
    }

    public function update(Request $request, VapeArticle $vapeArticle)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'brand' => 'nullable|string',
            'price' => 'nullable|numeric',
            'stock' => 'nullable|integer',
        ]);

        $vapeArticle->title = $request->title;
        $vapeArticle->content = $request->content;
        $vapeArticle->category = $request->category;
        $vapeArticle->brand = $request->brand;
        $vapeArticle->price = $request->price;
        $vapeArticle->stock = $request->stock;

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $vapeArticle->image = $imageName;
        }

        $vapeArticle->save();

        return redirect()->route('vape_articles.index')->with('success', 'Vape article updated successfully.');
    }

    public function destroy(VapeArticle $vapeArticle)
    {
        $vapeArticle->delete();
        return redirect()->route('vape_articles.index')->with('success', 'Vape article deleted successfully.');
    }
}
