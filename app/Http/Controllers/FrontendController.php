<?php

namespace App\Http\Controllers;

use App\About;
use App\Article;
use App\Author;
use App\Book;
use App\Dictionary;
use App\Email;
use App\Gallery;
use App\Language;
use App\Mail\SendMessage;
use App\News;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $about = About::where("language_id",Language::getLanguage())->first();
        return view("frontend.about",compact("teams","about"));
    }

    public function news(){
        $news = News::orderBy("created_at","desc")->where("language_id",Language::getLanguage())->with(["user","language"])->paginate(15);
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
        $articles = Article::orderBy("created_at","desc")->where("language_id",Language::getLanguage())->with(["user","language"])->paginate(15);
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
        $books = Book::with("language")->where("language_id",Language::getLanguage())->paginate(15);
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

    public function search(Request $request){
        $this->validate($request,["category"=>"required","search"=>"required"]);
        if($request->category == "article"){
            $articles = Article::orderBy("created_at","desc")->
                where("title","LIKE","%" . $request->search . "%")->
                orWhere("subtitle","LIKE","%" . $request->search . "%")->
                orWhere("content","LIKE","%" . $request->search . "%")
                ->with(["user","language"])->paginate(15);
            return view("frontend.article",compact("articles"));
        }
        else if($request->category == "news"){
            $news =  News::orderBy("created_at","desc")->
            where("title","LIKE","%" . $request->search . "%")->
            orWhere("subtitle","LIKE","%" . $request->search . "%")->
            orWhere("content","LIKE","%" . $request->search . "%")
                ->with(["user","language"])->paginate(15);
            return view("frontend.news",compact("news"));
        }
        else if($request->category == "book"){
            $books = Book::orderBy("created_at","desc")->
            where("author_id","LIKE","%" . $request->search . "%")->
            orWhere("title","LIKE","%" . $request->search . "%")->
            orWhere("authors","LIKE","%" . $request->search . "%")->
            orWhere("description","LIKE","%" . $request->search . "%")
                ->with(["language"])->paginate(15);
            return view("frontend.book",compact("books"));
        }
        else{
            toastr()->error(__("messages.404"));
            return redirect("/");
        }
    }

    public function sendMessage(Request $request){
        $this->validate($request,["name"=>"required","email"=>"required|email","phone"=>"required","message"=>"required"]);
        $emails = Email::pluck('email')->toArray();
        if(count($emails)){
                Mail::to($emails)->send(new SendMessage($request->all()));
                toastr()->success(__("messages.success"));
        }
        else{
            toastr()->error(__("messages.failed"));
        }
        return redirect()->route("contact");
    }
}
