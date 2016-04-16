<?php

namespace NetPortal\Http\Controllers;

use Auth;
use NetPortal\Tag;
use NetPortal\Article;
use Carbon\Carbon;
use NetPortal\Http\Controllers\Controller;
use NetPortal\Http\Requests\ArticleRequest;

class ArticlesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // we want authentication to view the articles home page
        $this->middleware('auth');
    }

    public function index()
    {
        $articles = Article::latest('published_at')->published()->get();

        return view('articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('articles.single', compact('article'));
    }

    public function create()
    {
        $tags = Tag::lists('name', 'id');

        return view('articles.create', compact('tags'));
    }

    public function store(ArticleRequest $request)
    {
        $request['user_id'] = Auth::user()->id;

        $this->createArticle($request);

        return redirect('articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        $tags = Tag::lists('name', 'id');

        return view('articles.edit', compact('article', 'tags'));
    }

    public function update($id, ArticleRequest $request)
    {
        $article = Article::findOrFail($id);

        $article->update($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return redirect('articles');
    }

    public function destroy($id)
    {
        Article::findOrFail($id)->destroy($id);

        return redirect('articles');
    }

    private function createArticle(ArticleRequest $request)
    {
        $article = Auth::user()->articles()->create($request->all());

        $this->syncTags($article, $request->input('tag_list'));

        return $article;
    }

    private function syncTags(Article $article, array $tags)
    {
        $article->tags()->sync($tags);
    }
}
