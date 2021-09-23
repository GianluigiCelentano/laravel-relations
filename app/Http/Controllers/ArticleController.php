<?php

namespace App\Http\Controllers;
use App\Article;
use App\Author;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allArticles = Article::all();
        return view('article.index', compact('allArticles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors=Author::all();
        return view('article.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article= new Article();
        $author=new Author();
        $this->fillAndSaveArticle($article, $author, $request);
        return redirect()->route('article.show', $article->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::find($id);
        return view('article.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, Author $author)
    {
        $this->fillAndSaveArticle($article, $author, $request);
        return redirect()->route('article.show', $article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return redirect()->route('article.index');
    }
    private function fillAndSaveArticle(Article $article, Author $author, Request $request) {
        $data=$request->all();
        $author->name=$data['name'];
        $author->surname=$data['surname'];
        $author->email=$data['email'];
        $article->title = $data['title'];
        $article->text = $data['text'];
        $article->cover = $data['cover'];
        $article->article_author_id=$author->id;
        $article->facing_id=$data['facing_id'];
        $article-> save();
    }
}
