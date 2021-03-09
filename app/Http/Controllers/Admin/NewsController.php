<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use App\Models\File;
use App\News;
use App\User;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;
use function Symfony\Component\Translation\t;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::with(["user","language"])->paginate(12);
        return view("admin.news.index",compact("news"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["language_id"=>"required|exists:languages,id","title"=>"required|max:255","subtitle"=>"required|max:255","content"=>"required","img"=>"sometimes|nullable|file|image|max:10240","thumbnail"=>"sometimes|nullable|file|image|max:10240"]);
        $languages = Language::all();
        return view("admin.news.create",compact("validator","languages"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ["language_id"=>"required|exists:languages,id","title"=>"required|max:255","subtitle"=>"required|max:255","content"=>"required","img"=>"sometimes|nullable|file|image|max:10240","thumbnail"=>"sometimes|nullable|file|image|max:10240"]);
        if(News::createData($request)){
            toastr()->success(__("messages.created"));
        }
        else{
            toastr()->success(__("messages.failed"));
        }
        return redirect()->route("admin-news.index");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::with(["language","user"])->find($id);
        if($news){
            return  view("admin.news.show",compact("news"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-news.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        if($news){
            $validator = JsValidator::make(["language_id"=>"required|exists:languages,id","title"=>"required|max:255","subtitle"=>"required|max:255","content"=>"required","img"=>"sometimes|nullable|file|image|max:10240","thumbnail"=>"sometimes|nullable|file|image|max:10240"]);
            $languages = Language::all();
            return  view("admin.news.edit",compact("validator","languages","news"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-news.index");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = News::find($id);
        if($news){
            $this->validate($request,["language_id"=>"required|exists:languages,id","title"=>"required|max:255","subtitle"=>"required|max:255","content"=>"required","img"=>"sometimes|nullable|file|image|max:10240","thumbnail"=>"sometimes|nullable|file|image|max:10240"]);
            if(News::updateData($request,$news)){
                toastr()->success(__("messages.updated"));
            }
            else{
                toastr()->error(__("messages.failed"));
            }
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-news.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::find($id);
        if($news){
            File::deleteFile($news->img);
            File::deleteFile($news->thumbnail);
            $news->delete();
            toastr()->success(__("messages.deleted"));
        }
        else{
            toastr()->error(__("messages.404"));
        }
        return redirect()->route("admin-news.index");
    }
}
