<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Type;
use App\Mail\ArticleCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with(['user', 'type'])->latest()->get();
        return view('articles.index', compact('articles'));
    }

    public function create()
    {
        $types = Type::all();
        return view('articles.create', compact('types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'type_id' => 'required|exists:types,id',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        $article = auth()->user()->articles()->create([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $imagePath,
            'type_id' => $request->type_id,
        ]);

        Mail::to(auth()->user()->email)->send(new ArticleCreated($article));

        return redirect()->route('articles.index')->with('success', 'Article créé avec succès !');
    }

    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $types = Type::all();
        return view('articles.edit', compact('article', 'types'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title'   => 'required|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'type_id' => 'required|exists:types,id',
        ]);

        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('articles', 'public');
        }

        $article->update([
            'title'   => $request->title,
            'content' => $request->content,
            'image'   => $article->image,
            'type_id' => $request->type_id,
        ]);

        return redirect()->route('articles.index')->with('success', 'Article modifié !');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'Article supprimé !');
    }
}
