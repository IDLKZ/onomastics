<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Http\Controllers\Controller;
use App\Language;
use App\Models\File;
use App\News;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::with(["user", "language"])->paginate(12);
        $article = Article::find(1);
        return view("admin.article.index", compact("articles"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["language_id" => "required|exists:languages,id", "title" => "required|max:255", "subtitle" => "required|max:255", "content" => "required", "img" => "sometimes|nullable|file|image|max:10240", "thumbnail" => "sometimes|nullable|file|image|max:10240"]);
        $languages = Language::all();
        return view("admin.article.create", compact("validator", "languages"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ["language_id" => "required|exists:languages,id", "title" => "required|max:255", "subtitle" => "required|max:255", "content" => "required", "img" => "sometimes|nullable|file|image|max:10240", "thumbnail" => "sometimes|nullable|file|image|max:10240"]);
        if (Article::createData($request)) {
            toastr()->success(__("messages.created"));
        } else {
            toastr()->success(__("messages.failed"));
        }
        return redirect()->route("admin-article.index");


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $article = Article::with(["language", "user"])->find($id);
        if ($article) {
            return view("admin.article.show", compact("article"));
        } else {
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-article.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $article = Article::find($id);
        if ($article) {
            $validator = JsValidator::make(["language_id" => "required|exists:languages,id", "title" => "required|max:255", "subtitle" => "required|max:255", "content" => "required", "img" => "sometimes|nullable|file|image|max:10240", "thumbnail" => "sometimes|nullable|file|image|max:10240"]);
            $languages = Language::all();
            return view("admin.article.edit", compact("validator", "languages", "article"));
        } else {
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-article.index");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $article = Article::find($id);
        if ($article) {
            $this->validate($request, ["language_id" => "required|exists:languages,id", "title" => "required|max:255", "subtitle" => "required|max:255", "content" => "required", "img" => "sometimes|nullable|file|image|max:10240", "thumbnail" => "sometimes|nullable|file|image|max:10240"]);
            if (Article::updateData($request, $article)) {
                toastr()->success(__("messages.updated"));
            } else {
                toastr()->error(__("messages.failed"));
            }
        } else {
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-article.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $article = Article::find($id);
        if ($article) {
            File::deleteFile($article->img);
            File::deleteFile($article->thumbnail);
            $article->delete();
            toastr()->success(__("messages.deleted"));
        } else {
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-article.index");
    }
}
