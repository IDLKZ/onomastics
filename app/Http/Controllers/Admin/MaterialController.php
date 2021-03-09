<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Material;
use App\Models\File;
use App\News;
use Illuminate\Http\Request;
use Proengsoft\JsValidation\Facades\JsValidatorFacade as JsValidator;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::with("news")->orderByDesc("news_id")->paginate(15);
        return view("admin.material.index",compact("materials"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::make(["news_id"=>"required","title" => "required|max:255", "img" => "required|file|image|max:10240"]);
        $news = News::all();
        return view("admin.material.create",compact("validator","news"));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,["news_id"=>"required","title" => "required|max:255", "img" => "required|file|image|max:10240"]);
        if(Material::createData($request)){
            toastr()->success(__("messages.created"));
        }
        else{
            toastr()->error(__("messages.failed"));
        }
        return  redirect()->route("admin-material.index");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($material = Material::find($id)){
            $validator = JsValidator::make(["news_id"=>"required","title" => "required|max:255", "img" => "required|file|image|max:10240"]);
            $news = News::all();
            return view("admin.material.edit",compact("validator","news","material"));

        }
        else{
            toastr()->error(__("messages.404"));
        }
        return  redirect()->route("admin-material.index");
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
        if($material = Material::find($id)){
            $this->validate($request,["news_id"=>"required","title" => "required|max:255", "img" => "sometimes|nullable|file|image|max:10240"]);
            if(Material::updateData($request,$material)){
                toastr()->success(__("messages.updated"));
            }
            else{
                toastr()->error(__("messages.failed"));
            }

        }
        else{
            toastr()->error(__("messages.404"));
        }
        return  redirect()->route("admin-material.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if($material = Material::find($id)){
            File::deleteFile($material->img);
            $material->delete();
            toastr()->success(__("messages.deleted"));

        }
        else{
            toastr()->error(__("messages.404"));
        }
        return  redirect()->route("admin-material.index");
    }
}
