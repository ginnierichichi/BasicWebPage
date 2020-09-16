<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        if (request('tag')) {
            $articles= Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            $articles = Article::latest()->get();
        }

        return view('articles.index', ['articles' => $articles]);

    }

    public function show(Article $article)
    {
        return view('articles.show', ['article'=>$article]);
    }

    public function create()
    {
        return view('articles.create', [
            'tags'=>Tag::all()
            ]);

    }

    public function store()
    {
        //persists the new resource
        $this->validateArticle();

        $article = new Article(request(['title','excerpt', 'body']));
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));

        return redirect(route('articles.index'));
    }

    public function edit(Article $article)
    {

        return view('articles.edit', [      // or can do compact('article')
            'article' => $article
        ]);

    }

    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    public function validateArticle()
    {
       return request()->validate([
           'title' => 'required',
           'excerpt' => 'required',
          'body' => 'required',
           'tags'=> 'exists:tags, id'
           ]);
    }
}
