<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Auth;

/**
 * Class ArticlesController
 * @package App\Http\Controllers
 */
class ArticlesController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $articles = Article::latest()->get();

        return view('articles.index', compact('articles'));
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article) {
        return view ('articles.show', compact('article'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create() {
        $tags = Tag::lists('name', 'id');
        return view('articles.create', compact('tags'));
    }

    /**
     * @param ArticleRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ArticleRequest $request) {

//        if(! isset($request['tags']))
//            $request['tags'] = [];
//        dd($request->all());
        $this->createArticle($request);

        flash()->success('Your article has been created');

        return redirect('articles');
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article) {
        $tags = Tag::lists('name', 'id');
        return view('articles.edit', compact('article', 'tags'));
    }

    public function update(ArticleRequest $request, Article $article) {
        $article->update($request->all());
        $tags = $request->input('tag_list');
        $tags = $tags == null ? [] : $tags;
        $this->syncTags($article, $tags);

        return redirect(action('ArticlesController@show', $article->id));
    }

    /**
     * @param Article $article
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Article $article) {
        $article->delete();
        
        flash()->success('Your article has been deleted');

        return redirect('articles');
    }

    /**
     * @param Article $article
     * @param array $tags
     */
    private function syncTags(Article $article, array $tags = []) {
        $article->tags()->sync($tags);
    }

    /**
     * @param ArticleRequest $request
     * @return Article $article
     */
    private function createArticle(ArticleRequest $request) {
        $article = Auth::user()->articles()->create($request->all());
        $tags = $request->input('tag_list');
        $tags = $tags == null ? [] : $tags;
        $this->syncTags($article, $tags);

        return $article;
    }
}
