<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('home', [
            "articles" => $articles,
        ]);
    }
    public function Store(Article $article, ArticleRequest $request)
    {
        $validation = $request;
        if ($validation) {
            Article::create([
                "titre" => $request->titre,
                "contenu" => $request->contenu,
                "user_id"=> Auth::id()

            ]);
        } else {
            return redirect()->back();
        }
        return redirect('/')->with("success", "Article bien enregistrée");
    }

    public function Show(Article $article)
    {
        // $article = Article::find($id);
        return view('article.readingPage', ['article' => $article]);
    }

    public function Edit(Article $article)
    {
        return view("article.editArticle", [
            "article" => $article,
        ]);
    }

    public function Update(Article $article, ArticleRequest $request)
    {
        $article->titre = $request->titre;
        $article->contenu = $request->contenu;
        $article->save();
        return redirect()->back()->with("success", "La mise à jour a été pris en compte");
    }

    public function Delete(Article $article)
    {
        $article->delete();
        return redirect('home')->with("danger", "L'article a bien été supprimé");

    }

    public function DeleteConfirmation()
    {
        return redirect()->back()->with("danger", "Êtes-vous sûre de vouloir supprimer cet article");
    }
}
