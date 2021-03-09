<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Book;
use App\Dictionary;
use App\Gallery;
use App\News;
use App\Team;
use Illuminate\Http\Request;
use voku\helper\ASCII;

class FrontendController extends Controller
{
    public function index(){
        $data = News::getData();
        return view("frontend.index",compact("data"));
    }

    public function about()
    {
        $teams = Team::all();
        return view("frontend.about",compact("teams"));
    }

    public function news(){
        $news = News::orderBy("created_at","desc")->with(["user","language"])->paginate(15);
        return view("frontend.news",compact("news"));
    }

    public function singleNews($alias){
        $news = News::with("materials")->firstWhere("alias",$alias);
        if($news){
            return view("frontend.singleNews",compact("news"));
        }
        else{
            abort(404);
        }

    }

    public function article(){
        $articles = Article::orderBy("created_at","desc")->with(["user","language"])->paginate(15);
        return view("frontend.article",compact("articles"));
    }

    public function singleArticle($alias){
        $article = Article::firstWhere("alias",$alias);
        if($article){
            return view("frontend.singleArticle",compact("article"));
        }
        else{
            abort(404);
        }
    }

    public function book(){
        $books = Book::with("author")->paginate(15);
        return view("frontend.book",compact("books"));
    }

    public function singleBook($alias){
        $book = Book::firstWhere("alias",$alias);
        if($book){
            return view("frontend.singleBook",compact("book"));
        }
        else{
            abort(404);
        }


    }


    public function dictionary(){
        $dictionaries = Dictionary::paginate("50");
        return view("frontend.dictionary",compact("dictionaries"));
    }

    public function author(){
        $authors = Author::paginate(15);
        return view("frontend.author",compact("authors"));
    }

    public function authorBook($id){
        $books = Book::where("author_id",$id)->with("author")->paginate(15);
        return view("frontend.book",compact("books"));
    }

    public function gallery(){
        $galleries = Gallery::all();
        return view("frontend.gallery",compact("galleries"));
    }

    public function contact(){
        return view("frontend.contact");

    }
}
